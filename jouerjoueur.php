<?php
include_once 'path.php';
include_once ROOT.'fonction/fonctions.php';
include_once ROOT."class/strategie_class.php";
include_once ROOT."class/partieencours_class.php";

if (! joueur::connected ()) {
	echo "vous devez être connecté pour accéder à cette page";
} else {
	
	$jou = joueur::joueur_by_session();
    $partie = new partieencours($_GET['num']);
    
    if($jou->get_id()===$partie->get_joueur(1))
    {
    $adv = new joueur($partie->get_joueur(2));
    }
    else 
    {
    $adv = new joueur($partie->get_joueur(1));
    }
    
    if($adv->is_strat())
    {
    	$strat = strategie::strat_by_id_joueur($adv->get_id());
    	$coupstrat = $strat->jouer($jou->get_id());
    	$partie->set_coup(2, $coupstrat);
    	
    	
    }
//    echo "Vous allez jouer contre:" . $adv->get_Pseudo() . "<br>";
    
    if($adv->is_strat())
    {
  //  echo '<table border=1 cellspacing=0 cellpadding=5><td>'.$strat->get_desc().'</td></table>';
    }
 /*   
    echo "<br> Statistiques générales de ce joueur : <br>";
    historique($jou->get_id(),$adv->get_id());
		
		echo '<form id="coup">
<input type="button" name="strat" value="coop" onclick="coop()">
<input type="button" name="strat" value="trahir" onclick="trahir()">
</form>';
	*/	
		
}

?>


<script>
function coop() {
	var xhr = new XMLHttpRequest();
	xhr.open('GET', 'coup.php?coup=coop'); 
	xhr.send(null);

	var coup = document.getElementById('buttonu10026');
	coup.parentNode.removeChild(coup);
	var coup = document.getElementById('buttonu10052');
	coup.parentNode.removeChild(coup);
	
}
function trahir() {
	var xhr = new XMLHttpRequest();
	xhr.open('GET', 'coup.php?coup=trahir'); 
	xhr.send(null);
	var coup = document.getElementById('buttonu10026');
	coup.parentNode.removeChild(coup);
	var coup = document.getElementById('buttonu10052');
	coup.parentNode.removeChild(coup);
}

function decremete() {
	var div = document.getElementById('timer');
	if(tempsrestant > 0)
	{
	div.innerHTML = 'Coup automatique dans '+tempsrestant+' sec';
	tempsrestant = tempsrestant - 1;
	}
}


var tempsrestant=10;
setInterval(decremete,1000);

</script>
<!-- <div id=timer> <br> </div>
	-->	
		    
<script>
		    
var xhr = new XMLHttpRequest();
setInterval(function(){ xhr.open('GET', 'Checkcoupadv.php'); xhr.send(null); }, 3000);


			    
			    
xhr.addEventListener('readystatechange', function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
    	  var div = document.getElementById('test');
           
           
            var joueur = xhr.responseXML.getElementsByTagName('joueur');
            joueur = joueur[0].childNodes[0].nodeValue;
            var adv = xhr.responseXML.getElementsByTagName('adv');
            adv = adv[0].childNodes[0].nodeValue;
            if(adv == 'non' && joueur == 'non' )
            {
            div.innerHTML = 'personne n\'a joué';
            }
            if(adv == 'oui' && joueur == 'non' )
            {
            div.innerHTML = 'votre adversaire a joué';
            }
            if(adv == 'non' && joueur == 'oui' )
            {
            div.innerHTML = 'attente du coup de l\'adversaire';
            }
            if(adv == 'oui' && joueur == 'oui' )
            {
            div.innerHTML = 'tout le monde à joué, redirection vers le resultat';

            var cmd = "window.location='resultat.php?num=<?php echo($_GET['num'])?>'";
            setTimeout(cmd,1000);
            
            }  
		
    }
});
		    
</script>

    
    
<!DOCTYPE html>
<html class="nojs html css_verticalspacer" lang="fr-FR">
 <head>

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="2018.0.0.379"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  
  <script type="text/javascript">
   // Update the 'nojs'/'js' class on the html node
document.documentElement.className = document.documentElement.className.replace(/\bnojs\b/g, 'js');

// Check that all required assets are uploaded and up-to-date
if(typeof Muse == "undefined") window.Muse = {}; window.Muse.assets = {"required":["museutils.js", "museconfig.js", "jquery.museresponsive.js", "require.js", "jquery.watch.js", "pg_cooptrahi.css"], "outOfDate":[]};
</script>
  
  <title>pg_coop/trahi</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?crc=444006867"/>
  <link rel="stylesheet" type="text/css" href="css/master_menu.css?crc=4086283001"/>
  <link rel="stylesheet" type="text/css" href="css/pg_cooptrahi.css?crc=4243299258" id="pagesheet"/>
  <!-- IE-only CSS -->
  <!--[if lt IE 9]>
  <link rel="stylesheet" type="text/css" href="css/nomq_preview_master_menu.css?crc=306763763"/>
  <link rel="stylesheet" type="text/css" href="css/nomq_pg_cooptrahi.css?crc=476137871" id="nomq_pagesheet"/>
  <![endif]-->
  <!-- JS includes -->
  <script src="https://use.typekit.net/ik/dBOneuu1umiLIcrVqKG0cy2tSsFL_f0nQIGmq30N0Awfen9gfO_jC3IPH2JoF2b3FR4LwQZc5Q4RF26u5QjU5AwuZQIt5QiR528cZcZcjDg8ZR6-PKG0Ze8CZAulZAsuSY4TShN0dc88SKocSKUq-AU8dAu8ZYm3Sc8Ddho0-AmkOcZkOYiaikoq-AU8dAu8ZYm3Sc8Ddho0-AmkOcZkJ6TliWF8dkuDdeBKH6qJE6vbMg6gJMJ7fbRC2UMMeMw6MKG4fVMVIMMjgkMfP6sFiWF8qMYB0dDbgb.js" type="text/javascript"></script>
  <!-- Other scripts -->
  <script type="text/javascript">
   try {Typekit.load();} catch(e) {}
</script>
   </head>
 <body>

  <div class="breakpoint active" id="bp_infinity" data-min-width="801"><!-- responsive breakpoint node -->
   <div class="clearfix borderbox" id="page"><!-- column -->
    <div class="clip_frame colelem" id="u9565"><!-- image -->
     <img class="block temp_no_img_src" id="u9565_img" data-orig-src="images/titre-pt.png?crc=360484984" alt="" data-heightwidthratio="0.08333333333333333" data-image-width="480" data-image-height="40" src="images/blank.gif?crc=4208392903"/>
    </div>
    <div class="clearfix colelem shared_content" id="ppu9574" data-content-guid="ppu9574_content"><!-- group -->
     <div class="grpelem" id="u9574"><!-- state-based BG images -->
      <div class="fluid_height_spacer"></div>
     </div>
     <a class="nonblock nontext grpelem" id="u9570" href="classement.php"><!-- state-based BG images --><div class="fluid_height_spacer"></div></a>
     <a class="nonblock nontext grpelem" id="u9576" href="profil.php"><!-- state-based BG images --><div class="fluid_height_spacer"></div></a>
     <a class="nonblock nontext grpelem" id="u9572" href="deconnexion.php"><!-- state-based BG images --><div class="fluid_height_spacer"></div></a>
    </div>
    <div class="clearfix colelem shared_content" id="u9729-7" data-muse-temp-textContainer-sizePolicy="true" data-muse-temp-textContainer-pinning="true" data-content-guid="u9729-7_content"><!-- content -->
     <p id="u9729-5">Vous êtes <a class="nonblock" href="profil.php"> <?php if( joueur::connected()) {echo $jou->get_Pseudo();} ?> </a> parmi <?php echo joueur::get_atifs(); ?> joueur.se.s connecté.e.s</p>
    		<div id=test> Personne n'a joué</div>
    </div>
    <div class="clearfix colelem shared_content" id="u10011-5" data-muse-temp-textContainer-sizePolicy="true" data-muse-temp-textContainer-pinning="true" data-content-guid="u10011-5_content"><!-- content -->
     <p><span id="u10011">Vous allez jouer contre :</span> <?php echo $adv->get_Pseudo(); ?></p>
    </div>
    <div class="clearfix colelem shared_content" id="pu10020-4" data-content-guid="pu10020-4_content"><!-- group -->
     <div class="clearfix grpelem" id="u10020-4" data-muse-temp-textContainer-sizePolicy="true" data-muse-temp-textContainer-pinning="true"><!-- content -->
      <p>Historique récent de nomjoueur :</p>
      <?php  historique_muse($jou->get_id(),$adv->get_id(),1); ?>
     </div>
     <div class="clearfix grpelem" id="u10023-4" data-muse-temp-textContainer-sizePolicy="true" data-muse-temp-textContainer-pinning="true"><!-- content -->
      <p>Historique des rencontres avec nomjoueur</p>
      <?php  historique_muse($jou->get_id(),$adv->get_id(),2); ?>
     </div>
     
    </div>
   
    <div class="clearfix colelem shared_content" id="pbuttonu10026" data-content-guid="pbuttonu10026_content"><!-- group -->
     <?php  echo $adv->get_stat(); ?>
     <div class="Button rounded-corners shadow clearfix grpelem" id="buttonu10026" data-visibility="changed" style="visibility:hidden"><!-- container box -->
     <div onclick="coop()">
      <div class="clearfix grpelem" id="u10027-4" data-muse-temp-textContainer-sizePolicy="true" data-muse-temp-textContainer-pinning="true"><!-- content -->
       <p>Coopérer</p>
      </div>
      </div>
     </div>
     <div onclick="trahir()">
     <div class="Button rounded-corners shadow clearfix grpelem" id="buttonu10052" data-visibility="changed" style="visibility:hidden"><!-- container box -->
      <div class="clearfix grpelem" id="u10053-4" data-muse-temp-textContainer-sizePolicy="true" data-muse-temp-textContainer-pinning="true"><!-- content -->
       <p>Trahir</p>
      </div>
      </div>
     </div>
    </div>
   </div>
   <div class="preload_images">
    <img class="preload temp_no_img_src" data-orig-src="images/u9574-r.png?crc=3834161280" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u9570-r.png?crc=315377294" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u9570-a.png?crc=103097063" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u9576-r.png?crc=414609562" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u9576-a.png?crc=448860413" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u9572-r.png?crc=311378454" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u9572-a.png?crc=174751411" alt="" src="images/blank.gif?crc=4208392903"/>
   </div>
  </div>
  <div class="breakpoint" id="bp_800" data-min-width="481" data-max-width="800"><!-- responsive breakpoint node -->
   <div class="clearfix borderbox temp_no_id" data-orig-id="page"><!-- group -->
    <div class="clearfix grpelem" id="pu9565"><!-- column -->
     <div class="clip_frame colelem temp_no_id" data-orig-id="u9565"><!-- image -->
      <img class="block temp_no_id temp_no_img_src" data-orig-src="images/titre-pt.png?crc=360484984" alt="" data-heightwidthratio="0.085" data-image-width="400" data-image-height="34" data-orig-id="u9565_img" src="images/blank.gif?crc=4208392903"/>
     </div>
     <span class="clearfix colelem placeholder" data-placeholder-for="ppu9574_content"><!-- placeholder node --></span>
     <span class="clearfix colelem placeholder" data-placeholder-for="u9729-7_content"><!-- placeholder node --></span>
     <span class="clearfix colelem placeholder" data-placeholder-for="u10011-5_content"><!-- placeholder node --></span>
     <span class="clearfix colelem placeholder" data-placeholder-for="pu10020-4_content"><!-- placeholder node --></span>
     <span class="clearfix colelem placeholder" data-placeholder-for="pbuttonu10026_content"><!-- placeholder node --></span>
    </div>
    <span class="nonblock nontext clearfix grpelem placeholder" data-placeholder-for="u9567-4_content"><!-- placeholder node --></span>
   </div>
   <div class="preload_images">
    <img class="preload temp_no_img_src" data-orig-src="images/u9574-r.png?crc=3834161280" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u9570-r.png?crc=315377294" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u9570-a.png?crc=103097063" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u9576-r.png?crc=414609562" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u9576-a.png?crc=448860413" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u9572-r.png?crc=311378454" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u9572-a.png?crc=174751411" alt="" src="images/blank.gif?crc=4208392903"/>
   </div>
  </div>
  <div class="breakpoint" id="bp_480" data-min-width="321" data-max-width="480"><!-- responsive breakpoint node -->
   <div class="clearfix borderbox temp_no_id" data-orig-id="page"><!-- group -->
    <div class="clearfix grpelem temp_no_id" data-orig-id="pu9565"><!-- column -->
     <div class="clip_frame colelem temp_no_id" data-orig-id="u9565"><!-- image -->
      <img class="block temp_no_id temp_no_img_src" data-orig-src="images/titre-pt.png?crc=360484984" alt="" data-heightwidthratio="0.08311688311688312" data-image-width="385" data-image-height="32" data-orig-id="u9565_img" src="images/blank.gif?crc=4208392903"/>
     </div>
     <span class="clearfix colelem placeholder" data-placeholder-for="ppu9574_content"><!-- placeholder node --></span>
     <span class="clearfix colelem placeholder" data-placeholder-for="u9729-7_content"><!-- placeholder node --></span>
     <span class="clearfix colelem placeholder" data-placeholder-for="u10011-5_content"><!-- placeholder node --></span>
     <span class="clearfix colelem placeholder" data-placeholder-for="pu10020-4_content"><!-- placeholder node --></span>
     <span class="clearfix colelem placeholder" data-placeholder-for="pbuttonu10026_content"><!-- placeholder node --></span>
    </div>
    <div class="verticalspacer" data-offset-top="355" data-content-above-spacer="354" data-content-below-spacer="62" data-sizePolicy="fixed" data-pintopage="page_fixedLeft"></div>
    <div class="clearfix grpelem temp_no_id" data-orig-id="pu9568"><!-- column -->
     <span class="nonblock nontext clearfix colelem placeholder" data-placeholder-for="u9567-4_content"><!-- placeholder node --></span>
    </div>
   </div>
   <div class="preload_images">
    <img class="preload temp_no_img_src" data-orig-src="images/u9574-r.png?crc=3834161280" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u9570-r.png?crc=315377294" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u9570-a.png?crc=103097063" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u9576-r.png?crc=414609562" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u9576-a.png?crc=448860413" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u9572-r.png?crc=311378454" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u9572-a.png?crc=174751411" alt="" src="images/blank.gif?crc=4208392903"/>
   </div>
  </div>
  <div class="breakpoint" id="bp_320" data-max-width="320"><!-- responsive breakpoint node -->
   <div class="clearfix borderbox temp_no_id" data-orig-id="page"><!-- column -->
    <div class="clip_frame colelem temp_no_id" data-orig-id="u9565"><!-- image -->
     <img class="block temp_no_id temp_no_img_src" data-orig-src="images/titre-pt.png?crc=360484984" alt="" data-heightwidthratio="0.08424908424908426" data-image-width="273" data-image-height="23" data-orig-id="u9565_img" src="images/blank.gif?crc=4208392903"/>
    </div>
    <span class="clearfix colelem placeholder" data-placeholder-for="ppu9574_content"><!-- placeholder node --></span>
    <span class="clearfix colelem placeholder" data-placeholder-for="u9729-7_content"><!-- placeholder node --></span>
    <span class="clearfix colelem placeholder" data-placeholder-for="u10011-5_content"><!-- placeholder node --></span>
    <span class="clearfix colelem placeholder" data-placeholder-for="pu10020-4_content"><!-- placeholder node --></span>
    <span class="clearfix colelem placeholder" data-placeholder-for="pbuttonu10026_content"><!-- placeholder node --></span>
    <span class="nonblock nontext clearfix colelem placeholder" data-placeholder-for="u9567-4_content"><!-- placeholder node --></span>
   </div>
   <div class="preload_images">
    <img class="preload temp_no_img_src" data-orig-src="images/u9574-r.png?crc=3834161280" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u9570-r.png?crc=315377294" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u9570-a.png?crc=103097063" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u9576-r.png?crc=414609562" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u9576-a.png?crc=448860413" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u9572-r.png?crc=311378454" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u9572-a.png?crc=174751411" alt="" src="images/blank.gif?crc=4208392903"/>
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
var muse_init=function(){require.config({baseUrl:""});require(["jquery","museutils","whatinput","jquery.watch","jquery.museresponsive"],function(d){var $ = d;$(document).ready(function(){try{
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
    