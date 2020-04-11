<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php echo TITTLE_APP;?></title>
	<link rel="manifest" href="./manifest.json">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo HTML_DIR ?>images/favicon2_1.ico">
	<link rel="stylesheet" href="<?php echo HTML_DIR ?>css/fonts/maax/fonts.css">
	<link rel="stylesheet" href="<?php echo HTML_DIR ?>css/fonts/proximanova/fonts/fonts.min.css">
	<link rel="stylesheet" href="<?php echo HTML_DIR ?>css/icons/ionicons.min.css">
	<link rel="stylesheet" href="<?php echo HTML_DIR ?>css/animacion/animate.css">
	<link rel="stylesheet" href="<?php echo HTML_DIR ?>css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo HTML_DIR ?>css/hint.min.css">
  <link rel="stylesheet" href="<?php echo HTML_DIR ?>css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo HTML_DIR ?>css/sweetalert.css" />
  <link rel="stylesheet" href="<?php echo HTML_DIR ?>css/chosen.min.css">
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
	<link rel="stylesheet" href="<?php echo HTML_DIR ?>css/style.css">


	<script type="application/javascript" src="<?php echo HTML_DIR ?>js/jquery-3.4.1.min.js"></script>
  <script type="application/javascript" src="<?php echo HTML_DIR ?>js/moment.js"></script>
  <script type="application/javascript" src="<?php echo HTML_DIR ?>js/jquery.easing.1.3.js"></script>
  <script type="application/javascript" src="<?php echo HTML_DIR ?>js/jquery.transit.min.js"></script>
  <script type="application/javascript" src="<?php echo HTML_DIR ?>js/tether.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script type="application/javascript" src="<?php echo HTML_DIR ?>js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo HTML_DIR ?>js/sweetalert.min.js"></script>
  <script type="application/javascript" src="<?php echo HTML_DIR ?>js/chosen.jquery.min.js"></script>
  
  <script type="application/javascript" src="<?php echo HTML_DIR ?>js/data-table/jquery.dataTables.min.js"></script>
  <script type="application/javascript" src="<?php echo HTML_DIR ?>js/data-table/dataTables.bootstrap.min.js"></script>
  <script type="application/javascript" src="<?php echo HTML_DIR ?>js/data-table/dataTables.responsive.min.js"></script>
  <script type="application/javascript" src="<?php echo HTML_DIR ?>js/wNumb.js"></script> 
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-162465082-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-162465082-1');
</script>

  
</head>
<body>
	<div class="main-site">
		<header class="bg-azulclaro shadow-sm">
			<div class="justify-content-between container p-1 px-md-4 d-flex">
				<a href="?view=home" class="menu__logos">
					<img class="h-logo-header" style="margin-right: 20px;" src="<?php echo HTML_DIR ?>images/postobon/postobon.svg" alt="">
					<div class="others__logos">
						<img class="cervecera" src="<?php echo HTML_DIR ?>images/postobon/cervecera.svg" alt="">
						<img class="nutrium" src="<?php echo HTML_DIR ?>images/postobon/nutrium.svg" alt="">
					</div>
				</a>
	      <!-- <h5 class="my-0 mr-md-auto font-weight-normal">Company name</h5> -->
	      <div class="flex-column d-flex align-items-end">
	      	<nav class="my-0 my-md-0">
		        <a class="p-2 text-white menu__lg" href="?view=faq">Preguntas frecuentes</a>
		        <a style="background-color: #ff6e55 !important;" class="btn text-white" href="?view=register">Regístrate</a>
		        <span class="menu__sm" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ion-android-menu"></i></span>
		      </nav>
		      <div style="margin-top: 16px;">
		      	<img class="" src="<?php echo HTML_DIR ?>images/postobon/quedateencasa.png" alt="">
		      </div>
	      </div>
	      
	      
	    </div>		

	    <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto" style="border-top: 1px solid white; padding-top: 9px; margin-top: 9px;">
		    	<li class="nav-item">
		        <a class="nav-link p-2 text-white" href="?view=home">Inicio</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link p-2 text-white" href="#">Preguntas frecuentes</a>
		      </li>
		      
		  </div>

		</header><!-- /header -->
