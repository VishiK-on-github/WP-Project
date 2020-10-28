function validation(){

    // Getting values of input from the form

    var password = (document.getElementById("password").value).trim();
    var username = (document.getElementById("username").value).trim();
    
    // Defining regex for filtering (!important!)

    const regexUsername = /^[0-9a-zA-Z]{8,}$/;
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