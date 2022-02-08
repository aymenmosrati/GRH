<?php
require_once("Mysql.php");
class Villes extends Mysql
{
    private $id;

    private $Villes; 

    public function getId()
    {
        return $this->id;
    }

    public function getVilles()
    {
        return $this->Villes;
    }

    public function setVilles(string $Villes)
    {
        $this->Villes = $Villes;
        return $this;
    }
   
    public function ajouter()
    {
        if (
            !isset($this->Villes)
        )
            return false;

        $q = "INSERT INTO villes (Villes) 
		      VALUES ('$this->Villes')";
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
        $res = $this->connexion()->query("SELECT * from villes ");
        $stmt = $res->fetchAll();
        return  $stmt;
    }
    public function edit()
    {
        $res = $this->connexion()->query("SELECT * from villes ");
        $stmt = $res->fetch();
        return  $stmt;
    }
    public function edit1($id)
    {
        $res = $this->connexion()->query("SELECT * from villes WHERE id=$id");
        $stmt = $res->fetch();
        return  $stmt;
    }
    public function supprimer($id)
    {
        $q="DELETE from villes WHERE id=$id";
        $res = $this->connexion()->exec($q);
        return  $res;  
    }

    public function Modification($id)
    {
        $q="UPDATE villes set  Villes='$this->Villes' WHERE id=$id";
        $res = $this->connexion()->exec($q); 
        return  $res;
    }
}

