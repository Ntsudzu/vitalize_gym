<?php
$conn = new mysqli("localhost", "root", "", "vitalize_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "
    SELECT 
        gp.id,
        pr.program_name,
        ge.gymnast_name,
        gp.progress_notes,
        gp.score,
        gp.recorded_at
    FROM gymnast_progress gp
    JOIN gymnastics_programs pr ON gp.program_id = pr.id
    JOIN gymnast_enrolments ge ON gp.gymnast_id = ge.id
    ORDER BY gp.recorded_at DESC
";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>View Gymnast Progress</title>
    <style>
        table {
            border-collapse: collapse;
            width: 90%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #333;
            padding: 8px 12px;
            text-align: left;
        }
        th {
            background-color: #eee;
        }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Gymnast Progress Records</h2>
    <table>
        <thead>
            <tr>
                <th>Program Name</th>
                <th>Gymnast Name</th>
                <th>Progress Notes</th>
                <th>Score</th>
                <th>Date Recorded</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['program_name']) ?></td>
                        <td><?= htmlspecialchars($row['gymnast_name']) ?></td>
                        <td><?= nl2br(htmlspecialchars($row['progress_notes'])) ?></td>
                        <td><?= $row['score'] !== null ? htmlspecialchars($row['score']) : '-' ?></td>
                        <td><?= htmlspecialchars($row['recorded_at']) ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="5" style="text-align:center;">No progress records found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
    <p style="text-align:center;">
        <a href="index.php">🏠 Back to Home</a> | 
        <a href="track_progress.html">Record Progress</a>
    </p>
</body>
</html>

<?php $conn->close(); ?>
