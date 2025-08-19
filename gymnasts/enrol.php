<?php
require_once '../config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $program_id = $_POST['program_id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $experience = $_POST['experience_level'];

    $stmt = $conn->prepare("INSERT INTO gymnasts (name, age, experience_level) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $name, $age, $experience);
    $stmt->execute();
    $gymnast_id = $stmt->insert_id;

    $enrol_stmt = $conn->prepare("INSERT INTO enrolments (program_id, gymnast_id, enrolment_date) VALUES (?, ?, CURDATE())");
    $enrol_stmt->bind_param("ii", $program_id, $gymnast_id);
    $enrol_stmt->execute();

    echo "Enrolled successfully!";
}
?>
