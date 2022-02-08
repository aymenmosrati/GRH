<?php
    $vid = $_POST['id'];          
    $vBanques= $_POST['Nom_Banques'];
    require_once('../../Banques.php');
    $banques = new Banques();
    $banques->setBanques($vBanques);
    $banques->Modification($vid);
    header("location:../../liste_Banques.php");

?>