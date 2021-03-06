<?php
include_once 'path.php';
include_once ROOT.'class/joueur_class.php';
include_once ROOT.'class/connexion_class.php';
//Stocke mdpchange hasché à la place l'ancien dans la base sur la ligne de l'email



function EnvoiMailInscr($mail, $pseudo, $motdepasse)  
// Fonction copiée sur https://openclassrooms.com/courses/e-mail-envoyer-un-e-mail-en-php
{
if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
{
	$passage_ligne = "\r\n";
}
else
{
	$passage_ligne = "\n";
}
//=====Déclaration des messages au format texte et au format HTML.
$message_txt = "Bonjour ".$pseudo.", votre mot de passe pour vous connecter au jeu du dilemme du prisonnier est : ".$motdepasse.$passage_ligne;
$message_txt.= "Il est fortement recommandé de changer ce mot de passe.";
//==========
 
//=====Création de la boundary
$boundary = "-----=".md5(rand());
//==========
 
//=====Définition du sujet.
$sujet = "Inscription au jeu du dilemme du prisonnier (ou oubli mot de passe)";
//=========
 
//=====Création du header de l'e-mail.
$header = "From: \"Renaud Laporte\"<r.laporte@u-pec.fr>".$passage_ligne;
$header.= "Reply-to: \"Renaud Laporte\" <r.laporte@u-pec.fr>".$passage_ligne;
$header.= "MIME-Version: 1.0".$passage_ligne;
$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
//==========
 
//=====Création du message.
$message = $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format texte.
$message.= "Content-Type: text/plain; charset=\"UTF-8\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_txt.$passage_ligne;
//==========
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
//==========
 
//=====Envoi de l'e-mail.
mail($mail,$sujet,$message,$header);
//==========
}


function EnvoiMailLienValidation($mail, $pseudo, $code)  
// Fonction copiée (transformée) sur https://openclassrooms.com/courses/e-mail-envoyer-un-e-mail-en-php
{
if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
{
	$passage_ligne = "\r\n";
}
else
{
	$passage_ligne = "\n";
}
//=====Déclaration des messages au format texte et au format HTML.
$message_txt = "Bonjour ".$pseudo.", cliquez sur le lien ci-dessous, ou copiez-le dans un navigateur, pour récupérer un nouveau mot de passe. ".$passage_ligne;
$message_txt.= "Si vous n'avez pas demandé : mot de passe oublié, ne tenez pas compte de ce mail,".$passage_ligne;
$message_txt.= "c'est que quelqu'un d'autre a signalé 'mot de passe oublié' avec votre adresse mail, et il suffit de ne rien faire.".$passage_ligne;
$message_txt.= "http://prison.nicod.info".dirname($_SERVER["PHP_SELF"])."/activeemailoublimdp.php?code=".urlencode($code);
//==========
 
//=====Création de la boundary
$boundary = "-----=".md5(rand());
//==========
 
//=====Définition du sujet.
$sujet = "Oubli du mot de passe au jeu du dilemme du prisonnier";
//=========
 
//=====Création du header de l'e-mail.
$header = "From: \"Renaud Laporte\"<r.laporte@u-pec.fr>".$passage_ligne;
$header.= "Reply-to: \"Renaud Laporte\" <r.laporte@u-pec.fr>".$passage_ligne;
$header.= "MIME-Version: 1.0".$passage_ligne;
$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
//==========
 
//=====Création du message.
$message = $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format texte.
$message.= "Content-Type: text/plain; charset=\"UTF-8\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_txt.$passage_ligne;
//==========
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
//==========
 
//=====Envoi de l'e-mail.
mail($mail,$sujet,$message,$header);
//==========
}


function InsererCode($email, $code)
{

$bdd = Connexion::bdd();

$req = $bdd->prepare('UPDATE `listejoueurs` SET `Codeoublimdp` = :code WHERE `Email` = :email');
$req->execute(array('code' => $code, 'email' => $email)) or die(print_r($req->errorInfo()));

/*$donnees= $req->fetch();
echo "\n";
echo $code;
echo "\n";
echo $email;
echo "\n";
var_dump ($donnees);*/

$req -> closeCursor();

}

function ajoutejoueur($Email, $Pseudo, $Motdepasse)
{
$bdd = Connexion::bdd();

$MDPHache = password_hash($Motdepasse,PASSWORD_BCRYPT,['cost' => 13]);
$Datedujour = date("Y-m-d H:i:s");

$req = $bdd->prepare('INSERT INTO `listejoueurs` (`Id`, `Email`, `Pseudo`, `Motdepasse`, `Nbpartiesjouees`, `Nbcoopcoop`, 
`Nbcoopdefe`, `Nbdefecoop`, `Nbdefedefe`, `Dateinscription`, `Datederconnexion`, `Validationemail`) 
VALUES(:Id, :Email, :Pseudo, :Motdepasse, :Nbpartiesjouees, :Nbcoopcoop, 
:Nbcoopdefe, :Nbdefecoop, :Nbdefedefe, :Dateinscription, :Datederconnexion, :Validationemail)');
$req->execute(array(
 	'Id' => '',
	'Email' => $Email,
	'Pseudo' => $Pseudo,
	'Motdepasse' => $MDPHache,
    'Nbpartiesjouees' => 0,
	'Nbcoopcoop' => 0,
	'Nbcoopdefe' => 0,
	'Nbdefecoop' => 0,
	'Nbdefedefe' => 0,
	'Dateinscription' => $Datedujour,
	'Datederconnexion' => '',
	'Validationemail' => ''
	)) or die(print_r($req->errorInfo()));

$req -> closeCursor();

}


function ajoutePartie($joueur1,$joueur2,$coup1,$coup2)
{
$bdd = Connexion::bdd();

$req = $bdd->prepare('INSERT INTO `listeparties`  (`Joueur1`, `Joueur2`, `Coup1`, `Coup2`) 
VALUES(:joueur1, :joueur2, :coup1, :coup2)');
$req->execute(array(
	'joueur1' => $joueur1,
	'joueur2' => $joueur2,
	'coup1' => $coup1,
    'coup2' => $coup2
	)) or die(print_r($req->errorInfo()));

$req -> closeCursor();

$J1 = new joueur($joueur1);
$J2 = new joueur($joueur2);
$J1->inc_nbcoup($coup1,$coup2);
$J2->inc_nbcoup($coup2,$coup1);

}

function historique($IDjou,$IDadv)
{
$jou = new joueur($IDjou);
$adv = new joueur($IDadv);

echo "<br>Historique récent de toutes les parties de ce joueur : <br> (de la plus récente à la plus ancienne) <br>";

echo "<table border=1 cellspacing=0 cellpadding=5>";

$hist = get_historique( $IDadv);

if($hist == NULL)
{
	echo "Ce joueur n'a encore jamais joué";
	echo "<br>";
}
else
{
echo '<th>Date</th><th>Joueur 1</th><th>Joueur 2</th>';
foreach ( $hist as $result ) {
	echo "<tr>";
	echo '<td>'.$result["date"].'</td>';
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
echo "</table>";
}

echo "<br>Historique de vos rencontres avec ce joueur : <br> (de la plus récente à la plus ancienne) <br>";
$hist = get_historique2 ( $IDadv, $IDjou);


if($hist == NULL)
{
	echo "Vous n'avez encore jamais affronté cet adversaire";
}
else
{
echo "<table border=1 cellspacing=0 cellpadding=5>";
echo '<th>Date</th><th>Joueur 1</th><th>Joueur 2</th>';
foreach ( $hist as $result ) {
	echo "<tr>";
	echo '<td>'.$result["date"].'</td>';
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
echo "</table>";
}
echo "<br><br>";

$adv->get_stat();



	
	
}



function historique_muse($IDjou,$IDadv,$type)
{
	$jou = new joueur($IDjou);
	$adv = new joueur($IDadv);
	
	
	
	echo "<table width=100%>";
	
if($type==1)
{
$hist = get_historique( $IDadv);
}
else
{
	$hist = get_historique2 ( $IDadv, $IDjou);
}
	
	if($hist == NULL)
	{
		echo "<tr> Ce joueur n'a encore jamais joué </tr>";

		
		echo "</table>";
	}
	else
	{

		foreach ( $hist as $result ) {
			echo "<tr>";
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
		echo "</table>";
	}
	

}



function get_data_from_ini_file($type,$var)
{
	$fichier = ROOT.'config/conf.ini';
	if(file_exists($fichier)) {
	$config = parse_ini_file($fichier, true);
		
	return $config[$type][$var];
}
}

function get_historique($id)
{


     
        $limite = get_data_from_ini_file('affichage','limite');
    

$bdd = Connexion::bdd();

$req = $bdd->query('SELECT * FROM listeparties WHERE Joueur1 ='.$id.' OR Joueur2 ='.$id.' ORDER BY date DESC LIMIT '.$limite);
if($req)
{
return $req->fetchAll();
}
else
{
	return null;
}

}

function get_historique2($id,$id2)
{
        $limite = get_data_from_ini_file('affichage','limite');
    
        


$bdd = Connexion::bdd();
$req = $bdd->query('SELECT * FROM listeparties WHERE (Joueur1 ='.$id.' AND Joueur2 ='.$id2.') OR (Joueur1 ='.$id2.' AND Joueur2 ='.$id.') ORDER BY date DESC LIMIT '.$limite);


if($req)
{
return $req->fetchAll();
}
else
{
	return null;
}
/*
$donnees= $req->fetchAll();
echo "<pre>";
print_r($donnees);
 echo "</pre>";
 */
}

function PasDejaDansLaBase($colonne,$valeur)
{

$bdd = Connexion::bdd();

$req = $bdd->prepare('SELECT COUNT(*) FROM `listejoueurs` WHERE '.$colonne.' = ?');
$req->execute(array($valeur)) or die(print_r($req->errorInfo()));
$donnees = $req->fetch();

if ($donnees[0]==0)
{
	$req -> closeCursor();
	return true;
}

$req -> closeCursor();
return false;
 
}

function random_str($nbr) 
// Fonction copiée sur http://www.social-actu.fr/open-code/generer-une-suite-de-caracteres-aleatoire-fonction-php.php
{
    $str = "";
    $chaine = "abcdefghijklmnpqrstuvwxyABCDEFGHIJKLMNOPQRSUTVWXYZ0123456789";
    $nb_chars = strlen($chaine);

    for($i=0; $i<$nbr; $i++)
    {
        $str .= $chaine[ rand(0, ($nb_chars-1)) ];
    }

    return $str;
}

function getGain($joueur,$complice)
{
    $fichier = 'config/conf.ini';
        if(file_exists($fichier)) {
        $config = parse_ini_file($fichier, true);
     
        }
		

if($joueur == 0 &&  $complice == 0)
{

return $config['jeu']['TT'];
}
if($joueur == 0 &&  $complice == 1)
{

return $config['jeu']['T'];
}
if($joueur == 1 &&  $complice == 0)
{
	
return $config['jeu']['C'];
}
if($joueur == 1 &&  $complice == 1)
{
	
return $config['jeu']['CC'];
}


}




function verifiemail($email)
{
if(preg_match('#^(([a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+\.?)*[a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+)@(([a-z0-9-_]+\.?)*[a-z0-9-_]+)\.[a-z]{2,}$#i',$email))
{
	if (PasDejaDansLaBase('Email',$email))
	{
		return true;
	}
	else
	{
		return false;
	}
}
else
{
return false;
}
}

function verifiepseudo($pseudo)
{
if(preg_match('#^[a-z0-9éèàêç]+$#i',$pseudo))
{
	if (strlen($pseudo)>5)
	{
		if (PasDejaDansLaBase('Pseudo',$pseudo))
		{
			return true;
		}
		else
		{
		return false;
		}
	}
	else
	{
		return false;
	}
}
else
{
return false;
}
}




function recupereclassement($inf,$sup)
{
	$bdd = Connexion::bdd();
	
	$req = $bdd->query('SELECT Pseudo, score_moyen, Nbpartiesjouees FROM listejoueurs WHERE Nbpartiesjouees >='.$inf.' AND Nbpartiesjouees <='.$sup.' ORDER BY score_moyen DESC, Nbpartiesjouees DESC, Pseudo ASC');
	$donnees = $req->fetchAll();
	
	return $donnees;
}


function ecrireclassement($inf,$sup,$admin = false)
{
	$tableau = recupereclassement($inf,$sup);
	//var_dump($tableau);
	if ($tableau)
	{
		echo '<table border=1>';
		echo '<tr><td align="center" >Place</td><td align="center" >Nom</td><td align="center" >Score moyen</td><td align="center" >Parties jouées</td></tr>';
		$scoremoyenprecedent=-1;
		$Nbpartiesprecedentes=0;
		$placeprecedente=0;
		for ($i = 0; $i < count($tableau); $i++)
		{
			if (($tableau[$i]['score_moyen']==$scoremoyenprecedent) and ($tableau[$i]['Nbpartiesjouees']==$Nbpartiesprecedentes))
			{
				if($admin)
				{
				echo '<tr><td align="center" >'.$placeprecedente.'</td><td align="center" > <a href="analysejoueur.php?pseudo='.$tableau[$i]['Pseudo'].'">'.$tableau[$i]['Pseudo'].'</a></td><td align="center">'.number_format($tableau[$i]['score_moyen'],4).'</td><td align="center">'.$tableau[$i]['Nbpartiesjouees'].'</td></tr>' ;
				}
				else
				{
				echo '<tr><td align="center" >'.$placeprecedente.'</td><td align="center" >'.$tableau[$i]['Pseudo'].'</td><td align="center">'.number_format($tableau[$i]['score_moyen'],4).'</td><td align="center">'.$tableau[$i]['Nbpartiesjouees'].'</td></tr>' ;
				}
			}
			else
			{
				echo '<tr><td align="center">'.strval($i+1).'</td><td align="center" > <a href="analysejoueur.php?pseudo='.$tableau[$i]['Pseudo'].'">'.$tableau[$i]['Pseudo'].'</a></td><td align="center">'.number_format($tableau[$i]['score_moyen'],4).'</td><td align="center">'.$tableau[$i]['Nbpartiesjouees'].'</td></tr>' ;
				$placeprecedente=strval($i+1);
				$scoremoyenprecedent=$tableau[$i]['score_moyen'];
				$Nbpartiesprecedentes=$tableau[$i]['Nbpartiesjouees'];
			}
		}
		echo '<table>';
	}
	else
	{
		echo '<table border=1>';
		echo '<tr><td align="center" >Place</td><td align="center" >Nom</td><td align="center" >Score moyen</td><td align="center" >Parties jouées</td></tr>';
		echo '<table>';
		echo 'Aucun joueur classé dans cette catégorie';
	}
}







?>
