<?php

/**
 * Manages the user logout logic
 *
 * @package services
 *
 */

session_start();

session_destroy();

header("Location: ../views/login.php");
exit;
