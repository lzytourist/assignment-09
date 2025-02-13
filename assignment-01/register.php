<?php
session_start();

require_once 'db.php';

// print_r($_SERVER);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($name !== '' && $email !== '' && $password !== '') {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = 'Invalid email address';
            header('Location: index.php');
            die();
        }

        if (strlen($password) < 6) {
            $_SESSION['error'] = 'Password must be at least 6 characters';
            header('Location: index.php');
            die();
        }

        $db = DB::getInstance();

        $sql = 'INSERT INTO users (name, email, password) VALUES (:name, :email, :password)';
        $params = [
            ':name' => $name,
            ':email' => $email,
            ':password' => password_hash($password, PASSWORD_DEFAULT)
        ];

        if ($db->query($sql, $params)) {
            $_SESSION['success'] = 'User registered successfully';

            header('Location: users.php');
            die();
        } else {
            $_SESSION['error'] = 'User registration failed';
        }
    } else {
        $_SESSION['error'] = 'All fields are required';
    }

    header('Location: index.php');
}