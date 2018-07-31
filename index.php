<!DOCTYPE>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
 <title>SI BEKAM</title>
 <!-- Bootstrap -->
 <!-- css -->
<script type="text/javascript" src="prmajax.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/bootstrap-theme.min.css" rel="stylesheet">
<link href="color/default.css" rel="stylesheet">
<link href="css/animations.css" rel="stylesheet" />
<!-- HTML5 shim and Respond.for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<style>
	.vertical-center{
	margin-top: 65px;
	margin-left: auto;
	margin-right: auto;
	min-height: 90%;  /* Fallback for browsers do NOT support vh unit */
	min-height: 90vh; /* These two lines are counted as one :-)       */ 
    width: 20%;
    display: flex;
	align-items: center;
	}
</style>
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-custom" style='background-color:#20B2AA'>
<section class="hero" id="intro">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-right navicon">
					<a id="nav-toggle" class="nav_slide_button" href="#"><span></span></a>
				</div>
			</div>
			<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center inner">
				<div class="animatedParent">
					<h1 class="animated fadeInDown">SI BEKAM</h1>
					<p class="animated fadeInUp">Sistem Penentuan Gangguan Kesehatan Terapi BEKAM</p></div>
				</div>
			</div>
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center">
						<a href="#about" class="learn-more-btn btn-scroll">Selengkapnya</a>
					</div>
				</div>
			</div>
</section>
<section id="about">
<div class="container">	
	<div class="vertical-center">
		<div class="panel panel-default center-block">
			<div  class="panel-heading">
				 <h3 class="panel-title text-center">SI BEKAM</h3>
			</div>
			<div class="panel-body">
				<form class="form" role="form" name='login' action='proses.php' method='post'>
					<div class="form-group form-group-sm">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
							<input type="text" class="form-control input-sm" name="nama" placeholder="NAMA" maxsize="20" size="20" id="nama" required autofocus/>
						</div>
					</div>
					<div class="form-group form-group-sm">
						<div class="input-group">
							<span  class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
							<input type="password" class="form-control input-sm" name="password" placeholder="PASSWORD" maxsize="20" size="20" id="password"required />
						</div>
					</div>
					<button class = "btn btn-lg btn-successful btn-block" id="button"type = "submit" name = "submit" value="Submit">Masuk</button>
				</form>
			</div><!-- /panel body -->
		</div> <!-- /panel -->
	</div>
</div><!-- /container -->
</section>
<!-- Core JavaScript Files -->
<script src="js/jquery.min.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.sticky.js"></script>
<script src="js/nivo-lightbox.min.js"></script>
<script src="js/custom.js"></script>
<script src="js/css3-animate-it.js"></script>
</body>
<div class="container">
		<div class="row">
			<div class="text-right">
				<b>Copyirght © Bekam Holistic Center</b> All rights reserved</p>
			</div>
		</div>
	</div>	
</html>
