<?php
session_start();
include 'db.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: index.php');
    exit();
}

// Fetch the list of exams for selecting where the CSV questions will be added.
$exams = mysqli_query($conn, "SELECT * FROM exams");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['csv_file'])) {
    $exam_id = $_POST['exam_id'];
    $file = $_FILES['csv_file']['tmp_name'];

    // Validate file upload
    if ($_FILES['csv_file']['error'] === UPLOAD_ERR_OK && ($handle = fopen($file, "r")) !== FALSE) {

        // Prepared statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO questions (exam_id, question, option1, option2, option3, option4, correct_option) 
                                VALUES (?, ?, ?, ?, ?, ?, ?)");

        // Bind the parameters
        $stmt->bind_param("issssss", $exam_id, $question, $option1, $option2, $option3, $option4, $correct_option);

        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            // Assign CSV data to variables
            $question = $data[0];
            $option1 = $data[1];
            $option2 = $data[2];
            $option3 = $data[3];
            $option4 = $data[4];
            $correct_option = $data[5];

            // Execute the prepared statement
            if (!$stmt->execute()) {
                echo "Error inserting data: " . $stmt->error;
            }
        }
        fclose($handle);
        $stmt->close();

        echo "Questions added successfully from CSV!";
    } else {
        echo "Error opening file or file upload error.";
    }
}
?>
