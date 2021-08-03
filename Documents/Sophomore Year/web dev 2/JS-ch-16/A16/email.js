"use strict";

$(document).ready(function() {

    $("#elist").submit(
        function(evt) {
			
            var isValid = true;

            var email1 = $("#email").val().trim();
            var email2 = $("#confirmEmail").val().trim();
            var fName = $("#fName").val().trim();
            var lName = $("#lName").val().trim();
            var phone = $("#phone").val().trim();
            var state = $("#state").val().trim();            

            var emailPattern = /^[\w\.\-]+@[\w\.\-]+\.[a-zA-Z]+$/;
            if (email1 == "") { 
				$("#email").next().text("This field is required.");
				isValid = false;
			} else if ( !emailPattern.test(email1) ) {
				$("#email").next().text("Must be a valid email address.");
				isValid = false;
			} else {
				$("#email").next().text("");
				localStorage.emails = email1;
            }
            $("#email").val(email1);

			if (email2 == "") { 
				$("#confirmEmail").next().text("This field is required.");
				isValid = false; 
			} else if (email2 !== email1) { 
				$("##confirmEmail").next().text("Must equal first email entry.");
				isValid = false;
			} else {
				$("#confirmEmail").next().text("");
			}
            $("#confirmEmail").val(email2);
            
            if (fName == "") {
				$("#fName").next().text("This field is required.");
				isValid = false;
			} else {
				$("#fName").next().text("");
            }
            $("#fName").val(fName);

            if (lName == "") {
				$("#lName").next().text("This field is required.");
				isValid = false;
			} else {
				$("#lName").next().text("");
			}
			$("#lName").val(lName);
			
			var phonePattern = /^\d{3}-\d{3}-\d{4}$/;
			if (phone == "") {
				$("#phone").next().text("This field is required.");
				isValid = false;
			} 
			else if (!phonePattern.test(phone)) {
				$("#phone").next().text("Phone number must be in NNN-NNN-NNNN format.");
				isValid = false;
			}
			else {
				$("#phone").next().text("");
			}
            
			if (state == "") {
				$("#state").next().text("This field is required.");
				isValid = false;
			} else if ( state.length != 2 ) {
				$("#state").next().text("Use 2-character code.");
				isValid = false;
			} else {
				$("#state").next().text("");
			}
            $("#state").val(state);
            
            if (isValid == false) {
                evt.preventDefault();	
           }
			
        }
    );
});