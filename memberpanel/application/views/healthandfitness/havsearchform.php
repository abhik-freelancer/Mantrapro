<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header page-label">Health asset report</h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>memberdashboard">Dashboard</a>
                    </li>

                    <li class="active">
                        <i class="fa fa-edit"></i> Health asset values
                    </li>
                </ol>
            </div>
        </div>
        <div class="row">
                    <div class="col-lg-6 col-md-6">
                       <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-reorder fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo($bodycontent["havdata"]["hav_total_score"]." / ".$bodycontent["havdata"]["hav_total_max"]) ?></div>
                                        <div>HAV score for <?php echo($bodycontent["havdata"]["month"]." , ".$bodycontent["havdata"]["year"]);?>.</div>
                                    </div>
                                </div>
                            </div>
                           <div class="panel-footer">
                                    <span class="pull-left">Know about health asset value.</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-lg-6 text-center">
                         <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-info-circle fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo($bodycontent["havdata"]["total_attendence"]) ?></div>
                                        <div>Attendance for <?php echo($bodycontent["havdata"]["month"]." , ".$bodycontent["havdata"]["year"]);?>.</div>
                                    </div>
                                </div>
                            </div>
                           <div class="panel-footer">
                                    <span class="pull-left">Get your attendance list.</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
        </div>
        <!-- report section -->
        <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-stethoscope fa-fw"></i>  Blood Pressure</h3>
                            </div>
                            <div class="panel-body">
                                
                                <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Systolic</th>
                                        <th>Diastolic</th>
                                        <th>Score</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="active">
                                        <td><?php echo($bodycontent["bloodprs"]["bp_col_date"])?></td>
                                        <td><?php echo($bodycontent["bloodprs"]["bp_systolic"])?></td>
                                        <td><?php echo($bodycontent["bloodprs"]["bp_diastolic"])?></td>
                                        <td><?php echo($bodycontent["bloodprs"]["bp_score"])?></td>
                                        <td><?php echo($bodycontent["bloodprs"]["bp_remarks"])?></td>
                                    </tr>
                                   
                                </tbody>
                            </table>
                        </div>
                            </div>
                        </div>
                    </div>
        </div>
            <div class="row">
                    <div class="col-lg-4">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-heart fa-fw"></i>  Oxygen saturation level</h3>
                            </div>
                            <div class="panel-body">
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Date</span>
                                        <span class="label label-warning"><?php echo($bodycontent["oxysatlevel"]["oxyDt"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Saturation level</span>
                                        <span class="label label-warning"><?php echo($bodycontent["oxysatlevel"]["oxy_sat_level"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Score</span>
                                        <span class="label label-warning"><?php echo($bodycontent["oxysatlevel"]["oxy_score"])?></span>
                                </a>
                                
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Remarks</span>
                                        <span class="label label-warning"><?php echo($bodycontent["oxysatlevel"]["oxy_remarks"])?></span>
                                </a>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-refresh fa-fw"></i>  Strength</h3>
                            </div>
                            <div class="panel-body">
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Date</span>
                                        <span class="label label-warning"><?php echo($bodycontent["strength"]["rmDate"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Exercise</span>
                                        <span class="label label-warning"><?php echo($bodycontent["strength"]["rm_exc_desc"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Weight Lifted %</span>
                                        <span class="label label-warning"><?php echo($bodycontent["strength"]["rm_weight_lftd"])?></span>
                                </a>
                                
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">1 RM</span>
                                        <span class="label label-warning"><?php echo($bodycontent["strength"]["rm_result"])?></span>
                                </a>
                                
                                 <a href="#" class="list-group-item">
                                        <span class="label label-success">Points</span>
                                        <span class="label label-warning"><?php echo($bodycontent["strength"]["rm_score"])?></span>
                                </a>
                                 <a href="#" class="list-group-item">
                                        <span class="label label-success">Remarks</span>
                                        <span class="label label-warning"><?php echo($bodycontent["strength"]["rm_remarks"])?></span>
                                </a>
                                
                            </div>
                        </div>
                    </div>
                </div>
        
        <!-- report section -->
        <div class="row">
            <div class="col-lg-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-try fa-fw"></i>  Treadmill Rock Part (Vo2) </h3>
                            </div>
                            <div class="panel-body">
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Date</span>
                                        <span class="label label-warning"><?php echo($bodycontent["Vo2Max"]["vo2max_date"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Heart Rate</span>
                                        <span class="label label-warning"><?php echo($bodycontent["Vo2Max"]["vo2max_heart_rate"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Duration</span>
                                        <span class="label label-warning"><?php echo($bodycontent["Vo2Max"]["vo2max_duration"])?></span>
                                </a>
                                
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Vo2 max</span>
                                        <span class="label label-warning"><?php echo($bodycontent["Vo2Max"]["vo2max_vomax"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">METS</span>
                                        <span class="label label-warning"><?php echo($bodycontent["Vo2Max"]["vo2max_mets"])?></span>
                                </a>
                                
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Points</span>
                                        <span class="label label-warning"><?php echo($bodycontent["Vo2Max"]["vo2max_score"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Remarks</span>
                                        <span class="label label-warning"><?php echo($bodycontent["Vo2Max"]["vo2max_rmks"])?></span>
                                </a>
                                
                            </div>
                        </div>
                    </div>
            <div class="col-lg-4">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-steam fa-fw"></i>  Sit up Test </h3>
                            </div>
                            <div class="panel-body">
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Date</span>
                                        <span class="label label-warning"><?php echo($bodycontent["situptest"]["siteUpDt"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Repetition</span>
                                        <span class="label label-warning"><?php echo($bodycontent["situptest"]["site_up_repetation"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Points</span>
                                        <span class="label label-warning"><?php echo($bodycontent["situptest"]["site_up_score"])?></span>
                                </a>
                                
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Rating</span>
                                        <span class="label label-warning"><?php echo($bodycontent["situptest"]["site_up_rmks"])?></span>
                                </a>
                               
                                
                            </div>
                        </div>
                    </div>
            
            <div class="col-lg-4">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-ioxhost fa-fw"></i>  Push-up Test </h3>
                            </div>
                            <div class="panel-body">
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Date</span>
                                        <span class="label label-warning"><?php echo($bodycontent["pushup"]["pushUpDt"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Repetition</span>
                                        <span class="label label-warning"><?php echo($bodycontent["pushup"]["push_up_repetation"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Points</span>
                                        <span class="label label-warning"><?php echo($bodycontent["pushup"]["push_up_score"])?></span>
                                </a>
                                
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Rating</span>
                                        <span class="label label-warning"><?php echo($bodycontent["pushup"]["push_up_rmks"])?></span>
                                </a>
                               
                                
                            </div>
                        </div>
                    </div>
        </div>
        
        <div class="row">
            <div class="col-lg-3">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-ioxhost fa-fw"></i>  Upper Body Joint Mobility </h3>
                            </div>
                            <div class="panel-body">
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Date</span>
                                        <span class="label label-warning"><?php echo($bodycontent["bodyjointmobility"]["OrthoDate"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Cervical Score</span>
                                        <span class="label label-warning"><?php echo($bodycontent["bodyjointmobility"]["cervical_score"]."/".$bodycontent["bodyjointmobility"]["cervical_total"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Dorsal Score</span>
                                        <span class="label label-warning"><?php echo($bodycontent["bodyjointmobility"]["dorsal_score"]."/".$bodycontent["bodyjointmobility"]["dorsal_total"])?></span>
                                </a>
                                
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Lumber Score</span>
                                        <span class="label label-warning"><?php echo($bodycontent["bodyjointmobility"]["lumber_score"]."/".$bodycontent["bodyjointmobility"]["lumber_total"])?></span>
                                </a>
                               <a href="#" class="list-group-item">
                                        <span class="label label-success">Left Shoulder</span>
                                        <span class="label label-warning"><?php echo($bodycontent["bodyjointmobility"]["shldr_lft_score"]."/".$bodycontent["bodyjointmobility"]["shldr_lft_total"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Right Shoulder</span>
                                        <span class="label label-warning"><?php echo($bodycontent["bodyjointmobility"]["shldr_rght_score"]."/".$bodycontent["bodyjointmobility"]["shldr_rght_total"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Core</span>
                                        <span class="label label-warning"><?php echo($bodycontent["bodyjointmobility"]["core_score"]."/".$bodycontent["bodyjointmobility"]["core_total"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Total</span>
                                        <span class="label label-warning"><?php echo($bodycontent["bodyjointmobility"]["uprortho_score_total"]."/".$bodycontent["bodyjointmobility"]["uprortho_max_total"])?></span>
                                </a>
                               
                                
                            </div>
                        </div>
                    </div>
            
            <div class="col-lg-3">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-ioxhost fa-fw"></i>  Lower Body Joint Mobility </h3>
                            </div>
                            <div class="panel-body">
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Date</span>
                                        <span class="label label-warning"><?php echo($bodycontent["lowerjointmobility"]["OrthoDate"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Hip right</span>
                                        <span class="label label-warning"><?php echo($bodycontent["lowerjointmobility"]["hip_right_score"]."/".$bodycontent["lowerjointmobility"]["hip_right_total"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Hip Left</span>
                                        <span class="label label-warning"><?php echo($bodycontent["lowerjointmobility"]["hip_left_score"]."/".$bodycontent["lowerjointmobility"]["hip_left_score"])?></span>
                                </a>
                                
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Ankle right</span>
                                        <span class="label label-warning"><?php echo($bodycontent["lowerjointmobility"]["ankel_rght_score"]."/".$bodycontent["lowerjointmobility"]["ankel_rght_total"])?></span>
                                </a>
                               <a href="#" class="list-group-item">
                                        <span class="label label-success">Ankle left</span>
                                        <span class="label label-warning"><?php echo($bodycontent["lowerjointmobility"]["ankel_lft_score"]."/".$bodycontent["lowerjointmobility"]["ankel_lft_score"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Knee right</span>
                                        <span class="label label-warning"><?php echo($bodycontent["lowerjointmobility"]["knee_rght_score"]."/".$bodycontent["lowerjointmobility"]["knee_rght_total"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Knee left</span>
                                        <span class="label label-warning"><?php echo($bodycontent["lowerjointmobility"]["knee_lft_score"]."/".$bodycontent["lowerjointmobility"]["knee_lft_total"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Total</span>
                                        <span class="label label-warning"><?php echo($bodycontent["lowerjointmobility"]["lwr_score_total"]."/".$bodycontent["lowerjointmobility"]["lwr_max_total"])?></span>
                                </a>
                               
                                
                            </div>
                        </div>
                    </div>
            
            <div class="col-lg-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-ioxhost fa-fw"></i>  Muscle Flexibility </h3>
                            </div>
                            <div class="panel-body">
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Date</span>
                                        <span class="label label-warning"><?php echo($bodycontent["muscleflexibility"]["OrthoDate"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Right side</span>
                                        <span class="label label-warning"><?php echo($bodycontent["muscleflexibility"]["rght_sd_msl_score"]."/".$bodycontent["muscleflexibility"]["rght_sd_msl_total"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Left side</span>
                                        <span class="label label-warning"><?php echo($bodycontent["muscleflexibility"]["lft_sd_msl_score"]."/".$bodycontent["muscleflexibility"]["lft_sd_msl_total"])?></span>
                                </a>
                                
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Total</span>
                                        <span class="label label-warning"><?php echo($bodycontent["muscleflexibility"]["muscle_score_total"]."/".$bodycontent["muscleflexibility"]["muscle_max_score_total"])?></span>
                                </a>
                              
                               
                                
                            </div>
                        </div>
                    </div>
            <div class="col-lg-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-ioxhost fa-fw"></i>Body fat (%)</h3>
                            </div>
                            <div class="panel-body">
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Date</span>
                                        <span class="label label-warning"><?php echo($bodycontent["bodycompassmnt"]["BodyCmpDate"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Body Weight</span>
                                        <span class="label label-warning"><?php echo($bodycontent["bodycompassmnt"]["body_weight"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Fat(%)</span>
                                        <span class="label label-warning"><?php echo($bodycontent["bodycompassmnt"]["body_fat_per"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Lean body mass</span>
                                        <span class="label label-warning"><?php echo($bodycontent["bodycompassmnt"]["body_lean_mass"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Points</span>
                                        <span class="label label-warning"><?php echo($bodycontent["bodycompassmnt"]["body_score"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Remarks</span>
                                        <span class="label label-warning"><?php echo($bodycontent["bodycompassmnt"]["body_remarks"])?></span>
                                </a>
                              
                               
                                
                            </div>
                        </div>
                    </div>
            
        </div>
        <div class="row">
            <div class="col-lg-3">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-random fa-fw"></i>Waist Hip ratio's </h3>
                            </div>
                            <div class="panel-body">
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Date</span>
                                        <span class="label label-warning"><?php echo($bodycontent["WaistHipRatio"]["BodyCmpDate"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Waist</span>
                                        <span class="label label-warning"><?php echo($bodycontent["WaistHipRatio"]["body_waist"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Remarks</span>
                                        <span class="label label-warning"><?php echo($bodycontent["WaistHipRatio"]["body_waist_remrk"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Score</span>
                                        <span class="label label-warning"><?php echo($bodycontent["WaistHipRatio"]["body_waist_score"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Waist : Hip</span>
                                        <span class="label label-warning"><?php echo($bodycontent["WaistHipRatio"]["body_waist_hip_ratio"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Remarks</span>
                                        <span class="label label-warning"><?php echo($bodycontent["WaistHipRatio"]["bdy_wst_hip_rmk"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Score</span>
                                        <span class="label label-warning"><?php echo($bodycontent["WaistHipRatio"]["bdy_wst_hip_score"])?></span>
                                </a>
                               
                                
                            </div>
                        </div>
                    </div>
            
            <div class="col-lg-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-random fa-fw"></i>Body Girth Measurement </h3>
                            </div>
                            <div class="panel-body">
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Date</span>
                                        <span class="label label-warning"><?php echo($bodycontent["bodygirth"]["BodyGrthDate"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Neck</span>
                                        <span class="label label-warning"><?php echo($bodycontent["bodygirth"]["upr_bdy_neck"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Chest normal</span>
                                        <span class="label label-warning"><?php echo($bodycontent["bodygirth"]["upr_bdy_chst"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Chest expanded</span>
                                        <span class="label label-warning"><?php echo($bodycontent["bodygirth"]["upr_bdy_chst_expnd"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Shoulder</span>
                                        <span class="label label-warning"><?php echo($bodycontent["bodygirth"]["upr_bdy_shldr"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Biceps flex</span>
                                        <span class="label label-warning"><?php echo($bodycontent["bodygirth"]["upr_bdy_bicps_flx"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Biceps Extention</span>
                                        <span class="label label-warning"><?php echo($bodycontent["bodygirth"]["upr_bdy_bicp_extnt"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Upper Abdomen</span>
                                        <span class="label label-warning"><?php echo($bodycontent["bodygirth"]["upr_abodmen"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Mid Abdomen</span>
                                        <span class="label label-warning"><?php echo($bodycontent["bodygirth"]["mid_abdomen"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Lower Abdomen</span>
                                        <span class="label label-warning"><?php echo($bodycontent["bodygirth"]["lwr_abdomen"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Thai</span>
                                        <span class="label label-warning"><?php echo($bodycontent["bodygirth"]["lwr_bdy_thigh"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Calf</span>
                                        <span class="label label-warning"><?php echo($bodycontent["bodygirth"]["lwr_bdy_calf"])?></span>
                                </a>
                            </div>
                        </div>
                    </div>
            
            <div class="col-lg-3">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-random fa-fw"></i>Blood test </h3>
                            </div>
                            <div class="panel-body">
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Date</span>
                                        <span class="label label-warning"><?php echo($bodycontent["bloodtst"]["bldTestDt"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Test</span>
                                        <span class="label label-warning"><?php echo($bodycontent["bloodtst"]["test_desc"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Reading</span>
                                        <span class="label label-warning"><?php echo($bodycontent["bloodtst"]["reading"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Score</span>
                                        <span class="label label-warning"><?php echo($bodycontent["bloodtst"]["score"])?></span>
                                </a>
                                <a href="#" class="list-group-item">
                                        <span class="label label-success">Remarks</span>
                                        <span class="label label-warning"><?php echo($bodycontent["bloodtst"]["remarks"])?></span>
                                </a>
                              
                               
                                
                            </div>
                        </div>
                    </div>
        </div>
        
    </div>
</div>