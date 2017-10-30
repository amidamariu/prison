<?php
include_once 'fonction/fonctions.php';
include_once "class/strategie_class.php";
include_once "class/partieencours_class.php";
include_once 'html/entete.php';
include_once "menu.php";

if (! joueur::connected ()) {
	echo "vous devez être connecté pour accéder à cette page";
} else {
	
	$jou = joueur::joueur_by_session();
    $partie = new partieencours($_GET['num']);
    
    if($jou->get_id()===$partie->get_joueur(1))
    {
    $adv = new joueur($partie->get_joueur(2));
    }
    else 
    {
    $adv = new joueur($partie->get_joueur(1));
    }
    
    if($adv->is_strat())
    {
    	$strat = strategie::strat_by_id_joueur($adv->get_id());
    	$coupstrat = $strat->jouer($jou->get_id());
    	$partie->set_coup(2, $coupstrat);
    	
    	echo '<table border=1 cellspacing=0 cellpadding=5><td>'.$strat->get_desc().'</td></table>';
    	
    }
    echo "<br> Statistiques générales de ce joueur : <br>";
    historique($jou->get_id(),$adv->get_id());
		
		echo '<form id="coup">
<input type="button" name="strat" value="coop" onclick="coop()">
<input type="button" name="strat" value="trahir" onclick="trahir()">
</form>';
		
		
}

?>


<script>
function coop() {
	var xhr = new XMLHttpRequest();
	xhr.open('GET', 'coup.php?coup=coop'); 
	xhr.send(null);

	var coup = document.getElementById('coup');
	coup.parentNode.removeChild(coup);
	
}
function trahir() {
	var xhr = new XMLHttpRequest();
	xhr.open('GET', 'coup.php?coup=trahir'); 
	xhr.send(null);
	var coup = document.getElementById('coup');
	coup.parentNode.removeChild(coup);
}

function decremete() {
	var div = document.getElementById('timer');
	if(tempsrestant > 0)
	{
	div.innerHTML = 'Coup automatique dans '+tempsrestant+' sec';
	tempsrestant = tempsrestant - 1;
	}
}

var tempsrestant=10;
setInterval(decremete,1000);

</script>
<div id=timer> <br> </div>
		
		<div id=test> Personne n'a joué</div>
		    
<script>
		    
var xhr = new XMLHttpRequest();
setInterval(function(){ xhr.open('GET', 'Checkcoupadv.php'); xhr.send(null); }, 3000);


			    
			    
xhr.addEventListener('readystatechange', function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
    	  var div = document.getElementById('test');
           
           
            var joueur = xhr.responseXML.getElementsByTagName('joueur');
            joueur = joueur[0].childNodes[0].nodeValue;
            var adv = xhr.responseXML.getElementsByTagName('adv');
            adv = adv[0].childNodes[0].nodeValue;
            if(adv == 'non' && joueur == 'non' )
            {
            div.innerHTML = 'personne n\'a joué';
            }
            if(adv == 'oui' && joueur == 'non' )
            {
            div.innerHTML = 'votre adversaire a joué';
            }
            if(adv == 'non' && joueur == 'oui' )
            {
            div.innerHTML = 'attente du coup de l\'adversaire';
            }
            if(adv == 'oui' && joueur == 'oui' )
            {
            div.innerHTML = 'tout le monde à joué, redirection vers le resultat';

            var cmd = "window.location='resultat.php?num=<?php echo($_GET['num'])?>'";
            setTimeout(cmd,1000);
            
            }  
		
    }
});
		    
</script>

    
    


<?php


include_once 'html/end.php';
?>

