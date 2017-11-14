<?php
chdir ('..');
include_once 'path.php';
include_once ROOT.'class/connexion_class.php';
include_once ROOT.'class/joueur_class.php';
include_once ROOT.'fonction/fonctions.php';

Function placeenjoueur2($tableau,$id) 
// fonction qui met l'identifiant du joueur passé en parametre en deuxième position s'il n'y est pas déjà, en échangeant les joueurs et leurs coups
{
for ($i=0; $i<sizeof($tableau); $i++)
{
	if ($tableau[$i]['Joueur1']==$id)
	{
		$tableau[$i]['Joueur1']=$tableau[$i]['Joueur2'];
		$tableau[$i]['Joueur2']=$id;
		$Coup=$tableau[$i]['Coup1'];
		$tableau[$i]['Coup1']=$tableau[$i]['Coup2'];
		$tableau[$i]['Coup2']=$Coup;
	}
}
return $tableau;	
}

function paspresentdans($tableau, $joueur)
// fonction qui vérifie que le joueur n'est pas déjà dans le tableau, renvoie vrai en ce cas, faux sinon
{
for ($i=0; $i<sizeof($tableau); $i++)
{
 //echo '->'.$i.' : '.$tableau[$i].'<br>';
 if ($tableau[$i]==$joueur)
 {
	return false;
 }
}
return true;
}

function joueursdifferentsopposes($tableau)
// fonction qui met en tableau les joueurs différents qui sont en joueur 1 dans le tableau en parametre
{
$complice[0]=$tableau[0]['Joueur1'];
for ($i=1; $i<sizeof($tableau); $i++)
{
	//echo $i.' : '.$tableau[$i]['Joueur1'].'<br>';
	if (paspresentdans($complice, $tableau[$i]['Joueur1']))
	{
		$complice[sizeof($complice)]=$tableau[$i]['Joueur1'];
	}
}
return $complice;	
}

function decalerligne($tableau, $indice)
// fonction qui décale le tableau à partir de $indice puis supprime la dernière ligne (donc suppression de la ligne indice en fait)
{
	$i=$indice;
	while ($i<(sizeof($tableau)-1))
	{
		$tableau[$i]=$tableau[$i+1];
		$i=$i+1;
	}
	unset($tableau[$i]);
	return $tableau;
}

function partiesjouees($tableau,$joueur)
// fonction qui élimine toutes les lignes qui ne contiennent pas $joueur en dans le tableau des parties
{
	$i=0;
	//echo (sizeof($tableau));
	while ($i<sizeof($tableau))
	{
		if ($tableau[$i]['Joueur1']==$joueur)
		{
			$i=$i+1;
		}
		else
		{
			$tableau=decalerligne($tableau,$i);
			//echo (sizeof($tableau));
		}
	}
	return $tableau;
}

//---début du code hors fonctions

//$chemin = getcwd();
//echo $chemin;

// on récupère le pseudo passé en parametre
$pseudo = $_GET['pseudo'];

// on va chercher dans la base l'identifiant correspondant au pseudo
$bdd = Connexion::bdd();
$req = $bdd->query('SELECT Id FROM listejoueurs WHERE Pseudo='.$pseudo);
$reponse = $req->fetch();

//var_dump ($reponse);

// si la réponse n'est pas null, on va chercher toutes les parties dans lesquelles l'identifiant est impliqué
if ($reponse)
{
$id=$reponse['Id'];
$req = $bdd->query('SELECT Joueur1, Joueur2, Coup1, Coup2 FROM listeparties WHERE (Joueur1 ='.$id.' OR Joueur2 ='.$id.') ORDER BY date ASC');
$tableau = $req->fetchall();

//var_dump ($tableau);

if ($tableau) //il y a des parties avec le joueur passé en paramètre
{

// On met l'identifiant du joueur passé en parametre en deuxième position s'il n'y est pas déjà, en échangeant les joueurs et leurs coups
$tableau=placeenjoueur2($tableau,$id);

//var_dump ($tableau);

// on stocke en tableau chaque opposant, une seule fois
$opposants=joueursdifferentsopposes($tableau);

//var_dump ($opposants);

echo 'Le nombre de complices différents rencontrés est : '.sizeof($opposants).'<br>';

// pour chaque complice on extrait et analyse les parties le concernant
foreach ($opposants as $joueur)
{
	$listesparties=partiesjouees($tableau,$joueur);
	//var_dump ($listesparties);
	afficherstatistiques($listesparties);
}



}
else // pas de parties jouées
{
	echo 'Le joueur '.$pseudo.' n\'a encore jamais joué';
}

}
else // le pseudo n'a pas été trouvé dans la liste des joueurs
{
	echo 'Le joueur '.$pseudo.' n\'est pas dans la base des joueurs';
}

echo '<br><br><a href="index.php">retour aux fonctions de gestion</a><br>';

include_once 'html/end.php';

?>