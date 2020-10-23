<?php
	

	function OpenCon()  //Function to open connection to server
	{
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "1234";
		$db = "wp_project";
		$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
		return $conn;
	}

	if($_GET['function']=='display')
	{
		$conn = OpenCon(); //opening connection to server
		$pid=$_GET['id'];
		$sql_query="SELECT * FROM police_station WHERE police_id='$pid'";//query to display info
		$result = $conn->query($sql_query);//executing sql query
		$list = $result->fetch_assoc();
		echo json_encode($list); //returning data back in JSON format
		$conn -> close();// closing connection to server
	}
	
	if(isset($_POST["add_PS"]))
	{
		echo "i am in add";
		$conn = OpenCon(); //opening connection to server
		$pid=$_POST["pid"];
		$location=$_POST["location"];
		$p_pass=$_POST["p_pass"];
		$sql_query="INSERT INTO police_station SET police_id='$pid', location='$location',pwd='$p_pass' "; //query to insert into police table
		$conn->query($sql_query);//executing sql query
		$conn -> close();// closing connection to server
	}

	

	if(isset($_POST["update_PS"]))
	{
		echo "i am in update";
		$conn = OpenCon(); //opening connection to server
		$pid=$_POST["pid_up"];
		$location=$_POST["location_up"];
		$p_pass=$_POST["p_pass_up"];
		$sql_query="UPDATE police_station SET pwd = '$p_pass',location='$location' WHERE police_id = '$pid' "; //query to update police table
		$conn->query($sql_query);//executing sql query
		$conn -> close();// closing connection to server
	}

	if(isset($_POST["delete_PS"]))
	{
		echo "i am in delete";
		$conn = OpenCon(); //opening connection to server
		$pid=$_POST["pid_delete"];
		$sql_query="DELETE FROM police_station WHERE police_id = '$pid' "; //query to delete police table
		$conn->query($sql_query);//executing sql query
		$conn -> close();// closing connection to server
	}



?>