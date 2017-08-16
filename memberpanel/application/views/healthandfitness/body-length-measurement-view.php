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
						<!---- BODY LENGTH MEASUREMENT ---->
						<div class="col-lg-12">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-hospital-o fa-fw"></i> Body Length Measurement</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="bodygirthmeasurement" > 
										<thead>
											<tr>
												<th title="">Date</th>
												<th title="Standing Height">Standing Height</th>
												<th title="Seating Height">Seating Height</th>
											</tr>
										</thead>
											<tbody>
												<?php if($bodycontent["bodyLengthMeasurement"]) {
													foreach ($bodycontent["bodyLengthMeasurement"] as $content) {
				

													?>
												<tr>
													<td><?php echo($content["date_of_collection"]); ?></td>
													<td title="Standing Height"><?php echo($content["standing_height"]); ?></td>
													<td title="Seating Height"><?php echo($content["seating_height"]); ?></td>
												</tr>
												<?php 
												}
												}?>
											</tbody>
									</table>
                                    </div>
                                </div>
                            </div>
                        </div><!-- END of col-lg-12-->
					</div>
            </div>
        </div>
    </div>
</div>