<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header page-label"> Health and fitness</h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>memberdashboard">Dashboard</a>
                    </li>

                    <li class="active">
                        <i class="fa fa-edit"></i> Anthropometry
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                     <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-spin fa-fw"></i>Anthropometry </h3>
                     </div>
                    <div class="panel-body">
                        <div class="col-lg-12">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-hospital-o fa-fw"></i> Body fat percentage</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover" id="bfpercentage" > 
										<thead>
												<tr>
													<th>Date</th>
													<th>Weight</th>
													<th>Fat(%)</th>
													<th>Fat mass</th>
													<th>Lean body mass </th>
													
												</tr>
											</thead>
											<tbody>
												<?php if($bodycontent["bodyfatpercentage"]) {
													foreach ($bodycontent["bodyfatpercentage"] as $content) {
				

													?>
												<tr>
													<td><?php echo($content["date_of_collection"]); ?></td>
													<td><?php echo($content["weight"]); ?></td>
													<td><?php echo($content["fat_per"]); ?></td>
													<td><?php echo($content["fat_mass"]); ?></td>
													<td><?php echo($content["lean_body_mass"]); ?></td>
													
												</tr>
												<?php 
												}
												}?>
												
											</tbody>
									</table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>