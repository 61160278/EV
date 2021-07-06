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

<style>
#bg_login {
    background-image: url("<?php echo base_url();?>pic/BG_LOGIN.jpg");
}

/* body  */
</style>

<script>
function validate() {

    var user = document.getElementById("user").value;
    var pass = document.getElementById("pass").value;

    if (user != "" && pass != "") {

        return true;
    }
    // if
    else if (user == "" && pass == "") {
        $("#user").css("background-color", "#ffe6e6");
        $("#user").css("border-style", "solid");
        $("#pass").css("background-color", "#ffe6e6");
        $("#pass").css("border-style", "solid");
        return false;
    }
    // else if 

}
// function validate
</script>

<body class="focused-form animated-content" id="bg_login">


    <div class="container" id="login-form">
        <div class="row">
            <div class="col-md-5" align="center">
                <img class="login-logo" src="<?php echo base_url();?>pic/denso.png" height="60%">
            </div>
            <!-- col -6  -->
            <div class="col-md-7" align="center">
                <img class="login-logo" src="<?php echo base_url();?>avenxo/assets/img/Logofinal.png" height="15%">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading" align="center">
                            <h3 id="login_txt">Login</h3>
                        </div>
                        <!-- panel-heading  -->

                        <div class="panel-body">
                            <form action="<?php echo base_url();?>Auth/check_login" class="form-horizontal"
                                id="validate-form" method="POST">
                                <div class="form-group mb-md">
                                    <div class="col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="ti ti-user"></i>
                                            </span>
                                            <input type="text" class="form-control" name="user" id="user"
                                                placeholder="Username" required="">
                                        </div>
                                        <!-- input-group -->
                                    </div>
                                    <!-- col-xs-12 -->
                                </div>
                                <!-- form-group -->

                                <div class="form-group mb-md">
                                    <div class="col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="ti ti-key"></i>
                                            </span>
                                            <input type="password" class="form-control" name="pass" id="pass"
                                                placeholder="Password" required="">
                                        </div>
                                        <!-- input-group -->
                                    </div>
                                    <!-- col-xs-12 -->
                                </div>
                                <!-- form-group -->

                        </div>
                        <!-- panel-body -->
                        <div class="panel-footer">
                            <div class="clearfix">
                                <input type="submit" class="btn btn-primary pull-right" value="Login">
                            </div>
                        </div>
                        <!-- panel-footer -->
                    </div>
                    <!-- panel panel-default -->
                    </form>
                    <!-- form  -->
                </div>
                <!-- col-md-4 -->
            </div>
            <!-- col -6  -->
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