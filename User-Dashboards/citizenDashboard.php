<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard - Citizen</title>
        <link rel="stylesheet" href="../stylesheet-css/StyleDashboard/styleDashboard.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="../javascript/switchFunction/switchCitizen.js"></script>
        <script src="../User-Dashboards/javascriptCitizen/validComplaint.js"></script>
    </head>
    <body>
        <header>
            <!-- Navigation Bar -->
            <nav class="navbar navbar-dark sticky-top flex-md-nowrap shadow" style="background-color: #24292e;">
                <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Welcome, <?php echo $_SESSION["username"]; ?></a>
                <ul class="navbar-nav px-3">
                    <li class="nav-item text-nowrap">
                        <form action="http://localhost/wp_project/WP-Project/php-scripts/dashboardScripts/dashboardCitizen.php" method="POST">
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
                            <a class="nav-link" href="#" onclick="showComplaintStatus()">Complaint Status</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="#" onclick="showRegisterNewComplaint()">Register New Complaint</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <main class="col-md-10 ml-sm-auto col-lg-10 px-md-4">
                    <div id="citizen-complaint-status">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h1>Complaint Status</h1>
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

                            $userID = $_SESSION["username"];

                            $citizenIDQuery = "SELECT citizen_id FROM citizen WHERE username='$userID'";
                            $citizenIDResult = $conn->query($citizenIDQuery);
                            $citizenIDtemp = mysqli_fetch_array($citizenIDResult);
                            $citizenID = $citizenIDtemp[0];

                            if($citizenIDResult != false) {

                                $getComplaintQuery = "SELECT complaint.complaint_id, complaint.complaint_desc, complaint.complaint_status, complaint.location, lodges.dt FROM complaint INNER JOIN lodges ON complaint.complaint_id = lodges.complaint_id WHERE lodges.citizen_id='$citizenID'";

                                $result = $conn->query($getComplaintQuery);

                                if(mysqli_num_rows($result) > 0) {

                                    echo 
                                        "<tr class='thead-dark'>
                                            <th>Complaint ID</th>
                                            <th>Complaint Description</th>
                                            <th>Complaint Status</th>
                                            <th>Complaint Location</th>
                                            <th>Date-Time</th>
                                        </tr>";

                                    while($row = mysqli_fetch_array($result)) {

                                        echo 
                                        "<tr>
                                            <td>$row[0]</td>
                                            <td>$row[1]</td>
                                            <td>$row[2]</td>
                                            <td>$row[3]</td>
                                            <td>$row[4]</td>
                                        </tr>";
                                    }
                                }
                                else {
                                    echo "<div class='alert alert-danger'>
                                            <h4>No complaints registered yet !</h4>
                                          </div>";
                                }
                            }

                            $conn->close();

                            ?>
                            </table>
                        </div>
                    </div>
                    <div id="citizen-register-new-complaint" style="display: none;">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h1>Register New Complaint</h1>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <form name="register-complaint" onsubmit="return validNewComplaint()" action="http://localhost/wp_project/WP-Project/php-scripts/dashboardScripts/dashboardCitizen.php" method="POST">
                                    <div class="mb-4">
                                        <label for="new-complaint">Complaint</label>
                                        <textarea name="new-complaint" id="new-complaint" class="form-control" required placeholder="Limit: 200 characters"></textarea>
                                    </div>
                                    <div class="mb-5">
                                        <label for="location">Location</label>
                                        <select class="form-control" name="location" id="location" required>
                                            <option value="Andheri">Andheri</option>
                                            <option value="D.N. Nagar">D.N. Nagar</option>
                                            <option value="Jogeshwari">Jogeshwari</option>
                                            <option value="Juhu">Juhu</option>
                                            <option value="Kandivali">Kandivali</option>
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <button type="submit" name="submit-complaint" id="submit-complaint" class="btn btn-outline-success">Register Complaint</button>
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