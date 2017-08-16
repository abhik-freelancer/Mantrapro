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
			</div>
		</div>
		<div class="col-md-6">
			<div class="body-cal-form-container">
				<form id="bodyfatForm" name="bodyfatForm" method="post">
				
				
				<div class="form-group">
					<label for="bodyfat-venue">Venue</label>
					<select class="form-control" id="bodyfat-venue" name="bodyfat-venue">
						<?php foreach($bodycontent['venue'] as $venue){ ?>
							<option value="<?php echo $venue['loc_code'];?>" <?php if($venue['loc_code']=='WE'){echo "selected";}else{echo "";}?> ><?php echo $venue['loc_name'];?></option>
							
						<?php } ?>
					</select>
					
				</div>
				
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
				  
				<div class="form-group">
					<label for="situp-test-dob">DOB</label>
					<input type="text" class="form-control" id="body-fat-dob" name="body-fat-dob" placeholder="dd-mm-yyyy  Ex: 01-05-1990" autocomplete="off" onKeyUp="numericFilter(this);" readonly >
					<input type="hidden" class="form-control" id="body-fat-age" name="body-fat-age" autocomplete="off" onKeyUp="numericFilter(this);" >
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
					<label for="weight">Weight (in Kgs) <span style="font-size:16px;font-weight:bold;">*</span></label>
					<input type="text" class="form-control" id="txt_weight" name="txt_weight" placeholder="" onKeyUp="numericFilter(this);" autocomplete="off">
				  </div>
				  <div class="form-group">
					<label for="waist">Waist (Navel - in Inches) <span style="font-size:16px;font-weight:bold;">*</span></label>
					<input type="text" class="form-control" id="txt_waist_navel" name="txt_waist_navel" placeholder="" onKeyUp="numericFilter(this);" autocomplete="off">
				  </div>
				   <div class="form-group">
					<label for="waist">Waist (in Inches) <span style="font-size:16px;font-weight:bold;">*</span></label>
					<input type="text" class="form-control" id="txt_waist" name="txt_waist" placeholder="" onKeyUp="numericFilter(this);" autocomplete="off">
				  </div>
				  <div class="form-group">
					<label for="hip">Hip (in Inches) <span style="font-size:16px;font-weight:bold;">*</span></label>
					<input type="text" class="form-control" id="txt_hip" name="txt_hip" placeholder="" onKeyUp="numericFilter(this);" autocomplete="off">
				  </div>
					<button type="submit" class="btn cutome-link-btn"> <span class="glyphicon glyphicon-chevron-left"></span>  Calculate
					 
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
	</div>
</div>


<!-- Harvard Step Test -->

<div class="container-fluid" style="background:#FFFFFF;padding:2% 0;">
	<div class="row row-container custom-form-container body-calculator harvard-step-test">
		<div class="col-md-6">
			<div class="responsive-view">
				<h1>Calculate Harvard Step Test</h1>
				<h3>Fill up this form to view your harvard step test detail </h3>
			</div>
			<div class="body-cal-form-container">
				<form id="harvardTestForm" name="harvardTestForm" method="post">
			
				<div class="form-group">
					<label for="harvardtest-venue">Venue</label>
					<select class="form-control" id="harvardtest-venue" name="harvardtest-venue">
						<?php foreach($bodycontent['venue'] as $venue){ ?>
							<option value="<?php echo $venue['loc_code'];?>" <?php if($venue['loc_code']=='WE'){echo "selected";}else{echo "";}?> ><?php echo $venue['loc_name'];?></option>
							
						<?php } ?>
					</select>
					
				</div>
				
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
						<option value="MALE">MALE</option>
						<option value="FEMALE">FEMALE</option>
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
		
		<div class="col-md-6 ">
			<div class="no-responsive-view">
				<h1>Calculate Harvard Step Test</h1>
				<h3>Fill up this form to view your harvard step test detail </h3>
			</div>
			<div class="harvard-test-result">
				<h3>Your Result <span class="glyphicon glyphicon-hand-down"></span></h3>
				<h2>Score <span class="label bdy-cal-result-view5 harvard-score-result" >0</span></h2>
				<h2>Remarks <span class="label bdy-cal-result-view2 harvard-rating-result">-</span></h2> 
			</div>
		</div>
		
	</div>
</div>


<!--- Sit And Reach Test -->


<div class="container-fluid" style="background:#F8F8F8;padding:2% 0;">
	<div class="row row-container custom-form-container body-calculator">
		<div class="col-md-6">
			<h1>Calculate Sit & Reach Test</h1>
			<h3>Fill up this form to view your sit & reach detail </h3>
			<div class="body-fat-per-result no-responsive-view">
				<h3>Your Result <span class="glyphicon glyphicon-hand-down"></span></h3>
				<h2 style="text-align:center;">Remarks <span class="label bdy-cal-result-view1 sitandreach-rating">-</span></h2> 
			</div>
		</div>
		<div class="col-md-6">
			<div class="body-cal-form-container" style="margin-top:1%;">
				<form id="sitAndReachForm" name="sitAndReachForm" method="post">
				
				
				<div class="form-group">
					<label for="sitandreach-venue">Venue</label>
					<select class="form-control" id="sitandreach-venue" name="sitandreach-venue">
						<?php foreach($bodycontent['venue'] as $venue){ ?>
							<option value="<?php echo $venue['loc_code'];?>" <?php if($venue['loc_code']=='WE'){echo "selected";}else{echo "";}?>><?php echo $venue['loc_name'];?></option>
							
						<?php } ?>
					</select>
					
				</div>
				
				  <div class="row">
					<div class="col-md-6">
						<div class="form-group">
						   <label for="sitandreach-firstname">First Name <span style="font-size:16px;font-weight:bold;">*</span></label>
						   <input type="text" class="form-control" id="sitandreach-firstname" name="sitandreach-firstname" placeholder="First Name" autocomplete="off">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
						  <label for="sitandreach-lastname">Last Name <span style="font-size:16px;font-weight:bold;">*</span></label>
						   <input type="text" class="form-control" id="sitandreach-lastname" name="sitandreach-lastname" placeholder="Last Name" autocomplete="off">
						</div>
					</div>
				  </div>
				  
				  
				  <div class="form-group">
					<label for="sitandreach-gender">Gender</label>
					<select class="form-control" id="sitandreach-gender" name="sitandreach-gender">
						<option value="MALE">MALE</option>
						<option value="FEMALE">FEMALE</option>
					</select>
				  </div>
				  
				  
				  <div class="form-group">
					<label for="sitandreach-dob">DOB</label>
					<input type="text" class="form-control" id="sitandreach-dob" name="sitandreach-dob" placeholder="dd-mm-yyyy  Ex: 01-05-1990" autocomplete="off" onKeyUp="numericFilter(this);" >
					</div>
				  
				  <div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="sitandreach-mobile">Mobile <span style="font-size:16px;font-weight:bold;">*</span></label>
							<input type="text" class="form-control" id="sitandreach-mobile" name="sitandreach-mobile" placeholder="Mobile no" onKeyUp="numericFilter(this);" autocomplete="off">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="sitandreach-email">Email</label>
							<input type="text" class="form-control" id="sitandreach-email" name="sitandreach-email" autocomplete="off">
						</div>
					</div>
				  </div>
				  <div class="form-group">
					<label for="sitandreach-age">Age <span style="font-size:16px;font-weight:bold;">*</span></label>
					<input type="text" class="form-control" id="sitandreach-age" name="sitandreach-age" placeholder="" onKeyUp="numericFilter(this);" autocomplete="off" readonly="">
				  </div>
				  <div class="form-group">
					<label for="sitandreach-distance">Distance(in Inches) <span style="font-size:16px;font-weight:bold;">*</span></label>
					<input type="text" class="form-control" id="sitandreach-distance" name="sitandreach-distance" placeholder="" onKeyUp="numericFilter(this);" autocomplete="off">
				  </div>
				  
					<button type="submit" class="btn cutome-link-btn"> <span class="glyphicon glyphicon-chevron-left"></span>  Calculate
					 
				  </button>
				</form>
				
				<div class="sitandreach-error" style="padding:1%;">
					<p id="sitandreach-error" class="error-style" style="color:#F95340;"></p>
				</div>
			
			</div>
			
			
			<!-- Sit and reach View -->
			
			<div class="body-fat-per-result responsive-view">
				<h3>Your Result <span class="glyphicon glyphicon-hand-down"></span></h3>
				<h2 style="text-align:center;">Remarks <span class="label bdy-cal-result-view1 sitandreach-rating">-</span></h2> 
			</div>
			
		</div>
	</div>
</div>



<!-- Push Up Test -->

<div class="container-fluid" style="background:#FFFFFF;padding:2% 0;">
	<div class="row row-container custom-form-container body-calculator harvard-step-test">
		<div class="col-md-6">
			<div class="responsive-view">
				<h1>Calculate Push Up Test</h1>
				<h3>Fill up this form to view your push up test detail </h3>
			</div>
			<div class="body-cal-form-container">
				<form id="pushUpTestForm" name="pushUpTestForm" method="post">
				
				<div class="form-group">
					<label for="pushup-venue">Venue</label>
					<select class="form-control" id="pushup-venue" name="pushup-venue">
						<?php foreach($bodycontent['venue'] as $venue){ ?>
							<option value="<?php echo $venue['loc_code'];?>" <?php if($venue['loc_code']=='WE'){echo "selected";}else{echo "";}?> ><?php echo $venue['loc_name'];?></option>
							
						<?php } ?>
					</select>
					
				</div>
				
				  <div class="row">
					<div class="col-md-6">
						<div class="form-group">
						   <label for="pushup-test-firstname">First Name <span style="font-size:16px;font-weight:bold;">*</span></label>
						   <input type="text" class="form-control" id="pushup-test-firstname" name="pushup-test-firstname" placeholder="First Name" autocomplete="off">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
						  <label for="pushup-test-lastname">Last Name <span style="font-size:16px;font-weight:bold;">*</span></label>
						   <input type="text" class="form-control" id="pushup-test-lastname" name="pushup-test-lastname" placeholder="Last Name" autocomplete="off">
						</div>
					</div>
				  </div>
				  
				  
				  <div class="form-group">
					<label for="pushup-test-gender">Gender</label>
					<select class="form-control" id="pushup-test-gender" name="pushup-test-gender">
						<option value="MALE">MALE</option>
						<option value="FEMALE">FEMALE</option>
					</select>
				  </div>
				  
				   <div class="form-group">
						<label for="pushup-test-dob">DOB</label>
						<input type="text" class="form-control" id="pushup-test-dob" name="pushup-test-dob" placeholder="dd-mm-yyyy  Ex: 01-05-1990" autocomplete="off" onKeyUp="numericFilter(this);" >
				   </div>
				  
				  <div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="pushup-test-mobile">Mobile <span style="font-size:16px;font-weight:bold;">*</span></label>
							<input type="text" class="form-control" id="pushup-test-mobile" name="pushup-test-mobile" placeholder="Mobile no" onKeyUp="numericFilter(this);" autocomplete="off">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="pushup-test-email">Email</label>
							<input type="text" class="form-control" id="pushup-test-email" name="pushup-test-email" autocomplete="off">
						</div>
					</div>
				  </div>
				  <div class="form-group">
					<label for="pushup-age">Age <span style="font-size:16px;font-weight:bold;">*</span></label>
					<input type="text" class="form-control" id="pushup-test-age" name="pushup-test-age" placeholder="" onKeyUp="numericFilter(this);" autocomplete="off" readonly="">
				  </div>
				 
				  <div class="form-group">
					<label for="pushup-test-repetitions">Push Up Repetitions <span style="font-size:16px;font-weight:bold;">*</span></label>
					<input type="text" class="form-control" id="pushup-test-repetitions" name="pushup-test-repetitions" placeholder="" onKeyUp="numericFilter(this);" autocomplete="off">
				  </div>
				 
					<button type="submit" class="btn cutome-link-btn"> Calculate
					 <span class="glyphicon glyphicon-chevron-right"></span> 
				  </button>
				</form>
				
				<div class="pushup-test-error" style="padding:1%;">
					<p id="pushup-test-error" class="error-style" style="color:#F95340;"></p>
				</div>
			
			</div>
		</div>
		
		<div class="col-md-6">
			<div class="no-responsive-view">
				<h1>Calculate Push Up Test</h1>
				<h3>Fill up this form to view your harvard step test detail </h3>
			</div>
			<div class="harvard-test-result">
				<h3>Your Result <span class="glyphicon glyphicon-hand-down"></span></h3>
				<h2>Score <span class="label bdy-cal-result-view5 pushup-score-result" >0</span></h2>
				<h2>Remarks <span class="label bdy-cal-result-view2 pushup-rating-result">-</span></h2> 
			</div>
		</div>
		
	</div>
</div>



<!--- Sit up Test --->

<div class="container-fluid" style="background:#F8F8F8;padding:2% 0;">
	<div class="row row-container custom-form-container body-calculator">
		<div class="col-md-6">
			<h1>Calculate Sit Up Test</h1>
			<h3>Fill up this form to view your sit up test detail </h3>
			<div class="body-fat-per-result no-responsive-view">
				<h3>Your Result <span class="glyphicon glyphicon-hand-down"></span></h3>
				<h2 style="text-align:center;">Score <span class="label bdy-cal-result-view5 situp-score-result" >0</span></h2>
				<h2 style="text-align:center;">Remarks <span class="label bdy-cal-result-view2 situp-rating-result">-</span></h2> 
			</div>
		</div>
		<div class="col-md-6">
			<div class="body-cal-form-container" style="margin-top:1%;">
				<form id="sitUpTestForm" name="sitUpTestForm" method="post">
				
				
				<div class="form-group">
					<label for="pushup-venue">Venue</label>
					<select class="form-control" id="pushup-venue" name="pushup-venue">
						<?php foreach($bodycontent['venue'] as $venue){ ?>
							<option value="<?php echo $venue['loc_code'];?>" <?php if($venue['loc_code']=='WE'){echo "selected";}else{echo "";}?>><?php echo $venue['loc_name'];?></option>
							
						<?php } ?>
					</select>
					
				</div>
				
				  <div class="row">
					<div class="col-md-6">
						<div class="form-group">
						   <label for="situp-test-firstname">First Name <span style="font-size:16px;font-weight:bold;">*</span></label>
						   <input type="text" class="form-control" id="situp-test-firstname" name="situp-test-firstname" placeholder="First Name" autocomplete="off">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
						  <label for="situp-test-lastname">Last Name <span style="font-size:16px;font-weight:bold;">*</span></label>
						   <input type="text" class="form-control" id="situp-test-lastname" name="situp-test-lastname" placeholder="Last Name" autocomplete="off">
						</div>
					</div>
				  </div>
				  
				  <div class="form-group">
					<label for="situp-test-gender">Gender</label>
					<select class="form-control" id="situp-test-gender" name="situp-test-gender">
						<option value="MALE">MALE</option>
						<option value="FEMALE">FEMALE</option>
					</select>
				  </div>
				  
				  
				  <div class="form-group">
					<label for="situp-test-dob">DOB</label>
					<input type="text" class="form-control" id="situp-test-dob" name="situp-test-dob" placeholder="dd-mm-yyyy  Ex: 01-05-1990" autocomplete="off" onKeyUp="numericFilter(this);" >
				 </div>
				  
				  <div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="situp-test-mobile">Mobile <span style="font-size:16px;font-weight:bold;">*</span></label>
							<input type="text" class="form-control" id="situp-test-mobile" name="situp-test-mobile" placeholder="Mobile no" onKeyUp="numericFilter(this);" autocomplete="off">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="situp-test-email">Email</label>
							<input type="text" class="form-control" id="situp-test-email" name="situp-test-email" autocomplete="off">
						</div>
					</div>
				  </div>
				  <div class="form-group">
					<label for="situp-test-age">Age </label>
					<input type="text" class="form-control" id="situp-test-age" name="situp-test-age" placeholder="" onKeyUp="numericFilter(this);" autocomplete="off" readonly="">
				  </div>
				  <div class="form-group">
					<label for="situp-test-repetitions">Sit Up Repetations <span style="font-size:16px;font-weight:bold;">*</span></label>
					<input type="text" class="form-control" id="situp-test-repetitions" name="situp-test-repetitions" placeholder="" onKeyUp="numericFilter(this);" autocomplete="off">
				  </div>
				  
					<button type="submit" class="btn cutome-link-btn"> <span class="glyphicon glyphicon-chevron-left"></span>  Calculate </button>
				</form>
				
				<div class="situp-test-error" style="padding:1%;">
					<p id="situp-test-error" class="error-style" style="color:#F95340;"></p>
				</div>
			
			</div>
			
			<!-- Sit Up Test View -->
			<div class="body-fat-per-result responsive-view">
				<h3>Your Result <span class="glyphicon glyphicon-hand-down"></span></h3>
				<h2 style="text-align:center;">Score <span class="label bdy-cal-result-view5 situp-score-result" >0</span></h2>
				<h2 style="text-align:center;">Remarks <span class="label bdy-cal-result-view2 situp-rating-result">-</span></h2>  
			</div>
			
		</div>
	</div>
</div>









