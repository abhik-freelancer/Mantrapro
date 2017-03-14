<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
            <div class="col-lg-12">
                <h1 class="page-header page-label">Dietary Management Add</h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>memberdashboard">Dashboard</a>
                    </li>

                    <li class="active">
                        <i class="fa fa-edit"></i> Dietary Management
                    </li>
                </ol>
            </div>
        </div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="header-panel-info">
					<a href="<?php echo base_url();?>dietary_management" class="btn btn-mantra"><span class=" glyphicon glyphicon-eye-open"></span> View Diet List</a>
				</div>
			</div>
		</div>
	</div>
	
	<div class="container-fluid">
		<div class="row dietarymanagment-form-container">
			<form id="dietaryManagmentForm" name="dietaryManagmentForm" class="dietaryManagmentForm" method="post" >
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 diet-col-border">
				<div class="form-group">
					<label for="meal1"><span class="glyphicon glyphicon-menu-down"></span> Meal 1</label>
					<input class="magic-radio" type="radio" name="meal1" id="meal1opt1" value="Y">
					<label for="meal1opt1"> Yes</label>
					<input class="magic-radio" type="radio" name="meal1" id="meal1opt2" value="N">
					<label for="meal1opt2"> No</label>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 diet-col-border">
				<div class="form-group">
					<label for="meal2"><span class="glyphicon glyphicon-menu-down"></span> Meal 2</label>
					<input class="magic-radio" type="radio" name="meal2" id="meal2opt1" value="Y">
					<label for="meal2opt1"> Yes</label>
					<input class="magic-radio" type="radio" name="meal2" id="meal2opt2" value="N">
					<label for="meal2opt2"> No</label>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 diet-col-border">
				<div class="form-group">
					<label for="meal3"><span class="glyphicon glyphicon-menu-down"></span> Meal 3</label>
					<input class="magic-radio" type="radio" name="meal3" id="meal3opt1" value="Y">
					<label for="meal3opt1"> Yes</label>
					<input class="magic-radio" type="radio" name="meal3" id="meal3opt2" value="N">
					<label for="meal3opt2"> No</label>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 ">
				<div class="form-group">
					<label for="meal4"><span class="glyphicon glyphicon-menu-down"></span> Meal 4</label>
					<input class="magic-radio" type="radio" name="meal4" id="meal4opt1" value="Y">
					<label for="meal4opt1"> Yes</label>
					<input class="magic-radio" type="radio" name="meal4" id="meal4opt2" value="N">
					<label for="meal4opt2"> No</label>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 diet-col-border">
				<div class="form-group">
					<label for="meal5"><span class="glyphicon glyphicon-menu-down"></span> Meal 5</label>
					<input class="magic-radio" type="radio" name="meal5" id="meal5opt1" value="Y">
					<label for="meal5opt1"> Yes</label>
					<input class="magic-radio" type="radio" name="meal5" id="meal5opt2" value="N">
					<label for="meal5opt2"> No</label>
				</div>
			</div>
			
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 diet-col-border">
				<div class="form-group">
					<label for="meal6"><span class="glyphicon glyphicon-menu-down"></span> Meal 6</label>
					<input class="magic-radio" type="radio" name="meal6" id="meal6opt1" value="Y">
					<label for="meal6opt1"> Yes</label>
					<input class="magic-radio" type="radio" name="meal6" id="meal6opt2" value="N">
					<label for="meal6opt2"> No</label>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 diet-col-border">
				<div class="form-group">
					<label for="meal7"><span class="glyphicon glyphicon-menu-down"></span> Meal 7</label>
					<input class="magic-radio" type="radio" name="meal7" id="meal7opt1" value="Y">
					<label for="meal7opt1"> Yes</label>
					<input class="magic-radio" type="radio" name="meal7" id="meal7opt2" value="N">
					<label for="meal7opt2"> No</label>
				</div>
			</div>
			
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 ">
				<div class="form-group">
					<label for="meal8"><span class="glyphicon glyphicon-menu-down"></span> Meal 8</label>
					<input class="magic-radio" type="radio" name="meal8" id="meal8opt1" value="Y">
					<label for="meal8opt1"> Yes</label>
					<input class="magic-radio" type="radio" name="meal8" id="meal8opt2" value="N">
					<label for="meal8opt2"> No</label>
				</div>
			</div>
			
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 diet-col-border">
				<div class="form-group">
					<label for="carbohydrate">Carbohydrate</label>
					<input type="text" class="form-control" name="carbohydrate" id="carbohydrate" value="" onKeyup="numericFilter(this);"/>
				</div>
			</div>
			
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 diet-col-border">
				<div class="form-group">
					<label for="protein">Protein</label>
					<input type="text" class="form-control" name="protein" id="protein" value="" onKeyup="numericFilter(this);" />
				</div>
			</div>
			
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 diet-col-border">
				<div class="form-group">
					<label for="weight">Weight</label>
					<input type="text" class="form-control" name="weight" id="weight" value="" onKeyup="numericFilter(this);" />
				</div>
			</div>
			
			<div class="col-md-12">
				<button type="submit" class="btn custom-button" style="width:100%;margin-top: 2%;">Submit</button>
			</div>
		</form>
		</div><!-- end .row -->
		
	</div>

</div>