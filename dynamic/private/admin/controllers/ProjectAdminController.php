<?php 

class ProjectAdminController{
   private $View;
   public $message;
   private $PersonManager;
   private $ProjectManager;
   
   // CONSTRUCTEUR 
   public function __construct($url){
      
      if( isset($url) && count($url) > 3 ){
         throw new Exception(null, 404); //Erreur 404
      }
      else{
        
         /*---------MANAGER---------*/
         $this->ProjectManager= new ProjectManager();
         $this->PersonManager= new PersonManager();

         
         //Changement des path pour le BDD
         Database::setConfigPath("../config.ini");
         Database::setLoginPath("../admin_login.ini");
         /*------------------*/

      
          
         /*---------FORMULAIRE---------*/
         if( isset($_POST["deleteProject"]) ){ //Si formulaire supprimé
            $this->ProjectManager->delete($_POST["deleteProject"]);
            header("Location: ".ADMIN_HOME."project");
         }
         if( isset($_POST["addProject"]) ){ //Si formulaire ajouté
            $idNewProject = $this->ProjectManager->add($_POST["name"], $_POST["description"]);
            header("Location: ".ADMIN_HOME."project/update/".$idNewProject);
         }
         if( isset($_POST["updateProject"]) ){ //Si formulaire modifié
            //Ajuster le format de la BDD
            $this->ProjectManager->update($_POST["updateProject"], $_POST["name"], $_POST["description"]);
         }
         /*------------------*/
     
         /*---------View---------*/
         //Modifier un project
         if( isset($url[1]) && $url[1] == "update"  && $url[2] >= 1  ){
            $viewName= "ProjectForm";
            $data= array(
               "project" => $this->ProjectManager->get($url[2]), //Obtenir la liste des produits
               "personList" => $this->PersonManager->getList()
            );
         }
         //Ajouter un project
         else if( isset($url[1]) && $url[1] == "add"){
            $viewName= "ProjectForm";
            $data= array(
               "personList" => $this->PersonManager->getList(),
               "personList" => $this->PersonManager->getList()
            );
         }
          //Liste des produits
         else{
            $viewName= "ProjectList";
            $data= array(
               "projectList" => $this->ProjectManager->getList(), //Obtenir la liste des produits
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