<?php

session_start();
// Opening connection
function OpenConnection() {

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "1234";
    $db = "wp_project";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db);

    return $conn;
}

// Closing connection
function CloseConnection($conn) {

    $conn -> close();
}

if(isset($_POST["submit-complaint"])) {

    // Adding complaint to the database

    $location = trim($_POST["location"]);
    $complaint = trim($_POST["new-complaint"]);
    $user = trim($_SESSION["username"]);

    echo "Location : $location <br>";
    echo "Complaint : $complaint <br>";
    echo "Username : $user";

    // Query
    $conn = OpenConnection();
    // To get username from session
    $user = "Vishwanath10";

    // To get citizen_id of user
    $citizenIDQuery = "SELECT citizen_id FROM citizen WHERE username='$user'";

    $resultCitizenIDQuery = $conn->query($citizenIDQuery);

    $citizenID = mysqli_fetch_array($resultCitizenIDQuery);
    $citizenID = $citizenID[0];

    // To register a new complaint
    $complaintRegister = "INSERT INTO complaint (complaint_status, complaint_desc, location) VALUES ('default', '$complaint', '$location')";

    $conn->query($complaintRegister);
    
    // To get complaint id for latest complaint
    $getComplaintID = "SELECT LAST_INSERT_ID()";

    $complaintIDQuery = $conn->query($getComplaintID);

    $complaintID = mysqli_fetch_array($complaintIDQuery);
    $complaintID1 = $complaintID[0];

    echo "<br>Complaint ID : $complaintID1 <br>";

    // To get police id for a specific 
    $getPoliceStation = "SELECT police_id FROM police_station WHERE location='$location'";
    $policeIDQuery = $conn->query($getPoliceStation);
    $policeID = mysqli_fetch_array($policeIDQuery);
    $policeID1 = $policeID[0];

    echo "Police ID : $policeID1  <br>";

    // Insert into assign table
    $assign = "INSERT INTO assign (police_id, complaint_id) VALUES ('$policeID1', '$complaintID1')";
    $assignQuery = $conn->query($assign);

    // Insert into lodges table
    $lodges = "INSERT INTO lodges (citizen_id, complaint_id, dt) VALUES ('$citizenID', '$complaintID1', NOW())";
    $lodgesQuery = $conn->query($lodges);

    echo "Success  <br>";
}

if(isset($_POST["sign-out"])) {

    // Code which will run when we click signout
    session_destroy();
    header("location: http://localhost/wp_project/WP-Project/citizen_signin.html");
}

else {

    // ! REDIRECT TO ERROR PAGE !
}

?>