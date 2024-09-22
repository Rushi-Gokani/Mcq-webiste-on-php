<?php
include 'db.php';

$result = mysqli_query($conn, "SELECT * FROM exams");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Available Exams</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h1>Available Exams</h1>
    <form method="GET" action="exam.php">
        <div class="mb-3">
            <label for="exam_id" class="form-label">Select Exam:</label>
            <select name="exam_id" class="form-select" id="exam_id" required>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['exam_name']; ?></option>
                <?php } ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Start Exam</button>
    </form>
</body>
</html>
