<?php
// liste des événements
 $json = array();
 // requête qui récupère les événements
 /*$requete = "SELECT ('id_tache', 'nom_tache', 'date_debut', 'date_fin') FROM taches ORDER BY id_tache";*/
 
$requete = "SELECT id,title,start,end FROM taches ORDER BY id";

// connexion à la base de données
 try {
 $bdd = new PDO('mysql:host=127.0.0.1;dbname=teamshare', 'root', '');
 } catch(Exception $e) {
 	die('Erreur : ' . $e->getMessage());
 }

 // exécution de la requête
 $resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));
 
 // envoi du résultat au success
 echo json_encode($resultat->fetchAll(PDO::FETCH_ASSOC));
 
?>