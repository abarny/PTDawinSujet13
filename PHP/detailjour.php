<?php include "header.php"; 


$date = explode("-", $_GET['date']);

$annee = $date[0];
$mois = $date[1];
$jour = $date[2];

switch($mois){
	case 1:
		$mois = 'janvier';
		break;

	case 2:
		$mois = 'février';
		break;
	case 3:
		$mois = 'mars';
		break;
	case 4:
		$mois = 'avril';
		break;
	case 5:
		$mois = 'mai';
		break;
	case 6:
		$mois = 'juin';
		break;
	case 7:
		$mois = 'juillet';
		break;	
	case 8:
		$mois = 'août';
		break;	
	case 9:
		$mois = 'septembre';
		break;	
	case 10:
		$mois = 'octobre';
		break;	
	case 11:
		$mois = 'novembre';
		break;	
	case 12:
		$mois = 'décembre';
		break;
}


echo $jour . ' ' . $mois . ' ' . $annee; ?>
<input type="text" id="datepicker" />
</body>
</html>