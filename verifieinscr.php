<?php //Page php fortement inspirée de http://www.supportduweb.com/scripts_tutoriaux-code-source-84-espace-membre-en-php-mysql-utilisateurs-espace-membre-inscription-connection-sessions-php-mysql.html
include_once 'fonction/fonctions.php';
include_once 'html/entete.php';
include_once "menu.php";
?>
Inscription au jeu du dilemme du prisonnier<br>

<?php
if(isset($_POST['emailainscrire'], $_POST['pseudonyme']) and $_POST['pseudonyme']!='')
{
	//On verifie si l'email est valide
	if(verifiemail($_POST['emailainscrire']))
	{
		if (verifiepseudo($_POST['pseudonyme']))
		{
   	        //On enleve le code malveillant (html) mais peut-être n'est-ce pas suffisant pour la sécurité ?
	        $_POST['emailainscrire'] = strip_tags($_POST['emailainscrire']);
	        $_POST['pseudonyme'] = strip_tags($_POST['pseudonyme']);
			$motdepasse=random_str(6);
	        joueur::ajouter($_POST['emailainscrire'], $_POST['pseudonyme'], $motdepasse);
			$form = false;
			envoimailinscr($_POST['emailainscrire'], $_POST['pseudonyme'], $motdepasse);
         ?>
         <div class="message">Bienvenue <?php echo $_POST['pseudonyme']; ?>, vous êtes enregistré. <br>
		 Un mot de passe provisoire vous a été envoyé sur l'adresse email indiquée (vérifiez vos spams au cas où il n'apparaitrait pas).<br>
		 Votre inscription ne deviendra valide qu'à la première connexion. <br></div>
         <?php
        }
	    else
	    {
	      //Sinon, on dit que le pseudo n'est pas valide
	      $form = true;
	      $message = 'Le pseudonyme que vous avez choisi n\'est pas valide ou existe déjà.';
		  $_POST['pseudonyme']='';
		}
	}
	else
	{
	   //Sinon, on dit que l'email n'est pas valide
	   $form = true;
	   $message = 'L\'email que vous avez choisi n\'est pas valide ou existe déjà.';
	   $_POST['emailainscrire']='';
	}
}		
else	
{
	$form = true;
}
if($form)
{
	//On affiche le formulaire
//Mais avant, on affiche un message sil y a lieu
if(isset($message))
{
	echo '<div class="message">'.$message.'</div>';
	$message='';
}
else
{
?>
<br>
<?php
}
?>	
<br>
<form method="post" action="verifieinscr.php" name="envoinscription"><br>
  <br>
Email&nbsp;&nbsp; <input size="64" maxlength="64" name="emailainscrire" value=<?php if(isset($_POST['emailainscrire'])){ echo $_POST['emailainscrire'];} ?>><br>
  <br>
Identifiant/Pseudo&nbsp; <input maxlength="32" size="32" name="pseudonyme" value=<?php if(isset($_POST['pseudonyme'])){ echo $_POST['pseudonyme'];} ?>> 
au moins 6 caractères et alphanumériques uniquement.
<br>
  <br>
  <br>
  <span style="text-decoration: underline;"></span><input name="envoyer" value="Envoyer" type="submit">
</form>
<?php
}
include_once 'html/end.php';
?>
