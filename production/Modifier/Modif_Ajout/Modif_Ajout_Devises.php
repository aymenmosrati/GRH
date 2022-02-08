<?php
    $vid = $_POST['id'];          
    $vDevises= $_POST['Nom_Devises'];
    require_once('../../Devises.php');
    $devises = new Devises();
    $devises->setDevises($vDevises);
    $devises->Modification($vid);
    header("location:../../liste_Devises.php");

?>