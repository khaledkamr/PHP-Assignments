<?php

$users = [];
function signup($username, $password) {
    if (isset($users[$username])) {
        return "Username already exists!";
    }
    $users[$username] = $password;
    return "Signup successful! Welcome";
}
function login($username, $password) {
    if (!isset($users[$username])) {
        return "Invalid username or password.";
    }
    if ($password == $users[$username]) {
        return "Login successful! Welcome back, $username.";
    } else {
        return "Invalid username or password.";
    }
}