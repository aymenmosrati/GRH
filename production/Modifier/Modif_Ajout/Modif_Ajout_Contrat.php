<?php
    $vid = $_POST['id'];          
    $vContrat= $_POST['Nom_Contrat'];
    require_once('../../Contrat.php');
    $contrat = new Contrat();
    $contrat->setContrat($vContrat);
    $contrat->Modification($vid);
    header("location:../../liste_Contrat.php");

?>