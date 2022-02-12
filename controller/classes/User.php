<?php
class User {
    // Properties
    private $username;
    private $email;
    private $phone;
    private $password;

    const EMPTY_FIELD = "This field cannot be empty";
    const USERNAME = " have at least 4 letters and 2 numbers and should not contain special characters";
    const EMAIL = "It must be a valid email";
    const PHONE = "It should have at least 10 numbers, all the characters must be numbers";
    const PASSWORD = "It should be at least 6 characters long and contain a '-' and an uppercase letter";
  
    // Methods
    function __construct($username, $email, $phone, $password) {
      $this->username = $username;
      $this->email = $email;
      $this->phone = $phone;
      $this->password = $password;
    }

    public function getUsername() {
      return $this->username;
    }

    public function getEmail() {
      return $this->email;
    }

    public function getPhone() {
      return $this->phone;
    }

    public function getPassword() {
      return $this->password;
    }

    public static function login($username, $password) {
      echo "Hello World!";
    }

    public function signUp() {
      $errors = array(
        "username" => $this->checkUsername($this->username),
        "email" => $this->checkEmail($this->email),
        "phone" => $this->checkPhone($this->phone),
        "password" => $this->checkPassword($this->password)
      );
      return $errors;
    }

    private function checkUsername($username) {
      if (empty($username)) {
        return User::EMPTY_FIELD;
      }
      // $pattern = "/(^[a-zA-Z0-9_.]+[@]{1}[a-z0-9]+[\.][a-z]+$)/";
      // if (preg_match($pattern, $username) === 0)
      // throw new Exception('asdf');
      // return false;
      return 1;
    }

    private function checkEmail($email) {
      if (empty($email)) {
        return User::EMPTY_FIELD;
      }
      // $pattern = "/(^[a-zA-Z0-9_.]+[@]{1}[a-z0-9]+[\.][a-z]+$)/";
      // if (preg_match($pattern, $email) === 0)
      //   throw new Exception('asdf');
      return 1;
    }

    private function checkPhone($phone) {
      if (empty($phone)) {
        return User::EMPTY_FIELD;
      }
      // $pattern = "/\d{10,50}/"
      // if (preg_match($pattern, $phone) === 0)
      //   throw new Exception('asdf');
      return 1;
    }

    private function checkPassword($password) {
      if (empty($username)) {
        return User::EMPTY_FIELD;
      }
      return 1;
    }
}
?>