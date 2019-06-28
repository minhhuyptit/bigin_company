<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('test', function () {
        return "Zo day rồi";
    });
});

Route::post('login', 'MemberController@login');

// Route::post('login', function () {
//     if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
//         $user = Auth::user();
//         return $success['token'] = $user->createToken('MyApp')->accessToken;
//         // return response()->json(['success' => $success], $this->successStatus);
//     } else {
//         return response()->json(['error' => 'Unauthorised'], 401);
//     }
// });

// Route::post('register', function (Request $request) {
//     // $validator = Validator::make($request->all(), [
//     //     'email' => 'required|email',
//     //     'password' => 'required'
//     // ]);
//     // if ($validator->fails()) {
//     //     return response()->json(['error' => $validator->errors()], 401);
//     // }
//     $input = $request->all();
//     $input['password'] = bcrypt($input['password']);
//     $user = Member::create($input);
//     $user->createToken('AkaiShuichi');
//     $success['token'] = $user->createToken('AkaiShuichi')->accessToken;
//     $success['name'] = $user->fullname;
//     return response()->json(['success' => $success], 200);
// });

// Route::get('login', function () {
//     return "Page not found";
// })->name('login');