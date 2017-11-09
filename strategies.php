<?php
include_once 'path.php';
include_once ROOT."class/connexion_class.php";
include_once ROOT."class/joueur_class.php";
include_once ROOT.'html/entete.php';
include_once ROOT."menu.php";

$bdd = Connexion::bdd();
	
$sql = 'SELECT * FROM listestrategies';
$rep = $bdd->query($sql);
$donnee = $rep->fetchall();


echo '<table border=1; cellspacing=0; cellpadding=5>';
echo '<tr><th>Nom de la stratégie</th><th>Description de la stratégie</th></tr>';
for ($i = 0; $i < count($donnee); $i++)
{
	echo '<tr><td>'.Joueur::Pseudo_by_id($donnee[$i]["id_joueur"]).'</td><td>'.$donnee[$i]["Description"].'</td></tr>' ;
}
echo '<table>';

echo '<br>';

include_once 'html/end.php';


?>
