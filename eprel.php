<?php
ob_start();
include_once 'html/entete.php';
include_once "menu.php";



	
$_SESSION ['SessionID'] =  $_GET['eprellogin'];	

echo "Connexion réussie, redirection vers le menu";
header ( 'Refresh: 3; url=index.php' );
ob_flush ();


include 'html/end.php';
?>
