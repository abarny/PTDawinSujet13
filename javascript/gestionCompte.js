﻿$( function() {

	$(document).ready(function(){
		$(document).ready(function(){
			$(".password").hide();
		});
	
		$("input[type=button]").click(function(){
			$(".password").show("slow");
		});
	});

});