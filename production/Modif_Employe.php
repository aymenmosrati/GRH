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
        <div class="">
          <div class="row">
            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h4 style="color: Blue;">Etat civile </h4>
                  <div class="clearfix"></div>
                </div>
                <form class="x_content" action="Modif_Ajout_Empl.php" methode="GET">
                  <br />
                  <div class="form-label-left input_mask">
                  <?php
                          $id=$_REQUEST['dd'];
                          require_once('Employe.php');
                          $Employe = new Employe();
                          $employe = $Employe->edit($id);
                  ?>
                    <input type="text" name="id" value="<?php echo $id ?>" hidden>
                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                      <input type="text" name="nom" value="<?php echo $employe[1]?>" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Nom">
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>

                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                      <input type="text" name="Prenom" value="<?php echo $employe[2]?>" class="form-control" id="inputSuccess3" placeholder="Prénom">
                      <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                    </div>

                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                      <input type="email" name="email" value="<?php echo $employe[3]?>" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Email">
                      <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                    </div>

                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                      <input type="tel" name="telephone" value="<?php echo $employe[4]?>" class="form-control" id="inputSuccess5" placeholder="Phone">
                      <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                    </div>

                    <div class="form-group row">
                      <label class="col-form-label col-md-3 col-sm-3 ">Genre</label>
                      <div class="col-md-8 col-sm-8">
                        <select class="form-control" name="Genre">
                        <option style="display:none;" selected><?php echo $employe[5]?></option>
                          <option>Personnelle</option>
                          <option>Homme</option>
                          <option>Famme</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-form-label col-md-3 col-sm-3 ">Situation Familliale</label>
                      <div class="col-md-8 col-sm-8">
                        <select class="form-control" name="Situation" onchange="if(this.value=='Marie')document.getElementById('nbr_enfant').hidden=false,document.getElementById('nomjeune').hidden=false;  else document.getElementById('nbr_enfant').hidden=true,document.getElementById('nomjeune').hidden=true;">
                        <option style="display:none;" selected><?php echo $employe[6]?></option>
                        <option>Celibataire </option>
                          <option>Marie</option>
                          <option>Divorce </option>
                          <option>Veuf </option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row" id="nomjeune" hidden>
                      <label class="col-form-label col-md-3 col-sm-3">Nom de Jeune fille</label>
                      <div class="col-md-8 col-sm-8 ">
                        <input type="text" name="nomjeune" value="<?php echo $employe[7]?>" class="form-control" placeholder="Nom de Jeune fille">
                      </div>
                    </div>
                    <div class="form-group row" id="nbr_enfant" hidden>
                      <label class="col-form-label col-md-3 col-sm-3">Nombre d'enfants</label>
                      <div class="col-md-8 col-sm-8 ">
                        <input type="number" name="nbr_enfant" value="<?php echo $employe[8]?>" class="form-control" placeholder="Nombre  d'enfant">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-form-label col-md-3 col-sm-3 ">Date de naissance <span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 ">
                        <input type="text" name="date_naissance" value="<?php echo $employe[9]?>" class="date-picker form-control" placeholder="dd-mm-yyyy" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                        <script>
                          function timeFunctionLong(input) {
                            setTimeout(function() {
                              input.type = 'text';
                            }, 60000);
                          }
                        </script>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-form-label col-md-3 col-sm-3">Nationalité</label>
                      <div class="col-md-8 col-sm-8">
                        <select class="form-control" name="Nationalite">
                          <?php
                          require_once('villes.php');
                          $villes = new villes();
                          $stmt = $villes->editAll();
                          foreach ($stmt as $res) {
                            echo "<option selected='$employe[10]'>" . $res['1'] . "</option>";
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <!-- start contrat form -->
                  <br><br>
                  <div class="x_title">
                    <h3 style="color: Blue;">Informations de Contrat</h3>
                    <div class="clearfix"></div>
                  </div><br><br>
                  <div class="form-label-left input_mask">
                    <div class="form-group row">
                      <label class="col-form-label col-md-3 col-sm-3">Nature</label>
                      <div class="col-md-6 col-sm-6">
                        <select class="form-control" name="Nature">
                          <?php
                          require_once('Contrat.php');
                          $contrat = new Contrat();
                          $stmt = $contrat->editAll();
                          foreach ($stmt as $res) {
                            // selected='$employe[11]'
                            echo "<option>" . $res['1'] . "</option>";
                          }
                          ?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-form-label col-md-3 col-sm-3">Post</label>
                      <div class="col-md-6 col-sm-6">
                        <select class="form-control" name="Post">
                          <?php
                          require_once('Post.php');
                          $Post = new Post();
                          $stmt = $Post->editAll();
                          foreach ($stmt as $res) {
                            // selected='$employe[16]'
                            echo "<option>" . $res['1'] . "</option>";
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-form-label col-md-3 col-sm-3">Département</label>
                      <div class="col-md-6 col-sm-6">
                        <select class="form-control" name="Departement">
                          <?php
                          require_once('Departement.php');
                          $Departement = new Departement();
                          $stmt = $Departement->editAll();
                          foreach ($stmt as $res) {
                            // selected='$employe[17]'
                            echo "<option>" . $res['1'] . "</option>";
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <br>
                    <div class="d-flex justify-content-around">
                      <div class="col-md-5 cd-flex justify-content-aroundol-sm-5  form-group has-feedback">
                        <label for="inputDate">Date de Début</label>
                        <input type="date" name="date_debut" value="<?php echo $employe[12]?>" class="form-control has-feedback-left" id="inputDate">
                      </div>
                      <div class="col-md-5 col-sm-5  form-group has-feedback">
                        <label for="inputDate2">Date de Fin</label>
                        <input type="date" name="date_fin" value="<?php echo $employe[13]?>" class="form-control" id="inputDate2">
                      </div>
                    </div>
                    <div class="d-flex justify-content-around">
                      <div class="col-md-5 cd-flex justify-content-aroundol-sm-5  form-group has-feedback">
                        <label for="inputDate3">Date d'embauche</label>
                        <input type="date" name="date_embauche" value="<?php echo $employe[13]?>" class="form-control has-feedback-left" id="inputDate3">
                      </div>
                      <div class="col-md-5 col-sm-5  form-group has-feedback">
                        <label for="inputDate4">Date de départ</label>
                        <input type="date" name="date_depart" value="<?php echo $employe[15]?>" class="form-control" id="inputDate4">
                      </div>
                    </div>
                    <br>

                  </div>

                  <!-- start form coordonne  -->
                  <br><br>
                  <div class="x_title">
                    <h3 style="color: Blue;">Coordonnées</h3>
                    <div class="clearfix"></div>
                  </div>
                  <br>
                  <div class="form-label-left input_mask">
                    <div class="form-group row">
                      <label class="col-form-label col-md-3 col-sm-3" for="Ad">Adresse</label>
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <input type="text" name="Adresse" value="<?php echo $employe[18]?>" class="form-control" id="Ad" placeholder="... ... ...">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-form-label col-md-3 col-sm-3" for="Cd">Code Postal</label>
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <input type="Number" name="Code_Postal" value="<?php echo $employe[19]?>" class="form-control" id="Cd" placeholder="0000">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-form-label col-md-3 col-sm-3" for="RB">RIB de Banque</label>
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <input type="Number" name="RIB_Banque" value="<?php echo $employe[20]?>" class="form-control" id="RB" placeholder="0000 0000 0000 0000 0000" max="20">
                      </div>
                    </div>
                    <div class="d-flex justify-content-around">
                      <div class="col-md-5 cd-flex justify-content-aroundol-sm-5  form-group has-feedback">
                        <label for="Ad">Nom de la Banque</label>
                        <select class="form-control" id="Ad" name="Nom_Banque">
                          <?php
                          require_once('Banques.php');
                          $Banques = new Banques();
                          $stmt = $Banques->editAll();
                          foreach ($stmt as $res) {
                            // selected='$employe[21]'
                            echo "<option>" . $res['1'] . "</option>";
                          }
                          ?>
                        </select>
                      </div>
                      <div class="col-md-5 col-sm-5  form-group has-feedback">
                        <label for="inputDate4">Nom du guiche</label>
                        <input type="text" name="Nom_guiche" value="<?php echo $employe[22]?>" class="form-control" placeholder="......." id="inputDate4">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-form-label col-md-3 col-sm-3">Mode de paiement</label>
                      <div class="col-md-6 col-sm-6">
                        <select class="form-control" name="Mode_paiement">
                          <option style="display:none;" selected><?php echo $employe[23]?></option>
                          <option>Virement</option>
                          <option>Cheque</option>
                          <option>Especes</option> 
                        </select>
                      </div>
                    </div>
                  </div>
                  <!--  start form paie-->
                  <br><br>
                  <div class="x_title">
                    <h3 style="color: Blue;">Paie</h3>
                    <div class="clearfix"></div>
                  </div>
                  <br />
                  <div class="form-label-left input_mask">
                    <div class="Salarie" >
                     <span onclick="activeMontanMensuelle()">
                      <label for="S" class="fhp"> Mensuelle </label>
                      <input type="radio" id="S" name="type"  value="Salarie" width="150px" onclick="activeMontanMensuelle()">
                      <input type="Number" class="form-control" id="Mensuelle" name="Salarie"  placeholder="0.000" hidden>
                     </span>
                    </div>
                    <br>
                    <div class="Horaire" >
                     <span onclick="activeMontanHoraire()">
                      <label for="H" class="fhp"> Horaire </label>
                      <input type="radio" id="H" name="type" value="Horaire" required>
                      <input type="Number" class="form-control" id="Horaire" name="Horaire"  placeholder="0.000" hidden>
                     </span>
                    </div>
                    <br>

                    <?php
                    require_once('Primes.php');
                    $Primes = new Primes();
                    $stmt = $Primes->editAll();
                    echo "<option> Les prime :</option><br><table class='table table-striped table-bordered bulk_action dataTable no-footer' style='width: 100%;' role='grid' aria-describedby='datatable-checkbox_info'>
                      <thead>
                      <th>#</th><th>Id</th><th>Prime</th><th>Montant</th>
                      </thead>
                      <tbody>";
                    $Prim = 0;
                    $i=0;
                    foreach ($stmt as $res) {
                      echo "<tr>
                      <td>
                      <input type='checkbox' id='.$i.' name='prime[]' value='".$res[2]."'>
                      </td>
                      <td>$res[0]</td>
                      
                      <td>$res[1]</td>
                      <td id='.$i.'>$res[2]</td> 
                      </tr> ";
                    $i++;
                    }
                    echo "</tbody></table><br/>";

                    // if(isset($_GET['P'])){
                    //   $Prim = $Prim + $res[1];
                    //   echo "<input type='Number' name='Prime' value='$Prim' hidden>";
                    // }
                    ?> 

                    <script>
                      // function prime()
                      // {
                      //   if (document.getElementById($res[0]).checked == true)
                      //   {
                      //     alert('vvv');
                      //   }
                      // }
                      function fixStepIndicator(n) {
                        var i, x = document.getElementsByClassName("step");
                        for (i = 0; i < x.length; i++) {
                          x[i].className = x[i].className.replace(" active", "");
                        }
                        x[n].className += " active";
                      }

                      function activeMontanHoraire() {
                        document.getElementById("Horaire").hidden = false;
                        document.getElementById("Mensuelle").hidden = true;
                      }

                      function activeMontanMensuelle() {
                        document.getElementById("Mensuelle").hidden = false;
                        document.getElementById("Horaire").hidden = true;
                      }
                    </script>

                    <div class="ln_solid"></div>
                    <div class="form-group row">
                      <div class="">
                        <button type="submit" class="btn btn-primary">Modifier</button>
                      </div>
                    </div>
                  </div>

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