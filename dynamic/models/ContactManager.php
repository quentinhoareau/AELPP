<?php 


class ContactManager extends Database{

    //Obtenir une liste d'objets contacts
    public function getList(){
        $this->getDB(); 
        $query = "SELECT * FROM contact";
        return $this->getModel("Contact", $query) ;
    }

    //Obtenir un objet contact
    public function get($id){
        $this->getDB(); 
        $query = "SELECT * FROM contact WHERE id=?";
        return @$this->getModel("Contact", $query, [$id])[0] ;
    }

    //Supression d'un contact
    public function delete($id){
        $this->getDB(); 
        $query = "DELETE FROM contact WHERE id = ?";
        $this->execQuery($query, [$id]);
    }

    //Mie à jours d'un contact
    public function update($id, $surname, $name, $phone, $object, $message){
        $this->getDB(); 
        $query = "UPDATE contact SET surname=?, name=?, phone=?, object=?, message=? WHERE id=?";
        $this->execQuery($query,[$surname, $name, $phone, $object, $message, $id]);
    }

    //Insertion d'un contact
    public function insert($surname, $name, $phone, $object, $message){
        $this->getDB(); 
        $query = "INSERT INTO contact(surname, name, phone, object, message) VALUES (?, ?, ?, ?, ?)";
        $this->execQuery($query, [ $surname, $name, $phone, $object, $message]);
    }


}



?>