<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <img src="<?php echo base_url(); ?>application/assets/images/life-style-health-mantra.jpg" class="img-responsive" />
        </div>
    </div>
</div>

<?php 
/*	$package_rate = $bodycontent['cardDtl']['package_rate'];
	$service_tax = $bodycontent['finYrDtl']['service_tax'];
	$serviceTaxAmt = $package_rate*$service_tax/100;
	$totalPayableAmt = $package_rate + $serviceTaxAmt;*/
	
?>

<div class="container-fluid" style="background:#F8F8F8;padding:2% 0;">
	<div class="row row-container">
		<h1 style="color:#FB662C;">Registration</h1>
	</div>
	<div class="row row-container formContainer">
	
	
			<form action="<?php echo base_url('services/proceedtopayment');?>" id="onlineRegForm" name="onlineRegForm" method="post" onsubmit="return validateRegForm();">
				<div class="col-md-6">
				<h2 class="regformheading">Personal Info</h2>
					<div class="form-group">
						<label for="onlinereg-name">Name </label>
						<input type="text" class="form-control" id="onlinereg-name" name="onlinereg-name" placeholder="Enter your name" autocomplete="off" />
					</div>
					
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="onlinereg-gender">Gender</label>
								<select class="form-control" id="onlinereg-gender" name="onlinereg-gender">
									<option value="M">MALE</option>
									<option value="F">FEMALE</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="onlinereg-dob">DOB</label>
								<input type="text" class="form-control datepicker" id="onlinereg-dob" name="onlinereg-dob" placeholder="dd-mm-yyyy  Ex: 01-05-1990" autocomplete="off" onKeyUp="numericFilter(this);" readonly />
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="onlinereg-mobile">Mobile </label>
						<input type="text" class="form-control" id="onlinereg-mobile" name="onlinereg-mobile" placeholder="10 digit mobile no" onKeyUp="numericFilter(this);" autocomplete="off" />
					</div>
					<div class="form-group">
						<label for="onlinereg-email">Email </label>
						<input type="text" class="form-control" id="onlinereg-email" name="onlinereg-email" placeholder="Your email" autocomplete="off" />
					</div>
					<div class="form-group">
						<label for="onlinereg-address">Address </label>
						<textarea class="form-control" name="onlinereg-address" id="onlinereg-address" ></textarea>
					</div>
					
					<div class="row">
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
							<label for="onlinereg-zipcode">Zip </label>
							<input type="text" class="form-control" id="onlinereg-zipcode" name="onlinereg-zipcode" placeholder="Zip Code" autocomplete="off" onKeyUp="numericFilter(this);" />
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
							<label for="onlinereg-city">City </label>
							<input type="text" class="form-control" id="onlinereg-city" name="onlinereg-city" placeholder="City" autocomplete="off" />
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label for="onlinereg-state">State </label>
								<input type="text" class="form-control" id="onlinereg-state" name="onlinereg-state" placeholder="State" autocomplete="off" />
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label for="onlinereg-country">Country </label>
								<input type="text" class="form-control" id="onlinereg-country" name="onlinereg-country" placeholder="Country" autocomplete="off" />
							</div>
						</div>
					</div>
					
					
					
					
				</div> <!-- End col-md-6-->
				<div class="col-md-6">
				<h2 class="regformheading">Payment Info</h2>
					<div class="form-group">
						<label for="selected-branch">Selected Branch </label>
						<input type="text" class="form-control" id="selected-branch" name="selected-branch" value="<?php echo $bodycontent['branch'] ;?>" readonly />
					</div>
					<div class="form-group">
						<label for="selected-package">Selected Package </label>
						<input type="text" class="form-control" id="selected-package" name="selected-package" value="<?php echo $bodycontent['cardDtl']['card_desc']." (".$bodycontent['cardDtl']['card_code'].")" ;?>" readonly />
					</div>
					<div class="form-group">
						<label for="subscription-amount">Subscription Amount</label>
						<input type="text" class="form-control" id="subscription-amount" name="subscription-amount" value="<?php echo $bodycontent['cardDtl']['package_rate'] ;?>" readonly />
					</div>
					<!--
					<div class="form-group">
						<label for="service-tax-percent">Service Tax%</label>
						<input type="text" class="form-control" id="service-tax-percent" name="service-tax-percent" value="<?php echo $service_tax; ?>" readonly />
					</div>-->
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label for="cgst-rate">CGST % Rate</label>
								<select class="form-control" id="cgst-rate" name="cgst-rate" readonly>
									<?php foreach($bodycontent['cgstRateOpt'] as $cgstRateOpt):?>
									<option value="<?php echo $cgstRateOpt['gstID'] ?>" <?php if($cgstRateOpt['gstID']==1){echo "selected";}else{echo "";} ?>><?php echo $cgstRateOpt['rate']; ?></option>
									<?php endforeach; ?>
								</select>
								
								
							</div>
							<div class="col-md-6">
								<label for="cgst-amount">CGST Amount</label>
								<input type="text" class="form-control" id="cgst-amount" name="cgst-amount" value="<?php echo $bodycontent['paymentInfo']['cgstAmt'] ;?>" readonly />
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label for="sgst-rate">SGST % Rate</label>
								<select class="form-control" id="sgst-rate" name="sgst-rate"  readonly>
									<?php foreach($bodycontent['sgstRateOpt'] as $sgstRateOpt):?>
									<option value="<?php echo $sgstRateOpt['gstID'] ?>" <?php if($sgstRateOpt['gstID']==2){echo "selected";}else{echo "";} ?>><?php echo $sgstRateOpt['rate']; ?></option>
									<?php endforeach; ?>
								</select>
								
								
							</div>
							<div class="col-md-6">
								<label for="sgst-amount">SGST Amount</label>
								<input type="text" class="form-control" id="sgst-amount" name="sgst-amount" value="<?php echo $bodycontent['paymentInfo']['sgstAmt'] ;?>" readonly />
							</div>
						</div>
					</div>
					
				
					<div class="form-group">
						<label for="total-gst">Total GST Amount</label>
						<input type="text" class="form-control" id="total-gst" name="total-gst" value="<?php echo $bodycontent['paymentInfo']['totalGSTAmt']; ?>" readonly />
					</div>
					
				
					<div class="form-group">
						<label for="net-payable-amt">Net Payable</label>
						<input type="text" class="form-control" id="net-payable-amt" name="net-payable-amt" value="<?php echo $bodycontent['paymentInfo']['totalPayableAmt']; ?>" readonly />
					</div> 
					
					
					
					<div class="form-group">
						<input name="cc" type="hidden" value="<?php echo ($bodycontent['cardDtl']['card_code']);?>" />
						<input name="bcd" type="hidden" value="<?php echo ($bodycontent['branchcode']);?>" />
					</div>
					
					
					
					<!--
					<button type="submit" class="btn cutome-link-btn" style="float:right;">Proceed to Payment <span class="glyphicon glyphicon-chevron-right"></span></button>-->
				</div><!-- End col-md-6--> 
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<input type="submit" name="submitted" value="Proceed to Payment" class="btn cutome-link-btn" style="float:right;"/> 
					</div>
				</div>
				
			</form>
			<div class="onlinereg-error" style="padding:1%;">
				<p id="onlinereg-error" class="error-style" style="color:#F95340;"></p>
			</div>
		
				
	</div>
</div>
	
	
