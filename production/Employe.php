<?php
require_once("Mysql.php");
class Employe extends Mysql
{
    private $id;

    private $nom;

    private $Prenom;

    private $email; 

    private $telephone;

    private $Genre;

    private $Situation;

    private $nomjeune;

    private $nbr_enfant;

    private $date_naissance;

    private $Nationalite;

    // var de contrat

    private $Nature;

    private $Post;

    private $Departement;

    private $date_debut;

    private $date_fin;

    private $date_embauche;

    private $date_depart; 

    // var de coordonneé

    private $Adresse;

    private $Code_Postal;

    private $RIB_Banque;

    private $Nom_Banque; 

    private $Nom_guiche;

    private $Mode_paiement;
    
    // var de paie

    private $Salaire_Base;

    private $Prix_heure; 

    private $Prime;


    public function getNationalite()
    {
        return $this->Nationalite;
    }

    public function setNationalite(string $Nationalite)
    {
        $this->Nationalite = $Nationalite;
        return $this;
    }

    public function getdate_naissance()
    {
        return $this->date_naissance;
    }

    public function setdate_naissance($date_naissance)
    {
        $this->date_naissance = $date_naissance;
        return $this;
    }

    public function getnbr_enfant()
    {
        return $this->nbr_enfant;
    }

    public function setnbr_enfant($nbr_enfant)
    {
        $this->nbr_enfant = $nbr_enfant;
        return $this;
    }

    public function getnomjeune()
    {
        return $this->nomjeune;
    }

    public function setnomjeune(string $nomjeune)
    {
        $this->nomjeune = $nomjeune;
        return $this;
    }

    public function getSituation()
    {
        return $this->Situation;
    }

    public function setSituation(string $Situation)
    {
        $this->Situation = $Situation;
        return $this;
    }
    public function getGenre()
    {
        return $this->Genre;
    }

    public function setGenre(string $Genre)
    {
        $this->Genre = $Genre;
        return $this;
    }

    public function gettelephone()
    {
        return $this->telephone;
    }

    public function settelephone($telephone)
    {
        $this->telephone = $telephone;
        return $this;
    }

    public function getemail()
    {
        return $this->email;
    }

    public function setemail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function getPrenom()
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom)
    {
        $this->Prenom = $Prenom;
        return $this;
    }

    public function getnom()
    {
        return $this->nom;
    }

    public function setnom(string $nom)
    {
        $this->nom = $nom;
        return $this;
    }
    public function getId()
    {
        return $this->id;
    }

    // set et get contrat

    public function getNature()
    {
        return $this->Nature;
    }

    public function setNature(string $Nature)
    {
        $this->Nature = $Nature;
        return $this;
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
    public function getDepartement()
    {
        return $this->Departement;
    }

    public function setDepartement(string $Departement)
    {
        $this->Departement = $Departement;
        return $this;
    }

    public function getdate_debut()
    {
        return $this->date_debut;
    }

    public function setdate_debut($date_debut)
    {
        $this->date_debut = $date_debut;
        return $this;
    
    }

    public function getdate_fin()
    {
        return $this->date_fin;
    }

    public function setdate_fin($date_fin)
    {
        $this->date_fin = $date_fin;
        return $this;
    }

    public function getdate_embauche()
    {
        return $this->date_embauche;
    }

    public function setdate_embauche($date_embauche)
    {
        $this->date_embauche = $date_embauche;
        return $this;
    }

    public function getdate_depart()
    {
        return $this->date_depart;
    }

    public function setdate_depart($date_depart)
    {
        $this->date_depart = $date_depart;
        return $this;
    }

    // get et set coordonneé

    public function getAdresse()
    {
        return $this->Adresse;
    }
    public function setAdresse($Adresse)
    {
        $this->Adresse = $Adresse;
        return $this;
    }
    public function getCode_Postal()
    {
        return $this->Code_Postal;
    }

    public function setCode_Postal($Code_Postal)
    {
        $this->Code_Postal = $Code_Postal;
        return $this;
    }
    public function getRIB_Banque()
    {
        return $this->RIB_Banque;
    }

    public function setRIB_Banque($RIB_Banque)
    {
        $this->RIB_Banque = $RIB_Banque;
        return $this;
    }
    public function getNom_Banque()
    {
        return $this->Nom_Banque;
    }

    public function setNom_Banque(string $Nom_Banque)
    {
        $this->Nom_Banque = $Nom_Banque;
        return $this;
    }
    public function getNom_guiche()
    {
        return $this->Nom_guiche;
    }

    public function setNom_guiche($Nom_guiche)
    {
        $this->Nom_guiche = $Nom_guiche;
        return $this;
    }
    public function getMode_paiement()
    {
        return $this->Mode_paiement;
    }

    public function setMode_paiement(string $Mode_paiement)
    {
        $this->Mode_paiement = $Mode_paiement;
        return $this;
    }

    // get et set de paie

    public function getSalaire_Base()
    {
        return $this->Salaire_Base;
    }

    public function setSalaire_Base(string $Salaire_Base)
    {
        $this->Salaire_Base = $Salaire_Base;
        return $this;
    }
    public function getPrix_heure()
    {
        return $this->Prix_heure;
    }

    public function setPrix_heure(string $Prix_heure)
    {
        $this->Prix_heure = $Prix_heure;
        return $this;
    }
    
    public function getPrime()
    {
        return $this->Prime;
    }

    public function setPrime($Prime)
    {
        $this->Prime = $Prime;
        return $this;
    }
      public function ajouter()
    {
        if (
            !isset($this->nom) ||
            !isset($this->Prenom) ||
            !isset($this->email)||
            !isset($this->telephone)||
            !isset($this->Genre)||
            !isset($this->Situation)||
            !isset($this->nomjeune)||
            !isset($this->nbr_enfant)||
            !isset($this->date_naissance)||
            !isset($this->Nationalite) ||
            !isset($this->Nature) ||
            !isset($this->Post) ||
            !isset($this->Departement) ||
            !isset($this->date_debut) ||
            !isset($this->date_fin)||
            !isset($this->date_embauche) ||
            !isset($this->date_depart) ||
            !isset($this->Adresse) ||
            !isset($this->Code_Postal) ||
            !isset($this->RIB_Banque)||
            !isset($this->Nom_Banque)||
            !isset($this->Nom_guiche)||
            !isset($this->Mode_paiement) ||
            !isset($this->Salaire_Base) ||
            !isset($this->Prix_heure) ||
            !isset($this->Prime)
        )
            return false;

        $q = "INSERT INTO employe (nom, Prenom, email, telephone, Genre,
         Situation, nomjeune, nbr_enfant, date_naissance, Nationalite,
         Nature, Post, Departement, date_debut, date_fin, date_embauche, date_depart,
         Adresse, Code_Postal, RIB_Banque, Nom_Banque, Nom_guiche, Mode_paiement,Salaire_Base, Prix_heure, Prime) 
		      VALUES ('$this->nom' ,'$this->Prenom' ,'$this->email'      
              ,'$this->telephone', '$this->Genre', '$this->Situation'
              , '$this->nomjeune', '$this->nbr_enfant', '$this->date_naissance'
              , '$this->Nationalite','$this->Nature' ,'$this->Post'
               ,'$this->Departement','$this->date_debut','$this->date_fin'
               ,'$this->date_embauche','$this->date_depart',
               '$this->Adresse' ,'$this->Code_Postal' ,'$this->RIB_Banque' ,'$this->Nom_Banque'
              ,'$this->Nom_guiche', '$this->Mode_paiement','$this->Salaire_Base' ,'$this->Prix_heure' , '$this->Prime' )";
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
        $res = $this->connexion()->query("SELECT * from employe ");
        $les_contrats = $res->fetchAll();
        return  $les_contrats;
    }

    public function editAlll()
    {
        $res = $this->connexion()->query("SELECT * from employe ");
        $les_contrats = $res->fetchAll();
        return  $les_contrats;
    }

    public function edit($id)
    {
        $res = $this->connexion()->query("SELECT * from employe WHERE id=$id ");
        $stmt = $res->fetch();
        return  $stmt;
    }

    public function edit1()
    {
        $res = $this->connexion()->query("SELECT * from employe ");
        $stmt = $res->fetch();
        return  $stmt;
    }

    public function supprimer($id)
    {
        $q="DELETE * from employe WHERE id=$id";
        $res = $this->connexion()->exec($q);
        return $res;  
    }

    public function Modification($id)
    {
        $q="UPDATE employe set
                nom='$this->nom' , Prenom='$this->Prenom' , email='$this->email'      
              , telephone='$this->telephone', Genre='$this->Genre', Situation='$this->Situation'
              , nomjeune='$this->nomjeune', nbr_enfant='$this->nbr_enfant', date_naissance='$this->date_naissance'
              , Nationalite='$this->Nationalite', Nature='$this->Nature' , Post='$this->Post'
              , Departement='$this->Departement', date_debut='$this->date_debut', date_fin='$this->date_fin'
              , date_embauche='$this->date_embauche', date_depart='$this->date_depart'
              , Adresse='$this->Adresse' , Code_Postal='$this->Code_Postal' , RIB_Banque='$this->RIB_Banque'
              , Nom_Banque='$this->Nom_Banque', Nom_guiche='$this->Nom_guiche', Mode_paiement='$this->Mode_paiement'
              , Salaire_Base='$this->Salaire_Base' , Prix_heure='$this->Prix_heure' , Prime='$this->Prime'
          WHERE id=$id";
        $res = $this->connexion()->exec($q); 
        return  $res;
    }
}

