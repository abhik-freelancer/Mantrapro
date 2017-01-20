<div id="page-wrapper">

            <div class="container-fluid">
                <!--message area-->
                    <div class="alert alert-danger" role="alert" style="display:none;" id="msgdiv">
                    <div id="msgText"></div>
                    <span class="glyphicon glyphicon-remove" aria-hidden="true" id="errorclose" style="float: right;margin-top: -19px;cursor: pointer;"></span>
                    </div>

                    <div class="alert alert-success" role="alert" style="display:none;" id="msgdivsuccess">
                    <div id="successmsgText"></div>
                    <span class="glyphicon glyphicon-remove" aria-hidden="true" id="successclose" style="float: right;margin-top: -19px;cursor: pointer;"></span>
                    </div>
                <!--message area-->
                
                

              <form name="frmPersonalia" id="frmPersonalia" method="post">
               <fieldset>
                    <legend>Personalia:</legend>   
                <div class="form-group">
                  <label for="membername">Name*</label>
                  <input type="text" class="form-control" id="membername" placeholder="Name" name="memberName" id="memberName" value="<?php echo($bodycontent["CUS_NAME"]) ;?>">
                </div>
                <div class="form-group">
                  <label for="registermobilenumber">Mobile</label>
                  <input type="text" class="form-control"  placeholder="Moblie" name="memberRegisterMobile" id="memberRegisterMobile" value="<?php echo($bodycontent["CUS_PHONE"]) ;?>" disabled>
                </div>
                
                  <div class="form-group">
                        <label for="alternatemobilenumber">Alternate Mobile</label>
                        <input type="text" class="form-control" name="alternatemobilenumber" id="alternatemobilenumber" value="<?php echo($bodycontent["CUS_PHONE2"]) ;?>" placeholder="Moblie" >
                  </div>    
                
                    
                <div class="form-group">
                  <label for="address">Address*</label>
                  <textarea class="form-control" rows="3" id="address" name="memberAddress" id="memberAddress"><?php echo($bodycontent["CUS_ADRESS"]) ;?></textarea>
                </div>    
                    
                <div class="form-group">
                  <label for="pinnumber">Pin*</label>
                  <input type="text" class="form-control" id="pinnumber" name="pinnumber" placeholder="Pin" value="<?php echo($bodycontent["CUS_PIN"]) ;?>" >
                </div>
                
                <div class="form-group">
                  <label for="Email">Email address*</label>
                  <input type="email" class="form-control" id="Email" name="Email" placeholder="Email" value="<?php echo($bodycontent["CUS_EMAIL"]) ;?>">
                </div>    

               <div class="form-group">
                    <label class="radio-inline">
                        <input type="radio" name="membersex" id="membersex" value="M" <?php if($bodycontent["CUS_SEX"]=="M"){echo("Checked");}else{echo("");} ?> > Male
                    </label>
                   <label class="radio-inline">
                     <input type="radio" name="membersex" id="membersex" value="F" <?php if($bodycontent["CUS_SEX"]=="F"){echo("Checked");}else{echo("");} ?>> Female
                   </label>
                </div> 
                   
                <div class="form-group">
                    <label for="Email">Blood group*</label>
                    <select class="form-control" name="bloodgroup">
                        <option value="">Select</option>
                        
                        <?php foreach ($header["bloodgroup"] as $rows) {?>
                                
                        <option value="<?php echo($rows["bld_group_code"]); ?>" <?php echo($rows["bld_group_code"]==$bodycontent["CUS_BLOOD_GRP"]?"selected":"") ?>>
                            <?php echo($rows["bld_group_code"]); ?>
                        </option> 
                        
                        <?php } ?>
                        
                    </select>  
                </div>         
                        
                <div class="form-group">
                  <label for="dateofbirth">DOB*</label>
                  <input type="date" class="form-control" id="dateofbirth" name="dateofbirth" placeholder="Date of birth"  value="<?php echo($bodycontent["CUS_DOB"]) ?>">
                </div>    
                    
                <button type="submit" class="btn btn-default">Submit</button>
               </fieldset>
            </form>

                <form>
                    <fieldset>
                        <legend>Accounts:</legend>  
                        
                        <div class="form-group">
                        <label for="mantrapackage">Packeage</label>
                        <input type="text" class="form-control" id="mantrapackage" placeholder="Currentpackages" value="<?php echo($bodycontent["CARD_DESC"]); ?>" disabled="" >
                        </div>    
                    
                        <div class="form-group">
                        <label for="registrationdate">Date of registration</label>
                        <input type="text" class="form-control" id="registrationdate" placeholder="Date of registration" disabled=""  value="<?php echo($bodycontent["REGISTRATION_DT"]);?>">
                        </div> 
                        
                
                    </fieldset>
                </form>
                
                
                
                <form>
                    <fieldset>
                        <legend>Profile picture:</legend>  
                        <?php 
                        if($bodycontent["image_name"]==""){
                        $images="noimage.png";
                        }else{
                           $images=$bodycontent["image_name"]; 
                        }
                        ?>
                        
                        <img src="<?php echo base_url(); ?>application/assets/images/Profilepicture/<?php echo($images);?>" class="img-rounded" alt="<?php echo($bodycontent["CUS_NAME"]) ;?>" width="255" height="255" >    
                    
                        <div class="form-group">
                            <label for="imagefile">Profile picture</label>
                            <input type="file" id="imagefile">
                            <p class="help-block">Change your profile picture.</p>
                        </div>
                        
                
                    </fieldset>
                </form>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->