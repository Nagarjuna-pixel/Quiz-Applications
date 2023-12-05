<?php
include './includes/db_connection.php';
$quizid=$_POST['Quiz-Category-Name'];
$sql = "DELETE FROM `quiz-category` WHERE `Quiz-Category-Name` = '$quizid' ";
if ($conn->query($sql) === TRUE) { ?>
    <script type="text/javascript">
    alert("Users Deleted Successfully");
    header("Location:buttons.php");
</script>
  <?php }else{
    echo "Error deleting record: " . $conn->error;
  }
  
  $conn->close();
?>