<?php
ob_start();
include_once 'path.php';
include_once ROOT.'html/entete.php';
include_once ROOT.'class/joueur_class.php';
session_start();
//include_once "menu.php";



	
$_SESSION ['SessionID'] =  $_GET['eprellogin'];	
$jou = joueur::joueur_by_session();
$jou->Set_connexion();	
echo "Connexion réussie, redirection vers le menu";
header ( 'Refresh: 3; url=index.php' );
ob_flush ();


include 'html/end.php';
?>
