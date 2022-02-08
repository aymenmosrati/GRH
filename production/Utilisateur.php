<?php
require_once("Mysql.php");
class Utilisateur extends Mysql
{ 
    private $id;

    private $nom;

    private $motpasse;

    
    public function getId()
    {
        return $this->id;
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
    public function getmotpasse()
    {
        return $this->motpasse;
    }

    public function setmotpasse(string $motpasse)
    {
        $this->motpasse = $motpasse;

        return $this;
    }
   
    public function ajouter()
    {
        if (
            !isset($this->nom) ||
            !isset($this->motpasse) 
        )
            return false;

        $q = "INSERT INTO utilisateur (nom, motpasse) 
		      VALUES ('$this->nom' ,'$this->motpasse')";
        $stmt = $this->connexion()->exec($q);
        if (!$stmt)
            echo ('echec insertion' . $this->connexion()->errorInfo());
        else {
            $r = 1;    // Renvoi l'id de l'enregistrement ajouté	
            return $r;
        }
    }  

    public function editBy()
    {
        $res = $this->connexion()->query("SELECT * from utilisateur ");
        $les_utls = $res->fetch();
        return  $les_utls;
    }

    /*
    function encryption ($password){
        $BlowFishFormate = "$2y$10$";
        $salt = generateSalt(22);
        $BlowFish_Plus_Salt = $BlowFishFormate . $salt;
        $Hash = crypt($password, $BlowFish_Plus_Salt);
        return $Hash;
    }

    function generateSalt($length){
        $uniqueRandomString = md5(uniqid(mt_rand(), true));
        $base64String = base64_encode($uniqueRandomString);
        $modifiedBase64String = str_replace('+','.',$base64String);
        $salt = substr($modifiedBase64String,0,$length);
        return $salt;
    }

    function passwordCheck($password, $existingHash){
        $Hash = crypt($password, $existingHash);
        if($Hash === $existingHash)
            return true;
        else
            return false;
    }
    */
}
