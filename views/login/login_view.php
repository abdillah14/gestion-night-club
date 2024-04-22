<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>LOGIN | BLUE</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="../favicon.ico" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
        
        <link rel="stylesheet" href="public/public/plugins/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="public/public/plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="public/public/plugins/ionicons/dist/css/ionicons.min.css">
        <link rel="stylesheet" href="public/public/plugins/icon-kit/dist/css/iconkit.min.css">
        <link rel="stylesheet" href="public/public/plugins/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="public/public/dist/css/theme.min.css">
        <script src="public/public/src/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>

    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="auth-wrapper">
            <div class="container-fluid h-100">
                <div class="row flex-row h-100 bg-white">
                    <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                        <div class="lavalite-bg " style="background-image: url('log.jpg')">
                            <div class="lavalite-overlay"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                        <div class="authentication-form mx-auto">
                            <div class="logo-centered">
                                <a href="../index.html"><img src="log1.jpg" class="rounded-circle" width="150px" alt=""></a>
                            </div>
                            <h3></h3>
                            <p>Happy to see you !</p>
                            <form method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php if(isset($_COOKIE['ru'])) { echo $_COOKIE['ru'];} else { echo ''; }?>"  required >
                                    <i class="ik ik-user"></i>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" value="<?php if(isset($_COOKIE['ru'])) { echo $_COOKIE['rp'];} else { echo ''; }?>" required>
                                    <i class="ik ik-lock"></i>
                                </div>
                                <div class="row">
                                    <div class="col text-left">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="item_checkbox" name="item_rm" value="option1" value="1" <?php if(isset($_COOKIE['ru'])) {echo 'checked="checked"';} else { echo ''; }?>>
                                            <span class="custom-control-label">&nbsp;Remember Me</span>
                                        </label>
                                    </div>
                                    <!-- <div class="col text-right">
                                        <a href="forgot-password.html">Forgot Password ?</a>
                                    </div> -->
                                </div>
                                <div class="sign-btn text-center">
                                    <button type="submit"  id="log" name="log" class="btn btn-dark">Sign In</button>
                                </div>
                            </form>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>window.jQuery || document.write('<script src="public/public/src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
        <script src="public/public/plugins/popper.js/dist/umd/popper.min.js"></script>
        <script src="public/public/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="public/public/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="public/public/plugins/screenfull/dist/screenfull.js"></script>
        <script src="public/public/dist/js/theme.js"></script>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
