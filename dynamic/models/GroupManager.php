<?php 


class GroupManager extends Database{

    //Obtenir une liste d'objets groups
    public function getList(){
        $this->getDB(); 
        $query = "SELECT * FROM group";
        return $this->getModel("Group", $query) ;
    }

    //Obtenir un objet group
    public function get($id){
        $this->getDB(); 
        $query = "SELECT * FROM group WHERE id=?";
        return @$this->getModel("Group", $query, [$id])[0] ;
    }

    //Supression d'un group
    public function delete($id){
        $this->getDB(); 
        $query = "DELETE FROM group WHERE id = ?";
        $this->execQuery($query, [$id]);
    }

    //Mie à jours d'un group
    public function update($id){
        $this->getDB(); 
       // $query = "UPDATE group SET title=?, predicted_date=?, id_creator=?, num_project=? WHERE id=?";
        $this->execQuery($query,[$id]);
    }

    //Insertion d'un group
    public function insert(){
        $this->getDB(); 
        //$query = "INSERT INTO group(title, predicted_date, id_creator, num_project) VALUES (?, ?, ?, ?)";
        $this->execQuery($query, []);
    }

    //----------------------------

      //Obtenir un tableau d'objets Group d'un projet indiqué
      public function getListForProject($numProject){
        $this->getDB(); 
        $query = "SELECT g.* FROM `group` g INNER JOIN group_project gp ON gp.id_group = g.id  WHERE g.id=? ";
        return $this->getModel("Group", $query, [$numProject]) ;
    }


}



?>