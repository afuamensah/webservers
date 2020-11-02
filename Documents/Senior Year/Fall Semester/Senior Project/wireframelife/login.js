"use strict";

var $ = function(id) {
    return document.getElementById(id);
}

var login = function() {
    var email="";
    var password="";
    var myEmail = "aamensah@mail.lipscomb.edu";
    var myPass = "Bookworm99!";

    email = $("email").value;
    password = $("password").value;
    errorMessage = "";

    if(email != myEmail) {
        errorMessage = "Email is not correct. Please try again";
        alert(errorMessage);
    }

    if(password != myPass) {
        errorMessage = "Password is not correct. Please try again";
        alert(errorMessage);
    }
}

window.onload = function() {
    $("login").onclick = login;
}

