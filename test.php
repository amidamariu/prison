<?php 

define('DOSSIER',"/");
define('ROOT',$_SERVER['DOCUMENT_ROOT'].DOSSIER);
chdir(ROOT);
define('ROOTWEB',$_SERVER['SERVER_NAME'].DOSSIER);
include_once ROOT.'fonction/fonctions.php';
include_once ROOT."class/joueur_class.php";
include_once ROOT."class/strategie_class.php";
include_once ROOT."class/partieencours_class.php";




$strat = new strategie(9);
echo $strat->jouer(228);

echo "<br>----<br>";

$partie = partieencours::ajouter(228, 13);

?>