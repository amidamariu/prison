<?php

include_once 'html/entete.php';
require_once 'menu.php';


if(isset($_GET['eprellogin']) && isset($_GET['mail']) )
{
	echo $_GET['eprellogin'];
	echo $_GET['mail'];
	
}

include 'html/end.php';
?>
