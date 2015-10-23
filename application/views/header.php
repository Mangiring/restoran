<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo site_url('application/views/img/favicon.png'); ?>">
    <title>Restoran Sehat Bersama</title>
    <!-- Bootstrap CSS -->    
    <link href="<?php echo site_url('application/views/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="<?php echo site_url('application/views/css/bootstrap-theme.css'); ?>" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="<?php echo site_url('application/views/css/elegant-icons-style.css'); ?>" rel="stylesheet" />
    <link href="<?php echo site_url('application/views/css/font-awesome.min.css'); ?>" rel="stylesheet" />    
    <!-- full calendar css-->
    <link href="<?php echo site_url('application/views/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css'); ?>" rel="stylesheet" />
	<link href="<?php echo site_url('application/views/assets/fullcalendar/fullcalendar/fullcalendar.css'); ?>" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="<?php echo site_url('application/views/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css'); ?>" rel="stylesheet" type="text/css" media="screen"/>
    <!-- owl carousel -->
    <link rel="stylesheet" href="<?php echo site_url('application/views/css/owl.carousel.css'); ?>" type="text/css">
	<link href="<?php echo site_url('application/views/css/jquery-jvectormap-1.2.2.css'); ?>" rel="stylesheet">
    <!-- Custom styles -->
	<link rel="stylesheet" href="<?php echo site_url('application/views/css/fullcalendar.css'); ?>">
	<link href="<?php echo site_url('application/views/css/widgets.css'); ?>" rel="stylesheet">
    <link href="<?php echo site_url('application/views/css/style.css'); ?>" rel="stylesheet">
    <link href="<?php echo site_url('application/views/css/style-responsive.css'); ?>" rel="stylesheet" />
	<link href="<?php echo site_url('application/views/css/xcharts.min.css'); ?>" rel=" stylesheet">	
	<link href="<?php echo site_url('application/views/css/jquery-ui-1.10.4.min.css'); ?>" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="<?php //echo site_url('application/views/js/html5shiv.js'); ?>"></script>
      <script src="<?php //echo site_url('application/views/js/respond.min.js'); ?>"></script>
      <script src="<?php //echo site_url('application/views/js/lte-ie7.js'); ?>"></script>
    <![endif]-->
	
	
    <script src="<?php echo site_url('application/views/js/jquery.js'); ?>"></script>
	<script src="<?php echo site_url('application/views/js/jquery-ui-1.10.4.min.js'); ?>"></script>
    <script src="<?php echo site_url('application/views/js/jquery-1.8.3.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo site_url('application/views/js/jquery-ui-1.9.2.custom.min.js'); ?>"></script>	
	
	
	
	
	
	
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
     
      
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="<?php echo site_url(); ?>" class="logo">Restoran <span class="lite">Mama Suka</span></a>
            <!--logo end-->

            <div class="nav search-row" id="top_menu">
                <!--  search form start -->
                <ul class="nav top-menu">                    
                    <li>
                        <form class="navbar-form">
                            <input class="form-control" placeholder="Search" type="text">
                        </form>
                    </li>                    
                </ul>
                <!--  search form end -->                
            </div>

            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="username"><?php echo $this -> memcachedlib -> sesresult['uemail']; ?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="<?php echo site_url('settings'); ?>"><i class="icon_profile"></i> My Profile</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('login/logout'); ?>" onclick="return confirm('<?php echo $this -> memcachedlib -> sesresult['uemail']; ?>, are you sure you want to logout?');"><i class="icon_lock_alt"></i> Sign Out</a>
                            </li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>      
      <!--header end-->
