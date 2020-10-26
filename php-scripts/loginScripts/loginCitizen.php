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
		$password = trim($_POST["password"]);
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
		$username = trim($_POST["username"]);
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
		
		// Setting the query to check the username and password
		$sqlValid = "SELECT username, pwd FROM citizen WHERE username='$user'";

		// Querying the result
		$result = $conn->query($sqlValid);

		$result0 = mysqli_fetch_array($result);

		if($result != false) {

			// If username and password are matching we redirect to citizen dashboard
			if($result0[0] == $user && $result0[1] == $pass) {

				//echo "Success";
				$conn->close();
				header("location: http://localhost/wp_project/WP-Project/User-Dashboards/citizenDashboard.php");
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