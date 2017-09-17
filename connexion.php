<?php
ob_start ();
include_once 'fonction/fonctions.php';
include_once 'html/entete.php';
include_once "menu.php";
// Si lutilisateur est connecte, on le deconecte
if (joueur::connected ()) {
	echo "vous êtes déja connecté";
} else {
	$ousername = '';
	// On verifie si le formulaire a ete envoye
	if (isset ( $_POST ['login'], $_POST ['password'] )) {
		// On echappe les variables pour pouvoir les mettre dans des requetes SQL
		$username = $_POST ['login'];
		if (strpos ( $_POST ['login'], '@' )) {
			
			$jou = joueur::joueur_by_mail ( $username );
		} else {
			$jou = joueur::joueur_by_Pseudo ( $username );
		}
		
		if ($jou != null) {
			
			$password = $_POST ['password'];
			// $jou->get_mdp();
			// On recupere le mot de passe de lutilisateur
			// echo "username : ".$username."<br>";
			// echo "post: ".$_POST['username']."<br>";
			// On le compare a celui quil a entre et on verifie si le membre existe
			if (password_verify ( $password, $jou->get_mdp () )) {
				// Si le mot de passe es bon, on ne vas pas afficher le formulaire
				$form = false;
				// On enregistre son pseudo dans la session username et son identifiant dans la session userid
				$jou->Set_connexion();	
				$_SESSION ['SessionID']=$jou->Get_Sessionid();
				echo "Connexion réussie, redirection vers le menu";
				header ( 'Refresh: 3; url=index.php' );
				ob_flush ();
			} else {
				$form = true;
				$message = "mot de passe incorrect <br> <br>";
			}
		}
	 else {
	 	$form = true;
		$message = "utilisateur introuvable <br> <br> ";
	}
	}
	
	
	else {
		$form = true;
	}
	
	if ($form) {
		// On affiche un message sil y a lieu
		if (isset ( $message )) {
			echo '<div class="message">' . $message . '</div>';
		}
		// On affiche le formulaire
		?>
<div class="content">
	<form action="connexion.php" method="post">
		Veuillez entrer vos identifiants pour vous connecter:<br />
		<div class="center">
			<label for="username">Nom d'utilisateur</label><input type="text"
				name="login" id="username"
				value="<?php echo htmlentities($ousername, ENT_QUOTES, 'UTF-8'); ?>" /><br />
			<label for="password">Mot de passe</label><input type="password"
				name="password" id="password" /><br /> <input type="submit"
				value="Connection" />
		</div>
	</form>
</div>
<?php
	}
}
include_once 'html/end.php';
?>
              