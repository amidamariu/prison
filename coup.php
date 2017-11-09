<?php
include_once 'path.php';
include_once ROOT.'fonction/fonctions.php';
include_once ROOT."class/strategie_class.php";
include_once ROOT."class/partieencours_class.php";
include_once ROOT.'html/entete.php';
include_once ROOT."menu.php";

if (! joueur::connected ()) {
	echo "vous devez être connecté pour accéder à cette page";
} else {
	
	$jou = joueur::joueur_by_session();
	$partie = partieencours::find_last($jou->get_id());
	if($partie->get_joueur(1)==$jou->get_id())
	{
		$num= 1 ;	
	}
	else
	{
		$num = 2;
	}
	
    if($_GET['coup']=='coop')
    {
    	$partie->set_coup($num,1);
    }
    if($_GET['coup']=='trahir')
    {
    $partie->set_coup($num,0);
    }
    if($_GET['coup']=='auto')
    {
    sleep(10);
    $partie->set_coup($num,rand(0,1));
    }
    
    
  //  $partie->set_coup(2,$coup);
}



include_once 'html/end.php';
?>

