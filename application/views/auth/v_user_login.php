<html lang="en" class="coming-soon">

<head>
    <meta charset="utf-8">
    <title>Login Form</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="author" content="KaijuThemes">

    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600" rel="stylesheet"
        type="text/css">
    <link type="text/css" href="<?php echo base_url();?>avenxo/assets/plugins/iCheck/skins/minimal/blue.css"
        rel="stylesheet">
    <link type="text/css" href="<?php echo base_url();?>avenxo/assets/fonts/font-awesome/css/font-awesome.min.css"
        rel="stylesheet">
    <link type="text/css" href="<?php echo base_url();?>avenxo/assets/fonts/themify-icons/themify-icons.css"
        rel="stylesheet"> <!-- Themify Icons -->
    <link type="text/css" href="<?php echo base_url();?>avenxo/assets/css/styles.css" rel="stylesheet">
</head>

<body class="focused-form animated-content">


    <div class="container" id="login-form">
        <div class="row">
            <div class="col-md-12" align="center">
                <a href="#" class="login-logo"><img src="<?php echo base_url();?>avenxo/assets/img/LOGO_49.png"></a>
            </div>
            <!-- col -12  -->
        </div>
        <!-- row  -->
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default"
                    style="visibility: visible; opacity: 1; display: block; transform: translateY(0px);">
                    <div class="panel-heading">
                        <h2>Login Form</h2>
                    </div>
                    <!-- panel-heading  -->

                    <div class="panel-body">
                        <form action="#" class="form-horizontal" id="validate-form">
                            <div class="form-group mb-md">
                                <div class="col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="ti ti-user"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Username"
                                            data-parsley-minlength="6" required="">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-md">
                                <div class="col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="ti ti-key"></i>
                                        </span>
                                        <input type="password" class="form-control" id="exampleInputPassword1"
                                            placeholder="Password">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-n">
                                <div class="col-xs-12">
                                    <a href="extras-forgotpassword.html" class="pull-left">Forgot password?</a>
                                    <div class="checkbox-inline icheck pull-right p-n">
                                        <label for="" class="">
                                            <div class="icheckbox_minimal-blue" style="position: relative;"><input
                                                    type="checkbox" style="position: absolute; opacity: 0;"><ins
                                                    class="iCheck-helper"
                                                    style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div>
                                            Remember me
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- panel-body -->
                    <div class="panel-footer">
                        <div class="clearfix">
                            <a href="extras-registration.html" class="btn btn-default pull-left">Register</a>
                            <a href="extras-login.html" class="btn btn-primary pull-right">Login</a>
                        </div>
                    </div>
                    <!-- panel-footer -->
                </div>
                <!-- panel panel-default -->
            </div>
            <!-- col-md-4 -->
        </div>
        <!-- row -->
    </div>
    <!-- container -->



    <!-- Load site level scripts -->

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>avenxo/assets/js/jquery-1.10.2.min.js"></script>
    <!-- Load jQuery -->
    <script type="text/javascript" src="<?php echo base_url();?>avenxo/assets/js/jqueryui-1.10.3.min.js"></script>
    <!-- Load jQueryUI -->
    <script type="text/javascript" src="<?php echo base_url();?>avenxo/assets/js/bootstrap.min.js"></script>
    <!-- Load Bootstrap -->
    <script type="text/javascript" src="<?php echo base_url();?>avenxo/assets/js/enquire.min.js"></script>
    <!-- Load Enquire -->

    <script type="text/javascript" src="<?php echo base_url();?>avenxo/assets/plugins/velocityjs/velocity.min.js">
    </script> <!-- Load Velocity for Animated Content -->
    <script type="text/javascript" src="<?php echo base_url();?>avenxo/assets/plugins/velocityjs/velocity.ui.min.js">
    </script>

    <script type="text/javascript" src="<?php echo base_url();?>avenxo/assets/plugins/wijets/wijets.js"></script>
    <!-- Wijet -->

    <script type="text/javascript" src="<?php echo base_url();?>avenxo/assets/plugins/codeprettifier/prettify.js">
    </script> <!-- Code Prettifier  -->
    <script type="text/javascript"
        src="<?php echo base_url();?>avenxo/assets/plugins/bootstrap-switch/bootstrap-switch.js"></script>
    <!-- Swith/Toggle Button -->

    <script type="text/javascript"
        src="<?php echo base_url();?>avenxo/assets/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js"></script>
    <!-- Bootstrap Tabdrop -->

    <script type="text/javascript" src="<?php echo base_url();?>avenxo/assets/plugins/iCheck/icheck.min.js"></script>
    <!-- iCheck -->

    <script type="text/javascript"
        src="<?php echo base_url();?>avenxo/assets/plugins/nanoScroller/js/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->

    <script type="text/javascript" src="<?php echo base_url();?>avenxo/assets/js/application.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>avenxo/assets/demo/demo.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>avenxo/assets/demo/demo-switcher.js"></script>

</body>

</html>