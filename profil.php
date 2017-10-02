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
	$jou = joueur::joueur_by_session();
	
	if(!$jou->is_eprel())
	{
echo ' <a href="modifmdp.php">Modifier mot de passe</a><br>';
echo '<a href="modifpseudo.php">Modifier pseudo</a><br>';
	}

echo "vos statisiques<br>";
$jou = joueur::joueur_by_session();
$jou->get_stat();
}
include_once 'html/end.php';
?>

