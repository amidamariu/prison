<?php
if (isset($_POST['login']) AND isset($_POST['pass']))
{
	$login = htmlspecialchars($_POST['login']);
	$pass_crypte = crypt($_POST['pass'], '4kp'); // On crypte le mot de passe

	echo '<p>Ligne � copier dans le .htpasswd :<br />' . $login . ':' . $pass_crypte . '</p>';
}

else // On n'a pas encore rempli le formulaire
{
?>
<p>Entrez votre login et votre mot de passe pour le crypter.</p>

<form method="post">
	<p>
		Login : <input type="text" name="login"><br />
		Mot de passe : <input type="text" name="pass"><br /><br />
	
		<input type="submit" value="Crypter !">
	</p>
</form>

<?php
}
?>
