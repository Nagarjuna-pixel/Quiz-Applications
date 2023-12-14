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
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>FlexStart Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/project/css/aos.css" rel="stylesheet">
  <link href="/project/css/bootstrap.min.css" rel="stylesheet">
  <link href="/project/css/bootstrap-icons.css" rel="stylesheet">
  <link href="/project/css/glightbox.min.css" rel="stylesheet">
  <link href="/project/css/remixicon.css" rel="stylesheet">
  <link href="/project/css/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/project/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: FlexStart
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<style>
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
        .container .row h1{
          align-items: center;
          display:grid;
          margin:0 500px;
        }
</style>
<body>
  <div class="blurred-background"></div>
  <!-- ======= Header ======= -->
  <div style="text-align: right;position:fixed;margin:0 1100px; padding: 70px;white-space: nowrap;">
        <p>Welcome, <?php echo $username; ?>!</p>
    </div><br><br><br>
    <p style="text-align: right;position:fixed;margin:0 1125px; padding: 70px;">Logout</p>
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span>Quiz</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="Homepage.php">Home</a></li>
          <li><a class="nav-link scrollto" href="userleaderboard.php">Leaderboard</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up" style="text-align: center; display: flex; justify-content: center; white-space: nowrap;padding-top:-10px;">
            We offer modern solutions for grow<br> and improve your knowledge
        </h1>
          <br><br>
         <div class="button">
         <a href="topics.php"><button style="text-align:center; justify-content: center; border-radius:10px ;background-color:rgba(0, 0, 255, 0.445); height:50px;width:200px;margin:0 400px;color:white;font-family:verdana;">Get Started</button></a>
         </div>
          </div>
        </div>
      </div>
    </div>
  

  </section><!-- End Hero -->
  <a href="Login.php"> <img src="logout.png" height="50px" width="50px" style="position: fixed; top: 100px; right: 100px;"> </a>
  
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>FlexStart</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/project/js/purecounter_vanilla.js"></script>
  <script src="/project/js/aos.js"></script>
  <script src="/project/js/bootstrap.bundle.min.js"></script>
  <script src="/project/js/glightbox.min.js"></script>
  <script src="/project/js/isotope.pkgd.min.js"></script>
  <script src="/project/js/swiper-bundle.min.js"></script>
  <script src="/project/js/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/project/js/main.js"></script>

</body>

</html>