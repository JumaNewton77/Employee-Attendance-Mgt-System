<?php
session_start();
require_once "../Connect.php";

if (isset($_SESSION['employee_id'])) {
    $userId = $_SESSION['employee_id'];

    $_SESSION['start_time'] = time();
}