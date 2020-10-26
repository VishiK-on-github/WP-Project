<?php

/*
We are validating the login form for police
*/
session_start();

if(isset($_POST["submit"])){

    $pid = trim($_POST["pid"]);
    $password = trim($_POST["pass"]);

    // May need to change the regex !!!
    $valid_pid = preg_match("/^\d{1,5}$/", $pid);
    $valid_pass = preg_match("/^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[^\w\d]).*$/", $password);

    // Validation of pid
    if(empty($pid)){

        // echo "Police ID is empty !!! <br>";
        $sf1 = false;
    }
    elseif(!$valid_pid) {

        // echo "Police ID is invalid <br>";
        $sf1 = false;
    }
    else{

        // echo "$pid is valid Police ID <br>";
        $sf1 = true;
    }

    // Validation of Password
    if(empty($password)){

        // echo "Password is empty !!! <br>";
        $sf2 = false;
    }
    elseif(!$valid_pass) {

        // echo "Password is invalid <br>";
        $sf2 = false;
    }
    else{

        // echo "$password is valid Password <br>";
        $sf2 = true;

    }
    if($sf1 == true && $sf2 == true){
        validate($pid, $password);

    }
}
else{

    // echo "Something went wrong !!! <br>";
    // redirect to error page 

}

function OpenConnection() {

    # Method to create connection to the server

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "1234";
    $db = "wp_project";
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db);

    return $conn;
}

function validate($pid, $password){

    $conn = OpenConnection();

    // Creating session variable 
    $_SESSION["pid"] = $pid;
   
    $location_query = "SELECT location FROM police_station WHERE police_id = '$pid' ";
   
    $location = $conn -> query($location_query);

    $location0 = mysqli_fetch_array($location);

    $_SESSION["location"] = $location0[0];
    

    if($conn == false) {

        die("ERROR: Could not connect. " . $conn->connect_error);
        // Display some error message
    }
    else {

        //echo "Connected Successfully";
    }

    $sql = "SELECT police_id, pwd FROM police_station WHERE police_id = '$pid' ";

    $result = $conn ->query($sql);

    $result0 = mysqli_fetch_array($result);

    if($result != false) {

        if($result0[0] == $pid && $result0[1] == $password) {
            // echo "success";
            $conn -> close();
            header("location: http://localhost/wp_project/WP-Project/User-Dashboards/policeDashboard.php");
        }
        else {

            // Redirect to error page

        }
    }
    else {
        // echo "Invalid"
        // Redirect to error page 
    }
}

?>