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
                                <h3 class="panel-title"><i class="fa fa-tasks fa-fw"></i> Endurance Test</h3>
                     </div>
                     <div class="panel-body">
                         <div class="col-lg-12">
                             <div class="panel panel-yellow">
                                 <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-tasks fa-fw"></i> Vo2 Max</h3>
                                </div>
                                 <div class="panel-body">
                                     <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="vo2max">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Heart rate</th>
                                        <th>Duration</th>
                                        <th>METs</th>
                                        <th>Vo2max</th>
                                        <th>Rating</th>
                                        <th>Score</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($bodycontent["Vo2Max"]) {
                                        foreach ($bodycontent["Vo2Max"] as $content) {
    

                                        ?>
                                    <tr>
                                        <td><?php echo($content["date_of_entry"]); ?></td>
                                        <td><?php echo($content["heart_rate"]); ?></td>
                                        <td><?php echo($content["duration"]); ?></td>
                                        <td><?php echo($content["mets"]); ?></td>
                                        <td><?php echo($content["vomax"]); ?></td>
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
                         </div><!-- VO2 Max  area-->
                        
                          <div class="col-lg-6"><!--push up test-->
                                 <div class="panel panel-warning">
                                     <div class="panel-heading">
                                         <h3 class="panel-title"><i class="fa fa-info fa-fw"></i> Push-up test</h3>
                                     </div>
                                     <div class="panel-body">
                                         <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="pushup">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Repition</th>
                                        <th>Population(μ)</th>
                                        <th>Rating</th>
                                        <th>Score</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($bodycontent["pushuptest"]){ 
     foreach ($bodycontent["pushuptest"] as $content) {
    

                                        ?>
                                    <tr>
                                        <td><?php echo($content["date_of_entry"]); ?></td>
                                        <td><?php echo($content["repitions"]); ?></td>
                                        <td><?php echo($content["population_avg"]); ?></td>
                                        <td><?php echo($content["rating"]); ?></td>
                                        <td><?php echo($content["score"]); ?></td>
                                    </tr>
                                    <?php 
                                    }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                                     </div>
                                 </div>
                                 
                             </div><!--push up test-->
                             <div class="col-lg-6"><!--sit-up test-->
                                 <div class="panel panel-warning">
                                     <div class="panel-heading">
                                         <h3 class="panel-title"><i class="fa fa-heart fa-fw"></i> Sit-up test</h3>
                                     </div>
                                     <div class="panel-body">
                                         <div class="table-responsive">
                                             <table class="table table-bordered table-hover" id="situptest">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Repition</th>
                                        <th>Population(μ)</th>
                                        <th>Rating</th>
                                        <th>Score</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($bodycontent["situptest"]){ 
                                        foreach ($bodycontent["situptest"] as $content) {
    

                                        ?>
                                    <tr>
                                        <td><?php echo($content["date_of_entry"]); ?></td>
                                        <td><?php echo($content["repitions"]); ?></td>
                                        <td><?php echo($content["population_avg"]); ?></td>
                                        <td><?php echo($content["rating"]); ?></td>
                                        <td><?php echo($content["score"]); ?></td>
                                    </tr>
                                    <?php 
                                    }
                                    
                                        } ?>
                                </tbody>
                            </table>
                        </div>
                                     </div>
                                 </div>
                             </div>
                         
                         
                     </div>
                 </div>
             </div>
             
                            
            
         </div> <!--row 1 -->
          
         
     </div>
 </div>