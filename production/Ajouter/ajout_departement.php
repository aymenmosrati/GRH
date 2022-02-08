
<?php
    $vDepartement= $_POST['Nom'];

    require_once('../Departement.php');
    $departement = new Departement();
    $dprt= $departement->edit1();

    if($dprt['1'] == $vDepartement || $vDepartement=="" )
    {
       echo "<center><b><span style='color:red'>Ce département est deja exist </span></b></center>";
    }else{
        $departement->setDepartement($vDepartement);
        $res= $departement->ajouter();
        header("location:../liste_Departements.php?");
    }

?>
        <!-- echo "<center><b><span style='color:red'>Ce département est deja exist </span></b></center>"; -->


