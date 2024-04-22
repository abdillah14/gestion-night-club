 <!-- <header class="header-top" header-theme="light">
     <div class="container-fluid">
         <div class="d-flex justify-content-between">
             <div class="top-menu d-flex align-items-center">
                 <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                 <button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button>
             </div>
             <div class="top-menu d-flex align-items-center">
                 <div class="dropdown">
                     <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar" src="<?php
                                                                                                                                                                                    $d = "file/user/all.png";
                                                                                                                                                                                    ?><?= $d ?>" alt=""></a>
                     <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                         <a class="dropdown-item voir_us" href="#" id="<?= $_SESSION["id"] ?>"><i class="ik ik-user dropdown-icon"></i> Profile</a>
                         <a class="dropdown-item" href="#" data-toggle="modal" data-target="#mod"><i class="ik ik-settings dropdown-icon"></i> Settings</a>
                         <a class="dropdown-item" href="index.php?action=dec"><i class="ik ik-power dropdown-icon"></i> Logout</a>
                     </div>
                 </div>

             </div>
         </div>
     </div>
 </header>

 -->

 <header id="header" class="header fixed-top d-flex align-items-center">

     <div class="d-flex align-items-center justify-content-between">
         <a href="index.html" class="logo d-flex align-items-center">
             <img src="assets/img/logo.png" alt="">
             <span class="d-none d-lg-block">Night club</span>
         </a>
         <i class="bi bi-list toggle-sidebar-btn"></i>
     </div><!-- End Logo -->


     <nav class="header-nav ms-auto">
         <ul class="d-flex align-items-center">

             <li class="nav-item dropdown pe-3">

                 <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                     <img src="<?php $d = "file/user/all.png"; ?><?= $d ?>" alt="Profile" class="rounded-circle">
                     <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
                 </a><!-- End Profile Iamge Icon -->

                 <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                     <li class="dropdown-header">
                         <h6>Kevin Anderson</h6>
                         <span>Web Designer</span>
                     </li>
                     <li>
                         <hr class="dropdown-divider">
                     </li>
                     <li>
                         <a class="dropdown-item d-flex align-items-center voir_us" href="#" id="<?= $_SESSION["id"] ?>">
                             <i class="bi bi-person"></i>
                             <span>My Profile</span>
                         </a>
                     </li>
                     <li>
                         <hr class="dropdown-divider">
                     </li>

                     <li>
                         <a class="dropdown-item d-flex align-items-center" href="#" data-toggle="modal" data-target="#mod">
                             <i class="bi bi-gear"></i>
                             <span>Account Settings</span>
                         </a>
                     </li>
                     <li>
                         <hr class="dropdown-divider">
                     </li>
                     <li>
                         <a class="dropdown-item d-flex align-items-center" href="index.php?action=dec">
                             <i class="bi bi-box-arrow-right"></i>
                             <span>Sign Out</span>
                         </a>
                     </li>

                 </ul><!-- End Profile Dropdown Items -->
             </li><!-- End Profile Nav -->

         </ul>
     </nav><!-- End Icons Navigation -->

 </header><!-- End Header -->