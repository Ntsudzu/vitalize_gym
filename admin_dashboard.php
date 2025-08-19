<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: admin_login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Admin Dashboard</title>
</head>
<body>
    <h2>Welcome, Admin!</h2>
    <p>
        <a href="view_programs.php">Manage Programs</a><br />
        <a href="view_attendance.php">View Attendance Records</a><br />
        <a href="view_progress.php">View Progress Records</a><br />
        <a href="logout.php">Logout</a>
    </p>
</body>
</html>
