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