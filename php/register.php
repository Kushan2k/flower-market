<?php

include_once "./conn.php";

if (isset($_POST['register'])) {
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $city = $_POST['city'];
    $address = $_POST['address'];

    $createPass = $_POST['c-password'];
    $confomaPass = $_POST['r-password'];

    $_SESSION['sing-data'] = array(
        'name' => $name,
        'email' => $email,
        'pass' => $createPass,
        'compass' => $confomaPass,
        'number' => $number,
        'city' => $city,
        'address' => $address
    );

    if ($createPass != $confomaPass || empty($createPass) || empty($confomaPass)) {
        $_SESSION['error'] = "Password Don't Match";
        header("Location:./signup.php");
        return;
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
            $_SESSION['sing-data'] = null;
            header('Location:./loginform.php');
            return;
        } else {
            $_SESSION['error'] = $conn->error;
            header('Location:./signup.php');
            return;
        }
    } else {
        $_SESSION['error'] = 'Please fill all the feilds!';
        header('Location:./singup.php');
        return;
    }
}

if (isset($_POST['login'])) {
    $email = htmlentities($_POST['email']);
    $password = htmlentities($_POST['password']);

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
                    return;
                } else {
                    $_SESSION['error'] = 'Passwords Don\'t match!<br>please try again';
                    header("Location:./loginform.php");
                }
            } else {
                $_SESSION['error'] = 'No users found for !';
                header('Location:./loginform.php');
                return;
            }
        } else {
            $_SESSION['error'] = 'Error Login Please try again!';
            header('Location:./loginform.php');
            return;
        }
    } else {
        $_SESSION['error'] = 'Please fill up all the deatils!';
        header('Location:./loginform.php');
        return;
    }
} else {
    header("Location:../index.php");
}
