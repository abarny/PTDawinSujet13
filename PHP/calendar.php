
<?php include "header.php"; 
?>
								<!-- Pour le calendrier fullcalendar version 2.2.6 -->
		<link rel="stylesheet" href="fullcalendar/fullcalendar.css" />
		<script src="fullcalendar/lib/jquery.min.js"></script> 
		<script src="fullcalendar/lib/moment.min.js"></script>
		<script src='fullcalendar/lib/jquery-ui.custom-datepicker.js'></script>
		<script src="fullcalendar/fullcalendar.js"></script>
		<script src='fullcalendar/lang/fr.js'></script>
		<script>
    	$(document).ready(function () {
        $('#home').addClass('active');
    	});
		</script>

<script>
$(document).ready(function() {

    // page is now ready, initialize the calendar...

    $("#calendar").fullCalendar({
        // put your options and callbacks here
        height: "auto",
        lang: 'fr',
//        buttonText: {today: "retour au mois en cours"},
        fixedWeekCount: false,
		events: "http://localhost:9292/PHP/events.php",

        dayClick: function(date, jsEvent, view) {
        var date = date.format();
		$(location).attr('href',"detailjour.php?date="+date);
    	},

    	eventClick: function(date, event) {
    	var date = date.format();
        alert(event.date);
            return false;
        }
    	

    });

});		</script>

				<div id="calendar"></div>

	</body>
</html>