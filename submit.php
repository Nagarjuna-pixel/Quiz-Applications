<?php

include './Admin/Bootstrap-admin/includes/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_GET['category'])) {
        $category = $_GET['category'];
        $userAnswers = $_POST['answer'];

        // Process submitted answers and calculate score
        // You need to compare $userAnswers with correct answers from the database

        // Display results
        echo "<h2>Score for " . $category . ":</h2>";
        // Display attempted, unattempted, correct, and wrong questions
    } else {
        echo "Invalid category. Please try again later.";
        exit;
    }
} else {
    header("Location: topics.php");
    exit;
}
?>
