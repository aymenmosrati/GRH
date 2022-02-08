<?php
if(isset($_POST['submit'])){
    $vNom = $_POST['Nom'];
    $vMotPasse= $_POST['MotPasse'];
    require_once('Utilisateur.php');
    $utilisateur = new Utilisateur();
    $les_utls = $utilisateur->editBy() ;

    if(isset($_POST['submit'])){
        if($les_utls['Nom']==$vNom && $les_utls['MotPasse']==$vMotPasse){
            header("location:tableau_bord.php ?retour=$retour");
        }else
        header("location:inscrire_form.php ?retour=$retour"); 
    }
}    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Connexion-Gestion de Salaire</title>
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form action="" method="POST">
                        <h1>Remplir </h1>
                        <div>
                            <input type="text" class="form-control" name="Nom" placeholder="Nom" required="" />
                        </div>
                        <div>
                            <input type="password" class="form-control" name="MotPasse" placeholder="Mot De Passe" required="" />
                        </div>


                            <?php
                                if(isset($_REQUEST['retour'])){
                                 $res=$_REQUEST['retour'];
                                   if(!$res){
                                     echo "<center><b><span style='color:red'>Erreur  L'insertion  de  L'admin</span></b></center>";
                                    }
                                }
                            ?> 



                        <div>
                            <button class="btn btn-secondary btn-lg" name="submit" type="submit">Connexion</button>
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">
                            <div class="clearfix"></div>
                            <br />
                            <div>
                                <h1><i class="fa fa-paw"></i> Gestion de Salaire</h1>
                            </div>
                        </div>
                    </form>             
                </section>
            </div>
        </div>
    </div>
</body>
</html>