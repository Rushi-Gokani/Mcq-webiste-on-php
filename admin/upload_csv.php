<?php
session_start();
include 'db.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php');
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

        // Read CSV file and insert data into the database
        $rowCount = 0;
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            if (count($data) == 6) { // Ensure there are exactly 6 columns
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
                $rowCount++;
            } else {
                echo "Invalid CSV format at row $rowCount. Please check the file.";
                break;
            }
        }
        fclose($handle);
        $stmt->close();

        echo "Successfully added $rowCount questions from CSV!";
    } else {
        echo "Error opening file or invalid file upload.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Questions via CSV</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h1>Upload Questions via CSV</h1>
    <form enctype="multipart/form-data" method="post">
        <div class="form-group">
            <label for="exam_id">Select Exam:</label>
            <select name="exam_id" class="form-control" id="exam_id" required>
                <?php while ($row = mysqli_fetch_assoc($exams)) { ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['exam_name']; ?></option>
                <?php } ?>
            </select>
        </div>
        
        <div class="form-group">
            <label for="csv_file">Select CSV File:</label>
            <input type="file" name="csv_file" class="form-control-file" accept=".csv" id="csv_file" required>
        </div>

        <input type="submit" value="Upload CSV" class="btn btn-primary">
    </form>
</body>
</html>
