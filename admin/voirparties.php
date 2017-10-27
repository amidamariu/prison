<?php

include_once '../html/entete.php';
include_once '../class/connexion_class.php';
include_once '../class/joueur_class.php';

function recupereparties($duree)
{
	chdir ('..');
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

function ecrireparties ($duree, $duree2)
{
	//echo $duree;
	//echo $duree2;
	$tableau = recupereparties($duree);
	//var_dump($tableau);
	if ($tableau)
	{
		if ($duree2=='10000')
		{
			echo 'Toutes les parties jouées';
		}
		elseif ($duree2=='100')
		{
			echo 'Parties jouées depuis une heure';
		}
		else
		{
			echo 'Parties jouées depuis '.$duree2.' minutes';
		}
		echo '<table>';
		echo '<tr><td>Date</td><td>Joueur1</td><td></td><td>Joueur2</td></tr>';
		for ($i = 0; $i < count($tableau); $i++)
		{
		    echo "<tr>";
			echo '<td>'.$tableau[$i]["date"].'</td>';
			if($tableau[$i]["Coup1"]==1)
			{
			echo '<td style="color:green" >' . Joueur::Pseudo_by_id($tableau [$i]["Joueur1"]) . "</td>";
			}
			if($tableau [$i]["Coup1"]==0)
			{
				echo '<td style="color:red" >' . Joueur::Pseudo_by_id($tableau [$i]["Joueur1"]). "</td>";
			}
			echo '<td>|-----------|</td>';
			if($tableau [$i]["Coup2"]==1)
			{
				echo '<td style="color:green" >' . Joueur::Pseudo_by_id($tableau [$i]["Joueur2"]). "</td>";
			}
			if($tableau [$i]["Coup2"]==0)
			{
				echo '<td style="color:red" >' . Joueur::Pseudo_by_id($tableau [$i]["Joueur2"]). "</td>";
			}
			echo "</tr>";

		}
		echo '<table>';
	}
	else
	{
		if ($duree2 == '10000')
		{
		echo '<br>Aucune partie n\'a encore été jouée';
		}
		elseif ($duree2 == '100')
		{
		echo '<br>Pas de parties jouées depuis moins d\'une heure';
		}
		else
		{
		echo '<br>Pas de parties jouées depuis moins de '.$duree2.' minutes';
		}
	}
    
	echo '<br><br><a href="index.php">retour aux fonctions de gestion</a><br>';

    include_once 'html/end.php';
	
}

$temps = $_GET['duree'];
$duree = $temps.'00.0000';
ecrireparties ($duree, $temps);

?>


