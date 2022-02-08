<?php
$id =$_REQUEST['dd'];

require_once('../Devises.php');
$devises = new Devises();
$stmt = $devises ->supprimer($id);
if(!$stmt){
    echo('echec de suppprition'.$this->connexion()->errorInfo());
}else{
    header("location:../liste_Devises.php");
}

?>