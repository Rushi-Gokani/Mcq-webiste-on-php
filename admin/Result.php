<?php
session_start();
include 'db.php';

// Check if user is logged in as admin
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: index.php');
    exit();
}

// Fetch results
$query = "SELECT er.id, e.exam_name, er.user_name, er.user_mobile, er.score, er.date 
          FROM exam_sessions er
          JOIN exams e ON er.exam_id = e.id";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Results</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/datatables.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h1 class="text-center">Exam Results</h1>
    <table id="resultsTable" class="table table-striped">
        <thead>
            <tr>
                <th>Exam Name</th>
                <th>User Name</th>
                <th>Mobile Number</th>
                <th>Score</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['exam_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['user_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['user_mobile']); ?></td>
                    <td><?php echo htmlspecialchars($row['score']); ?></td>
                    <td><?php echo htmlspecialchars($row['date']); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="admin_dashboard.php" class="btn btn-secondary mt-3 w-100">Back to Admin Dashboard</a>
           
    <!-- Include Bootstrap JS for better UI experience -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/dataTables.min.js"></script>

    <script>
        // Initialize DataTable
        $(document).ready(function() {
            $('#resultsTable').DataTable();
        });
    </script>
</body>
</html>
