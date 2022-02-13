<?php

class User implements JsonSerializable
{
    // Properties
    private $username;
    private $email;
    private $phone;
    private $password;

    private const EMPTY_FIELD = "This field cannot be empty";
    private const USERNAME = " have at least 4 letters and 2 numbers and should not contain special characters";
    private const DUP_USERNAME = "This username is already registered";
    private const EMAIL = "It must be a valid email";
    private const PHONE = "It should have at least 10 numbers, all the characters must be numbers";
    private const PASSWORD = "It should be at least 6 characters long and contain a '-' and an uppercase letter";

    // Methods
    public function __construct($username, $email, $phone, $password) {
        $this->username = $username;
        $this->email = $email;
        $this->phone = $phone;
        $this->password = $password;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getPassword()
    {
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

  /**
   * Checks for errors for the username and password submitted
   *
   * @param string $username the username of an user
   * @param string $password the password of an user
   *
   * @return array array of errors for username and/or password (if any)
   */
    public static function login($username, $password)
    {
        $errors = array(
          "username" => User::checkUsername($username),
          "password" => User::checkPassword($password)
        );
        foreach ($errors as $key => $val) {
            if ($val !== 1) {
                return $errors;
            }
        }
        return $errors;
    }

  /**
   * Checks for errors for the data submitted
   *
   * @return array array of errors for username, email, phone and/or password (if any)
   */
    public function signUp()
    {
        $errors = array(
          "username" => User::checkUsername($this->username),
          "email" => User::checkEmail($this->email),
          "phone" => User::checkPhone($this->phone),
          "password" => User::checkPassword($this->password)
        );
        return $errors;
    }

  /**
   * Validates if an username submitted complies with the rules set
   *
   * @param string $username the username of an user
   *
   * @return string the error found
   * @return integer no error found
   */
    private static function checkUsername($username)
    {
        if (empty($username)) {
            return User::EMPTY_FIELD;
        }
        $pattern = "/^(?=.*[a-zA-Z]{4,})(?=.*[\d]{2,})[a-zA-Z0-9]{1,}$/";
        if (preg_match($pattern, $username) === 0) {
            return User::USERNAME;
        }
        return 1;
    }

  /**
   * Validates if an email submitted complies with the rules set
   *
   * @param string $email the email of an user
   *
   * @return string the error found
   * @return integer no error found
   */
    private static function checkEmail($email)
    {
        if (empty($email)) {
            return User::EMPTY_FIELD;
        }
        $pattern = "/(^[a-zA-Z0-9_.]+[@]{1}[a-z0-9]+[\.][a-z]+$)/";
        if (preg_match($pattern, $email) === 0) {
            return User::EMAIL;
        }
        return 1;
    }

  /**
   * Validates if a phone submitted complies with the rules set
   *
   * @param string $phone the phone of an user
   *
   * @return string the error found
   * @return integer no error found
   */
    private static function checkPhone($phone)
    {
        if (empty($phone)) {
            return User::EMPTY_FIELD;
        }
        $pattern = "/\d{10,}/";
        if (preg_match($pattern, $phone) === 0) {
            return User::PHONE;
        }
        return 1;
    }

  /**
   * Validates if a password submitted complies with the rules set
   *
   * @param string $password the password of an user
   *
   * @return string the error found
   * @return integer no error found
   */
    private static function checkPassword($password)
    {
        if (empty($password)) {
            return User::EMPTY_FIELD;
        }
        $pattern = "/^(?=.*[a-z]{1,})(?=.*[A-Z]{1})(?=.*-{1}).{6,}$/";
        if (preg_match($pattern, $password) === 0) {
            return User::PASSWORD;
        }
        return 1;
    }
}
