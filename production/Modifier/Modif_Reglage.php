<?php

require_once('../Reglage.php');  
$vCnss=$_POST['Cnss'];
$vMois=$_POST['Mois'];
$reglage = new Reglage();
$reglage->setCnss($vCnss);
$reglage->setMois($vMois);
$stmt = $reglage->Modification();
header('location:../liste_Salaires.php');


?>