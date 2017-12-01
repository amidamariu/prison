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

function trouveNbconfiguration($liste,$strat1,$strat2)
// cette fonction trouve le nombre de duo de coups dans la liste des parties
{
    $Nbtype=0;
    //var_dump(sizeof($liste));
    for ($i=0;$i<sizeof($liste);$i++)
    {
        if (($liste[$i]['Coup2']==$strat1) and ($liste[$i]['Coup1']==$strat2))
        {
            $Nbtype++;
            //var_dump($Nbtype);
        }
    }
    return $Nbtype;
}

function afficherstatistiques($listesparties)
// fonction qui affiche les statistiques extractibles du tableau $listesparties
{
	$i=0;
	while (($listesparties[$i]['Coup1']!=0) and ($listesparties[$i]['Coup2']!=0) and ($i<(sizeof($listesparties)-1)))
	{
	    $i++;
	}
	if (($listesparties[$i]['Coup1']!=0) and ($listesparties[$i]['Coup2']==0))
	{
	    echo ('A trahi en premier<br>');
	    $GLOBALS['NombreMechancetePremier']++;
	}
	elseif (($listesparties[$i]['Coup1']==0) and ($listesparties[$i]['Coup2']==0))
	{
	    echo ('A trahi en même temps que le complice<br>');
	    $GLOBALS['NombreMechancetePartage']++;
	}
	elseif (($listesparties[$i]['Coup1']==0) and ($listesparties[$i]['Coup2']!=0))
	{
	    echo ('A été trahi en premier<br>');
	    $GLOBALS['NombreMechanceteSubie']++;
	}
	else
	{
	    echo ('Unquement des coopérations mutuelles<br>');
	    $GLOBALS['NombrePasDeMechancete']++;
	}
	$coopcoop=trouveNbconfiguration($listesparties,1,1);
	$GLOBALS['coopcoop']=$GLOBALS['coopcoop']+$coopcoop;
	$pourcent=100*$coopcoop/sizeof($listesparties);
	echo ('Nombre de coopérations mutuelles : '.$coopcoop.' ('.number_format($pourcent,1).'%)<br>');
	$coopdefe=trouveNbconfiguration($listesparties,1,0);
	$GLOBALS['coopdefe']=$GLOBALS['coopdefe']+$coopdefe;
	$pourcent=100*$coopdefe/sizeof($listesparties);
	echo ('Nombre de coopérations face à une défection : '.$coopdefe.' ('.number_format($pourcent,1).'%)<br>');
	$defecoop=trouveNbconfiguration($listesparties,0,1);
	$GLOBALS['defecoop']=$GLOBALS['defecoop']+$defecoop;
	$pourcent=100*$defecoop/sizeof($listesparties);
	echo ('Nombre de défections face à une coopération : '.$defecoop.' ('.number_format($pourcent,1).'%)<br>');
	$defedefe=trouveNbconfiguration($listesparties,0,0);
	$GLOBALS['defedefe']=$GLOBALS['defedefe']+$defedefe;
	$pourcent=100*$defedefe/sizeof($listesparties);
	echo ('Nombre de défections mutuelles : '.$defedefe.' ('.number_format($pourcent,1).'%)<br>');
	
}

//---début du code hors fonctions

chdir ('..');
//$chemin = getcwd();
//echo $chemin;

// on récupère le pseudo passé en parametre
$pseudo = $_GET['pseudo'];
echo ('Statistiques présentées pour '.$pseudo.'<br>');

// on va chercher dans la base l'identifiant correspondant au pseudo
$bdd = Connexion::bdd();
$req = $bdd->query("SELECT Id FROM listejoueurs WHERE Pseudo='".$pseudo."'");
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
$Nbpartiesjouees=sizeof($tableau);
//var_dump($Nbpartiesjouees);

//var_dump ($tableau);

// on stocke en tableau chaque opposant, une seule fois
$opposants=joueursdifferentsopposes($tableau);

//var_dump ($opposants);

// Initialisation des variables de statistiques générales, incrémentées dans les stats particulières à l'aide de GLOBALS
$NombreMechancetePremier=0;
$NombreMechancetePartage=0;
$NombreMechanceteSubie=0;
$NombrePasDeMechancete=0;
$coopcoop=0;
$coopdefe=0;
$defecoop=0;
$defedefe=0;

echo 'Le nombre de complices différents rencontrés est : '.sizeof($opposants).'<br>';
echo '<B>Statistiques selon chaque complice : </B><br>';

// pour chaque complice on extrait et analyse les parties le concernant
$compt=1;
foreach ($opposants as $joueur)
{
	$adv = new joueur($joueur);
	echo ($compt.') Contre : '.$adv->get_Pseudo().'<br>');
	$listesparties=partiesjouees($tableau,$joueur);
	//var_dump ($listesparties);
	afficherstatistiques($listesparties);
	$compt++;
}

// On affiche maintenant les statistiques tous complices confondus
echo '<B>Statistiques générales : </B><br>';

$pourcent = 100*$NombreMechancetePremier/sizeof($opposants);
echo ('Méchanceté seule : '.$NombreMechancetePremier.' sur '.sizeof($opposants).' complices ('.number_format($pourcent,1).'%)<br>');

$PourcentageMechantPartage = 100*$NombreMechancetePartage/sizeof($opposants);
echo ('Méchanceté partagée : '.$NombreMechancetePartage.' sur '.sizeof($opposants).' complices ('.number_format($PourcentageMechantPartage,1).'%)<br>');

$pourcent = 100*$NombreMechanceteSubie/sizeof($opposants);
echo ('Méchanceté subie : '.$NombreMechanceteSubie.' sur '.sizeof($opposants).' complices ('.number_format($pourcent,1).'%)<br>');

$pourcent = 100*$NombrePasDeMechancete/sizeof($opposants);
echo ('Pas de méchanceté : '.$NombrePasDeMechancete.' sur '.sizeof($opposants).' complices ('.number_format($pourcent,1).'%)<br>');

$pourcent=100*$coopcoop/$Nbpartiesjouees;
echo ('Nombre de coopérations mutuelles : '.$coopcoop.' sur '.$Nbpartiesjouees.' rencontres ('.number_format($pourcent,1).'%)<br>');

$pourcent=100*$coopdefe/$Nbpartiesjouees;
echo ('Nombre de coopérations face à une défection : '.$coopdefe.' sur '.$Nbpartiesjouees.' rencontres ('.number_format($pourcent,1).'%)<br>');

$pourcent=100*$defecoop/$Nbpartiesjouees;
echo ('Nombre de défections face à une coopération : '.$defecoop.' sur '.$Nbpartiesjouees.' rencontres ('.number_format($pourcent,1).'%)<br>');

$pourcent=100*$defedefe/$Nbpartiesjouees;
echo ('Nombre de défections mutuelles : '.$defedefe.' sur '.$Nbpartiesjouees.' rencontres ('.number_format($pourcent,1).'%)<br>');

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