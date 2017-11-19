
<?php
include_once 'path.php';
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
if(typeof Muse == "undefined") window.Muse = {}; window.Muse.assets = {"required":["museutils.js", "museconfig.js", "jquery.museresponsive.js", "require.js", "jquery.watch.js", "pg_jouer_joueurstrategie.css"], "outOfDate":[]};
</script>
  
  <title>pg_jouer_joueur/strategie</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?crc=444006867"/>
  <link rel="stylesheet" type="text/css" href="css/master_menu.css?crc=4086283001"/>
  <link rel="stylesheet" type="text/css" href="css/pg_jouer_joueurstrategie.css?crc=263254079" id="pagesheet"/>
  <!-- IE-only CSS -->
  <!--[if lt IE 9]>
  <link rel="stylesheet" type="text/css" href="css/nomq_preview_master_menu.css?crc=306763763"/>
  <link rel="stylesheet" type="text/css" href="css/nomq_pg_jouer_joueurstrategie.css?crc=3817547226" id="nomq_pagesheet"/>
  <![endif]-->
  <!-- JS includes -->
  <script src="https://use.typekit.net/ik/1AdKUE5_tGOFFnzC-QtXlrvjoP-c5kv8UDJy1IwqKlbfe7GgfO_jC3IPH2JoF2b3FR4LwQZc5Q4RF26u5QjU5AwuZQIt5QiR528cZcZcjDg8ZR6-PKG0Ze8CZAulZAsuSY4TShN0dc88SKocSKUq-AU8dAu8ZYm3Sc8Ddho0-AmkOcZkOYiaikoq-AU8dAu8ZYm3Sc8Ddho0-AmkOcZkJ6TliWF8dkuDdeBKH6qJE6vbMg6gJMJ7fbRC2UMMeMw6MqGIQWmDZZMg3ncvXM9.js" type="text/javascript"></script>
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
    </div>
    <div class="clearfix colelem shared_content" id="u9798-4" data-muse-temp-textContainer-sizePolicy="true" data-muse-temp-textContainer-pinning="true" data-content-guid="u9798-4_content"><!-- content -->
     <p>Jouer :</p>
    </div>
   
    <div class="clip_frame colelem shared_content" id="u10330" data-content-guid="u10330_content"><!-- image -->
     <a HREF="jouer.php?type=joueur">
      <img class="block temp_no_img_src" id="u10330_img" data-orig-src="images/boutons230x30_joueur.png?crc=148210692" alt="" data-heightwidthratio="0.13043478260869565" data-image-width="230" data-image-height="30" src="images/blank.gif?crc=4208392903"/>
    </a>
    </div>
    
    <a HREF="jouer.php?type=strat">
    <div class="clip_frame colelem shared_content" id="u10338" data-content-guid="u10338_content"><!-- image -->
        <a HREF="jouer.php?type=strat">
     <img class="block temp_no_img_src" id="u10338_img" data-orig-src="images/boutons230x30_strat.png?crc=3973299437" alt="" data-heightwidthratio="0.13043478260869565" data-image-width="230" data-image-height="30" src="images/blank.gif?crc=4208392903"/>
    </a>
    </div>
    
    <a class="nonblock nontext shadow rounded-corners clip_frame colelem" id="u9989" href="pg_regles.html"><!-- image --><img class="block temp_no_img_src" id="u9989_img" data-orig-src="images/carte_regles1.png?crc=364550514" alt="" data-heightwidthratio="1.490909090909091" data-image-width="55" data-image-height="82" src="images/blank.gif?crc=4208392903"/></a>
    <div class="clearfix colelem" id="pu9568"><!-- group -->
     <a class="nonblock nontext clip_frame grpelem" id="u9568" href="http://www.u-pec.fr/"><!-- image --><img class="block temp_no_img_src" id="u9568_img" data-orig-src="images/upec_cmjn185.png?crc=449675334" alt="" data-heightwidthratio="0.42162162162162165" data-image-width="185" data-image-height="78" src="images/blank.gif?crc=4208392903"/></a>
     <a class="nonblock nontext clearfix grpelem shared_content" id="u9567-4" href="licence-et-cr%c3%a9dits.html" data-muse-temp-textContainer-sizePolicy="true" data-muse-temp-textContainer-pinning="true" data-content-guid="u9567-4_content"><!-- content --><p>Licence et crédits</p></a>
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
     <span class="clearfix colelem placeholder" data-placeholder-for="u9798-4_content"><!-- placeholder node --></span>
     <span class="clip_frame colelem placeholder" data-placeholder-for="u10330_content"><!-- placeholder node --></span>
     <span class="clip_frame colelem placeholder" data-placeholder-for="u10338_content"><!-- placeholder node --></span>
     <a class="nonblock nontext shadow rounded-corners clip_frame colelem temp_no_id" href="pg_regles.html" data-orig-id="u9989"><!-- image --><img class="block temp_no_id temp_no_img_src" data-orig-src="images/carte_regles1.png?crc=364550514" alt="" data-heightwidthratio="1.4821428571428572" data-image-width="56" data-image-height="83" data-orig-id="u9989_img" src="images/blank.gif?crc=4208392903"/></a>
    </div>
    <div class="verticalspacer" data-offset-top="414" data-content-above-spacer="413" data-content-below-spacer="62" data-sizePolicy="fixed" data-pintopage="page_fixedLeft"></div>
    <a class="nonblock nontext clip_frame grpelem temp_no_id" href="http://www.u-pec.fr/" data-orig-id="u9568"><!-- image --><img class="block temp_no_id temp_no_img_src" data-orig-src="images/upec_cmjn185.png?crc=449675334" alt="" data-heightwidthratio="0.42207792207792205" data-image-width="154" data-image-height="65" data-orig-id="u9568_img" src="images/blank.gif?crc=4208392903"/></a>
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
     <span class="clearfix colelem placeholder" data-placeholder-for="u9798-4_content"><!-- placeholder node --></span>
     <span class="clip_frame colelem placeholder" data-placeholder-for="u10330_content"><!-- placeholder node --></span>
     <span class="clip_frame colelem placeholder" data-placeholder-for="u10338_content"><!-- placeholder node --></span>
     <a class="nonblock nontext shadow rounded-corners clip_frame colelem temp_no_id" href="pg_regles.html" data-orig-id="u9989"><!-- image --><img class="block temp_no_id temp_no_img_src" data-orig-src="images/carte_regles1.png?crc=364550514" alt="" data-heightwidthratio="1.4838709677419355" data-image-width="93" data-image-height="138" data-orig-id="u9989_img" src="images/blank.gif?crc=4208392903"/></a>
    </div>
    <div class="verticalspacer" data-offset-top="474" data-content-above-spacer="474" data-content-below-spacer="62" data-sizePolicy="fixed" data-pintopage="page_fixedLeft"></div>
    <div class="clearfix grpelem temp_no_id" data-orig-id="pu9568"><!-- column -->
     <a class="nonblock nontext clip_frame colelem temp_no_id" href="http://www.u-pec.fr/" data-orig-id="u9568"><!-- image --><img class="block temp_no_id temp_no_img_src" data-orig-src="images/upec_cmjn185.png?crc=449675334" alt="" data-heightwidthratio="0.4225352112676056" data-image-width="142" data-image-height="60" data-orig-id="u9568_img" src="images/blank.gif?crc=4208392903"/></a>
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
    <span class="clearfix colelem placeholder" data-placeholder-for="u9798-4_content"><!-- placeholder node --></span>
    <span class="clip_frame colelem placeholder" data-placeholder-for="u10338_content"><!-- placeholder node --></span>
    <span class="clip_frame colelem placeholder" data-placeholder-for="u10330_content"><!-- placeholder node --></span>
    <a class="nonblock nontext shadow rounded-corners clip_frame colelem temp_no_id" href="pg_regles.html" data-orig-id="u9989"><!-- image --><img class="block temp_no_id temp_no_img_src" data-orig-src="images/carte_regles1.png?crc=364550514" alt="" data-heightwidthratio="1.4838709677419355" data-image-width="62" data-image-height="92" data-orig-id="u9989_img" src="images/blank.gif?crc=4208392903"/></a>
    <a class="nonblock nontext clip_frame colelem temp_no_id" href="http://www.u-pec.fr/" data-orig-id="u9568"><!-- image --><img class="block temp_no_id temp_no_img_src" data-orig-src="images/upec_cmjn185.png?crc=449675334" alt="" data-heightwidthratio="0.42105263157894735" data-image-width="95" data-image-height="40" data-orig-id="u9568_img" src="images/blank.gif?crc=4208392903"/></a>
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











