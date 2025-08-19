<!-- forms/view_programs.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Programs List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
  <h2>Available Programs</h2>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Program Name</th>
        <th>Coach</th>
        <th>Duration</th>
        <th>Skill Level</th>
      </tr>
    </thead>
    <tbody>
      <?php
      require_once '../config/db.php';
      $result = $conn->query("SELECT * FROM programs");
      while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['program_name']}</td>
                <td>{$row['coach_name']}</td>
                <td>{$row['duration_weeks']} weeks</td>
                <td>{$row['skill_level']}</td>
              </tr>";
      }
      ?>
    </tbody>
  </table>
</body>
</html>
