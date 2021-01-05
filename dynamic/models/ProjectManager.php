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
    public function add($name ,$description){
        $this->getDB(); 
        $query = "INSERT INTO project(name,description, date_creation) VALUES (?, ?, NOW())";
        $this->execQuery($query, [$name ,$description]);
    }


    //Insertion d'un group dans un projet
    public function addGroup($num_project, $id_group){
        $this->getDB(); 
        $query = "INSERT INTO project_group(id_group, num_project) VALUES (?, ?)";
        $this->execQuery($query, [$id_group, $num_project]);
    }

    //Vérification si le group est déja dans le projet
    public function groupExist($num_project, $id_group){
        $this->getDB(); 
        $query = "SELECT COUNT(id_group) as 'nbGroup' FROM project_group WHERE id_group =? AND num_project=? ";
        return boolval($this->execQuery($query, [$id_group, $num_project])[0]['nbGroup']);
    }

     //Supprimer tous les membres du groupe
     public function removeAllGroup($num_project){
        $this->getDB(); 
        $query = "DELETE FROM project_group WHERE num_project =? ";
        $this->execQuery($query, [$num_project]);
    }

}



?>