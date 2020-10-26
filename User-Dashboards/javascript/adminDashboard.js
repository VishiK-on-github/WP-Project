



function add_police() {

    var pid = document.getElementById("pid").value;  //police id
    var location = document.getElementById("location").value;  //police station location
    var p_pass = document.getElementById("p_pass").value;  //police station password
    var data = "function=add_police&id="+pid+"&location="+location+"&password="+p_pass;
    $.ajax({ //using ajax to send data to php script to avoid refreshing of page
        url: "http://localhost/wp_project/WP-Project/php-scripts/dashboardScripts/dashboardAdmin.php",
        data: data,
        success: function (message) {
            alert(message);
        }
    });
    return false;
}

function add_citizen() {
    var fn = document.getElementById("fn").value; 
    var ln = document.getElementById("ln").value; 
    var city = document.getElementById("city").value;  
    var zip = document.getElementById("zip").value;  
    var age = document.getElementById("age").value;  
    var number = document.getElementById("number").value;  
    var addr = document.getElementById("addr").value;  
    var username = document.getElementById("username").value;  
    var email = document.getElementById("email").value;  
    var pass = document.getElementById("pass").value;  
    var data = `function=add_citizen&fn=${fn}&ln=${ln}&city=${city}&zip=${zip}&age=${age}&number=${number}&addr=${addr}&username=${username}&email=${email}&pass=${pass}`;
    console.log(data);
    $.ajax({ //using ajax to send data to php script to avoid refreshing of page
        url: "http://localhost/wp_project/WP-Project/php-scripts/dashboardScripts/dashboardAdmin.php",
        data: data,
        success: function (message) {
            alert(message);
        }
    });
    return false;
}


function update_police() {
    var pid = document.getElementById("pid_up").value;  //police id
    var location = document.getElementById("location_up").value;  //police station location
    var p_pass = document.getElementById("p_pass_up").value;  //police station password
    var data = "function=update_police&id=" + pid + "&location=" + location + "&password=" + p_pass;
    $.ajax({ //using ajax to send data to php script to avoid refreshing of page
        url: "http://localhost/wp_project/WP-Project/php-scripts/dashboardScripts/dashboardAdmin.php",
        data: data,
        success: function (message) {
            alert(message);
        }
    });
    return false;
}


function update_citizen() {
    var id = document.getElementById("id_up").value;
    var fn = document.getElementById("fn_up").value;
    var ln = document.getElementById("ln_up").value;
    var city = document.getElementById("city_up").value;
    var zip = document.getElementById("zip_up").value;
    var age = document.getElementById("age_up").value;
    var number = document.getElementById("number_up").value;
    var addr = document.getElementById("addr_up").value;
    var username = document.getElementById("username_up").value;
    var email = document.getElementById("email_up").value;
    var pass = document.getElementById("pass_up").value;
    var data = `function=update_citizen&id=${id}&fn=${fn}&ln=${ln}&city=${city}&zip=${zip}&age=${age}&number=${number}&addr=${addr}&username=${username}&email=${email}&pass=${pass}`;
    console.log(data);
    $.ajax({ //using ajax to send data to php script to avoid refreshing of page
        url: "http://localhost/wp_project/WP-Project/php-scripts/dashboardScripts/dashboardAdmin.php",
        data: data,
        success: function (message) {
            alert(message);
        }
    });
    return false;
}




function delete_func_police() {  //delete is a reserved keyword

    var pid = document.getElementById("pid_delete").value;
    var data = "function=delete_police&id=" + pid;
    $.ajax({ //using ajax to send data to php script to avoid refreshing of page
        url: "http://localhost/wp_project/WP-Project/php-scripts/dashboardScripts/dashboardAdmin.php",
        data: data,
        success: function (message) {
            alert(message);
        }
    });
    return false;
}

function delete_func_citizen() {  //delete is a reserved keyword

    var id = document.getElementById("id_delete").value;
    var data = "function=delete_citizen&id=" + id;
    $.ajax({ //using ajax to send data to php script to avoid refreshing of page
        url: "http://localhost/wp_project/WP-Project/php-scripts/dashboardScripts/dashboardAdmin.php",
        data: data,
        success: function (message) {
            alert(message);
        }
    });
    return false;
}

function delete_func_complaint() {  //delete is a reserved keyword

    var id = document.getElementById("c_id_delete").value;
    var data = "function=delete_complaint&id=" + id;
    $.ajax({ //using ajax to send data to php script to avoid refreshing of page
        url: "http://localhost/wp_project/WP-Project/php-scripts/dashboardScripts/dashboardAdmin.php",
        data: data,
        success: function (message) {
            alert(message);
        }
    });
    return false;
}



