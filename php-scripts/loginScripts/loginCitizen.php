<?php
	if(isset($_POAT['submit']))
	{
		//empty fields
	 	if(empty($_POST['username']) || empty($_POST['password']))
		{
			echo "Please enter Username and Password<br>";
		}

		//password validation
		$password= $_POST["password"];
		$a=preg_match("/^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[^\w\d]).*$/",$password);

		if(!$a)
			echo "Wrong format for the password!<br>";
		//username validation
		$username = $_POST["username"];
		$a=preg_match("/^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[^\w\d]).*$/",$username);

		if(!$a)
			echo "Wrong format for the Username!<br>";
	}
?>