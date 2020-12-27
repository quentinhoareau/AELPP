<?php 


class RoleManager extends Database{

    //Obtenir une liste d'objets roles
    public function getList(){
        $this->getDB(); 
        $query = "SELECT * FROM role";
        return $this->getModel("Role", $query) ;
    }

    //Obtenir un objet role
    public function get($code){
        $this->getDB(); 
        $query = "SELECT * FROM role WHERE code=?";
        return @$this->getModel("Role", $query, [$code])[0] ;
    }



}



?>