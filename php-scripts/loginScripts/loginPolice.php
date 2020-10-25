<?php

/*
We are validating the login form for police
*/

if(isset($_POST["submit"])){

    $pid = trim($_POST["pid"]);
    $password = trim($_POST["pass"]);

    // May need to change the regex !!!
    $valid_pid = preg_match("/^\d{1,5}$/", $pid);
    $valid_pass = preg_match("/^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[^\w\d]).*$/", $password);

    // Validation of pid
    if(empty($pid)){

        echo "Police ID is empty !!! <br>";
        $sf1 = false;
    }
    elseif(!$valid_pid) {

        echo "Police ID is valid <br>";
    }
    else{

        echo "$pid is valid Police ID <br>";
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