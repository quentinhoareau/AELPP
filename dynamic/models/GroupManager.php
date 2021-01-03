<?php 


class GroupManager extends Database{

    //Obtenir une liste d'objets groups
    public function getList(){
        $this->getDB(); 
        $query = "SELECT * FROM `group`";
        return $this->getModel("Group", $query) ;
    }

    //Obtenir un objet group
    public function get($id){
        $this->getDB(); 
        $query = "SELECT * FROM `group` WHERE id=?";
        return @$this->getModel("Group", $query, [$id])[0] ;
    }

    //Supression d'un group
    public function delete($id){
        $this->getDB(); 
        $query = "DELETE FROM `group` WHERE id = ?";
        $this->execQuery($query, [$id]);
    }

    //Mie à jours d'un group
    public function update($id, $name, $description){
        $this->getDB(); 
        $query = "UPDATE `group` SET name=?, description=? WHERE id=?";
        $this->execQuery($query,[$name, $description, $id]);
    }


    
    //Insertion d'un group
    public function add($name, $description){
        $this->getDB(); 
        $query = "INSERT INTO `group`(name, description) VALUES ('azazaz', 'azazaz')";
        $this->execQuery($query);

        $this->getDB();
        return $this->getMaxIdTable("`group`", "id");
    }

    //Insertion d'une persone dans un group
    public function addPerson($id_group, $id_pers){
        $this->getDB(); 
        $query = "INSERT INTO group_person(id_group, id_pers) VALUES (?, ?)";
        $this->execQuery($query, [$id_group, $id_pers]);
    }

    //Vérification si la personne est déja dans le group
    public function memberExist($id_group, $id_pers){
        $this->getDB(); 
        $query = "SELECT COUNT(id_pers) as 'nbPers' FROM group_person WHERE id_group =? AND id_pers=? ";
        return boolval($this->execQuery($query, [$id_group, $id_pers])[0]['nbPers']);
    }

     //Supprimer tous les membres du group
     public function removeAllMember($id_group){
        $this->getDB(); 
        $query = "DELETE FROM group_person WHERE id_group =? ";
        $this->execQuery($query, [$id_group]);
    }

    //----------------------------

      //Obtenir un tableau d'objets Group d'un projet indiqué
      public function getListForProject($numProject){
        $this->getDB(); 
        $query = "SELECT g.* FROM `group` g INNER JOIN group_project gp ON gp.id_group = g.id  WHERE g.id=? ";
        return $this->getModel("Group", $query, [$numProject]);
    }


}



?>