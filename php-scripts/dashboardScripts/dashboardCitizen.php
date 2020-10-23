<?php

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

    $location = $_POST["location"];
    $complaint = $_POST["new-complaint"];

    echo "Location : $location <br>";
    echo "Complaint : $complaint";
}
else {

    // ! REDIRECT TO ERROR PAGE !
}

?>