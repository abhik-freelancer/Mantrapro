<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <img src="<?php echo base_url(); ?>application/assets/images/trainer-banner.jpg" class="img-responsive" />
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row row-container ">
        <div class="col-md-12">
            <h1>
			<span class="first-text-col">O</span>ur <span class="first-text-col">T</span>rainers 
			</h1>
        </div>
    </div>
</div>


<?php if($bodycontent['trainer']){
	$i = 0;
	foreach($bodycontent['trainer'] as $trainer){ 
	
	if($i%2==0){
		$background_style = 'style="background:#F5F7F7;"';
		$imgname ='trainer_icon1.png';
	}
	else{
		$background_style = 'style="background:#FFFFFF;"';
		$imgname ='trainer_icon1.png';
	}
	if($trainer['about']==""){echo "";}else{
		
		$i++;
	?>

<div class="container-fluid" <?php echo $background_style;?>>
	<div class="row row-container">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="trainer-image">
						<img src="<?php echo base_url();?>application/assets/images/trainer/<?php echo $imgname;?>" />
					</div>
				</div>
				<div class="col-md-6 col-sm-6 ">
					<div class="trainer-info">
						<h3><?php echo $trainer['name'];?></h3>
						<h4><?php echo $trainer['designation'];?></h4>
						<h5><?php echo $trainer['branch'];?></h5>
					</div>
					<div class="about-trainer">
						<p><?php echo $trainer['about'];?></p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="trainer-certificates">
				<h3>CERTIFICATIONS:</h3>
				<p><?php echo $trainer['certification'];?></p>
			</div>
			<div class="trainer-specializations">
				<h3>SPECIALIZATIONS:</h3>
				<p><?php echo $trainer['specialization']; ?></p>
			</div>
			<div class="trainer-rating">
				<p>Trainer Rating : <span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span></p>
			</div>
		</div>
	</div>
</div>
	
	
	<?php } } } ?>

<!--
<div class="container-fluid">
	<div class="row row-container">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="trainer-image">
						<img src="<?php echo base_url();?>application/assets/images/trainer/trainers-p-1.jpg" />
					</div>
				</div>
				<div class="col-md-6 col-sm-6 ">
					<div class="trainer-info">
						<h3>Usha Sharma</h3>
						<h4>Trainer & Aerobic Teacher</h4>
						<h5>Barrackpore</h5>
					</div>
					<div class="about-trainer">
						<p>Phasellus pretium metus nec tellus molestie consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="trainer-certificates">
				<h3>CERTIFICATIONS:</h3>
				<p>Specialist in Aerobic Exercise, Diploma in Fitness Management (Netaji Subhas Open University) CPR Certified from (Mantra Institute of Health and fitness Management) </p>
			</div>
			<div class="trainer-specializations">
				<h3>SPECIALIZATIONS:</h3>
				<p>Lorem Ipsum , Lorem Ipsum , Lorem Ipsum</p>
			</div>
			<div class="trainer-rating">
				<p>Trainer Rating : <span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span></p>
			</div>
		</div>
	</div>
</div>


<div class="container-fluid" style="background:#F5F7F7;">
	<div class="row row-container">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="trainer-image">
						<img src="<?php echo base_url();?>application/assets/images/trainer/trainers-p-4.jpg" />
					</div>
				</div>
				<div class="col-md-6 col-sm-6 ">
					<div class="trainer-info">
						<h3>Mr. Uttam Paul</h3>
						<h4>Trainer & Fitness Report Analyzer</h4>
						<h5>Chiriamore</h5>
					</div>
					<div class="about-trainer">
						<p>Phasellus pretium metus nec tellus molestie consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="trainer-certificates">
				<h3>CERTIFICATIONS:</h3>
				<p>Diploma in Fitness Management (Netaji Subhas Open University), Mantra Fitness Certificate course, CPR Certified from (Mantra Institute of Health of Fitness Mantra Management) </p>
			</div>
			<div class="trainer-specializations">
				<h3>SPECIALIZATIONS:</h3>
				<p>Lorem Ipsum , Lorem Ipsum , Lorem Ipsum</p>
			</div>
			<div class="trainer-rating">
				<p>Trainer Rating : <span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span></p>
			</div>
		</div>
	</div>
</div>
-->




