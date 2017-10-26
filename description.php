<?php
ob_start();
include_once 'fonction/fonctions.php';
include_once 'html/entete.php';
include_once "menu.php";

$fichier = 'config/conf.ini';
if(file_exists($fichier)) {
$config = parse_ini_file($fichier, true);
     
$coopmut = $config['jeu']['CC'];
$trahmut = $config['jeu']['TT'];
$tracoop = $config['jeu']['T'];
$cooptra = $config['jeu']['C'];

if ($coopmut==1 or $coopmut==0)
{
	$coopmut=$coopmut.' point';
}
else
{
	$coopmut=$coopmut.' points';
}
if ($trahmut==1 or $trahmut==0)
{
	$trahmut=$trahmut.' point';
}
else
{
	$trahmut=$trahmut.' points';
}
if ($tracoop==1 or $tracoop==0)
{
	$tracoop=$tracoop.' point';
}
else
{
	$tracoop=$tracoop.' points';
}
if ($cooptra==1 or $cooptra==0)
{
	$cooptra=$cooptra.' point';
}
else
{
	$cooptra=$cooptra.' points';
}

}
else
{
$coopmut = 'non accessible';
$trahmut = 'non accessible';
$tracoop = 'non accessible';
$cooptra = 'non accessible';
}



echo '<br>';
echo 'Le jeu du prisonnier est extrêmement simple : vous rencontrez d\'autres joueurs ou des stratégies et vous devez soit coopérer, soit faire défection avec la personne ou la stratégie que vous rencontrez.<br>';
echo 'Le nombre de points que vous gagnez à chaque rencontre dépend du résultat du croisement de l\'action de jeu de l\'autre joueur ou de la stratégie, et de votre propre action de jeu comme indiqué dans le tableau ci-dessous.<br>';
echo 'Le but du jeu est d\'obtenir le meilleur score moyen par partie avec le plus grand nombre de parties.<br>';
echo 'Le meilleur joueur sera celui qui aura le plus grand score moyen (score total divisé par le nombre de parties jouées) dans la catégorie la plus haute.<br>';
echo 'Lors des rencontres, si vous mettez trop de temps à jouer, un coup généré aléatoirement sera exécuté à votre place<br>';
echo '<br>';
echo 'Tableau des points que vous gagnez selon le croisement des actions de jeu :<br>';
echo '<table border=1 cellspacing=0 cellpadding=10>';
echo '<tr><th rowspan=2></th><th colspan=2>Vous avez joué</th></tr>';
echo '<tr><td>Coopération</td><td>Défection</td></tr>';
echo '<tr><td>Coopération adverse</td><td align="center">'.$coopmut.'</td><td align="center">'.$tracoop.'</td></tr>';
echo '<tr><td>Défection adverse</td><td align="center">'.$cooptra.'</td><td align="center">'.$trahmut.'</td></tr>';
echo '</table>';


include_once 'html/end.php';

?>