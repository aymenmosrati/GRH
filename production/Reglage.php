<?php
require_once("Mysql.php");
class Reglage extends Mysql
{
    private $id;

    private $Cnss; 
    
    private $Mois; 

    public function getId()
    {
        return $this->id;
    }

    public function getCnss()
    {
        return $this->Cnss;
    }

    public function setCnss(string $Cnss)
    {
        $this->Cnss = $Cnss;
        return $this; 
    }
   
    public function getMois()
    {
        return $this->Mois;
    }

    public function setMois(string $Mois)
    {
        $this->Mois = $Mois;
        return $this; 
    }
      

    public function editAll()
    {
        $res = $this->connexion()->query("SELECT * from cnss ");
        $stmt = $res->fetchAll();
        return  $stmt;
    }
    public function edit()
    {
        $res = $this->connexion()->query("SELECT * from cnss ");
        $stmt = $res->fetch();
        return  $stmt;
    }

    public function Modification()
    {
        $q="UPDATE cnss set  Cnss='$this->Cnss',Mois='$this->Mois' ";
        $res = $this->connexion()->exec($q); 
        return  $res;
    }
}

