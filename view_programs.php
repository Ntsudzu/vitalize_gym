<?php
// view_programs.php

$conn = new mysqli("localhost", "root", "", "vitalize_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all programs
$sql = "SELECT * FROM gymnastics_programs";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Programs</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { padding: 8px 12px; border: 1px solid #ccc; }
        th { background-color: #eee; }
        a.button { padding: 5px 10px; background: #3498db; color: white; text-decoration: none; border-radius: 4px; }
        a.button.delete { background: #dc3545; }
        a.button.home { background: #28a745; } /* Green for Home button */
    </style>
</head>
<body>
    <h2>Gymnastics Programs</h2>
    <a href="index.php" class="button home">Home</a>
    <a href="add_program.html" class="button">Add New Program</a>
    <table>
        <thead>
            <tr>
                <th>Program Name</th>
                <th>Coach</th>
                <th>Duration (weeks)</th>
                <th>Skill Level</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['program_name']); ?></td>
                <td><?php echo htmlspecialchars($row['coach_name']); ?></td>
                <td><?php echo htmlspecialchars($row['duration_weeks']); ?></td>
                <td><?php echo htmlspecialchars($row['skill_level']); ?></td>
                <td>
                    <a href="edit_program.php?id=<?php echo $row['id']; ?>" class="button">Edit</a>
                    <a href="delete_program.php?id=<?php echo $row['id']; ?>" class="button delete" onclick="return confirm('Delete this program?')">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="5">No programs found.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</body>
</html>

<?php
$conn->close();
?>
