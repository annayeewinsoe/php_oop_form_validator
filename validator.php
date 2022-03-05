<?php

class Validator {
    private $data;
    private $errors = [];
    private static $fields = ['username', 'email'];

    public function __construct($post_data) {
        $this->data = $post_data;
    }

    public function validate_form() {
        foreach(self::$fields as $field) {
            if(!array_key_exists($field, $this->data)) {
                trigger_error("$field is not present in data");
                return;
            }
        }
        $this->validate_username();
        $this->validate_email();
        return $this->errors;
    }

    private function validate_username() {
        $val = trim($this->data['username']);
        if(empty($val)) {
            $this->add_error('username', 'Username cannot be empty');
        } else {
            if(!preg_match('/^[a-zA-Z0-9]{3,}$/', $val)) {
                $this->add_error('username', 'Username must be at least 3 characters and alphanumeric');
            }
        }
    }

    private function validate_email() {
        $val = trim($this->data['email']);
        if (empty($val)) {
            $this->add_error('email', 'Email cannot be empty');
        } else {
            if (!filter_var($val, FILTER_VALIDATE_EMAIL)) {
                $this->add_error('email', 'Email must be a valid email');
            }
        }
    }

    private function add_error($key, $value) {
        $this->errors[$key] = $value;
    }
}

?>