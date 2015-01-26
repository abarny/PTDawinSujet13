$( function() {

	$(document).ready(function(){
		$(document).ready(function(){
			$(".password").hide();
		});
	
		$("input[name=passwordChange]").click(function(){
			$(".password").show("slow");
		});
		
	});

});