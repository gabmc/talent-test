<?php

if (isset($_POST['submit'])) {

include '../classes/User.php';

// if (empty($_POST['username'])) {
//     header("Location: ../views/signUp.php?username=empty");
// }

// if (empty($_POST['email'])) {
//     header("Location: ../views/signUp.php?email=empty");
// }

// if (empty($_POST['phone'])) {
//     header("Location: ../views/signUp.php?phone=empty");
// }

// if (empty($_POST['password'])) {
//     header("Location: ../views/signUp.php?password=empty");
// }

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
// print($errorsGet);
if (strlen($errorsGet) > 0) {
    header("Location: ../../views/signUp.php?".$errorsGet);
    exit;
}
else {
    header("Location: ../views/home.php");
    exit;
}
// exit;

} catch (Exception $e) {
    echo $e->getMessage();
//     $_SESSION['message'] = $e->getMessage();
//     header("Location: localhost:8080/views/signUp.php");
// exit;
}
}


?>