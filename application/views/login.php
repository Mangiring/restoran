<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo site_url('application/views/img/favicon.ico'); ?>">
    <title>Restoran Sehat Bersama</title>
    <!-- Bootstrap CSS -->    
    <link href="<?php echo site_url('application/views/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="<?php echo site_url('application/views/css/bootstrap-theme.css'); ?>" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="<?php echo site_url('application/views/css/elegant-icons-style.css'); ?>" rel="stylesheet" />
    <link href="<?php echo site_url('application/views/css/font-awesome.css'); ?>" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="<?php echo site_url('application/views/css/style.css'); ?>" rel="stylesheet">
    <link href="<?php echo site_url('application/views/css/style-responsive.css'); ?>" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="<?php echo site_url('application/views/js/html5shiv.js'); ?>"></script>
    <script src="<?php echo site_url('application/views/js/respond.min.js'); ?>"></script>
    <![endif]-->
</head>

  <body class="login-img3-body">

    <div class="container">
	<form action="<?php echo site_url('login/logging/'); ?>" class="login-form" method="post">
                <?php echo __get_error_msg(); ?>
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="text" class="form-control" name="uemail" placeholder="Email" autofocus>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" class="form-control" name="upass" placeholder="Password">
            </div>
            <label class="checkbox">
                <input type="checkbox" value="1" name="remember"> Remember me
            </label>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
        </div>
      </form>
    </div>
  </body>
</html>
