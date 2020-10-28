/*

This javascript code is used to validate the
registration of citizens who will write comments
before the form is submitted to the database.

*/

function validateRegistration() {

    // Getting values of input from the form

    var firstName = (document.getElementById("first-name").value).trim();
    var lastName = (document.getElementById("last-name").value).trim();
    var username = (document.getElementById("user-name").value).trim();
    var email = (document.getElementById("e-mail").value).trim();
    var password = (document.getElementById("password").value).trim();
    var confirmPassword = (document.getElementById("confirm-password").value).trim();
    var address = (document.getElementById("address").value).trim();
    var city = document.getElementById("city").value;
    var zipcode = (document.getElementById("zip").value).trim();
    var contact = (document.getElementById("contact").value).trim();
    var age = parseInt((document.getElementById("age").value).trim());

    // Defining regex for filtering

    const regexName = /^[a-zA-Z]+$/;
    const regexUsername = /^[0-9a-zA-Z]{8,}$/;
    const regexPassword = /^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[^\w\d]).*$/;
    const regexEmail = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    const regexNumber = /^[0-9]+$/;


    function formValidityStatus() {

        // Container for different validity testing result outputs

        sf1 = validFirstName(firstName, regexName);
        sf2 = validLastName(lastName, regexName);
        sf3 = validUsername(username, regexUsername);
        sf4 = validPassword(password, regexPassword);
        sf5 = validConfirmPassword(sf4, password, confirmPassword);
        sf6 = validCity(city, regexName);
        sf7 = validZipcode(zipcode, regexNumber);
        sf8 = validContact(contact, regexNumber);
        sf9 = validEmail(email, regexEmail);
        sf10 = validAddress(address);
        sf11 = validAge(age, regexNumber);

        // Status for each field
        /*alert(`First Name status : ${sf1}`);
        alert(`Last Name status : ${sf2}`);
        alert(`Username status : ${sf3}`);
        alert(`Password status : ${sf4}`);
        alert(`Confirm Password status : ${sf5}`);
        alert(`City status : ${sf6}`);
        alert(`Zipcode status : ${sf7}`);
        alert(`Contact status : ${sf8}`);
        alert(`Email status : ${sf9}`);
        alert(`Address status : ${sf10}`);
        alert(`Age status : ${sf11}`);*/

        return (sf1 && sf2 && sf3 && sf4 && sf5 && sf6 && sf7 && sf8 && sf9 && sf10 && sf11);
    }
    
    // Method which will give us validity of form

    return formValidityStatus();
}

function validFirstName(firstName, pattern) {

    if(firstName == null || firstName == "") {

        // not valid (Empty !)
        document.getElementById("first-name").style.border = "2px solid #dc3545";
        return false;
    }
    else if(pattern.test(firstName) != false){

        // valid
        document.getElementById("first-name").style.border = "2px solid lightgreen";
        return true;
    }
    else {

        // not valid other conditions
        document.getElementById("first-name").style.border = "2px solid #dc3545";
        return false;
    }
}

function validLastName(lastName, pattern) {

    if(lastName == null || lastName == "") {

        // not valid (Empty !)
        document.getElementById("last-name").style.border = "2px solid #dc3545";
        return false;
    }
    else if(pattern.test(lastName) != false){

        // valid
        document.getElementById("last-name").style.border = "2px solid lightgreen";
        return true;
    }
    else {

        // not valid other conditions
        document.getElementById("last-name").style.border = "2px solid #dc3545";
        return false;
    }
}

function validUsername(username, pattern) {

    if(username == null || username == "") {

        // not valid (Empty !)
        document.getElementById("user-name").style.border = "2px solid #dc3545";
        return false;
    }
    else if(pattern.test(username) != false) {

        // valid 
        document.getElementById("user-name").style.border = "2px solid lightgreen";
        return true;
    }
    else {

        // not valid other conditions
        document.getElementById("user-name").style.border = "2px solid #dc3545";
        return false;
    }
}

function validPassword(password, pattern) {

    if(password == null || password == "") {

        // not valid (Empty !)
        document.getElementById("password").style.border = "2px solid #dc3545";
        return false;
    }
    else if(pattern.test(password) != false) {

        // valid 
        document.getElementById("password").style.border = "2px solid lightgreen";
        return true;
    }
    else {

        // not valid other conditions
        document.getElementById("password").style.border = "2px solid #dc3545";
        return false;
    }
}

function validConfirmPassword(status, password, confirmPassword) {

    if(status == true) {

        if(password == confirmPassword) {

            // Password and confirm password match
            document.getElementById("confirm-password").style.border = "2px solid lightgreen";
            return true;
        }
        else {

            // Passwords dont match
            document.getElementById("confirm-password").style.border = "2px solid #dc3545";
            return false;
        }
    }
    else {

        // Invalid password
        document.getElementById("confirm-password").style.border = "2px solid #dc3545";
        return false;
    }
}

function validCity(city, pattern) {

    if(city == null || city == "") {

        // not valid (Empty !)
        document.getElementById("city").style.border = "2px solid #dc3545";
        return false;
    }
    else if(pattern.test(city) != false) {

        // valid 
        document.getElementById("city").style.border = "2px solid lightgreen";
        return true;
    }
    else {

        // not valid other conditions
        document.getElementById("city").style.border = "2px solid #dc3545";
        return false;
    }
}

function validZipcode(zipcode, pattern) {

    if(zipcode == null || zipcode == "") {

        // not valid (Empty !)
        document.getElementById("zip").style.border = "2px solid #dc3545";
        return false;
    }
    else if(pattern.test(zipcode) != false && zipcode.length == 6) {

        // valid 
        document.getElementById("zip").style.border = "2px solid lightgreen";
        return true;
    }
    else {

        // not valid other conditions
        document.getElementById("zip").style.border = "2px solid #dc3545";
        return false;
    }
}

function validContact(contact, pattern) {

    if(contact == null || contact == "") {

        // not valid (Empty !)
        document.getElementById("contact").style.border = "2px solid #dc3545";
        return false;
    }
    else if(pattern.test(contact) != false && contact.length == 10) {

        // valid 
        document.getElementById("contact").style.border = "2px solid lightgreen";
        return true;
    }
    else {

        // not valid other conditions
        document.getElementById("contact").style.border = "2px solid #dc3545";
        return false;
    }
}

function validEmail(email, pattern) {

    if(email == null || email == "") {

        // not valid (Empty !)
        document.getElementById("e-mail").style.border = "2px solid #dc3545";
        return false;
    }
    else if(pattern.test(email) != false) {

        // valid 
        document.getElementById("e-mail").style.border = "2px solid lightgreen";
        return true;
    }
    else {

        // not valid other conditions
        document.getElementById("e-mail").style.border = "2px solid #dc3545";
        return false;
    }
}

// May need regex
function validAddress(address) {

    if(address == null || address == "") {

        // not valid (Empty !)
        document.getElementById("address").style.border = "2px solid #dc3545";
        return false;
    }
    else {

        // not empty (Valid)
        document.getElementById("address").style.border = "2px solid lightgreen";
        return true;
    }
}

function validAge(age, pattern) {

    if(age == null || age == "") {

        // not valid (Empty !)
        document.getElementById("age").style.border = "2px solid #dc3545";
        return false;
    }
    else if(pattern.test(age) != false && age > 0) {

        // valid
        document.getElementById("age").style.border = "2px solid lightgreen";
        return true;
    }
    else {

        // not valid other conditions
        document.getElementById("age").style.border = "2px solid #dc3545";
        return false;
    }
}