<?php
require_once '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $program_name = $_POST['program_name'];
    $description = $_POST['description'];
    $coach_name = $_POST['coach_name'];
    $coach_contact = $_POST['coach_contact'];
    $duration_weeks = $_POST['duration_weeks'];
    $skill_level = $_POST['skill_level'];

    $sql = "INSERT INTO programs (program_name, description, coach_name, coach_contact, duration_weeks, skill_level)
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssis", $program_name, $description, $coach_name, $coach_contact, $duration_weeks, $skill_level);

    if ($stmt->execute()) {
        echo "Program added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
