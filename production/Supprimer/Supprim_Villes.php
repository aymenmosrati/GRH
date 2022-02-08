<?php
$id =$_REQUEST['dd'];

require_once('../Villes.php');
$villes = new Villes();
$stmt = $villes ->supprimer($id);
if(!$stmt){
    echo('echec de suppprition'.$this->connexion()->errorInfo());
}else{
    header("location:../liste_Villes.php");
}

?>