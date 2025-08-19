<?php
$conn = new mysqli("localhost", "root", "", "vitalize_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Update program data
    $id = $_POST['id'];
    $program_name = $_POST['program_name'];
    $description = $_POST['description'];
    $coach_name = $_POST['coach_name'];
    $coach_contact = $_POST['coach_contact'];
    $duration_weeks = $_POST['duration_weeks'];
    $skill_level = $_POST['skill_level'];

    $stmt = $conn->prepare("UPDATE gymnastics_programs SET program_name=?, description=?, coach_name=?, coach_contact=?, duration_weeks=?, skill_level=? WHERE id=?");
    $stmt->bind_param("ssssisi", $program_name, $description, $coach_name, $coach_contact, $duration_weeks, $skill_level, $id);

    if ($stmt->execute()) {
        echo "Program updated successfully. <a href='view_programs.php'>Go back</a>";
    } else {
        echo "Error updating program: " . $stmt->error;
    }
    $stmt->close();
} else if (isset($_GET['id'])) {
    // Show form with existing data
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM gymnastics_programs WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo "Program not found.";
        exit;
    }

    $program = $result->fetch_assoc();
    $stmt->close();
} else {
    echo "No program ID provided.";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Program</title>
</head>
<body>
<h2>Edit Program</h2>
<form method="POST" action="edit_program.php">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($program['id']); ?>">
    <label>Program Name:</label><br>
    <input type="text" name="program_name" value="<?php echo htmlspecialchars($program['program_name']); ?>" required><br><br>

    <label>Description:</label><br>
    <textarea name="description" required><?php echo htmlspecialchars($program['description']); ?></textarea><br><br>

    <label>Coach Name:</label><br>
    <input type="text" name="coach_name" value="<?php echo htmlspecialchars($program['coach_name']); ?>" required><br><br>

    <label>Coach Contact:</label><br>
    <input type="text" name="coach_contact" value="<?php echo htmlspecialchars($program['coach_contact']); ?>" required><br><br>

    <label>Duration (weeks):</label><br>
    <input type="number" name="duration_weeks" value="<?php echo htmlspecialchars($program['duration_weeks']); ?>" required><br><br>

    <label>Skill Level:</label><br>
    <select name="skill_level" required>
        <option value="Beginner" <?php if($program['skill_level']=='Beginner') echo 'selected'; ?>>Beginner</option>
        <option value="Intermediate" <?php if($program['skill_level']=='Intermediate') echo 'selected'; ?>>Intermediate</option>
        <option value="Advanced" <?php if($program['skill_level']=='Advanced') echo 'selected'; ?>>Advanced</option>
    </select><br><br>

    <input type="submit" value="Update Program">
</form>
</body>
</html>
