<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<img src="<?php echo base_url(); ?>application/assets/images/about-us.jpg" class="img-responsive" />
		</div>
	</div>
</div>

<div class="container-fluid" style="background:#F8F8F8;padding:2% 0;">
	<div class="row row-container custom-form-container body-calculator">
		<div class="col-md-6">
			<h1>Calculate Body Fat %</h1>
			<h3>Fill up this form to view your body fat detail </h3>
			<div class="body-fat-per-result desktop-view-body-fat-result">
				<h3>Your Result <span class="glyphicon glyphicon-hand-down"></span></h3>
					<div class="body-calc-result-view bdy-cal-result-view1">
						<span> Fat Percentage (%)</span>
                        <span class="label label-danger fat-percentage-res">0</span>
					</div>
					
					<div class="body-calc-result-view bdy-cal-result-view2">
						<span> Fat Mass (in Kgs.)</span>
                        <span class="label label-danger fat-mass-res">0</span>
					</div>
					
					<div class="body-calc-result-view bdy-cal-result-view3">
						<span> Lean Body Mass (in Kgs.)</span>
                        <span class="label label-danger lean-body-mass-res">0</span>
					</div>
					
					<div class="body-calc-result-view bdy-cal-result-view4">
						<span> Waist Hip Ratio</span>
                        <span class="label label-primary waist-hip-ratio-res">0</span>
					</div>
					
					<div class="body-calc-result-view bdy-cal-result-view5">
						<span> Waist Circum. Points</span>
                        <span class="label label-danger waist-circum-point-res">0</span>
					</div>
					
					<div class="body-calc-result-view bdy-cal-result-view6">
						<span> Waist Circum. Remarks</span>
                        <span class="label label-info waist-circum-remark">-</span>
					</div>
					
					<div class="body-calc-result-view bdy-cal-result-view7">
						<span> Waist Hip Points</span>
                        <span class="label label-primary waist-hip-point-res">0</span>
					</div>
					
					<div class="body-calc-result-view bdy-cal-result-view8">
						<span> Waist Hip Remarks</span>
                        <span class="label result-btn-col1 waist-hip-remark">-</span>
					</div>
					<!--
					<a class="quick-btn" href="#">
                                <i class="fa fa-briefase fa-2x"></i><br/>
                                <span> Briefcase</span>
                                <span class="label label-danger">42.36</span>
					</a>
					-->
                    
			</div>
		</div>
		<div class="col-md-6">
			<div class="body-cal-form-container">
				<form id="bodyfatForm" name="bodyfatForm" method="post">
				
				<!--
				<div class="form-group">
					<label for="bodyfat-venue">Venue</label>
					<select class="form-control" id="bodyfat-venue" name="bodyfat-venue">
						<?php foreach($bodycontent['venue'] as $venue){ ?>
							<option value="<?php echo $venue['loc_code'];?>" ><?php echo $venue['loc_name'];?></option>
							
						<?php } ?>
					</select>
					
				</div>-->
				
				  <div class="row">
					<div class="col-md-6">
						<div class="form-group">
						   <label for="bodyfat-firstname">First Name <span style="font-size:16px;font-weight:bold;">*</span></label>
						   <input type="text" class="form-control" id="bodyfat-firstname" name="bodyfat-firstname" placeholder="First Name" autocomplete="off">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
						  <label for="bodyfat-lastname">Last Name <span style="font-size:16px;font-weight:bold;">*</span></label>
						   <input type="text" class="form-control" id="bodyfat-lastname" name="bodyfat-lastname" placeholder="Last Name" autocomplete="off">
						</div>
					</div>
				  </div>
				  
				  
				  <div class="form-group">
					<label for="bodyfat-gender">Gender</label>
					<select class="form-control" id="bodyfat-gender" name="bodyfat-gender">
						<option value="M">MALE</option>
						<option value="F">FEMALE</option>
					</select>
				  </div>
				  
				  <div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="bodyfat-mobile">Mobile <span style="font-size:16px;font-weight:bold;">*</span></label>
							<input type="text" class="form-control" id="bodyfat-mobile" name="bodyfat-mobile" placeholder="Mobile no" onKeyUp="numericFilter(this);" autocomplete="off">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="bodyfat-email">Email</label>
							<input type="text" class="form-control" id="bodyfat-email" name="bodyfat-email" autocomplete="off">
						</div>
					</div>
				  </div>
				  <div class="form-group">
					<label for="weight">Weight(in Kgs) <span style="font-size:16px;font-weight:bold;">*</span></label>
					<input type="text" class="form-control" id="txt_weight" name="txt_weight" placeholder="" onKeyUp="numericFilter(this);" autocomplete="off">
				  </div>
				  <div class="form-group">
					<label for="waist">Waist(in Inches) <span style="font-size:16px;font-weight:bold;">*</span></label>
					<input type="text" class="form-control" id="txt_waist" name="txt_waist" placeholder="" onKeyUp="numericFilter(this);" autocomplete="off">
				  </div>
				  <div class="form-group">
					<label for="hip">Hip(in Inches) <span style="font-size:16px;font-weight:bold;">*</span></label>
					<input type="text" class="form-control" id="txt_hip" name="txt_hip" placeholder="" onKeyUp="numericFilter(this);" autocomplete="off">
				  </div>
					<button type="submit" class="btn cutome-link-btn"> Calculate
					 <span class="glyphicon glyphicon-chevron-right"></span> 
				  </button>
				</form>
				
				<div class="bodyfat-error" style="padding:1%;">
					<p id="bodyfat-error" class="error-style" style="color:#F95340;"></p>
				</div>
			
			</div>
			
			
			<!-- Body Calculator Result View -->
			
			<div class="body-fat-per-result responsive-view-body-fat-result">
				<h3>Your Result <span class="glyphicon glyphicon-hand-down"></span></h3>
					<div class="body-calc-result-view bdy-cal-result-view1">
						<span> Fat Percentage (%)</span>
                        <span class="label label-danger fat-percentage-res">12.00</span>
					</div>
					
					<div class="body-calc-result-view bdy-cal-result-view2">
						<span> Fat Mass (in Kgs.)</span>
                        <span class="label label-danger fat-mass-res">7.00</span>
					</div>
					
					<div class="body-calc-result-view bdy-cal-result-view3">
						<span> Lean Body Mass (in Kgs.)</span>
                        <span class="label label-danger lean-body-mass-res">53.00</span>
					</div>
					
					<div class="body-calc-result-view bdy-cal-result-view4">
						<span> Waist Hip Ratio</span>
                        <span class="label label-primary waist-hip-ratio-res">0.94</span>
					</div>
					
					<div class="body-calc-result-view bdy-cal-result-view5">
						<span> Waist Circum. Points</span>
                        <span class="label label-danger waist-circum-point-res">15</span>
					</div>
					
					<div class="body-calc-result-view bdy-cal-result-view6">
						<span> Waist Circum. Remarks</span>
                        <span class="label label-info waist-circum-remark">Very Low</span>
					</div>
					
					<div class="body-calc-result-view bdy-cal-result-view7">
						<span> Waist Hip Points</span>
                        <span class="label label-primary waist-hip-point-res">15</span>
					</div>
					
					<div class="body-calc-result-view bdy-cal-result-view8">
						<span> Waist Hip Remarks</span>
                        <span class="label result-btn-col1 waist-hip-remark">High Risk</span>
					</div>
					<!--
					<a class="quick-btn" href="#">
                                <i class="fa fa-briefase fa-2x"></i><br/>
                                <span> Briefcase</span>
                                <span class="label label-danger">42.36</span>
					</a>
					-->
                    
			</div>
			
		</div>
	</div>
</div>


<!-- Harvard Step Test -->

<div class="container-fluid" style="background:#FFFFFF;padding:2% 0;">
	<div class="row row-container custom-form-container body-calculator">
		<div class="col-md-6">
			<div class="body-cal-form-container">
				<form id="harvardTestForm" name="harvardTestForm" method="post">
				<!--
				<div class="form-group">
					<label for="bodyfat-venue">Venue</label>
					<select class="form-control" id="bodyfat-venue" name="bodyfat-venue">
						<?php foreach($bodycontent['venue'] as $venue){ ?>
							<option value="<?php echo $venue['loc_code'];?>" ><?php echo $venue['loc_name'];?></option>
							
						<?php } ?>
					</select>
					
				</div>-->
				
				  <div class="row">
					<div class="col-md-6">
						<div class="form-group">
						   <label for="harvard-test-firstname">First Name <span style="font-size:16px;font-weight:bold;">*</span></label>
						   <input type="text" class="form-control" id="harvard-test-firstname" name="harvard-test-firstname" placeholder="First Name" autocomplete="off">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
						  <label for="harvard-test-lastname">Last Name <span style="font-size:16px;font-weight:bold;">*</span></label>
						   <input type="text" class="form-control" id="harvard-test-lastname" name="harvard-test-lastname" placeholder="Last Name" autocomplete="off">
						</div>
					</div>
				  </div>
				  
				  
				  <div class="form-group">
					<label for="harvard-test-gender">Gender</label>
					<select class="form-control" id="harvard-test-gender" name="harvard-test-gender">
						<option value="M">MALE</option>
						<option value="F">FEMALE</option>
					</select>
				  </div>
				  
				  <div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="harvard-test-mobile">Mobile <span style="font-size:16px;font-weight:bold;">*</span></label>
							<input type="text" class="form-control" id="harvard-test-mobile" name="harvard-test-mobile" placeholder="Mobile no" onKeyUp="numericFilter(this);" autocomplete="off">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="harvard-test-email">Email</label>
							<input type="text" class="form-control" id="harvard-test-email" name="harvard-test-email" autocomplete="off">
						</div>
					</div>
				  </div>
				  <div class="form-group">
					<label for="weight">No. of Sec. <span style="font-size:16px;font-weight:bold;">*</span></label>
					<input type="text" class="form-control" id="no_of_sec" name="no_of_sec" placeholder="No. of sec to complete the exercise" onKeyUp="numericFilter(this);" autocomplete="off">
				  </div>
				  <div class="form-group">
					<label for="pulse-rate">Pulse Rate <span style="font-size:16px;font-weight:bold;">*</span></label>
					<input type="text" class="form-control" id="pulse-rate" name="pulse-rate" placeholder="" onKeyUp="numericFilter(this);" autocomplete="off">
				  </div>
				 
					<button type="submit" class="btn cutome-link-btn"> Calculate
					 <span class="glyphicon glyphicon-chevron-right"></span> 
				  </button>
				</form>
				
				<div class="harvard-test-error" style="padding:1%;">
					<p id="harvard-test-error" class="error-style" style="color:#F95340;"></p>
				</div>
			
			</div>
		</div>
		
		<div class="col-md-6">
			<h1>Calculate Harvard Step Test</h1>
			<h3>Fill up this form to view your harvard step test detail </h3>
			<div class="harvard-test-result">
				<h3>Your Result <span class="glyphicon glyphicon-hand-down"></span></h3>
				<h2>Score <span class="label label-warning">125</span></h2>
				<h2>Remarks <span class="label label-danger">Above Average</span></h2>
			</div>
		</div>
		
	</div>
</div>



