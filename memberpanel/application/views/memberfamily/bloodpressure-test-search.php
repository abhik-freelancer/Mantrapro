<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
            <div class="col-lg-12">
                <h1 class="page-header page-label">Blood Pressure List</h1>
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
					<a href="<?php echo base_url();?>memberfamily/addbloodpressure" class="btn btn-mantra"><span class="glyphicon glyphicon-plus"></span> Add Blood Pressure</a>
				</div>
			</div>
		</div>
	</div>
	
	<div class="container-fluid memberpanelFormContainer">
		<div class="bloodPressureFormContainer">
			<div class="row">
			<form class="bpSearchForm" id="bpSearchForm" method="post">
				<div class="col-md-6">
					<div class="form-group">
						<label for="fromDate">From Date</label>
							<input type="text" class="form-control datepicker" id="fromDate" name="fromDate" placeholder="" autocomplete="off" value="" readonly style="cursor:initial;"/>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="toDate">To Date</label>
							<input type="text" class="form-control datepicker" id="toDate" name="toDate" placeholder="" autocomplete="off" value="" readonly style="cursor:initial;"/>
					</div>
				</div>
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

				
				<div class="col-md-12">
					<button type="submit" class="btn custom-button" style="width:100%;margin-top: 2%;"><span class="glyphicon glyphicon-search"></span> Search</button>
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
	
	<!--Blood Pressure Report-->
	<div id="bpLoader" class="loader" style="display:none;">
		<img src="<?php echo base_url();?>application/assets/images/squares.gif"/>
		<p class="loading-text">Loading Please Wait ...</p>
	</div>
	
	<div id="bloodPressureList"></div>
	
</div>
	