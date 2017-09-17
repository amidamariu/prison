<?php


include_once 'fonction/fonctions.php';
include_once "class/joueur_class.php";
session_start();

if(!joueur::connected())
{
	?>
	
Vous n'êtes pas connecté, 	
<a href="connexion.php">Connexion</a> <a href="verifieinscr.php">Inscription</a> <a href="oublimdp.php">Mot de passe oublié</a><br>
<?php
}
else
{
$jou = joueur::joueur_by_session();
?>

<div class="message">Vous êtes connecté (<a href="profil.php"><?php echo $jou->get_Pseudo(); ?></a>) <a href="index.php">Menu</a> <a href="classement.php">Classement</a>  <a href="deconnexion.php"> Deconnexion</a>


</div>

<?php
}

	echo "---------------------"."<br><br><br>"  ;
?>

