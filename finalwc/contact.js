"use strict";

$(document).ready(function() {
    $("#contact_form").submit(
        function(evt) {

            var isValid = true;

            var name = $("#name").val().trim();
            var email = $("#email").val().trim();
            var comments = $("#comments").val().trim();

            if (name == "") {
				$("#name").next().text("This field is required.");
				isValid = false;
			} else {
				$("#name").next().text("");
            }
            $("#name").val(name);
            
            var emailPattern = /^[\w\.\-]+@[\w\.\-]+\.[a-zA-Z]+$/;
            if (email == "") { 
				$("#email").next().text("This field is required.");
				isValid = false;
			} else if ( !emailPattern.test(email) ) {
				$("#email").next().text("Must be a valid email address.");
				isValid = false;
			} else {
				$("#email").next().text("");
            }
            $("#email").val(email);

            if (comments == "") {
                $("#comments").next().text("This field is required.");
                isValid = false;
            } else {
                $("#comments").next().text("");
                localStorage.setItem("archive", comments);

                var date = new Date();
                
                var day = date.getDate();
                date.setDate(day + 7);
                var eDate = date.toDateString();
                localStorage.expiration = eDate;
                
                var tdate = new Date();
                var exdate = new Date(localStorage.expiration);
                if (exdate.getTime() < tdate.getTime()) {
                    localStorage.removeItem( "archive" );
                    localStorage.removeItem("expiration");
                }
            }
            $("#comments").val(comments);

            if (isValid == false) {
                evt.preventDefault();	
           }
        }
    )
})