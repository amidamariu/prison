<?php
include_once 'path.php';
include_once ROOT.'html/entete.php';
include_once ROOT."menu.php";
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
	}
echo '<a href="modifpseudo.php">Modifier pseudo</a><br>';
echo "vos statistiques<br>";
$jou = joueur::joueur_by_session();
$jou->get_stat();
}
include_once 'html/end.php';
?>

