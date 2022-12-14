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
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/user/css/custom-2.css">
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/user/css/custom-carousel.css"> -->
	
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/toastr/toastr.min.css">
	
	<script type="text/javascript" src="<?php echo base_url()?>assets/user/js/jquery.min.js"></script>

	<script>
	   	var img_base_url = '<?php echo base_url();?>';
	   	var base_url = "<?php echo $this->config->item('my_base_url')?>";
	   	var my_base_url = "<?php echo $this->config->item('my_base_url')?>";
	</script>
	<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7690060139204930"
     crossorigin="anonymous"></script>
  
	<script async custom-element="amp-auto-ads"
        src="https://cdn.ampproject.org/v0/amp-auto-ads-0.1.js">
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
	    		<ul class="navbar-nav ml-auto mr-auto d-xl-flex">
	      			<li class="nav-item">
	        			<a class="nav-link" href="<?php echo $this->config->item('my_base_url')?>">Home</a>
	      			</li>
	      			<li class="nav-item">
	        			<a class="nav-link" href="<?php echo $this->config->item('my_base_url')?>blogs">Blogs</a>
	      			</li>
	      			<li class="nav-item">
	        			<a class="nav-link" href="<?php echo $this->config->item('my_base_url')?>contact-us">Contact Us</a>
	      			</li>
	      			<li class="nav-item for-mobile">
	  					<a href="<?php echo $this->config->item('my_base_url')?>data-plans" class="hdr-view-data-plans">View Data Plans</a>
                    </li>
	  				<?php if ($this->session->userdata('logged-in-user')) { ?>
	      				<li class="nav-item dropdown-hover for-mobile" id="hdr-sign-in-logout-li">
	      					<a href="<?php echo $this->config->item('my_base_url')?>my-profile" class="user-logout-btn nav-link profile"><img src="<?php echo base_url()?>assets/user/images/personal.png" /></a>
	      					<div class="dropdown-hover-content">
	                           	<div class="profile-mn">
	                               	<a href="<?php echo $this->config->item('my_base_url')?>my-profile">Profile</a>
	                              	<a href="javascript:void(0)"onclick="user_logout()" class="lg-out">Logout</a>
	                           	</div>
	                        </div>
	      			<?php } else { ?>
	      				<li class="nav-item for-mobile" id="hdr-sign-in-logout-li">
	        				<button class="btn-sign-in-hdr" id="btn-sign-in-hdr" data-toggle="modal" data-target="#check-login-modal">Login</button>
	      				<?php } ?>
	      			</li>
	    		</ul>
	  		</div>
	  		<div class="for-desktop">
	  			<ul class="navbar-nav">
	  				<li class="nav-item">
	  					<a href="<?php echo $this->config->item('my_base_url')?>data-plans" class="hdr-view-data-plans">View Data Plans</a>
                    </li>
	  				<?php if ($this->session->userdata('logged-in-user')) { ?>
	      				<li class="nav-item dropdown-hover" id="hdr-sign-in-logout-li">
	      					<a href="<?php echo $this->config->item('my_base_url')?>my-profile" class="user-logout-btn nav-link profile"><img src="<?php echo base_url()?>assets/user/images/personal.png" /></a>
	      					<div class="dropdown-hover-content">
	                           	<div class="profile-mn">
	                               	<a href="<?php echo $this->config->item('my_base_url')?>my-profile">Profile</a>
	                              	<a href="javascript:void(0)"onclick="user_logout()" class="lg-out">Logout</a>
	                           	</div>
	                        </div>
	      			<?php } else { ?>
	      				<li class="nav-item" id="hdr-sign-in-logout-li">
	        				<button class="btn-sign-in-hdr" id="btn-sign-in-hdr" data-toggle="modal" data-target="#check-login-modal">Login</button>
	      				<?php } ?>
	      			</li>
	  			</ul>
	  		</div>
	  	</div>
	</nav>
	<div class="hdr-mrgn"></div>
	<ins class="adsbygoogle"
     style="display:block"
     data-ad-format="autorelaxed"
     data-ad-client="ca-pub-7690060139204930"
     data-ad-slot="4517332140"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>