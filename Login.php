<?php
include './Admin/Bootstrap-admin/includes/db_connection.php';

// Function to sanitize and validate input data
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate user input
    $username = sanitizeInput($_POST["username"]);
    $password = sanitizeInput($_POST["password"]);

    // Query to check if the username and password match in the database
    $sql = "SELECT * FROM users WHERE `username` = '$username' AND `password` = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Start a new session (not recommended, but based on your requirement)
        session_start();
        
        // Store user data in the session (not recommended)
        $_SESSION['username'] = $username;

        // Redirect to the homepage
        header("Location: Homepage.php");
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}

// Close the database connection
$conn->close();
?>




<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="/Project/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>Quiz Project</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">

    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

<link href="/Project/css/bootstrap.min.css" rel="stylesheet">


    <style>
        .error {
            color: red;
        }
       .blurred-background {
            background-image: url('https://img.freepik.com/free-vector/quiz-background-with-flat-objects_23-2147593080.jpg');
            background-size: cover;
            filter: blur(5px); /* Adjust the blur amount as needed */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
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
  

.form-signin {
  max-width: 330px;
  padding: 1rem;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input[type="text"] {
  margin-bottom: -1px;
  border-top-left-radius: -1px;
  border-top-right-radius: -1px;
  border-bottom-right-radius: 0px;
  border-bottom-left-radius: 0px;
  border-color:black;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
  border-color:black;
}
.profile{
  margin:0 1200px;
  position:relative;
  top:-500px;
  cursor:pointer;
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
    <div class="blurred-background"></div>
<?php include './Admin/Bootstrap-admin/includes/header.php';?>

    
<main class="form-signin w-100 m-auto">
  <div class="user-form">
  <?php
    // Display error message if any
    if (isset($error)) {
        echo '<p style="color: red;">' . $error . '</p>';
    }
    ?>
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <img class="mb-4" src="quiz-application.png" alt="" width="100" height="85">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
    </div>
    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" name="username" placeholder="Username">
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" >
      <label for="floatingPassword">Password</label>
    </div>
        <br>
   

    <div class="form-check text-start my-3">
      <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
      <label class="form-check-label" for="flexCheckDefault">
        Remember me
      </label>
    </div>
    <button class="btn btn-primary w-100 py-2" type="submit" name="submit">Sign in</button>
    <p class="mt-3 mb-5 text-body-secondary text-danger"><a href="/Project/signup.php">Don't have, create an account?</p>
    <p class="mt-5 mb-3 text-danger">&copy; 2017–2023</p>
  </form>
 
</div>
</main>
<a href="profile.php">
<div class="profile">
      <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAI0AAACNCAMAAAC9gAmXAAAAY1BMVEX////MzMxNTU3JycnQ0NBJSUnp6elDQ0PT09P7+/v29vY9PT1AQEDv7+/c3NzY2NiQkJCmpqbj4+O8vLxUVFRhYWFvb284ODiBgYGKioqsrKy0tLRcXFzDw8N3d3doaGiZmZn92lOFAAAE9ElEQVR4nO2bW5uaMBCGCyQQjhoicnBR//+vbEDbtbuZISfci+brxfZpV32Zmcwhib9+BQUFBQUFBQUFBQUF/SfK86JO27ZpmrZN6yLPfw6lbhsWJQ89fkasaesfIClStn78Vy3/yNLirSyptMk3kBekiKXvQilahU2+26h9h4GKBjXLq4GavXnyRsMun/Zpdl1jqaZdPu2zX/zkBzOWleewk3lSc5aVZxfztHYwEqf1zrLhJSL/wDi+vVUwEIawREjNCYOBiNe1XhAIhrDL0J1iGp+64QLyJD5xCpAlucclpfEqWsb3BOTxhlMAH0HI3FXxq7JuJtAve8LJATcxMWQ0/lc0GwQDnOUnlNWriUTHbyxPHsBdBx8w6jzDLp2KZXXXx0VpHh95R52BGS8hmCWcuRrHOSvnajdNMMvKc1c6K3ENnYMyBJIMhYnj/qLEcQwdwE/jFg29qo3j5KtcaZloPm3AxPFpVr/UxVeN2jTDlmnkwhrUgdzYwwAV4YCH8NNXQMTZp2S1achcatD0szpyrI1TKJ8uInzbUdJVHChYtsYBuj121PFUdgTqlW1GBvoIMmjFzQDYJrGDgbpyctWiUWcc65yjtrTUWYvmDL2c2cAAMexOYxXH8PjkSGPlKtBRjnFj5yrQNGzUohnBx7FYVTU8QN21sp+6xVlpzDfj4EGXTNU2TFxNMI15AlTXqJVG6NSpUsCjp3HTlYNel1Wz16ABqubjHUy7HKDPWt/L1VPmPRc47EbsqmMaaZwrvKhM8x+8pGYtlkVAM2qxqMBMTLhOtllEoQ7HPBuDC5wcdbLNouwI0pgucZhGq7tZbQN1OOY0YLrxQmPaHMM0Pjzlj2ZjBH+xDZxxTGmQMrU9aD508leoYJrtIfzpKKSlMKWBOz8idAqDLA1w2TTON3Au1tkTWB0FpmLzXAzXKbmqtDoKcEVZ1CmkhsvIAff8/oh2cNRE5jU8R/qBiCVbzjolGIz5Zq16w+PP220MMfSMPYzFPgV6ALRVHuCisNKY98XIotouD3BRWGksDvBRmo0mB25tVhpzGHjWXGgEChPHyMBgN2uix5jshhmH3rBHsZrD4T2KxTgcKw8V6ii7vTbs+aIESYC0Q89ArfZvcFdhwzgygkf2++kozYTQYIOd7b4fmgDJBQ6cTH3k8YSx3RPF4hijqTAa6/1iZJ8C3RookQ0Bh4MGpMmJIpimR17lchKNGQeh2cU0YM9FCDsgRx/lfGBQsnI6S1TlHEJmfhw6EEZmv+HIlcf0rues35suJoayyihaxGlWlapjetcj8S9nvoSIAQf5JKKD+GIf5zPff3xF2HSmumO4zIL0PL1eO/FxS+lvRiYRPyFn8kr7lCf+956QnztKh6eP+E15cWKDJ7vxh78SL/coljsmhCX3rjdnWXn67r7cW2KerksVRIwnzdhV8tB4FP5uJxW9zqyLqew9XpVKO/2VpFLWeb30l3644GQfnm8gFpo76Cr1V++XaXNuGzsl3+OqqKhslhWtxA4sUvVgbp5y2O/WvDCoUouyeCfDPFTcK4OqWd33vgtej7Hmnmg8vuOrDS3vN0sW7Xvu/1qxWrm4UgRI/t9VvPU7KI04y35UcU9U9qBn4TIZWCqPpvEmXdKX1aJS/o3exsltLHBSUadMTJzfOZ8ES+v3fgEmKCgoKCgoKCgoKCjoB/UbdV9NAsRsMF0AAAAASUVORK5CYII=" width="100" height="100"> 
</a>
</div>
<script src="/Project/js/bootstrap.bundle.min.js"></script>

    </body>
</html>

