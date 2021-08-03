$(document).ready(function() {
	
	// runs when an h2 heading is clicked
    $("#expand").click(function() {
        $("#more").show();

    });
    
    var url = "http://api.flickr.com/services/feeds/photos_public.gne?" +
	    			  "format=json&jsoncallback=?&tags=koala";
	
			$.getJSON(url, function(data){
				var html = "";
				$.each(data.items, function(i, item){
					html += "<img src=" + item.media.m + ">";
				});
				$("#photos").html(html);
			}); // end click
}); // end ready
