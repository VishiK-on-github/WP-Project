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

// Status update query 
if(isset($_POST["submit-update"])) {
    $conn = OpenCon(); //opening connection to server
    
    // get complaint id 
    $complaint_id = trim($_POST["id"]);
    
    // update the complaint table
    $update_query = "UPDATE complaint SET complaint_status = '1' WHERE complaint_id = '$complaint_id' ";

    if($conn -> query($update_query) == true){
        echo "Status has been updated <br>";
    }
    else {
        echo "ERROR: Query $update_query was unsuccessful <br>";
    }

    $conn -> close(); // close connection 
}

?>