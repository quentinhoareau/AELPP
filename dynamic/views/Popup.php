<?php

class Popup{

   // ATTRIBUTS
    public $title = "Popup";
    public $Message;

    
   //Titre du popup (html)
   public function setTitle($valeur){
      $this->title = $valeur;
   }

   //Contenu du popup (html)
   public function setMessage($valeur){
      $this->Message = $valeur;
   }

   public function genererVue(){

      include "views/viewModal.php";

      if( $this->Message != null ){
         echo "<script> popup(\"".$this->title."\",\"".str_replace("\n", "", $this->Message)."\", false); </script>";
      }
   }



}



?>