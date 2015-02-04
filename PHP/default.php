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

		$('#calendar').fullCalendar({
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: "http://localhost:8080/PHP/events.php"
		});
		
	});

</script>
<style>

	body {
		margin: 40px 10px;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}

	#calendar {
		max-width: 900px;
		margin: 0 auto;
	}

</style>
</head>
<body>

	<div id='calendar'></div>

</body>
</html>
