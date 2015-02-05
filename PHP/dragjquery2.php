<!-- A FAIRE ENCORE
SUPPRESSION GROUPE : ne pas compter comme une tache en moins quand une tache arrivant dans parking
					 en provient. OK !
FUSION : Afficher les tâches concernées par la fusion dans le popup. OK
		Gérer pour ne pas mettre la tâche initiatrice de la fusion dans la boucle each
		pour que même si elle se superpose il y ai fusion !! FAIT !!
Probleme de z-index : les taches draggés passant par en dessous c'est moche : => rectifié !
pour les fusions de gauche à droite : le drop d'une tache doit pas engendrer le déplacement des autres sinon comparaison
des coordonnées impossible: Fait (position absolute) !



Bouger les groupes, est-ce nécessaire ?
que l'on puisse poser les tâches n'importe ou ?
DU CSS, plein de CSS
-->
<?php include '../PHP/header.php'; ?>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js"></script>
		<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/themes/smoothness/j query-ui.css">
		<link rel="stylesheet" type="text/css" href="../css/drag.css"> 
				<script type"text/javascript">
$(function(){

    $('.groupe').draggable({ containment: 'parent' }); // appel du plugin

    $('.tache').draggable({ containment: '#parking',/*, helper: "clone"*/
				start: function( event, ui){
					ui.helper.css("z-index", "5"); // les taches draggées ne passent plus en dessous des autres

				},
				stop: function(event, ui){
					ui.helper.css("z-index", "2");
				} }); 
var compteur = 0;
var nbtache = 0;
var mintopgroup = 0;
var minleftgroup = 0;
var maxtopgroup = 0;
var maxleftgroup = 0;
var hauteurtacheplusdix = parseInt($('.tache').css('height')) + 10;
var tailleInitiale = parseInt($('#groupe1').css('height'));


    $('.groupe').droppable({

		        drop: function( event, ui ) {   // Action effectuée lorsqu'on dépose un élément dans le groupe
		            // ui.draggable désigne l'élément déplacé		                  
		            ui.draggable.appendTo( $(this) ) // on le met à l'intérieur du groupe
		            		.css({   
		            			position: 'relative',                  
                    			left: '5%',
                    			top:  '5%'
               				})
               		ui.draggable.addClass('ingroupe');
               				compteur = compteur + 1;

               		//récupération des positions de la derniere tache déposée
               		var divlastposition = $('#groupe1 div:last-child').position();
               		//hauteur du groupe pas mettre en globale sinon les mises à jour ne servent à rien
					var hauteurgroupe = parseInt($('#groupe1').css('height'));
               		// Si la tache va se déposer en dehors du groupe, on agrandit le groupe
					if(divlastposition.top+50 >  hauteurgroupe){ 
						$("#groupe1").animate({height: '+=' + hauteurtacheplusdix},500);
						hauteurgroupe = parseInt($('#groupe1').css('height')); // mise à jour de hauteur groupe
					}            	
					}
		        

}); 

    $('#zonetacheseule').droppable({

		        drop: function( event, ui ) {   // Action effectuée lorsqu'on dépose un élément dans le parking
						var monleft = ui.offset.left;
						var montop = ui.offset.top;

						monleft = monleft + 'px';
						montop = montop +'px';
				//		alert(monleft + montop);
		            ui.draggable.appendTo($(this)) // on le met à l'intérieur du groupe
		            		.css({  
		            			position: "absolute"/*,                   
                    			left: monleft,
                    			top: montop	*/
               				});



           			var id_objet = ui.draggable.attr('id'); // ID de l'élément drop 
          			
          			// si l'élément arrivant dans la zone drop parking provient du groupe 
          			// on ote 1 au compteur du groupe
           			if(ui.draggable.hasClass('ingroupe')){
               			compteur = compteur -1 ;


               			if(compteur == 0){
					   		$( "#groupe1" ).remove();
               			}
               			ui.draggable.removeClass('ingroupe');
               		}

          		var hauteurgroupe = parseInt($('#groupe1').css('height'));
           		var divlastposition = $('#groupe1 div:nth-last-child(1)').position();

					if(hauteurgroupe > tailleInitiale && hauteurgroupe - (divlastposition.top+50) > hauteurtacheplusdix){ //150 
						$("#groupe1").animate({height: '-='+hauteurtacheplusdix},500);
						hauteurgroupe = parseInt($('#groupe1').css('height'));
					}
					//fusion => creation d'un groupe
					// comparaison des coordonnées de l'élément actuellement draggé avec toutes les tâches
					// si difference de top et left inférieure à 25 création, sinon non, 
					$('#zonetacheseule > div.tache:not(#'+id_objet+')').each(function(){
						var left = $(this).offset().left;
						var top = $(this).offset().top;
						var idtachefusion = $(this).attr('id');

				//		alert('left : ' + left + 'top : ' + top + 'ui.left : ' + ui.offset.left + 'ui.top' + ui.offset.top );

						if(Math.abs(left - ui.offset.left) < 25 && Math.abs(top - ui.offset.top) < 25){
				            	$('#popup').css('display', 'inline-block');
				           		ui.draggable.appendTo('#popup').css({                     
                    			position: 'relative',
                    			left: '5%',
                    			top: '5%'
               				});
				          		$('#'+idtachefusion).appendTo('#popup').css({                     
                    			position: 'relative',
                    			left: '5%',
                    			top: '5%'
               				});
				          		return false;
				           		}
					});
							}
		            	});



});
		</script>

		<script type="text/javascript">
				        function fermepopup(){
            		$('#popup').css('display', 'none');
            	};
            	            	function creationTache(){
				    $('#popupCreation').css('display', 'inline-block');

            	};
            			function creationGroupe(){
            				var nomgroupe = $('#nomgroupe').val();
            				$('#parking').append('<div id="groupe2" class="groupe"> <p>'+ nomgroupe + '</p> </div>');
            				$('#groupe2').css({
            					background : 'tomato',
            					width : '150px',
            					color : 'black',
            					height : '160px',
            					display : 'inline-block',
            					marginleft : '50px'
                   				});
            				$('input[type="text"]').val('');
            				fermepopup();
    function Tache(responsable, adjoints, dateDebut, dateFin, dureeEstimee, dureeReelle) {
    this.responsable = responsable;
    this.adjoints = adjoints;      //tableau
    this.dateDebut  = dateDebut;
    this.dateFin  = dateFin;
    this.dureeEstimee = dureeEstimee;
    this.dureeReelle = dureeReelle;
}

	var tache1 = new Tache('Pierre', ['personne1', 'personne2'], '15/01/2015', '15/02/2015', '1.25', '5');
	alert(tache1.responsable + ' ' + tache1.adjoints[0] + ' ' + tache1.adjoints[1] + ' ' + dateDebut +' ' + dateFin + ' ' + dureeEstimee + ' ' + dureeReelle);
            	};
            	</script>
<div id="sousmenu">
		<a href="#" class="myButton btn btn-primary btn-responsive" id="newtask" onclick="creationTache()">Nouvelle tâche</a>
		<a href="#" class="myButton btn btn-primary btn-responsive" id="changetask">Modifier tâche</a>
		<a href="#" class="myButton btn btn-primary btn-responsive" id="deletetask">Supprimer tâche</a>
</div>
<div id="parking">
<div id="zonetacheseule">
<div id="tache1" class="tache">
tache1
</div>	
<div id="tache2" class="tache">
tache2
</div>	
<div id="tache3" class="tache">
tache3
</div>	
<div id="tache4" class="tache">
tache4
</div>
<div id="tache5" class="tache">
tache5
</div>	
<div id="tache6" class="tache">
tache6
</div>	
<div id="tache7" class="tache">
tache7
</div>	
<div id="tache8" class="tache">
tache8
</div>	
<div id="tache9" class="tache">
tache9
</div>
</div>	
<div id="groupe1" class="groupe">
<p>groupe1</p>
</div>

</div>

<div id="popup">
	<img id="fermeture" onclick="fermepopup()"src="../img/fermeture.png" alt="icone fermeture popup" />
<h1 id="titrefusion">Fusion de tâches </h1>
<input type="text" placeholder="Nom du groupe" />
<input type="submit" onclick="creationGroupe()" value="valider"/>
</div>
<div id="popupCreation">
	<h1> Création d'une nouvelle tâche </h1>
	<input type="text" name="intitule" placeholder="Intitulé"/><br/>
	<textarea cols="50"rows="5"name="description"placeholder="Description"></textarea><br/>
	<input type="text" name="responsable" placeholder="Responsable"/>
	<select name="groupe"> </select><br/>
	<input type="text" class="adjoint" name="adjoint1" placeholder="adjoint1"/>
	<input type="text" class="adjoint" name="adjoint2" placeholder="adjoint2"/>
	<input type="text" class="adjoint" name="adjoint3" placeholder="adjoint3"/>
	<img src="../img/plus.jpg" alt="ajouter plus d'adjoints" width="20px" height="20px"  />
	<div>
		<div class="ligne"><p>Date début </p>
		<input type="text" size="8" class="datepicker" />	
		</div>
		<div class="ligne"><p>Date fin </p>
		<input type="text"  size="8" class="datepicker" />	
		</div>
		<div class="ligne"><p>Durée estimée</p>	
			<input type="text" />
		</div>
		<input type="submit" value="valider"/>
	</div>



</div>
	</body>
</html>