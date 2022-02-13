<?php
class User implements JsonSerializable{
    // Properties
    private $username;
    private $email;
    private $phone;
    private $password;

    const EMPTY_FIELD = "This field cannot be empty";
    const USERNAME = " have at least 4 letters and 2 numbers and should not contain special characters";
    const DUP_USERNAME = "This username is already registered";
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

    public function jsonSerialize()
    {
        return 
        [
            'username'   => $this->getUsername(),
            'email' => $this->getEmail(),
            'phone' => $this->getPhone(),
            'password' => $this->getPassword()
        ];
    }

    public static function login($username, $password) {
      $errors = array(
        "username" => User::checkUsername($username),
        "password" => User::checkPassword($password)
      );
      foreach($errors as $key => $val) {
        if ($val !== 1) {
            return $errors;
        }
      }

      

      return $errors;
    }

    public function signUp() {
      $errors = array(
        "username" => User::checkUsername($this->username),
        "email" => User::checkEmail($this->email),
        "phone" => User::checkPhone($this->phone),
        "password" => User::checkPassword($this->password)
      );
      return $errors;
    }

    private static function checkUsername($username) {
      if (empty($username)) {
        return User::EMPTY_FIELD;
      }
      // $pattern = "/(^[a-zA-Z0-9_.]+[@]{1}[a-z0-9]+[\.][a-z]+$)/";
      // if (preg_match($pattern, $username) === 0)
      // throw new Exception('asdf');
      // return false;
      return 1;
    }

    private static function checkEmail($email) {
      if (empty($email)) {
        return User::EMPTY_FIELD;
      }
      // $pattern = "/(^[a-zA-Z0-9_.]+[@]{1}[a-z0-9]+[\.][a-z]+$)/";
      // if (preg_match($pattern, $email) === 0)
      //   throw new Exception('asdf');
      return 1;
    }

    private static function checkPhone($phone) {
      if (empty($phone)) {
        return User::EMPTY_FIELD;
      }
      // $pattern = "/\d{10,50}/"
      // if (preg_match($pattern, $phone) === 0)
      //   throw new Exception('asdf');
      return 1;
    }

    private static function checkPassword($password) {
      if (empty($password)) {
        return User::EMPTY_FIELD;
      }
      return 1;
    }
}
?>