<?php


if (isset($_POST['register'])) {
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $city = $_POST['city'];
    $address = $_POST['address'];

    $createPass = $_POST['c-password'];
    $confomaPass = $_POST['r-password'];

    if ($createPass != $confomaPass) {
        header("Location:./signup.php");
    }
}
