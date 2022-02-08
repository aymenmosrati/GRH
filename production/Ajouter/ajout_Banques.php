
<?php
    $vBanques= $_POST['Banques'];

    require_once('../Banques.php');
    $banques = new Banques();
    $stmt= $banques->edit();
    if($stmt['1'] == $vBanques || $vBanques =="" )
    {
       echo "<center><b><span style='color:red'>Ce Banque est deja exist </span></b></center>";
    }else{
        $banques->setBanques($vBanques);
        $stmt= $banques->ajouter();
        header("location:../liste_Banques.php?");
    }

?>