<?php
require_once('Employe.php');
require_once('Reglage.php');
require_once('Fiche.php');
$employe = new Employe();
$Reglage = new Reglage();
$fiche = new Fiche();

$res = $employe->editAll();
$Reg = $Reglage->edit();
$fich = $fiche->select();

$Ane = 'Annee' . $Mat['id'];

if($Ane != $fich['Annee'] ){

  foreach ($res as $Mat) {

    $vjour = 'jour' . $Mat['id'];
    $vavances = 'avances' . $Mat['id'];
    $vMatricule = $Mat['id'];
    $vAnnee = 'Annee' . $Mat['id'];
    $fiche->setMatricule($vMatricule);
    $jour = 0;
    $avances = 0;

    if ($_POST[$vjour] != "") {
      $jour = $_POST[$vjour];
    }
    if ($_POST[$vavances] != "") {
      $avances = $_POST[$vavances];
    }
    $fiche->setjour($jour);
    $fiche->setavances($avances); 
    $fiche->setannee($vAnnee); 
    $ajt=$fiche->ajouter();
    
  }
  
  
  // calcule
  
  foreach ($res as $stmt) {
    $salaire_base = 0;
    $Montant_CNSS = 0;
    $Brut = 0;
    
    // calcule Salaire de Base
    $salaire_base = (($stmt[24] + $stmt[26]) / 26) *(26 - $jour); 
    // calcule cnss
    $Montant_CNSS =($salaire_base * $Reg[1])/100;
    // calcule Salaire de Brut 
    $Brut =  $salaire_base - $Montant_CNSS;
    // calcule IRPP
    $salaire_Impossable = ($salaire_base * $Reg[2]); 
    if(($stmt['Situation']=="Celibataire")){
      $Arrondi = (($salaire_Impossable - ($salaire_Impossable * 0.1)));
    }elseif(($stmt['Situation']=="Marie" || $stmt['Situation']=="Divorce" || $stmt['Situation']=="Veuf") && $stmt['nbr_enfant']== 0 ){
      $Arrondi = (($salaire_Impossable - ($salaire_Impossable * 0.1)) + 300);
    }elseif(($stmt['Situation']=="Marie" || $stmt['Situation']=="Divorce" || $stmt['Situation']=="Veuf") && $stmt['nbr_enfant']== 1 ){
      $Arrondi = (($salaire_Impossable - ($salaire_Impossable * 0.1)) + 400);
    }elseif(($stmt['Situation']=="Marie" || $stmt['Situation']=="Divorce" || $stmt['Situation']=="Veuf") && $stmt['nbr_enfant']== 2 ){
      $Arrondi = (($salaire_Impossable - ($salaire_Impossable * 0.1)) + 500);
    }elseif(($stmt['Situation']=="Marie" || $stmt['Situation']=="Divorce" || $stmt['Situation']=="Veuf") && $stmt['nbr_enfant']== 3 ){
      $Arrondi = (($salaire_Impossable - ($salaire_Impossable * 0.1)) + 600);
    }else{
      $Arrondi = (($salaire_Impossable - ($salaire_Impossable * 0.1)) + 300);
    }
  
    if($Arrondi >= 0 && $Arrondi < 5000 ){ 
     $IRPP = (((($Arrondi * 0.27) + 50) / $Reg[2] ) / 26) * (26 - $jour) ;
    }elseif($Arrondi >= 5000 && $Arrondi < 20000 ){ 
      $IRPP = ((((($Arrondi - 5000 ) * 0.27) + 50) / $Reg[2] ) / 26) * (26 - $jour) ;
    }
    elseif($Arrondi >= 20000 && $Arrondi < 70000 ){ 
      $IRPP = ((((($Arrondi - 20000 ) * 0.27) + 50) / $Reg[2] ) / 26) * (26 - $jour) ;
    }else{
      $IRPP = ((((($Arrondi - 70000 ) * 0.27) + 50) / $Reg[2] ) / 26) * (26 - $jour) ;
    }

    $Net = $salaire_base - ($IRPP + $vavances);
  
    $fiche->setsalaire_base($salaire_base); 
    $fiche->setMontant_CNSS($Montant_CNSS);
    $fiche->setIRPP($IRPP); 
    $fiche->setNet($Net); 
    $calc=$fiche->ajouter();
  
  } 
  if(!$calc && !$ajt){
  echo "<center><b>erreur </b></center>";
  }else{
    header('location:liste_Fichie_Paie.php');
  }



}else{
  echo"<center><b style='color:red'>change le date </b></center>";

}
?>