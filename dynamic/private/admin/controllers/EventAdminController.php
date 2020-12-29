<?php 

class EventAdminController{
   private $View;
   public $message;
   private $EventManager;
   private $PersonManager;
   private $ProjectManager;
   
   // CONSTRUCTEUR 
   public function __construct($url){
      
      if( isset($url) && count($url) > 3 ){
         throw new Exception(null, 404); //Erreur 404
      }
      else{
        
         /*---------MANAGER---------*/
         $this->EventManager= new EventManager();
         $this->PersonManager= new PersonManager();
         $this->ProjectManager = new ProjectManager();
         
         //Changement des path pour le BDD
         Database::setConfigPath("../config.ini");
         Database::setLoginPath("../admin_login.ini");
         /*------------------*/

      
         /*---------FORMULAIRE---------*/
         if( isset($_POST["deleteEvent"]) ){ //Si formulaire supprimé
            $this->EventManager->delete($_POST["deleteEvent"]);
            header("Location: ".ADMIN_HOME."event");
         }
         if( isset($_POST["addEvent"]) ){ //Si formulaire ajouté

            if( empty($_POST["num_project"]) ){ $_POST["num_project"] = null ;}
            $predicted_dateDbFormat = $str = str_replace("T", " ", $_POST["predicted_date"]);

            $idNewEvent = $this->EventManager->add($_POST["title"], $_POST["content"], $predicted_dateDbFormat, $_POST["id_creator"], $_POST["num_project"]);
            header("Location: ".ADMIN_HOME."event/update/".$idNewEvent);
         }
         if( isset($_POST["updateEvent"]) ){ //Si formulaire modifié
            
            //Ajuster le format de la BDD
            $predicted_dateDbFormat = $str = str_replace("T", " ", $_POST["predicted_date"]);

            if( empty($_POST["num_project"]) ){ $_POST["num_project"] = null ;}
            
            $this->EventManager->update($_POST["updateEvent"], $_POST["title"], $_POST["content"], $predicted_dateDbFormat, $_POST["id_creator"], $_POST["num_project"]);
         }
         /*------------------*/
     
         /*---------View---------*/

 
        

         //Modifier un event
         if( isset($url[1]) && $url[1] == "update"  && $url[2] >= 1  ){
            $viewName= "EventUpdate";
            $data= array(
               "event" => $this->EventManager->get($url[2]), //Obtenir la liste des produits
               "personList" => $this->PersonManager->getList(),
               "projectsList" => $this->ProjectManager->getList()
            );
         }
         //Ajouter un event
         else if( isset($url[1]) && $url[1] == "add"){
            $viewName= "EventAdd";
            $data= array(
               "personList" => $this->PersonManager->getList(),
               "projectsList" => $this->ProjectManager->getList()
            );
         }
          //Liste des produits
         else{
            $viewName= "EventList";
            $data= array(
               "eventList" => $this->EventManager->getList(), //Obtenir la liste des produits
            );
         }
        

         $this->View = new AdminView($viewName);
         $this->View->Popup->setMessage($this->message);
         $this->View->generateView($data) ;
         /*------------------*/
      }
   }

   


   

}

?>