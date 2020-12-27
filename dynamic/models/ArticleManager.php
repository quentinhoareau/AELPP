<?php 


class ArticleManager extends Database{

    //Obtenir une liste d'objets articles
    public function getList(){
        $this->getDB(); 
        $query = "SELECT * FROM article";
        return $this->getModel("Article", $query) ;
    }

    //Obtenir une liste d'objets des 3 derniers articles
    public function getLastThree(){
        $this->getDB(); 
        $query = "SELECT * FROM article ORDER BY publish_date ASC LIMIT 3";
        return $this->getModel("Article", $query) ;
    }

    //Obtenir un objet article
    public function get($id){
        $this->getDB(); 
        $query = "SELECT * FROM article WHERE id=?";
        return @$this->getModel("Article", $query, [$id])[0] ;
    }

    //Supression d'un article
    public function delete($id){
        $this->getDB(); 
        $query = "DELETE FROM article WHERE id = ?";
        $this->execQuery($query, [$id]);
    }

    //Mie à jours d'un article
    public function update($id, $title, $html_content, $author_id){
        $this->getDB(); 
        $query = "UPDATE article SET title=?, html_content=?, author_id=?, edit_date=NOW() WHERE id=?";
        $this->execQuery($query,[$title, $html_content, $author_id, $id]);
    }

    //Insertion d'un article
    public function insert($title, $html_content, $author_id){
        $this->getDB(); 
        $query = "INSERT INTO article(title, html_content, author_id, publish_date) VALUES (?, ?, ?, NOW()";
        $this->execQuery($query, [$title, $html_content, $author_id]);
    }


}



?>