<div id="page-wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header page-label"> Portfolio</h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>memberdashboard">Dashboard</a>
                    </li>

                    <li class="active">
                        <i class="fa fa-edit"></i> View folio
                    </li>
                </ol>
            </div>
        </div>







        <!-- /.row -->
        <?php
        if ($bodycontent["bodycomp"]) {
            $i = 2;
            foreach ($bodycontent["bodycomp"] as $content) {
                ?>
                <?php if ($i % 2 == 0) { ?>
                    <div class="row">
                <?php } ?>

                    <?php if ($i % 2 == 0) { ?>
                        <div class="col-lg-6 text-center">
                           
                            <div class="panel panel-info">
                                
                                <div class="panel-heading">
                                    
                                    <button style="float:left;margin-top:-7px;" id="<?php echo($content["tran_id"]); ?>" type="button" class="btn btn-primary btn-sm" data-toggle="confirmation" data-btn-ok-label="Yes" data-btn-ok-class="btn-success" data-btn-cancel-label="No" data-btn-cancel-class="btn-danger" data-title="" >
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </button>
                                     
                                    <h1 class="panel-title" ><?php echo($content["date_of_entry"]); ?></h1>
                                   
                                   
                                        
                                        
                                  
                                </div>
                                <div class="panel-body">
            <?php
            $images_data = "";
            if ($content["image_name"] != "") {
                $images_data = $content["image_name"];
            } else {
                $images_data = "No_Image_Available.png";
            }
            ?>

                                    <img src="<?php echo(base_url()) ?>application/assets/images/portfolioimages/<?php echo($images_data); ?>" class="img-rounded port-folio-preview" id="imgpreview" alt="Cinque Terre" >
                                </div>
                                <div class="panel-footer">
                                    Weight&nbsp;<span class="label label-warning"><?php echo($content["weight"]); ?></span>
                                    Waist&nbsp;<span class="label label-warning"><?php echo($content["waist"]); ?></span>
                                    Hip&nbsp;<span class="label label-warning"><?php echo($content["hip"]); ?></span>

                                    BF%&nbsp;<span class="label label-warning"><?php echo($content["fat_per"]); ?></span>
                                    BFM&nbsp;<span class="label label-warning"><?php echo($content["fat_mass"]); ?></span>
                                    BLM&nbsp;<span class="label label-warning"><?php echo($content["lean_body_mass"]); ?></span>
                                    WCF&nbsp;<span class="label label-warning"><?php echo($content["waist_remarks"]); ?></span>
                                    WHR&nbsp;<span class="label label-warning"><?php echo($content["waist_hip_remarks"]); ?></span>
                                </div>
                            </div>
                        </div>
        <?php } else { ?>

                        <div class="col-lg-6 text-center">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h1 class="panel-title"><?php echo($content["date_of_entry"]); ?></h1>
                                     <div class="btn-group pull-right" >

                                         <i class="fa fa-trash-o" aria-hidden="true" style="cursor: pointer;"></i>

                                    </div>  
                                </div>
                                <div class="panel-body">
            <?php
            $images_data = "";
            if ($content["image_name"] != "") {
                $images_data = $content["image_name"];
            } else {
                $images_data = "No_Image_Available.png";
            }
            ?>

                                    <img src="<?php echo(base_url()) ?>application/assets/images/portfolioimages/<?php echo($images_data); ?>" class="img-rounded port-folio-preview" id="imgpreview" alt="Cinque Terre" >
                                </div>
                                <div class="panel-footer">
                                    Weight&nbsp;<span class="label label-warning"><?php echo($content["weight"]); ?></span>
                                    Waist&nbsp;<span class="label label-warning"><?php echo($content["waist"]); ?></span>
                                    Hip&nbsp;<span class="label label-warning"><?php echo($content["hip"]); ?></span>
                                    BF% &nbsp;<span class="label label-warning"><?php echo($content["fat_per"]); ?></span>
                                    BFM &nbsp;<span class="label label-warning"><?php echo($content["fat_mass"]); ?></span>
                                    BLM &nbsp;<span class="label label-warning"><?php echo($content["lean_body_mass"]); ?></span>
                                    WCF &nbsp;<span class="label label-warning"><?php echo($content["waist_remarks"]); ?></span>
                                    WHR &nbsp;<span class="label label-warning"><?php echo($content["waist_hip_remarks"]); ?></span>
                                </div>
                            </div>
                        </div>
        <?php } ?>

        <?php if ($i % 2 != 0) { ?>         
                    </div>
                    <?php } ?>

                <!-- /.row -->

                <?php
                $i = $i + 1;
            }
        }
        ?>
    </div>
</div>