<?php 
class Event{
    //Attributs
    private $id;
    private $title;
    private $content;
    private $date_creation;
    private $predicted_date;
    private $id_creator;
    private $num_project;

    //Constructeur
    public function __construct(array $data){
        $this->hydratation($data) ;
    }

    //Hydratation
    public function hydratation(array $data){
        foreach($data as $prop => $value){
           $setter = 'set'.ucfirst($prop);

           //Si un setter (non magic) existe
           if(method_exists($this, $setter)){
              $this->$setter(htmlspecialchars($value)); //Appel au setter concerné en sécurisant l'injection de scripts
           }
            //Si l'attribut existe
           else if(property_exists($this, $prop)) { $this->$prop = $value; }
        }
     }

   //Getter
   public function __get($att){ return $this->$att;}


   //Setter
   public function __set( $att , $val ){ $this->$att = $val;}
   
   


   //Autre méthodes
   public function getCreator(){
      $PersonManager = new PersonManager;
      return $PersonManager->get($this->id_creator);
   }

   //Autre méthodes
   public function getProject(){
      $ProjectManager = new ProjectManager;
      return $ProjectManager->get($this->num_project);
   }

}
 