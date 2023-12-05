<?php include './includes/html.php';?>

<?php include './includes/dashboard.php';?>
            <!-- Nav Item - Pages Collapse Menu -->
           <?php include './includes/components.php';?>

            <!-- Nav Item - Utilities Collapse Menu -->
            <?php include './includes/Utilities.php';?>

            <!-- Divider -->
            <?php include './includes/pages.php';?>
            <!-- Nav Item - Charts -->
            <?php include './includes/charting.php';?>

        <!-- Content Wrapper -->
       <?php include './includes/topbar.php';?>

       <h4>Add Question inside the Topic
       </h4>
       <style>
        .form-control{
            width:300px;
            height:40px;
        }
        </style>
  <form class="px-4 py-3">
    <div class="form-group">
      <label for="exampleDropdownFormEmail1">New Exam Category</label>
      <input type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="Exam Category">
    </div>
    <div class="form-group">
      <label for="exampleDropdownFormPassword1">Exam Time in minutes</label>
      <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Time in Minutes">
    </div>
    <div class="form-check">
      <input type="checkbox" class="form-check-input" id="dropdownCheck">
      <label class="form-check-label" for="dropdownCheck">
        Remember me
      </label>
    </div><br>
    <button type="submit" class="btn btn-primary">Update Exam</button>
  </form>

       <?php include './includes/footer.php';?>