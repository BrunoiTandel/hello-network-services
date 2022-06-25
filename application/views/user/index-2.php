<div id="home-page-banner-carousel" class="carousel slide" data-ride="carousel">
	<?php $show_dynamic_slider = 0;
	if ($show_dynamic_slider == 1) { ?>
	  	<div class="carousel-inner">
	  		<?php $n = 4; 
	  		$a = 1; 
	  		for ($i = 0; $i < $n; $i++) {
	  			$active = '';
	  			if ($i == 0) {
	  				$active = 'active';
	  			} ?>
	  			<div class="carousel-item <?php echo $active;?>">
		  			<img src="<?php echo base_url()?>assets/user/images/<?php echo '0'.$a.'.jpg';?>" alt="Los Angeles">
				</div>
	  		<?php
	  		$a++;
	  		} ?>
	  	</div>
	  	
	  	<?php if ($n > 0) { ?>
		  	<a class="carousel-control-prev" href="#home-page-banner-carousel" data-slide="prev">
		    	<span class="carousel-control-prev-icon"></span>
		  	</a>
		  	<a class="carousel-control-next" href="#home-page-banner-carousel" data-slide="next">
		    	<span class="carousel-control-next-icon"></span>
		  	</a>
	  	<?php } 
	  } else { ?>
	  	<div class="carousel-inner">
  		  	<div class="carousel-item">
	  			<img src="http://localhost/gitHUB/hello-network-services/assets/user/images/01.jpg" alt="Los Angeles">
	  			<div class="carousel-caption">
        			<h3>Broadband Internet Access Across Village Via Rural Hostspots.</h3>
        			<p>The Company is engaged in BSNL distribution and high-speed Broadband service</p>
        			<div class="carousel-plans-div">
	      			<a href="#">Get Started<img src="<?php echo base_url()?>assets/user/images/arrow-right.png"></a>
	      			<div class="carousel-plans-desc-div">
	      				<label>Plan starts at</label>
	      				<span>₹1250/Month</span>
	      			</div>
	      		</div>
      		</div>
			</div>
  		  	<div class="carousel-item active">
	  			<img src="http://localhost/gitHUB/hello-network-services/assets/user/images/02.jpg" alt="Los Angeles">
	  			<div class="carousel-bg-shadow"></div>
	  			<div class="carousel-caption">
        			<h3>Broadband Internet Access Across Village Via Rural Hostspots.</h3>
        			<p>The Company is engaged in BSNL distribution and high-speed Broadband service</p>
        			<div class="carousel-plans-div">
	      			<a href="#">Get Started<img src="<?php echo base_url()?>assets/user/images/arrow-right.png"></a>
	      			<div class="carousel-plans-desc-div">
	      				<label>Plan starts at</label>
	      				<span>₹1250/Month</span>
	      			</div>
	      		</div>
      		</div>
			</div>
  		  	<div class="carousel-item">
	  			<img src="http://localhost/gitHUB/hello-network-services/assets/user/images/03.jpg" alt="Los Angeles">
	  			<div class="carousel-bg-shadow"></div>
	  			<div class="carousel-caption">
        			<h3>Broadband Internet Access Across Village Via Rural Hostspots.</h3>
        			<p>The Company is engaged in BSNL distribution and high-speed Broadband service</p>
        			<div class="carousel-plans-div">
	      			<a href="#">Get Started<img src="<?php echo base_url()?>assets/user/images/arrow-right.png"></a>
	      			<div class="carousel-plans-desc-div">
	      				<label>Plan starts at</label>
	      				<span>₹1250/Month</span>
	      			</div>
	      		</div>
      		</div>
			</div>
  		  	<div class="carousel-item">
	  			<img src="http://localhost/gitHUB/hello-network-services/assets/user/images/04.jpg" alt="Los Angeles">
	  			<div class="carousel-bg-shadow"></div>
	  			<div class="carousel-caption">
        			<h3>Broadband Internet Access Across Village Via Rural Hostspots.</h3>
        			<p>The Company is engaged in BSNL distribution and high-speed Broadband service</p>
        			<div class="carousel-plans-div">
	      			<a href="#">Get Started<img src="<?php echo base_url()?>assets/user/images/arrow-right.png"></a>
	      			<div class="carousel-plans-desc-div">
	      				<label>Plan starts at</label>
	      				<span>₹1250/Month</span>
	      			</div>
	      		</div>
      		</div>
			</div>
  		</div>
  		<a class="carousel-control-prev" href="#home-page-banner-carousel" data-slide="prev">
	    	<span class="carousel-control-prev-icon"></span>
	  	</a>
	  	<a class="carousel-control-next" href="#home-page-banner-carousel" data-slide="next">
	    	<span class="carousel-control-next-icon"></span>
	  	</a>
	<?php } ?>
</div>

<div class="plans-div container-fluid">
	<div class="row">
		<div class="col-md-12 text-center">
			<label class="text-plan-type-hdr">
				Here’s What <span>We Offer</span>
			</label>
			<span class="text-plan-type-desc">
				We offer versatile data packages according to your requirement
			</span>
		</div>
	</div>
	<div class="container-fluid custom-container-fluid">
		<div class="row packages-list-main-div" id="packages-list">
			<?php foreach($packages_list as $key => $value) { 
				$most_popuar_class = '';
				$best_item_div = '';
				if ($value['is_best_item'] == 1) {
					// $most_popuar_class = ' most-popular-active';
					$best_item_div = '<div class="most-popular"><i>★</i>Special Pack</div>';	
				}
			?>
				<div class="col-md-3 package-details-main-div<?php echo $most_popuar_class;?>">
					<div class="package-details-div">
						<div class="most-popular"><i>★</i>Special Pack</div>
						<span class="package-name"><?php echo $value['product_title'];?></span>
						<span class="package-data-limit">Data Volume Limit : <?php echo $value['product_volume_data_limit'];?></span>
						<span class="package-speed">Speed : upto <?php echo $value['product_data_speed'];?></span>
						<span class="package-validity">Validity : <?php echo $value['product_data_validation'];?></span>
						<span class="package-price">Plan Price : <i class="fa fa-inr"></i> <?php echo $value['product_plan_price'];?><br>(Exclusive of GST)</span>
						<a href="<?php echo $this->config->item('my_base_url')?>package-details-2/<?php echo md5(base64_encode(md5(md5($value['product_id']))));?>" class="buy-plan-btn">View Details</a>
					</div>
				</div>
			<?php } ?>	
		</div>
	</div>
</div>

<div class="our-company container-fluid">
	<div class="container-fluid custom-container-fluid-2">
		<div class="row mt-5">
			<div class="col-md-12">
				<div class="hm-testi-hd">
		         <h1>Our <span> Story</span></h1>
		      </div>
			</div>
			<div class="col-md-6">
				<!-- <img class="our-company-img" src="<?php echo base_url()?>assets/user/images/side-b.jpg"> -->
				<div class="about-us-desc-div">
		      	<p>The Company is engaged in BSNL distribution and high-speed Broadband service distribution reaching with presence in Vansda.</p>
					<p>The Company is the largest Digital Cable and Wireline Broadband Service Provider in Gujarat & is a leading Digital Cable TV Service provider in West Vansda. Hello Service Provider also has a significant presence in all other markets.</p>
					<p>The Company is constantly striving to enhance and simplify its customers' lives through quality services and products that give them the freedom to be entertained anytime, anywhere.</p>
		      </div>
			</div>
			<div class="col-md-6">
				<div class="our-company-hdr">
					<label>
						Our company has 1+ years of experience!
					</label>
				</div>
				<div class="our-company-desc">
					<p>An aspiring initiative of Hello Network Services (P) Ltd. in form of Hello Network Services is introduced for development of digital infrastructure in the villages as ‘Digital Village’. The initiative focuses on enhancement of Internet connectivity at the last mile through utilization of BharatNet Infrastructure.</p>
					<ol>
                  <li>Broadband Internet access across village via Rural Hostspots.</li>
                  <li>Broadband Internet access for Home &amp; Business Subscribers. </li>
                  <li class="d-none">GPON &amp; OFC Maintenance. Professional Teams with equipments.</li>
                  <li>Wi-Fi Voice &amp; Video calling Soulutions.</li>
                  <li>Creating Infrastrure for Office Content Delivery.</li>
      			</ol>
				</div>
			</div>
		</div>
		<div id="plans-div"></div>
	</div>
</div>

<div class="our-services container-fluid">
	<div class="container-fluid custom-container-fluid-2">
		<div class="row mt-5">
			<div class="col-md-12">
				<div class="our-services-hdr">
					<label>
						Services <span>We Provide</span>
					</label>
				</div>
			</div>
			<div id="our-services-carousel" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">
		  		  	<div class="carousel-item active">
			  			<img src="http://localhost/gitHUB/hello-network-services/assets/user/images/our-service-bg-img.png">
			  			<div class="carousel-caption">
		        			<h3>LAST MILE CONNECTIVITY</h3>
		        			<p>Hello Network Services initiative encapsulates enabling of Wi-Fi Service in all users by deploying affordable and effective infrastructure thereby delivering services at an affordable price.</p>
		      		</div>
					</div>
					<div class="carousel-item">
			  			<img src="http://localhost/gitHUB/hello-network-services/assets/user/images/our-service-bg-img.png">
			  			<div class="carousel-caption">
		        			<h3>LAST MILE CONNECTIVITY</h3>
		        			<p>Hello Network Services initiative encapsulates enabling of Wi-Fi Service in all users by deploying affordable and effective infrastructure thereby delivering services at an affordable price.</p>
		      		</div>
					</div>
		  		</div>
		  		<a class="carousel-control-prev" href="#our-services-carousel" data-slide="prev">
			    	<span class="carousel-control-prev-icon"></span>
			  	</a>
			  	<a class="carousel-control-next" href="#our-services-carousel" data-slide="next">
			    	<span class="carousel-control-next-icon"></span>
			  	</a>
			</div>
		</div>
	</div>
</div>

<section id="hm-testi">
   <div class="container">
      <div class="hm-testi-hd wow fadeInUp" data-wow-duration="1.8s">
         <h1 class="wow fadeInUp" data-wow-duration="1.8s">What Our Clients <span>Say About Us</span></h1>
      </div>
      <div class="hm-testi-cnt wow fadeInUp" data-wow-duration="2.1s">
         <div class="hm-testi-item">
            <div class="hm-testi-txt">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat.
            </div>
            <div class="hm-testi-nm">
               <h3>Ann Paul</h3>
               <p>CEO, Founder @ IBM</p>
            </div>
         </div>
         <div class="hm-testi-item">
            <div class="hm-testi-txt">
              Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
            <div class="hm-testi-nm">
               <h3>Sam</h3>
               <p>CEO, Founder @ TCS</p>
            </div>
         </div>
         <div class="hm-testi-item">
            <div class="hm-testi-txt">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat.
            </div>
            <div class="hm-testi-nm">
               <h3>Jennifer</h3>
               <p>CEO, Founder @ Wipro</p>
            </div>
         </div>
         <div class="hm-testi-item">
            <div class="hm-testi-txt">
              Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
            <div class="hm-testi-nm">
               <h3>Ann Paul</h3>
               <p>CEO, Founder @ IBM</p>
            </div>
         </div>
      </div>
   </div>
</section>

<div class="container pl-0 enquire-now-div">
	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-12 pl-0">
					<div class="enquire-now-txt">Enquire <span>Now<span></div>
					<div class="enquire-now-short-desc-txt">To know more about plans and details pls write us</div>
				</div>
				<div class="col-md-6 contact-fld">
					<input type="text" class="form-control" placeholder="First Name" id="contact-us-first-name">
					<div id="contact-us-first-name-error-msg-div"></div>
				</div>	
				<div class="col-md-6 contact-fld">
					<input type="text" class="form-control" placeholder="Last Name" id="contact-us-last-name">
					<div id="contact-us-last-name-error-msg-div"></div>
				</div>	
				<div class="col-md-6 contact-fld">
					<input type="text" class="form-control" placeholder="Email ID" id="contact-us-email-id">
					<div id="contact-us-email-id-error-msg-div"></div>
				</div>	
				<div class="col-md-6 contact-fld">
					<input type="text" class="form-control" placeholder="Phone" id="contact-us-phone-number">
					<div id="contact-us-phone-number-error-msg-div"></div>
				</div>	
				<div class="col-md-12 contact-fld">
					<textarea class="form-control" placeholder="Message" id="contact-us-message"></textarea>
					<div id="contact-us-message-error-msg-div"></div>
				</div>
				<div class="col-md-6"></div>
				<div class="col-md-6">
		         <button class="contact-btn" id="contact-us-submit-btn">Submit</button>
				</div>	
			</div>
		</div>
		<div class="col-md-6">
			<img class="index-enquiry-now-img" src="<?php echo base_url()?>assets/user/images/side-b.jpg">
		</div>
	</div>
</div>

<script src="<?php echo base_url()?>assets/custom-js/user/contact-us.js"></script>