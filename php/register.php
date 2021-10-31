<?php
if (isset($_SESSION)) {
    session_start();
}

include_once "./conn.php";

if (isset($_POST['register'])) {
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $city = $_POST['city'];
    $address = $_POST['address'];

    $createPass = $_POST['c-password'];
    $confomaPass = $_POST['r-password'];

    if ($createPass != $confomaPass || empty($createPass) || empty($confomaPass)) {
        $_SESSION['error'] = "Password Don't Match";
        header("Location:./signup.php");
    }

    if (!empty($name) && !empty($email) && !empty($city) && !empty($number) && !empty($address)) {
        $passwordhash = password_hash($createPass, PASSWORD_DEFAULT);
        $sql =
            "
        INSERT INTO user(name,email,password,mobile,city,address) VALUES
        (   
            " . "'" . $name . "'," . "'" . $email . "'," . "'" . $passwordhash . "'," . "'" . $number . "'," . "'" . $city . "'," . "'" . $address . "'" . "
        )
        ";
        $result = $conn->query($sql);
        if ($result == TRUE) {
            $_SESSION['success'] = "Acount Created!";
            header('Location:./loginform.php');
        } else {
            $_SESSION['error'] = $conn->error;
            header('Location:./signup.php');
        }
    }
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {
        $sql = "SELECT password,id FROM user WHERE email=" . "'" . $email . "'";
        $result = $conn->query($sql);

        if ($result == TRUE) {

            if ($result->num_rows > 0) {

                $row = $result->fetch_assoc();


                if (password_verify($password, $row['password'])) {

                    $id = (int)$row['id'];



                    setcookie('uid', $id + 999, time() + 60 * 60 * 24 * 10, '/', '', $secure = true);
                    setcookie('u_email', $email, time() + 60 * 60 * 24 * 10, '/', '', $secure = true);

                    header('Location:../index.php');
                } else {
                    echo 'dfsf';
                }
            } else {
                echo 'fdsf';
            }
        } else {
            echo 'fsdfsdf';
        }
    } else {
        header('Location:./login.php');
    }
}
