function display() {

    var str = document.getElementById("pid_display").value;
    var data = "function=display&id=" + str;
         $.ajax({ //using ajax to send data to php script to avoid refreshing of page
             url: "http://localhost/wp_project/WP-Project/php-scripts/dashboardScripts/dashboardAdmin.php",
             data: data,
             success: function (list) {
                 var json = JSON.parse(list);
                 document.getElementById("ID_display").innerText = json["police_id"];
                 document.getElementById("location_display").innerText = json["location"];
                 document.getElementById("password_display").innerText = json["pwd"];
             }
        });
        return false;
}