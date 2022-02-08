
<?php
$id =$_REQUEST['dd'];

 require_once('../Employe.php');
 $employe = new Employe();
 $stmt = $employe ->supprimer($id);


 if(!$stmt){
    header("location:../liste_employe.php?com=$coentaire");
 }else{
    header("location:../liste_employe.php");
 }

?>
