<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the email, ID, and password from the form
    $email = isset($_POST["email-address"]) ? $_POST["email-address"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";

    // Replace the following with your actual database connection logic
    // For simplicity, we are using hardcoded values for demonstration purposes
    $validEmail = "user@example.com";
    $validPassword = "password123";

    // Validate email, ID, and password
    if (!empty($email) && !empty($password)) {
        if ($email == $validEmail && $password == $validPassword) {
            // Authentication successful
            header("Location: /Project/topics.html");
            // You can redirect the user to another page or perform additional actions here
        } else {
            // Authentication failed
            echo "Invalid email, ID, or password!";
        }
    } else {
        // Handle case where email, ID, or password is empty
        echo "Email, ID, and password are required!";
    }
}
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="/Project/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>Quiz</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">

    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

<link href="/Project/css/bootstrap.min.css" rel="stylesheet">

    <style>
      html,
body {
  height: 100%;
}

.form-signin {
  max-width: 330px;
  padding: 1rem;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
header{
  padding-bottom:0px;
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

<header data-bs-theme="dark">
  <div class="collapse text-bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4>About</h4>
          <p class="text-body-secondary">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4>Contact</h4>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white">Follow on Twitter</a></li>
            <li><a href="#" class="text-white">Like on Facebook</a></li>
            <li><a href="#" class="text-white">Email me</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
        <strong>Quiz</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>

<main>
<br>
<br>

<main class="form-signin w-100 m-auto">
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
     <img class="mb-4" src="data:image/png;base64,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" alt="" width="100" height="75">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input type="email" class="form-control" id="email-address" name="email-address" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="form-check text-start my-3">
      <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
      <label class="form-check-label" for="flexCheckDefault">
        Remember me
      </label>
    </div>
    <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
  </form>
</main>

<script src="/Project/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
