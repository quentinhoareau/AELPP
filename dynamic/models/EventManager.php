<?php 


class EventManager extends Database{

    //Obtenir une liste d'objets events
    public function getList(){
        $this->getDB(); 
        $query = "SELECT * FROM event";
        return $this->getModel("Event", $query) ;
    }

    //Obtenir un objet event
    public function get($id){
        $this->getDB(); 
        $query = "SELECT * FROM event WHERE id=?";
        return @$this->getModel("Event", $query, [$id])[0] ;
    }

    //Supression d'un event
    public function delete($id){
        $this->getDB(); 
        $query = "DELETE FROM event WHERE id = ?";
        $this->execQuery($query, [$id]);
    }

    //Mie à jours d'un event
    public function update($id, $title, $content ,$predicted_date ,$id_creator ,$num_project){
        $this->getDB(); 

    
        $query = "UPDATE event SET title=?, content=?, predicted_date=?, id_creator=?, num_project=? WHERE id=?";
        $this->execQuery($query,[$title, $content ,$predicted_date ,$id_creator ,$num_project, $id]);
    }

    //Insertion d'un event
    public function add($title, $content ,$predicted_date ,$id_creator ,$num_project){
        $this->getDB(); 
        $query = "INSERT INTO event(title, content, date_creation ,predicted_date, id_creator, num_project) VALUES (?, ?, NOW(), ?, ?, ?)";
        $this->execQuery($query, [$title, $content ,$predicted_date ,$id_creator ,$num_project]);

        $this->getDB();
        return $this->getMaxIdTable("event", "id");
    }


}



?>