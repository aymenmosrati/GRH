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

          <!--start Ajouter Post -->

          <button data-toggle="modal" data-target="#Ajoute" role="button" class="btn btn-outline-primary"><span style="font-size:20px;">+</span></button>
          <!-- Modal Ajouter Post -->
          <div class="modal fade" id="Ajoute">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Ajouter un nouvelle Post</h5>
                </div>
                <form action="Ajouter/ajout_Post.php" method="POST">
                  <div class="modal-body">
                    <input type="text" name="Post" class="form-control" placeholder="Nom de nouvelle Post">
                  </div>
                  <div class="exist"></div>
                  <div class="modal-footer">
                    <button class="btn btn-outline-dark" data-dismiss="modal">Annulé</button>
                    <button name="ajout_Post" class="btn btn-outline-success"> Ajouter <i class="fa fa-plus-square"> </i> </button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!--end Ajouter Post -->
          <div class="x_panel">
            <div class="d-flex">
              <div class="mr-auto p-2">
                <h2 class='text-primary'>Liste des Posts</h2>
              </div>
              <div>
                <ul class="nav navbar-right panel_toolbox">
                  <label>Chercher :<input type="search" class="form-control input-sm" placeholder="" aria-controls="datatable"></label>
                </ul>
              </div>
            </div>
            <?php
            require_once('Post.php');
            $post = new Post();
            $pst = $post->editAll();
            $nbr = count($pst);
            
            if ($nbr == 0) {
              echo "<b class='text-danger'>Oucun Post pour le moment </b>";
            } else {
              echo "<table  class='table table-striped table-bordered dataTable no-footer' style='width: 100%;' >";
              echo "<thead><tr role='row'><th></th><th>Id</th><th>Nom de Post</th><th>Action</th></tr></thead><tbody>";
              foreach ($pst as $pt) {
                echo "<tr style='font-size:2'><td>#</td><td name='id'>" . $pt[0] . "</td><td name='Post'>" . $pt[1] . "</td>";
                echo "<td>
                        <a class='btn btn-primary' href='Modifier/Modif_Post.php?dd=$pt[0]' onclick='afficher_data($pt[0]);'><i class='fa fa-pencil'></i> Modifier</a>
                        <a class='btn btn-danger' href='Supprimer/Supprim_Post.php?dd=$pt[0]' onclick='return confirm(\"Es-tu sûr pour Supprimer. Si vous êtres sûr, cliquez sur OK , sinon annule ?\")'><i class='fa fa-trash-o'></i> Supprimé</a>
                        </td></tr>";
              }
              echo "</tbody></table>";
            }
            ?>
            <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            </div> -->
          </div>
        </div>
      </div>

      <!-- /page content -->
      <!-- <script>
        function afficher_data(data) {
          $.ajax({
            type: "GET",
            url: "Modifier/Modif_Post.php?data=" + data,
            success: function(retour) {
              $("#exampleModal").html(retour);
            }
          });
          $('#exampleModal').modal('show');
        }
      </script> -->

      <script>
        function hide() {
          /*
            document.getElementById('exampleModal').hidden=true;
          */
          location.reload()
        }
      </script>
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