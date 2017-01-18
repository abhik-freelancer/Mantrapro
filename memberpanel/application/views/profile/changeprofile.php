<div id="page-wrapper">

            <div class="container-fluid">

              <form>
               <fieldset>
                    <legend>Personalia:</legend>   
                <div class="form-group">
                  <label for="membername">Name</label>
                  <input type="text" class="form-control" id="membername" placeholder="Name" value="<?php echo($bodycontent["CUS_NAME"]) ;?>">
                </div>
                <div class="form-group">
                  <label for="registermobilenumber">Mobile</label>
                  <input type="text" class="form-control" id="registermobilenumber" placeholder="Moblie" value="<?php echo($bodycontent["CUS_PHONE"]) ;?>" disabled>
                </div>
                
                  <div class="form-group">
                        <label for="alternatemobilenumber">Alternate Mobile</label>
                        <input type="text" class="form-control" id="alternatemobilenumber" value="<?php echo($bodycontent["CUS_PHONE2"]) ;?>" placeholder="Moblie" >
                  </div>    
                
                    
                <div class="form-group">
                  <label for="address">Address</label>
                  <textarea class="form-control" rows="3" id="address"></textarea>
                </div>    
                    
                <div class="form-group">
                  <label for="pinnumber">Pin</label>
                  <input type="text" class="form-control" id="pinnumber" placeholder="Pin" >
                </div>
                
                <div class="form-group">
                  <label for="Email">Email address</label>
                  <input type="email" class="form-control" id="Email" placeholder="Email" >
                </div>    

               <div class="form-group">
                    <label class="radio-inline">
                       <input type="radio" name="membersex" id="sex" value="M"> Male
                    </label>
                   <label class="radio-inline">
                     <input type="radio" name="membersex" id="sex" value="option2"> Female
                   </label>
                </div> 
                <div class="form-group">
                    <select class="form-control">
                        <option>Select</option>
                        <option>O-positive</option>
                        <option>O-negative</option>
                        <option>A-positive</option>
                        <option>A-negative</option>
                        <option>B-positive</option>
                        <option>B-negative</option>
                        <option>AB-positive</option>
                        <option>AB-negative</option>
                    </select>  
                </div>         
                        
                <div class="form-group">
                  <label for="dateofbirth">DOB.</label>
                  <input type="date" class="form-control" id="dateofbirth" placeholder="Date of birth" >
                </div>    
                    
                <button type="submit" class="btn btn-default">Submit</button>
               </fieldset>
            </form>

                <form>
                    <fieldset>
                        <legend>Accounts:</legend>  
                        
                        <div class="form-group">
                        <label for="mantrapackage">Packeage</label>
                        <input type="text" class="form-control" id="mantrapackage" placeholder="Currentpackages" disabled="" >
                        </div>    
                    
                        <div class="form-group">
                        <label for="registrationdate">Date of registration</label>
                        <input type="text" class="form-control" id="registrationdate" placeholder="Date of registration" disabled="" >
                        </div> 
                        
                
                    </fieldset>
                </form>
                
                
                
                <form>
                    <fieldset>
                        <legend>Profile picture:</legend>  
                        
                        <img src="<?php echo base_url(); ?>application/assets/images/Profilepicture/noimage.png" class="img-polaroid">    
                    
                        <div class="form-group">
                            <label for="imagefile">File input</label>
                            <input type="file" id="imagefile">
                            <p class="help-block">Change your profile picture.</p>
                        </div>
                        
                
                    </fieldset>
                </form>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->