<?php
session_start();
require_once "../Connect.php";

if (isset($_SESSION['employee_id']) && isset($_SESSION['start_time'])) {
    $userId = $_SESSION['employee_id'];
    $startTime = $_SESSION['start_time'];
    $endTime = time();

    $totalSeconds = $endTime - $startTime;
    $hours = floor($totalSeconds / 3600);
    $minutes = floor(($totalSeconds / 60) % 60);

    require_once "../Connect.php";
    $sql = "INSERT INTO employee_sessions (employee_id, start_time, end_time, duration_hours, duration_minutes)
            VALUES ('$userId', FROM_UNIXTIME($startTime), FROM_UNIXTIME($endTime), $hours, $minutes)";

    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    unset($_SESSION['start_time']);
}