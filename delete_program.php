<?php
$conn = new mysqli("localhost", "root", "", "vitalize_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete program
    $stmt = $conn->prepare("DELETE FROM gymnastics_programs WHERE id=?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Program deleted successfully. <a href='view_programs.php'>Go back</a>";
    } else {
        echo "Error deleting program: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "No program ID specified.";
}

$conn->close();
?>
