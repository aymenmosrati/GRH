<?php
$id =$_REQUEST['dd'];

require_once('../Banques.php');
$banques = new Banques();
$stmt = $banques ->supprimer($id);
if(!$stmt){
    echo('echec de suppprition'.$this->connexion()->errorInfo());
}else{
    header("location:../liste_Banques.php");
}

?>
