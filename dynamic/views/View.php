<?php

class View{

   // ATTRIBUTS DE LA VUES
    protected $file;
    protected $template;
    protected $title;
    protected $cssList = array();
    protected $scriptList = array();
    protected $nav;
    protected $header;
    protected $footer;
    public    $Popup;

    
    //Construction de la vue
   public function __construct($page){
      $this->file= 'views/'.lcfirst($page).'View.php';
      $this->template= "views/template.php" ;
      $this->title= $page;
      $this->cssList= ["assets/css/".strtolower($page).".css"];
      $this->scriptList= [];
      $this->nav= "views/navigation.php";
      $this->footer = "views/footer.php";
      $this->header = "views/header.php";
      $this->nav = "views/navigation.php";
      $this->Popup = new Popup;
    }

   //SETTER
   public function setHeader($file){
      $this->header = $file ;
   }

   public function setScriptList($fileList){

      foreach ($fileList as $file) {
         if (file_exists($file)){
            $this->scriptList[] = $file;
         }
       }

   }

   public function setCssList($fileList){
      foreach ($fileList as $file) {
         if (file_exists($file)){
            $this->cssList[] = $file;
         }
      }
   }


    //Génération du file (sécurisé)
    protected function generateFile($file, $data){
      
        if (file_exists($file)){
         
           extract($data); //Extraction des données

           ob_start(); //Ouverture de la mémoire tampon
  
           //INCLUT LE file VUE
           require $file;
           
           return ob_get_clean(); //Retourne et fermeture de la mémoire tampon
        }
        else{
           throw new Exception('Le fichier '.$file.' est introuvable') ;
        }

     }


     //Génération de la vue
     public function generateView($data = array()){
     
      //PARTIE DE LA VUE
      $content = $this->generateFile($this->file, $data);
 
      //Charegements des files principaux
      $header =  $this->generateFile($this->header, $data);
      $footer= $this->generateFile($this->footer, $data);
      $nav= $this->generateFile($this->nav, $data);
     
      //Génération final
      $view = $this->generateFile($this->template, array(
         'title' => $this->title, 
         'content' => $content,
         'nav' => $nav,
         'header' => $header,
         'footer' => $footer,
         'cssList' => $this->cssList,
         'scriptList' => $this->scriptList,
         "Popup" => $this->Popup //Objet Popup
      ));

      //Intégration de la view
      echo $view;
     
     }



}



?>