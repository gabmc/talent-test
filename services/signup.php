<?php

include '../classes/User.php';
include '../db/Db.php';

if (isset($_POST['submit'])) {
    try {
        $user = new User($_POST['username'],$_POST['email'],$_POST['phone'],$_POST['password']);
        $errors = $user->signup();
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
            header("Location: ../../views/signUp.php?".$errorsGet);
            exit;
        }
        else {
            jsonDb::insert('users', $user);
            // set session with user?
            header("Location: ../views/home.php");
            exit;
        }

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}


?>