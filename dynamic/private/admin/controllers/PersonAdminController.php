<?php 

class PersonAdminController{
   private $View;
   public $message;
   private $PersonManager;
   private $RoleManager;
   private $ProjectManager;
   
   // CONSTRUCTEUR 
   public function __construct($url){
      
      if( isset($url) && count($url) > 3 ){
         throw new Exception(null, 404); //Erreur 404
      }
      else{
        
         /*---------MANAGER---------*/
         $this->PersonManager= new PersonManager();
         $this->RoleManager= new RoleManager();

         
         //Changement des path pour le BDD
         Database::setConfigPath("../config.ini");
         Database::setLoginPath("../admin_login.ini");
         /*------------------*/

      
          
         /*---------FORMULAIRE---------*/
         if( isset($_POST["deletePerson"]) ){ //Si formulaire supprimé
            $this->PersonManager->delete($_POST["deletePerson"]);
            header("Location: ".ADMIN_HOME."person");
         }
         if( isset($_POST["addPerson"]) ){ //Si formulaire ajouté
         
            $idNewPerson = $this->PersonManager->add($_POST["name"], $_POST["surname"], $_POST["email"], $_POST["phone"], $_POST["role_code"]);
            header("Location: ".ADMIN_HOME."person/update/".$idNewPerson);
         }
         if( isset($_POST["updatePerson"]) ){ //Si formulaire modifié
            
            //Ajuster le format de la BDD
            $this->PersonManager->update($_POST["updatePerson"], $_POST["name"], $_POST["surname"], $_POST["email"], $_POST["phone"], $_POST["role_code"]);
         }
         /*------------------*/
     
         /*---------View---------*/
         //Modifier un person
         if( isset($url[1]) && $url[1] == "update"  && $url[2] >= 1  ){
            $viewName= "PersonForm";
            $data= array(
               "person" => $this->PersonManager->get($url[2]), //Obtenir la liste des produits
               "roleList" => $this->RoleManager->getList()
            );
         }
         //Ajouter un person
         else if( isset($url[1]) && $url[1] == "add"){
            $viewName= "PersonForm";
            $data= array(
               "roleList" => $this->RoleManager->getList(),
               "roleList" => $this->RoleManager->getList()
            );
         }
          //Liste des produits
         else{
            $viewName= "PersonList";
            $data= array(
               "personList" => $this->PersonManager->getList(), //Obtenir la liste des produits
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