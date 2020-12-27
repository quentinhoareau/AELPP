<?php 

require_once('../../views/Popup.php');
require_once('../../views/View.php');

class AdminView extends View{
      
      //Construction de la view
     public function __construct($page){
        //Initialisation par défaut
        $this->file= 'views/'.lcfirst($page).'AdminView.php';
        $this->template= "views/adminTemplate.php" ;
        $this->title= $page;
        $this->cssList= ["assets/css/admin/".strtolower($page)."Admin.css"] ;
        $this->nav= "views/adminNavigation.php";
        $this->scriptList= array() ;
        $this->Popup = new Popup;
      }

        private function getNav(){
          return $this->generateFile($this->nav, array()) ;
        }
  
  
       public function generateView($data = array()){
       
        //PARTIE DE LA VUE
        $contenu = $this->generateFile($this->file, $data);
  
         $nav = $this->getNav();

        //Génération final
        $view = $this->generateFile($this->template, array(
           'title' => $this->title, 
           'content' => $contenu,
           'nav' => $nav,
           'cssList' => $this->cssList,
           'scriptList' => $this->scriptList,
           "scriptList"=> $this->scriptList,
           "Popup" => $this->Popup
        ));
  
        //Intégration de la view
        echo $view;
       
         
       }
  
  
  

  
  
  




}

?>