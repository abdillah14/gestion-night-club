 <?php
    $idd_p = $_SESSION["profile"];
    $ver_P = ver_droit($_SESSION["profile"]);
    // var_dump($ver_P)

    ?>

 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar bg-[#3a3e59]">

     <ul class="sidebar-nav " id="sidebar-nav">

         <li class="nav-item">
             <a class="nav-link " href="index.php?action=home">
                 <i class="bi bi-grid"></i>
                 <span>Accueil</span>
             </a>
         </li><!-- End Dashboard Nav -->

         <?php
            if (
                $ver_P[0][0] == "personnel" and
                $ver_P[0][2] == 1 or
                $ver_P[1][0] == "profile" and
                $ver_P[1][2] == 1
            ) { ?>
             <li class="nav-item">
                 <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                     <i class="bi bi-menu-button-wide"></i><span>Gestion du Personnels</span><i class="bi bi-chevron-down ms-auto"></i>
                 </a>
                 <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                     <?php if (
                            $ver_P[1][0] == "profile" and
                            $ver_P[1][2] == 1
                        ) { ?>
                         <li>
                             <a href="index.php?action=profile">
                                 <i class="bi bi-circle"></i><span>Profil</span>
                             </a>
                         </li>
                     <?php } ?>
                     <?php if (
                            $ver_P[0][0] == "personnel" and
                            $ver_P[0][2] == 1
                        ) { ?>
                         <li>
                             <a href="index.php?action=user">
                                 <i class="bi bi-circle"></i><span>Personnel</span>
                             </a>
                         </li>
                     <?php } ?>
                 </ul>
             </li>
         <?php } ?>
         <!-- End Components Nav -->
         <li class="nav-heading">Stock</li>
         <?php
            if (
                $ver_P[20][0] == "stock" and
                $ver_P[20][2] == 1
                or $ver_P[6][0] == "nourriture" and
                $ver_P[6][2] == 1
                or $ver_P[3][0] == "table" and
                $ver_P[3][2] == 1
                or $ver_P[4][0] == "plat" and
                $ver_P[4][2] == 1
                or $ver_P[5][0] == "fourniture" and
                $ver_P[5][2] == 1
            ) { ?>
             <li class="nav-item">
                 <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                     <i class="bi bi-journal-text"></i><span>Gestion du Stock</span><i class="bi bi-chevron-down ms-auto"></i>
                 </a>
                 <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                     <?php if (
                            $ver_P[20][0] == "stock" and
                            $ver_P[20][2] == 1
                        ) { ?>
                         <li>
                             <a href="index.php?action=stock_">
                                 <i class="bi bi-circle"></i><span>Boisson en Stock</span>
                             </a>
                         </li>


                         <li>
                             <a href="index.php?action=stock">
                                 <i class="bi bi-circle"></i><span>Boisson en vente</span>
                             </a>
                         </li>
                     <?php } ?>
                     <?php if (
                            $ver_P[3][0] == "table" and
                            $ver_P[3][2] == 1
                        ) { ?>
                         <li>
                             <a href="index.php?action=table">
                                 <i class="bi bi-circle"></i><span> Table</span>
                             </a>
                         </li>
                     <?php } ?>

                     <?php if (
                            $ver_P[4][0] == "plat" and
                            $ver_P[4][2] == 1
                        ) { ?>
                         <li>
                             <a href="index.php?action=plat">
                                 <i class="bi bi-circle"></i><span>Plat</span>
                             </a>
                         </li>
                     <?php } ?>
                 </ul>
             </li>
         <?php } ?>
         <!-- End stock Nav -->
         <?php
            if (
                $ver_P[7][0] == "vente_boisson" and
                $ver_P[7][2] == 1 or
                $ver_P[8][0] == "vente_plat" and
                $ver_P[8][2] == 1
            ) { ?>
             <li class="nav-item">
                 <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                     <i class="bi bi-layout-text-window-reverse"></i><span>Vente</span><i class="bi bi-chevron-down ms-auto"></i>
                 </a>
                 <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                     <?php if (
                            $ver_P[7][0] == "vente_boisson" and
                            $ver_P[7][2] == 1
                        ) { ?>
                         <li>
                             <a href="index.php?action=vente">
                                 <i class="bi bi-circle"></i><span>Boissons </span>
                             </a>
                         </li>
                     <?php } ?>
                     <?php if (
                            $ver_P[8][0] == "vente_plat" and
                            $ver_P[8][2] == 1
                        ) { ?>
                         <li>
                             <a href="index.php?action=vente_plat">
                                 <i class="bi bi-circle"></i><span>Nourritures</span>
                             </a>
                         </li>
                     <?php } ?>
                     <?php if (
                            $ver_P[7][0] == "vente_boisson" and
                            $ver_P[7][2] == 1
                        ) { ?>
                         <li>
                             <a href="index.php?action=dette">
                                 <i class="bi bi-circle"></i><span>Dette Boissons</span>
                             </a>
                         </li>
                     <?php } ?>
                     <?php if (
                            $ver_P[8][0] == "vente_plat" and
                            $ver_P[8][2] == 1
                        ) { ?>
                         <li>
                             <a href="index.php?action=dette_plat">
                                 <i class="bi bi-circle"></i><span>Dette Nourritures</span>
                             </a>
                         </li>
                     <?php } ?>
                 </ul>
             </li>
         <?php } ?>
         <!-- End Vente Nav -->
         <li class="nav-heading">Chicha</li>

         <?php
            if (
                $ver_P[13][0] == "jeux" and
                $ver_P[13][2] == 1
            ) { ?>
             <li class="nav-item">
                 <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                     <i class="bi bi-bar-chart"></i><span>Gestion du Chicha</span><i class="bi bi-chevron-down ms-auto"></i>
                 </a>
                 <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                     <li>
                         <a href="index.php?action=chicha">
                             <i class="bi bi-circle"></i><span>Chicha</span>
                         </a>
                     </li>

                 </ul>
             </li>
         <?php } ?>
         <!-- End Chicha Nav -->

         <li class="nav-heading">Jeux</li>
         <?php
            if (
                $ver_P[17][0] == "billard" and
                $ver_P[17][2] == 1
            ) { ?>
             <li class="nav-item">
                 <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                     <i class="bi bi-gem"></i><span>Gestion des Jeux</span><i class="bi bi-chevron-down ms-auto"></i>
                 </a>
                 <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                     <li>
                         <a href="index.php?action=billard">
                             <i class="bi bi-circle"></i><span>Billard </span>
                         </a>
                     </li>
                 </ul>
             </li>
         <?php } ?>
         <!-- End JEux Nav -->
         <li class="nav-heading">Rapport</li>

         <?php
            if (
                $ver_P[12][0] == "rapport" and
                $ver_P[12][2] == 1
            ) { ?>
             <li class="nav-item">
                 <a class="nav-link collapsed" data-bs-target="#rapport-nav" data-bs-toggle="collapse" href="#">
                     <i class="bi bi-layout-text-window-reverse"></i><span>Rapport</span><i class="bi bi-chevron-down ms-auto"></i>
                 </a>
                 <ul id="rapport-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                     <li>
                         <a href="index.php?action=rapport">
                             <i class="bi bi-circle"></i><span>Boissons </span>
                         </a>
                     </li>
                     <li>
                         <a href="index.php?action=rapport_n">
                             <i class="bi bi-circle"></i><span>Nourritures</span>
                         </a>
                     </li>
                     <li>
                         <a href="index.php?action=trace">
                             <i class="bi bi-circle"></i><span>Trace en Stock</span>
                         </a>
                     </li>
                 </ul>
             </li><!-- End Rapport Nav -->
         <?php } ?>
         <li class="nav-heading">Les Depenses</li>
         <?php
            if (
                $ver_P[19][0] == "depense" and
                $ver_P[19][2] == 1
            ) { ?>
             <li class="nav-item">
                 <a class="nav-link collapsed" href="index.php?action=dp">
                     <i class="bi bi-person"></i>
                     <span>Depense</span>
                 </a>
             </li>
         <?php } ?>
         <!-- End Profile Page Nav -->
     </ul>

 </aside><!-- End Sidebar-->