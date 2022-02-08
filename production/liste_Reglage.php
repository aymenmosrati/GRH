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
                    <form action="Modifier/Modif_Reglage.php" method="POST">
                        <div class="col-sm-12" id="">
                                <div class="widget-header">
                                    <h4 class="smaller"><i class="fa fa-wrench"></i> Paramètres de salaire</h4>
                                </div>
                                <div class="ln_solid"></div> 
                                <?php
                                    require_once('Reglage.php');
                                    $CNSS = new Reglage();
                                    $stmt = $CNSS->edit();
                                    ?>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 " for="Cnss"> CNSS  </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="Cnss" name="Cnss" value="<?php echo $stmt['1'] ;?>" class="form-control">
                                    </div>
                                </div>
                                <div class="item form-group">
                                <label class="col-form-label col-md-3 " for="Mois"> Nombre de Mois ( Pour le IRPP )  </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="Mois" name="Mois" value="<?php echo $stmt['2']; ?>" class="form-control">
                                    <br>
                                    <input type="Submit" id="Modif" value="Modifier" name="Modif" class="form-control btn btn-primary">
                                </div>
                            </div>
                                <div class="ln_solid"></div>
                        </div>
                    </form>
                       

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