<?php
    session_start();

    if(isset($_POST["submit"])) {
        trim(htmlspecialchars(extract($_POST)));
        $errors = [];

        if(empty($fname)) {
            $errors["fname"] = "First name is required";
        } elseif(preg_match("/\d/", $fname)) {
            $errors["fname"] = "Digits are not allowed";
        } elseif(strlen($fname) < 5) {
            $errors["fname"] = "The first name must be at least 5 characters.";
        }

        if(empty($lname)) {
            $errors["lname"] = "Last name is required";
        } elseif(preg_match("/\d/", $lname))  {
            $errors["lname"] = "Digits are not allowed";
        } elseif(strlen($lname) < 5) {
            $errors["lname"] = "The last name must be at least 5 characters.";
        }

        if(empty($email)) {
            $errors["email"] = "Email is required.";
        } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = "Invalid email address.";
        }

        if(empty($mobile)) {
            $errors["mobile"] = "Mobile number is required.";
        } elseif(!is_numeric($mobile)) {
            $errors["mobile"] = "Please enter a valid number";
        }

        if(empty($password)) {
            $errors["password"] = "Password is required";
        } elseif(!preg_match("/[A-Z]/", $password) || !preg_match("/[a-z]/", $password) || !preg_match("/\d/", $password) || !preg_match('/[^a-zA-Z0-9_]/', $password) || preg_match("/\s/", $password) || strlen($password) < 8) {
            $errors["password"] = "Password must be at least one uppercase letter, lowercase letter, digit, a special character with no spaces and minimum 8 length";
        }

        if(empty($confirmPassword)) {
            $errors["confirmPassword"] = "Please confirm your password";
        } elseif($confirmPassword != $password) {
            $errors["confirmPassword"] = "Confirm password does not match";
        }

        if(empty($details)) {
            $errors["details"] = "The details field is required.";
        }

        if(!empty($errors)) {
            $_SESSION["errors"] = $errors;
            $_SESSION["fname"] = $fname;
            $_SESSION["lname"] = $lname;
            $_SESSION["email"] = $email;
            $_SESSION["details"] = $details;
        }

        header("location: index.php");
    } else {
        header("location: index.php");
    }

?>