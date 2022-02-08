<?php
require_once("Mysql.php");
class Primes extends Mysql
{
    private $id;

    private $Primes; 

    private $Montant;

    public function getId()
    {
        return $this->id;
    }

    public function getPrimes()
    {
        return $this->Primes;
    }

    public function setPrimes(string $Primes)
    {
        $this->Primes = $Primes;
        return $this;
    }

    public function getMontant()
    {
        return $this->Montant;
    }

    public function setMontant(string $Montant)
    {
        $this->Montant = $Montant;
        return $this;
    }
   
    public function ajouter()
    {
        if (
            !isset($this->Primes)||
            !isset( $this->Montant)
        )
            return false;

        $q = "INSERT INTO primes (Primes, Montant) 
		      VALUES ('$this->Primes','$this->Montant')";
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
        $res = $this->connexion()->query("SELECT * from primes ");
        $stmt = $res->fetchAll();
        return  $stmt;
    }
    public function edit()
    {
        $res = $this->connexion()->query("SELECT * from primes ");
        $stmt = $res->fetch();
        return  $stmt;
    }
    public function edit1($id)
    {
        $res = $this->connexion()->query("SELECT * from primes WHERE id=$id");
        $stmt = $res->fetch();
        return  $stmt;
    }
    public function supprimer($id)
    {
        $q="DELETE from primes WHERE id=$id";
        $res = $this->connexion()->exec($q);
        return  $res;  
    }

    public function Modification($id)
    {
        $q="UPDATE primes set  Primes='$this->Primes', Montant='$this->Montant' 
        WHERE id=$id";
        $res = $this->connexion()->exec($q); 
        return  $res;
    }
}

