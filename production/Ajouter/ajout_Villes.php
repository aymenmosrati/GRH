
<?php
    $vVilles= $_POST['Villes'];

    require_once('../Villes.php');
    $villes = new Villes();
    $stmt= $villes->edit();
    if($stmt['1'] == $vVilles || $vVilles =="" )
    {
       echo "<center><b><span style='color:red'>Ce Villes est deja exist </span></b></center>";
    }else{
        $villes->setVilles($vVilles);
        $stmt= $villes->ajouter();
        header("location:../liste_Villes.php?");
    }

?>