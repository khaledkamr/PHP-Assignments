<?php

session_start();

if(isset($_POST["submit"])) {
    trim(htmlspecialchars(extract($_POST)));
    $errors = [];

    if(empty($fname)) {
        $errors["firstName"] = "First name is required";
    } elseif(preg_match("/\d/", $fname))  {
        $errors["firstName"] = "Digits are not allowed";
    }

    if(empty($lname)) {
        $errors["lastName"] = "Last name is required";
    } elseif(preg_match("/\d/", $lname)) {
        $errors["lastName"] = "Digits are not allowed";
    }

    if(empty($email)) {
        $errors["email"] = "Email is required";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Invalid email address";
    }

    if(empty($password)) {
        $errors["password"] = "Password is required";
    } elseif(!preg_match("/[A-Z]/", $password) ||
                !preg_match("/[a-z]/", $password) || 
                !preg_match("/\d/", $password) || 
                !preg_match('/[^a-zA-Z0-9_]/', $password) || 
                preg_match("/\s/", $password) || 
                strlen($password) < 8) {
        $errors["password"] = "Password must contain at least one uppercase letter, one lowercase letter, a digit, a special character, and be at least 8 characters long with no spaces";
    }

    if(empty($confirmPassword)) {
        $errors["confirmPassword"] = "Please confirm your password";
    } elseif($confirmPassword != $password) {
        $errors["confirmPassword"] = "Confirm password does not match";
    }

    if(!empty($errors)) {
        $_SESSION["errors"] = $errors;
        $_SESSION["fname"] = $fname;
        $_SESSION["lname"] = $lname;
        $_SESSION["email"] = $email;
    }
    
    header("location: index.php");
} else {
    header("location: index.php");
}