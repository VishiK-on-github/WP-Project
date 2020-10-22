// To show the police-station-view div and hide all other components
function showViewPoliceStation() {

    document.getElementById("citizen-functions").style.display = "none";
    document.getElementById("complaint-functions").style.display = "none";
    document.getElementById("police-functions").style.display = "block";

    document.getElementById("police-station-view").style.display = "block";
    document.getElementById("police-station-add").style.display = "none";
    document.getElementById("police-station-update").style.display = "none";
    document.getElementById("police-station-delete").style.display = "none";
}

// To show the police-station-add div and hide all other components
function showAddPoliceStation() {

    document.getElementById("citizen-functions").style.display = "none";
    document.getElementById("complaint-functions").style.display = "none";
    document.getElementById("police-functions").style.display = "block";
    
    document.getElementById("police-station-add").style.display = "block";
    document.getElementById("police-station-view").style.display = "none";
    document.getElementById("police-station-update").style.display = "none";
    document.getElementById("police-station-delete").style.display = "none";
}


// To show the police-station-update div and hide all other components
function showUpdatePoliceStation() {

    document.getElementById("citizen-functions").style.display = "none";
    document.getElementById("complaint-functions").style.display = "none";
    document.getElementById("police-functions").style.display = "block";
    
    document.getElementById("police-station-update").style.display = "block";
    document.getElementById("police-station-view").style.display = "none";
    document.getElementById("police-station-add").style.display = "none";
    document.getElementById("police-station-delete").style.display = "none";
}

// To show the police-station-delete div and hide all other components
function showDeletePoliceStation() {

    document.getElementById("citizen-functions").style.display = "none";
    document.getElementById("complaint-functions").style.display = "none";
    document.getElementById("police-functions").style.display = "block";
    
    document.getElementById("police-station-delete").style.display = "block";
    document.getElementById("police-station-view").style.display = "none";
    document.getElementById("police-station-add").style.display = "none";
    document.getElementById("police-station-update").style.display = "none";
}

// To show the citizen-view div and hide all other components
function showViewCitizen() {

    document.getElementById("police-functions").style.display = "none";
    document.getElementById("complaint-functions").style.display = "none";
    document.getElementById("citizen-functions").style.display = "block";

    document.getElementById("citizen-view").style.display = "block";
    document.getElementById("citizen-add").style.display = "none";
    document.getElementById("citizen-update").style.display = "none";
    document.getElementById("citizen-delete").style.display = "none";
}

// To show the citizen-add div and hide all other components
function showAddCitizen() {

    document.getElementById("police-functions").style.display = "none";
    document.getElementById("complaint-functions").style.display = "none";
    document.getElementById("citizen-functions").style.display = "block";

    document.getElementById("citizen-add").style.display = "block";
    document.getElementById("citizen-view").style.display = "none";
    document.getElementById("citizen-update").style.display = "none";
    document.getElementById("citizen-delete").style.display = "none";
}

// To show the citizen-update div and hide all other components
function showUpdateCitizen() {

    document.getElementById("police-functions").style.display = "none";
    document.getElementById("complaint-functions").style.display = "none";
    document.getElementById("citizen-functions").style.display = "block";

    document.getElementById("citizen-update").style.display = "block";
    document.getElementById("citizen-view").style.display = "none";
    document.getElementById("citizen-add").style.display = "none";
    document.getElementById("citizen-delete").style.display = "none";
}

// To show the citizen-delete div and hide all other components
function showDeleteCitizen() {

    document.getElementById("police-functions").style.display = "none";
    document.getElementById("complaint-functions").style.display = "none";
    document.getElementById("citizen-functions").style.display = "block";

    document.getElementById("citizen-delete").style.display = "block";
    document.getElementById("citizen-view").style.display = "none";
    document.getElementById("citizen-add").style.display = "none";
    document.getElementById("citizen-update").style.display = "none";
}

// To show the complaint-view div and hide all other components
function showViewComplaint() {

    document.getElementById("police-functions").style.display = "none";
    document.getElementById("citizen-functions").style.display = "none";
    document.getElementById("complaint-functions").style.display = "block";

    document.getElementById("complaint-view").style.display = "block";
    document.getElementById("complaint-update").style.display = "none";
    document.getElementById("complaint-delete").style.display = "none";
}

// To show the complaint-update div and hide all other components
function showUpdateComplaint() {

    document.getElementById("police-functions").style.display = "none";
    document.getElementById("citizen-functions").style.display = "none";
    document.getElementById("complaint-functions").style.display = "block";
    
    document.getElementById("complaint-update").style.display = "block";
    document.getElementById("complaint-view").style.display = "none";
    document.getElementById("complaint-delete").style.display = "none";
}

// To show the complaint-delete div and hide all other components
function showDeleteComplaint() {

    document.getElementById("police-functions").style.display = "none";
    document.getElementById("citizen-functions").style.display = "none";
    document.getElementById("complaint-functions").style.display = "block";

    document.getElementById("complaint-delete").style.display = "block";
    document.getElementById("complaint-view").style.display = "none";
    document.getElementById("complaint-update").style.display = "none";
}