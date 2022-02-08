<?php
$id =$_REQUEST['dd'];

require_once('../Primes.php');
$primes = new Primes();
$stmt = $primes ->supprimer($id);
if(!$stmt){
    echo('echec de suppprition'.$this->connexion()->errorInfo());
}else{
    header("location:../liste_Primes.php");
}

?>