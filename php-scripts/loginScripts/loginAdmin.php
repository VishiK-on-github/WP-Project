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
	
	if(isset($_POST['Submit']))
	{
		$conn = OpenCon(); //opening connection to server
		$username=$_POST['username'];
		$password=$_POST['passid'];
		$sql_query="SELECT pwd FROM admin WHERE username='$username'";//query to check password
		$result = $conn->query($sql_query);  //retrieving password from db
		$list = $result->fetch_assoc();  //converting to associative array
		if($password==$list['pwd'])
		{
			$_SESSION["username"]= $username;
			echo "User exists";
		}
		else
		{
			echo "User does not exist";
		}
		$conn -> close();// closing connection to server
	}
?>