<?php
ob_start();
include_once 'fonction/fonctions.php';
include_once 'html/entete.php';
include_once "menu.php";

if(joueur::connected())
{
        //On le deconecte en supprimant simplement les sessions username et userid
        unset($_SESSION['mail'], $_SESSION['userid']);
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
 