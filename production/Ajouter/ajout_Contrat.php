
<?php
    $vContrat= $_POST['Contrat'];

    require_once('../Contrat.php');
    $contrat = new Contrat();
    $stmt= $contrat->edit();
    if($stmt['1'] == $vContrat || $vContrat=="" )
    {
       echo "<center><b><span style='color:red'>Ce Contrat est deja exist </span></b></center>";
    }else{
        $contrat->setContrat($vContrat);
        $stmt= $contrat->ajouter();
        header("location:../liste_Contrat.php?");
    }

?>