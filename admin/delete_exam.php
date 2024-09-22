
<?php
session_start();
include 'db.php';

// Ensure the admin is logged in
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php');
    exit();
}

// Check if the exam ID is provided in POST data
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['exam_id'])) {
    $exam_id = $_POST['exam_id'];

    // Delete the exam and associated questions
    $query = "DELETE FROM exams WHERE id = '$exam_id'";
    if (mysqli_query($conn, $query)) {
        // Redirect back to the admin panel with a success message
        $_SESSION['message'] = "Exam deleted successfully.";
        header('Location: admin_dashboard.php');
    } else {
        // Redirect back with an error message
        $_SESSION['message'] = "Failed to delete the exam. Please try again.";
        header('Location: admin_dashboard.php');
    }
} else {
    // If exam_id is not set, redirect back to the admin panel
    header('Location: admin_dashboard.php');
}
?>
