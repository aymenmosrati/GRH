<!DOCTYPE html>
<html lang="en">
  <head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>Gestion de Salaire</title>  
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- FullCalendar -->
    <link href="../vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="../vendors/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print">
    <!-- Custom styling plus plugins -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php
          include "left_side_bar.php";
        ?>

        

        <!-- page content -->
                <div class="right_col" role="main">
                  <div class="col-md-12 col-sm-12 ">

                    <!--start Ajouter employé -->

                    <a href="form_Civilite.php" role="button" class="btn btn-outline-primary"><span style="font-size:20px; color:blue;">+</span></a>
                 
                    <!-- end ajoute employé -->
                    <div class="x_panel">
                    <div class="d-flex">
                      <div class="mr-auto p-2">
                      <h2 class='text-primary'>Liste des employés</h2>
                      </div>

                      <div>
                      <ul class="nav navbar-right panel_toolbox">
                        <label>Chercher :<input type="search" class="form-control input-sm" placeholder="" aria-controls="datatable"></label>
                      </ul>
                      </div>               
                    </div>
                        
                        <?php
                        
                          require_once('Employe.php');
                          $Employe = new Employe();
                          $stmt = $Employe->editAll();
                          $nbr = count($stmt);
                          if ($nbr == 0) {
                            echo "<b class='text-danger'>Oucun employé pour le moment </b>";
                          } else {
                          echo "<table  class='table table-striped jambo_table bulk_action' style='width: 100%;' >";
                          echo "<thead><tr role='row'><th></th><th>Id</th><th>Nom</th><th>Prenom</th><th>Email</th><th>Teléphone</th><th>Post</th><th>Département</th><th>Ville</th><th>Adresse</th><th>Action</th></tr></thead><tbody>";
                          foreach ($stmt as $res) {
                          echo "<tr style='fontsize:2'><td>#</td><td>". $res[0] . "</td><td>" . $res[1] . "</td><td>" . $res[2] . "</td><td>" . $res[3] . "</td><td>" . $res[4] . "</td><td>" . $res[16] . "</td><td>" . $res[17] . "</td><td>" . $res[10] . "</td><td>" . $res[18] . "</td>";
                          echo "<td>
                          <a  class='btn btn-primary' href='Modif_Employe.php?dd=$res[0]'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
                          <a class='btn btn-danger' name='supp' href='Supprimer/Supprim_Employe.php?dd=$res[0]' onclick='return confirm(\"Es-tu sûr pour Supprimer. Si vous êtres sûr , supprimer ce employe dans la liste de Fiche de Paie puis supprimer, sinon annule ?\")'><i class='fa fa-trash-o'></i></a>                          
                          </td></tr>";
                          }
                            echo "</tbody></table>";
                          }
                        ?>

                    </div>
                  </div>
                </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
          Remplir par - L'Admin de Société
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- FullCalendar -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/fullcalendar/dist/fullcalendar.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>
