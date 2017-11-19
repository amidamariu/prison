<?php
chdir("..");
include_once "path.php";
include_once "class/joueur_class.php";
include_once "class/connexion_class.php";


$data = json_decode(file_get_contents('php://input'), true);


$output = array(
		'session' => joueur::session_for_eprel($data['id'])
);

echo json_encode($output);
		
		

?>