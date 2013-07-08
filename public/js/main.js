
$(function() {
	
	$("#profile header h3, #user-profile img, ul li a").click(function(e) {
		e.preventDefault();

		var content = $(this).attr("href");
		
		$("div").removeClass("show");
		$(content).addClass("show");
	});

});