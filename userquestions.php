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
<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="/project/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>Quiz Questions</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">

    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

<link href="/project/css/bootstrap.min.css" rel="stylesheet">

    <style>
      form button{
        align-items:center;
        justify-content:center;
        border-radius:10px;
        width:100px;
        height:40px;
        background-color:pink;
        margin:0 500px;
      }
         body {
            margin: 0;
            padding: 0;
           background-image: url('https://img.freepik.com/free-vector/quiz-background-with-flat-objects_23-2147593080.jpg'); /* Replace with your background image path */
            background-size: cover;
            font-family: 'Arial', sans-serif;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(10px); 
        }
            #timer-container {
            text-align: center;
            float:right;
        }

        #timer-image {
            width: 100px; /* Set your desired width */
            height: 100px; /* Set your desired height */
            float:right;
        }

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }
    </style>

    
  </head>
  <body>
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
      <symbol id="check2" viewBox="0 0 16 16">
        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
      </symbol>
      <symbol id="circle-half" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
      </symbol>
      <symbol id="moon-stars-fill" viewBox="0 0 16 16">
        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
      </symbol>
      <symbol id="sun-fill" viewBox="0 0 16 16">
        <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
      </symbol>
    </svg>
    
<?php include './Admin/bootstrap-admin/includes/header.php';?>
<div style="text-align: right; padding: 10px;">
        <p>Welcome, <?php echo $username; ?>!</p>
    </div>

<div id="timer-container">
    <img id="timer-image" src="https://image.shutterstock.com/image-vector/stopwatch-stop-watch-timer-flat-260nw-355549763.jpg" alt="Timer Image">
    <div id="timer"></div>
</div>

<script>
    // Set the timer duration in seconds
    var timerDuration = 1800; // 5 minutes in this example

    // Function to update the timer display
    function updateTimer() {
        var minutes = Math.floor(timerDuration / 60);
        var seconds = timerDuration % 60;

        // Add leading zeros if needed
        minutes = minutes < 10 ? '0' + minutes : minutes;
        seconds = seconds < 10 ? '0' + seconds : seconds;

        // Update the timer display
        document.getElementById('timer').innerText = minutes + ':' + seconds;

        // Decrement the timer duration
        timerDuration--;

        // Check if the timer has reached zero
        if (timerDuration < 0) {
            clearInterval(timerInterval);
            alert('Time is up!');
        }
    }

    // Call the updateTimer function every second
    var timerInterval = setInterval(updateTimer, 1000);
</script>
<br>
<div class="container">
  <main class="container">
  <div class="bg-body-tertiary p-5 rounded">

<?php
// Database connection details
include './Admin/Bootstrap-admin/includes/db_connection.php';

// Check if the 'topic' parameter is set in the URL
if (isset($_POST['category'])) {
    $topic = $_POST['category'];

    //Fetch questions related to the selected topic from the database
    $sql = " SELECT * FROM `questions` WHERE `category` = '$topic' ";
    $result = $conn->query($sql);

    // Check if there are questions for the selected topic
    if ($result->num_rows > 0) {?>
    <form method="POST" action="submit.php">
    <input type="hidden" name="category" value="<?php echo $topic; ?>">
        <h1>Questions for <?php echo "$topic" ?></h1>
<?php
        while ($row = $result->fetch_assoc()) {
    // Set the default value if not selected
    $selectedOption = isset($_POST['options'][$row['question-id']]) ? $_POST['options'][$row['question_id']] : '';

    echo "<p>{$row['question']}</p>";

    /*echo "<input type='radio' name='options[{$row['question-id']}]' value='option1' id='option1' " . ($selectedOption == 'option1' ? 'checked' : '') . ">";*/
    echo $row['option1'] . "<br/>";

    /*echo "<input type='radio' name='options[{$row['question-id']}]' value='option2' id='option2' " . ($selectedOption == 'option2' ? 'checked' : '') . ">";*/
    echo $row['option2'] . "<br/>";

  /* echo "<input type='radio' name='options[{$row['question-id']}]' value='option3' id='option3' " . ($selectedOption == 'option3' ? 'checked' : '') . ">";*/
    echo $row['option3'] . "<br/>";

    /*echo "<input type='radio' name='options[{$row['question-id']}]' value='option4' id='option4' " . ($selectedOption == 'option4' ? 'checked' : '') . ">";*/
    echo $row['option4'] . "<br/>";

    echo "<input type='text' name='quizanswer' id='quizanswer' >";
    echo "<br/>";

    echo "<br/>";
} 
    } else {
        echo "<p>No questions available for $topic </p>";
    }
} else {
    echo "<p>Error: Topic not specified</p>";
}

// Close the database connection
$conn->close();
?>
<br>
<button type="submit" name="submit" value="submit">SUBMIT</button>
</form>
</div>
</main>
    </div>
</body>

    

<footer class="text-body-secondary py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
    <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="../getting-started/introduction/">getting started guide</a>.</p>
  </div>
</footer>
<script src="/project/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
