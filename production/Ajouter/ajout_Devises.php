
<?php
    $vDevises= $_POST['Devises'];

    require_once('../Devises.php');
    $devises = new Devises();
    $stmt= $devises->edit();
    if($stmt['1'] == $vDevises || $vDevises =="" )
    {
       echo "<center><b><span style='color:red'>Ce Devises est deja exist </span></b></center>";
    }else{
        $devises->setDevises($vDevises);
        $stmt= $devises->ajouter();
        header("location:../liste_Devises.php?");
    }

?>