<?php
include_once 'path.php';
include_once ROOT.'html/entete.php';
require_once ROOT.'menu.php';


if(!joueur::connected())
{

}
else
{


?>


<a href="jouer.php?type=strat">Jouer contre une stategie</a><br>
<a href="jouer.php?type=joueur">Jouer contre un joueur</a><br>


<?php
}
include 'html/end.php';
?>
