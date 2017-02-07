<!--<script type="text/javascript">

    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("imagefile1").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("preview").src = oFREvent.target.result;
        };
    };

</script>-->
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
                        <i class="fa fa-edit"></i> Make folio
                    </li>
                </ol>
            </div>
        </div>

        <!-- /.row -->

        <div class="row">
            <div class="col-lg-6 text-center">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <img src="<?php echo(base_url()) ?>application/assets/images/portfolioimages/No_Image_Available.png" class="img-rounded port-folio-preview" id="imgpreview" alt="Cinque Terre" >
                    </div>
                     <div class="form-group">
                             <label  class="custom-file-input">
                                <input type="file" name="imgInp" id="imgInp" accept="image/*" onchange=""/>
                             </label>
                     </div>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="Date">Date:</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="date" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="weight">Weight:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="weight" placeholder="Enter weight">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="Waist">Waist:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="Waist" placeholder="Enter waist">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="hip">Hip:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="hip" placeholder="Enter hip">
                                </div>
                            </div>
                           
                            <img src="<?php echo(base_url()) ?>application/assets/images/assessment-icon-2.png"  id="getvalue" alt="Get value" title="Get value" style="cursor: pointer"/>
                               
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="bodyfat">Bodyfat(%):</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="bodyfat" placeholder="" disabled="">
                                </div>
                            </div>
                           
                            
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="bodyfatmass">Bodyfat mass:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="bodyfatmass" placeholder="" disabled="">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="bodyleanmass">Bodylean mass:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="bodyleanmass" placeholder="" disabled="">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="waistcrmfrnc">Waistcircumference :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="waistcrmfrnc" placeholder="" disabled="">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="waisthipratio">Waisthipratio :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="waisthipratio" placeholder="" disabled="">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
</div>