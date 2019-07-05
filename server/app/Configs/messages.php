<?php

namespace App\Configs;

class Messages {
    // Login
    public static $login = array(
        LOGIN_SUCCESS => array(
            'vi' => 'Đăng nhập thành công',
            'en' => 'Login successfully',
        ),
        LOGIN_FAIL => array(
            'vi' => 'Đăng nhập thất bại. Vui lòng kiểm tra lại tên đăng nhập và mật khẩu',
            'en' => 'Login failed please check your username and password',
        ),
        EMPTY_EMAIL => array(
            'vi' => 'Email không thể rỗng. Vui lòng kiểm tra lại',
            'en' => 'Email cannot be empty. Please check again',
        ),
        FORMAT_INVALID_EMAIL => array(
            'vi' => 'Email không đúng định dạng. Vui lòng kiểm tra lại',
            'en' => 'Email format is incorrect. Please check again',
        ),
        EMPTY_PASSWORD => array(
            'vi' => 'Mật khẩu không thể rỗng. Vui lòng kiểm tra lại',
            'en' => 'Password cannot be empty. Please check again',
        ),
    );

    // Logout
    public static $logout = array(
        EMPTY_TOKEN => array(
            'vi' => 'Token không thể rỗng. Vui lòng kiểm tra lại',
            'en' => 'Token canot be empty. Please check again',
        ),
        LOGOUT_SUCCESS => array(
            'vi' => 'Đăng xuất thành công',
            'en' => 'Logout successfully',
        ),
        LOGOUT_FAIL => array(
            'vi' => 'Đăng xuất thật bại. Vui lòng kiểm tra lại',
            'en' => 'Logout failed. Please check again',
        ),
        REFRESH_TOKEN_SUCCESS => array(
            'vi' => 'Làm mới token thành công',
            'en' => 'Refresh token success',
        ),
    );

    // Member
    public static $member = array(
        EMPTY_FULLNAME => array(
            'vi' => 'Họ và tên không thể rỗng. Vui lòng kiểm tra lại',
            'en' => 'Fullname cannot be empty. Please check again',
        ),
        EMPTY_IS_MALE => array(
            'vi' => 'Giới tính không thể rỗng. Vui lòng kiểm tra lại',
            'en' => 'Gender cannot be empty. Please check again',
        ),
        EMPTY_BIRTHDAY => array(
            'vi' => 'Ngày sinh không thể rỗng. Vui lòng kiểm tra lại',
            'en' => 'Birthday cannot be empty. Please check again',
        ),
        EMPTY_PHONE => array(
            'vi' => 'Số điện thoại không thể rỗng. Vui lòng kiểm tra lại',
            'en' => 'Phone cannot be empty. Please check again',
        ),
        EMPTY_PICTURE => array(
            'vi' => 'Hình ảnh không thể rỗng. Vui lòng kiểm tra lại',
            'en' => 'Picture cannot be empty. Please check again',
        ),
        FORMAT_INVALID_IS_MALE => array(
            'vi' => 'Giới tính không đúng định dạng. Vui lòng kiểm tra lại',
            'en' => 'Gender format is incorrect. Please check again',
        ),
        FORMAT_INVALID_BIRTHDAY => array(
            'vi' => 'Ngày sinh không đúng định dạng. Vui lòng kiểm tra lại',
            'en' => 'Birthday format is incorrect. Please check again',
        ),
        FORMAT_INVALID_PHONE => array(
            'vi' => 'Số điện thoại không đúng định dạng. Vui lòng kiểm tra lại',
            'en' => 'Phone format is incorrect. Please check again',
        ),
        FORMAT_INVALID_IMAGE => array(
            'vi' => 'Hình ảnh không đúng định dạng. Chấp nhận jpeg, png, jpg, gif. Vui lòng kiểm tra lại',
            'en' => 'The image is not properly formatted. Accept jpeg, png, jpg, gif. Please check again',
        ),
        MAX_SIZE_PICTURE => array(
            'vi' => 'Kích thước hình ảnh không được lớn hơn 3MB. Vui lòng kiểm tra lại',
            'en' => 'Image size cannot be greater than 3MB. Please check again',
        ),
        MEMBER_NOT_FOUND => array(
            'vi' => 'Thành viên không tìm thấy. Vui lòng kiểm tra lại',
            'en' => 'Member not found. Please check again',
        ),
        UPLOAD_AVATAR_NOT_SUCCESS => array(
            'vi' => 'Cập nhật ảnh đại diện không thành công. Vui lòng kiểm tra lại', 
            'en' => 'Update avatar image failed. Please check again',
        ),
        UPDATE_MEMBER_NOT_SUCCESS => array(
            'vi' => 'Cập nhật thông tin thành viên không thành công. Vui lòng kiểm tra lại', 
            'en' => 'Update membership information failed. Please check again',
        ),
        UPDATE_PROFILE_SUCCESS => array(
            'vi' => 'Cập nhật hồ sơ thành công', 
            'en' => 'Update profile successfully',
        ),
    );

    public static $config = array(
        GET_CONFIG_SUCCESS => array(
            'vi' => 'Lấy danh sách cấu hình thành công',
            'en' => 'Get the configuration list successfully',
        ),
        GET_CONFIG_FAIL => array(
            'vi' => 'Lấy danh sách cấu hình không thành công',
            'en' => 'Get the configuration list failded',
        ),
    );

    public static function messages($key_message, $lang = 'en') {
        $data = array_merge(static::$login, static::$logout, static::$member, static::$config);
        return $data[$key_message][$lang];
    }
}
