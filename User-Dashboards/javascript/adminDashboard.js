function display() {

    var str = document.getElementById("pid_display").value;
    var data = "function=display&id=" + str;
         $.ajax({ //using ajax to send data to php script to avoid refreshing of page
             url: "http://localhost/wp_project/WP-Project/php-scripts/dashboardScripts/dashboardAdmin.php",
             data: data,
             success: function (list) {
                 var json = JSON.parse(list);
                 if (json == null) {
                     alert("ID does not exist in database");
                     return false;
                 }
                 document.getElementById("ID_display").innerText = json["police_id"];
                 document.getElementById("location_display").innerText = json["location"];
                 document.getElementById("password_display").innerText = json["pwd"];
             }
        });
        return false;
}



function add() {

    var pid = document.getElementById("pid").value;  //police id
    var location = document.getElementById("location").value;  //police station location
    var p_pass = document.getElementById("p_pass").value;  //police station password
    var data = "function=add&id="+pid+"&location="+location+"&password="+p_pass;
    $.ajax({ //using ajax to send data to php script to avoid refreshing of page
        url: "http://localhost/wp_project/WP-Project/php-scripts/dashboardScripts/dashboardAdmin.php",
        data: data,
        success: function (message) {
            alert(message);
        }
    });
    return false;
}

function update() {
    var pid = document.getElementById("pid_up").value;  //police id
    var location = document.getElementById("location_up").value;  //police station location
    var p_pass = document.getElementById("p_pass_up").value;  //police station password
    var data = "function=update&id=" + pid + "&location=" + location + "&password=" + p_pass;
    alert(data);
    $.ajax({ //using ajax to send data to php script to avoid refreshing of page
        url: "http://localhost/wp_project/WP-Project/php-scripts/dashboardScripts/dashboardAdmin.php",
        data: data,
        success: function (message) {
            alert(message);
        }
    });
    return false;
}

function delete_func() {  //delete is a reserved keyword

    var pid = document.getElementById("pid_delete").value;
    var data = "function=delete&id=" + pid;
    $.ajax({ //using ajax to send data to php script to avoid refreshing of page
        url: "http://localhost/wp_project/WP-Project/php-scripts/dashboardScripts/dashboardAdmin.php",
        data: data,
        success: function (message) {
            alert(message);
        }
    });
    return false;
}