<?php include "header.php"; 
	  include "connect.php";
?>
		<link rel="stylesheet" type="text/css" href="../css/drag.css">
		<link rel="stylesheet" type="text/css" href="../post-it_CSS/style.css">

				<script type"text/javascript">

$(function(){
				    $('.inscription_tache').click(function(){
				    	var id = $(this).attr('id');
				    	var tab = id.split('-');
				    	var id_tache = tab[0];
				    	var id_util = tab[1];
				    	$.ajax({
     						  url: 'inscription_tache.php',
     						  type: 'GET',
     						  data: "id_tache="+id_tache+"&id_util="+id_util,
     						  dataType: 'html',
     						  success : function(data){
								location.reload(true);
								     						//  	$('body').append('<h1>'+data+'</h1>');
     						     						  	
     						  }
     						});
				    	 });

				    $('.desinscription_tache').click(function(){
				    	var id = $(this).attr('id');
				    	var tab = id.split('-');
				    	var id_tache = tab[0];
				    	var id_util = tab[1];
				    	$.ajax({
     						  url: 'desinscription_tache.php',
     						  type: 'GET',
     						  data: "id_tache="+id_tache+"&id_util="+id_util,
     						  dataType: 'html',
     						  success : function(data){
								location.reload(true);
								     						//  	$('body').append('<h1>'+data+'</h1>');
     						     						  	
     						  }
     						});
				    	 });
});

</script>

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

$sql = 'SELECT *
FROM taches
WHERE start <= ?
AND    end >= ?';
$util_inscrit = [];
$already_display = false;
$query = $pdo->prepare($sql);
$query->execute(array($daterequete, $daterequete));
foreach ($query->fetchAll() as $row) {

	//utilisateur non connecté, on affiche toutes les taches sans bouton s'inscrire ou se désinscrire
	if(!isset($_SESSION['user'])){
/*		$membres_taches = $pdo->prepare('SELECT DISTINCT id_tache 
		FROM membres_taches WHERE id_tache = ?');
		$membres_taches->execute(array($row['id']));
		foreach ($membres_taches->fetchAll() as $membrepartache) {*/
		echo '<div class="tache quote-container" id="'.$row['id'].'"><i class="pin"></i><p class="note yellow">'.$row['title'].'<br/>
		'. $row['responsable'] .'<br/>' . $row['start'] . '<br/>'
		. $row['end'] . '</p> </div>';
//	}
}else{
		$membrestaches = $pdo->prepare('SELECT id_tache, id_util
		FROM membres_taches
		WHERE id_tache = ?
			AND id_util = ?');
	$membrestaches->execute(array($row['id'], $_SESSION['user']));
	foreach ($membrestaches->fetchAll() as $membreconnectepartache) {
		echo '<div class="tache quote-container" ><i class="pin"></i><p class="note yellow">'.$row['title'].'<br/>
		'. $row['responsable'] .'<br/>' . $row['start'] . '<br/>'
		. $row['end'] . '<button id="'.$row['id'].'-'.$_SESSION['user'].'" class="desinscription_tache">se désinscrire</button></p> </div>';
		array_push($util_inscrit, $membreconnectepartache['id_tache']);
}
		$membrestaches = $pdo->prepare('SELECT id_tache, id_util
		FROM membres_taches
		WHERE id_tache = ?
			AND id_util != ?');
	$membrestaches->execute(array($row['id'], $_SESSION['user']));
	foreach ($membrestaches->fetchAll() as $membreconnectepartache) {
		foreach($util_inscrit as $value){
		if($membreconnectepartache['id_tache'] == $value){
			$already_display = true;
		}
		}
		if($already_display == false){
		echo '<div class="tache quote-container"><i class="pin"></i><p class="note yellow">'.$row['title'].'<br/>
		'. $row['responsable'] .'<br/>' . $row['start'] . '<br/>'
		. $row['end'] . '<button  id="'.$row['id'].'-'.$_SESSION['user'].'" class="inscription_tache">s\'inscrire</button></p> </div>';
		$already_display = true;
		}


}
$already_display = false;
}





/*else{
	$membresconnecte_taches = $pdo->prepare('SELECT id_tache, id_util 
	FROM membres_taches WHERE id_tache = ?
							  AND id_util = ?');
	$membresconnecte_taches->execute(array($row['id'], $_SESSION['user']));
	foreach ($membresconnecte_taches->fetchAll() as $membreconnectepartache) {	
if($membreconnectepartache['id_util'] == $_SESSION['user']){
	echo '<div class="tache quote-container" id="'.$row['id'].'"><i class="pin"></i><p class="note yellow">'.$row['title'].'<br/>
		'. $row['responsable'] .'<br/>' . $row['start'] . '<br/>'
		. $row['end'] . '<button id="desinscription_tache">se désinscrire</button></p> </div>';
	}elseif(           ){
	echo '<div class="tache quote-container" id="'.$row['id'].'"><i class="pin"></i><p class="note yellow">'.$row['title'].'<br/>
		'. $row['responsable'] .'<br/>' . $row['start'] . '<br/>'
		. $row['end'] . '<button id="inscription_tache">s\'inscrire</button></p> </div>';
	}
}
}*/
/*	elseif($membrepartache['id_util'] == $_SESSION['user']){
	echo '<div class="tache quote-container" id="'.$row['id'].'"><i class="pin"></i><p class="note yellow">'.$row['title'].'<br/>
		'. $row['responsable'] .'<br/>' . $row['start'] . '<br/>'
		. $row['end'] . '<button id="desinscription_tache">se désinscrire</button></p> </div>';
	}else{
	echo '<div class="tache quote-container" id="'.$row['id'].'"><i class="pin"></i><p class="note yellow">'.$row['title'].'<br/>
		'. $row['responsable'] .'<br/>' . $row['start'] . '<br/>'
		. $row['end'] . '<button id="inscription_tache">s\'inscrire</button></p> </div>';
	}*/

}

?>


</body>
</html>