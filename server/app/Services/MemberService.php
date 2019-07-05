<?php

namespace App\Services;

use App\Http\Requests\UpdateProfileRequest;
use App\Repositories\MemberRepository;
use App\Services\Contracts\MemberServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
// use Image;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Validator;

require_once app_path() . '/configs/constants.php';

class MemberService extends BaseService implements MemberServiceInterface {
    public function __construct(MemberRepository $memberRepository) {
        $this->repository = $memberRepository;
    }

    public function login(array $credentials) {
        $token = $this->repository->login($credentials);
        return $this->responseLogin($token);
    }

    public function logout(Request $request) {
        if ($this->validateLogout($request)) {
            return $this->response(404, EMPTY_TOKEN);
        } else {
            try {
                JWTAuth::invalidate($request->token);
                return $this->response(200, LOGOUT_SUCCESS);
            } catch (JWTException $ex) {
                return $this->response(404, LOGOUT_FAIL, $ex->getMessage());
            }
        }
    }

    public function updateProfile(UpdateProfileRequest $request, int $id) {
        // Check $id Member exist
        $member = $this->find($id);
        if (empty($member)) {
            return $this->response(404, MEMBER_NOT_FOUND);
        }

        // Check the existence of images and uploads
        $picture = "";
        if ($request->hasFile('picture')) {
            $picture = $this->uploadAvatar($request->picture, $member->picture);
            if ($picture === false) {
                return $this->response(500, UPLOAD_AVATAR_NOT_SUCCESS);
            }
        }
        $newMember = $this->repository->updateProfile($member, $request, $picture);
        if ($newMember === false) {
            return $this->response(500, UPDATE_MEMBER_NOT_SUCCESS);
        }

        $newMember['role'] = $newMember->member_role['value'];
        $listUnset = ['member_role', 'created_at', 'updated_at'];
        $this->removeElements($newMember, $listUnset);
        return $this->response(200, UPDATE_PROFILE_SUCCESS, $newMember);
    }

    private function responseLogin(string $token) {
        if (!empty($token)) {
            $user = Auth::user();
            $user['role'] = $user->member_role['value'];
            $user['token'] = $token;
            $listUnset = ['member_role'];
            $this->removeElements($user, $listUnset);
            $user->teams;
            foreach ($user['teams'] as $val) {
                $listUnsetTeam = ['leader', 'description'];
                parent::removeElements($val, $listUnsetTeam);
            }
            return $this->response(200, LOGIN_SUCCESS, $user);
        } else {
            return $this->response(404, LOGIN_FAIL);
        }
    }

    private function validateLogout(Request $request) {
        $validator = Validator::make($request->all(), [
            'token' => 'required',
        ]);
        return $validator->fails();
    }

    private function uploadAvatar($file, $nameOldPicture) {
        $nameOriginPicture = uniqid("avatar-") . "." . $file->getClientOriginalExtension();
        $nameThumbPicture = THUMB_SIZE . "-" . $nameOriginPicture;
        $thumbnailPath = public_path("storage/images/member/thumbnail/" . $nameThumbPicture);
        try {
            $file->storeAs(URL_IMAGE_MEMBER, $nameOriginPicture); //Store Image Origin
            $file->storeAs(URL_IMAGE_MEMBER_THUMB, $nameThumbPicture); //Store Image Thumbnail
            Image::make($thumbnailPath)->resize(WIDTH_AVATAR_THUMB, HEIGHT_AVATAR_THUMB)->save($thumbnailPath);
            $this->deleteOldAvatar($nameOldPicture); //Delete old Avatar
        } catch (\Exception $ex) {
            return false;
        }
        return $nameOriginPicture;
    }

    private function deleteOldAvatar($picture) {
        Storage::delete(URL_IMAGE_MEMBER . $picture);
        Storage::delete(URL_IMAGE_MEMBER_THUMB . THUMB_SIZE . "-" . $picture);
    }
}
