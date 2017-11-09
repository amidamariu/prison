<?php
include_once 'path.php';
include_once ROOT.'html/entete.php';
include_once ROOT."menu.php";
include_once ROOT.'fonction/fonctions.php';
?>

<?php


if(!joueur::connected())
{
echo "vous devez être connecter pour accéder à cette page";
}
else
{
$jou = joueur::joueur_by_session();

if (isset($_POST['mdpinitial'], $_POST['motdepasse'], $_POST['motdepasse2']))
{
	//On sécurise les données rentrées (il y a peut-être plus à faire que juste strip_tags)
	$_POST['emailmodif'] = strip_tags( $jou->get_mail());
	$_POST['mdpinitial'] = strip_tags($_POST['mdpinitial']);
	$_POST['motdepasse'] = strip_tags($_POST['motdepasse']);
	$_POST['motdepasse2'] = strip_tags($_POST['motdepasse2']);
	
	if ($jou->verif_mdp($_POST['mdpinitial'])) 
			//vérification que c'est le bon mot de passe
			//il faut sans doute limiter le nombre de mot de passe incorrects d'affilé pour un même email, 
			//pour éviter les tentatives de hackage.
			// Il doit falloir mettre un indicateur dans la base, mais il faut en discuter. 
			//Peut-être une limite de temps suffit-elle.
		{
			if ($_POST['motdepasse']==$_POST['motdepasse2'])
			   //les deux nouveaux mot de passe sont identiques
			{
				$jou->ChangeMdp($_POST['motdepasse']);
				?>
				<div class="message">Modification réussie : vous avez un nouveau mot de passe (ou le même si vous avez remis le même).</div>
				<?php
				$form = false;
			}
			else
			{
				//Sinon, on dit que les deux nouveaux mots de passe ne sont pas identiques
				$form = true;
				$message = 'Les deux nouveaux mots de passe ne sont pas identiques.';
				$_POST['motdepasse']='';
				$_POST['motdepasse2']='';
			}
		}
		else
			{
			//Sinon, on dit que le mot de passe n'est pas valide
			$form = true;
			$message = 'Le mot de passe à changer n\'est pas correct.';
			$_POST['mdpinitial']='';
		}

}		
else	
{
	$form = true;
}
if ($form)
{
	//On affiche le formulaire
//Mais avant, on affiche un message sil y a lieu
if(isset($message))
{
	echo '<div class="message">'.$message.'</div>';
	$message='';
}
else
{
?>
<br>
<?php
}
?>

<form method="post" action="modifmdp.php" name="modifmdp"><br>
<br>
Ancien mot de passe&nbsp; <input maxlength="20" size="20" name="mdpinitial" type="password" value=<?php if(isset($_POST['mdpinitial'])) { echo $_POST['mdpinitial']; }  ?>> 
<br>
<br>
<br>
Nouveau mot de passe&nbsp; <input maxlength="20" size="20" name="motdepasse" type="password" value=<?php if(isset($_POST['motdepasse'])) { echo $_POST['motdepasse']; } ?>> 
<br>
<br>
Répéter mot de passe&nbsp; <input maxlength="20" size="20" name="motdepasse2" type="password" value=<?php if(isset($_POST['motdepasse2'])) { echo $_POST['motdepasse2']; }?>> 
<br>
<br>
<br>
<span style="text-decoration: underline;"></span><input name="envoyer" value="Envoyer" type="submit">
</form>
<?php
}

}
include_once 'html/end.php';
?>
