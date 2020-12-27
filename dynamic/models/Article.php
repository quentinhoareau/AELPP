<?php 
class Article{
    //Attributs
    private $id;
    private $title;
    private $html_content;
    private $author_id;
    private $publish_date;
    private $edit_date;
    private $published;

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

   private function setPublished($value){
      if($value == 1){$this->published = true;} else{ $this->published = false;}
   }

   //Autre méthodes
   public function getAuthor(){
      $PersonManager = new PersonManager;
      return $PersonManager->get($this->author_id);
   }
}
 