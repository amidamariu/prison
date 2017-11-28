<?php
include_once '../path.php';
include_once ROOT.'html/entete.php';
include_once ROOT.'class/joueur_class.php';
require_once ROOT.'admin/effacedonneesjeu.php';

RemiseAzero();

echo 'Données de jeu effacées pour tous les joueurs';

echo '<br><br><a href="index.php">retour aux fonctions de gestion</a><br>';

include_once 'html/end.php';


?>
