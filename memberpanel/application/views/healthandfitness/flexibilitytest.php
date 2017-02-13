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
                        <i class="fa fa-edit"></i> General fitness assesment
                    </li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-tasks fa-fw"></i> Flexibility test</h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-lg-12"> <!--One Repeatation Max Test-->
                            <div class="panel panel-yellow">
                                 <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-tasks fa-fw"></i> Sit and Reach test</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover" id="onerepeatationmaxtest">
                                             <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Distance</th>
                                                        <th>Rate</th>
                                                        <th>Score</th>
                                                    </tr>
                                             </thead>
                                              <tbody>
                                                    <?php if($bodycontent["sitandreachtest"]) {
                                                        foreach ($bodycontent["sitandreachtest"] as $content) {


                                                        ?>
                                                    <tr>
                                                        <td><?php echo($content["date_of_entry"]); ?></td>
                                                        <td><?php echo($content["distance"]); ?></td>
                                                        <td><?php echo($content["rating"]); ?></td>
                                                        <td><?php echo($content["score"]); ?></td>
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