<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
  <h2>Welcome, Admin</h2>
  <p><a href="add_program.html" class="btn btn-success">Add Program</a></p>
  <p><a href="view_programs.html" class="btn btn-info">View Programs</a></p>
  <p><a href="enrol_gymnast.html" class="btn btn-warning">Enroll Gymnast</a></p>
  <p><a href="mark_attendance.html" class="btn btn-secondary">Mark Attendance</a></p>
  <p><a href="track_progress.html" class="btn btn-primary">Track Progress</a></p>
  <p><a href="logout.php" class="btn btn-danger">Logout</a></p>
</body>
</html>
