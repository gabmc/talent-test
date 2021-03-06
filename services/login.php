<?php

/**
 * Manages the user login logic
 *
 * @package services
 *
 */

include '../classes/User.php';
include '../db/Db.php';

session_start();

if (isset($_POST['submit'])) {
    try {
        $errors = User::login($_POST['username'], $_POST['password']);
        $errorsGet = "";
        foreach ($errors as $key => $val) {
            if ($val !== 1) {
                if (strlen($errorsGet) > 0) {
                    $errorsGet = $errorsGet . '&' . $key . '=' . $val;
                } else {
                    $errorsGet = $key . '=' . $val;
                }
            }
        }
        if (strlen($errorsGet) > 0) {
            header("Location: ../../views/login.php?" . $errorsGet);
            exit;
        } else {
            $user = JsonDb::select('users', ['username' => $_POST['username'], 'password' => $_POST['password']]);
            if (sizeof($user) > 0) {
                $user = $user[0];
                $_SESSION['user'] = serialize(new User($user->username, $user->email, $user->phone, $user->password));
                header("Location: ../views/home.php");
                exit;
            } else {
                header("Location: ../views/login.php?wrong=1");
                exit;
            }
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
