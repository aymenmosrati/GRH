<?php
    $vid = $_POST['id'];          
    $vDepartement= $_POST['Nom_Departement'];
    require_once('../../Departement.php');
    $departement = new Departement();
    $departement->setDepartement($vDepartement);
    $departement->Modification($vid);
    header("location:../../liste_Departements.php");

?>