<?php
session_start();
include 'db.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php');
    exit();
}

// Fetch all exams
$query = "SELECT * FROM exams";
$exams = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Manage Exams</title>
    <link href="css/bootstrap.min.css" rel="stylesheet"></head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Manage Exams</h1>

        <!-- List all exams -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Exam Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($exams)) { ?>
                    <tr>
                        <td><?php echo $row['exam_name']; ?></td>
                        <td>
                            <!-- Delete button -->
                            <form method="post" action="delete_exam.php" onsubmit="return confirm('Are you sure you want to delete this exam?');" style="display:inline;">
                                <input type="hidden" name="exam_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
