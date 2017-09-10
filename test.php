<?php

include_once "class/connexion_class.php";
include_once "class/joueur_class.php";

$jou = new joueur(22);

echo $jou->get_Pseudo();
echo "<br>";
echo $jou->find_adv();

?>