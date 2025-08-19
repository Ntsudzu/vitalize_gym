<?php
require_once '../config/db.php';
$result = $conn->query("SELECT * FROM programs");
?>

<table border="1">
    <tr>
        <th>Program Name</th>
        <th>Coach</th>
        <th>Duration (Weeks)</th>
        <th>Skill Level</th>
    </tr>
    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row['program_name'] ?></td>
        <td><?= $row['coach_name'] ?></td>
        <td><?= $row['duration_weeks'] ?></td>
        <td><?= $row['skill_level'] ?></td>
    </tr>
    <?php endwhile; ?>
</table>
