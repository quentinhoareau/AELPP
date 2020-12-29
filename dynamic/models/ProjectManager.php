<?php 


class ProjectManager extends Database{

    //Obtenir une liste d'objets projects
    public function getList(){
        $this->getDB(); 
        $query = "SELECT * FROM project";
        return $this->getModel("Project", $query) ;
    }

    //Obtenir un objet project
    public function get($num){
        $this->getDB(); 
        $query = "SELECT * FROM project WHERE num=?";
        return @$this->getModel("Project", $query, [$num])[0] ;
    }

    //Supression d'un project
    public function delete($num){
        $this->getDB(); 
        $query = "DELETE FROM project WHERE num = ?";
        $this->execQuery($query, [$num]);
    }

    //Mise à jours d'un project
    public function update($num, $name, $description){
        $this->getDB(); 
        $query = "UPDATE project SET name=?, description=? WHERE num=?";
        $this->execQuery($query,[$name, $description, $num]);
    }

    //Insertion d'un project
    public function insert($name ,$description ,$id_creator ,$num_project){
        $this->getDB(); 
        $query = "INSERT INTO project(name,description) VALUES (?, ?)";
        $this->execQuery($query, [$name ,$description]);
    }


}



?>