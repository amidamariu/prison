<?php

include_once 'html/entete.php';
include_once "menu.php";
if(!joueur::connected())
{
	?>
	
	Vous devez être connecté pour accèder à cette page.

<?php
}
else
{
	
?>

<a href="modifmdp.php">Modifier mot de passe</a><br>
<a href="modifpseudo.php">Modifier pseudo</a><br>

<?php
echo "vos statisiques<br>";
$jou = joueur::joueur_by_session();
$jou->get_stat();
}
include_once 'html/end.php';
?>

