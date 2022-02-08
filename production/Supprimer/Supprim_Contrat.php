<?php
$id =$_REQUEST['dd'];

require_once('../Contrat.php');
$contrat = new Contrat();
$stmt = $contrat ->supprimer($id);
if(!$stmt){
    echo('echec de suppprition'.$this->connexion()->errorInfo());
}else{
    header("location:../liste_Contrat.php");
}

?>