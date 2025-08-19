<?php
session_start();

// Hardcoded admin credentials (change as needed)
define('ADMIN_USER', 'admin');
define('ADMIN_PASS', 'password123');

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === ADMIN_USER && $password === ADMIN_PASS) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: admin_dashboard.php'); // Redirect after login
        exit;
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Admin Login</title>
</head>
<body>
    <h2>Admin Login</h2>
    <?php if ($error): ?>
        <p style="color:red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <form method="POST" action="admin_login.php">
        <label for="username">Username:</label><br />
        <input type="text" id="username" name="username" required /><br /><br />
        
        <label for="password">Password:</label><br />
        <input type="password" id="password" name="password" required /><br /><br />
        
        <button type="submit">Login</button>
    </form>
</body>
</html>
