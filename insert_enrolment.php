<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "vitalize_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $program_id = $_POST['program_id'];
    $gymnast_name = $_POST['gymnast_name'];
    $age = $_POST['age'];
    $experience_level = $_POST['experience_level'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO gymnast_enrolments (program_id, gymnast_name, age, experience_level) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isis", $program_id, $gymnast_name, $age, $experience_level);

    if ($stmt->execute()) {
        echo "<h3>Gymnast enrolled successfully!</h3>";
        echo '<p><a href="index.php">🏠 Back to Home</a></p>';
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request method.";
}

$conn->close();
?>
