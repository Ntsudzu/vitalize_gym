<?php
$conn = new mysqli("localhost", "root", "", "vitalize_db");
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["error" => "DB connection failed"]);
    exit;
}

$sql = "SELECT id, program_name FROM gymnastics_programs ORDER BY program_name";
$result = $conn->query($sql);

$programs = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $programs[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($programs);

$conn->close();
