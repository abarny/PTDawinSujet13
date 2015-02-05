$( function() {

	$(document).ready(function(){
		$(".password").hide();
	});
	
	$(".passwordChange").click(function(){
		$(".password").show("slow");
	});
	
});
