
<?php

include "private/error-manager.php";

$urlHome = str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http" . "://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']) ) ;
define('HOME',  $urlHome) ;

$serverFolder= dirname($_SERVER['PHP_SELF'])."/";
$activeLink = str_replace($serverFolder,"",$_SERVER['REQUEST_URI']) ;

define('ACTIVE_LINK',  $activeLink) ;
define('SERVER_FOLDER',  $serverFolder) ;

require_once('views/Popup.php');
require_once('views/View.php');
require_once('controllers/Router.php');

   //Récupération de chaque partie de l'url 
   if( isset($_GET["url"]) ){
      $url = explode('/', filter_var( $_GET['url'], FILTER_SANITIZE_URL) ); 
   }
   else{ $url = array() ;}
 

   $routeur = new Router($url);
   $routeur->routePage();



?>
