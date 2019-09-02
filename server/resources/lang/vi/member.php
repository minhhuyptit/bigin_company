<?php

return [
    'name'  => 'Thành viên',
    'forms' => [
        'email'         => 'Email',
        'password'      => 'Mật khẩu',
        'fullname'      => 'Họ & tên',
        'is_male'       => 'Giới tính',
        'birthday'      => 'Ngày sinh',
        'phone'         => 'Số điện thoại',
        'picture'       => 'Ảnh đại diện',
        'role'          => 'Quyền'
    ],
    'register' => [
        'success'   => 'Đăng ký tài khoản thành công.',
        'failure'   => 'Đăng ký tài khoản thất bại.',
        'confirm'   => [
            'success' => 'Gửi email xác thực thành công. Vui lòng kiểm tra hộp thư.',
            'failure' => 'Gửi email xác thực thất bại. Vui lòng liên hệ quản trị viên.',
        ]
    ],
    'login' => [
        'success'   => 'Đăng nhập tài khoản thành công.',
        'failure'   => 'Đăng nhập tài khoản thất bại.',
    ]
];
