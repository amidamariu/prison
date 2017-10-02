<?php
ob_start();
include_once 'html/entete.php';
include_once "menu.php";


if(isset($_GET['eprellogin']))
{
$var = $_GET['eprellogin'];
echo $var."<br>";
$var = strrev($var);
echo $var."<br>";
$var =  base64_decode($var);
echo $var."<br>";
$var = $var /20502916;
echo $var."<br>";
if(is_numeric($var))
{
	
$_SESSION ['SessionID'] = joueur::session_for_eprel($var);	

echo "Connexion réussie, redirection vers le menu";
//header ( 'Refresh: 3; url=index.php' );
ob_flush ();
}
else
{
echo "mauvais ID";
}
}

include 'html/end.php';
?>
