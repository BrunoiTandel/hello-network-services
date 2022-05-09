<footer>
   	<div class="container">
      	<div class="row">
         	<div class="col-md-4">
	            <div class="ftr-logo">
               		<img src="<?php echo base_url()?>assets/dist/img/logo/logo.png" />
               		<p>Better Decisions, Made Easy</p>
            	</div>
         	</div>
         	<div class="col-md-4">
            	<div class="ftr-lnks">
               		<h3>Quick Links</h3>
               		<ul>
                  		<li><a href="<?php echo $this->config->item('my_base_url')?>">Home</a></li>
                  		<li><a href="<?php echo $this->config->item('my_base_url')?>about-us">About Us</a></li>
                  		<li><a href="<?php echo $this->config->item('my_base_url')?>products">Products</a></li>
                  		<li><a href="<?php echo $this->config->item('my_base_url')?>blog">Blog</a></li>
                  		<li><a href="<?php echo $this->config->item('my_base_url')?>contact-us">Contact Us</a></li>
               		</ul>
            	</div>
         	</div>
         	<div class="col-md-4">
            	<div class="ftr-adrs">
               		<h3>Connect with Us</h3>
               		<ul>
                  		<li><a href="mailto:abc@gmail.com">Email: abc@gmail.com</a></li>
                  		<li><a href="tel:+919999999999">Phone: +91 919999999999</a></li>
               		</ul>
            	</div>
            	<div class="ftr-scl">
               		<a href="http://localhost/gitHUB/hello-network-services/?/">
                  		<i class="fa fa-facebook" aria-hidden="true"></i>
               		</a>
               		<a href="http://localhost/gitHUB/hello-network-services/?/">
                  		<i class="fa fa-linkedin" aria-hidden="true"></i>
               		</a>
               		<a href="http://localhost/gitHUB/hello-network-services/?/">
                  		<i class="fa fa-twitter" aria-hidden="true"></i>
               		</a>
               		<a href="http://localhost/gitHUB/hello-network-services/?/">
                  		<i class="fa fa-instagram" aria-hidden="true"></i>
               		</a>
            	</div>
         	</div>
      	</div>
      	<div class="row">
         	<div class="col-md-12">
            	<div class="privacy">
               		<a href="<?php echo $this->config->item('my_base_url')?>terms-of-use">Terms of Use</a> &nbsp; | &nbsp; 
               		<a href="<?php echo $this->config->item('my_base_url')?>privacy-policy">Privacy Policy</a> &nbsp; | &nbsp; 
               		<a href="<?php echo $this->config->item('my_base_url')?>cancellation-policy">Cancellation Policy</a>
            	</div>
         	</div>
      	</div>
   	</div>
   	<div class="ftr-btm">
      	<div class="container">
         	<script type="text/javascript">
            	var date = new Date(),
            		year = date.getFullYear();
         	</script>
         	<div class="ftr-copy">Hello Network Services &copy; <script>document.write(year);</script> All Rights Reserved</div>
      	</div>
   	</div>
</footer>

<div class="modal fade custom-modal" id="check-login-modal">
    <div class="modal-dialog modal-md modal-dialog-centered">
		<div class="modal-content">
            <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
			</div>
			<div class="modal-body">
				<h4 class="how-to-continue-txt">Do you want to continue as</h4>
				<div class="row mt-4 mb-3">
					<div class="col-md-6 text-right">
						<button class="btn b-btn-continue-as-user" id="modal-continue-as-user-btn">User</button>
                    </div>
					<div class="col-md-6">
                        <a target="_blank" href="<?php echo $this->config->item('my_base_url')?>team-member" class="btn b-btn-team-member-login text-white no-text-decoration">Team Member</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade custom-modal" id="user-login-modal">
    <div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
               	<button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body sign-in-modal-body">
            	<h4 class="sign-in-modal-hdr-txt" id="myModalLabel">Sign In</h4>
	            <div class="mob-num" id="modal-mobile-number-otp-div">
	            	<p>Enter your Mobile Number</p>
	            	<input type="text" id="user-login-mobile-number-or-email-id" placeholder="Mobile Number">
	            	<div id="user-login-mobile-number-or-email-id-error-msg-div"></div>
	            	<p>Enter your password</p>
	            	<input type="password" id="user-login-password" placeholder="Password">
	            	<div id="user-login-password-error-msg-div"></div>
	            	<div class="row mt-2">
	            		<div class="col-md-12" id="user-login-error-msg-div"></div>
	            	</div>
	            	<button class="user-login-btn" id="user-login-btn" class="mt-2">Sign In</button>
	            </div>
	        </div>
        </div>
   	</div>
</div>

</body>
	<script type="text/javascript" src="<?php echo base_url()?>assets/user/js/popper.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/user/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/user/js/slick.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/user/js/wow.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/user/js/bootstrap-input-spinner.js"></script>

	<script src="<?php echo base_url()?>assets/custom-js/common-validations.js"></script>
	
	<script src="<?php echo base_url()?>assets/custom-js/user/login.js"></script>

	<!-- Toastr -->
	<script src="<?php echo base_url()?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
	<script src="<?php echo base_url()?>assets/plugins/toastr/toastr.min.js"></script>

	<script>
		$('.hm-testi-cnt').slick({
		  	autoplay: true,
		  	dots: false,
		  	autoplaySpeed: 3000,
		  	slidesToScroll: 1,
		  	centerMode: true,
		  	centerPadding: '0px',
		  	slidesToShow: 3
		});
	</script>
</html>