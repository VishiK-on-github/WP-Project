function validNewComplaint() {

    // Getting elements from form
    var complaint = document.getElementById("new-complaint").value.trim();
    var location = document.getElementById("location").value.trim();

    // To determine state of fields
    var sf1 = false;
    var sf2 = false;

    // regex for string
    const regexLoc = /^[a-zA-Z]+$/;

    // Validation of complaint
    if(complaint.length > 0 && complaint.length <= 200) {

        // Valid complaint
        document.getElementById("new-complaint").style.border = "2px solid lightgreen";
        sf1 = true;
    }
    else {

        // Invalid complaint
        document.getElementById("new-complaint").style.border = "2px solid #dc3545";
        sf1 = false;
    }

    // Validation of location
    if(location == ''|| location == null) {

        // Invalid location
        document.getElementById("location").style.border = "2px solid #dc3545";
        sf2 = false;
    }
    else if(regexLoc.test(location) != false) {

        // Valid location
        document.getElementById("location").style.border = "2px solid lightgreen";
        sf2 = false;
    }
    else {

        // Invalid location
        document.getElementById("location").style.border = "2px solid #dc3545";
        sf2 = false;
    }

    return sf1 && sf2;
}