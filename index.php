<?php

include_once 'html/entete.php';
require_once 'menu.php';
if(!joueur::connected())
{

}
else
{
	
?>


<a href="jouerstrat.php">Jouer contre une stategie</a><br>
<a href="jouer.php">Jouer contre un joueur</a><br>


<?php
}
include 'html/end.php';
?>
