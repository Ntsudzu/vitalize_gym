<?php
// insert_program.php

// Connect to database
$conn = new mysqli("localhost", "root", "", "vitalize_db");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $program_name = $_POST['program_name'];
    $description = $_POST['description'];
    $coach_name = $_POST['coach_name'];
    $coach_contact = $_POST['coach_contact'];
    $duration_weeks = $_POST['duration_weeks'];
    $skill_level = $_POST['skill_level'];

    $sql = "INSERT INTO gymnastics_programs (program_name, description, coach_name, coach_contact, duration_weeks, skill_level)
            VALUES ('$program_name', '$description', '$coach_name', '$coach_contact', '$duration_weeks', '$skill_level')";

    if ($conn->query($sql) === TRUE) {
        echo "Program added successfully!";
        echo '<p><a href="index.php">🏠 Back to Home</a></p>';
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
