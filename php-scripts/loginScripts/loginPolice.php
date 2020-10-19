<?php

/*
We are validating the login form for police
*/

if(isset($_POST["submit"])){

    $username = trim($_POST["uname"]);
    $password = $_POST["pass"];

    // May need to change the regex !!!
    $valid_uname = preg_match("/^(?=.{1,})(?=.*[a-z])(?=.*[A-Z]).*$/", $username);
    $valid_pass = preg_match("/^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[^\w\d]).*$/", $password);

    // Validation of Username
    if(empty($username)){

        echo "Username is empty !!! <br>";
    }
    elseif(!$valid_uname) {

        echo "Username is valid <br>";
    }
    else{

        echo "$username is valid Username <br>";
    }

    // Validation of Password
    if(empty($password)){

        echo "Password is empty !!! <br>";
    }
    elseif(!$valid_pass) {

        echo "Password is valid <br>";
    }
    else{

        echo "$password is valid Password <br>";
    }
}
else{

    echo "Something went wrong !!! <br>";
}

?>