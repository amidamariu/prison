<?php

include_once 'path.php';
include_once ROOT.'fonction/fonctions.php';
include_once ROOT."class/joueur_class.php";
if(!joueur::connected())
{
	?>
	
Vous n'êtes pas connecté, 	
<a href="connexion.php">Connexion</a> <a href="verifieinscr.php">Inscription</a> <a href="oublimdp.php">Mot de passe oublié</a> <a href="description.php">Règle du jeu</a> <br>
<?php
}
else
{
$jou = joueur::joueur_by_session();
$jou->Set_action();
?>

<div class="message">Vous êtes connecté (<a href="profil.php"><?php echo $jou->get_Pseudo(); ?></a>) <a href="index.php">Menu</a> <a href="classement.php">Classement</a> <a href="description.php">Règle du jeu</a> <a href="deconnexion.php"> Deconnexion</a>
<br>
<?php
echo "joueurs connectés : ".joueur::get_atifs();
?>
</div>

<?php
}

	echo "---------------------"."<br><br><br>"  ;
?>

