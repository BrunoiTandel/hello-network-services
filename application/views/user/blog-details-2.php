<section id="blog-banner">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="blog-cnt-1 text-left" >
					<div class="blog-txt-1">
						<span class="blog-breadcrum">
							<a href="<?php echo $this->config->item('my_base_url')?>blogs"><i class="fa fa-angle-left"></i> Back</a> / <?php echo $blog_details['blog_title'];?></span>
        				<h1><?php echo $blog_details['blog_title'];?></h1>
        			</div>
        		</div>
        		<div class="row">
        			<div class="col-md-4">
        				<?php echo date_format(date_create($blog_details['blog_created_date']),'d-m-Y H:i:s');?>
        			</div>
        			<div class="col-md-12 mt-3">
        				<img class="blog-details-thumbnail" src="<?php echo base_url()?>assets/uploads/blog-thumbnail/<?php echo $blog_details['blog_thumbnail_image'];?>">
        				<div class="blog-description">
        					<?php echo $blog_details['blog_content'];?>
        				</div>
        			</div>
        		</div>	
			</div>
		</div>
   	</div>
</section>