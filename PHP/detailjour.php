<?php include "header.php"; 
	  include "connect.php";
?>
		<link rel="stylesheet" type="text/css" href="../css/drag.css">
		<link rel="stylesheet" type="text/css" href="../post-it_CSS/style.css">

<?php
$daterequete = $_GET['date'];
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
<input type="text" class="datepicker" /><br/>
<?php 

$query = $pdo->query(
    'SELECT MAX(id) FROM taches');
$donnees = $query->fetch();

$sql = 'SELECT *
FROM taches
WHERE start <= ?
AND    end >= ?';

$query = $pdo->prepare($sql);
$query->execute(array($daterequete, $daterequete));
foreach ($query->fetchAll() as $row) {
	echo '<div class="tache quote-container" id="'.$row['id'].'"><i class="pin"></i><p class="note yellow">'.$row['title'].'<br/>
		'. $row['responsable'] .'<br/>' . $row['start'] . '<br/>'
		. $row['end'] . $donnees . '</p></div>';
}

?>
</body>
</html>