<?php

include_once 'fonction/fonctions.php';
include_once 'html/entete.php';
include_once "menu.php";

if (isset($_GET['code'])) //Est-ce qu'il y a effectivement un code passé en parametre GET dans l'appel de la page ?
{
	$code = urldecode($_GET['code']);
	//on récupère le code passé en parametre GET lors de l'activation du lien en le décodant URL (il a été passé en urlencode)
	$jou = joueur::joueur_by_code($code);
	//on cherche l'email associé au code dans la base
	if ($jou != null ) 
		//si l'email est trouvé on change le mot de passe dans la base et on l'envoie à l'email
	{
		echo "la";
		$pseudo = $jou->get_Pseudo();
		$motdepasse = random_str(6);
		$jou->ChangeMdp($motdepasse);
		EnvoiMailInscr($jou->get_mail(), $pseudo, $motdepasse);
		echo 'Votre nouveau mot de passe a été envoyé à votre adresse email.<br>';
		echo 'Il est recommandé de le changer pour avoir un mot de passe personnel.<br>';
	}	
	else //email non trouvé
	{
		echo 'Réinitialisation de mot de passe impossible (raison inconnue)<br>';
		echo 'En cas de blocage contactez les webmasters - johann.nicod@u-pec.fr et r.laporte@u-pec.fr<br>';
	}
}
else //pas de parametre GET dans le l'appel de la page
{
	echo 'Réinitialisation de mot de passe impossible (raison inconnue)<br>';
	echo 'En cas de blocage contactez les webmasters - johann.nicod@u-pec.fr et r.laporte@u-pec.fr<br>';
}
include_once 'html/end.php';
?>
