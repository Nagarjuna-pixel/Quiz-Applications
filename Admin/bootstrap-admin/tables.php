<?php
$servername = "localhost";
$username = "root";
$password = "";
                                $dbname = "quiz1";

// Create connection
                            $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
                            if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                            }
                            ?>

<?php include './includes/html.php';?>

    <!-- Page Wrapper -->
    <?php include './includes/dashboard.php';?>
            <!-- Nav Item - Pages Collapse Menu -->
           <?php include './includes/components.php';?>

            <!-- Nav Item - Utilities Collapse Menu -->
            <?php include './includes/Utilities.php';?>

            <!-- Divider -->
            <?php include './includes/pages.php';?>
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>
           
             <hr class="sidebar-divider d-none d-md-block">

<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>
<hr class="sidebar-divider d-none d-md-block">


<div class="sidebar-card d-none d-lg-flex">
    <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
    <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
    <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
</div>

</ul>
            
            <!-- Nav Item - Tables -->


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <?php include './includes/topbar.php';?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">UserTables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
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
                                            <th>user-id</th>
                                            <th>username</th>
                                            <th>mobile no</th>
                                            <th>Age</th>
                                            <th>email</th>
                                            <th>password</th>
                                            <th>Delete</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                            <?php

$sql = "SELECT `user-id`, `username`, `mobile no`, `age`, `email`, `password` FROM users";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['user-id'] . "</td>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['mobile no'] . "</td>";
        echo "<td>" . $row['age'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['password'] . "</td>";
        echo  "<td><a href='tables.php?user-id =" . ($row['user-id']) . "' onclick='return confirm(\"Are you sure you want to delete this user?\") '>Delete</a></td>";
         echo "</tr>";
      
    }
} else {
    echo "0 results";
}
/*if (isset($_POST['user-id'])) {
    $userid = $_POST['user-id'];

    // Delete user details from the 'users' table
    $sql = "DELETE FROM users WHERE `user-id` = '$userid'";

    if ($conn->query($sql) === TRUE) {
        echo "User deleted successfully";
        header('Location: tables.php');
        exit(0);
    } else {
        echo "Error deleting user details: " . $conn->error;
        header('Location: tables.php');
        exit(0);
    }
} else {
    echo "User ID not found in POST request.";
}
*/
// Close connection
$conn->close();
?>
    
<br>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           <?php include './includes/footer.php';?>

</body>

</html>
