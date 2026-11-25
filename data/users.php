<?php

$users = [
    [
        'username' => 'admin',
        'password' => password_hash('admin123', PASSWORD_BCRYPT),
        'name'     => 'Admin Cashoes'
    ],
    [
        'username' => 'budi',
        'password' => password_hash('budi123', PASSWORD_BCRYPT),
        'name'     => 'Budi Santoso'
    ]
];
