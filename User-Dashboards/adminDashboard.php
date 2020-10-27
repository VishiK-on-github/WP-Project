<?php
session_start(); 

	function OpenCon()  //Function to open connection to server
	{
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "1234";
		$db = "wp_project";
		$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
		return $conn;
	}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard - Admin</title>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="javascript/adminDashboard.js"></script>
        <link rel="stylesheet" href="../stylesheet-css/StyleDashboard/styleDashboard.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="../javascript/switchFunction/switchAdmin.js"></script>
    </head>
    <body>
        <header>
            <!-- Navigation Bar -->
            <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap shadow">
                <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Welcome <?php echo $_SESSION["username"]; ?></a>
                <ul class="navbar-nav px-3">
                    <li class="nav-item text-nowrap">
                    <form action="http://localhost/wp_project/WP-Project/php-scripts/dashboardScripts/dashboardAdmin.php" method="POST">
                        <button class="btn btn-outline-danger" id="sign-out" name="sign-out">Sign out</button>
                    </form>
                    </li>
                </ul>
            </nav>
        </header>
        <div class="container-fluid">
            <div class="row">
                <nav class="col-md-2 col-lg-2 d-md-block bg-light sidebar">
                    <div class="sidebar-sticky pt-3">
                        <h4 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-3 text-muted">
                            <span>Police Station</span>
                        </h4>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="#" onclick="showViewPoliceStation(this)">View Police Stations</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#addpolice" onclick="showAddPoliceStation(this)">Add Police Station</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#updatepolice" onclick="showUpdatePoliceStation(this)">Update Police Station</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#deletepolice" onclick="showDeletePoliceStation(this)">Delete Police Station</a>
                            </li>
                        </ul>
                        <h4 class="d-flex justify-content-between align-items-center px-3 mt-4 mb-3 text-muted">
                            <span>Citizen</span>
                        </h4>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="#viewcitizen" onclick="showViewCitizen(this)">View Citizen</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#addcitizen" onclick="showAddCitizen(this)">Add Citizen</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#updatecitizen" onclick="showUpdateCitizen(this)">Update Citizen</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#deletecitizen" onclick="showDeleteCitizen(this)">Delete Citizen</a>
                            </li>
                        </ul>
                        <h4 class="d-flex justify-content-between align-items-center px-3 mt-4 mb-3 text-muted">
                            <span>Complaint</span>
                        </h4>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="#viewcomplaint" onclick="showViewComplaint(this)">View Complaint</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#deletecomplaint" onclick="showDeleteComplaint(this)">Delete Complaint</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <main class="col-md-10 ml-sm-auto col-lg-10 px-md-4">
                    <div id="police-functions">
                        <!-- div for viewing police station -->
                        <div id="police-station-view">
                            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                                <h1>View Police Stations</h1>
                            </div>
                            <div class="table-responsive">
                                <!-- Table to display data retrieved from php file -->
                                <table class="table">  
                                    <tr class='thead-dark'>
                                        <th>Police ID</th>
                                        <th>Location</th>
                                        <th>Password</th>
                                    </tr>
                                   <?php
                                    $conn = OpenCon(); //opening connection to server
		                            $sql_query="SELECT * FROM police_station";//query to display info
		                            $result = $conn->query($sql_query);//executing sql query
		                            while($list = mysqli_fetch_array($result)) 
                                    {
                                    echo "<tr>
                                            <td>$list[0]</td>
                                            <td>$list[2]</td>
                                            <td>$list[1]</td>
                                        ";
                                    }
		                            $conn -> close();// closing connection to server
                                   ?>
                                </table>
                            </div>
                        </div>
                        <!-- div for adding police station -->
                        <div id="police-station-add" style="display: none;">
                            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                                <h1>Add Police Station</h1>
                            </div>
                            <div class="row">
                                <!-- Form to add police officer -->
                                <div class="col-md-6">
                                    <!-- Add action -->
                                    <form name="form_police_add" action="javascript:void(0);" method="post">
                                        <div class="mb-4">
                                            <label for="pid">Police Station ID</label>
                                            <input type="number" name="pid" id="pid" class="form-control" required>
                                        </div>
                                        <div class="mb-4">
                                            <label for="">Location of Police Station</label>
                                            <input type="text" name="location" id="location" class="form-control" required>
                                        </div>
                                        <div class="mb-5">
                                            <label for="">Password</label>
                                            <input type="password" name="p_pass" id="p_pass" class="form-control" required>
                                        </div>
                                        <div class="mb-4">
                                            <button class="btn btn-outline-success" type="submit" onclick="add_police()" name="add_PS" id="add_PS">Create Police Station</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- div for updating police station -->
                        <!-- Set up the name tags and IDs -->
                        <div id="police-station-update" style="display: none;">
                            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                                <h1>Update Police Station</h1>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Add action -->
                                     <form name="form_police_update" action="javascript:void(0);" method="post">
                                        <div class="mb-4">
                                            <label for="">Police Station ID</label>
                                            <input type="number" name="pid_up" id="pid_up" class="form-control" required>
                                        </div>
                                        
                                        <div class="mb-4">
                                            <label for="">New Location of Police Station</label>
                                            <input type="text" name="location_up" id="location_up" class="form-control" required>
                                        </div>
                                        
                                        <div class="mb-4">
                                            <label for="">New Password</label>
                                            <input type="password" name="p_pass_up" id="p_pass_up" class="form-control" required>
                                        </div>
                                        
                                        <div class="mb-4">
                                            <button class="btn btn-outline-success" type="submit" onclick="update_police()" name="update_PS" id="update_PS">Update Police Station</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- div for deleting police station -->
                        <!-- Incomplete -->
                        <div id="police-station-delete" style="display: none;">
                            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                                <h1>Delete Police Station</h1>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Add action -->
                                     <form name="form_police_delete" action="javascript:void(0);" method="post">
                                        <div class="mb-4">
                                            <label for="pid_delete">Police Station ID</label>
                                            <input type="number" name="pid_delete" id="pid_delete" class="form-control" required>
                                        </div>
                                        <div class="mb-4">
                                            <button class="btn btn-outline-danger" type="submit" onclick="delete_func_police()" name="delete_PS" id="delete_PS">Delete Police Station</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="citizen-functions" style="display: none;">
                        <!-- div for viewing citizens -->
                        <!-- Incomplete -->
                        <div id="citizen-view" style="display: none;">
                            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                                <h1>View Citizen</h1>
                            </div>
                            <div class="table-responsive">
                                <table class="table">  
                                    <tr class='thead-dark'>
                                        <th>Citizen ID</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Address</th>
                                        <th>Zipcode</th>
                                        <th>Contact</th>
                                        <th>Age</th>
                                        <th>City</th>
                                    </tr>
                                   <?php
                                    $conn = OpenCon(); //opening connection to server
		                            $sql_query="SELECT * FROM citizen";//query to display info
		                            $result = $conn->query($sql_query);//executing sql query
		                            while($list = mysqli_fetch_array($result)) 
                                    {
                                    echo "<tr>
                                            <td>$list[0]</td>
                                            <td>$list[1]</td>
                                            <td>$list[2]</td>
                                            <td>$list[3]</td>
                                            <td>$list[4]</td>
                                            <td>$list[5]</td>
                                            <td>$list[6]</td>
                                            <td>$list[7]</td>
                                            <td>$list[8]</td>
                                            <td>$list[9]</td>
                                            <td>$list[10]</td>
                                        ";
                                    }
		                            $conn -> close();// closing connection to server
                                   ?>
                                </table>
                            </div>
                        </div>
                        <!-- div for adding citizens -->
                        <!-- Incomplete -->
                        <div id="citizen-add" style="display: none;">
                            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                                <h1>Add Citizen</h1>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <form name="form_citizen_add" action="javascript:void(0);" method="post">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="fn">First Name</label>
                                                <input type="text" name="fn" id="fn" class="form-control" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="ln">Last Name</label>
                                                <input type="text" name="ln" id="ln" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 mb-4">
                                                <label for="city">City</label>
                                                <select name="city" id="city" class="custom-select">
                                                    <option value="Mumbai">Mumbai</option>
                                                    <option value="Pune">Pune</option>
                                                    <option value="Thane">Thane</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <label for="zip">Zip</label>
                                                <input type="number" min="400000" max="450000" name="zip" id="zip" class="form-control" required>
                                            </div>
                                            <div class="col-md-3 mb-4">
                                                <label for="age">Age</label>
                                                <input type="number" name="age" id="age" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <label for="">Contact</label>
                                                <input type="number" name="number" id="number" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label for="">Address</label>
                                            <textarea name="addr" id="addr" class="form-control"></textarea>
                                        </div>
                                        <div class="mb-4">
                                            <label for="">Username</label>
                                            <input type="text" name="username" id="username" class="form-control" required>
                                            <small class="text-muted"> Username can contain alphabets or numbers.
                                It must be of minimum 8 characters</small>
                                        </div>
                                        <div class="mb-4">
                                            <label for="email">Email</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">@</span>
                                                </div>
                                                <input type="email" name="email" id="email" class="form-control" placeholder="you@example.com" required>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label for="">Password</label>
                                            <input type="password" name="pass" id="pass" class="form-control" required>
                                            <small class="text-muted">
                                                Password must contain atleast one capital letter, 
                                                one normal letter, one number, 
                                                one special character and must be atleast 6 characters long
                                            </small>
                                        </div>
                                        <div class="mb-5">
                                            <label for="">Confirm Password</label>
                                            <input type="password" name="c_pass" id="c_pass" class="form-control" required>
                                            <small class="text-muted">Confirmed Password field must match the Password field !</small>
                                        </div>
                                        <div class="mb-5">
                                            <button class="btn btn-outline-success" type="submit" onclick="add_citizen()" name="add_C" id="add_C">Register Citizen</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- div for updating citizens -->
                        <!-- Incomplete -->
                        <div id="citizen-update" style="display: none;">
                            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                                <h1>Update Citizen</h1>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <form name="form_citizen_update" action="javascript:void(0);" method="post">
                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <label for="id_up">ID</label>
                                                <input type="number" name="id_up" id="id_up" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="fn_up">First Name</label>
                                                <input type="text" name="fn_up" id="fn_up" class="form-control" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="ln_up">Last Name</label>
                                                <input type="text" name="ln_up" id="ln_up" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 mb-4">
                                                <label for="city_up">City</label>
                                                <select name="city_up" id="city_up" class="custom-select">
                                                    <option value="Mumbai">Mumbai</option>
                                                    <option value="Pune">Pune</option>
                                                    <option value="Thane">Thane</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <label for="zip_up">Zip</label>
                                                <input type="number" min="400000" max="450000" name="zip_up" id="zip_up" class="form-control" required>
                                            </div>
                                            <div class="col-md-3 mb-4">
                                                <label for="age_up">Age</label>
                                                <input type="number" name="age_up" id="age_up" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <label for="number_up">Contact</label>
                                                <input type="number" name="number_up" id="number_up" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label for="addr_up">Address</label>
                                            <textarea name="addr_up" id="addr_up" class="form-control"></textarea>
                                        </div>
                                        <div class="mb-4">
                                            <label for="username_up">Username</label>
                                            <input type="text" name="username_up" id="username_up" class="form-control" required>
                                            <small class="text-muted">
                                                 Username can contain alphabets or numbers.
                                                It must be of minimum 8 characters
                                            </small>
                                        </div>
                                        <div class="mb-4">
                                            <label for="email_up">Email</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">@</span>
                                                </div>
                                                <input type="email" name="email_up" id="email_up" class="form-control" placeholder="you@example.com" required>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label for="">New Password</label>
                                            <input type="password" name="pass_up" id="pass_up" class="form-control" required>
                                            <small class="text-muted">
                                                Password must contain atleast one capital letter, 
                                                one normal letter, one number, 
                                                one special character and must be atleast 6 characters long
                                            </small>
                                        </div>
                                        <div class="mb-5">
                                            <button class="btn btn-outline-success" type="submit" onclick=" update_citizen()" name="update_C" id="update_C">Update Citizen</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- div for deleting citizens -->
                        <!-- Incomplete -->
                        <div id="citizen-delete" style="display: none;">
                            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                                <h1>Delete Citizen</h1>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <form name="form_citizen_delete" action="javascript:void(0);" method="post">
                                        <div class="mb-4">
                                            <label for="id_delete">Citizen ID</label>
                                            <input type="number" name="id_delete" id="id_delete" class="form-control" required>
                                        </div>
                                        <div class="mb-4">
                                            <button class="btn btn-outline-danger" type="submit" onclick="delete_func_citizen()" name="delete_C" id="delete_C">Delete Citizen</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="complaint-functions" style="display: none;">
                        <!-- div for viewing complaint -->
                        <!-- Incomplete -->
                        <div id="complaint-view" style="display: none;">
                            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                                <h1>View Complaint</h1>
                            </div>
                            <div class="table-responsive">
                                <table class="table">  
                                    <tr class='thead-dark'>
                                        <th>Complaint ID</th>
                                        <th>Status</th>
                                        <th>Description</th>
                                        <th>location</th>
                                    </tr>
                                   <?php
                                    $conn = OpenCon(); //opening connection to server
		                            $sql_query="SELECT * FROM complaint";//query to display info
		                            $result = $conn->query($sql_query);//executing sql query
		                            while($list = mysqli_fetch_array($result)) 
                                    {
                                    echo "<tr>
                                            <td>$list[0]</td>
                                            <td>$list[1]</td>
                                            <td>$list[2]</td>
                                            <td>$list[3]</td>
                                        ";
                                    }
		                            $conn -> close();// closing connection to server
                                   ?>
                                </table>
                            </div>
                        </div>
                        <!-- div for delete complaint -->
                        <!-- Incomplete -->
                        <div id="complaint-delete" style="display: none;">
                            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                                <h1>Delete Complaint</h1>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                   <form name="form_complaint_delete" action="javascript:void(0);" method="post">
                                        <div class="mb-4">
                                            <label for="c_id_delete">Complaint ID</label>
                                            <input type="number" name="c_id_delete" id="c_id_delete" class="form-control" required>
                                        </div>
                                 
                                        <!-- How are you gonna convert status -->
                                        <div class="">
                                            <button class="btn btn-outline-danger" type="submit" onclick="delete_func_complaint()" name="delete_com" id="delete_com">Delete Complaint</button>
                                        </div>
                                    </form>
                                </div>
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