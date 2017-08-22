<?php
include_once "class/connexion_class.php";
include_once "class/joueur_class.php";
include_once 'html/entete.php';
include_once "menu.php";


if(!joueur::connected())
{
	echo "vous devez être connecter pour accéder à cette page";
}
else
{

$jou = new joueur($_SESSION['userid']);

echo "vous êtes dans la catégorie ".$jou->get_categorie()." vo us êtes en position ".$jou->get_position();


}
	
include_once 'html/end.php';
?>

