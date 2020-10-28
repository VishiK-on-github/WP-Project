// To show the police-station-view div and hide all other components
function showViewPoliceStation(element) {

    document.getElementById("citizen-functions").style.display = "none";
    document.getElementById("complaint-functions").style.display = "none";
    document.getElementById("police-functions").style.display = "block";

    document.getElementById("police-station-view").style.display = "block";
    document.getElementById("police-station-add").style.display = "none";
    document.getElementById("police-station-update").style.display = "none";
    document.getElementById("police-station-delete").style.display = "none";

    changeColor(element);
}

// To show the police-station-add div and hide all other components
function showAddPoliceStation(element) {

    document.getElementById("citizen-functions").style.display = "none";
    document.getElementById("complaint-functions").style.display = "none";
    document.getElementById("police-functions").style.display = "block";
    
    document.getElementById("police-station-add").style.display = "block";
    document.getElementById("police-station-view").style.display = "none";
    document.getElementById("police-station-update").style.display = "none";
    document.getElementById("police-station-delete").style.display = "none";

    changeColor(element);
}


// To show the police-station-update div and hide all other components
function showUpdatePoliceStation(element) {

    document.getElementById("citizen-functions").style.display = "none";
    document.getElementById("complaint-functions").style.display = "none";
    document.getElementById("police-functions").style.display = "block";
    
    document.getElementById("police-station-update").style.display = "block";
    document.getElementById("police-station-view").style.display = "none";
    document.getElementById("police-station-add").style.display = "none";
    document.getElementById("police-station-delete").style.display = "none";

    changeColor(element);
}

// To show the police-station-delete div and hide all other components
function showDeletePoliceStation(element) {

    document.getElementById("citizen-functions").style.display = "none";
    document.getElementById("complaint-functions").style.display = "none";
    document.getElementById("police-functions").style.display = "block";
    
    document.getElementById("police-station-delete").style.display = "block";
    document.getElementById("police-station-view").style.display = "none";
    document.getElementById("police-station-add").style.display = "none";
    document.getElementById("police-station-update").style.display = "none";

    changeColor(element);
}

// To show the citizen-view div and hide all other components
function showViewCitizen(element) {

    document.getElementById("police-functions").style.display = "none";
    document.getElementById("complaint-functions").style.display = "none";
    document.getElementById("citizen-functions").style.display = "block";

    document.getElementById("citizen-view").style.display = "block";
    document.getElementById("citizen-add").style.display = "none";
    document.getElementById("citizen-update").style.display = "none";
    document.getElementById("citizen-delete").style.display = "none";

    changeColor(element);
}

// To show the citizen-add div and hide all other components
function showAddCitizen(element) {

    document.getElementById("police-functions").style.display = "none";
    document.getElementById("complaint-functions").style.display = "none";
    document.getElementById("citizen-functions").style.display = "block";

    document.getElementById("citizen-add").style.display = "block";
    document.getElementById("citizen-view").style.display = "none";
    document.getElementById("citizen-update").style.display = "none";
    document.getElementById("citizen-delete").style.display = "none";

    changeColor(element);
}

// To show the citizen-update div and hide all other components
function showUpdateCitizen(element) {

    document.getElementById("police-functions").style.display = "none";
    document.getElementById("complaint-functions").style.display = "none";
    document.getElementById("citizen-functions").style.display = "block";

    document.getElementById("citizen-update").style.display = "block";
    document.getElementById("citizen-view").style.display = "none";
    document.getElementById("citizen-add").style.display = "none";
    document.getElementById("citizen-delete").style.display = "none";

    changeColor(element);
}

// To show the citizen-delete div and hide all other components
function showDeleteCitizen(element) {

    document.getElementById("police-functions").style.display = "none";
    document.getElementById("complaint-functions").style.display = "none";
    document.getElementById("citizen-functions").style.display = "block";

    document.getElementById("citizen-delete").style.display = "block";
    document.getElementById("citizen-view").style.display = "none";
    document.getElementById("citizen-add").style.display = "none";
    document.getElementById("citizen-update").style.display = "none";

    changeColor(element);
}

// To show the complaint-view div and hide all other components
function showViewComplaint(element) {

    document.getElementById("police-functions").style.display = "none";
    document.getElementById("citizen-functions").style.display = "none";
    document.getElementById("complaint-functions").style.display = "block";

    document.getElementById("complaint-view").style.display = "block";
    document.getElementById("complaint-delete").style.display = "none";

    changeColor(element);
}

// To show the complaint-delete div and hide all other components
function showDeleteComplaint(element) {

    document.getElementById("police-functions").style.display = "none";
    document.getElementById("citizen-functions").style.display = "none";
    document.getElementById("complaint-functions").style.display = "block";

    document.getElementById("complaint-delete").style.display = "block";
    document.getElementById("complaint-view").style.display = "none";

    changeColor(element);
}

function changeColor(element) {

   
    const functionList = document.getElementsByClassName("nav-link");
    for(var i=0; i<functionList.length; i++) {

        if(functionList[i] == element) {

            functionList[i].parentNode.style.backgroundColor = "grey";
            functionList[i].style.color = "lightgreen";
        }
        else {

            functionList[i].parentNode.style.backgroundColor = "transparent";
            functionList[i].style.color = "#333";
        }
    }
}