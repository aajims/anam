
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Halaman Login</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?=base_url(); ?>assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=base_url(); ?>assets/dist/css/sb-admin-2.css" rel="stylesheet">
    <style type="text/css">
        .judul{
            margin-top: 15%;
            text-align: center;
        }
    </style>
    <!-- Custom Fonts -->
    <link href="<?=base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="bg">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="judul">
                    <h3>Aplikasi Monitoring Produksi</h3>
                    <h4>di</h4>
                    <h3>PT SELAMAT SEMPURNA Tbk</h3>
                </div><br>
<!--                <img src="--><?//=base_url('assets/img/img-login.jpeg'); ?><!--" style="margin-left: 65px; height: 210px">-->
                <div align="center"><h5><?php echo $this->session->flashdata('info');?></h5></div>
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" id="form" method="post" action="<?php echo base_url('Auth/login'); ?>">
                            <fieldset>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Input Username" name="username" data-validation="required"  autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder=" Input Password" name="password" type="password" data-validation="required">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?=base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=base_url(); ?>assets/js/jquery.form-validator.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?=base_url(); ?>assets/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url(); ?>assets/dist/js/sb-admin-2.js"></script>
    <script type="text/javascript">
        $.validate({
            form: '#form',
            validateOnBlur: true,
            showHelpOnFocus: true,
            addSuggestions: true,
            onSuccess: function($form) {
                console.log("success")
                return true;
            },
            onError: function() {
                console.log("Error")
            }
        });
    </script>

</body>

</html>
