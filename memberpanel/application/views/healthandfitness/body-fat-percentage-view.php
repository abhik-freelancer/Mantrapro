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
                        <i class="fa fa-edit"></i> Anthropometryfdf
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-spin fa-fw"></i>Anthropometry : Body fat percentage</h3>
                    </div>
					<div class="panel-body">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            
							<div id="fatPerTransformation">
								<div id="myCarousel" class="carousel slide" data-ride="carousel">
								  <!-- Indicators 
								  <ol class="carousel-indicators">
									<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
									<li data-target="#myCarousel" data-slide-to="1"></li>
									<li data-target="#myCarousel" data-slide-to="2"></li>
								  </ol>-->

								  <!-- Wrapper for slides -->
								  <div class="carousel-inner">
								  
								  <?php 
								  
									$dirname = "http://mantrahealthzone.co.in/admin/mem_gal/";
								  
								  $i = 0;
								  if($bodycontent["bodyfatpercentage"])
									{
										foreach($bodycontent["bodyfatpercentage"] as $content){
										$i++;	
										
										if($i==1)
										{
											$class = "active";
										}
										else
										{
											$class="";
										}
									?>
									<div class="item <?php echo $class;?>">
										<div class="fPTransformatoin">
												<div class="fpImageView">
													
													<?php if($content['entry_from']=="slf"){
														$uploaded_by ="Self";
															if($content['image_name']==""){ ?>
																<img src="<?php echo base_url();?>application/assets/images/portfolioimages/no-image-available.jpg" />
													<?php	}
															else{ ?>
																<img src="<?php echo base_url();?>application/assets/images/portfolioimages/<?php echo $content['image_name']; ?>" />
													<?php		}
													?>
														
													<?php }
														else{
															$uploaded_by ="Admin";
															if($content['image_name']==""){ 
														?>
															<img src="<?php echo $dirname ;?>no-image-available.jpg" />
														
														<?php }else{ ?>
															<img src="<?php echo $dirname;?><?php echo $content['image_name']; ?>" />
														<?php } } ?>
												
													
												</div>
												<div class="fpDataView">
											
													<table style="padding:20px;">
														<tr class="even">
															<td>Date</td>
															<td><?php echo date('d-m-Y',strtotime($content['date_of_collection'])); ?></td>
														</tr>
														<tr class="odd">
															<td>Weight</td>
															<td><?php echo $content['weight']; ?></td>
														</tr>
														<tr class="even">
															<td>Lean Body Mass</td>
															<td><?php echo $content['lean_body_mass']; ?></td>
														</tr>
														<tr class="odd">
															<td>Fat%</td>
															<td><?php echo $content['fat_per']; ?></td>
														</tr>
													</table>
													<p id="uploaded_by">Uploaded by <?php echo $uploaded_by; ?><p>
												</div>
											</div>
									</div>
									<?php } } ?>

									
								   
								  </div>

								  <!-- Left and right controls -->
								  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
									<span class="glyphicon glyphicon-chevron-left"></span>
									<span class="sr-only">Previous</span>
								  </a>
								  <a class="right carousel-control" href="#myCarousel" data-slide="next">
									<span class="glyphicon glyphicon-chevron-right"></span>
									<span class="sr-only">Next</span>
								  </a>
								</div>
							</div>
																	
									
									
									
                               
                        </div><!-- END of col-lg-12-->
					</div>
            </div>
        </div>
    </div>
	
	
	
	<!-----
	
	<div class="col-lg-12">
		<div class="slider1">
		
		<div class="slide">
			<div class="fPTransformatoin">
				<div class="fpImageView"><img src="http://placehold.it/300x150&text=FooBar10"></div>
				<div class="fpDataView">This is text view</div>
			</div>
		</div>
		  
		<div class="slide">
			<div class="fPTransformatoin">
				<div class="fpImageView"><img src="http://placehold.it/300x150&text=FooBar10"></div>
				<div class="fpDataView">This is text2 view</div>
			</div>
		</div>
		<div class="slide">
			<div class="fPTransformatoin">
				<div class="fpImageView"><img src="http://placehold.it/300x150&text=FooBar10"></div>
				<div class="fpDataView">This is text2 view</div>
			</div>
		</div>
		<div class="slide">
			<div class="fPTransformatoin">
				<div class="fpImageView"><img src="http://placehold.it/300x150&text=FooBar10"></div>
				<div class="fpDataView">This is text2 view</div>
			</div>
		</div>
		<div class="slide">
			<div class="fPTransformatoin">
				<div class="fpImageView"><img src="http://placehold.it/300x150&text=FooBar10"></div>
				<div class="fpDataView">This is text2 view</div>
			</div>
		</div>
			
		</div>
	</div>
	-->
	
</div>

