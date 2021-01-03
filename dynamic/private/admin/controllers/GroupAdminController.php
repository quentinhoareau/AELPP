<?php 

class GroupAdminController{
   private $View;
   public $message;
   private $GroupManager;
   private $PersonManager;
   
   // CONSTRUCTEUR 
   public function __construct($url){
      
      if( isset($url) && count($url) > 3 ){
         throw new Exception(null, 404); //Erreur 404
      }
      else{
        
         /*---------MANAGER---------*/
         $this->GroupManager= new GroupManager();
         $this->PersonManager= new PersonManager();
         
         //Changement des path pour le BDD
         Database::setConfigPath("../config.ini");
         Database::setLoginPath("../admin_login.ini");
         /*------------------*/

      
         /*---------FORMULAIRE---------*/
         if( isset($_POST["deleteGroup"]) ){ //Si formulaire supprimé
            $this->GroupManager->delete($_POST["deleteGroup"]);
            header("Location: ".ADMIN_HOME."group");
         }
         if( isset($_POST["addGroup"]) ){ //Si formulaire ajouté

            $idNewGroup = $this->GroupManager->add($_POST['name'], $_POST['description']);

            //Ajouts des membres au group
            if(isset($_POST["id_pers"])){
               foreach ($_POST["id_pers"] as $idPers) {
                  $this->GroupManager->addPerson($idNewGroup, $idPers);
               }
            }
         
            header("Location: ".ADMIN_HOME."group/update/".$idNewGroup);
         }
         if( isset($_POST["updateGroup"]) ){ //Si formulaire modifié
            $this->GroupManager->update($_POST["updateGroup"], $_POST["name"],  $_POST['description']);
            
            //Ajouts des membres au group
            if(isset($_POST["id_pers"])){

               $this->GroupManager->removeAllMember($_POST["updateGroup"]);
               foreach ($_POST["id_pers"] as $idPers) {
                  //Si la personne n'est pas déjà dans le groupe
                  if( !$this->GroupManager->memberExist($_POST["updateGroup"], $idPers) ){
                    $this->GroupManager->addPerson($_POST["updateGroup"], $idPers);
                  }
               }

            }
           
         }

         
         /*------------------*/
     
         /*---------View---------*/

         //Modifier un group
         if( isset($url[1]) && $url[1] == "update"  && $url[2] >= 1  ){
            $viewName= "GroupForm";
            $data= array(
               "group" => $this->GroupManager->get($url[2]), //Obtenir la liste des produits
               "personList" => $this->PersonManager->getList()
            );
         }
         //Ajouter un group
         else if( isset($url[1]) && $url[1] == "add"){
            $viewName= "GroupForm";
            $data= array(
               "personList" => $this->PersonManager->getList()
            );
         }
          //Liste des produits
         else{
            $viewName= "GroupList";
            $data= array(
               "groupList" => $this->GroupManager->getList(), //Obtenir la liste des produits
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