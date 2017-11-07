<?php
chdir ('..');

include_once 'class/connexion_class.php';
include_once 'class/joueur_class.php';

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

$tab = recupereparties(60);
get_data_from_ini_file('Latence','Live')

foreach ( $tab  as $result)
{
	echo "<tr>";
	$date = new DateTime($result["date"]);
	
	echo '<td>'.$date->format("H:i:s").'</td>';
	if($result["Coup1"]==1)
	{
		echo '<td style="color:green" >' . Joueur::Pseudo_by_id($result ["Joueur1"]) . "</td>";
	}
	if($result["Coup1"]==0)
	{
		echo '<td style="color:red" >' . Joueur::Pseudo_by_id($result ["Joueur1"]). "</td>";
	}
	if($result["Coup2"]==1)
	{
		echo '<td style="color:green" >' . Joueur::Pseudo_by_id($result ["Joueur2"]). "</td>";
	}
	if($result["Coup2"]==0)
	{
		echo '<td style="color:red" >' . Joueur::Pseudo_by_id($result ["Joueur2"]). "</td>";
	}
	
	echo "</tr>";
}

?>
