<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
            <div class="col-lg-12">
                <h1 class="page-header page-label">Dietary Management List</h1>
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
					<a href="<?php echo base_url();?>dietary_management/adddiet" class="btn btn-mantra"><span class="glyphicon glyphicon-plus"></span> Add Diet</a>
				</div>
			</div>
		</div>
	</div>
	
	<div class="container-fluid">
		<div class="table-responsive"> 
			<table id="dietry-managment-list" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Membership No</th>
						<th>Submit Date</th>
						<th>Meal 1</th>
						<th>Meal 2</th>
						<th>Meal 3</th>
						<th>Meal 4</th>
						<th>Meal 5</th>
						<th>Meal 6</th>
						<th>Meal 7</th>
						<th>Meal 8</th>
						<th>Carbs</th>
						<th>Protein</th>
						<th>Weight</th>
						<th>Diet Chart</th>
					</tr>
				</thead>
       
				<tbody>
				
				<?php 
					if($bodycontent['dietarymanagmentlist']){
						foreach($bodycontent['dietarymanagmentlist'] as $dietarylist){ ?>
					
					<tr>
						<td><?php echo $dietarylist['membership_no'];?></td>
						<td><?php echo $dietarylist['date_of_entry'];?></td>
						<td><?php echo $dietarylist['meal1'];?></td>
						<td><?php echo $dietarylist['meal2'];?></td>
						<td><?php echo $dietarylist['meal3'];?></td>
						<td><?php echo $dietarylist['meal4'];?></td>
						<td><?php echo $dietarylist['meal5'];?></td>
						<td><?php echo $dietarylist['meal6'];?></td>
						<td><?php echo $dietarylist['meal7'];?></td>
						<td><?php echo $dietarylist['meal8'];?></td>
						<td><?php echo $dietarylist['carbs'];?></td>
						<td><?php echo $dietarylist['protein'];?></td>
						<td><?php echo $dietarylist['weight'];?></td>
						<td><button class="btn btn-primary" ><span class="glyphicon glyphicon-list"></span></button></td>
					</tr>
					
					
					<?php
						}
						
					}
				?>
				  
				</tbody>
			</table>
		</div>
	</div>
	
	
</div>