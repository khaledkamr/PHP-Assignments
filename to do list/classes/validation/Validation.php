<?php

namespace classes\validation;

class Validation {
    private $errors = [];

    public function validate($key, $value, $roles) {
        foreach($roles as $role) {
            $role = "classes\\validation\\" . $role;
            $ob = new $role;
            $output = $ob->check($key, $value);
            if($output != false) {
                $this->errors[] = $output;
            }
        }
    }

    public function getError() {
        return $this->errors;
    }
}