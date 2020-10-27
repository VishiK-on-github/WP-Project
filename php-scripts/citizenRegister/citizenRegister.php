<?php

function OpenConnection() {

    // Opening connection
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "1234";
    $db = "wp_project";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db);

    return $conn;
}

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
    $email = trim($_POST["e-mail"]);
    $password = trim($_POST["password"]);
    $cpassword = trim($_POST["confirm-password"]);

    // First name validation
    $validFirstName = preg_match("/^[a-zA-Z]+$/", $firstname);
    if(!$validFirstName) {

        //Invalid
        $sf1 = false;
    }
    else {

        // Valid
        $sf1 = true;
    }

    // Last name validation
    $validLastName = preg_match("/^[a-zA-Z]+$/", $lastname);
    if(!$validLastName) {

        //Invalid
        $sf2 = false;
    }
    else {

        // Valid
        $sf2 = true;
    }

    // City validation
    $validCity = preg_match("/^[a-zA-Z]+$/", $city);
    if(!$validCity) {

        //Invalid
        $sf3 = false;
    }
    else {
        
        // Valid
        $sf3 = true;
    }

    // Zip validation
    $validZip = preg_match("/^[0-9]+$/", $zip);
    if(strlen($zip) == 6) {

        if(!$validZip) {

            // Invalid
            $sf4 = false;
        }
        else {

            // Valid
            $sf4 = true;
        }
    }
    else {

        $sf4 = false;
    }

    // Age validation
    $validAge = preg_match("/^[0-9]+$/", $age);
    if(!$validAge) {

        // Invalid
        $sf5 = false;
    }
    else {
        if($age > 0) {

            // Valid
            $sf5 = true;
        }
        else {
            // Invalid
            $sf5 = false;
        }
    }

    // Contact validation
    $validContact = preg_match("/^[0-9]+$/", $contact);
    if(!$validContact) {

        // Invalid
        $sf6 = false;
    }
    else {

        // Valid
        $sf6 = true;
    }

    // Address validation
    $sf7 = true;

    // Username validation
    $validUsername = preg_match("/^[a-zA-Z0-9]+$/", $username);
    if(!$validUsername) {

        // Invalid
        $sf8 = false;
    }
    else {

        // Valid
        $sf8 = true;
    }

    // Email validation
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Valid
        $sf9 = true;
    }
    else {

        // Invalid
        $sf9 = false;
    }

    // Password validation
    $validPassword = preg_match("/^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[^\w\d]).*$/", $password);
    if(!$validPassword) {

        // Invalid
        $sf10 = false;
    }
    else {

        // Valid
        $sf10 = true;
    }

    // Confirm validation
    $validCPassword = preg_match("/^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[^\w\d]).*$/", $cpassword);
    if(!$validCPassword) {

        // Invalid
        $sf11 = false;
    }
    else {

        // Valid
        $sf11 = true;
    }

    // Password matching
    if($password == $cpassword) {

        // Valid
        $sf12 = true;
    }
    else {

        // Invalid
        $sf12 = false;
    }

    // Validity status of fields if one fails we
    if($sf1 && $sf2 && $sf3 && $sf4 && $sf5 && $sf6 && $sf7 && $sf8 && $sf9 && $sf10 && $sf11 && $sf12) {

        validCredentials($firstname,$lastname,$username,$email,$password,$address,$city,$zip,$contact,$age);
    }
    else {

        // Some field is invalid
    }

}
else {

    // REDIRECT TO SOME ERROR
}

function validCredentials($firstname,$lastname,$username,$email,$password,$address,$city,$zip,$contact,$age) {

    $conn = OpenConnection();

    $query = "INSERT INTO citizen (firstname,lastname,username,email,pwd,address,city,zipcode,contact,age) 
        VALUES ('$firstname','$lastname','$username','$email','$password','$address','$city','$zip','$contact','$age')";

    $result = $conn->query($query);

    //echo "$result";

    if($result == true) {

        // Valid
        echo "<script>alert('Citizen registered successfully !');</script>";
        echo "<script>window.location.href = 'http://localhost/wp_project/WP-Project/citizen_signin.html'</script>";
        // Successfully registered
    }
    else {

        // Some error
        echo "<script>alert('Username, E-Mail or Password has already been taken !')</script>";
        echo "<script>window.location.href = 'http://localhost/wp_project/WP-Project/registration.html'</script>";
    }

    $conn->close();

}

?>