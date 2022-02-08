<?php

$vid= $_GET['id'];
// parametre de l'etat civil
$vnom= $_GET['nom'];
$vPrenom= $_GET['Prenom'];
$vemail= $_GET['email'];
$vtelephone= $_GET['telephone'];
$vGenre= $_GET['Genre'];
$vSituation= $_GET['Situation'];
$vnomjeune= $_GET['nomjeune'];
$vnbr_enfant= $_GET['nbr_enfant'];
$vdate_naissance= $_GET['date_naissance'];
$vNationalite= $_GET['Nationalite'];

//  parametre de contrat
$vNature= $_GET['Nature'];
$vPost= $_GET['Post'];
$vDepartement= $_GET['Departement'];
$vdate_debut= $_GET['date_debut'];
$vdate_fin= $_GET['date_fin'];
$vdate_embauche= $_GET['date_embauche'];
$vdate_depart= $_GET['date_depart'];

//  parametre de Coordonnées
$vAdresse= $_GET['Adresse'];
$vCode_Postal= $_GET['Code_Postal'];
$vRIB_Banque= $_GET['RIB_Banque'];
$vNom_Banque= $_GET['Nom_Banque'];
$vNom_guiche= $_GET['Nom_guiche'];
$vMode_paiement= $_GET['Mode_paiement'];


//  parametre de Paie
$vSalaire_Base= $_GET['Salarie'];
$vPrix_heure= $_GET['Horaire'];
$vPrime= $_GET['prime'];
foreach($vPrime as $vP){
$prime+=$vP;
}

//echo $prime;

require_once('Employe.php');
$Employe = new Employe();
$Employe->setnom($vnom);
$Employe->setPrenom($vPrenom);
$Employe->setemail($vemail);
$Employe->settelephone($vtelephone);
$Employe->setGenre($vGenre);
$Employe->setSituation($vSituation);
$Employe->setnomjeune($vnomjeune);
$Employe->setnbr_enfant($vnbr_enfant);
$Employe->setdate_naissance($vdate_naissance);
$Employe->setNationalite($vNationalite);
// set de contrat 
$Employe->setNature($vNature);
$Employe->setPost($vPost);
$Employe->setDepartement($vDepartement);
$Employe->setdate_debut($vdate_debut);
$Employe->setdate_fin($vdate_fin);
$Employe->setdate_embauche($vdate_embauche);
$Employe->setdate_depart($vdate_depart);
// set de coordonneé
$Employe->setAdresse($vAdresse);
$Employe->setCode_Postal($vCode_Postal);
$Employe->setRIB_Banque($vRIB_Banque);
$Employe->setNom_Banque($vNom_Banque);
$Employe->setNom_guiche($vNom_guiche);
$Employe->setMode_paiement($vMode_paiement);
// set de paie
$Employe->setSalaire_Base($vSalaire_Base);
$Employe->setPrix_heure($vPrix_heure);
$Employe->setPrime($prime);

$res= $Employe->Modification($vid);
if($res){
    header("location:liste_employe.php?res=$res"); 
}else{
    echo "<center><b><span style='color:red'>erreur de Modification dans la Formulaire d'employe</span></b></center>";
}
?>   



