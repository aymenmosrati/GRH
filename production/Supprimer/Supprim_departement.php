<?php
$id =$_REQUEST['dd'];

require_once('../Departement.php');
$departement = new Departement();
$stmt = $departement ->supprimer($id);
if(!$stmt){
    echo('echec de suppprition'.$this->connexion()->errorInfo());
}else{
    header("location:../liste_Departements.php");
}

?>