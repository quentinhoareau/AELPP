<?php 

class ArticleAdminController{
   private $View;
   public $message;
   private $ArticleManager;
   
   // CONSTRUCTEUR 
   public function __construct($url){
      
      if( isset($url) && count($url) > 3 ){
         throw new Exception(null, 404); //Erreur 404
      }
      else{
        
         /*---------MANAGER---------*/
         $this->ArticleManager= new ArticleManager();
         
         //Changement des path pour le BDD
         Database::setConfigPath("../config.ini");
         Database::setLoginPath("../admin_login.ini");
         /*------------------*/

      
         /*---------FORMULAIRE---------*/
         if( isset($_POST["deleteArticle"]) ){ //Si formulaire supprimé
            $this->ArticleManager->delete($_POST["deleteArticle"]);
         }
         if( isset($_POST["addArticle"]) ){ //Si formulaire ajouté
            $this->ArticleManager->add($_POST["addArticle"]);
         }
         if( isset($_POST["updateArticle"]) ){ //Si formulaire modifié
            $this->ArticleManager->update($_POST["updateArticle"], $_POST["label"]);
         }
         /*------------------*/
     
         /*---------View---------*/

 
        

         //Modifier un article
         if( isset($url[1]) && $url[1] == "update"  && $url[2] >= 1  ){
            $viewName= "ArticleUpdate";
            $data= array(
               "article" => $this->ArticleManager->get($url[2]), //Obtenir la liste des produits
            );
         }
          //Liste des produits
         else{
            $viewName= "ArticleList";
            $data= array(
               "articleList" => $this->ArticleManager->getList(), //Obtenir la liste des produits
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