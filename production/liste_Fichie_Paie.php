
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
          <div class="x_panel">
          <form action="" method="POST">
          <label style="color:blue; font-size:25px;">Liste de Fiche de Paie</label>
            <div class="d-flex">
              <div>
                <ul class="nav navbar-right panel_toolbox">
                  <label>Chercher :<input type="search" class="form-control input-sm" placeholder="" aria-controls="datatable"></label>
                </ul>
                <br>
              </div>
            </div>
            
              <?php
              require_once('Employe.php');
              $employe = new Employe();
              $stmt = $employe->editAll();
              $nbr = count($stmt);
              if ($nbr == 0) {
                echo "<b class='text-danger'>Oucun Salaires pour le moment </b>";
              } else {
                echo "<table  class='table table-light table-striped' style='width: 100%;'>";
                echo "<thead><tr role='row'>
                    <th width='3%'>Id</th>
                    <th width='18%'>Liste des employés</th>
                    <th width='10%'>Mois</th>
                    <th width='10%'>Post</th>
                    <th width='10%'>Département</th>
                    <th width='10%'>Téléphone</th>
                    <th width='15%'>Email</th>
                    <th width='10%'>Ville</th>
                    <th width='15%' >Fichie de Paie</th>
                </tr></thead><tbody>";
                foreach ($stmt as $res) {
                  echo "<tr style='fontsize:2'>
                  <td>" . $res[0] . "</td>
                  <td><i class='ace-icon fa fa-user green'></i> " . $res[1] . " " . $res[2] . "</td>
                  <td>08/2021</td>
                  <td>" . $res[16] . "</td>
                  <td>" . $res[17] . "</td>
                  <td>" . $res[4] . "</td>
                  <td>" . $res[3] . "</td>
                  <td>" . $res[10] . "</td>
                  <td class='btn btn-xs btn-success'><a href='Fpdf/test.php?dd=$res[0]'><i class='fa fa-credit-card bigger-120'></i></a></td>
                  </tr>";
                }
                echo "</tbody></table>";
              }
              ?>
            </form>
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