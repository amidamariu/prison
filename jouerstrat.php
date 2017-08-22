<?php
include_once 'fonction/fonctions.php';
include_once "class/strategie_class.php";
include_once 'html/entete.php';
include_once "menu.php";

if (! joueur::connected ()) {
	echo "vous devez être connecté pour accéder à cette page";
} else {
	
	$jou = joueur::joueur_by_session ();
	
	if (! isset ( $_POST ['coup'], $_POST ['strat'] )) {
		
		$strat = new strategie ();

historique($jou->get_id(),$strat->get_id_joueur());
		
		
		
		echo '<form method="post" action="jouerstrat.php" >
<input type="hidden" name="coup" value=1>
<input type="hidden" name="strat" value=' . $strat->get_id () . '>
<input type="submit" value="Coop" />
</form>';
		
		echo '<form method="post" action="jouerstrat.php" >
<input type="hidden" name="coup" value=0>
<input type="hidden" name="strat" value=' . $strat->get_id () . '>
<input type="submit" value="Trahir" />
</form>';
	} else // on a joué
{
		
		$strat = new strategie ( $_POST ['strat'] );
		echo "vous avez joué contre:" . $strat->get_nom () . "<br>";
		
		if ($_POST ['coup'] == 0) {
			echo "Vous avez joué : trahison <br>";
		} else {
			echo "Vous avez joué : coopération <br>";
		}
		
		$coupadv = $strat->jouer ( $jou->get_id () );
		if ($coupadv == 0) {
			echo "La stratégie a joué : trahison <br>";
		} else {
			echo "La stratégie a joué : coopération <br>";
		}
		
		echo "Votre gain : " . getGain ( $_POST ['coup'], $coupadv ) . "<br>";
		echo "Gain complice: " . getGain ( $coupadv, $_POST ['coup'] ) . "<br>";
		
		ajoutePartie ( $jou->get_id (), $strat->get_id_joueur (), $_POST ['coup'], $coupadv );
		
		echo '<form method="post" action="jouerstrat.php" >
<input type="submit" value="Rejouer" />
</form>';
	}
}

include_once 'html/end.php';
?>

