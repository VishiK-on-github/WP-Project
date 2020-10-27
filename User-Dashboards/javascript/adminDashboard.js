



function add_police() {
    if (!validateRegistration_addPolice()) {  //to check whether fields entered correctly or not
        return false;
    }
    var pid = document.getElementById("pid").value;  //police id
    var location = document.getElementById("location").value;  //police station location
    var p_pass = document.getElementById("p_pass").value;  //police station password
    var data = "function=add_police&id="+pid+"&location="+location+"&password="+p_pass;
    $.ajax({ //using ajax to send data to php script to avoid refreshing of page
        url: "http://localhost/wp_project/WP-Project/php-scripts/dashboardScripts/dashboardAdmin.php",
        data: data,
        success: function (message) {
            alert(message);
        }
    });
    return false;
}

function add_citizen() {   
    if (!validateRegistration_addCitizen()) {  //to check whether fields entered correctly or not
        return false;
    }
    var fn = document.getElementById("fn").value; 
    var ln = document.getElementById("ln").value; 
    var city = document.getElementById("city").value;  
    var zip = document.getElementById("zip").value;  
    var age = document.getElementById("age").value;  
    var number = document.getElementById("number").value;  
    var addr = document.getElementById("addr").value;  
    var username = document.getElementById("username").value;  
    var email = document.getElementById("email").value;  
    var pass = document.getElementById("pass").value;  
    var data = `function=add_citizen&fn=${fn}&ln=${ln}&city=${city}&zip=${zip}&age=${age}&number=${number}&addr=${addr}&username=${username}&email=${email}&pass=${pass}`;
    console.log(data);
    $.ajax({ //using ajax to send data to php script to avoid refreshing of page
        url: "http://localhost/wp_project/WP-Project/php-scripts/dashboardScripts/dashboardAdmin.php",
        data: data,
        success: function (message) {
            alert(message);
            //location.assign("http://localhost/wp_project/WP-Project/User-Dashboards/adminDashboard.php#viewcitizen");
        }
    });
    
    return false;
}


function update_police() {
    if (!validateRegistration_updatePolice()) {  //to check whether fields entered correctly or not
        return false;
    }
    var pid = document.getElementById("pid_up").value;  //police id
    var location = document.getElementById("location_up").value;  //police station location
    var p_pass = document.getElementById("p_pass_up").value;  //police station password
    var data = "function=update_police&id=" + pid + "&location=" + location + "&password=" + p_pass;
    $.ajax({ //using ajax to send data to php script to avoid refreshing of page
        url: "http://localhost/wp_project/WP-Project/php-scripts/dashboardScripts/dashboardAdmin.php",
        data: data,
        success: function (message) {
            alert(message);
        }
    });
    return false;
}


function update_citizen() {
    if (!validateRegistration_updateCitizen()) {  //to check whether fields entered correctly or not
        return false;
    }
    var id = document.getElementById("id_up").value;
    var fn = document.getElementById("fn_up").value;
    var ln = document.getElementById("ln_up").value;
    var city = document.getElementById("city_up").value;
    var zip = document.getElementById("zip_up").value;
    var age = document.getElementById("age_up").value;
    var number = document.getElementById("number_up").value;
    var addr = document.getElementById("addr_up").value;
    var username = document.getElementById("username_up").value;
    var email = document.getElementById("email_up").value;
    var pass = document.getElementById("pass_up").value;
    var data = `function=update_citizen&id=${id}&fn=${fn}&ln=${ln}&city=${city}&zip=${zip}&age=${age}&number=${number}&addr=${addr}&username=${username}&email=${email}&pass=${pass}`;
    console.log(data);
    $.ajax({ //using ajax to send data to php script to avoid refreshing of page
        url: "http://localhost/wp_project/WP-Project/php-scripts/dashboardScripts/dashboardAdmin.php",
        data: data,
        success: function (message) {
            alert(message);
        }
    });
    return false;
}




function delete_func_police() {  //delete is a reserved keyword

    var pid = document.getElementById("pid_delete").value;
    var data = "function=delete_police&id=" + pid;
    $.ajax({ //using ajax to send data to php script to avoid refreshing of page
        url: "http://localhost/wp_project/WP-Project/php-scripts/dashboardScripts/dashboardAdmin.php",
        data: data,
        success: function (message) {
            alert(message);
        }
    });
    return false;
}

function delete_func_citizen() {  //delete is a reserved keyword

    var id = document.getElementById("id_delete").value;
    var data = "function=delete_citizen&id=" + id;
    $.ajax({ //using ajax to send data to php script to avoid refreshing of page
        url: "http://localhost/wp_project/WP-Project/php-scripts/dashboardScripts/dashboardAdmin.php",
        data: data,
        success: function (message) {
            alert(message);
        }
    });
    return false;
}

function delete_func_complaint() {  //delete is a reserved keyword

    var id = document.getElementById("c_id_delete").value;
    var data = "function=delete_complaint&id=" + id;
    $.ajax({ //using ajax to send data to php script to avoid refreshing of page
        url: "http://localhost/wp_project/WP-Project/php-scripts/dashboardScripts/dashboardAdmin.php",
        data: data,
        success: function (message) {
            alert(message);
        }
    });
    return false;
}



function validateRegistration_addCitizen() {  //function to validate adding of citizen

    // Getting values of input from the form
   
    var firstName = (document.getElementById("fn").value).trim();
    var lastName = (document.getElementById("ln").value).trim();
    var username = (document.getElementById("username").value).trim();
    var email = (document.getElementById("email").value).trim();
    var password = (document.getElementById("pass").value).trim();
    var confirmPassword = (document.getElementById("c_pass").value).trim();
    var address = (document.getElementById("addr").value).trim();
    var city = document.getElementById("city").value;
    var zipcode = (document.getElementById("zip").value).trim();
    var contact = (document.getElementById("number").value).trim();
    var age = parseInt((document.getElementById("age").value).trim());

    // Defining regex for filtering

    const regexName = /^[a-zA-Z]+$/;
    const regexUsername = /^[a-zA-Z0-9]+$/;
    const regexPassword = /^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[^\w\d]).*$/;
    const regexEmail = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    const regexNumber = /^[0-9]+$/;
    

    function formValidityStatus() {

        // Container for different validity testing result outputs
        
        sf1 = validFirstName(firstName, regexName,'fn');
        sf2 = validLastName(lastName, regexName,'ln');
        sf3 = validUsername(username, regexUsername,'username');
        sf4 = validPassword(password, regexPassword,'pass');
        sf5 = validConfirmPassword(sf4, password, confirmPassword,'c_pass');
        sf6 = validCity(city, regexName,'city');
        sf7 = validZipcode(zipcode, regexNumber,'zip');
        sf8 = validContact(contact, regexNumber,'number');
        sf9 = validEmail(email, regexEmail,'email');
        sf10 = validAddress(address,'addr');
        sf11 = validAge(age, regexNumber,'age');

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


function validateRegistration_updateCitizen() {  //function to validate update of citizen

    // Getting values of input from the form
    var id = document.getElementById("id_up").value;
    var firstName = (document.getElementById("fn_up").value).trim();
    var lastName = (document.getElementById("ln_up").value).trim();
    var username = (document.getElementById("username_up").value).trim();
    var email = (document.getElementById("email_up").value).trim();
    var password = (document.getElementById("pass_up").value).trim();
    //var confirmPassword = (document.getElementById("c_pass").value).trim();
    var address = (document.getElementById("addr_up").value).trim();
    var city = document.getElementById("city_up").value;
    var zipcode = (document.getElementById("zip_up").value).trim();
    var contact = (document.getElementById("number_up").value).trim();
    var age = parseInt((document.getElementById("age_up").value).trim());

    // Defining regex for filtering

    const regexName = /^[a-zA-Z]+$/;
    const regexUsername = /^[a-zA-Z0-9]+$/;
    const regexPassword = /^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[^\w\d]).*$/;
    const regexEmail = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    const regexNumber = /^[0-9]+$/;
    const regexDigit = /^[0-9]*$/;

    function formValidityStatus() {

        // Container for different validity testing result outputs
        sf0 = validID(id, regexDigit, 'id_up');
        sf1 = validFirstName(firstName, regexName, 'fn_up');
        sf2 = validLastName(lastName, regexName, 'ln_up');
        sf3 = validUsername(username, regexUsername, 'username_up');
        sf4 = validPassword(password, regexPassword, 'pass_up');
        //sf5 = validConfirmPassword(sf4, password, confirmPassword, 'c_pass_up');
        sf6 = validCity(city, regexName, 'city_up');
        sf7 = validZipcode(zipcode, regexNumber, 'zip_up');
        sf8 = validContact(contact, regexNumber, 'number_up');
        sf9 = validEmail(email, regexEmail, 'email_up');
        sf10 = validAddress(address, 'addr_up');
        sf11 = validAge(age, regexNumber, 'age_up');

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

        return (sf0&&sf1 && sf2 && sf3 && sf4 && sf6 && sf7 && sf8 && sf9 && sf10 && sf11);
    }

    // Method which will give us validity of form

    return formValidityStatus();
}


function validateRegistration_addPolice() {  //function to validate adding of citizen

    // Getting values of input from the form
    var id = document.getElementById("pid").value;
    var password = (document.getElementById("p_pass").value).trim();
    var location = (document.getElementById("location").value).trim();

    // Defining regex for filtering

    const regexName = /^[a-zA-Z]+$/;
    const regexPassword = /^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[^\w\d]).*$/;
    const regexNumber = /^[0-9]+$/;
    const regexDigit = /^[0-9]*$/;

    function formValidityStatus() {

        // Container for different validity testing result outputs

        sf1 = validID(id, regexDigit, 'pid');
        sf2 = validPassword(password, regexPassword, 'p_pass');
        sf3 = validFirstName(location, regexName, 'location');

      

        return (sf1 && sf2 && sf3);
    }

    // Method which will give us validity of form

    return formValidityStatus();
}


function validateRegistration_updatePolice() {  //function to validate adding of citizen

    // Getting values of input from the form
    var id = document.getElementById("pid_up").value;
    var password = (document.getElementById("p_pass_up").value).trim();
    var location = (document.getElementById("location_up").value).trim();

    // Defining regex for filtering

    const regexName = /^[a-zA-Z]+$/;
    const regexPassword = /^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[^\w\d]).*$/;
    const regexNumber = /^[0-9]+$/;
    const regexDigit = /^[0-9]*$/;

    function formValidityStatus() {

        // Container for different validity testing result outputs

        sf1 = validID(id, regexDigit, 'pid_up');
        sf2 = validPassword(password, regexPassword, 'p_pass_up');
        sf3 = validFirstName(location, regexName, 'location_up');



        return (sf1 && sf2 && sf3);
    }

    // Method which will give us validity of form

    return formValidityStatus();
}





function validID(ID, pattern, id) {

    if (ID == null || ID == "") {

        // not valid (Empty !)
        document.getElementById(id).style.border = "2px solid #dc3545";
        return false;
    }
    else if (pattern.test(ID) != false) {

        // valid
        document.getElementById(id).style.border = "2px solid lightgreen";
        return true;
    }
    else {

        // not valid other conditions
        document.getElementById(id).style.border = "2px solid #dc3545";
        return false;
    }
}

function validFirstName(firstName, pattern,id) {

    if (firstName == null || firstName == "") {

        // not valid (Empty !)
        document.getElementById(id).style.border = "2px solid #dc3545";
        return false;
    }
    else if (pattern.test(firstName) != false) {

        // valid
        document.getElementById(id).style.border = "2px solid lightgreen";
        return true;
    }
    else {

        // not valid other conditions
        document.getElementById(id).style.border = "2px solid #dc3545";
        return false;
    }
}

function validLastName(lastName, pattern,id) {

    if (lastName == null || lastName == "") {

        // not valid (Empty !)
        document.getElementById(id).style.border = "2px solid #dc3545";
        return false;
    }
    else if (pattern.test(lastName) != false) {

        // valid
        document.getElementById(id).style.border = "2px solid lightgreen";
        return true;
    }
    else {

        // not valid other conditions
        document.getElementById(id).style.border = "2px solid #dc3545";
        return false;
    }
}

function validUsername(username, pattern, id) {

    if (username == null || username == "") {

        // not valid (Empty !)
        document.getElementById(id).style.border = "2px solid #dc3545";
        return false;
    }
    else if (pattern.test(username) != false) {

        // valid 
        document.getElementById(id).style.border = "2px solid lightgreen";
        return true;
    }
    else {

        // not valid other conditions
        document.getElementById(id).style.border = "2px solid #dc3545";
        return false;
    }
}

function validPassword(password, pattern, id) {

    if (password == null || password == "") {

        // not valid (Empty !)
        document.getElementById(id).style.border = "2px solid #dc3545";
        return false;
    }
    else if (pattern.test(password) != false) {

        // valid 
        document.getElementById(id).style.border = "2px solid lightgreen";
        return true;
    }
    else {

        // not valid other conditions
        document.getElementById(id).style.border = "2px solid #dc3545";
        return false;
    }
}

function validConfirmPassword(status, password, confirmPassword, id) {

    if (status == true) {

        if (password == confirmPassword) {

            // Password and confirm password match
            document.getElementById(id).style.border = "2px solid lightgreen";
            return true;
        }
        else {

            // Passwords dont match
            document.getElementById(id).style.border = "2px solid #dc3545";
            return false;
        }
    }
    else {

        // Invalid password
        document.getElementById(id).style.border = "2px solid #dc3545";
        return false;
    }
}

function validCity(city, pattern, id) {

    if (city == null || city == "") {

        // not valid (Empty !)
        document.getElementById(id).style.border = "2px solid #dc3545";
        return false;
    }
    else if (pattern.test(city) != false) {

        // valid 
        document.getElementById(id).style.border = "2px solid lightgreen";
        return true;
    }
    else {

        // not valid other conditions
        document.getElementById(id).style.border = "2px solid #dc3545";
        return false;
    }
}

function validZipcode(zipcode, pattern, id) {

    if (zipcode == null || zipcode == "") {

        // not valid (Empty !)
        document.getElementById(id).style.border = "2px solid #dc3545";
        return false;
    }
    else if (pattern.test(zipcode) != false && zipcode.length == 6) {

        // valid 
        document.getElementById(id).style.border = "2px solid lightgreen";
        return true;
    }
    else {

        // not valid other conditions
        document.getElementById(id).style.border = "2px solid #dc3545";
        return false;
    }
}

function validContact(contact, pattern, id) {

    if (contact == null || contact == "") {

        // not valid (Empty !)
        document.getElementById(id).style.border = "2px solid #dc3545";
        return false;
    }
    else if (pattern.test(contact) != false && contact.length == 10) {

        // valid 
        document.getElementById(id).style.border = "2px solid lightgreen";
        return true;
    }
    else {

        // not valid other conditions
        document.getElementById(id).style.border = "2px solid #dc3545";
        return false;
    }
}

function validEmail(email, pattern, id) {

    if (email == null || email == "") {

        // not valid (Empty !)
        document.getElementById(id).style.border = "2px solid #dc3545";
        return false;
    }
    else if (pattern.test(email) != false) {

        // valid 
        document.getElementById(id).style.border = "2px solid lightgreen";
        return true;
    }
    else {

        // not valid other conditions
        document.getElementById(id).style.border = "2px solid #dc3545";
        return false;
    }
}

// May need regex
function validAddress(address, id) {

    if (address == null || address == "") {

        // not valid (Empty !)
        document.getElementById(id).style.border = "2px solid #dc3545";
        return false;
    }
    else {

        // not empty (Valid)
        document.getElementById(id).style.border = "2px solid lightgreen";
        return true;
    }
}

function validAge(age, pattern, id) {

    if (age == null || age == "") {

        // not valid (Empty !)
        document.getElementById(id).style.border = "2px solid #dc3545";
        return false;
    }
    else if (pattern.test(age) != false && age > 0) {

        // valid
        document.getElementById(id).style.border = "2px solid lightgreen";
        return true;
    }
    else {

        // not valid other conditions
        document.getElementById(id).style.border = "2px solid #dc3545";
        return false;
    }
}


