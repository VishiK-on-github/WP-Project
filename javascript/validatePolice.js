/*

This javascript code is used for the validation of 
the login form by police office/police officers.

*/

function validateLoginForm(){
    
    // Getting values of input from the form

    var pid = (document.getElementById("pid").value).trim();
    var password = (document.getElementById("pass").value).trim();

    // Defining regex for filtering (!important!)

    const regexPid = /^\d{1,5}$/;
    const regexPassword = /^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[^\w\d]).*$/; //One capital, one small, one number, one special character, min length 8


    function formValidityStatus() {

        // Container for different validity testing

        sf1 = validPid(pid, regexPid);
        sf2 = validPassword(password, regexPassword);

    
        //alert(`pid status : ${sf1}`);
        //alert(`Password status : ${sf2}`);
        

        return (sf1 && sf2);
    }

    // Method which will give us validity of form

    return formValidityStatus();
}

function validPid(pid, pattern) {

    if(pid == null || pid == "") {

        // not valid (Empty !)
        document.getElementById("pid").style.border = "2px solid #dc3545";
        return false;
    }
    else if(pattern.test(pid) != false) {

        // valid 
        document.getElementById("pid").style.border = "2px solid lightgreen";
        return true;
    }
    else {

        // not valid other conditions
        document.getElementById("pid").style.border = "2px solid #dc3545";
        return false;
    }
}

function validPassword(password, pattern) {

    if(password == null || password == "") {

        // not valid (Empty !)
        document.getElementById("pass").style.border = "2px solid #dc3545";
        return false;
    }
    else if(pattern.test(password) != false) {

        // valid 
        document.getElementById("pass").style.border = "2px solid lightgreen";
        return true;
    }
    else {

        // not valid other conditions
        document.getElementById("pass").style.border = "2px solid #dc3545";
        return false;
    }
}