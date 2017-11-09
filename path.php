<?php
define('DOSSIER',"/prison/");
define('ROOT',$_SERVER['DOCUMENT_ROOT'].DOSSIER);
chdir(ROOT);
define('ROOTWEB',$_SERVER['SERVER_NAME'].DOSSIER);
?>