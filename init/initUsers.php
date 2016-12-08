<?php

require_once __DIR__ . '/../lib/user-data.lib.php';

$initData = [
        [
        'login' => 'thlec',
        'password' => '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8',
        'role' => 'ADMIN',
        'firstName' => 'Prenom',
        'lastName' => 'Nom',
        'email' => 'email@monemail.com',
        'tel' => '0123456789'
    ],
        [
        'login' => 'test',
        'password' => '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8',
        'role' => 'USER',
        'firstName' => 'Prenom',
        'lastName' => 'Nom',
        'email' => 'email@monemail.com',
        'tel' => '0123456789'
    ]
];

persistUserData($initData);
