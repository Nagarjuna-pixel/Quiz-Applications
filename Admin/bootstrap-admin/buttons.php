<?php include './includes/html.php';?>

<style>


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

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-top-left-radius: -1px;
  border-top-right-radius: -1px;
  border-bottom-right-radius: -1px;
  border-bottom-left-radius: -1px;
  border-color:black;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: -1px;
  border-top-right-radius: -1px;
  border-color:black;
}
    </style>

    <!-- Page Wrapper -->
    <?php include './includes/dashboard.php';?>
            <!-- Nav Item - Pages Collapse Menu -->
           <?php include './includes/components.php';?>

            <!-- Nav Item - Utilities Collapse Menu -->
            <?php include './includes/Utilities.php';?>

            <!-- Divider -->
            <!-- Nav Item - Charts -->
            <?php include './includes/charting.php';?>

            <!-- Divider -->
            
                        <!-- Nav Item - Alerts -->
                        <?php include './includes/topbar.php';?>
                        <main class="form-signin w-100 m-auto">
  <div class="user-form">
                        <form method="POST">
    <img class="mb-4" src="quiz-application.png" alt="" width="100" height="85">
    <h1 class="h3 mb-3 fw-normal">Add category</h1>
    <div class="form-floating">
    <label for="floatingInput">Add New Category</label>
      <input type="text" class="form-control" id="floatingInput" name="email-address" placeholder="Category">
    </div><br>
    <div class="form-floating">
    <label for="floatingPassword">Exam Time in Minutes</label>
      <input type="number" class="form-control" id="floatingPassword" name="password" placeholder="Time in Minutes" >
    </div>
        <br>
    <button class="btn btn-primary w-100 py-2" type="submit" name="submit">Submit</button>
  </form>
  </div>
</main>
<br><br>
<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Category Details</h1>
                    <p class="mb-4">The Details below the category are <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Category-id</th>
                                            <th>Category-Name</th>
                                            <th>Quiz Time</th>
                                            <th>Select</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include './includes/db_connection.php';

$sql = "SELECT `Quiz-Category-id`, `Quiz-Category-Name`, `Quiz Time` FROM `quiz-category`";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Quiz-Category-id'] . "</td>";
        echo "<td>" . $row['Quiz-Category-Name'] . "</td>";
        echo "<td>" . $row['Quiz Time'] . "</td>";
        echo  "<td><a href='cards.php'>Select</a></td>";
         echo "</tr>";
      
    }
} else {
    echo "0 results";
}

?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <?php
if(isset($_POST['submit'])){
    include './includes/db_connection.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sanitize and validate user input
        $quizcategory = $_POST["email-address"];
        $quiztime = $_POST["password"];
    
        // Query to check if the email and password match in the database
        $sql = "INSERT INTO `quiz-category` (`Quiz-Category-Name`, `Quiz Time`) VALUES ('$quizcategory', '$quiztime')";
        $result = $conn->query($sql);
    
        if ($result===TRUE) { ?>   
            <script type="text/javascript">
alert("Category Added Successfully");
    </script>
           <?php 
            exit();
        }else{
            echo "Error in the statement" . $sql  . $conn->error;
        }
    }
}
$conn->close();
?>


                        <?php include './includes/footer.php';?>
                        

</body>

</html>