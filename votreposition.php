<?php
include_once 'path.php';
include_once ROOT."class/connexion_class.php";
include_once ROOT."class/joueur_class.php";
include_once ROOT.'html/entete.php';
include_once ROOT."menu.php";

if(!joueur::connected())
{
	echo "vous devez être connecter pour accéder à cette page";
}
else
{

$jou = joueur::joueur_by_session();

if($jou->get_position()!=NULL)
{
$cat = $jou->get_categorie();

switch ($cat) {
	case 1:
		$descri = " (moins de 11 parties)";
		break;
	case 2:
		$descri = " (entre 11 et 100 parties)";
		break;
	case 3:
		$descri = " (entre 101 et 1000 parties)";
		break;
	case 4:
		$descri = " (plus de 1000 parties)";
		break;
}


echo "Vous êtes dans la catégorie ".$cat.$descri." vous êtes en position ".$jou->get_position();
echo "<br> Vous avez joué ". $jou->get_total ()." parties";
}
else
{
echo "Vous n'avez encore jamais joué";
}
}
	
include_once 'html/end.php';


?>

