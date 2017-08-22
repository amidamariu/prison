<?php
include_once 'html/entete.php';
include_once "menu.php";


if(!joueur::connected())
{
	echo "vous devez être connecter pour accéder à cette page";
}
else 
{
	
	
	if(!isset($_GET['inf'],$_GET['sup']))
	{
		
	

echo '
<div class="message">Voir les classements<br />
<a href="votreposition.php">Votre position</a><br>
<a href="classement.php?inf=1&sup=10">Classement sur 10 parties ou moins</a><br>
<a href="classement.php?inf=11&sup=100">Classement entre 11 et 100 parties</a><br>
<a href="classement.php?inf=101&sup=1000">Classement entre 101 et 1000 parties</a><br>
<a href="classement.php?inf=1001&sup=10000000000">Classement sur plus de 1000 parties</a><br>
</div>' ;
}
else
{
	
	ecrireclassement($_GET['inf'],$_GET['sup']);
}




}
include_once 'html/end.php';
?>

