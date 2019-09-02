<?php

return [
    'name'  => 'Member',
    'forms' => [
        'email'         => 'Email',
        'password'      => 'Password',
        'fullname'      => 'Fullname',
        'is_male'       => 'Gender',
        'birthday'      => 'Day of birth',
        'phone'         => 'Phone',
        'picture'       => 'Avatar',
        'role'          => 'Role'
    ],
    'register' => [
        'success'   => 'Account registration successful.',
        'failure'   => 'Account registration failed.',
        'confirm'   => [
            'success' => 'Email verification successful. Please check your mailbox.',
            'failure' => 'Email verification failed. Please contact admin.',
        ]
    ]
];
