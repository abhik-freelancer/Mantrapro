<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<img src="<?php echo base_url(); ?>application/assets/images/testimonial-banner.jpg" class="img-responsive" />
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row row-container">
		<div class="col-md-12">
			<h1><span class="first-text-col">M</span>antra <span class="first-text-col">T</span>estimonials</h1>
		</div>
		
	</div>
</div>

<div class="container-fluid">
	<div class="row row-container testimonial-page">
	
		<?php if($bodycontent['testimonials']){
			foreach($bodycontent['testimonials'] as $testimonials){ ?>
			<div class="col-md-4 col-sm-6 col-xs-12" >
			<div class="testimonial-page-block">
				<div class="testimonial-img">
					<img src="<?php echo base_url(); ?>application/assets/images/testimonials/<?php echo $testimonials['testimonialImage'];?>"  class="img-circle"  >
				</div>
				<div class="testimonial-name">
					<h5 class="person-name"><?php echo $testimonials['name'];?><br><?php echo $testimonials['occupation'];?>, <?php echo $testimonials['location'];?></h5>
				</div>
				<div class="diveder-line"></div>
				<div class="testimonial-desc">
					<?php echo $testimonials['comment'];?>
				</div>
			</div>
		</div>	
  <?php }
		} 
		?>
	
	
		
		
	</div>
</div>