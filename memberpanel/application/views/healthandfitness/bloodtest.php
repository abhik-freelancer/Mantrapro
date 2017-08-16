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
                        <i class="fa fa-edit"></i> Blood test
                    </li>
                </ol>
            </div>
        </div>
		
		
		<div class="row" >
			<div class="col-md-12">
				<div class="header-panel-info">
					<a href="<?php echo base_url();?>memberfamily/addbloodtest/S" class="btn btn-mantra"><span class="glyphicon glyphicon-plus"></span> Add Blood Test</a>
				</div>
			</div>
		</div>
		
        <div class="row" style="margin-top:15px;">
			<div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-medkit fa-fw"></i> Blood test</h3>
                    </div>
					<div class="panel-body">
                        <div class="col-lg-12"> <!--One Repeatation Max Test-->
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-medkit fa-fw"></i> Blood test</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover" id="onerepeatationmaxtest">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Test</th>
                                                    <th>Range</th>
                                                    <th>Result</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if ($bodycontent["bloodtest"]) {
                                                    foreach ($bodycontent["bloodtest"] as $content) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo($content["date_of_collection"]); ?></td>
                                                            <td><?php echo($content["test_desc"]); ?></td>
                                                            <td><?php echo($content["lower_range"] . " ~ " . $content["upper_range"] . " ( " . $content["unit_desc"] . " ) "); ?></td>

                                                            <td>
                                                                <?php if ($content["lower_range"] != "" && $content["upper_range"] != "") { 
                                                                        if($content["reading"]<$content["lower_range"] || $content["reading"]>$content["upper_range"]){?>
                                                                <span class="label label-danger"><?php echo($content["reading"]); ?></span>
                                                                        <?php }else{ ?>
                                                                            
                                                                     


                                                                   
                                                                    <div class="progress progress-bar-warning">
                                                                        <div class="progress-bar " role="progressbar" aria-valuenow="<?php echo($content["reading"]); ?>"
                                                                             aria-valuemin="<?php echo($content["lower_range"]); ?>" aria-valuemax="<?php echo($content["upper_range"]); ?>" style="width: <?php echo($content["progresspercentage"]); ?>%">
                                                                            <?php echo($content["reading"]); ?>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                        <?php }
                                                                        
                                                                        } else {
                                                                    ?>
                                                                    <?php echo($content["reading"]); ?>  

                                                                <?php } ?>

                                                            </td>
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
                        </div><!--One Repeatation Max Test-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>