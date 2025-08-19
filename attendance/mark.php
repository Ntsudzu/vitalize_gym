<?php
require_once '../config/db.php';

$program_id = $_POST['program_id'];
$gymnast_id = $_POST['gymnast_id'];
$status = $_POST['status'];

$sql = "INSERT INTO attendance (program_id, gymnast_id, session_date, status)
        VALUES (?, ?, CURDATE(), ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("iis", $program_id, $gymnast_id, $status);
$stmt->execute();

echo "Attendance recorded.";
?>
