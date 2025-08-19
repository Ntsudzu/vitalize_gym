<?php
$conn = new mysqli("localhost", "root", "", "vitalize_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $program_id = $_POST['program_id'] ?? null;
    $gymnast_id = $_POST['gymnast_id'] ?? null;
    $progress_notes = $_POST['progress_notes'] ?? null;
    $score = $_POST['score'] ?? null;

    if (!$program_id || !$gymnast_id || !$progress_notes) {
        die("Please fill in all required fields.");
    }

    if ($score === '') {
        $score = null; // Allow null score
    } else {
        $score = intval($score);
        if ($score < 0 || $score > 100) {
            die("Score must be between 0 and 100.");
        }
    }

    $stmt = $conn->prepare("INSERT INTO gymnast_progress (program_id, gymnast_id, progress_notes, score, recorded_at) VALUES (?, ?, ?, ?, NOW())");
    $stmt->bind_param("iisi", $program_id, $gymnast_id, $progress_notes, $score);

    if ($stmt->execute()) {
        echo "<h3>Progress recorded successfully!</h3>";
        echo '<p><a href="track_progress.html">Record more progress</a></p>';
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
