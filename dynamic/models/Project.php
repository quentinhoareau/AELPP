<?php 
class Project{
    //Attributs
    private $num;
    private $name;
    private $description;
    private $date_creation;

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

   public function getGroupList(){
      $GroupManager = new GroupManager;
      return $GroupManager->getListForProject($this->num);
   }

   public function getEventList(){
      $EventManager = new EventManager;
      return $EventManager->getListForProject($this->num);
   }

}
 