<?php

include '../classes/User.php';
include '../db/Db.php';

if (isset($_POST['submit'])) {
    try {
        $errors = User::login($_POST['username'], $_POST['password']);
        $errorsGet = "";
        foreach($errors as $key => $val) {
            if ($val !== 1) {
                if (strlen($errorsGet) > 0)
                    $errorsGet = $errorsGet.'&'.$key.'='.$val;
                else
                    $errorsGet = $key.'='.$val;
            }
        }
        if (strlen($errorsGet) > 0) {
            header("Location: ../../views/login.php?".$errorsGet);
            exit;
        }
        else {
            // set session with user?
            // if
            $user = jsonDb::select('users', ['username'=>$_POST['username'], 'password'=>$_POST['password']])[0];
            header("Location: ../views/home.php");
            exit;
        }

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}


?>