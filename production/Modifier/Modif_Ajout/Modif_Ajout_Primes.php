<?php
    $vid = $_POST['id'];          
    $vPrimes= $_POST['Nom_Primes'];
    $vMontan= $_POST['Montant_Primes'];

    require_once('../../Primes.php');
    $primes = new Primes();
    $primes->setPrimes($vPrimes);
    $primes->setMontant($vMontan);

    $primes->Modification($vid);
    header("location:../../liste_Primes.php");

?>