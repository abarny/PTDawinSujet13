$( function() {

	$(document).ready(function(){
		$(".password").hide();
	});

	$("#connectButton").click(function(){
		$(".password").show("slow");
	});
	
});
