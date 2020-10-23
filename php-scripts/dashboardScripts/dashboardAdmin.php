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
	
	if($_GET['function']=='add')
	{
		$conn = OpenCon(); //opening connection to server
		$pid=$_GET["id"];
		$location=$_GET["location"];
		$p_pass=$_GET["password"];
		$sql_query="INSERT INTO police_station SET police_id='$pid', location='$location',pwd='$p_pass' "; //query to insert into police table
		if($conn->query($sql_query)===true)//executing sql query
		{
			echo "Data has been added to table";
		}
		else
		{
			echo "ERROR: Could not able to execute $sql_query. " . $conn->error;
		}

		$conn -> close();// closing connection to server
	}

	

	if($_GET['function']=='update')
	{
		$conn = OpenCon(); //opening connection to server
		$pid=$_GET["id"];
		$location=$_GET["location"];
		$p_pass=$_GET["password"];
		$sql_query="UPDATE police_station SET pwd = '$p_pass',location='$location' WHERE police_id = '$pid' "; //query to update police table
		if($conn->query($sql_query)===true) //executing sql query
		{
			echo "Data has been updated";
		}
		else
		{
			echo "ERROR: Could not able to execute $sql_query. " . $conn->error;
		}
		$conn -> close();// closing connection to server
	}

	if($_GET['function']=='delete')
	{
		$conn = OpenCon(); //opening connection to server
		$pid=$_GET["id"];
		$sql_query="DELETE FROM police_station WHERE police_id = '$pid' "; //query to delete police table
		if($conn->query($sql_query)===true) //executing sql query
		{
			echo "Data has been deleted";
		}
		else
		{
			echo "ERROR: Could not able to execute $sql_query. " . $conn->error;
		}
		$conn -> close();// closing connection to server
	}



?>