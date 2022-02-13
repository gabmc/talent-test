<?php

/**
 * Manages the message posting logic
 *
 * @package services
 *
 */

include '../classes/User.php';
include '../classes/Message.php';
include '../db/Db.php';

session_start();

if (isset($_POST['submit'])) {
    try {
        $user = unserialize($_SESSION['user']);
        JsonDb::insert('messages', ['body' => $_POST['body'], 'author' => $user->getUsername(),
        'date' => date('Y.m.d')]);
        header("Location: ../views/home.php");
        exit;
    }
    catch (DbException $e) {
        throw $e;
    }
}
