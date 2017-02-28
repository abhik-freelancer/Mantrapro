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
			<h1>Post your Resume</h1>
			
			<img src="<?php echo base_url();?>application/assets/images/resume-iconi.png" class="img-responsive"/>
			
			
			
		</div>
		<div class="col-md-6">
			<div class="career-form-container" >
				<form id="careerForm" name="careerForm" method="post" enctype="multipart/form-data">
				 <div class="row">
					<div class="col-md-6">
						<div class="form-group">
						   <label for="career-firstname">First Name <span style="font-size:16px;font-weight:bold;">*</span></label>
						   <input type="text" class="form-control" id="career-firstname" name="career-firstname" placeholder="First Name" autocomplete="off">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
						  <label for="career-lastname">Last Name <span style="font-size:16px;font-weight:bold;">*</span></label>
						   <input type="text" class="form-control" id="career-lastname" name="career-lastname" placeholder="Last Name" autocomplete="off">
						</div>
					</div>
				  </div>
				  
				  <div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="career-mobile">Mobile <span style="font-size:16px;font-weight:bold;">*</span></label>
							<input type="text" class="form-control" id="career-mobile" name="career-mobile" placeholder="Mobile no" onKeyUp="numericFilter(this);" autocomplete="off">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="career-email">Email</label>
							<input type="text" class="form-control" id="career-email" name="career-email" autocomplete="off">
						</div>
					</div>
				  </div>
				  
				  <div class="form-group">
					<label for="branch">Branch<span style="font-size:16px;font-weight:bold;">*</span></label>
					<select class="form-control" name="branch" id="branch">
						<option value="0">Select</option>
						<?php foreach($bodycontent['webBranch'] as $web_branch){?>
						<option value="<?php echo $web_branch['branch_code'];?>"><?php echo $web_branch['branch_name'];?></option>
						<?php } ?>
								  
					</select>
				  </div>
				  <div class="form-group">
					<label for="applied-for">Applied For<span style="font-size:16px;font-weight:bold;">*</span></label>
					<select class="form-control" name="applied-for" id="applied-for">
						<option value="0">Select</option>
						<?php foreach($bodycontent['appliedFor'] as $applied_for){?>
						<option value="<?php echo $applied_for['id'];?>"><?php echo $applied_for['desig_desc'];?></option>
						<?php } ?>
								  
					</select>
				  </div>
				<div class="form-group">
					<label for="career-resume">Upload Resume <span style="font-size:16px;font-weight:bold;">*</span></label>
					<div style="position:relative;">
						<a class='btn btn-default' href='javascript:;'>
							Choose File...
							<input type="file" class="file" name="career-resume" id="career-resume"   >
						</a>
						&nbsp;
						<span class='label resume-file-info' id="resume-file-info"></span>
					</div>
					<br>
					<span class='label label-default' style="padding:1% 2%;">Only .docx, .doc, .pdf files are supported</span>
				</div>
				
				<button type="submit" class="btn cutome-link-btn"> Upload </button>
				</form>
				
				<div class="career-form-error" style="padding:1%;">
					<p id="career-form-error" class="error-style" style="color:#F95340;"></p>
				</div>
			
			</div>
			
		</div>
	</div>
</div>
