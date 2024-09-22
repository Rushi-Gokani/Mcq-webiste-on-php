<?php
include 'db.php';
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php');
    exit();
}

$exams = mysqli_query($conn, "SELECT * FROM exams");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $exam_id = mysqli_real_escape_string($conn, $_POST['exam_id']);
    $question = mysqli_real_escape_string($conn, $_POST['question']);
    $option1 = mysqli_real_escape_string($conn, $_POST['option1']);
    $option2 = mysqli_real_escape_string($conn, $_POST['option2']);
    $option3 = mysqli_real_escape_string($conn, $_POST['option3']);
    $option4 = mysqli_real_escape_string($conn, $_POST['option4']);
    $correct_option = mysqli_real_escape_string($conn, $_POST['correct_option']);
    
    mysqli_query($conn, "INSERT INTO questions (exam_id, question, option1, option2, option3, option4, correct_option) 
                         VALUES ('$exam_id', '$question', '$option1', '$option2', '$option3', '$option4', '$correct_option')");
    echo "<div class='alert alert-success' role='alert'>Question added successfully!</div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Question</title>
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
        .form-label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">Add New Question</h1>
        <form method="post">
            <div class="mb-3">
                <label for="exam_id" class="form-label">Select Exam:</label>
                <select name="exam_id" class="form-select" id="exam_id" required>
                    <?php while ($row = mysqli_fetch_assoc($exams)) { ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['exam_name']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="question" class="form-label">Question:</label>
                <textarea name="question" class="form-control" id="question" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="option1" class="form-label">Option 1:</label>
                <input type="text" name="option1" class="form-control" id="option1" required>
            </div>

            <div class="mb-3">
                <label for="option2" class="form-label">Option 2:</label>
                <input type="text" name="option2" class="form-control" id="option2" required>
            </div>

            <div class="mb-3">
                <label for="option3" class="form-label">Option 3:</label>
                <input type="text" name="option3" class="form-control" id="option3" required>
            </div>

            <div class="mb-3">
                <label for="option4" class="form-label">Option 4:</label>
                <input type="text" name="option4" class="form-control" id="option4" required>
            </div>

            <div class="mb-3">
                <label for="correct_option" class="form-label">Correct Option (1-4):</label>
                <input type="number" name="correct_option" class="form-control" id="correct_option" min="1" max="4" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Add Question</button>
        </form>
        <a href="admin_dashboard.php" class="btn btn-secondary mt-3 w-100">Back to Admin Dashboard</a>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
