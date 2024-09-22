<?php
session_start();
include 'db.php';

// Get user answers from the form submission
$user_answers = $_POST['answers'];  // Array of question_id => selected_option
$question_ids = $_POST['question_ids'];  // Array of question_ids

$session_id = $_POST['exam_id']; // Assume session_id is passed from the form

// Fetch session details

$user_name = $_POST['user_name'];
$user_mobile = $_POST['user_mobile'];

$total_questions = count($question_ids);
$correct_answers = 0;
$incorrect_questions = [];

// Loop through each question and compare the user's answer with the correct answer
foreach ($question_ids as $question_id) {
    // Fetch the correct option from the database
    $query = "SELECT correct_option FROM questions WHERE id = '$question_id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    $correct_option = $row['correct_option'];

    // Check if the user's answer is correct
    if (isset($user_answers[$question_id]) && $user_answers[$question_id] == $correct_option) {
        $correct_answers++;
    } else {
        // If the answer is incorrect, store the question and options
        $query = "SELECT question, option1, option2, option3, option4 FROM questions WHERE id = '$question_id'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);

        $incorrect_questions[] = [
            'question' => $row['question'],
            'options' => [
                '1' => $row['option1'],
                '2' => $row['option2'],
                '3' => $row['option3'],
                '4' => $row['option4']
            ],
            'correct_option' => $correct_option,
            'user_answer' => $user_answers[$question_id] ?? null // User's selected option (if any)
        ];
    }
}

// Calculate the score as a percentage
$score = ($correct_answers / $total_questions) * 100;

// Insert the result into the database
$query = "INSERT INTO exam_sessions (exam_id, user_name, user_mobile, total_marks, score)
          VALUES ('$session_id', '$user_name', '$user_mobile', '$total_questions', '$score')";
mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Result</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
        <style>
        .correct-answer {
            background-color: #d4edda; /* Light green background for correct answers */
            color: #155724; /* Dark green text */
            font-weight: bold;
        }
        .incorrect-answer {
            background-color: #f8d7da; /* Light red background for incorrect answers */
            color: #721c24; /* Dark red text */
            font-weight: bold;
        }
        .user-answer {
            background-color: #f5c6cb; /* Light red for user's incorrect answers */
        }
    </style>
</head>
<body class="container mt-5">
    <h1 class="text-center">Your Result</h1>
    <div class="alert alert-info text-center">
        <h2>Your Score: <?php echo round($score, 2); ?>%</h2>
        <p>Correct Answers: <?php echo $correct_answers; ?> out of <?php echo $total_questions; ?></p>
    </div>

 

    <a href="index.php" class="btn btn-primary w-100 mt-4">Back to Exams</a>
</body>
</html>
