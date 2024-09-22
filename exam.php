<?php
session_start();
include 'db.php';

// Check if the exam_id is set in the URL
if (!isset($_GET['exam_id']) || empty($_GET['exam_id'])) {
    die('No exam selected.');
}

$exam_id = intval($_GET['exam_id']);

// Fetch all questions for this exam
$query = "SELECT * FROM questions WHERE exam_id = '$exam_id'";
$result = mysqli_query($conn, $query);

// Fetch all questions into an array
$questions = array();
while ($row = mysqli_fetch_assoc($result)) {
    $questions[] = $row;
}

// Randomize the questions and limit to 20
shuffle($questions);  // Randomize the order of questions
$questions = array_slice($questions, 0, 20);  // Pick the first 20 questions

$total_questions = count($questions);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">    <style>
        body {
            background-color: #f8f9fa;
        }
        .question-container {
            display: none;
        }
        #question-1 {
            display: block;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Exam</h1>

        <!-- Progress bar -->
        <div class="progress mb-3">
            <div id="progress-bar" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <!-- Timer Display -->
        <div class="text-end mb-3">
            <h5>Time Left: <span id="timer">10:00</span></h5>
        </div>

        <form action="submit_exam.php" method="post" id="examForm">
            <input type="hidden" name="exam_id" value="<?php echo $exam_id; ?>">
            <div class="mb-3">
                <label for="user_name" class="form-label">Your Name:</label>
                <input type="text" name="user_name" class="form-control" id="user_name" required>
            </div>
            <div class="mb-3">
                <label for="user_mobile" class="form-label">Your Mobile Number:</label>
                <input type="text" name="user_mobile" class="form-control" id="user_mobile" required>
            </div>
            <!-- Loop through each question -->
            <?php foreach ($questions as $index => $question) { ?>
                <div class="question-container" id="question-<?php echo $index + 1; ?>">
                    <h5><?php echo ($index + 1) . ". " . $question['question']; ?></h5>
                    <input type="hidden" name="question_ids[]" value="<?php echo $question['id']; ?>">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="answers[<?php echo $question['id']; ?>]" value="1" required>
                        <label class="form-check-label"><?php echo $question['option1']; ?></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="answers[<?php echo $question['id']; ?>]" value="2">
                        <label class="form-check-label"><?php echo $question['option2']; ?></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="answers[<?php echo $question['id']; ?>]" value="3">
                        <label class="form-check-label"><?php echo $question['option3']; ?></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="answers[<?php echo $question['id']; ?>]" value="4">
                        <label class="form-check-label"><?php echo $question['option4']; ?></label>
                    </div>

                    <!-- Next button (only show if it's not the last question) -->
                    <?php if ($index + 1 < $total_questions) { ?>
                        <button type="button" class="btn btn-primary mt-3 w-100" id="next-btn-<?php echo $index + 1; ?>" onclick="nextQuestion(<?php echo $index + 1; ?>)">Next Question</button>
                    <?php } else { ?>
                        <button type="button" class="btn btn-success mt-3 w-100" onclick="submitExam()">Submit Exam</button>
                    <?php } ?>
                </div>
            <?php } ?>
        </form>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>

    <script>
        // Timer (10 minutes)
        var timeLeft = 10 * 60; // 10 minutes in seconds

        function startTimer() {
            var timerElement = document.getElementById('timer');
            var timerInterval = setInterval(function() {
                var minutes = Math.floor(timeLeft / 60);
                var seconds = timeLeft % 60;
                timerElement.textContent = minutes + ":" + (seconds < 10 ? "0" : "") + seconds;

                if (timeLeft <= 0) {
                    clearInterval(timerInterval);
                    document.getElementById('examForm').submit(); // Automatically submit the exam when time is up
                }

                timeLeft--;
            }, 1000);
        }



        function submitExam() {
            var form = document.getElementById('examForm');
            var userName = document.getElementById('user_name').value.trim();
            var userMobile = document.getElementById('user_mobile').value.trim();

            // Check if name and mobile number are filled out
            if (userName === '' || userMobile === '') {
                alert('Please enter your name and mobile number.');
                return; // Prevent form submission
            }

            // Mark all questions as answered if not answered
            var questionContainers = document.getElementsByClassName('question-container');
            for (var i = 0; i < questionContainers.length; i++) {
                var container = questionContainers[i];
                var radios = container.querySelectorAll('input[type="radio"]');
                var answered = Array.from(radios).some(radio => radio.checked);
                if (!answered) {
                    container.querySelector('input[type="radio"]').required = false; // Remove required for unselected
                }
            }
            form.submit(); // Submit the form
        }

        startTimer();

        // Function to move to the next question and update the progress bar
        function nextQuestion(currentIndex) {
            var nextIndex = currentIndex + 1;

            // Hide current question and show next question
            document.getElementById('question-' + currentIndex).style.display = 'none';
            document.getElementById('question-' + nextIndex).style.display = 'block';

            // Disable the next button after click to prevent multiple clicks
            document.getElementById('next-btn-' + currentIndex).disabled = true;

            // Update progress bar
            var totalQuestions = <?php echo $total_questions; ?>;
            var progressPercentage = (nextIndex / totalQuestions) * 100;
            var progressBar = document.getElementById('progress-bar');
            progressBar.style.width = progressPercentage + '%';
            progressBar.setAttribute('aria-valuenow', progressPercentage);
        }
    </script>
</body>
</html>
