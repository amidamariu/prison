<?php
ob_start();
include_once 'path.php';
include_once ROOT.'fonction/fonctions.php';
include_once ROOT.'html/entete.php';
include_once ROOT."menu.php";
  

if(joueur::connected())
{
     joueur::disconnect();
		echo "Vous êtes désormais déconnecté, redirection vers l'accueil";
		header('Refresh: 3; url=index.php');
		ob_flush();
}
else
{

echo "Pas de deconnexion, vous n'étiez pas connecté";

}
include_once 'html/end.php';

?>
 