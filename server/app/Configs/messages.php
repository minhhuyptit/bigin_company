<?php
namespace App\Configs;

require_once app_path() . '/configs/constants.php';
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

    public static function messages($key_message, $lang = 'en')
    {
        $data = array_merge(static::$login);
        return $data[$key_message][$lang];
    }
}
