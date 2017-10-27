<?php
include_once 'fonction/fonctions.php';
include_once 'class/joueur_class.php';
include_once 'class/strategie_class.php';
include_once 'class/partieencours_class.php';
include_once 'html/entete.php';
include_once "menu.php";




if($_GET['type']!="strat")
{
?>

<div id=test> Recherche d'un adversaire en cours...</div>

<script>

var xhr = new XMLHttpRequest();
xhr.open('GET', 'matchmaking.php');
xhr.send(null);




xhr.addEventListener('readystatechange', function() {
    if (xhr.readyState === XMLHttpRequest.DONE) { 
    	var data = xhr.responseXML;
    	
       
        var div = document.getElementById('test');

        var trouve = xhr.responseXML.getElementsByTagName('trouve');
        trouve = trouve[0].childNodes[0].nodeValue;

        if(trouve==='oui')
        {
            var adv = xhr.responseXML.getElementsByTagName('adv');
            adv = adv[0].childNodes[0].nodeValue;
            var partie = xhr.responseXML.getElementsByTagName('partie');
            partie = partie[0].childNodes[0].nodeValue;
            var type = xhr.responseXML.getElementsByTagName('type');
            type = type[0].childNodes[0].nodeValue;

            var createur = xhr.responseXML.getElementsByTagName('createur');
            createur = createur[0].childNodes[0].nodeValue;

    		if(createur==='oui')
    		{
    		//	var xhr2 = new XMLHttpRequest();
    		//	xhr2.open('GET', 'traitementpartie.php?num='+partie,true);
    		//	xhr2.send(null);
    		}

    		if(type ==='J')
    		{
            div.innerHTML = 'adversaire trouvé ! <br> Vous allez affronter '+adv+'! <br> <br> Redirection vers la partie dans 5 secondes';
            var cmd = "window.location='jouerjoueur.php?num="+partie+"'";
            setTimeout(cmd,5000);
    		}
    		if(type === 'S')
    		{
    		div.innerHTML = 'Aucun joueur connnecté, partie contre une stratégie ! <br> Vous allez affronter '+adv+'! <br> <br> Redirection vers la partie dans 5 secondes';
    	    var cmd = "window.location='jouerjoueur.php?num="+partie+"'";
    	    setTimeout(cmd,5000);
    		}

            
             
        }
        else
        {
            div.innerHTML = 'aucun adversaire trouvé ! Vous allez donc affronter une statégie, redirection dans 5 secondes';
            var cmd = "window.location='jouerstrat.php'";
            setTimeout(cmd,5000);
        }

    }
});
 
</script>


<?php
}
else
{
	$strat = new strategie();
	$partie = partieencours::ajouter($jou->get_id(),$strat->get_id_joueur());


?>

<script>
var xhr = new XMLHttpRequest();
xhr.open('GET', 'traitementpartie.php?num=<?php echo $partie->get_id(); ?>',true);
xhr.send(null);
var cmd = "window.location='jouerjoueur.php?num=<?php echo $partie->get_id(); ?>'";
setTimeout(cmd,1000);
</script>

<?php
}
include_once 'html/end.php';
?>

              
