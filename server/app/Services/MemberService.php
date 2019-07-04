<?php

namespace App\Services;

use App\Http\Requests\UpdateProfileRequest;
use App\Repositories\MemberRepository;
use App\Services\Contracts\MemberServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;
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
            $listUnset = ['member_role', 'created_at', 'updated_at'];
            $this->removeElements($user, $listUnset);
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
        $widthThumb = 180;
        $heihtThumb = 180;
        $nameFile = uniqid("avatar-");
        $extension = $file->getClientOriginalExtension();
        $nameOriginPicture = $nameFile . "." . $extension;
        $nameThumbPicture = $widthThumb . "x" . $heihtThumb . "-" . $nameOriginPicture;
        $thumbnailPath = public_path("storage/images/member/thumbnail/" . $nameThumbPicture);
        try {
            $file->storeAs("public/images/member", $nameOriginPicture); //Store Image Origin
            $file->storeAs("public/images/member/thumbnail", $nameThumbPicture); //Store Image Thumbnail
            Image::make($thumbnailPath)->resize($widthThumb, $heihtThumb)->save($thumbnailPath);
            $this->deleteOldAvatar($nameOldPicture); //Delete old Avatar
        } catch (\Exception $ex) {
            return false;
        }
        return $nameOriginPicture;
    }

    private function deleteOldAvatar($picture) {
        $widthThumb = 180;
        $heihtThumb = 180;
        Storage::delete("public/images/member/" . $picture);
        Storage::delete("public/images/member/thumbnail/" . $widthThumb . "x" . $heihtThumb . "-" . $picture);
    }
}
