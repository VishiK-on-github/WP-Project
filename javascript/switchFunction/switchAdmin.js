function showViewPoliceStation() {

    document.getElementById("police-station-view").style.display = "block";
    document.getElementById("police-station-add").style.display = "none";
    document.getElementById("police-station-update").style.display = "none";
    document.getElementById("police-station-delete").style.display = "none";
}

function showAddPoliceStation() {
    
    document.getElementById("police-station-add").style.display = "block";
    document.getElementById("police-station-view").style.display = "none";
    document.getElementById("police-station-update").style.display = "none";
    document.getElementById("police-station-delete").style.display = "none";
}

function showUpdatePoliceStation() {
    
    document.getElementById("police-station-update").style.display = "block";
    document.getElementById("police-station-view").style.display = "none";
    document.getElementById("police-station-add").style.display = "none";
    document.getElementById("police-station-delete").style.display = "none";
}

function showDeletePoliceStation() {
    
    document.getElementById("police-station-delete").style.display = "block";
    document.getElementById("police-station-view").style.display = "none";
    document.getElementById("police-station-add").style.display = "none";
    document.getElementById("police-station-update").style.display = "none";
}