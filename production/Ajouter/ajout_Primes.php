
<?php
   $vPrimes= $_POST['Primes'];
   $vMontant= $_POST['Montant'];
  
   require_once('../Primes.php');
   $primes = new Primes();
   $stmt= $primes->edit();
   if($stmt['1'] == $vPrimes || $vPrimes =="" )
   {
      echo "<center><b><span style='color:red'>Ce Primes est deja exist </span></b></center>";
   }else{
       $primes->setPrimes($vPrimes);
       $primes->setMontant($vMontant);
       $stmt= $primes->ajouter();
       header("location:../liste_Primes.php?");
   }

?>