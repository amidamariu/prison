<?php
define('DOSSIER',"/prison/");
define('ROOT',$_SERVER['DOCUMENT_ROOT'].DOSSIER);
chdir(ROOT);
define('ROOTWEB',$_SERVER['SERVER_NAME'].DOSSIER);
include_once ROOT.'fonction/fonctions.php';
include_once ROOT."class/joueur_class.php";
include_once ROOT."class/strategie_class.php";
session_start();
if(joueur::connected())
{
	if(isset($_GET['eprellogin']))
	{
		$_SESSION ['SessionID'] =  $_GET['eprellogin'];
	}
$jou = joueur::joueur_by_session();
$jou->Set_action();
}
?>