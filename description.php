<?php
include_once 'path.php';
include_once ROOT.'fonction/fonctions.php';


$fichier = 'config/conf.ini';
if(file_exists($fichier)) {
$config = parse_ini_file($fichier, true);
     
$coopmut = $config['jeu']['CC'];
$trahmut = $config['jeu']['TT'];
$tracoop = $config['jeu']['T'];
$cooptra = $config['jeu']['C'];

if ($coopmut==1 or $coopmut==0)
{
	$coopmut=$coopmut.' point';
}
else
{
	$coopmut=$coopmut.' points';
}
if ($trahmut==1 or $trahmut==0)
{
	$trahmut=$trahmut.' point';
}
else
{
	$trahmut=$trahmut.' points';
}
if ($tracoop==1 or $tracoop==0)
{
	$tracoop=$tracoop.' point';
}
else
{
	$tracoop=$tracoop.' points';
}
if ($cooptra==1 or $cooptra==0)
{
	$cooptra=$cooptra.' point';
}
else
{
	$cooptra=$cooptra.' points';
}

}
else
{
$coopmut = 'non accessible';
$trahmut = 'non accessible';
$tracoop = 'non accessible';
$cooptra = 'non accessible';
}





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
if(typeof Muse == "undefined") window.Muse = {}; window.Muse.assets = {"required":["museutils.js", "museconfig.js", "jquery.museresponsive.js", "require.js", "jquery.watch.js", "pg_regles.css"], "outOfDate":[]};
</script>
  
  <title>pg_regles</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?crc=444006867"/>
  <link rel="stylesheet" type="text/css" href="css/master_menu.css?crc=277313464"/>
  <link rel="stylesheet" type="text/css" href="css/pg_regles.css?crc=456741125" id="pagesheet"/>
  <!-- IE-only CSS -->
  <!--[if lt IE 9]>
  <link rel="stylesheet" type="text/css" href="css/nomq_preview_master_menu.css?crc=4039072136"/>
  <link rel="stylesheet" type="text/css" href="css/nomq_pg_regles.css?crc=2157822" id="nomq_pagesheet"/>
  <![endif]-->
  <!-- JS includes -->
  <script src="https://use.typekit.net/ik/3fAFsoj2TZNgrCfo1-wW1v2JQpKOMblg5eTGX8mUSSXfe7GgfO_jC3IPH2JoF2b3FR4L5QJtFRIojRyKZQ6UjQMXZQjDjhIkFR6XZcwuZQ9UFRM-PKG0Ze8CZAulZAsuSY4TShN0dc88SKocSKUq-AU8dAu8ZYm3Sc8Ddho0-AmkOcZkOYiaikoq-AU8dAu8ZYm3Sc8Ddho0-AmkOcZkJ6TliWF8dkuDdeBKH6qJE6vbMg6gJMJ7fbRC2UMMeMw6MqGIQWmDZZMgqGVOXM9.js" type="text/javascript"></script>
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
     <a class="nonblock nontext grpelem" id="u9574" href="index.php"><!-- state-based BG images --><div class="fluid_height_spacer"></div></a>
     <a class="nonblock nontext grpelem" id="u9570" href="classement.php"><!-- state-based BG images --><div class="fluid_height_spacer"></div></a>
     <a class="nonblock nontext grpelem" id="u9576" href="profil.php"><!-- state-based BG images --><div class="fluid_height_spacer"></div></a>
     <a class="nonblock nontext grpelem" id="u9572" href="deconnexion.php"><!-- state-based BG images --><div class="fluid_height_spacer"></div></a>
    </div>
    <div class="clearfix colelem shared_content" id="u9729-7" data-muse-temp-textContainer-sizePolicy="true" data-muse-temp-textContainer-pinning="true" data-content-guid="u9729-7_content"><!-- content -->
    <?php 
    if( joueur::connected()){
    	
    	echo '<p id="u9729-5">Vous êtes <a class="nonblock" href="profil.php">'.$jou->get_Pseudo().'</a> parmi '.joueur::get_atifs().' joueur.se.s connecté.e.s';
    }
    else 
    {
    	echo joueur::get_atifs()." joueur.se.s connecté.e.s, <a href='connexion.php'> me connecter </a>";
    }
      
     
    echo '</p>';
    
    
    ?>    </div>
    <div class="clearfix colelem" id="pu9902"><!-- group -->
     <div class="clip_frame grpelem" id="u9902"><!-- image -->
      <img class="block temp_no_img_src" id="u9902_img" data-orig-src="images/carte_regles1.png?crc=364550514" alt="" data-heightwidthratio="1.488888888888889" data-image-width="90" data-image-height="134" src="images/blank.gif?crc=4208392903"/>
     </div>
     <div class="clearfix grpelem shared_content" id="u9927-16" data-muse-temp-textContainer-sizePolicy="true" data-muse-temp-textContainer-pinning="true" data-content-guid="u9927-16_content"><!-- content -->
      <p id="u9927-2">Le jeu du prisonnier est extrêmement simple : vous rencontrez d'autres joueurs ou des stratégies et vous devez soit coopérer, soit faire défection avec la personne ou la stratégie que vous rencontrez.</p>
      <p id="u9927-4">Le nombre de points que vous gagnez à chaque rencontre dépend du résultat du croisement de l'action de jeu de l'autre joueur ou de la stratégie, et de votre propre action de jeu comme indiqué dans le tableau ci-dessous.</p>
      <p id="u9927-6">Le but du jeu est d'obtenir le meilleur score moyen par partie avec le plus grand nombre de parties.</p>
      <p id="u9927-8">Le meilleur joueur sera celui qui aura le plus grand score moyen (score total divisé par le nombre de parties jouées) dans la catégorie la plus haute.</p>
      <p id="u9927-10">Lors des rencontres, si vous mettez trop de temps à jouer, un coup généré aléatoirement sera exécuté à votre place.</p>
      <p id="u9927-11">&nbsp;</p>
      <p id="u9927-13">Tableau des points que vous gagnez selon le croisement des actions de jeu :</p>
      <p id="u9927-14">&nbsp;</p>
     </div>
     <div class="grpelem shared_content" id="u10935" data-content-guid="u10935_content"><!-- custom html -->
      <style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:0px 6px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:0px 6px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg .tg-1p6p{font-weight:bold;font-size:10px;color:#69281e;vertical-align:top}
.tg .tg-5ahe{font-size:10px;color:#69281e;vertical-align:top}
.tg .tg-mkca{font-size:10px;font-family:Verdana, Geneva, sans-serif !important;;color:#69281e;vertical-align:top}
.tg .tg-ockh{font-size:10px;color:#69281e;vertical-align:top}
@media screen and (max-width: 767px) {.tg {width: auto !important;}.tg col {width: auto !important;}.tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;}}</style>
<div class="tg-wrap"><table class="tg">
  <tr>
    <th class="tg-mkca" rowspan="2"></th>
    <th class="tg-1p6p" colspan="2">Vous avez joué</th>
  </tr>
  <tr>
    <td class="tg-ockh">Coopération</td>
    <td class="tg-ockh">Défection</td>
  </tr>
  <tr>
    <td class="tg-5ahe">Coopération du complice</td>
    <td class="tg-5ahe">3 points</td>
    <td class="tg-5ahe">5 points</td>
  </tr>
  <tr>
    <td class="tg-ockh">Défection du complice</td>
    <td class="tg-ockh">0 point</td>
    <td class="tg-ockh">1 point</td>
  </tr>
</table></div>

     </div>
    </div>
    <div class="clearfix colelem" id="pu9568"><!-- group -->
     <a class="nonblock nontext clip_frame grpelem" id="u9568" href="http://www.u-pec.fr/"><!-- image --><img class="block temp_no_img_src" id="u9568_img" data-orig-src="images/upec_cmjn185.png?crc=449675334" alt="" data-heightwidthratio="0.42162162162162165" data-image-width="185" data-image-height="78" src="images/blank.gif?crc=4208392903"/></a>
     <a class="nonblock nontext clearfix grpelem shared_content" id="u9567-4" href="licence-et-cr%c3%a9dits.html" data-muse-temp-textContainer-sizePolicy="true" data-muse-temp-textContainer-pinning="true" data-content-guid="u9567-4_content"><!-- content --><p>Licence et crédits</p></a>
    </div>
   </div>
   <div class="preload_images">
    <img class="preload temp_no_img_src" data-orig-src="images/u9574-r.png?crc=3834161280" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u9574-a.png?crc=425324323" alt="" src="images/blank.gif?crc=4208392903"/>
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
    <div class="clip_frame grpelem temp_no_id" data-orig-id="u9902"><!-- image -->
     <img class="block temp_no_id temp_no_img_src" data-orig-src="images/carte_regles1.png?crc=364550514" alt="" data-heightwidthratio="1.489795918367347" data-image-width="49" data-image-height="73" data-orig-id="u9902_img" src="images/blank.gif?crc=4208392903"/>
    </div>
    <div class="clearfix grpelem" id="pu9565"><!-- column -->
     <div class="clip_frame colelem temp_no_id" data-orig-id="u9565"><!-- image -->
      <img class="block temp_no_id temp_no_img_src" data-orig-src="images/titre-pt.png?crc=360484984" alt="" data-heightwidthratio="0.085" data-image-width="400" data-image-height="34" data-orig-id="u9565_img" src="images/blank.gif?crc=4208392903"/>
     </div>
     <span class="clearfix colelem placeholder" data-placeholder-for="ppu9574_content"><!-- placeholder node --></span>
     <span class="clearfix colelem placeholder" data-placeholder-for="u9729-7_content"><!-- placeholder node --></span>
     <div class="clearfix colelem" id="pu9927-16"><!-- group -->
      <span class="clearfix grpelem placeholder" data-placeholder-for="u9927-16_content"><!-- placeholder node --></span>
      <span class="grpelem placeholder" data-placeholder-for="u10935_content"><!-- placeholder node --></span>
     </div>
    </div>
    <div class="verticalspacer" data-offset-top="474" data-content-above-spacer="474" data-content-below-spacer="62" data-sizePolicy="fixed" data-pintopage="page_fixedLeft"></div>
    <a class="nonblock nontext clip_frame grpelem temp_no_id" href="http://www.u-pec.fr/" data-orig-id="u9568"><!-- image --><img class="block temp_no_id temp_no_img_src" data-orig-src="images/upec_cmjn185.png?crc=449675334" alt="" data-heightwidthratio="0.42207792207792205" data-image-width="154" data-image-height="65" data-orig-id="u9568_img" src="images/blank.gif?crc=4208392903"/></a>
    <span class="nonblock nontext clearfix grpelem placeholder" data-placeholder-for="u9567-4_content"><!-- placeholder node --></span>
   </div>
   <div class="preload_images">
    <img class="preload temp_no_img_src" data-orig-src="images/u9574-r.png?crc=3834161280" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u9574-a.png?crc=425324323" alt="" src="images/blank.gif?crc=4208392903"/>
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
     <div class="clearfix colelem temp_no_id" data-orig-id="pu9902"><!-- group -->
      <div class="clip_frame grpelem temp_no_id" data-orig-id="u9902"><!-- image -->
       <img class="block temp_no_id temp_no_img_src" data-orig-src="images/carte_regles1.png?crc=364550514" alt="" data-heightwidthratio="1.484375" data-image-width="64" data-image-height="95" data-orig-id="u9902_img" src="images/blank.gif?crc=4208392903"/>
      </div>
      <span class="clearfix grpelem placeholder" data-placeholder-for="u9927-16_content"><!-- placeholder node --></span>
      <span class="grpelem placeholder" data-placeholder-for="u10935_content"><!-- placeholder node --></span>
     </div>
    </div>
    <div class="verticalspacer" data-offset-top="459" data-content-above-spacer="459" data-content-below-spacer="62" data-sizePolicy="fixed" data-pintopage="page_fixedLeft"></div>
    <div class="clearfix grpelem temp_no_id" data-orig-id="pu9568"><!-- column -->
     <a class="nonblock nontext clip_frame colelem temp_no_id" href="http://www.u-pec.fr/" data-orig-id="u9568"><!-- image --><img class="block temp_no_id temp_no_img_src" data-orig-src="images/upec_cmjn185.png?crc=449675334" alt="" data-heightwidthratio="0.4225352112676056" data-image-width="142" data-image-height="60" data-orig-id="u9568_img" src="images/blank.gif?crc=4208392903"/></a>
     <span class="nonblock nontext clearfix colelem placeholder" data-placeholder-for="u9567-4_content"><!-- placeholder node --></span>
    </div>
   </div>
   <div class="preload_images">
    <img class="preload temp_no_img_src" data-orig-src="images/u9574-r.png?crc=3834161280" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u9574-a.png?crc=425324323" alt="" src="images/blank.gif?crc=4208392903"/>
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
    <div class="clearfix colelem temp_no_id" data-orig-id="pu9902"><!-- group -->
     <div class="clip_frame grpelem temp_no_id" data-orig-id="u9902"><!-- image -->
      <img class="block temp_no_id temp_no_img_src" data-orig-src="images/carte_regles1.png?crc=364550514" alt="" data-heightwidthratio="1.4772727272727273" data-image-width="44" data-image-height="65" data-orig-id="u9902_img" src="images/blank.gif?crc=4208392903"/>
     </div>
     <span class="clearfix grpelem placeholder" data-placeholder-for="u9927-16_content"><!-- placeholder node --></span>
     <span class="grpelem placeholder" data-placeholder-for="u10935_content"><!-- placeholder node --></span>
    </div>
    <a class="nonblock nontext clip_frame colelem temp_no_id" href="http://www.u-pec.fr/" data-orig-id="u9568"><!-- image --><img class="block temp_no_id temp_no_img_src" data-orig-src="images/upec_cmjn185.png?crc=449675334" alt="" data-heightwidthratio="0.42105263157894735" data-image-width="95" data-image-height="40" data-orig-id="u9568_img" src="images/blank.gif?crc=4208392903"/></a>
    <span class="nonblock nontext clearfix colelem placeholder" data-placeholder-for="u9567-4_content"><!-- placeholder node --></span>
   </div>
   <div class="preload_images">
    <img class="preload temp_no_img_src" data-orig-src="images/u9574-r.png?crc=3834161280" alt="" src="images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="images/u9574-a.png?crc=425324323" alt="" src="images/blank.gif?crc=4208392903"/>
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
