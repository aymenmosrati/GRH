<?php
$date_min=date("Y-m",strtotime(" -1 month"));
$date_max=date("Y-m",strtotime(" +1 month"));
require_once('Reglage.php');
$CNSS = new Reglage();
$cnss = $CNSS->edit();
require_once('Employe.php');
$Salaires = new Employe();
$stmt = $Salaires->editAll();
?>
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
          <form action="Calcule.php" method="POST">
          <a href='liste_Fichie_Paie.php' class="btn btn-outline-primary">Liste de Fiche de Paie</a>
            <div class="d-flex">
              <div class="mr-auto p-2">
                <h2 class='text-primary'>Gestion de Salaire</h2>
              </div>
              <div>
                <ul class="nav navbar-right panel_toolbox">
                  <label>Chercher :<input type="search" class="form-control input-sm" placeholder="" aria-controls="datatable"></label>
                </ul>
                <br>
               <button type='submit' name='submit' class='btn btn-outline-success'/><i class='fa fa-calculator' aria-hidden='true'> </i> Calcule</input>
              </div>
            </div>
            <div class="" style="margin:10px ;">
                <label class="inlinde"><span class="lbl">Anneé</span></label>
                <input type="month" id="Annee" name='Annee"<?php echo $res[0] ?>"' min="<?php echo $date_min ?>" max="<?php echo $date_max ?>">
            </div>
              <?php
             
              $nbr = count($stmt);
              if ($nbr == 0) {
                echo "<b class='text-danger'>Oucun Salaires pour le moment </b>";
              } else {
                echo "<table  class='table table-light table-striped' style='width: 100%;'>";
                echo "<thead><tr role='row'><th width='2%'>Id</th><th width='15%'>Liste des employés</th><th width='6%'>Mois</th>
                        <th style='width: 50px;'>Salaire</th><th style='width: 50px;'>CNSS</th><th style='width: 70px;'>Primé</th><th style='width: 69px;'>Nombre de jours absence</th><th style='width: 49px;'>Avances </th></tr></thead><tbody>";
                foreach ($stmt as $res) {
                  echo "<tr style='fontsize:2'>
                  <td>" . $res[0] . "</td>
                  <td><i class='ace-icon fa fa-user green'></i> " . $res[1] . " " . $res[2] . "</td>
                  <td>08/2021</td>
                  <td> " . $res[24] . "</td>
                  <td>" . $cnss[1] . "</td>
                  <td>" . $res[26] . "</td>
                  <td><input type='Number' name='jour".$res[0]."' class='' placeholder='0.000'></td>
                  <td><input type='Number' placeholder='0.000' name='avances".$res[0]."'></td>
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