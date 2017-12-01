<?php
chdir ('..');
include_once 'path.php';
include_once ROOT.'class/connexion_class.php';
include_once ROOT.'class/joueur_class.php';
include_once ROOT.'fonction/fonctions.php';

function recupereparties($duree)
{
	date_default_timezone_set("Europe/Paris");
	
	$bdd = Connexion::bdd();
	date("Y-m-d H:i:s",time()-$duree);
	$requete = 'SELECT * FROM `listeparties` WHERE `date`> "'.date("Y-m-d H:i:s",time()-$duree).'" ORDER BY `date` ASC';
	$req = $bdd->query($requete);
	$donnees = $req->fetchAll();
	
	return $donnees;
}


$lat = get_data_from_ini_file('Latence','Live');
$tab = recupereparties($lat);
foreach ( $tab  as $result)
{
	echo "<tr>";
	$date = new DateTime($result["date"]);
	
	echo '<td>'.$date->format("H:i:s").'</td>';
	if($result["Coup1"]==1)
	{
		echo '<td style="color:green" > <font size="+3"> ' . Joueur::Pseudo_by_id($result ["Joueur1"]) . "</font> </td>";
	}
	if($result["Coup1"]==0)
	{
		echo '<td style="color:red" > <font size="+3"> ' . Joueur::Pseudo_by_id($result ["Joueur1"]). "</font> </td>";
	}
	if($result["Coup2"]==1)
	{
		echo '<td style="color:green" > <font size="+3"> ' . Joueur::Pseudo_by_id($result ["Joueur2"]). "</font> </td>";
	}
	if($result["Coup2"]==0)
	{
		echo '<td style="color:red" > <font size="+3"> ' . Joueur::Pseudo_by_id($result ["Joueur2"]). "</font> </td>";
	}
	
	echo "</tr>";
}

?>
