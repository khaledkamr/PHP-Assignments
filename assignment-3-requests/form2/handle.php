<?php 

session_start();

if(isset($_POST["submit"])) {
    trim(htmlspecialchars(extract($_POST)));
    $errors = [];

    if(empty($fullName)) {
        $errors["fullName"] = "* Full name is required";
    } elseif(preg_match("/\d/", $fullName))  {
        $errors["fullName"] = "* Only letters and white spaces allowed";
    }

    if(empty($email))  {
        $errors["email"] = "* Email is required";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "* The email address is incorrect";
    }

    if(empty($website)) {
        $errors["website"] = "* Website URL is required";
    } elseif(!filter_var($website, FILTER_VALIDATE_URL)) {
        $errors["website"] = "* Enter a valid website URL";
    }

    if(empty($gender)) {
        $errors["gender"] = "* Please select a gender";
    }

    if(!empty($errors)) {
        $_SESSION["errors"] = $errors;
    } 

    $_SESSION["fullName"] = $fullName;
    $_SESSION["email"] = $email;
    $_SESSION["website"] = $website;
    $_SESSION["comment"] = $comment;
    $_SESSION["gender"] = $gender;

    header("location: index.php");
} else {
    header("location: index.php");
}