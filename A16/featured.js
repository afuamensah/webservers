$(document).ready(function(){

	$('.slider').bxSlider( {
		auto: true,
		autoControls: true,
		captions: true,
		minSlides: 3,
		maxSlides: 3,
		slideWidth: 220,
		slideMargin: 20
	});
	var countdown = function() {
		var date = new Date(2021, 7, 6, 12, 0)
		var today = new Date();
		var tDate = today.toDateString();
		var oneDay = 24*60*60*1000;
		var days = ((date.getTime() - today.getTime()) / oneDay);
		days = Math.ceil(days);

		//$("#date").html("Back to school SALE!");

		if(days == 0) {
			$("#sale").html("More sales coming soon!");
		}
		if (days > 0) {
			$("#sale").html("<span style=\"color: #01741C; font-weight: bold; font-size: 60px;\">" + days.toString() + "</span><br/><br/>" + " days left!");
		}
	};
	countdown();
	
  });