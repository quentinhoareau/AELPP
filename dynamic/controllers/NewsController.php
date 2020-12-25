<?php

class NewsController{
    private $View;
    public $message;
    private $ArticleManager;

   public function __construct($url){

    //Si l'url dépasse le nombre de slash indiqué
    if( isset($url) && count($url ) > 1 ){
       throw new Exception('Page introuvable');
    }
    
    else{
      /*--------------MANAGER--------------*/
      $this->ArticleManager = new ArticleManager();
      /*-----------------------------------*/


      /*--------------Formulaires--------------*/

      /*---------------------------------------*/



      /*-------------VUE------------*/
      $this->View = new View("News");
      $this->View->Popup->setMessage($this->message);
      $this->View->generateView( array(
         "articlesList" => $this->ArticleManager->getList()
      ));
      /*----------------------------*/


      


    }






 }




}
  


?>