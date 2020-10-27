// Showing div citizen-complaint-status
function showComplaintStatus(element) {

    document.getElementById("citizen-register-new-complaint").style.display = "none";
    document.getElementById("citizen-complaint-status").style.display = "block";

    changeColor(element);
}

// Showing div citizen-register-new-complaint
function showRegisterNewComplaint(element) {

    document.getElementById("citizen-complaint-status").style.display = "none";
    document.getElementById("citizen-register-new-complaint").style.display = "block";

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