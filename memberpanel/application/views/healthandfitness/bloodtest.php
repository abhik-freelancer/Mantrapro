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
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-tasks fa-fw"></i> Blood test</h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-lg-12"> <!--One Repeatation Max Test-->
                            <div class="panel panel-yellow">
                                 <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-tasks fa-fw"></i> Blood test</h3>
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
                                                        <th></th>
                                                    </tr>
                                             </thead>
                                              <tbody>
                                                    <?php if($bodycontent["bloodtest"]) {
                                                        foreach ($bodycontent["bloodtest"] as $content) {


                                                        ?>
                                                    <tr>
                                                        <td><?php echo($content["date_of_collection"]); ?></td>
                                                        <td><?php echo($content["test_desc"]); ?></td>
                                                        <td><?php echo($content["lower_range"]."-".$content["upper_range"]."(".$content["unit_desc"].")"); ?></td>
                                                        <td><?php echo($content["reading"]); ?></td>
                                                        <td>
                                                            <b>€ 10</b><input class="ex1" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="20" data-slider-step="1" data-slider-value="14"/><b>€ 1000</b>
                                                        </td>
                                                    </tr>
                                                    <?php 
                                                    }
                                                    }?>
                                    
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