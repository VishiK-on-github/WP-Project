<?php

if(isset($_POST["submit"])) {

    // Getting information from the form
    $firstname = trim($_POST["first-name"]);
    $lastname = trim($_POST["last-name"]);
    $city = trim($_POST["city"]);
    $zip = trim($_POST["zip"]);
    $age = trim($_POST["age"]);
    $contact = trim($_POST["contact"]);
    $address = trim($_POST["address"]);
    $username = trim($_POST["user-name"]);
    $password = trim($_POST["password"]);
    $cpassword = trim($_POST["confirm-password"]);

    

}
else {

    // REDIRECT TO SOME ERROR
}

?>