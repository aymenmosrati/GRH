<?php
    $vid = $_POST['id'];          
    $vVilles= $_POST['Nom_Villes'];
    require_once('../../Villes.php');
    $villes = new Villes();
    $villes->setVilles($vVilles);
    $villes->Modification($vid);
    header("location:../../liste_Villes.php");

?>