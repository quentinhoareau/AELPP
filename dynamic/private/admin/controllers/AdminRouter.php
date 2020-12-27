<?php 

require_once('../../controllers/Router.php');



class AdminRouter extends Router{

   public function __construct($url){
      parent::__construct($url, "../../models") ;
   }

   public function routePage(){

      try{
         //Auto chargement des modèles
         spl_autoload_register(function($class){
            require_once($this->modelDirectory.'/'.$class.'.php');
         });

        
        
         if( count($this->url) >= 1){
           
         //LE CONTROLLEUR ETS INCLU SELON LACTION DE LE L'UTILISATEUR
            $controller = ucfirst(strtolower($this->url[0]));
            $controllerClass = $controller."AdminController";
            
            $controllerFile = "controllers/".$controllerClass.".php";
            

            //Vérification si le fichier controleur existe
            if( file_exists($controllerFile) ){
               require_once($controllerFile);
               $this->ctrl = new $controllerClass($this->url); //Intenciation de la classe controleur concerné
            }
            else{
              
               throw new Exception('Page introuvable',404);
            }
      
         }
         else{
            require_once('controllers/LoginAdminController.php');
            $this->ctrl = new LoginAdminController($this->url);
         }
      }
      catch(Throwable $e){
         $buffer = ob_get_clean();
         require_once('controllers/ErrorAdminController.php');
         $this->ctrl = new ErrorAdminController($e, $buffer);
      }


   }
}

?>