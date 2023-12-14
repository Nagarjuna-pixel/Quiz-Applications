<?php

session_start();

// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Get the username from the session
$username = $_SESSION['username'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="/project/js/color-modes.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quiz Results</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="/project/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('https://img.freepik.com/free-vector/quiz-background-with-flat-objects_23-2147593080.jpg');
            background-size: cover;
            background-position: center;
            font-family: 'Arial', sans-serif;
        }

        .blur-background {
            position: relative;
            width: 100%;
            height: 100vh;
            background: inherit;
        }

        .blur-background::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: inherit;
            filter: blur(10px);
            z-index: -1;
        }
    </style>
</head>
<?php include './Admin/bootstrap-admin/includes/header.php'; ?>
<body>
    
       
    <div class="blur-background">

        <div class="container">
        <div style="text-align: right; padding: 10px;">
        <p>Welcome, <?php echo $username; ?>!</p>
    </div>
    <p style="text-align: right;position:fixed;margin:0 1080px; padding: 30px;">Logout</p>
            <?php
            // Database connection details
            include './Admin/Bootstrap-admin/includes/db_connection.php';

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['category'])) {
                $selectedTopic = $_POST['category'];
            
                // Retrieve all questions for the selected topic
                $sqlQuestions = "SELECT * FROM questions WHERE category = ?";
                $stmtQuestions = $conn->prepare($sqlQuestions);
            
                // Check for errors in preparing the statement
                if (!$stmtQuestions) {
                    die("Error in preparing the questions statement: " . $conn->error);
                }
            
                $stmtQuestions->bind_param('s', $selectedTopic);
                $stmtQuestions->execute();
                $resultQuestions = $stmtQuestions->get_result();
            
                // Initialize counters
                $correctAnswers = 0;
                $attemptedQuestions = 0;
            
                // Retrieve total questions for the selected topic
                $sqlTotalQuestions = "SELECT COUNT(*) AS total FROM questions WHERE category = ?";
                $stmtTotalQuestions = $conn->prepare($sqlTotalQuestions);
            
                // Check for errors in preparing the statement
                if (!$stmtTotalQuestions) {
                    die("Error in preparing the total questions statement: " . $conn->error);
                }
            
                $stmtTotalQuestions->bind_param('s', $selectedTopic);
                $stmtTotalQuestions->execute();
                $resultTotalQuestions = $stmtTotalQuestions->get_result();
                $rowTotalQuestions = $resultTotalQuestions->fetch_assoc();
                $totalQuestions = $rowTotalQuestions['total'];
            
                // Loop through the submitted answers to count attempted and correct questions
                while ($row = $resultQuestions->fetch_assoc()) {
                    $questionId = $row['question-id'];
            
                    // Assuming that the answers are submitted as an array named 'answers'
                    if (isset($_POST['quizanswer'][$questionId])) {
                        $attemptedQuestions++;
            
                        // Assuming that the correct answer is stored in the 'correct_answer' column
                        $correctAnswer = $row['answer'];
                        $userAnswer = $_POST['quizanswer'][$questionId];
            
                        if ($correctAnswer === $userAnswer) {
                            $correctAnswers++;
                        }
                    }
                }
            
                // Calculate unattempted and incorrect questions
                $unattemptedQuestions = $totalQuestions - $attemptedQuestions;
                $incorrectAnswers = $attemptedQuestions - $correctAnswers;?>
                <br><br><br><br><br>
                <main class="container">
  <div class="bg-body-tertiary p-5 rounded">
    <h1 style="text-align:center;">Results for <?php echo $selectedTopic; ?></h1>
               <?php echo "<p>Total Questions: $totalQuestions</p>";
                echo "<p>Attempted Questions: $attemptedQuestions</p>";
                echo "<p>Unattempted Questions: $unattemptedQuestions</p>";
                echo "<p>Correct Answers: $incorrectAnswers</p>";
                echo "<p>Incorrect Answers: $correctAnswers</p>";
                echo "<p>Score:$incorrectAnswers/$totalQuestions";?><br><br>
    <a style="align-items:center;" class="btn btn-lg btn-primary" href="/Project/topics.php" role="button">Go to Topics page</a>
  </div>
</main>
           
           <?php 
            }
            $conn->close();
            ?>
        </div>

        <a href="Login.php"> <img src="logout.png" height="50px" width="50px" style="position: fixed; top: 100px; right: 70px;"> </a>
        <script src="/project/js/bootstrap.bundle.min.js"></script>
    </div>
</body>

</html>

