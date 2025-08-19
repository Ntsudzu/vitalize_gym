<?php
require_once '../config/db.php';

$program_id = $_POST['program_id'];
$gymnast_id = $_POST['gymnast_id'];
$notes = $_POST['notes'];
$progress = $_POST['progress_percent'];

$sql = "INSERT INTO progress (program_id, gymnast_id, session_date, notes, progress_percent)
        VALUES (?, ?, CURDATE(), ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("iisi", $program_id, $gymnast_id, $notes, $progress);
$stmt->execute();

echo "Progress updated.";
?>
