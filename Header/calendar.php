
<?php include "header.php"; 
?>
								<!-- Pour le calendrier fullcalendar version 2.2.6 -->
		<link rel="stylesheet" href="fullcalendar/fullcalendar.css" />
		<script src="fullcalendar/lib/jquery.min.js"></script> 
		<script src="fullcalendar/lib/moment.min.js"></script>
		<script src="fullcalendar/fullcalendar.js"></script>
		<script src='fullcalendar/lang/fr.js'></script>

						<script>
$(document).ready(function() {

    // page is now ready, initialize the calendar...

    $("#calendar").fullCalendar({
        // put your options and callbacks here
        height: "auto",
//        buttonText: {today: "retour au mois en cours"},
        fixedWeekCount: false
    });

});		</script>

				<div id="calendar"></div>

	</body>
</html>