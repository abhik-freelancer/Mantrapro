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
                        <i class="fa fa-edit"></i> General medical assesment
                    </li>
                </ol>
            </div>
        </div>
         <div class="row">
             <div class="col-lg-12">
                 <div class="panel panel-default">
                     <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-medkit fa-fw"></i> medical assesment</h3>
                     </div>
                     <div class="panel-body">
                         <div class="col-lg-12">
                             <div class="panel panel-yellow">
                                 <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-medkit fa-fw"></i> Blood pressure</h3>
                                </div>
                                 <div class="panel-body">
                                     <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="bldpressure">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Systolic</th>
                                        <th>Diastolic</th>
                                        <th>Pulse</th>
                                        <th>Level</th>
                                        <th>Remarks</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($bodycontent["medicalassesment"]) {
                                        foreach ($bodycontent["medicalassesment"] as $content) {
    
                                                if($content["blood_prs_date"]!='01-01-1970'){
                                        ?>
                                    <tr>
                                        <td><?php echo($content["blood_prs_date"]); ?></td>
                                        <td><?php echo($content["systolic_msr"]); ?></td>
                                        <td><?php echo($content["diastolic_msr"]); ?></td>
                                        <td>
                                            <?php echo($content["pulse_msr"]); ?>
                                            
                                        </td>
                                        <td>
                                            <?php if($content["pulse_msr"]>= 60 && $content["pulse_msr"]<=100 ) {?>
                                            <span class="label label-success">Normal</span>
                                            <?php 
                                            
                                            }else{
                                            ?>
                                            <span class="label label-danger">Risk</span>
                                            <?php }?>
                                        </td>
                                        <td><?php echo($content["prs_remarj"]); ?></td>
                                        
                                    </tr>
                                    <?php 
                                                }
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
                                         <h3 class="panel-title"><i class="fa fa-plus-square fa-fw"></i> Oxygen saturation level</h3>
                                     </div>
                                     <div class="panel-body">
                                         <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="oxysatlvl">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>OSL</th>
                                        <th>Remarks</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($bodycontent["medicalassesment"]){ 
                                        foreach ($bodycontent["medicalassesment"] as $content) {
                                            if($content["oxy_date"]!='01-01-1970'){
                                    ?>
                                    <tr>
                                        <td><?php echo($content["oxy_date"]); ?></td>
                                        <td><?php echo($content["oxy_sat_level"]); ?></td>
                                        <td><?php echo($content["oxy_note"]); ?></td>
                                        
                                    </tr>
                                    <?php 
                                            }
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
                                         <h3 class="panel-title"><i class="fa fa-eyedropper fa-fw"></i> Visual acuity</h3>
                                     </div>
                                     <div class="panel-body">
                                         <div class="table-responsive">
                                             <table class="table table-bordered table-hover" id="visualactivity">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Right eye</th>
                                        <th>Left eye</th>
                                        <th>Note</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($bodycontent["medicalassesment"]){ 
                                        foreach ($bodycontent["medicalassesment"] as $content) {
                                                if($content["visual_date"]!='01-01-1970'){

                                        ?>
                                    <tr>
                                        <td><?php echo($content["visual_date"]); ?></td>
                                        <td><?php echo($content["right_eye"]); ?></td>
                                        <td><?php echo($content["left_eye"]); ?></td>
                                        <td><?php echo($content["visual_remark"]); ?></td>
                                        
                                    </tr>
                                    <?php 
                                                }
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