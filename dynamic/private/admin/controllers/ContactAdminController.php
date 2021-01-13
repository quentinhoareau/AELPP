<?php 

class ContactAdminController{
   private $View;
   public $message;
   private $ContactManager;

   
   // CONSTRUCTEUR 
   public function __construct($url){
      
      if( isset($url) && count($url) > 3 ){
         throw new Exception(null, 404); //Erreur 404
      }
      else{
        
         /*---------MANAGER---------*/
         $this->ContactManager= new ContactManager();

         //Changement des path pour le BDD
         Database::setConfigPath("../config.ini");
         Database::setLoginPath("../admin_login.ini");
         /*------------------*/

         /*---------FORMULAIRE---------*/
         if( isset($_POST["deleteContact"]) ){ //Si formulaire supprimé
            $this->ContactManager->delete($_POST["deleteContact"]);
            header("Location: ".ADMIN_HOME."contact");
         }
         if( isset($_POST["addContact"]) ){ //Si formulaire ajouté
           
         }
         if( isset($_POST["updateContact"]) ){ //Si formulaire modifié
           
         }
         /*----------------------------*/
     
         /*---------View---------*/
         //Voir un contact
         if( isset($url[1])  && $url[1] >= 1  ){
       
            $viewName= "ContactForm";
            $data= array(
               "contact" => $this->ContactManager->get($url[1]), //Obtenir la liste des produits
            );
         }
         //Liste des contacts
         else{
            $viewName= "ContactList";
            $data= array(
               "contactList" => $this->ContactManager->getList(), //Obtenir la liste des produits
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