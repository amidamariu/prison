<?php

include_once '../html/entete.php';	
?>

<a href="effacertable.php">Remise à zéro des parties</a><br>
<a href="effacertableencours.php">Réinitialisation des parties en cours</a><br>
<a href="voirparties.php?duree=3">Voir les parties jouées depuis moins de 3 minutes</a><br>
<a href="voirparties.php?duree=15">Voir les parties jouées depuis moins de 15 minutes</a><br>
<a href="voirparties.php?duree=100">Voir les parties jouées depuis moins d'une heure</a><br>
<a href="voirparties.php?duree=10000">Voir toutes les parties jouées</a><br>

<?php

include '../html/end.php';

?>