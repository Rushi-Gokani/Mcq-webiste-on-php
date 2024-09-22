<?php
include 'db.php';
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $exam_name = mysqli_real_escape_string($conn, $_POST['exam_name']);
    mysqli_query($conn, "INSERT INTO exams (exam_name) VALUES ('$exam_name')");
    echo "<div class='alert alert-success' role='alert'>Exam added successfully!</div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Exam</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            margin-top: 50px;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #0d6efd;
        }
        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }
        .btn-primary:hover {
            background-color: #0b5ed7;
            border-color: #0a58ca;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">Add New Exam</h1>
        <form method="post">
            <div class="mb-3">
                <label for="exam_name" class="form-label">Exam Name:</label>
                <input type="text" class="form-control" id="exam_name" name="exam_name" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Add Exam</button>
        </form>
        <a href="admin_dashboard.php" class="btn btn-secondary mt-3 w-100">Back to Admin Dashboard</a>

    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
