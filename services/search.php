<?php

/**
 * Manages the message search logic
 *
 * @package services
 *
 */

include '../classes/Message.php';
include '../db/Db.php';

$messages = [];
if (isset($_GET['query'])) {
    try {
        if ($_GET['query'] !== "") {
            $messages = JsonDb::selectContains('messages', ['body' => $_GET['query']]);
        } else {
            $messages = JsonDb::select('messages', []);
        }
    } catch (Exception $e) {
        throw $e;
    }
} else {
    $messages = JsonDb::select('messages', []);
}
$messages = array_reverse($messages);
header('Content-Type: application/json; charset=utf-8');
echo json_encode($messages);
exit();
