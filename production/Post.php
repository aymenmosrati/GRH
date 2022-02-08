<?php
require_once("Mysql.php");
class Post extends Mysql
{
    private $id;

    private $Post; 

    public function getId()
    {
        return $this->id;
    }

    public function getPost()
    {
        return $this->Post;
    }

    public function setPost(string $Post)
    {
        $this->Post = $Post;
        return $this;
    }
   
    public function ajouter()
    {
        if (
            !isset($this->Post)
        )
            return false;

        $q = "INSERT INTO post (Post) 
		      VALUES ('$this->Post')";
        $stmt = $this->connexion()->exec($q);
      
        if (!$stmt)
        echo ('echec insertion' . $this->connexion()->errorInfo());
        else {
        $r = 1;    // Renvoi l'id de l'enregistrement ajouté	
        return $r;
        }
    }  

    public function editAll()
    {
        $res = $this->connexion()->query("SELECT * from post ");
        $pst = $res->fetchAll();
        return  $pst;
    }
    public function edit()
    {
        $res = $this->connexion()->query("SELECT * from post ");
        $pst = $res->fetch();
        return  $pst;
    }

    public function edit1($id)
    {
        $res = $this->connexion()->query("SELECT * from post WHERE id=$id ");
        $pst = $res->fetch();
        return  $pst;
    }

    public function supprimer($id)
    {
        $q="DELETE from post WHERE id=$id";
        $res = $this->connexion()->exec($q);
        return  $res;  
    }

    public function Modification($id)
    {
        $q="UPDATE post set  Post='$this->Post' WHERE id=$id ";
        $res = $this->connexion()->exec($q); 
        return  $res;
    }
}

