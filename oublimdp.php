<?php

include_once 'fonction/fonctions.php';
include_once 'menu.php';
?>
<div>
Mot de passe oublié : deux étapes.<br>
1) Un lien à activer (ou à copier dans un navigateur) qui vous sera envoyé sur votre adresse email<br>
&nbsp;&nbsp;&nbsp;dès que vous aurez rempli le champ email et cliqué sur Envoyer.<br>
2) Dès que vous avez activé le lien, un autre mail vous parviendra avec votre nouveau mot de passe<br>
&nbsp;&nbsp;&nbsp;(recommandation : le modifier dès que possible).
</div>
<br>
<?php
if (isset($_POST['email']))
{
	
	$jou = joueur::joueur_by_mail($email);
	//On verifie si l'email est dans la base auquel cas on y ajoute un code sur la colonne Codeoublimdp, 
	// et aussi envoyé par email, associé au pseudo
	if (!(PasDejaDansLaBase('Email',$_POST['email'])))
	{
	    $lienvalidation = sha1(random_str(10));
		InsererCode($_POST['email'], $lienvalidation);
		$pseudo = $jou->get_Pseudo();
		EnvoiMailLienValidation($_POST['email'], $pseudo, $lienvalidation);
		$form = false;
        ?>
        <div class="message">Email avec code de validation envoyé.<br></div>
		<!--<meta http-equiv="refresh" content="30;URL=index.php" />-->
        <?php
    }
	else
	{
	    //Sinon, on dit que l'email n'est pas dans la base
	    $form = true;
	    $message = 'L\'email que vous avez choisi n\'est pas inscrit, il n\'y a donc pas lieu de réaliser la procédure d\'oubli de mot de passe.';
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
<form method="post" action="oublimdp.php" name="envoinscription"><br>
  <br>
Email&nbsp;&nbsp; <input size="64" maxlength="64" name="email"><br>
  <br>
  <span style="text-decoration: underline;"></span><input name="envoyer" value="Envoyer" type="submit">
</form>
<?php
}
include_once 'html/end.php';
?>
