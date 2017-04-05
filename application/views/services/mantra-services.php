<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <img src="<?php echo base_url(); ?>application/assets/images/life-style-health-mantra.jpg" class="img-responsive" />
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row row-container ">
        <div class="col-md-12">
            <h1>
				<span class="first-text-col">S</span>ervices & <span class="first-text-col">T</span>ariff 
			</h1>
        </div>
		
		<div class="col-md-12">
			<div class="form-group">
				<label for="branch">Branch</label>
				<div class="select-style" >
					<select class="form-control" id="branch">
					<?php 
						if($bodycontent['webBranch']){
							foreach($bodycontent['webBranch'] as $web_branch){ ?>
							<option value="<?php echo $web_branch['branch_code'];?>"><?php echo $web_branch['branch_name'];?></option>							
						<?php	}
						}
					?>
					</select>
				</div>
			</div>
		</div>
    </div>
</div>

<div class="container-fluid">
	<div class="row row-container">
		<div class="col-md-12">
			<div id="branchWiseRate">
			
			</div>
		</div>
	</div>
</div>

