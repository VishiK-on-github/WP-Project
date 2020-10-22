<?php

    // function to connect to databse
    function OpenConnection()
   {

        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "1234";
        $db = "wp_project";
        $conn = new mysqli($dbhost, $dbuser, $dbpass,$db);
    
        return $conn;
   }

   // function to end connection with database
   function CloseConnection($conn)
   {
         $conn -> close();
   }
   
   // check connectivity
   $conn = OpenConnection();
   if($conn === false){
        die("ERROR: Could not connect. " . $conn->connect_error);
    }
    else
        echo "Connected Successfully";

    // query to create citizen table
    $sql = "CREATE TABLE IF NOT EXISTS citizen(
        citizen_id INT PRIMARY KEY AUTO_INCREMENT,
        firstname VARCHAR(70) NOT NULL,
        lastname VARCHAR(70) NOT NULL,
        username VARCHAR(30) NOT NULL UNIQUE,
        email VARCHAR(50) NOT NULL UNIQUE,
        pwd VARCHAR(50) NOT NULL UNIQUE,
        address VARCHAR(200) NOT NULL UNIQUE,
        zipcode VARCHAR(6) NOT NULL,
        contact VARCHAR(10) NOT NULL,
        age VARCHAR(3) NOT NULL        
    )";

    // query to create citizen table
    $sql1 = "CREATE TABLE IF NOT EXISTS complaint(
        complaint_id INT PRIMARY KEY AUTO_INCREMENT,
        complaint_status VARCHAR(70) NOT NULL,
        complaint_desc VARCHAR(200)        
    )";

    // query to create police station table
    $sql2 =  "CREATE TABLE IF NOT EXISTS police_station(
        police_id INT PRIMARY KEY,
        pwd VARCHAR(50) NOT NULL UNIQUE,
        location VARCHAR(70) NOT NULL
                
    )";

    // query to create lodges table
    $sql3 = "CREATE TABLE IF NOT EXISTS lodges (
        citizen_id INT NOT NULL,
        complaint_id INT NOT NULL,
        dt DATETIME NOT NULL,
        FOREIGN KEY (citizen_id)  REFERENCES citizen(citizen_id),
        FOREIGN KEY (complaint_id)  REFERENCES complaint(complaint_id), 
        PRIMARY KEY (citizen_id, complaint_id)
    )";

    // query to create assign table
    $sql4 = "CREATE TABLE IF NOT EXISTS assign (
        police_id INT NOT NULL,
        complaint_id INT NOT NULL,
        FOREIGN KEY (police_id)  REFERENCES police_station(police_id),
        FOREIGN KEY (complaint_id)  REFERENCES complaint(complaint_id), 
        PRIMARY KEY (police_id, complaint_id)
    )";
?>