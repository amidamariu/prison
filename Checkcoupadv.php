<?php
include_once 'path.php';
include_once ROOT."class/joueur_class.php";
include_once ROOT."class/partieencours_class.php";

$jou=joueur::joueur_by_session();
$partie = partieencours::find_last($jou->get_id());

if($jou->get_id()== $partie->get_joueur(1))
{
    $jou1=1;
    $adv=2;
}
else
{
    $jou1=2;
    $adv=1;
}
xmlcoup($partie->get_coup($jou1), $partie->get_coup($adv));

/*
$t1=time();
$t2=time();

while($t1 + 100 > $t2 )
{
    sleep(1);
    $t2=time();
    if($partie->get_coup($adv)!=null)
    {
     break;
    }


}
*/


function xmlcoup($coup_joueur,$coup_adv)
{
    header('Content-type: application/xml');
    $xml = '<?xml version="1.0" encoding="UTF-8"?>';
    $xml .= '<rac>';
    $xml .= '<joueur>';
    if($coup_joueur==null)
    {
    $xml .= 'non';
    }
    else
    {
    $xml .= 'oui';
    }
    $xml .= '</joueur>';
    $xml .= '<adv>';
    if($coup_adv==null)
    {
        $xml .= 'non';
    }
    else
    {
        $xml .= 'oui';
    }
    $xml .= '</adv>';
    $xml .= '</rac>';
    echo $xml;
}


?>
