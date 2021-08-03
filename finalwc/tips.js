"use strict";

$(document).ready(function() {
	
	var list = [];

    var displayTaskList = function() {
        list.sort();
        
        $("#todo_list").val( list.join("\n") );
        $("#task").focus();
    };
    
    $("#add_task").click(function() {   
        var textbox = $("#task");
        var task = textbox.val();
        if (task === "") {
            alert("Please enter a task.");
            $("#task").focus();
        } else {  
            // add new task to tasks array 
            list.push( task ); 

            // clear task text box and re-display tasks
            textbox.val( "" );
            displayTaskList();
        }
    });
    
    $("#delete_task").click(function() {
        var isValid = false; 
        while(isValid == false) {
            var index = prompt("Enter the index number of the task you would like to delete.");
            index = parseInt(index);
            if (index === isNaN() || index === "" || index > (list.length - 1)) {
                alert("Please enter a valid index.");
            }
            else {
                isValid = true;
                list.splice(index, 1);
                displayTaskList();
                c
            }
        }
    });
    
    $("#clear_list").click(function() {
        list = [];
        $("#todo_list").val( "" );
        $("#task").focus();
    }); 
    
    // set focus on initial load
    $("#task").focus();
    
});