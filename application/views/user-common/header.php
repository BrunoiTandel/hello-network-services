<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hello Network Provider</title>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/user/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/user/css/animate.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/user/css/slick.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/user/css/slick-theme.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/user/css/custom.css">
	
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/toastr/toastr.min.css">
	
	<script type="text/javascript" src="<?php echo base_url()?>assets/user/js/jquery.min.js"></script>

	<script>
	   var base_url = "<?php echo $this->config->item('my_base_url')?>";
	</script>
</head>

<body>
	<nav class="navbar navbar-expand-md bg-white navbar-light fixed-top pb-0">
		<div class="container">
	  		<a class="navbar-brand" href="<?php echo $this->config->item('my_base_url')?>"><img src="<?php echo base_url()?>assets/dist/img/logo/logo.png"></a>
	  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
	    		<span class="navbar-toggler-icon"></span>
	  		</button>
	  		<div class="collapse navbar-collapse" id="collapsibleNavbar">
	    		<ul class="navbar-nav ml-auto d-xl-flex">
	      			<li class="nav-item active">
	        			<a class="nav-link" href="<?php echo $this->config->item('my_base_url')?>">Home</a>
	      			</li>
	      			<li class="nav-item">
	        			<a class="nav-link" href="<?php echo $this->config->item('my_base_url')?>#plans-div">Data Plans</a>
	      			</li>
	      			<li class="nav-item">
	        			<a class="nav-link" href="<?php echo $this->config->item('my_base_url')?>blogs">Blogs</a>
	      			</li>
	      			<li class="nav-item">
	        			<a class="nav-link" href="<?php echo $this->config->item('my_base_url')?>contact-us">Contact Us</a>
	      			</li>
	      			<li class="nav-item" id="hdr-sign-in-logout-li">
	      				<?php if ($this->session->userdata('logged-in-user')) { ?>
	      					<button id="user-logout-btn" class="user-logout-btn"><i class="fa fa-power-off"></i></button>
	      				<?php } else { ?>
	        				<button class="btn-sign-in-hdr" id="btn-sign-in-hdr" data-toggle="modal" data-target="#check-login-modal">Sign In</button>
	      				<?php } ?>
	      			</li>
	    		</ul>
	  		</div>
	  	</div>
	</nav>
	<div class="hdr-mrgn"></div>