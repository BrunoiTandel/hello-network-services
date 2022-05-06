<div id="home-page-banner-carousel" class="carousel slide" data-ride="carousel">
  	<div class="carousel-inner">
  		<?php $n = 5; for ($i = 0; $i < $n; $i++) {
  			$active = '';
  			if ($i == 0) {
  				$active = 'active';
  			} ?>
  			<div class="carousel-item <?php echo $active;?>">
	  			<img src="<?php echo base_url()?>assets/user/images/grey.png" alt="Los Angeles">
			</div>
  		<?php } ?>
  	</div>
  	
  	<?php if ($n > 0) { ?>
	  	<a class="carousel-control-prev" href="#home-page-banner-carousel" data-slide="prev">
	    	<span class="carousel-control-prev-icon"></span>
	  	</a>
	  	<a class="carousel-control-next" href="#home-page-banner-carousel" data-slide="next">
	    	<span class="carousel-control-next-icon"></span>
	  	</a>
  	<?php } ?>
</div>

<div class="our-company container-fluid">
	<div class="container-fluid custom-container-fluid-2">
		<div class="row mt-5">
			<div class="col-md-6">
				<img class="our-company-img" src="<?php echo base_url()?>assets/user/images/grey-2.png">
			</div>
			<div class="col-md-6">
				<div class="our-company-hdr">
					<label>
						Our company has <span>1+ years of experience!</span>
					</label>
				</div>
				<div class="our-company-desc">
					<p>An aspiring initiative of CSC e-Governance Services India Ltd. in form of CSC Wi-Fi Choupal is introduced for development of digital infrastructure in the villages as ‘Digital Village’. The initiative focuses on enhancement of Internet connectivity at the last mile through utilization of BharatNet Infrastructure.</p>
					<ul>
                        <li>Broadband Internet access across village via Rural Hostspots.</li>
                        <li>Broadband Internet access for Home &amp; Business Subscribers. </li>
                        <li>GPON &amp; OFC Maintenance. Professional Teams with equipments.</li>
                        <li>Wi-Fi Voice &amp; Video calling Soulutions.</li>
                        <li>Creating Infrastrure for Office Content Delivery.</li>
            		</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="plans-div container-fluid">
	<div class="row">
		<div class="col-md-12 text-center">
			<label class="text-plan-type-hdr">
				Pre-Paid <span>Data Packages</span>
			</label>
			<span class="text-plan-type-desc">
				We offer versatile data packages according to your requirement
			</span>
		</div>
	</div>
	<div class="container-fluid custom-container-fluid">
		<div class="row mt-5 packages-list-main-div" id="packages-list">
			<div class="col-md-4 package-details-main-div">
				<div class="package-details-div">
					<span class="package-name">Package 1</span>
					<span class="package-data-limit">Data Volume Limit : 1 GB</span>
					<span class="package-speed">Speed : upto 4mbps</span>
					<span class="package-validity">Validity : 2Days</span>
					<span class="package-price">Plan Price : <i class="fa fa-inr"></i> 150<br>(Inclusive of GST)</span>
					<button class="buy-plan-btn">Buy</button>
				</div>
			</div>
			<div class="col-md-4 package-details-main-div most-popular-active">
				<div class="package-details-div">
					<div class="most-popular">Best Item</div>
					<span class="package-name">Package 1</span>
					<span class="package-data-limit">Data Volume Limit : 1 GB</span>
					<span class="package-speed">Speed : upto 4mbps</span>
					<span class="package-validity">Validity : 2Days</span>
					<span class="package-price">Plan Price : <i class="fa fa-inr"></i> 150<br>(Inclusive of GST)</span>
					<button class="buy-plan-btn">Buy</button>
				</div>
			</div>
		</div>
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
			<div class="col-md-3">
				<div class="service-we-provide">
					<div class="service-number-image">
						<div class="service-number">01</div>
						<div class="service-image"><img src="<?php echo base_url()?>assets/user/images/creative.png"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container enquire-now-div">
	<div class="enquire-now-txt">Enquire Now</div>
	<div class="row">
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
            <button class="contact-btn" id="contact-us-submit-btn">Send</button>
		</div>	
	</div>
</div>

<script src="<?php echo base_url()?>assets/custom-js/user/contact-us.js"></script>