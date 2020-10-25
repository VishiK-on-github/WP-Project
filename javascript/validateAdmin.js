/*

This javascript code is used for the validation of 
the Admin user.

*/

function formValidation() {

    // Getting values of input from the form

    var password = (document.getElementById("passid").value).trim();
    var username = (document.getElementById("username").value).trim();

    // Defining regex for filtering (!important!)

    const regexUsername = /^[a-zA-Z0-9]+$/;
    const regexPassword = /^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[^\w\d]).*$/;


    function formValidityStatus() {

        // Container for different validity testing

        sf1 = validUsername(username, regexUsername);
        sf2 = validPassword(password, regexPassword);

    
        //alert(`Username status : ${sf1}`);
        //alert(`Password status : ${sf2}`);
        

        return (sf1 && sf2);
    }

    // Method which will give us validity of form

    //if (formValidityStatus()) {
    //    ajax();
    //}
    return formValidityStatus();
}

function validUsername(username, pattern) {

    if(username == null || username == "") {

        // not valid (Empty !)
        document.getElementById("username").style.border = "2px solid #dc3545";
        return false;
    }
    else if(pattern.test(username) != false) {

        // valid 
        document.getElementById("username").style.border = "2px solid lightgreen";
        return true;
    }
    else {

        // not valid other conditions
        document.getElementById("username").style.border = "2px solid #dc3545";
        return false;
    }
}

function validPassword(password, pattern) {

    if(password == null || password == "") {

        // not valid (Empty !)
        document.getElementById("passid").style.border = "2px solid #dc3545";
        return false;
    }
    else if(pattern.test(password) != false) {

        // valid 
        document.getElementById("passid").style.border = "2px solid lightgreen";
        return true;
    }
    else {

        // not valid other conditions
        document.getElementById("passid").style.border = "2px solid #dc3545";
        return false;
    }
}

//function ajax() {
//    var username = document.getElementById("username").value;  //username
//    var passid = document.getElementById("passid").value;  //password
//    var data = "function=verification&username=" + username + "&passid=" + passid;
//    $.ajax({ //using ajax to send data to php script to avoid refreshing of page
//        url: "http://localhost/wp_project/WP-Project/php-scripts/loginScripts/loginAdmin.php",
//        data: data,
//        success: function (message) {
//            if (message == "true") {
//                //window.location.href = "../../wp_project/wp-project/user-dashboards/admindashboard.html";
//                alert("You got in bitch");
//            }
//            else {
//                //alert("you have entered incorrect username or password")
//                alert(message);
//            }
//        }
//    });
//    return false;
//}


