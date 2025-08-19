<?php
// You can add session_start() here in future if login is required
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vitalize Gymnastics Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            text-align: center;
        }

        main {
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 8px;
        }

        h2 {
            color: #34495e;
        }

        .nav-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .nav-box {
            background-color: #3498db;
            color: white;
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .nav-box:hover {
            background-color: #2980b9;
        }

        footer {
            text-align: center;
            padding: 15px;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>

<header>
    <h1>Vitalize Gymnastics Management System</h1>
    <p>Welcome! Manage programs, enrol gymnasts, and track progress</p>
</header>

<main>
    <h2>Dashboard</h2>
    <div class="nav-grid">
        <a class="nav-box" href="add_program.html">➕ Add Program</a>
        <a class="nav-box" href="view_programs.php">📋 View/Edit/Delete Programs</a>
        <a class="nav-box" href="enrol_gymnast.html">🧍 Enrol Gymnast</a>
        <a class="nav-box" href="mark_attendance.html">🗓️ Mark Attendance</a>
        <a class="nav-box" href="track_progress.html">📈 Track Progress</a>
        <a class="nav-box" href="admin_login.php">🔐 Admin Login</a>
    </div>
</main>

<footer>
    &copy; <?php echo date("Y"); ?> Vitalize Fitness Platform. All rights reserved.
</footer>

</body>
</html>
