<?php

include '../classes/User.php';
include '../db/Db.php';

session_start();

session_destroy();

header("Location: ../views/login.php");
exit;

?>