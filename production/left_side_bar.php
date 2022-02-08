<div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="tableau_bord.php" class="site_title"><i class="fa fa-paw"></i><span>Gestion de Salaire</span></a>
            </div>
            <div class="clearfix"></div>
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../production/images/user.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <h2>Nom de Société</h2>
                <span>admin@admin.Bus</span>
              </div>
            </div>
            <!-- /menu profile quick info -->
            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                <li class="hover">
                   <a href="tableau_bord.php"><i class="menu-icon fa fa-tachometer"></i> <span class="menu-text">Tableau de bord </span></a> 
                   <b class="arrow"></b> </li>

                  <li><a><i class="menu-icon fa fa-home"></i> Management <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="liste_Departements.php">Départements</a></li> 
                      <li><a href="liste_Post.php">Post</a></li> 
                      <li><a href="liste_Contrat.php">Contrat</a></li>
                      <li><a href="liste_Villes.php">Villes</a></li>
                      <li><a href="liste_Primes.php">Primes</a></li>
                      <li><a href="liste_Devises.php">Devises</a></li>
                      <li><a href="liste_Banques.php">Banques</a></li>
                    </ul>
                  </li>

                  <li><a><i class="menu-icon fa fa-user"></i> Employee <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a>Informations </a>
                          <ul style="list-style-type: circle;">
                              <li><a href="form_Civilite.php">Etat civile</a></li>
                              <li><a href="form_Civilite.php">Contrat</a></li>
                              <li><a href="form_Civilite.php">Coordonnées</a></li>
                              <li><a href="form_Civilite.php">Paie</a></li>
                          </ul>
                      </li>
                      <li><a href="liste_employe.php">Liste des employés</a></li>
                    </ul>
                  </li>

                  <li><a><i class="menu-icon fa fa-building-o"></i> Gestion de la paie <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="liste_Reglage.php">Réglage</a></li>
                      <!-- <li><a href="liste_Presence.php">Présence</a></li>
                      <li><a href="liste_Avances.php">Avances</a></li> -->
                      <li><a href="liste_Salaires.php">Salaires</a></li>
                      <li><a href="liste_Fichie_Paie.php">Liste des Fichies de Paie</a></li>
                    </ul>
                  </li>
<!-- 
                  <li><a><i class="menu-icon fa fa-calendar-o"></i> Gestion des Congés <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="liste_Categories.php"></a>Catégories</li>
                      <li><a href="liste_conges.php"></a>Liste des congés</li>
                    </ul>
                  </li>

                  <li><a><i class="menu-icon fa fa-calendar"></i> Jours Fériés <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="liste_Vacances.php"></a>Vacances</li>
                      <li><a href="liste_Fin_semaine.php"></a>Fin de semaine</li>
                    </ul>
                  </li>

                  <li><a><i class="menu-icon fa fa-bar-chart"></i> Statistiques <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="liste_Statistiques.php">Statistiques</a></li>
                    </ul>
                  </li>

                  <li><a><i class="menu-icon fa fa-wrench"></i> Parametré <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form_Général.php">Général</a></li>
                      <li><a href="liste_langue.php">La langue</a></li>
                      <li><a href="liste_Utilisateur_systéme.php">Utilisateur du systéme</a></li>
                      <li><a href="Base_de_données.php">Base de données</a></li>
                    </ul>
                  </li> -->

                </ul>
              </div>
            </div>
           
            <!-- /menu footer buttons -->
            <!-- <div class="sidebar-footer hidden-small">      
              <a data-toggle="tooltip" data-placement="top" title="Paramètre">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Plein écran">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Serrure">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Se déconnecter" href="inscrire_form.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div> -->
            <!-- /menu footer buttons -->
          </div>
        </div>
        <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>
          <nav class="nav navbar-nav">
            <ul class=" navbar-right">
              <li class="nav-item dropdown open" style="padding-left: 15px;">
                <a class="user-profile dropdown-toggle" style="cursor: pointer;" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                  <img src="../production/images/user.png" alt="">Nom de L'admin
                </a>
                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="inscrire_form.php"><i class="fa fa-sign-out pull-right"></i> Se déconnecter</a>
                </div>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->
