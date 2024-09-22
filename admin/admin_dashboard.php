<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
        <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .dashboard-link {
            padding: 15px;
            border-radius: 5px;
            text-decoration: none;
            display: block;
            color: #ffffff;
            background-color: #007bff;
            margin-bottom: 10px;
            text-align: center;
        }
        .dashboard-link:hover {
            background-color: #0056b3;
            color: #ffffff;
        }
        .dashboard-header {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center dashboard-header">Admin Dashboard</h1>
        <div class="row">
            <div class="col-md-4">
                <a href="add_exam.php" class="dashboard-link">Add New Exam</a>
            </div>
            <div class="col-md-4">
                <a href="admin_exam.php" class="dashboard-link">View Exam</a>
            </div>
            <div class="col-md-4">
                <a href="add_question.php" class="dashboard-link">Add New Question</a>
            </div>
            <div class="col-md-4">
                <a href="upload_csv.php" class="dashboard-link">Upload Questions via CSV</a>
            </div>
            <div class="col-md-4">
                <a href="Result.php" class="dashboard-link">View Result</a>
            </div>
            <div class="col-md-4">
                <a href="logout.php" class="dashboard-link">Logout</a>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
