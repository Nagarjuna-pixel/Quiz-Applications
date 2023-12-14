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
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
       
                <!-- End of Topbar -->
                <h1>Leaderboard of users</h1>
                
                <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>username</th>
                                            <th>Date</th>
                                            <th>Category</th>
                                            <th>Score</th>
                                            <th>Rank</th>
                                        <?php
                                        include './includes/db_connection.php';
                                        $query = "SELECT `username`, `date`, `score`, `category`, rank from `quiz_results`";
                                        $result = $conn->query($query);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row['username'] . "</td>";
                                                echo "<td>" . $row['date'] . "</td>";
                                                echo "<td>" . $row['category'] . "</td>";
                                                echo "<td>" . $row['score'] . "</td>";
                                                echo "<td>" . $row['rank'] . "</td>";
                                                echo "</tr>";
                                            }
                                        }
                                        
                                        // Close connection
                                        $conn->close();
                                        ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

            <!-- Footer -->
           <?php include './includes/footer.php';?>

</body>

</html>