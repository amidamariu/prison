<?php
session_start();
include_once 'path.php';
include_once ROOT."class/joueur_class.php";
include_once ROOT."class/partieencours_class.php";
include_once ROOT."class/strategie_class.php";
include_once ROOT."fonction/fonctions.php";
$jou=joueur::joueur_by_session();
$adv = $jou->find_adv(); 

$latence = get_data_from_ini_file('Latence','Verif');
$DureeMax = get_data_from_ini_file('Latence','DureeAvantStrat');

if($adv == 0) //si on n'a pas trouvé d'adverssaire
{
    $jou->set_attente(); 
	$t1=time();
	$t2=time();
	$trouve=false;
	while($t1 + $DureeMax > $t2 )
	{
	sleep($latence);
	$t2=time();
	$partie = partieencours::find_new($jou->get_id());
	if( $partie != null)
	{
	$partie->set_old();
	$trouve=true;
	xmladv(Joueur::Pseudo_by_id($partie->get_joueur(1)),$partie->get_id(),FALSE,'J');
	break;
	}
	}
	if(!$trouve)
	{
		$strat = new strategie();
		$partie = partieencours::ajouter($jou->get_id(),$strat->get_id_joueur());
		$jou->unset_attente();
		$partie->set_old();
		xmladv($strat->get_nom(),$partie->get_id(),TRUE,'S');  
	}
}
else //si on a on extrait un adversaire de la liste d'attente
{
    
    
	$partie = partieencours::ajouter($jou->get_id(),$adv);

	$t1=time();
	$t2=time();
	
	while($t1 + $DureeMax > $t2 )
	{
		sleep($latence);
		$t2=time();
		if(!$partie->is_new())
		{
		    xmladv(Joueur::Pseudo_by_id($partie->get_joueur(2)),$partie->get_id(),TRUE,'J');
			break;
		}
		
	}	
}

function xmlstat()
{
    header('Content-type: application/xml');
    $xml = '<?xml version="1.0" encoding="UTF-8"?>';
    $xml .= '<rac>';
    $xml .= '<trouve>';
    $xml .= 'non';
    $xml .= '</trouve>';
    $xml .= '<createur>';
    $xml .= 'oui';
    $xml .= '</createur>';
 /*   $xml .= '<adv>';
    $xml .= 'johann';
    $xml .= '</adv>';
    $xml .= '<partie>';
    $xml .= '4815162342';
    $xml .= '</partie>'; */
    $xml .= '</rac>';
    echo $xml;
}

function xmladv($adv,$partie,$createur,$type)
{
    header('Content-type: application/xml');
    $xml = '<?xml version="1.0" encoding="UTF-8"?>';
    $xml .= '<rac>';
    $xml .= '<trouve>';
    $xml .= 'oui';
    $xml .= '</trouve>';
    $xml .= '<adv>';
    $xml .= $adv;
    $xml .= '</adv>';
    $xml .= '<type>';
    $xml .= $type;
    $xml .= '</type>';
    $xml .= '<partie>';
    $xml .= $partie;
    $xml .= '</partie>';
    if($createur)
    {
    	$xml .= '<createur>';
    	$xml .= 'oui';
    	$xml .= '</createur>';
    }
    else
    {
    	$xml .= '<createur>';
    	$xml .= 'non';
    	$xml .= '</createur>';
    }
    $xml .= '</rac>';
    echo $xml;
}


?>
