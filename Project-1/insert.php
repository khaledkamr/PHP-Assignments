<?php
require_once 'dbConnection.php';

if(isset($_POST["signup"])) {
    trim(htmlspecialchars(extract($_POST)));

    $errors = [];

    if(empty($username)) {
        $errors[] = "username is required";
    } elseif(preg_match("/\d/", $username))  {
        $errors[] = "Digits are not allowed";
    }

    if(empty($email)) {
        $errors[] = "email is required";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address";
    }

    if(empty($password)) {
        $errors[] = "password is required";
    }

    if(empty($phone)) {
        $errors[] = "phone is required";
    } elseif(!is_numeric($phone)) {
        $errors[] = "phone must be numeric";
    }

    if(empty($address)) {
        $errors[] = "address is required";
    }

    if(empty($errors)) {
        $query = "INSERT INTO user(`name`, `email`, `password`, `phone`, `address`)
            VALUES('$username', '$email', '$password', '$phone', '$address')";
        $res = mysqli_query($conn, $query);

        if($res) {
            $_SESSION["success"] = "account signed up successfully";
            header("location:login.php");
        }
        else {
            $_SESSION["errors"] = ["error while insert data"];
            header("location:signup.php");
        }
    }
    else {
        $_SESSION["username"] = $username;
        $_SESSION["email"] = $email;
        $_SESSION["password"] = $password;
        $_SESSION["phone"] = $phone;
        $_SESSION["address"] = $address;
        $_SESSION["errors"] = $errors;
        header("location:signup.php");
    }
}
else {
    header("location:404.php");
}