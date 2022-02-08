<?php
require_once("Mysql.php");
class Banques extends Mysql
{
    private $id;

    private $Banques; 

    public function getId()
    {
        return $this->id;
    }

    public function getBanques()
    {
        return $this->Banques;
    }

    public function setBanques(string $Banques)
    {
        $this->Banques = $Banques;
        return $this;
    }
   
    public function ajouter()
    {
        if (
            !isset($this->Banques)
        )
            return false;

        $q = "INSERT INTO banques (Banques) 
		      VALUES ('$this->Banques')";
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
        $res = $this->connexion()->query("SELECT * from banques ");
        $stmt = $res->fetchAll();
        return  $stmt;
    }
    public function edit()
    {
        $res = $this->connexion()->query("SELECT * from banques ");
        $stmt = $res->fetch();
        return  $stmt;
    }
    public function edit1($id)
    {
        $res = $this->connexion()->query("SELECT * from banques WHERE id=$id ");
        $stmt = $res->fetch();
        return  $stmt;
    }
    public function supprimer($id)
    {
        $q="DELETE from banques WHERE id=$id";
        $res = $this->connexion()->exec($q);
        return  $res;  
    }

    public function Modification($id)
    {
        $q="UPDATE banques set  Banques='$this->Banques' WHERE id=$id";
        $res = $this->connexion()->exec($q); 
        return  $res;
    }
}

