<?php
include_once 'path.php';
include_once ROOT.'fonction/fonctions.php';

if(!joueur::connected())
{
echo "vous devez être connecter pour accéder à cette page";
}
else
{
$jou = joueur::joueur_by_session();
$date1 = new DateTime($jou->get_last_change());
$date2 = new DateTime(date("Y-m-d H:i:s"));
$interval = $date2->diff($date1);

$fichier = 'config/conf.ini';

if(file_exists($fichier)) {
	$config = parse_ini_file($fichier, true);
	
	$limite = $config['pseudo']['limite'];
}

$message = "";
//if( $interval->format('%a') < $limite)
if(FALSE)
{
	$message = "Uniquement un changement tout les ".$limite." jours <br> Vous pourrez de nouveau le changer dans ".($limite - $interval->format('%a'))." jours";
}
else
{

if (isset($_POST['pseudonyme'], $_POST['motdepasse']) )
{
	//On sécurise les données rentrées (il y a peut-être plus à faire que juste strip_tags)
	$_POST['pseudonyme'] = strip_tags($_POST['pseudonyme']);
	$_POST['motdepasse'] = strip_tags($_POST['motdepasse']);

	if (verifiepseudo($_POST['pseudonyme']))
		//il faut que le nouveau pseudonyme corresponde au format correct et n'existe pas déjà
	{ 
		if ($jou->verif_mdp($_POST['motdepasse']) || $jou->is_eprel())
				//vérification que c'est le bon mot de passe
				//il faut sans doute limiter le nombre de mot de passe incorrects d'affilé pour un même email, 
				//pour éviter les tentatives de hackage.
				// Il doit falloir mettre un indicateur dans la base, mais il faut en discuter. 
				//Peut-être une limite de temps suffit-elle.
			{
				$jou->change_pseudo($_POST['pseudonyme']);
				//changepseudo($_POST['pseudonyme'],$_SESSION['mail']);
				
				$message = "Modification réussie : votre nouveau pseudonyme est ".$_POST['pseudonyme']; 
				
				$form = false;
			}
			else
			{
				//Sinon, on dit que le mot de passe n'est pas valide
				$form = true;
				$message = 'Le mot de passe n\'est pas correct.';
				$_POST['motdepasse']='';
			}

	}
    else
	{
		//Sinon, on dit que le pseudonyme n'est pas valide
		$form = true;
		$message = 'Votre nouveau pseudonyme n\'est pas valide ou il existe déjà.';
		$_POST['pseudonyme']='';
	}
}		
else	
{
	$form = true;
}
if(TRUE)
{
	//On affiche le formulaire
//Mais avant, on affiche un message sil y a lieu

$message = $message.'<form method="post" action="modifpseudo.php" name="modifpseudo"><br>
  <br>
Nouvel Identifiant/Pseudo&nbsp; <input maxlength="32" size="32" name="pseudonyme">

au moins 6 caractères et alphanumériques uniquement.
<br>
<br>
Mot de passe&nbsp; <input maxlength="20" size="20" name="motdepasse" type="password"> 
<br>
  <br>
  <br>
  <span style="text-decoration: underline;"></span><input name="envoyer" value="Envoyer" type="submit">
</form>';

}
}
}

?>


<!DOCTYPE html>
<html class="nojs html" lang="fr-FR">
 <head>

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="2018.0.0.379"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  
  <script type="text/javascript">
   // Update the 'nojs'/'js' class on the html node
document.documentElement.className = document.documentElement.className.replace(/\bnojs\b/g, 'js');

// Check that all required assets are uploaded and up-to-date
if(typeof Muse == "undefined") window.Muse = {}; window.Muse.assets = {"required":["museutils.js", "museconfig.js", "jquery.museresponsive.js", "require.js", "pg_connexion_ok.css"], "outOfDate":[]};
</script>
  
  <title>Pg_connexion_ok</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?crc=444006867"/>
  <link rel="stylesheet" type="text/css" href="css/master_fond-clair-vide.css?crc=333224682"/>
  <link rel="stylesheet" type="text/css" href="css/pg_connexion_ok.css?crc=4151481478" id="pagesheet"/>
  <!-- IE-only CSS -->
  <!--[if lt IE 9]>
  <link rel="stylesheet" type="text/css" href="css/nomq_preview_master_fond-clair-vide.css?crc=3824530138"/>
  <link rel="stylesheet" type="text/css" href="css/nomq_pg_connexion_ok.css?crc=4056317937" id="nomq_pagesheet"/>
  <![endif]-->
   </head>
 <body>

  <div class="breakpoint active" id="bp_infinity" data-min-width="801"><!-- responsive breakpoint node -->
   <div class="clearfix borderbox" id="page"><!-- column -->
    <div class="clip_frame colelem" id="u1670"><!-- image -->
    <a href="index.php">
     <img class="block temp_no_img_src" id="u1670_img" data-orig-src="images/titre-pt.png?crc=360484984" alt="" data-heightwidthratio="0.08333333333333333" data-image-width="480" data-image-height="40" src="images/blank.gif?crc=4208392903"/>
    </a>
    <?php echo "<br><br>".$message ; ?>
    </div>


    <div class="clearfix colelem" id="pu1672"><!-- group -->
     <a class="nonblock nontext clip_frame grpelem" id="u1672" href="http://www.u-pec.fr/"><!-- image --><img class="block temp_no_img_src" id="u1672_img" data-orig-src="images/upec_cmjn185.png?crc=449675334" alt="" data-heightwidthratio="0.42162162162162165" data-image-width="185" data-image-height="78" src="images/blank.gif?crc=4208392903"/></a>
     <a class="nonblock nontext clearfix grpelem shared_content" id="u1674-4" href="licence-et-cr%c3%a9dits.html" data-muse-temp-textContainer-sizePolicy="true" data-muse-temp-textContainer-pinning="true" data-content-guid="u1674-4_content"><!-- content --><p>Licence et crédits</p></a>
    </div>
   </div>
  </div>
  <div class="breakpoint" id="bp_800" data-min-width="481" data-max-width="800"><!-- responsive breakpoint node -->
   <div class="clearfix borderbox temp_no_id" data-orig-id="page"><!-- column -->
    <div class="clip_frame colelem temp_no_id" data-orig-id="u1670"><!-- image -->
    <a href="index.php" >
     <img class="block temp_no_id temp_no_img_src" data-orig-src="images/titre-pt.png?crc=360484984" alt="" data-heightwidthratio="0.085" data-image-width="400" data-image-height="34" data-orig-id="u1670_img" src="images/blank.gif?crc=4208392903"/>
   </a>
   <?php echo "<br><br>".$message ; ?>
    </div>

    <div class="clearfix colelem temp_no_id" data-orig-id="pu1672"><!-- group -->
     <a class="nonblock nontext clip_frame grpelem temp_no_id" href="http://www.u-pec.fr/" data-orig-id="u1672"><!-- image --><img class="block temp_no_id temp_no_img_src" data-orig-src="images/upec_cmjn185.png?crc=449675334" alt="" data-heightwidthratio="0.42207792207792205" data-image-width="154" data-image-height="65" data-orig-id="u1672_img" src="images/blank.gif?crc=4208392903"/></a>
     <span class="nonblock nontext clearfix grpelem placeholder" data-placeholder-for="u1674-4_content"><!-- placeholder node --></span>
    </div>
   </div>
  </div>
  <div class="breakpoint" id="bp_480" data-min-width="321" data-max-width="480"><!-- responsive breakpoint node -->
   <div class="clearfix borderbox temp_no_id" data-orig-id="page"><!-- column -->
    <div class="clip_frame colelem temp_no_id" data-orig-id="u1670"><!-- image -->
        <a href="index.php" >
     <img class="block temp_no_id temp_no_img_src" data-orig-src="images/titre-pt.png?crc=360484984" alt="" data-heightwidthratio="0.08311688311688312" data-image-width="385" data-image-height="32" data-orig-id="u1670_img" src="images/blank.gif?crc=4208392903"/>
</a>
<?php echo "<br><br>".$message ; ?>
    </div>

    <a class="nonblock nontext clip_frame colelem temp_no_id" href="http://www.u-pec.fr/" data-orig-id="u1672"><!-- image --><img class="block temp_no_id temp_no_img_src" data-orig-src="images/upec_cmjn185.png?crc=449675334" alt="" data-heightwidthratio="0.4225352112676056" data-image-width="142" data-image-height="60" data-orig-id="u1672_img" src="images/blank.gif?crc=4208392903"/></a>
    <span class="nonblock nontext clearfix colelem placeholder" data-placeholder-for="u1674-4_content"><!-- placeholder node --></span>
   </div>
  </div>
  <div class="breakpoint" id="bp_320" data-max-width="320"><!-- responsive breakpoint node -->
   <div class="clearfix borderbox temp_no_id" data-orig-id="page"><!-- column -->
    <div class="clip_frame colelem temp_no_id" data-orig-id="u1670"><!-- image -->
        <a href="index.php" >
     <img class="block temp_no_id temp_no_img_src" data-orig-src="images/titre-pt.png?crc=360484984" alt="" data-heightwidthratio="0.08424908424908426" data-image-width="273" data-image-height="23" data-orig-id="u1670_img" src="images/blank.gif?crc=4208392903"/>
    </a>
    <?php echo "<br><br>".$message ; ?>
    </div>
    <a class="nonblock nontext clip_frame colelem temp_no_id" href="http://www.u-pec.fr/" data-orig-id="u1672"><!-- image --><img class="block temp_no_id temp_no_img_src" data-orig-src="images/upec_cmjn185.png?crc=449675334" alt="" data-heightwidthratio="0.42105263157894735" data-image-width="95" data-image-height="40" data-orig-id="u1672_img" src="images/blank.gif?crc=4208392903"/></a>
    <span class="nonblock nontext clearfix colelem placeholder" data-placeholder-for="u1674-4_content"><!-- placeholder node --></span>
   </div>
  </div>
  <!-- Other scripts -->
  <script type="text/javascript">
   // Decide weather to suppress missing file error or not based on preference setting
var suppressMissingFileError = false
</script>
  <script type="text/javascript">
   window.Muse.assets.check=function(d){if(!window.Muse.assets.checked){window.Muse.assets.checked=!0;var b={},c=function(a,b){if(window.getComputedStyle){var c=window.getComputedStyle(a,null);return c&&c.getPropertyValue(b)||c&&c[b]||""}if(document.documentElement.currentStyle)return(c=a.currentStyle)&&c[b]||a.style&&a.style[b]||"";return""},a=function(a){if(a.match(/^rgb/))return a=a.replace(/\s+/g,"").match(/([\d\,]+)/gi)[0].split(","),(parseInt(a[0])<<16)+(parseInt(a[1])<<8)+parseInt(a[2]);if(a.match(/^\#/))return parseInt(a.substr(1),
16);return 0},g=function(g){for(var f=document.getElementsByTagName("link"),h=0;h<f.length;h++)if("text/css"==f[h].type){var i=(f[h].href||"").match(/\/?css\/([\w\-]+\.css)\?crc=(\d+)/);if(!i||!i[1]||!i[2])break;b[i[1]]=i[2]}f=document.createElement("div");f.className="version";f.style.cssText="display:none; width:1px; height:1px;";document.getElementsByTagName("body")[0].appendChild(f);for(h=0;h<Muse.assets.required.length;){var i=Muse.assets.required[h],l=i.match(/([\w\-\.]+)\.(\w+)$/),k=l&&l[1]?
l[1]:null,l=l&&l[2]?l[2]:null;switch(l.toLowerCase()){case "css":k=k.replace(/\W/gi,"_").replace(/^([^a-z])/gi,"_$1");f.className+=" "+k;k=a(c(f,"color"));l=a(c(f,"backgroundColor"));k!=0||l!=0?(Muse.assets.required.splice(h,1),"undefined"!=typeof b[i]&&(k!=b[i]>>>24||l!=(b[i]&16777215))&&Muse.assets.outOfDate.push(i)):h++;f.className="version";break;case "js":h++;break;default:throw Error("Unsupported file type: "+l);}}d?d().jquery!="1.8.3"&&Muse.assets.outOfDate.push("jquery-1.8.3.min.js"):Muse.assets.required.push("jquery-1.8.3.min.js");
f.parentNode.removeChild(f);if(Muse.assets.outOfDate.length||Muse.assets.required.length)f="Certains fichiers sur le serveur sont peut-être manquants ou incorrects. Videz le cache du navigateur et réessayez. Si le problème persiste, contactez le créateur du site.",g&&Muse.assets.outOfDate.length&&(f+="\nOut of date: "+Muse.assets.outOfDate.join(",")),g&&Muse.assets.required.length&&(f+="\nMissing: "+Muse.assets.required.join(",")),suppressMissingFileError?(f+="\nUse SuppressMissingFileError key in AppPrefs.xml to show missing file error pop up.",console.log(f)):alert(f)};location&&location.search&&location.search.match&&location.search.match(/muse_debug/gi)?
setTimeout(function(){g(!0)},5E3):g()}};
var muse_init=function(){require.config({baseUrl:""});require(["jquery","museutils","whatinput","jquery.museresponsive"],function(d){var $ = d;$(document).ready(function(){try{
window.Muse.assets.check($);/* body */
Muse.Utils.transformMarkupToFixBrowserProblemsPreInit();/* body */
Muse.Utils.prepHyperlinks(true);/* body */
Muse.Utils.makeButtonsVisibleAfterSettingMinWidth();/* body */
$( '.breakpoint' ).registerBreakpoint();/* Register breakpoints */
Muse.Utils.transformMarkupToFixBrowserProblems();/* body */
}catch(b){if(b&&"function"==typeof b.notify?b.notify():Muse.Assert.fail("Error calling selector function: "+b),false)throw b;}})})};

</script>
  <!-- RequireJS script -->
  <script src="scripts/require.js?crc=4157109226" type="text/javascript" async data-main="scripts/museconfig.js?crc=380897831" onload="if (requirejs) requirejs.onError = function(requireType, requireModule) { if (requireType && requireType.toString && requireType.toString().indexOf && 0 <= requireType.toString().indexOf('#scripterror')) window.Muse.assets.check(); }" onerror="window.Muse.assets.check();"></script>
   </body>
</html>
