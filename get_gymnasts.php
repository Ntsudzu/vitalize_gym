<?php
header('Content-Type: application/json');

if (!isset($_GET['program_id'])) {
    http_response_code(400);
    echo json_encode([]);
    exit;
}

$program_id = intval($_GET['program_id']);

$conn = new mysqli("localhost", "root", "", "vitalize_db");
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode([]);
    exit;
}

$sql = "SELECT id, gymnast_name FROM gymnast_enrolments WHERE program_id = ? ORDER BY gymnast_name";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $program_id);
$stmt->execute();
$result = $stmt->get_result();

$gymnasts = [];
while ($row = $result->fetch_assoc()) {
    $gymnasts[] = $row;
}

echo json_encode($gymnasts);

$stmt->close();
$conn->close();
?>

