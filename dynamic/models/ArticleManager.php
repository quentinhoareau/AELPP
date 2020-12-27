<?php 
class ArticleManager extends Database{

    //Obtenir une liste d'objets articles
    public function getList(){
        $this->getDB();  
        $query = "SELECT * FROM article ";
        return $this->getModel("Article", $query) ;
    }

    //Obtenir une liste d'objets articles
    public function getListPublished(){
        $this->getDB();  
        $query = "SELECT * FROM article WHERE published = 1 ";
        return $this->getModel("Article", $query) ;
    }

    //Obtenir une liste d'objets des 3 derniers articles publié
    public function getLastThree(){
        $this->getDB(); 
        $query = "SELECT * FROM article WHERE published = 1 ORDER BY publish_date ASC LIMIT 3";
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
    public function update($id, $title, $html_content, $author_id, $published){
        $this->getDB(); 
        $query = "UPDATE article SET title=?, html_content=?, author_id=?, edit_date=NOW(), published=? WHERE id=?";
        $this->execQuery($query,[$title, $html_content, $author_id, $published, $id]);
    }

    //Insertion d'un article
    public function add($title, $html_content, $author_id, $published){
        $this->getDB(); 
        $query = "INSERT INTO article(title, html_content, author_id, publish_date, published) VALUES (?, ?, ?, NOW(), ?)";
        $this->execQuery($query, [$title, $html_content, $author_id, $published]);

        $this->getDB();
        return $this->getMaxIdTable("article", "id");
    }


}



?>