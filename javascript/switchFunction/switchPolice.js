// Showing div police-station-view
function showViewComplaint(element) {

    document.getElementById("police-station-view").style.display = "block";
    document.getElementById("police-station-update-complaint-status").style.display = "none";

    changeColor(element);
}

// Showing div police-station-update-complaint-status
function showUpdateComplaintStatus(element) {

    document.getElementById("police-station-update-complaint-status").style.display = "block";
    document.getElementById("police-station-view").style.display = "none";

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