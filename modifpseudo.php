<?php
include_once 'fonction/fonctions.php';
include_once 'html/entete.php';
include_once "menu.php";

if(!joueur::connected())
{
echo "vous devez être connecter pour accéder à cette page";
}
else
{
$jou = joueur::joueur_by_session();
$date1 = new DateTime($jou->get_last_change());
$date2 = new DateTime(date("Y-m-d H:i:s"));
$interval = $date2->diff($date1);

$fichier = 'config/conf.ini';

if(file_exists($fichier)) {
	$config = parse_ini_file($fichier, true);
	
	$limite = $config['pseudo']['limite'];
}

if( $interval->format('%a') < $limite )
{
	echo "Uniquement un changement tout les ".$limite." jours <br> Vous pourrez de nouveau le changer dans ".($limite - $interval->format('%a'))." jours";
}
else
{

if (isset($_POST['pseudonyme'], $_POST['motdepasse']) )
{
	//On sécurise les données rentrées (il y a peut-être plus à faire que juste strip_tags)
	$_POST['pseudonyme'] = strip_tags($_POST['pseudonyme']);
	$_POST['motdepasse'] = strip_tags($_POST['motdepasse']);

	if (verifiepseudo($_POST['pseudonyme']))
		//il faut que le nouveau pseudonyme corresponde au format correct et n'existe pas déjà
	{ 
		if ($jou->verif_mdp($_POST['motdepasse']) || $jou->is_eprel())
				//vérification que c'est le bon mot de passe
				//il faut sans doute limiter le nombre de mot de passe incorrects d'affilé pour un même email, 
				//pour éviter les tentatives de hackage.
				// Il doit falloir mettre un indicateur dans la base, mais il faut en discuter. 
				//Peut-être une limite de temps suffit-elle.
			{
				$jou->change_pseudo($_POST['pseudonyme']);
				//changepseudo($_POST['pseudonyme'],$_SESSION['mail']);
				?>
				<div class="message">Modification réussie : votre nouveau pseudonyme est <?php echo $_POST['pseudonyme']; ?></div>
				<?php
				$form = false;
			}
			else
			{
				//Sinon, on dit que le mot de passe n'est pas valide
				$form = true;
				$message = 'Le mot de passe n\'est pas correct.';
				$_POST['motdepasse']='';
			}

	}
    else
	{
		//Sinon, on dit que le pseudonyme n'est pas valide
		$form = true;
		$message = 'Votre nouveau pseudonyme n\'est pas valide ou il existe déjà.';
		$_POST['pseudonyme']='';
	}
}		
else	
{
	$form = true;
}
if($form)
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

<form method="post" action="modifpseudo.php" name="modifpseudo"><br>
  <br>
Nouvel Identifiant/Pseudo&nbsp; <input maxlength="32" size="32" name="pseudonyme" value=<?php if ( isset($_POST['pseudonyme'])) {echo $_POST['pseudonyme'];} ?>> 
au moins 6 caractères et alphanumériques uniquement.
<br>
<br>
Mot de passe&nbsp; <input maxlength="20" size="20" name="motdepasse" type="password" value=<?php if ( isset($_POST['motdepasse'])) {echo $_POST['motdepasse'];}?>> 
<br>
  <br>
  <br>
  <span style="text-decoration: underline;"></span><input name="envoyer" value="Envoyer" type="submit">
</form>
<?php
}
}
}
include_once 'html/end.php';
?>
