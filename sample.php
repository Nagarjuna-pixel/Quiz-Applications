<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Quiz</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>

<h1>Dynamic Quiz</h1>

<form id="quizForm">
    <?php
    include './Admin/Bootstrap-admin/includes/db_connection.php';

    // Fetch questions and options from the database
    $sql = "SELECT * FROM questions";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<h3>Question " . $row["question-no"] . ": " . $row["question"] . "</h3>";
            echo "<input type='radio' name='q" . $row["question-id"] . "' value='" . $row["option1"] . "'>" . $row["option1"] . "<br>";
            echo "<input type='radio' name='q" . $row["question-id"] . "' value='" . $row["option2"] . "'>" . $row["option2"] . "<br>";
            echo "<input type='radio' name='q" . $row["question-id"] . "' value='" . $row["option3"] . "'>" . $row["option3"] . "<br>";
            echo "<input type='radio' name='q" . $row["question-id"] . "' value='" . $row["option4"] . "'>" . $row["option4"] . "<br>";
        }
    } else {
        echo "0 results";
    }

    // Close connection
    $conn->close();
    ?>
    <br>
    <input type="button" value="Submit" onclick="calculateScore()">
</form>

<p id="result"></p>

<script>
    function calculateScore() {
        var score = 0;

        // Code to calculate the score (similar to the previous JavaScript code)

        // Display result
        var resultElement = document.getElementById("result");
        resultElement.innerHTML = "Your score is: " + score + "/number_of_questions"; // replace number_of_questions with the actual number of questions
    }
</script>

</body>
</html>
