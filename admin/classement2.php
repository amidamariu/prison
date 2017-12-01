<?php

chdir ("..");

include_once "fonction/fonctions.php";

ecrireclassement($_GET['inf'],$_GET['sup'],true);

echo '<br><br><a href="index.php">retour aux fonctions de gestion</a><br>';

include_once 'html/end.php';

?>

