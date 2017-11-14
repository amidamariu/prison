<?php
chdir ('..');
include_once 'path.php';
include_once ROOT.'class/connexion_class.php';
include_once ROOT.'class/joueur_class.php';
include_once ROOT.'fonction/fonctions.php';
include_once ROOT.'html/entete.php';	

$tab = joueur::liste_joueur();

echo "<table BORDER>";
		

echo "<tr>";
echo "<th>Pseudo</th>";
echo "</tr>";
foreach ($tab as $line)
{
echo "<tr>";
echo '<th><a href="analysejoueur.php?pseudo='.$line['Pseudo'].'".>'.$line['Pseudo']."</a></th>";
echo "</tr>";
}


echo "</table>";


include_once ROOT.'html/end.php';

?>