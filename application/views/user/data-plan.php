<div id="home-page-banner-carousel" class="carousel slide" data-ride="carousel">
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
