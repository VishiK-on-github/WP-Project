<?php

	session_start();
	if(isset($_POST['submit']))
	{
		// Empty fields
	 	if(empty($_POST['username']) || empty($_POST['password']))
		{
			//echo "Please enter Username and Password<br>";
			$sf1 = false;
			$sf2 = false;
		}

		//password validation
		$password = $_POST["password"];
		$valid_pass = preg_match("/^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[^\w\d]).*$/", $password);

		if(!$valid_pass) {

			//echo "Wrong format for the password! <br>";
			$sf1 = false;
		}
		else {

			//echo "Valid Password ! <br>";
			$sf1 = true;
		}

		// Username validation
		$username = $_POST["username"];
		$valid_username = preg_match("/^[a-zA-Z0-9]+$/", $username);

		if(!$valid_username) {

			//echo "$username is invalid Username ! <br>";
			$sf2 = false;
		}
		else {

			//echo "Valid Username ! <br>";
			$sf2 = true;
		}

		if($sf1 == true && $sf2 == true) {

			// Redirect to dash board
			validCredentials($username, $password);
		}
		else {

			// There has been an error with 
			//header("location : error");
			//echo "Username or Password is incorrect !!!";
			// ! REDIRECT TO ERROR PAGE !
		}
	}
	else 
	{
		//echo "Something went wrong !!! <br>";
		// ! REDIRECT TO ERROR PAGE !
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

	function CloseConnection($conn) {

		# Method to close connection to server
		$conn -> close();
	}

	function validCredentials($user, $pass) {

		# Create Session so that we can pass this and continue in future pages

		# Creating a session and storing session info
		$_SESSION["username"] = $user;

		# Creating a connection object
		$conn = OpenConnection();
		
		if($conn == false) {

			die("ERROR: Could not connect. " . $conn->connect_error);
			// Display some error message
		}
		else {

			//echo "Connected Successfully";
		}

		// query to create citizen table
		/*$sqltable = "CREATE TABLE IF NOT EXISTS citizen(
			citizen_id INT PRIMARY KEY AUTO_INCREMENT,
			firstname VARCHAR(70) NOT NULL,
			lastname VARCHAR(70) NOT NULL,
			username VARCHAR(30) NOT NULL UNIQUE,
			email VARCHAR(50) NOT NULL UNIQUE,
			pwd VARCHAR(50) NOT NULL UNIQUE,
			addy VARCHAR(20) NOT NULL UNIQUE,
			zipcode VARCHAR(6) NOT NULL,
			contact VARCHAR(10) NOT NULL,
			age VARCHAR(3) NOT NULL        
		)";

		if($conn->query($sqltable) === true){
			echo "Table created successfully.";
		} else{
			echo "ERROR: Could not able to execute " . $conn->error;
		}

		$sql1="INSERT INTO citizen SET firstname='v', lastname='K', addy='123', zipcode=400000, username='Vishwanath10', pwd='Pass1234_*', email='someMail@mail.com', contact=0123456789, age=19";
        if($conn->query($sql1) === true){
            echo "Inserted into table successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql1. " . $conn->error;
		}*/
		
		// Setting the query to check the username and password
		$sqlValid = "SELECT username, pwd FROM citizen WHERE username='$user'";

		// Querying the result
		$result = $conn->query($sqlValid);

		$result0 = mysqli_fetch_array($result);

		if($result != false) {

			/*echo "Username : $result0[0] <br>";
			echo "Password : $result0[1] <br>";
			$var1 = $result0[0] == $user;
			$var2 = $result0[1] == $pass;
			echo "$var1";
			echo "$var2";*/

			// If username and password are matching we redirect to citizen dashboard
			if($result0[0] == $user && $result0[1] == $pass) {

				//echo "Success";
				header("location: http://localhost/wp_project/WP-Project/User-Dashboards/citizenDashboard.html");
			}
			else {

				// ! REDIRECT TO ERROR PAGE !
			}

		}
		else {

			echo "Username or password incorrect";
			// ! REDIRECT TO ERROR PAGE !
		}

	}
?>