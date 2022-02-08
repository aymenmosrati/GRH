<?php
require_once("Mysql.php");
class Devises extends Mysql
{
    private $id;

    private $Devises; 

    public function getId()
    {
        return $this->id;
    }

    public function getDevises()
    {
        return $this->Devises;
    }

    public function setDevises(string $Devises)
    {
        $this->Devises = $Devises;
        return $this;
    }
   
    public function ajouter()
    {
        if (
            !isset($this->Devises)
        )
            return false;

        $q = "INSERT INTO devises (Devises) 
		      VALUES ('$this->Devises')";
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
        $res = $this->connexion()->query("SELECT * from devises ");
        $stmt = $res->fetchAll();
        return  $stmt;
    }
    public function edit()
    {
        $res = $this->connexion()->query("SELECT * from devises ");
        $stmt = $res->fetch();
        return  $stmt;
    }
    public function edit1($id)
    {
        $res = $this->connexion()->query("SELECT * from devises WHERE id=$id");
        $stmt = $res->fetch();
        return  $stmt;
    }
    public function supprimer($id)
    {
        $q="DELETE from devises WHERE id=$id";
        $res = $this->connexion()->exec($q);
        return  $res;  
    }

    public function Modification($id)
    {
        $q="UPDATE devises set  Devises='$this->Devises' WHERE id=$id";
        $res = $this->connexion()->exec($q); 
        return  $res;
    }
}

