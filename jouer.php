<?php
include_once 'path.php';
include_once ROOT.'fonction/fonctions.php';
include_once ROOT.'class/joueur_class.php';
include_once ROOT.'class/strategie_class.php';
include_once ROOT.'class/partieencours_class.php';
include_once ROOT.'html/entete.php';
include_once ROOT."menu.php";




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
	$partie->set_old();

?>

<script>
var cmd = "window.location='jouerjoueur.php?num=<?php echo $partie->get_id(); ?>'";
setTimeout(cmd,1000);
</script>

<?php
}
include_once 'html/end.php';
?>

              
