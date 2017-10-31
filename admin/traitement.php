<?php
chdir ('..');

include_once 'class/connexion_class.php';
include_once 'class/joueur_class.php';

function recupereparties($duree)
{
	
	//$chemin = getcwd();
	//echo $chemin;
	
	$bdd = Connexion::bdd();
	
	//chdir ('administration');
	//echo $duree.'<br>';
	if ($duree=='10000000.0000')
	{
		$requete = 'SELECT * FROM `listeparties` ORDER BY `date` ASC';
	}
	else
	{
		$requete = 'SELECT * FROM `listeparties` WHERE `date`>SUBTIME(NOW(),'.$duree.') ORDER BY `date` ASC';
	}
	//echo $requete.'<br>';
	$req = $bdd->query($requete);
	$donnees = $req->fetchAll();
	
	return $donnees;
}



  var_dump(recupereparties(10));
  
?>
