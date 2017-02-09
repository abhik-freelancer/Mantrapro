<div class="get-your-pass-bg" >
	<div class="container get-pass-page-head">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<h1>Get Your Pass</h1>
				<p>Please fill up this form to get your pass</p>
			</div>
		</div>
	</div>

<div class="container get-your-pass-form">
	<form name="getPassForm" id="getPassForm" method="post" >
	<div class="row">
		  <div class="form-group col-md-6 col-sm-12">
			<label for="firstname">First Name<span class="required-mark">*</span></label>
			<input type="text" class="form-control custom-input" id="firstname" name="firstname" placeholder="First Name">
			<p class="error-style" id="fname-error"></p>
		  </div>
		  <div class="form-group col-md-6 col-sm-12">
			<label for="lastname">Last Name<span class="required-mark">*</span></label>
			<input type="text" class="form-control custom-input" id="lastname" name="lastname" placeholder="Last Name">
			<p class="error-style" id="lastname-error"></p>
		  </div>
	</div>
	<div class="row">
		<div class="form-group col-md-6 col-sm-12">
			<label for="email">Email <span class="required-mark">*</span></label>
			<input type="text" class="form-control custom-input" id="email" name="email" placeholder="Email">
			<p class="error-style" id="email-error"></p>
		</div>
		<div class="form-group col-md-6 col-sm-12">
			<label for="mobile">Mobile<span class="required-mark">*</span></label>
			<input type="text" class="form-control custom-input" id="mobile" name="mobile" placeholder="Mobile No" onKeyUp="numericFilter(this);" >
			<p class="error-style" id="mobile-error"></p>
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-6 col-sm-12">
			<label for="exampleInputEmail1">Gym Location<span class="required-mark">*</span></label>
			<select class="form-control custom-input" id="gymLocation" name="gymLocation">
			  <option value="0">Select </option>
			  <?php foreach($header['gymlocation'] as $gymlocation){ ?>
				<option value="<?php echo $gymlocation['branch_code'];?>"><?php echo $gymlocation['branch_name'];?></option>
			  <?php } ?>
			</select>
			<p class="error-style" id="gymlocation-error"></p>
		</div>
		<div class="form-group col-md-6 col-sm-12">
			<label for="pincode">Pincode<span class="required-mark">*</span></label>
			<input type="text" class="form-control custom-input" id="pincode" name="pincode" placeholder="Pincode" onKeyUp="numericFilter(this);">
			<p class="error-style" id="pincode-error"></p>
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-6 col-sm-12">
			<label for="address">Address</label>
			<textarea class="form-control custom-input" rows="2" id="address" name="address" placeholder="Your Address"></textarea>
		</div>
		<div class="form-group col-md-6 col-sm-12">
			<label for="messages">Message</label>
			<textarea class="form-control custom-input" rows="2" name="comments" id="comments" placeholder="Your Message"></textarea>
		</div>
	</div>	
	<div class="row">
		<div class="form-group col-md-6 col-md-12">
			<!--<div class="g-recaptcha" data-sitekey="6LfZVRQUAAAAAM_R3DAbp_akOtOEnf6SaE7WjB2v"></div>-->
			<!--localhost <div class="g-recaptcha" data-sitekey="6LdNVxQUAAAAAKPN9xy2BY8fXhgzb8dCvMRg0To-"></div> -->
			<!--<div class="g-recaptcha" data-sitekey="6LdUVRQUAAAAAIZPq_c7wAcCCez18Fc8l8N2Xegg"></div>-->
			<?php echo $bodycontent["widget"];?>
			<?php echo $bodycontent["script"];?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12"><p id="all-field-req"></p></div>
	</div>
		 
	<button type="submit" class="btn custom-button-guest-pass" id="">Submit</button>
	<div class="submit-message"><p id="submit-response">Response message</p></div>
	</form>
</div>
</div>