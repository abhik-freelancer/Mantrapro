<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
            <div class="col-lg-12">
                <h1 class="page-header page-label">Add Blood Pressure</h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>memberdashboard">Dashboard</a>
                    </li>

                    <li class="active">
                        <i class="fa fa-edit"></i> Blood Pressure
                    </li>
                </ol>
            </div>
        </div>
	</div>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="header-panel-info">
					<a href="<?php echo base_url();?>memberfamily/bloodpressurelist" class="btn btn-mantra"><span class=" glyphicon glyphicon-eye-open"></span> Blood Pressure List</a>
				</div>
			</div>
		</div>
	</div>
	
	
	<div class="container-fluid memberpanelFormContainer">
		<div class="bloodPressureFormContainer">
			<div class="row">
			
			<form class="bloodPressureForm" id="bloodPressureForm" method="post">
				<div class="col-md-6">
					<div class="form-group">
						<label for="membr-relatinship">Relationship</label>
							<select id="membr-relatinship" name="membr-relatinship" class="searchabledropdown form-control" data-show-subtext="true" data-live-search="true">
								<option value="0">Select</option>
								<?php foreach($bodycontent['relationshipList'] as $relationship) : ?>
									<option value="<?php echo $relationship['id'];?>" ><?php echo $relationship['relation'];?></option>
								<?php endforeach;?>
							</select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="membr-family-name">Name</label>
						<div id="memFamilyName" class="memFamilyName">
							<select id="membr-family-name" name="membr-family-name" class="searchabledropdown form-control" data-show-subtext="true" data-live-search="true">
								<option value="0">Select</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="systolic">Systolic</label>
							<input type="text" class="form-control" id="systolic" name="systolic" placeholder="" autocomplete="off" value="" onKeyup="numericFilter(this);"//>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="diastolic">Diastolic</label>
							<input type="text" class="form-control" id="diastolic" name="diastolic" placeholder="" autocomplete="off" value="" onKeyup="numericFilter(this);" />
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="pulserate">Pulse Rate</label>
							<input type="text" class="form-control" id="pulserate" name="pulserate" placeholder="" autocomplete="off" value="" onKeyup="numericFilter(this);" />
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="pulserate">Collection Date</label>
							<input type="text" class="form-control" id="collectiondate" name="collectiondate" placeholder="" autocomplete="off" value="<?php echo date("d-m-Y");?>" />
					</div>
				</div>
				
				<div class="col-md-12">
					<button type="submit" class="btn custom-button" style="width:100%;margin-top: 2%;">Save</button>
				</div>
			</form>
				<!-- Error -->
				<div class="col-md-12">
					<div class="bldpressure-err" style="padding:1%;">
						<p id="bldpressure-err" class="error-style" style="color:#F95340;"></p>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>

	<div id="memFamlyBPsaveModal" class="modal fade" role="dialog" style="position:fixed; top:35%;left:0%;">
	  <div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header modal-header-success">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="window.location.href='<?php echo base_url();?>memberfamily/bloodpressurelist'">×</button>
            <h3><i class="glyphicon glyphicon-thumbs-up"></i> <span id="bpsavesuccessmsg"></span></h3>
			
			<!--		
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Message</h4>-->
		  </div>
		  <!--
		  <div class="modal-body">
			
		  </div> -->
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal" onclick="window.location.href='<?php echo base_url();?>memberfamily/bloodpressurelist'">Close</button>
		  </div>
		</div>

	  </div>
	</div>