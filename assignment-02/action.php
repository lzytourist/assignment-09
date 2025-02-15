<?php

require_once 'init.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['action'] == 'add') {
        $car_obj = new Car();

        $data = [
            'brand' => $_POST['brand'],
            'model' => $_POST['model'],
            'year' => $_POST['year'],
            'price' => $_POST['price']
        ];

        if ($car_obj->create($data)) {
            $_SESSION['success'] = 'Car added successfully!';
        } else {
            $_SESSION['error'] = 'Error while adding the car!';
        }
    } else if ($_POST['action'] == 'edit') {
        $car_obj = new Car();

        $data = [
            'brand' => $_POST['brand'],
            'model' => $_POST['model'],
            'year' => $_POST['year'],
            'price' => $_POST['price']
        ];

        if ($car_obj->update($data, $_POST['id'])) {
            $_SESSION['success'] = 'Car updated successfully!';
        } else {
            $_SESSION['error'] = 'Error while updating the car!';
        }
    } else if ($_POST['action'] == 'delete') {
        $car_obj = new Car();

        if ($car_obj->delete($_POST['id'])) {
            $_SESSION['success'] = 'Car deleted successfully!';
        } else {
            $_SESSION['error'] = 'Error while deleting the car!';
        }
    }

    header('Location: index.php');
}