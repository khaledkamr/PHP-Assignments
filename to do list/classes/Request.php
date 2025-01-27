<?php

namespace Classes;

class Request {
    public function get($key) {
        if(isset($_GET[$key])) {
            return $_GET[$key];
        }
        else {
            return "key not found";
        }
    }

    public function post($key) {
        if(isset($_POST[$key])) {
            return $_POST[$key];
        }
        else {
            return "key not found";
        }
    }

    public function filter($key) {
        return trim(htmlspecialchars($key));
    }

    public function redirect($path) {
        header("location:$path");
    }

    public function check($key) {
        return isset($key);
    }
}