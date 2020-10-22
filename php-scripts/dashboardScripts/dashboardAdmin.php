<?php
	
	function OpenCon()  //Function to open connection to server
	{
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "";
		$db = "wp_project";
		$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
		return $conn;
	}

	if(isset($_POST["add_PS"]))
	{
		$conn = OpenCon(); //opening connection to server
		$pid=$_POST["pid"];
		$location=$_POST["location"];
		$p_pass=$_POST["p_pass"];
		$sql_query="INSERT INTO police_station SET policest_id='$pid', location='$location',pwd='$p_pass' "; //query to insert into police table
		$conn->query($sql_query);//executing sql query
		$conn -> close();// closing connection to server
	}

	if(isset($_POST["display_PS"]))
	{
		$conn = OpenCon(); //opening connection to server
		$pid=$_POST["pid"];
		$sql_query="SELECT * FROM polic_station WHERE policest_id='$pid'";//query to display info
		$result = $conn->query($sql_query);//executing sql query
		$list = $result->fetch_assoc();
		$location = $list["location"];
		$p_pass = $list["pwd"];
		$conn -> close();// closing connection to server
	}



	

	







?>