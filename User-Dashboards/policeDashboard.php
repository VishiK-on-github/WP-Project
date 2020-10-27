<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard - Police</title>
        <link rel="stylesheet" href="../stylesheet-css/StyleDashboard/styleDashboard.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="../javascript/switchFunction/switchPolice.js"></script>
    </head>
    <body>
        <header>
            <!-- Navigation Bar -->
            <nav class="navbar navbar-dark sticky-top flex-md-nowrap shadow" style="background-color: #24292e;">
                <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Welcome, <?php echo $_SESSION["location"];?> Police</a>
                <ul class="navbar-nav px-3">
                    <li class="nav-item text-nowrap">
                        <form action="http://localhost/wp_project/WP-Project/php-scripts/dashboardScripts/dashboardPolice.php" method="post">
                            <button class="btn btn-outline-danger" name="sign-out">Sign out</button>
                        </form>
                    </li>
                </ul>
            </nav>
        </header>
        <div class="container-fluid">
            <div class="row">
                <nav class="col-md-2 col-lg-2 d-md-block bg-light sidebar">
                    <div class="sidebar-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" onclick="showViewComplaint(this);">View Complaint</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick="showUpdateComplaintStatus(this);">Update Complaint Status</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <main class="col-md-10 ml-sm-auto col-lg-10 px-md-4">
                    <div id="police-station-view">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h1>View Complaint</h1>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                            <!-- Table entry contents -->
                            <?php

                            function OpenConnection() {
                                $dbhost = "localhost";
                                $dbuser = "root";
                                $dbpass = "1234";
                                $db = "wp_project";
                                $conn = new mysqli($dbhost, $dbuser, $dbpass,$db);

                                return $conn;
                            }

                            $conn = OpenConnection();

                            $pid = $_SESSION["pid"];

                            if(isset($pid)) {

                                $complaint_query = "SELECT complaint.complaint_id, complaint.complaint_desc, complaint.complaint_status FROM complaint INNER JOIN assign ON complaint.complaint_id = assign.complaint_id WHERE assign.police_id='$pid'";

                                $result = $conn->query($complaint_query);

                                if(mysqli_num_rows($result) > 0) {

                                    echo 
                                        "<tr class='thead-dark'>
                                            <th>Complaint ID</th>
                                            <th>Complaint Description</th>
                                            <th>Complaint Status</th>
                                        </tr>";

                                    while($row = mysqli_fetch_array($result)) {

                                        echo 
                                        "<tr>
                                            <td>$row[0]</td>
                                            <td>$row[1]</td>
                                            <td>$row[2]</td>
                                        </tr>";
                                    }
                                }
                                else {
                                    echo "<div class='alert alert-danger'>
                                            <h4>No complaints registered yet under this police station!</h4>
                                          </div>";
                                }
                            }

                            $conn->close();

                            ?>
                            </table>
                        </div>
                    </div>
                    <div id="police-station-update-complaint-status" style="display: none;">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h1>Update Complaint Status</h1>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <form action="http://localhost/wp_project/WP-Project/User-Dashboards/policeDashboard1.php" method="POST">
                                    <div class="mb-4">
                                        <label for="complaint-id">Complaint ID</label>
                                        <input type="number" name="complaint-id" id="complaint-id" class="form-control">
                                    </div>
                                    <div class="mb-4">
                                        <button class="btn btn-outline-success" type="submit" name="submit-update" id="submit-update">Get Status</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <footer>
            <!-- Footer -->
        </footer>
    </body>
</html>