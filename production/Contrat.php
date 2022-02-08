<?php
require_once("Mysql.php");
class Contrat extends Mysql
{
    private $id;

    private $Contrat; 

    public function getId()
    {
        return $this->id;
    }

    public function getContrat()
    {
        return $this->Contrat;
    }

    public function setContrat(string $Contrat)
    {
        $this->Contrat = $Contrat;
        return $this;
    }
   
    public function ajouter()
    {
        if (
            !isset($this->Contrat)
        )
            return false;

        $q = "INSERT INTO contrat (Contrat) 
		      VALUES ('$this->Contrat')";
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
        $res = $this->connexion()->query("SELECT * from contrat ");
        $stmt = $res->fetchAll();
        return  $stmt;
    }
    public function edit()
    {
        $res = $this->connexion()->query("SELECT * from contrat ");
        $stmt = $res->fetch();
        return  $stmt;
    }
    public function edit1($id)
    {
        $res = $this->connexion()->query("SELECT * from contrat WHERE id=$id");
        $stmt = $res->fetch();
        return  $stmt;
    }
    public function supprimer($id)
    {
        $q="DELETE from contrat WHERE id=$id";
        $res = $this->connexion()->exec($q);
        return  $res;  
    }

    public function Modification($id)
    {
        $q="UPDATE contrat set  Contrat='$this->Contrat' WHERE id=$id";
        $res = $this->connexion()->exec($q); 
        return  $res;
    }
}

