<?php $package_details = $package_details['purchase_package_details']['package_details']; ?>
<script async custom-element="amp-ad" src="https://cdn.ampproject.org/v0/amp-ad-0.1.js"></script>
<amp-ad width="100vw" height="320"
     type="adsense"
     data-ad-client="ca-pub-7690060139204930"
     data-ad-slot="4517332140"
     data-auto-format="mcrspv"
     data-full-width="">
  <div overflow=""></div>
</amp-ad>
<div id="package-details-main-div">
	<div class="plans-div container">
		<div class="row">
			<div class="col-md-12">
				<label class="text-plan-type-hdr">
					<?php echo $package_details['product_title'];?>
				</label>
				<span class="text-plan-type-desc">
					<?php echo $package_details['product_content'];?>
				</span>
				<div class="row">
					<div class="col-md-6">
						<span class="text-plan-type-desc">
							Data Volume Limit : <?php echo $package_details['product_volume_data_limit'];?>
						</span>
					</div>
					<div class="col-md-6">
						<span class="text-plan-type-desc">
							Speed : upto <?php echo $package_details['product_data_speed'];?>
						</span>
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-md-6">
						<span class="text-plan-type-desc">
							Validity : <?php echo $package_details['product_data_validation'];?>
						</span>
					</div>
					<div class="col-md-6">
						<span class="text-plan-type-desc">
							Plan Price : <i class="fa fa-inr"></i> <?php echo $package_details['product_plan_price'];?><br>(Exclusive of GST)
						</span>
					</div>
					<div class="col-md-12 mt-3 text-right">
						<button onclick="but_now()" class="buy-plan-btn buy-plan-btn-2">Buy Now</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
	var package_id = '<?php echo $package_id; ?>';
</script>
<script src="<?php echo base_url()?>assets/custom-js/user/purchase-plan.js"></script>