<?php 


class PersonManager extends Database{

    //Obtenir une liste d'objets persons
    public function getList(){
        $this->getDB(); 
        $query = "SELECT * FROM person";
        return $this->getModel("Person", $query) ;
    }

    //Obtenir un objet person
    public function get($id){
        $this->getDB(); 
        $query = "SELECT * FROM person WHERE id=?";
        return @$this->getModel("Person", $query, [$id])[0] ;
    }

    //Supression d'un person
    public function delete($id){
        $this->getDB(); 
        $query = "DELETE FROM person WHERE id = ?";
        $this->execQuery($query, [$id]);
    }

    //Mie à jours d'un person
    public function update($id, $name ,$surname ,$email ,$phone ,$role_code){
        $this->getDB(); 
        $query = "UPDATE person SET name=?, surname=?, email=?, phone=?, role_code=? WHERE id=?";
        $this->execQuery($query,[$name ,$surname ,$email ,$phone ,$role_code, $id]);
    }

    //Insertion d'un person
    public function add($name ,$surname ,$email ,$phone ,$role_code){
        $this->getDB(); 
        $query = "INSERT INTO person(name, surname, email, phone, role_code) VALUES (?, ?, ?, ?, ?)";
        $this->execQuery($query, [$name ,$surname ,$email ,$phone ,$role_code]);
    }


    //------------------

    //Obtenir un tableau d'objet person d'un groupe indiqué
    public function getListForGroup($idGroup){
        $this->getDB(); 
        $query = "SELECT p.* FROM person p INNER JOIN group_person gp ON gp.id_pers = p.id  WHERE gp.id_group=? ";
        return $this->getModel("Person", $query, [$idGroup]) ;
    }



}



?>