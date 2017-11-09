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
$partie = new partieencours($_GET['num']);

if($partie->exist())
{
	
if($jou->get_id()===$partie->get_joueur(1))
{
	$numjou=1;
	$numadv=2;
	$adv = new joueur($partie->get_joueur(2));
}
else
{
	$numjou=2;
	$numadv=1;
	$adv = new joueur($partie->get_joueur(1));
}


echo "<br> la partie vous opposait à ".$adv->get_Pseudo();
echo "<br> vous avez joué : ".$partie->get_coup($numjou);
echo "<br> votre adversaire a joué : ".$partie->get_coup($numadv)."<br>"; 
if($partie->get_auto($numjou)==TRUE)
{
echo "votre coup a été généré automatiquement <br>"; 	
}
if($partie->get_auto($numadv)==TRUE)
{
echo "le coup de votre adversaire a été généré automatiquement <br> "; 
}


echo "Votre gain : " . getGain ( $partie->get_coup($numjou) , $partie->get_coup($numadv)) . "<br>";
echo "Gain complice: " . getGain ( $partie->get_coup($numadv), $partie->get_coup($numjou)) . "<br>";

echo '<form method="post" action="index.php" >
<input type="submit" value="Rejouer" />
</form>';
}
else
{
echo "La partie n'existe plus'";
}
}

include_once 'html/end.php';

?>

