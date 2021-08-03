"use strict";

var $ = function(id) {
    return document.getElementById(id);
}

var calculateM = function(price, quantity) {
	console.log("calculateM function has started.");
    var total = price * quantity;
    total = total.toFixed(2);
	console.log("total = " + total);
    return total;
}

var clearEntries = function() {
	console.log("clearEntries function has started.");
    $("total").value = "";
    $("quantity").value = "";
    $("price").focus();
}

var processEntries = function() {
	console.log("processEntries function has started.");

    var mag = $("magazine").value;
    console.log("Magazine selected: " + mag);

    var price = 0;

    if (mag == "Time") {
        price = 4.49;
    }
    if (mag == "Better Homes & Gardens") {
        price = 3.99;
    }
    if (mag == "People") {
        price = 4.99;
    }

    price = parseFloat(price);
    var quantity = parseInt($("quantity").value);
    var errorMessage = "";
	console.log("price: " + price);
    console.log("quantity: " + quantity);

    if (isNaN(quantity)) {
        errorMessage = "Quantity must be a number.";
        $("quantity").focus();
    }

    else if (quantity < 1) {
        errorMessage = "Quantity must be 1 or more.";
        $("quantity").focus();
    }

    if (errorMessage == "") {
		console.log("The data is valid and the calculation is next.");
        $("total").value = "$" + calculateM(price, quantity);
    }

    else {
		console.log("There is an error with one of the data.");
        alert(errorMessage);
    }
}

window.onload = function() {
    $("clear").onclick = clearEntries;
    $("calculate").onclick = processEntries;
    $("magazine").focus();
}