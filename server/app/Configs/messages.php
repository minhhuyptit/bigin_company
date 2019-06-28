<?php

namespace App\Configs;

class Messages
{
    // Login
    public static $login = array(
        LOGIN_SUCCESS => array(
            'vi' => 'Đăng nhập thành công',
            'en' => 'Login successfully'
        ),
        LOGIN_FAIL => array(
            'vi' => 'Đăng nhập thất bại. Vui lòng kiểm tra lại tên đăng nhập và mật khẩu',
            'en' => 'Login failed please check your username and password'
        ),
        EMPTY_EMAIL => array(
            'vi' => 'Email không thể rỗng. Vui lòng kiểm tra lại',
            'en' => 'Email cannot be empty. Please check again'
        ),
        FORMAT_INVALID_EMAIL => array(
            'vi' => 'Email không đúng định dạng. Vui lòng kiểm tra lại',
            'en' => 'Email format is incorrect. Please check again'
        ),
        EMPTY_PASSWORD => array(
            'vi' => 'Mật khẩu không thể rỗng. Vui lòng kiểm tra lại',
            'en' => 'Password cannot be empty. Please check again'
        )
    );

    // Logout
    public static $logout = array(
        EMPTY_TOKEN => array(
            'vi' => 'Token không thể rỗng. Vui lòng kiểm tra lại',
            'en' => 'Token canot be empty. Please check again'
        ),
        LOGOUT_SUCCESS => array(
            'vi' => 'Đăng xuất thành công',
            'en' => 'Logout successfully'
        ),
        LOGOUT_FAIL => array(
            'vi' => 'Đăng xuất thật bại. Vui lòng kiểm tra lại',
            'en' => 'Logout failed. Please check again'
        ),
        REFRESH_TOKEN_SUCCESS => array(
            'vi' => 'Làm mới token thành công',
            'en' => 'Refresh token success'
        )
    );

    public static function messages($key_message, $lang = 'en')
    {
        $data = array_merge(static::$login, static::$logout);
        return $data[$key_message][$lang];
    }
}
