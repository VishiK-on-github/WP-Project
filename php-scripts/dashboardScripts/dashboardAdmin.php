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

	if($_GET['function']=='onload')
	{
		echo $_SESSION["username"];
	}
	
	if($_GET['function']=='add_police')
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


	if($_GET['function']=='add_citizen')
	{
		$conn = OpenCon(); //opening connection to server
		$fn=$_GET["fn"];
		$ln=$_GET["ln"];
		$city=$_GET["city"];
		$zip=$_GET["zip"];
		$age=$_GET["age"];
		$number=$_GET["number"];
		$addr=$_GET["addr"];
		$username=$_GET["username"];
		$email=$_GET["email"];
		$pass=$_GET["pass"];
		$sql_query="INSERT INTO citizen SET firstname='$fn',lastname='$ln',username='$username', email='$email',pwd='$pass',address='$addr', zipcode='$zip',contact='$number',age='$age',city='$city' "; //query to insert into citizen table
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




	

	if($_GET['function']=='update_police')
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

	if($_GET['function']=='update_citizen')
	{
		$conn = OpenCon(); //opening connection to server
		$id=$_GET["id"];
		$fn=$_GET["fn"];
		$ln=$_GET["ln"];
		$city=$_GET["city"];
		$zip=$_GET["zip"];
		$age=$_GET["age"];
		$number=$_GET["number"];
		$addr=$_GET["addr"];
		$username=$_GET["username"];
		$email=$_GET["email"];
		$pass=$_GET["pass"];
		$sql_query="UPDATE citizen SET firstname='$fn',lastname='$ln',username='$username', email='$email',pwd='$pass',address='$addr', zipcode='$zip',contact='$number',age='$age',city='$city' WHERE citizen_id='$id' "; //query to update citizen table
		if($conn->query($sql_query)===true)//executing sql query
		{
			echo "Data has been updated";
		}
		else
		{
			echo "ERROR: Could not able to execute $sql_query. " . $conn->error;
		}

		$conn -> close();// closing connection to server
	}




	if($_GET['function']=='delete_police')
	{
		$conn = OpenCon(); //opening connection to server
		$pid=$_GET["id"];
		$sql_query="DELETE FROM police_station WHERE police_id = '$pid' "; //query to delete police 
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



	if($_GET['function']=='delete_citizen')
	{
		$conn = OpenCon(); //opening connection to server
		$id=$_GET["id"];
		$sql_query="DELETE FROM citizen WHERE citizen_id = '$id' "; //query to delete citizen 
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


	if($_GET['function']=='delete_complaint')
	{
		$conn = OpenCon(); //opening connection to server
		$id=$_GET["id"];
		$sql_query="DELETE FROM complaint WHERE complaint_id = '$id' "; //query to delete citizen 
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


	if(isset($_POST["sign-out"])) {

    // Code which will run when we click signout
	session_unset();
    session_destroy();
    header("location: http://localhost/wp_project/WP-Project/admin_signin.html");
}



?>