<?php
include_once 'path.php';


if(!joueur::connected())
{
	echo "vous devez être connecter pour accéder à cette page";
}
else 
{
	
	
	if(!isset($_GET['inf'],$_GET['sup']))
	{
		
	
		?>
		
		
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
if(typeof Muse == "undefined") window.Muse = {}; window.Muse.assets = {"required":["museutils.js", "museconfig.js", "jquery.museresponsive.js", "require.js", "jquery.watch.js", "pg_classement.css"], "outOfDate":[]};
</script>
  
  <title>pg_classement</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?crc=444006867"/>
  <link rel="stylesheet" type="text/css" href="css/master_menu-coop_trahir.css?crc=233141915"/>
  <link rel="stylesheet" type="text/css" href="css/master_fond-classement.css?crc=3982831659"/>
  <link rel="stylesheet" type="text/css" href="css/pg_classement.css?crc=4234683852" id="pagesheet"/>
  <!-- IE-only CSS -->
  <!--[if lt IE 9]>
  <link rel="stylesheet" type="text/css" href="css/nomq_preview_master_menu-coop_trahir.css?crc=117916325"/>
  <link rel="stylesheet" type="text/css" href="css/nomq_preview_master_fond-classement.css?crc=3824530138"/>
  <link rel="stylesheet" type="text/css" href="css/nomq_pg_classement.css?crc=4246597258" id="nomq_pagesheet"/>
  <![endif]-->
  <!-- JS includes -->
  <script src="https://use.typekit.net/ik/ZUGplshUn1fHAr338oktxVZ1A07yrBI12SZ_mX75QFGfen9gfO_jC3IPH2JoF2b3FR4L5QJtFRIojRyKZQ6UjQMXZQjDjhIkFR6XZcwuZQ9UFRM-PKG0Ze8CZAulZAsuSY4TShN0dc88SKocSKUq-AU8dAu8ZYm3Sc8Ddho0-AmkOcZkOYiaikoq-AU8dAu8ZYm3Sc8Ddho0-AmkOcZkJ6TliWF8dkuDdeBKH6qJE6vbMg6gJMJ7fbR02UMMeM96MKG4f53VIMMjMkMfP6sFiWF8qMe56vzbgb.js" type="text/javascript"></script>
  <!-- Other scripts -->
  <script type="text/javascript">
   try {Typekit.load();} catch(e) {}
</script>
   </head>
 <body>

  <div class="breakpoint active" id="bp_infinity" data-min-width="801"><!-- responsive breakpoint node -->
   <div class="clearfix borderbox" id="page"><!-- group -->
    <div class="clearfix grpelem" id="pu11238"><!-- column -->
     <div class="clip_frame colelem" id="u11238"><!-- image -->
      <img class="block temp_no_img_src" id="u11238_img" data-orig-src="images/titre-pt.png?crc=360484984" alt="" data-heightwidthratio="0.08333333333333333" data-image-width="480" data-image-height="40" src="images/blank.gif?crc=4208392903"/>
     </div>
     <div class="clearfix colelem shared_content" id="ppu11240" data-content-guid="ppu11240_content"><!-- group -->
      <a class="nonblock nontext grpelem" id="u11240" href="index.php"><!-- state-based BG images --><div class="fluid_height_spacer"></div></a>
      <a class="nonblock nontext MuseLinkActive grpelem" id="u11236" href="classement.php"><!-- state-based BG images --><div class="fluid_height_spacer"></div></a>
      <a class="nonblock nontext grpelem" id="u11247" href="profil.php"><!-- state-based BG images --><div class="fluid_height_spacer"></div></a>
      <a class="nonblock nontext grpelem" id="u11243" href="deconnexion.php"><!-- state-based BG images --><div class="fluid_height_spacer"></div></a>
     </div>
     <div class="clearfix colelem shared_content" id="u11234-7" data-muse-temp-textContainer-sizePolicy="true" data-muse-temp-textContainer-pinning="true" data-content-guid="u11234-7_content"><!-- content -->
<p id="u9729-5">Vous êtes <a class="nonblock" href="profil.php"> <?php if( joueur::connected()) {echo $jou->get_Pseudo();} ?> </a> parmi <?php echo joueur::get_atifs(); ?> joueur.se.s connecté.e.s</p>
     </div>

    
     <div class="Button rounded-corners shadow clearfix colelem shared_content" id="buttonu10966" data-visibility="changed" style="visibility:hidden" data-content-guid="buttonu10966_content"><!-- container box -->
       <a href="classement.php?inf=1&sup=10">
      <div class="clearfix grpelem" id="u10967-6" data-muse-temp-textContainer-sizePolicy="true" data-muse-temp-textContainer-pinning="true"><!-- content -->
       <p id="u10967-2">Classement catégorie 1</p>
       <p id="u10967-4">(10 parties ou moins)</p>
      </div>
      </a>
     </div>
     
     <div class="Button rounded-corners shadow clearfix colelem shared_content" id="buttonu11071" data-visibility="changed" style="visibility:hidden" data-content-guid="buttonu11071_content"><!-- container box -->
      <a href="classement.php?inf=11&sup=100">
      <div class="clearfix grpelem" id="u11072-7" data-muse-temp-textContainer-sizePolicy="true" data-muse-temp-textContainer-pinning="true"><!-- content -->
       <p><span id="u11072">Classement catégorie 2</span></p>
       <p>(entre 11 et 100 parties)</p>
      </div>
       </a>
     </div>
     <div class="Button rounded-corners shadow clearfix colelem shared_content" id="buttonu11092" data-visibility="changed" style="visibility:hidden" data-content-guid="buttonu11092_content"><!-- container box -->
            <a href="classement.php?inf=101&sup=1000">
      <div class="clearfix grpelem" id="u11093-7" data-muse-temp-textContainer-sizePolicy="true" data-muse-temp-textContainer-pinning="true"><!-- content -->
       <p><span id="u11093">Classement catégorie 3</span></p>
       <p>(entre 101 et 1000 parties)</p>
      </div>
      </a>
     </div>
     <div class="Button rounded-corners shadow clearfix colelem shared_content" id="buttonu11113" data-visibility="changed" style="visibility:hidden" data-content-guid="buttonu11113_content"><!-- container box -->
                  <a href="classement.php?inf=101&sup=1000">
      <div class="clearfix grpelem" id="u11114-6" data-muse-temp-textContainer-sizePolicy="true" data-muse-temp-textContainer-pinning="true"><!-- content -->
       <p><span id="u11114">Classement catégorie 4</span></p>
       <p>(plus de 1000 parties)</p>
      </div>
       </a>
     </div>
    </div>
    <div class="verticalspacer" data-offset-top="417" data-content-above-spacer="418" data-content-below-spacer="89" data-sizePolicy="fixed" data-pintopage="page_fixedLeft"></div>
    <a class="nonblock nontext clip_frame grpelem" id="u11352" href="http://www.u-pec.fr/"><!-- image --><img class="block temp_no_img_src" id="u11352_img" data-orig-src="images/upec_cmjn185.png?crc=449675334" alt="" data-heightwidthratio="0.42162162162162165" data-image-width="185" data-image-height="78" src="images/blank.gif?crc=4208392903"/></a>
    <a class="nonblock nontext clearfix grpelem shared_content" id="u11351-4" href="licence-et-cr%c3%a9dits.html" data-muse-temp-textContainer-sizePolicy="true" data-muse-temp-textContainer-pinning="true" data-content-guid="u11351-4_content"><!-- content --><p>Licence et crédits</p></a>
   </div>
   <div class="preload_images">
    <img class="preload temp_no_img_src" data-orig-src="images/u11240-r.png?crc=3834161280" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11240-a.png?crc=425324323" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11236-r.png?crc=315377294" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11236-a.png?crc=103097063" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11247-r.png?crc=414609562" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11247-a.png?crc=448860413" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11243-r.png?crc=311378454" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11243-a.png?crc=174751411" alt="" src="images/blank.gif?crc=4208392903"/>
   </div>
  </div>
  <div class="breakpoint" id="bp_800" data-min-width="481" data-max-width="800"><!-- responsive breakpoint node -->
   <div class="clearfix borderbox temp_no_id" data-orig-id="page"><!-- group -->
    <div class="clearfix grpelem temp_no_id" data-orig-id="pu11238"><!-- column -->
     <div class="clip_frame colelem temp_no_id" data-orig-id="u11238"><!-- image -->
      <img class="block temp_no_id temp_no_img_src" data-orig-src="images/titre-pt.png?crc=360484984" alt="" data-heightwidthratio="0.085" data-image-width="400" data-image-height="34" data-orig-id="u11238_img" src="images/blank.gif?crc=4208392903"/>
     </div>
     <span class="clearfix colelem placeholder" data-placeholder-for="ppu11240_content"><!-- placeholder node --></span>
     <span class="clearfix colelem placeholder" data-placeholder-for="u11234-7_content"><!-- placeholder node --></span>
     <span class="Button rounded-corners shadow clearfix colelem placeholder" data-placeholder-for="buttonu10945_content"><!-- placeholder node --></span>
     <span class="Button rounded-corners shadow clearfix colelem placeholder" data-placeholder-for="buttonu10966_content"><!-- placeholder node --></span>
     <span class="Button rounded-corners shadow clearfix colelem placeholder" data-placeholder-for="buttonu11071_content"><!-- placeholder node --></span>
     <span class="Button rounded-corners shadow clearfix colelem placeholder" data-placeholder-for="buttonu11092_content"><!-- placeholder node --></span>
     <span class="Button rounded-corners shadow clearfix colelem placeholder" data-placeholder-for="buttonu11113_content"><!-- placeholder node --></span>
    </div>
    <div class="verticalspacer shared_content" data-offset-top="417" data-content-above-spacer="418" data-content-below-spacer="62" data-sizePolicy="fixed" data-pintopage="page_fixedLeft" data-content-guid="page_1_content"></div>
    <a class="nonblock nontext clip_frame grpelem temp_no_id" href="http://www.u-pec.fr/" data-orig-id="u11352"><!-- image --><img class="block temp_no_id temp_no_img_src" data-orig-src="images/upec_cmjn185.png?crc=449675334" alt="" data-heightwidthratio="0.42207792207792205" data-image-width="154" data-image-height="65" data-orig-id="u11352_img" src="images/blank.gif?crc=4208392903"/></a>
    <span class="nonblock nontext clearfix grpelem placeholder" data-placeholder-for="u11351-4_content"><!-- placeholder node --></span>
   </div>
   <div class="preload_images">
    <img class="preload temp_no_img_src" data-orig-src="images/u11240-r.png?crc=3834161280" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11240-a.png?crc=425324323" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11236-r.png?crc=315377294" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11236-a.png?crc=103097063" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11247-r.png?crc=414609562" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11247-a.png?crc=448860413" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11243-r.png?crc=311378454" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11243-a.png?crc=174751411" alt="" src="images/blank.gif?crc=4208392903"/>
   </div>
  </div>
  <div class="breakpoint" id="bp_480" data-min-width="321" data-max-width="480"><!-- responsive breakpoint node -->
   <div class="clearfix borderbox temp_no_id" data-orig-id="page"><!-- group -->
    <div class="clearfix grpelem temp_no_id" data-orig-id="pu11238"><!-- column -->
     <div class="clip_frame colelem temp_no_id" data-orig-id="u11238"><!-- image -->
      <img class="block temp_no_id temp_no_img_src" data-orig-src="images/titre-pt.png?crc=360484984" alt="" data-heightwidthratio="0.08311688311688312" data-image-width="385" data-image-height="32" data-orig-id="u11238_img" src="images/blank.gif?crc=4208392903"/>
     </div>
     <span class="clearfix colelem placeholder" data-placeholder-for="ppu11240_content"><!-- placeholder node --></span>
     <span class="clearfix colelem placeholder" data-placeholder-for="u11234-7_content"><!-- placeholder node --></span>
     <span class="Button rounded-corners shadow clearfix colelem placeholder" data-placeholder-for="buttonu10945_content"><!-- placeholder node --></span>
     <span class="Button rounded-corners shadow clearfix colelem placeholder" data-placeholder-for="buttonu10966_content"><!-- placeholder node --></span>
     <span class="Button rounded-corners shadow clearfix colelem placeholder" data-placeholder-for="buttonu11071_content"><!-- placeholder node --></span>
     <span class="Button rounded-corners shadow clearfix colelem placeholder" data-placeholder-for="buttonu11092_content"><!-- placeholder node --></span>
     <span class="Button rounded-corners shadow clearfix colelem placeholder" data-placeholder-for="buttonu11113_content"><!-- placeholder node --></span>
    </div>
    <span class="verticalspacer placeholder" data-placeholder-for="page_1_content"><!-- placeholder node --></span>
    <div class="clearfix grpelem" id="pu11352"><!-- column -->
     <a class="nonblock nontext clip_frame colelem temp_no_id" href="http://www.u-pec.fr/" data-orig-id="u11352"><!-- image --><img class="block temp_no_id temp_no_img_src" data-orig-src="images/upec_cmjn185.png?crc=449675334" alt="" data-heightwidthratio="0.4225352112676056" data-image-width="142" data-image-height="60" data-orig-id="u11352_img" src="images/blank.gif?crc=4208392903"/></a>
     <span class="nonblock nontext clearfix colelem placeholder" data-placeholder-for="u11351-4_content"><!-- placeholder node --></span>
    </div>
   </div>
   <div class="preload_images">
    <img class="preload temp_no_img_src" data-orig-src="images/u11240-r.png?crc=3834161280" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11240-a.png?crc=425324323" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11236-r.png?crc=315377294" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11236-a.png?crc=103097063" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11247-r.png?crc=414609562" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11247-a.png?crc=448860413" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11243-r.png?crc=311378454" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11243-a.png?crc=174751411" alt="" src="images/blank.gif?crc=4208392903"/>
   </div>
  </div>
  <div class="breakpoint" id="bp_320" data-max-width="320"><!-- responsive breakpoint node -->
   <div class="clearfix borderbox temp_no_id" data-orig-id="page"><!-- column -->
    <div class="clip_frame colelem temp_no_id" data-orig-id="u11238"><!-- image -->
     <img class="block temp_no_id temp_no_img_src" data-orig-src="images/titre-pt.png?crc=360484984" alt="" data-heightwidthratio="0.08424908424908426" data-image-width="273" data-image-height="23" data-orig-id="u11238_img" src="images/blank.gif?crc=4208392903"/>
    </div>
    <span class="clearfix colelem placeholder" data-placeholder-for="ppu11240_content"><!-- placeholder node --></span>
    <span class="clearfix colelem placeholder" data-placeholder-for="u11234-7_content"><!-- placeholder node --></span>
    <span class="Button rounded-corners shadow clearfix colelem placeholder" data-placeholder-for="buttonu10945_content"><!-- placeholder node --></span>
    <span class="Button rounded-corners shadow clearfix colelem placeholder" data-placeholder-for="buttonu10966_content"><!-- placeholder node --></span>
    <span class="Button rounded-corners shadow clearfix colelem placeholder" data-placeholder-for="buttonu11071_content"><!-- placeholder node --></span>
    <span class="Button rounded-corners shadow clearfix colelem placeholder" data-placeholder-for="buttonu11092_content"><!-- placeholder node --></span>
    <span class="Button rounded-corners shadow clearfix colelem placeholder" data-placeholder-for="buttonu11113_content"><!-- placeholder node --></span>
    <a class="nonblock nontext clip_frame colelem temp_no_id" href="http://www.u-pec.fr/" data-orig-id="u11352"><!-- image --><img class="block temp_no_id temp_no_img_src" data-orig-src="images/upec_cmjn185.png?crc=449675334" alt="" data-heightwidthratio="0.42105263157894735" data-image-width="95" data-image-height="40" data-orig-id="u11352_img" src="images/blank.gif?crc=4208392903"/></a>
    <span class="nonblock nontext clearfix colelem placeholder" data-placeholder-for="u11351-4_content"><!-- placeholder node --></span>
   </div>
   <div class="preload_images">
    <img class="preload temp_no_img_src" data-orig-src="images/u11240-r.png?crc=3834161280" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11240-a.png?crc=425324323" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11236-r.png?crc=315377294" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11236-a.png?crc=103097063" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11247-r.png?crc=414609562" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11247-a.png?crc=448860413" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11243-r.png?crc=311378454" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11243-a.png?crc=174751411" alt="" src="images/blank.gif?crc=4208392903"/>
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

<?php 
}
else
{
?>

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
if(typeof Muse == "undefined") window.Muse = {}; window.Muse.assets = {"required":["museutils.js", "museconfig.js", "jquery.museresponsive.js", "require.js", "jquery.watch.js", "pg_exple_classement.css"], "outOfDate":[]};
</script>
  
  <title>pg_exple_classement</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?crc=444006867"/>
  <link rel="stylesheet" type="text/css" href="css/master_menu-coop_trahir.css?crc=233141915"/>
  <link rel="stylesheet" type="text/css" href="css/master_fond-classement.css?crc=3982831659"/>
  <link rel="stylesheet" type="text/css" href="css/pg_exple_classement.css?crc=486976774" id="pagesheet"/>
  <!-- IE-only CSS -->
  <!--[if lt IE 9]>
  <link rel="stylesheet" type="text/css" href="css/nomq_preview_master_menu-coop_trahir.css?crc=117916325"/>
  <link rel="stylesheet" type="text/css" href="css/nomq_preview_master_fond-classement.css?crc=3824530138"/>
  <link rel="stylesheet" type="text/css" href="css/nomq_pg_exple_classement.css?crc=292948482" id="nomq_pagesheet"/>
  <![endif]-->
  <!-- JS includes -->
  <script src="https://use.typekit.net/ik/HBpN2PEdm0fHRSQPjczaOI2BfKoy8vqz5IXBcxoUKhGfeTvgfO_jC3IPH2JoF2b3FR4L5QJtFRIojRyKZQ6UjQMXZQjDjhIkFR6XZcwuZQ9UFRM-PKG0Ze8CZAulZAsuSY4TShN0dc88SKocSKUq-AU8dAu8ZYm3Sc8Ddho0-AmkOcZkOYiaikoq-AU8dAu8ZYm3Sc8Ddho0-AmkOcZkJ6TliWF8dkuDdeBKH6qJE6vbMg6gJM4HgIuuShAbMZP2kNMB.js" type="text/javascript"></script>
  <!-- Other scripts -->
  <script type="text/javascript">
   try {Typekit.load();} catch(e) {}
</script>
   </head>
 <body>

  <div class="breakpoint active" id="bp_infinity" data-min-width="801"><!-- responsive breakpoint node -->
   <div class="clearfix borderbox" id="page"><!-- group -->
    <div class="clearfix grpelem" id="pu11238"><!-- column -->
     <div class="clip_frame colelem" id="u11238"><!-- image -->
      <img class="block temp_no_img_src" id="u11238_img" data-orig-src="images/titre-pt.png?crc=360484984" alt="" data-heightwidthratio="0.08333333333333333" data-image-width="480" data-image-height="40" src="images/blank.gif?crc=4208392903"/>
     </div>
     <div class="clearfix colelem shared_content" id="ppu11240" data-content-guid="ppu11240_content"><!-- group -->
      <a class="nonblock nontext grpelem" id="u11240" href="index.php"><!-- state-based BG images --><div class="fluid_height_spacer"></div></a>
      <a class="nonblock nontext grpelem" id="u11236" href="classement.php"><!-- state-based BG images --><div class="fluid_height_spacer"></div></a>
      <a class="nonblock nontext grpelem" id="u11247" href="profil.php"><!-- state-based BG images --><div class="fluid_height_spacer"></div></a>
      <a class="nonblock nontext grpelem" id="u11243" href="deconnexion.php"><!-- state-based BG images --><div class="fluid_height_spacer"></div></a>
     </div>

     <div class="clearfix colelem shared_content" id="u11234-7" data-muse-temp-textContainer-sizePolicy="true" data-muse-temp-textContainer-pinning="true" data-content-guid="u11234-7_content"><!-- content -->
<p id="u9729-5">Vous êtes <a class="nonblock" href="profil.php"> <?php if( joueur::connected()) {echo $jou->get_Pseudo();} ?> </a> parmi <?php echo joueur::get_atifs(); ?> joueur.se.s connecté.e.s</p>
     </div>
          <?php ecrireclassement($_GET['inf'],$_GET['sup']); ?>
    </div>
    
    <div class="verticalspacer" data-offset-top="0" data-content-above-spacer="224" data-content-below-spacer="142" data-sizePolicy="fixed" data-pintopage="page_fixedLeft"></div>
    <a class="nonblock nontext clip_frame grpelem" id="u11352" href="http://www.u-pec.fr/"><!-- image --><img class="block temp_no_img_src" id="u11352_img" data-orig-src="images/upec_cmjn185.png?crc=449675334" alt="" data-heightwidthratio="0.42162162162162165" data-image-width="185" data-image-height="78" src="images/blank.gif?crc=4208392903"/></a>
    <a class="nonblock nontext clearfix grpelem shared_content" id="u11351-4" href="licence-et-cr%c3%a9dits.html" data-muse-temp-textContainer-sizePolicy="true" data-muse-temp-textContainer-pinning="true" data-content-guid="u11351-4_content"><!-- content --><p>Licence et crédits</p></a>
   </div>
   
   <div class="preload_images">
    <img class="preload temp_no_img_src" data-orig-src="images/u11240-r.png?crc=3834161280" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11240-a.png?crc=425324323" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11236-r.png?crc=315377294" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11236-a.png?crc=103097063" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11247-r.png?crc=414609562" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11247-a.png?crc=448860413" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11243-r.png?crc=311378454" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11243-a.png?crc=174751411" alt="" src="images/blank.gif?crc=4208392903"/>
   </div>
  </div>
  <div class="breakpoint" id="bp_800" data-min-width="481" data-max-width="800"><!-- responsive breakpoint node -->
   <div class="clearfix borderbox temp_no_id" data-orig-id="page"><!-- group -->
    <div class="clearfix grpelem temp_no_id" data-orig-id="pu11238"><!-- column -->
     <div class="clip_frame colelem temp_no_id" data-orig-id="u11238"><!-- image -->
      <img class="block temp_no_id temp_no_img_src" data-orig-src="images/titre-pt.png?crc=360484984" alt="" data-heightwidthratio="0.085" data-image-width="400" data-image-height="34" data-orig-id="u11238_img" src="images/blank.gif?crc=4208392903"/>
     </div>
     <span class="clearfix colelem placeholder" data-placeholder-for="ppu11240_content"><!-- placeholder node --></span>
     <span class="clearfix colelem placeholder" data-placeholder-for="u11234-7_content"><!-- placeholder node --></span>
    </div>
    <div class="verticalspacer" data-offset-top="0" data-content-above-spacer="202" data-content-below-spacer="62" data-sizePolicy="fixed" data-pintopage="page_fixedLeft"></div>
    <a class="nonblock nontext clip_frame grpelem temp_no_id" href="http://www.u-pec.fr/" data-orig-id="u11352"><!-- image --><img class="block temp_no_id temp_no_img_src" data-orig-src="images/upec_cmjn185.png?crc=449675334" alt="" data-heightwidthratio="0.42207792207792205" data-image-width="154" data-image-height="65" data-orig-id="u11352_img" src="images/blank.gif?crc=4208392903"/></a>
    <span class="nonblock nontext clearfix grpelem placeholder" data-placeholder-for="u11351-4_content"><!-- placeholder node --></span>
   </div>
   <div class="preload_images">
    <img class="preload temp_no_img_src" data-orig-src="images/u11240-r.png?crc=3834161280" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11240-a.png?crc=425324323" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11236-r.png?crc=315377294" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11236-a.png?crc=103097063" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11247-r.png?crc=414609562" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11247-a.png?crc=448860413" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11243-r.png?crc=311378454" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11243-a.png?crc=174751411" alt="" src="images/blank.gif?crc=4208392903"/>
   </div>
  </div>
  <div class="breakpoint" id="bp_480" data-min-width="321" data-max-width="480"><!-- responsive breakpoint node -->
   <div class="clearfix borderbox temp_no_id" data-orig-id="page"><!-- group -->
    <div class="clearfix grpelem temp_no_id" data-orig-id="pu11238"><!-- column -->
     <div class="clip_frame colelem temp_no_id" data-orig-id="u11238"><!-- image -->
      <img class="block temp_no_id temp_no_img_src" data-orig-src="images/titre-pt.png?crc=360484984" alt="" data-heightwidthratio="0.08311688311688312" data-image-width="385" data-image-height="32" data-orig-id="u11238_img" src="images/blank.gif?crc=4208392903"/>
     </div>
     <span class="clearfix colelem placeholder" data-placeholder-for="ppu11240_content"><!-- placeholder node --></span>
     <span class="clearfix colelem placeholder" data-placeholder-for="u11234-7_content"><!-- placeholder node --></span>
    </div>
    <div class="verticalspacer" data-offset-top="0" data-content-above-spacer="215" data-content-below-spacer="62" data-sizePolicy="fixed" data-pintopage="page_fixedLeft"></div>
    <div class="clearfix grpelem" id="pu11352"><!-- column -->
     <a class="nonblock nontext clip_frame colelem temp_no_id" href="http://www.u-pec.fr/" data-orig-id="u11352"><!-- image --><img class="block temp_no_id temp_no_img_src" data-orig-src="images/upec_cmjn185.png?crc=449675334" alt="" data-heightwidthratio="0.4225352112676056" data-image-width="142" data-image-height="60" data-orig-id="u11352_img" src="images/blank.gif?crc=4208392903"/></a>
     <span class="nonblock nontext clearfix colelem placeholder" data-placeholder-for="u11351-4_content"><!-- placeholder node --></span>
    </div>
   </div>
   <div class="preload_images">
    <img class="preload temp_no_img_src" data-orig-src="images/u11240-r.png?crc=3834161280" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11240-a.png?crc=425324323" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11236-r.png?crc=315377294" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11236-a.png?crc=103097063" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11247-r.png?crc=414609562" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11247-a.png?crc=448860413" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11243-r.png?crc=311378454" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11243-a.png?crc=174751411" alt="" src="images/blank.gif?crc=4208392903"/>
   </div>
  </div>
  <div class="breakpoint" id="bp_320" data-max-width="320"><!-- responsive breakpoint node -->
   <div class="clearfix borderbox temp_no_id" data-orig-id="page"><!-- column -->
    <div class="clip_frame colelem temp_no_id" data-orig-id="u11238"><!-- image -->
     <img class="block temp_no_id temp_no_img_src" data-orig-src="images/titre-pt.png?crc=360484984" alt="" data-heightwidthratio="0.08424908424908426" data-image-width="273" data-image-height="23" data-orig-id="u11238_img" src="images/blank.gif?crc=4208392903"/>
    </div>
    <span class="clearfix colelem placeholder" data-placeholder-for="ppu11240_content"><!-- placeholder node --></span>
    <span class="clearfix colelem placeholder" data-placeholder-for="u11234-7_content"><!-- placeholder node --></span>
    <a class="nonblock nontext clip_frame colelem temp_no_id" href="http://www.u-pec.fr/" data-orig-id="u11352"><!-- image --><img class="block temp_no_id temp_no_img_src" data-orig-src="images/upec_cmjn185.png?crc=449675334" alt="" data-heightwidthratio="0.42105263157894735" data-image-width="95" data-image-height="40" data-orig-id="u11352_img" src="images/blank.gif?crc=4208392903"/></a>
    <span class="nonblock nontext clearfix colelem placeholder" data-placeholder-for="u11351-4_content"><!-- placeholder node --></span>
   </div>
   <div class="preload_images">
    <img class="preload temp_no_img_src" data-orig-src="images/u11240-r.png?crc=3834161280" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11240-a.png?crc=425324323" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11236-r.png?crc=315377294" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11236-a.png?crc=103097063" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11247-r.png?crc=414609562" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11247-a.png?crc=448860413" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11243-r.png?crc=311378454" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u11243-a.png?crc=174751411" alt="" src="images/blank.gif?crc=4208392903"/>
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



	
<?php 
}


}
	
?>


