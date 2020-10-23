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

    $location = $_POST["location"];
    $complaint = $_POST["new-complaint"];
    $user = $_SESSION["username"];

    echo "Location : $location <br>";
    echo "Complaint : $complaint <br>";
    echo "Username : $user";
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