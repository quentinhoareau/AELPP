<?php
  
class ErrorAdminController{
   private $View;

   public function __construct(Throwable $e, $buffer){
    
      switch ( $e->getCode() ) {
         //SQL STATE 45000 (Exception custom)
         case 45000:
            $errorMessage = $e->xdebug_message;
            $errorTitle = "<b> SQL STATE Exception: </b> <br>" ;
            break;

         //Accès refusé (global)
         case 403:
            $errorTitle = "Accès refusé" ;
            $errorMessage = $e->getMessage();
            break;

         //Accès refusé, nécessite une connexion de la part du product
         case 401:
            $errorTitle = "Vous devez être connecté" ;
            $errorMessage = $e->getMessage();
            break; 
         
         //La syntaxe de la requête est erronée (Manque des infos)
         case 400:
            $errorTitle = "Requête erronée";
            if( $e->getMessage() == null ){
               $errorMessage = $e->getMessage();
            }else{  $errorMessage = "La page demandé n'a pas les ressources nécessaire pour répondre à la demande." ;  }
            break;  

         //Page non trouvée
         case 404:
            $errorTitle = "Page non trouvée";
            if($e->getMessage() == null){
               $errorMessage = "La page demandée est introuvable sur le serveur." ;
            }  else{ $errorMessage = $e->getMessage(); }
            break;  

         // Ressource bloqué
         case 423:
            $errorTitle = "Ressource bloquée";
            $errorMessage = $e->getMessage();
            break; 
            
         // Authentification acceptée mais les droits refusé
         case 403:
            header(URL_SITE);
            break;  
            
         //Erreur serveur (Par défaut / code = 500)
         default:
            echo "<h1> Page d'erreur en BETA : </h1> <br>";
            echo "<h1> Erreur : </h1> <br> " ;
            echo $e->xdebug_message ;
            echo "<hr> <br> <br> <br> <br>  <h1> Affichage avant l'erreur: </h1> <br> <br> ".$buffer ;
            exit();
      }
   
      //Affichage de la view d'erreur en cas de problème liée au site / serveur
      $this->View = new AdminView('Error');
      $this->View->setCssList(["assets/css/erreur.css"]) ;
      $this->View->setHeader("views/header.php") ;
      $this->View->generateView( array("errorTitle" => $errorTitle,'errorMessage' => $errorMessage) );

   }


}



  


?>