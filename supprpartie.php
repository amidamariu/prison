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
    $partie = partieencours::find($jou->get_id());
    if($partie->get_joueur(1)==$jou->get_id())
    {
    	$partie->set_okdel();
    }
    else
    {
    	while(!$partie->get_okdel())
    	{
    		usleep(10000);
    	}
    	$partie->suppr();
    }
    
    
}



include_once 'html/end.php';
?>

