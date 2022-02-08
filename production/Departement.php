<?php
require_once("Mysql.php");
class Departement extends Mysql
{
    private $id;

    private $Departement; 

    public function getId()
    {
        return $this->id;
    }

    public function getDepartement()
    {
        return $this->Departement;
    }

    public function setDepartement(string $Departement)
    {
        $this->Departement = $Departement;
        return $this;
    }
   
    public function ajouter()
    {
        if (
            !isset($this->Departement)
        )
            return false;

        $q = "INSERT INTO departement (Departement) 
		      VALUES ('$this->Departement')";
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
        $res = $this->connexion()->query("SELECT * from departement ");
        $dprtms = $res->fetchAll();
        return  $dprtms;
    }
    public function edit($id)
    {
        $res = $this->connexion()->query("SELECT * from departement WHERE id=$id ");
        $dprtms = $res->fetch();
        return  $dprtms;
    }

    public function edit1()
    {
        $res = $this->connexion()->query("SELECT * from departement");
        $dprtms = $res->fetch();
        return  $dprtms;
    }

    public function supprimer($id)
    {
        $q="DELETE from departement WHERE id=$id";
        $res = $this->connexion()->exec($q);
        return  $res;  
    }

    public function Modification($id)
    {
        $q="UPDATE departement set  Departement='$this->Departement' WHERE id=$id";
        $res = $this->connexion()->exec($q); 
        return  $res;
    }
}

