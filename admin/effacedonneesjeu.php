<?php

include_once "../class/connexion_class.php";

function RemiseAzero()
{

//$chemin = getcwd();
//echo $chemin;
$bdd = Connexion::bdd();

$req = $bdd->prepare('UPDATE `listejoueurs` SET `Nbpartiesjouees` = 0, `Nbcoopcoop` = 0, `Nbcoopdefe` = 0,`Nbdefecoop` = 0,`Nbdefedefe` = 0, `score` = 0, `score_moyen` = 0, `auto` = 0');
$req->execute() or die(print_r($req->errorInfo()));

$req -> closeCursor();

$req = $bdd->prepare('DELETE FROM `listeparties`');
$req->execute() or die(print_r($req->errorInfo()));

$req -> closeCursor();

$req = $bdd->prepare('DELETE FROM `partieencours`');
$req->execute() or die(print_r($req->errorInfo()));

$req -> closeCursor();

$req = $bdd->prepare('DELETE FROM `attente`');
$req->execute() or die(print_r($req->errorInfo()));

$req -> closeCursor();

}

function RemiseAzeropartiesencours()
{
//$chemin = getcwd();
//echo $chemin;
$bdd = Connexion::bdd();

$req = $bdd->prepare('DELETE FROM `attente`');
$req->execute() or die(print_r($req->errorInfo()));

$req -> closeCursor();

$req = $bdd->prepare('DELETE FROM `partieencours`');
$req->execute() or die(print_r($req->errorInfo()));

$req -> closeCursor();

}


?>
