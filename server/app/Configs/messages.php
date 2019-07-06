<?php

namespace App\Configs;

class Messages {
    // Common
    public static $common = array(
        MEMBER_MUST_BE_NUMERIC => array(
            'vi' => 'Thành viên phải là kiểu số. Vui lòng kiểm tra lại',
            'en' => 'Member must be numeric. Please check again',
        ),
        TEAM_MUST_BE_NUMERIC => array(
            'vi' => 'Nhóm phải là kiểu số. Vui lòng kiểm tra lại',
            'en' => 'Team must be numeric. Please check again',
        ),
        TEAM_MEMBER_MUST_BE_NUMERIC => array(
            'vi' => 'Vai trò của thành viên trong nhóm phải là kiểu số. Vui lòng kiểm tra lại',
            'en' => 'The role of team member must be numeric. Please check again',
        ),
    );

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
        EMPTY_TYPE => array(
            'vi' => 'Loại cấu hình không thể rỗng. Vui lòng kiểm tra lại',
            'en' => 'Type cannot be empty. Please check again',
        ),
        EMPTY_VALUE => array(
            'vi' => 'Giá trị cấu hình không thể rỗng. Vui lòng kiểm tra lại',
            'en' => 'Value cannot be empty. Please check again',
        ),
        CONFIG_NOT_FOUND => array(
            'vi' => 'Không tìm thấy cấu hình. Vui lòng kiểm tra lại',
            'en' => 'Configuration not found. Please check again',
        ),
        CREATE_CONFIG_SUCCESS => array(
            'vi' => 'Thêm cấu hình thành công',
            'en' => 'Create configuration successfully',
        ),
        CREATE_CONFIG_FAIL => array(
            'vi' => 'Thêm cấu hình thất bại',
            'en' => 'Create configuration failded',
        ),
        UPDATE_CONFIG_SUCCESS => array(
            'vi' => 'Cập nhật cấu hình thành công',
            'en' => 'Update configuration successfully',
        ),
        UPDATE_CONFIG_FAIL => array(
            'vi' => 'Cập nhật cấu hình thất bại',
            'en' => 'Update configuration failded',
        ),
        DELETE_CONFIG_SUCCESS => array(
            'vi' => 'Xóa cấu hình thành công',
            'en' => 'Delete configuration successfully',
        ),
        DELETE_CONFIG_FAIL => array(
            'vi' => 'Xóa cấu hình thất bại',
            'en' => 'Delete configuration failded',
        ),
    );

    public static $team = array(
        GET_ALL_TEAM_SUCCESS => array(
            'vi' => 'Lấy danh sách nhóm thành công',
            'en' => 'Get the team list successfully',
        ),
        GET_ALL_TEAM_FAIL => array(
            'vi' => 'Lấy danh sách nhóm thất bại',
            'en' => 'Get the team list failded',
        ),
        TEAM_NOT_FOUND => array(
            'vi' => 'Không tìm thấy team. Vui lòng kiểm tra lại',
            'en' => 'Team not found. Please check again',
        ),
        GET_MEMBERS_OF_TEAM_SUCCESS => array(
            'vi' => 'Lấy danh sách thành viên của nhóm thành công',
            'en' => 'Get the list of members of the group successfully',
        ),
        GET_MEMBERS_OF_TEAM_FAIL => array(
            'vi' => 'Lấy danh sách thành viên của nhóm thất bại',
            'en' => 'Get the list of members of the group failded',
        ),
        EMPTY_TEAM_NAME => array(
            'vi' => 'Tên nhóm không thể rỗng. Vui lòng kiểm tra lại',
            'en' => 'Team name cannot be empty. Please check again',
        ),
        IDENTICAL_TEAM_NAME => array(
            'vi' => 'Tên nhóm đã tồn tại rồi. Vui lòng kiểm tra lại',
            'en' => 'Team name already exists. Please check again',
        ),
        EMPTY_LEADER => array(
            'vi' => 'Trưởng nhóm không thể rỗng. Vui lòng kiểm tra lại',
            'en' => 'Leader cannot be empty. Please check again',
        ),
        LEADER_NOT_EXIST => array(
            'vi' => 'Trưởng nhóm không tồn tại. Vui lòng kiểm tra lại',
            'en' => 'Team leader does not exist. Please check again',
        ),
        CREATE_TEAM_SUCCESS => array(
            'vi' => 'Thêm nhóm thành công',
            'en' => 'Create team successfully',
        ),
        CREATE_TEAM_FAIL => array(
            'vi' => 'Thêm nhóm thất bại',
            'en' => 'Create team failded',
        ),
        UPDATE_TEAM_SUCCESS => array(
            'vi' => 'Cập nhật thông tin nhóm thành công',
            'en' => 'Update team information successfully',
        ),
        UPDATE_TEAM_FAIL => array(
            'vi' => 'Cập nhật thông tin nhóm thất bại',
            'en' => 'Update team information failded',
        ),
        DELETE_TEAM_SUCCESS => array(
            'vi' => 'Xóa nhóm thành công',
            'en' => 'Delete team successfully',
        ),
        DELETE_TEAM_FAIL => array(
            'vi' => 'Xóa nhóm thất bại',
            'en' => 'Delete team failded',
        ),
    );

    public static $team_member = array(
        EMPTY_MEMBER => array(
            'vi' => 'Thành viên không thể rỗng. Vui lòng kiểm tra lại',
            'en' => 'Member cannot be empty. Please check again',
        ),
        MEMBER_NOT_EXIST => array(
            'vi' => 'Thành viên không tồn tại. Vui lòng kiểm tra lại',
            'en' => 'Member does not exist. Please check again',
        ),
        EMPTY_TEAM => array(
            'vi' => 'Nhóm không thể rỗng. Vui lòng kiểm tra lại',
            'en' => 'Team cannot be empty. Please check again',
        ),
        TEAM_NOT_EXIST => array(
            'vi' => 'Nhóm không tồn tại. Vui lòng kiểm tra lại',
            'en' => 'Team does not exist. Please check again',
        ),
        EMPTY_TEAM_MEMBER_ROLE => array(
            'vi' => 'Vai trò của thành viên trong nhóm không thễ rỗng. Vui lòng kiểm tra lại',
            'en' => 'The role of the team member is not empty. Please check again',
        ),
        TEAM_MEMBER_ROLE_NOT_EXIST => array(
            'vi' => 'Vai trò của thành viên trong nhóm không tồn tại. Vui lòng kiểm tra lại',
            'en' => 'The role of the team member does not exist. Please check again',
        ),
        IDENTICAL_TEAM_MEMBER => array(
            'vi' => 'Thành viên này đã tồn tại trong nhóm. Vui lòng kiểm tra lại',
            'en' => 'This member already exists in the group. Please check again',
        ),
        CREATE_TEAM_MEMBER_SUCCESS => array(
            'vi' => 'Thêm thành viên vào nhóm thành công',
            'en' => 'Add member to team successfully',
        ),
        CREATE_TEAM_MEMBER_FAIL => array(
            'vi' => 'Thêm thành viên vào nhóm thất bại',
            'en' => 'Add member to team failded',
        ),
        DELETE_TEAM_MEMBER_SUCCESS => array(
            'vi' => 'Xóa thành viên vào nhóm thành công',
            'en' => 'Delete member to team successfully',
        ),
        DELETE_TEAM_MEMBER_FAIL => array(
            'vi' => 'Xóa thành viên vào nhóm thất bại',
            'en' => 'Delete member to team failded',
        ),
        TYPE_CONFIG_INCORRECT => array(
            'vi' => 'Loại cấu hình không chính xác. Vui lòng kiểm tra lại',
            'en' => 'Incorrect configuration type. Please check again',
        ),
        TEAM_MEMBER_NOT_FOUND => array(
            'vi' => 'Team member không tìm thấy. Vui lòng kiểm tra lại',
            'en' => 'Team member not found. Please check again',
        ),
    );

    public static function messages($key_message, $lang = 'en') {
        $data = array_merge(static::$common, static::$login, static::$logout, static::$member,
            static::$config, static::$team, static::$team_member);
        return $data[$key_message][$lang];
    }
}
