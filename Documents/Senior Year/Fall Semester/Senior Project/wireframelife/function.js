"use strict";

$(document).ready(function() {

    $("#undo").click(function() {
        $("#match button").show();
        $("#match .yes").hide();
        $("#match .no").hide();
        $("#undo").hide();
    });

    $("#confirm").click(function() {
        $("#match span").removeClass("bold");
        $("#match button").hide();
        $("#match .yes").show();
        $("#undo").show();
    });

    $("#deny").click(function() {
        $("#match span").removeClass("bold");
        $("#match button").hide();
        $("#match .no").show();
        $("#undo").show();
    });

});