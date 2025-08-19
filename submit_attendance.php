<?php
// Connect to database
$conn = new mysqli("localhost", "root", "", "vitalize_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $program_id = $_POST['program_id'] ?? null;
    $gymnast_id = $_POST['gymnast_id'] ?? null;
    $attendance_date = $_POST['attendance_date'] ?? null;
    $attendance_status = $_POST['attendance_status'] ?? null;

    // Basic validation
    if (!$program_id || !$gymnast_id || !$attendance_date || !$attendance_status) {
        die("All fields are required.");
    }

    // Prepare insert statement
    $stmt = $conn->prepare("INSERT INTO gymnast_attendance (program_id, gymnast_id, attendance_date, attendance_status) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiss", $program_id, $gymnast_id, $attendance_date, $attendance_status);

    if ($stmt->execute()) {
        echo "<h3>Attendance recorded successfully!</h3>";
        echo '<p><a href="mark_attendance.html">Mark more attendance</a></p>';
        echo '<p><a href="index.php">Back to Home</a></p>';
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request method.";
}

$conn->close();
?>
