<?php

session_start();

$GLOBALS = [
    'config' => [
        'mysql' => [
            'host' => 'localhost',
            'user' => 'root',
            'pass' => '',
            'db' => 'assignment'
        ]
    ]
];

spl_autoload_register(function ($class) {
    require_once 'core/' . $class . '.php';
});