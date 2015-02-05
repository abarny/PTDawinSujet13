<?php
// liste des événements
 $json = array();
 // requête qui récupère les événements
 
$requete = "SELECT title,start,end FROM taches ORDER BY id";

 // connexion à la base de données
 try {
 $bdd = new PDO('mysql:host=info-arie;dbname=info_hatran', 'hatran', '9JyGX1PHZdAp');
 } catch(Exception $e) {
 	die('Erreur : ' . $e->getMessage());
 }
 // exécution de la requête
 $resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));
 
 // envoi du résultat au success
 echo json_encode($resultat->fetchAll(PDO::FETCH_ASSOC));
 
?>