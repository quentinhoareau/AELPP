<?php 

class ArticleAdminController{
   private $View;
   public $message;
   private $ArticleManager;
   private $PersonManager;
   
   // CONSTRUCTEUR 
   public function __construct($url){
      
      if( isset($url) && count($url) > 3 ){
         throw new Exception(null, 404); //Erreur 404
      }
      else{
        
         /*---------MANAGER---------*/
         $this->ArticleManager= new ArticleManager();
         $this->PersonManager= new PersonManager();
         
         //Changement des path pour le BDD
         Database::setConfigPath("../config.ini");
         Database::setLoginPath("../admin_login.ini");
         /*------------------*/

      
         /*---------FORMULAIRE---------*/
         if( isset($_POST["deleteArticle"]) ){ //Si formulaire supprimé
            $this->ArticleManager->delete($_POST["deleteArticle"]);
            header("Location: ".ADMIN_HOME."article");
         }
         if( isset($_POST["addArticle"]) ){ //Si formulaire ajouté
            $published = $_POST['addArticle'];
            $idNewArticle = $this->ArticleManager->add($_POST['title'], $_POST['html_content'], $_POST['author_id'], $published);
      
            header("Location: ".ADMIN_HOME."article/update/".$idNewArticle);
         }
         if( isset($_POST["updateArticle"]) ){ //Si formulaire modifié
            if(!isset($_POST["published"])){ $_POST["published"]  =0 ; }
            $this->ArticleManager->update($_POST["updateArticle"], $_POST["title"], $_POST["html_content"], $_POST["author_id"], $_POST["published"]);
         }
         /*------------------*/
     
         /*---------View---------*/

 
        

         //Modifier un article
         if( isset($url[1]) && $url[1] == "update"  && $url[2] >= 1  ){
            $viewName= "ArticleUpdate";
            $data= array(
               "article" => $this->ArticleManager->get($url[2]), //Obtenir la liste des produits
               "personList" => $this->PersonManager->getList()
            );
         }
         //Ajouter un article
         else if( isset($url[1]) && $url[1] == "add"){
            $viewName= "ArticleAdd";
            $data= array(
               "personList" => $this->PersonManager->getList()
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