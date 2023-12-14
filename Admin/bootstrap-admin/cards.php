<?php include './includes/html.php';?>
<?php
include './includes/db_connection.php';
$sql = "SELECT `Quiz-Category-Name` FROM `quiz-category`";
$result = $conn->query($sql);
?>
<?php include './includes/dashboard.php';?>
            <!-- Nav Item - Pages Collapse Menu -->
           <?php include './includes/components.php';?>

            <!-- Nav Item - Utilities Collapse Menu -->
            <?php include './includes/Utilities.php';?>

            <!-- Divider -->
            <!-- Nav Item - Charts -->
            <?php include './includes/charting.php';?>

        <!-- Content Wrapper -->
       <?php include './includes/topbar.php';?>

       <?php
        include './includes/db_connection.php';
       ?>
                    <!-- Topbar Navbar -->
                    <h4>Add Questions for their respective Category</h4><br>
                    <style>
                    .form-group{
                        width:1000px;
                        height:70px;
                        }
                    </style>
                    <div class="container-fluid">

                    <!-- Page Heading -->
                    <h4 class="h3 mb-2 text-gray-800">Questions Details</h4>
                    <form class="px-4 py-3" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="form-group">
</div>
<?php
include './includes/db_connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $topic = $_POST["category"];
    $questionno = $_POST["questionno"];
    $question = $_POST["question"];
    $optionA = $_POST["option1"];
    $optionB = $_POST["option2"];
    $optionC = $_POST["option3"];
    $optionD = $_POST["option4"];
    $correctAnswer = $_POST["answer"];

    // Insert data into the database
    $sql = "INSERT INTO questions (`category`,`question-no`,`question`, `option1`, `option2`, `option3`, `option4`, `answer`)
            VALUES ('$topic', '$questionno', '$question', '$optionA', '$optionB', '$optionC', '$optionD', '$correctAnswer')";

    if ($conn->query($sql) === TRUE) {?>
        <script>
            alert("Question Added Successfully");
            </script>
   <?php } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>  <div class="form-group">
<label for="exampleDropdownFormEmail1">Question No</label>
<input type="number" class="form-control" id="number" name="questionno" placeholder="Question no">
</div>
    <div class="form-group">
      <label for="exampleDropdownFormEmail1">Adding New Questions</label>
      <textarea class="form-control" id="questions" name="question" placeholder="Questions" rows="4" cols="50" required></textarea>
    </div><br><br><br>
    <div class="form-group">
      <label for="options">Option A</label>
      <input type="text" class="form-control" id="option1" name="option1" placeholder="Option1">
    </div>
    <div class="form-group">
      <label for="options">Option B</label>
      <input type="text" class="form-control" id="option2" name="option2" placeholder="Option2">
    </div>
    <div class="form-group">
      <label for="options">Option C</label>
      <input type="text" class="form-control" id="option3" name="option3" placeholder="Option3">
    </div>
    <div class="form-group">
      <label for="options">Option D</label>
      <input type="text" class="form-control" id="option4" name="option4" placeholder="Option4">
    </div>
    <div class="form-group">
      <label for="exampleDropdownFormEmail1">Correct Answer</label>
      <input type="text" class="form-control" id="exampleDropdownFormEmail1" name="answer" placeholder="Correct answer">
    </div>
    <div class="form-group">
      <label for="exampleDropdownFormEmail1">Category</label>
      <input type="text" class="form-control" id="category" name="category" placeholder="Category">
    </div>
    <button type="submit" class="btn btn-primary">Update Question</button>
  </form>
                <!--    <p class="mb-4">The Details below the category are <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div> -->

                    <!--    <div class="card-body">
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
                                    <tbody> -->
                                    <?php /*
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
        echo  "<td><a href='Quiz.php?Quiz-Category-id=". $row['Quiz-Category-id'] ."'>Select</a></td>";

         echo "</tr>";
      
    }
} else {
    echo "0 results";
}
*/
?>
                                  <!--  </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>-->

            <!-- Footer -->
           <?php include './includes/footer.php';?>
</body>

</html>