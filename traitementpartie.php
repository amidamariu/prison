<?php
include_once 'fonction/fonctions.php';
include_once "class/strategie_class.php";
include_once "class/partieencours_class.php";




	$latence = get_data_from_ini_file('Latence','Verif');
	$DureeMax = get_data_from_ini_file('Latence','DureeAvantStrat');
	$DureePartie = get_data_from_ini_file('Latence','DureePartie');
	$partie = new partieencours($_GET['num']);
	sleep($latence+$DureeMax+$DureePartie); //on attend delai 
	if($partie->get_coup(1)==NULL)
	{
	$partie->set_coup(1,rand(0,1));
	$partie->set_auto(1,TRUE);
	}
	if($partie->get_coup(2)==NULL)
	{
	$partie->set_coup(2,rand(0,1));
	$partie->set_auto(2,TRUE);
	}
	$partie->stock();
	sleep(5);
    $partie->suppr();
    
?>

