<?php
require_once("Mysql.php");
class Fiche extends Mysql
{
    private $Matricule;

    private $id;

    private $jour; 

    private $avances;

    private $annee;

    private $salaire_base;

    private $IRPP;

    private $Net;

    private $Montant_CNSS;

    public function getMatricule()
    {
        return $this->Matricule;
    }

    public function setMatricule($Matricule)
    {
        $this->Matricule = $Matricule;
        return$this;
    }

    public function getid()
    {
        return $this->id;
    }

    public function getjour()
    {
        return $this->jour;
    }

    public function setjour($jour)
    {
        $this->jour = $jour;
        return $this;
    }

    public function getavances()
    {
        return $this->avances;
    }

    public function setavances($avances)
    {
        $this->avances = $avances;
        return $this;
    } 

    public function getannee()
    {
        return $this->annee;
    }

    public function setannee($annee)
    {
        $this->annee = $annee;
        return$this;
    }

    public function getsalaire_base()
    {
        return $this->salaire_base;
    }

    public function setsalaire_base($salaire_base)
    {
        $this->salaire_base = $salaire_base;
        return $this;
    }

    public function getIRPP()
    {
        return $this->IRPP;
    }

    public function setIRPP($IRPP)
    {
        $this->IRPP = $IRPP;
        return $this;
    }

    public function getNet()
    {
        return $this->Net;
    }

    public function setNet($Net)
    {
        $this->Net = $Net;
        return $this;
    }

    public function getMontant_CNSS()
    {
        return $this->Montant_CNSS;
    }

    public function setMontant_CNSS($Montant_CNSS)
    {
        $this->Montant_CNSS = $Montant_CNSS;
        return $this;
    }
   
    public function ajouter()
    {
        if (!isset($this->Matricule)||
            !isset($this->jour)||
            !isset( $this->avances)||
            !isset($this->annee)||
            !isset( $this->salaire_base)||
            !isset($this->IRPP)||
            !isset($this->Net)||
            !isset($this->Montant_CNSS)
            
        )
            return false;

        $q = "INSERT INTO fiche (Matricule, jour, avances, Annee, salaire_base, IRPP, Net, Montant_CNSS) 
		      VALUES ('$this->Matricule', '$this->jour', '$this->avances'
              , '$this->annee', '$this->salaire_base', '$this->IRPP', '$this->Net', '$this->Montant_CNSS')";
        $stmt = $this->connexion()->exec($q);
      
        if (!$stmt)
        echo ('echec insertion' . $this->connexion()->errorInfo());
        else {
          // Renvoi l'id de l'enregistrement ajouté	
        return true;
        }
    }   

    public function editAll()
    {
        $res = $this->connexion()->query("SELECT * from fiche ");
        $stmt = $res->fetchAll();
        return  $stmt;
    }

    public function edit($id)
    {
        $res = $this->connexion()->query("SELECT * from fiche WHERE Matricule=$id ");
        $stmt = $res->fetch();
        return  $stmt;
    }

    public function select()
    {
        $res = $this->connexion()->query("SELECT * from fiche  ");
        $stmt = $res->fetch();
        return  $stmt;
    }

    public function supprimer($id)
    {
        $q="DELETE from fiche WHERE id=$id";
        $res = $this->connexion()->exec($q);
        return  $res;  
    }

    public function Modification($id)
    {
        $q="UPDATE fiche set  jour='$this->jour', avances='$this->avances' WHERE id=$id";
        $res = $this->connexion()->exec($q); 
        return  $res;
    }

}
