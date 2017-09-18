<?php

include_once 'html/entete.php';
require_once 'menu.php';


if(isset($_GET['eprellogin']) && isset($_GET['mail']) )
{
echo	joueur::session_for_eprel($_GET['eprellogin'],$_GET['mail']);	
}

include 'html/end.php';
?>
