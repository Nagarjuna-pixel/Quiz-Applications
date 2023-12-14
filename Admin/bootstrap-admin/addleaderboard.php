<?php
session_start();
?>
<?php include './includes/html.php';?>
 
<?php include './includes/dashboard.php';?>
            <!-- Nav Item - Pages Collapse Menu -->
           <?php include './includes/components.php';?>

            <!-- Nav Item - Utilities Collapse Menu -->
            <?php include './includes/Utilities.php';?>

            <!-- Divider -->
            <!-- Nav Item - Charts -->
            <?php include './includes/charting.php';?>
            <!-- Divider -->
            
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <?php include './includes/topbar.php';?>
        <style>
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
  border-bottom-left-radius:0px;
  border-bottom-right-radius:0px;
  border-color:black;
}

.form-signin input[type="date"] {
  margin-bottom: 10px;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
  border-color:black;
}

.form-signin input[type="number"] {
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
        <main class="form-signin w-100 m-auto">
  <div class="user-form">
                        <form method="POST">
    <img class="mb-4" src="quiz-application.png" alt="" width="100" height="85">
    <h1 class="h3 mb-3 fw-normal">Add Users in Leaderboard</h1>
    <div class="form-floating">
    <label for="floatingInput">Username</label>
      <input type="text" class="form-control" id="floatingInput" name="username" >
    </div><br>
    <div class="form-floating">
    <label for="floatingPassword">Date</label>
      <input type="date" class="form-control" id="floatingPassword" name="date" >
    </div>
    <div class="form-floating">
    <label>category</label>
      <input type="text" class="form-control" id="floatingInput" name="topic"  >
    </div>
    <div class="form-floating">
    <label for="floatingPassword">score</label>
      <input type="number" class="form-control" id="floatingInput" name="scoore">
    </div>
    <div class="form-floating">
    <label>Rank</label>
      <input type="number" class="form-control" id="floatingPassword" name="position">
    </div>
        <br>
    <button class="btn btn-primary w-100 py-2" type="submit" name="submit">Submit</button>
  </form>
  </div>
</main>

<?php
include './includes/db_connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $username = isset($_POST['username']) ? $_POST['username'] : "";
    $date = isset($_POST['date']) ? $_POST['date'] : "";
    $score = isset($_POST['scoore']) ? $_POST['scoore'] : "";
    $category = isset($_POST['topic']) ? $_POST['topic'] : "";
    $rank = isset($_POST['position']) ? $_POST['position'] : "";

    // Insert data into the database
    $insertQuery = "INSERT INTO quiz_results (username, date, score, category, rank) 
                    VALUES ('$username', '$date', '$score', '$category', '$rank')";

    if ($conn->query($insertQuery) === TRUE) {
        echo "Data stored successfully!";
    } else {
        echo "Error: " . $insertQuery . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>

        <?php include './includes/footer.php';?>

</body>

</html>