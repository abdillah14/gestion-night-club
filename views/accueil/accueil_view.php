<?php

if (empty($_SESSION["nom"])) {
    $page = "index.php?action=login";
    header('location:' . $page);
}
?>
<?php include("views/partials/head_link.php"); ?>


<div class="wrapper">


    <?php include("views/partials/tete.php"); ?>

    <div class="page-wrap">
        <?php include("views/partials/sidebar.php"); ?>


        <!-- <div class="main-content" style="background-image: url('log.jpg')"> -->
        <main id="main" class="main">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row align-items-end">

                        <div class="pagetitle">
                            <h1>Accueil</h1>
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active">Accueil</li>
                                </ol>
                            </nav>
                        </div><!-- End Page Title -->


                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="widget bg-primary">
                            <div class="widget-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="state">
                                        <i class="ik ik-users"></i>
                                        <h2><?php
                                            $data = home();
                                            foreach ($data as $key => $nb) {
                                            } ?>
                                            <?php echo $nb['nombre']; ?></h2>
                                    </div>
                                    <div class="icon">
                                        <i class="ik ik-users"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="widget bg-success">
                            <div class="widget-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="state">
                                        <h6>Stock General</h6>
                                        <h2><?php
                                            $data = st();
                                            foreach ($data as $key => $nb) {
                                            } ?>
                                            <?php echo $nb['nombre']; ?></h2>
                                    </div>
                                    <div class="icon">
                                        <i class="ik ik-archive"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="widget bg-warning">
                            <div class="widget-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="state">
                                        <h6>Nourriture</h6>
                                        <h2><?php
                                            $data = ven();
                                            foreach ($data as $key => $nb) {
                                            } ?>
                                            <?php echo $nb['nombre']; ?></h2>
                                    </div>
                                    <div class="icon">
                                        <i class="ik ik-cloud-drizzle"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="widget bg-danger">
                            <div class="widget-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="state">
                                        <h6>Depense</h6>
                                        <h2><?php
                                            $data = dep_accueil();
                                            foreach ($data as $key => $nb) {
                                            } ?>
                                            <?php echo $nb['nombre']; ?></h2>
                                    </div>
                                    <div class="icon">
                                        <i class="ik ik-box"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="widget">
                            <div class="widget-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="state">
                                        <h6>Jus</h6>
                                        <h2><?php
                                            $data = jus();
                                            foreach ($data as $key => $nb) {
                                            } ?>
                                            <?php echo $nb['nombre']; ?></h2>
                                    </div>
                                    <div class="icon">
                                        <i class="ik ik-filter"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="widget">
                            <div class="widget-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="state">
                                        <h6>Sucré</h6>
                                        <h2><?php
                                            $data = sucre();
                                            foreach ($data as $key => $nb) {
                                            } ?>
                                            <?php echo $nb['nombre']; ?></h2>
                                    </div>
                                    <div class="icon">
                                        <i class="ik ik-filter"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="widget">
                            <div class="widget-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="state">
                                        <h6>Vin</h6>
                                        <h2><?php
                                            $data = Vin();
                                            foreach ($data as $key => $nb) {
                                            } ?>
                                            <?php echo $nb['nombre']; ?></h2>
                                    </div>
                                    <div class="icon">
                                        <i class="ik ik-filter"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="widget">
                            <div class="widget-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="state">
                                        <h6>Eau</h6>
                                        <h2><?php
                                            $data = Eau();
                                            foreach ($data as $key => $nb) {
                                            } ?>
                                            <?php echo $nb['nombre']; ?></h2>
                                    </div>
                                    <div class="icon">
                                        <i class="ik ik-filter"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="widget">
                            <div class="widget-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="state">
                                        <h6>Biere</h6>
                                        <h2><?php
                                            $data = Biere();
                                            foreach ($data as $key => $nb) {
                                            } ?>
                                            <?php echo $nb['nombre']; ?></h2>
                                    </div>
                                    <div class="icon">
                                        <i class="ik ik-filter"></i>
                                    </div>
                                </div>
                                <small class="text-small mt-10 d-block"></small>
                            </div>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="widget">
                            <div class="widget-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="state">
                                        <h6>Whisky</h6>
                                        <h2><?php
                                            $data = Whisky();
                                            foreach ($data as $key => $nb) {
                                            } ?>
                                            <?php echo $nb['nombre']; ?></h2>
                                    </div>
                                    <div class="icon">
                                        <i class="ik ik-filter"></i>
                                    </div>
                                </div>
                                <small class="text-small mt-10 d-block"></small>
                            </div>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="widget">
                            <div class="widget-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="state">
                                        <h6>Billard</h6>
                                        <h2><?php
                                            $data = billard_accueil();
                                            foreach ($data as $key => $nb) {
                                            } ?>
                                            <?php echo $nb['nombre']; ?></h2>
                                    </div>
                                    <div class="icon">
                                        <i class="ik ik-calendar"></i>
                                    </div>
                                </div>
                                <small class="text-small mt-10 d-block"></small>
                            </div>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="widget">
                            <div class="widget-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="state">
                                        <h6>Chicha</h6>
                                        <h2><?php
                                            $data = jeu_accueil();
                                            foreach ($data as $key => $nb) {
                                            } ?>
                                            <?php echo $nb['nombre']; ?></h2>
                                    </div>
                                    <div class="icon">
                                        <i class="ik ik-server"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                            </div>
                        </div>
                    </div>


                </div>







                <div class="row clearfix">




                </div>




            </div>
        </main>
        </div>



        <?php include("views/partials/pied.php"); ?>




    </div>
</div>




<div class="modal fade apps-modal" id="appsModal" tabindex="-1" role="dialog" aria-labelledby="appsModalLabel" aria-hidden="true" data-backdrop="false">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ik ik-x-circle"></i></button>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="quick-search">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 ml-auto mr-auto">
                            <div class="input-wrap">
                                <input type="text" id="quick-search" class="form-control" placeholder="Search..." />
                                <i class="ik ik-search"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-body d-flex align-items-center">
                <div class="container">
                    <div class="apps-wrap">
                        <div class="app-item">
                            <a href="#"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-mail"></i><span>Message</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-users"></i><span>Accounts</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-shopping-cart"></i><span>Sales</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-briefcase"></i><span>Purchase</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-server"></i><span>Menus</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-clipboard"></i><span>Pages</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-message-square"></i><span>Chats</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-map-pin"></i><span>Contacts</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-box"></i><span>Blocks</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-calendar"></i><span>Events</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-bell"></i><span>Notifications</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-pie-chart"></i><span>Reports</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-layers"></i><span>Tasks</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-edit"></i><span>Blogs</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-settings"></i><span>Settings</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-more-horizontal"></i><span>More</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>

</html>