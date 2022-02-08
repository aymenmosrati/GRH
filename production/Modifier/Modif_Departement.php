<?php
$id = intval($_GET['dd']);

require_once('../Departement.php');
$Departement = new Departement();
$stmt = $Departement->edit($id);
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
    <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- FullCalendar -->
    <link href="../../vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="../../vendors/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print">
    <!-- Custom styling plus plugins -->
    <link href="../../build/css/custom.min.css" rel="stylesheet">

</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <?php
           // include "../left_side_bar.php";
            ?>
            <!-- page content -->
            <div class="right_col" role="main">
                <div class="col-md-10 col-sm-10 ">
                <div class="modal-header">
            <h5 class="modal-title">Modifier Ce departemet</h5>
        </div>
        <form action="Modif_Ajout/Modif_Ajout_Departement.php" method="POST">
            <div class="modal-body">
                <div class="item form-group">
                    <label class="col-form-label col-md-3 " for="id">ID</label>
                    <div class="col-md-8 col-sm-8 ">
                        <input type="text" id="id" value="<?php echo $stmt[0] ?>" class="form-control " disabled>
                        <input type="text" id="id" name="id" value="<?php echo $stmt[0] ?>" class="form-control " hidden>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 " for="Nom_Departement">Nom</label>
                    <div class="col-md-8 col-sm-8 ">
                        <input type="text" id="Nom_Departement" name="Nom_Departement" value="<?php echo $stmt[1] ?>" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-dark" data-dismiss="modal" onclick="hide();">Annulé</button>
                <button name="Modif" class="btn btn-outline-success"> Modifier <i class="fa fa-plus-square"> </i> </button>
            </div>
        </form>
                    
                </div>
            </div>

            <!-- /page content -->

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
    <script src="../../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../vendors/nprogress/nprogress.js"></script>
    <!-- FullCalendar -->
    <script src="../../vendors/moment/min/moment.min.js"></script>
    <script src="../../vendors/fullcalendar/dist/fullcalendar.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../../build/js/custom.min.js"></script>
</body>

</html>



<!-- <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Modifier Ce departemet</h5>
        </div>
        <form action="" method="POST">
            <div class="modal-body">
                <div class="item form-group">
                    <label class="col-form-label col-md-3 " for="id">ID</label>
                    <div class="col-md-8 col-sm-8 ">
                        <input type="text" id="id" value="<?php echo $stmt[0] ?>" class="form-control " disabled>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 " for="Nom_Departement">Nom</label>
                    <div class="col-md-8 col-sm-8 ">
                        <input type="text" id="Nom_Departement" name="Nom_Departement" value="<?php echo $stmt[1] ?>" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-dark" data-dismiss="modal" onclick="hide();">Annulé</button>
                <button name="Modif" class="btn btn-outline-success"> Modifier <i class="fa fa-plus-square"> </i> </button>
            </div>
        </form>
    </div>
</div> -->


