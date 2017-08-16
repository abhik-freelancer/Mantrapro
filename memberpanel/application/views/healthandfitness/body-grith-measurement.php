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
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-hospital-o fa-fw"></i> Body Grith Measurement</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="bodygirthmeasurement" > 
										<thead>
											<tr>
												<th title="">Date</th>
												<th title="Neck">Neck</th>
												<th title="Chest">Chest</th>
												<th title="Chest Expansion">Chest Exp</th>
												<th title="Shoulder Length">Shoulder Length</th>
												<th title="Hip">Hip</th>
												<th title="Thigh">Thigh</th>
												<th title="Calf">Calf</th>
												<th title="Biceps - Flex">Bi Flex</th>
												<th title="Biceps - Extension">Bi Ext</th>
												<th title="Upper Abdomen">U Abd</th>
												<th title="Middle Abdomen">M Abd</th>
												<th title="Lower Abdomen">L Abd</th>
											</tr>
										</thead>
											<tbody>
												<?php if($bodycontent["bodygrithMeasurement"]) {
													foreach ($bodycontent["bodygrithMeasurement"] as $content) {
				

													?>
												<tr>
													<td><?php echo($content["date_of_collection"]); ?></td>
													<td title="Neck"><?php echo($content["neck"]); ?></td>
													<td title="Chest"><?php echo($content["chest"]); ?></td>
													<td title="Chest Expansion"><?php echo($content["chest_expansion"]); ?></td>
													<td title="Shoulder Length"><?php echo($content["shoulder_length"]); ?></td>
													<td title="Hip"><?php echo($content["hip"]); ?></td>
													<td title="Thigh"><?php echo($content["thigh"]); ?></td>
													<td title="Calf"><?php echo($content["calf"]); ?></td>
													<td title="Biceps - Flex"><?php echo($content["biceps_fles"]); ?></td>
													<td title="Biceps - Extension"><?php echo($content["biceps_extn"]); ?></td>
													<td title="Upper Abdomen"><?php echo($content["upper_abd"]); ?></td>
													<td title="Middle Abdomen"><?php echo($content["mid_abd"]); ?></td>
													<td title="Lower Abdomen"><?php echo($content["low_abd"]); ?></td>
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