
<?php

include "../error-manager.php";

$urlHome = str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http" . "://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']) ) ;


$serverFolder= dirname($_SERVER['PHP_SELF'])."/";
$activeLink = str_replace($serverFolder,"",$_SERVER['REQUEST_URI']) ;

//Constantes
define('ADMIN_HOME',  $urlHome) ;
define('ACTIVE_LINK',  $activeLink) ;
define('ADMIN_SERVER_FOLDER',  $serverFolder) ;


require_once('views/AdminView.php');
require_once('controllers/AdminRouter.php');

   //Récupération de chaque partie de l'url 
   if( isset($_GET["url"]) ){
      $url = explode('/', filter_var( $_GET['url'], FILTER_SANITIZE_URL) ); 
   }
   else{ $url = array() ;}
 

   $routeur = new AdminRouter($url);
   $routeur->routePage();



?>
