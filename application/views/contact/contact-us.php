<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<img src="<?php echo base_url(); ?>application/assets/images/contactus-banner.jpg" class="img-responsive" />
		</div>
	</div>
</div>
<div class="container-fluid" id="contact-page-box-container">
	<div class="row contact-row-container" >
		<div class="col-md-6 " >
			<div class="contact-box-container">
				<div class="form-group">
					<p class="contact-title-head">Branch</p>
					<select class="form-control" id="contact-branch" class="contact-branch" name="contact-branch">
					<?php 
						foreach($bodycontent['contactBranch'] as $contact_branch){
					?>
						<option value="<?php echo $contact_branch['id'];?>"><?php echo $contact_branch['branch_name'];?></option>
					<?php } ?>
					</select>
				</div>
				<div id="contact-detail"></div>
			</div>
		</div>
		
		<div class="col-md-6 ">
		<div class="facebook-page-container">
			<p class="contact-title-head">Facebook Like & share</p>
			<div id="fbpageContainer">
				<div class="fb-page" data-href="https://www.facebook.com/MantraLIfeStyleHealthClub/" data-tabs="timeline" data-width="500" data-height="480" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/MantraLIfeStyleHealthClub/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/MantraLIfeStyleHealthClub/">Mantra Lifestyle Health Club</a></blockquote></div>
			</div>
		</div>
		</div>
	</div>
</div>


<div class="container-fluid">
	<div class="row row-container contact-enquiry-container">
		<div class="jumbotron jumbotron-sm">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-lg-12">
						<h1 class="h1">
							Contact us <small>Feel free to contact us</small></h1>
					</div>
				</div>
			</div>
		</div> <!-- END JUMBOTRON -->
		
		<form id="contact-enquiry-form" name="contact-enquiry-form" method="post">
		<div class="col-md-7 col-sm-6">
			<div class="form-group">
                <label for="name">Name</label>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                        <input type="text" class="form-control" id="enq-name" name="enq-name" placeholder="Enter your name" />
					</div>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                        <input type="text" class="form-control" id="enq-email" name="enq-email" placeholder="Enter your email" />
					</div>
            </div>
			<div class="form-group">
                <label for="mobile">Mobile</label>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
                        <input type="text" class="form-control" id="enq-mobile" name="enq-mobile" placeholder="Enter your mobile no" onKeyUp="numericFilter(this);"/>
					</div>
            </div>
		</div>
		<div class="col-md-5 col-sm-6">
			<div class="form-group">
                <label for="name">Message</label>
				<textarea name="enq-message" id="enq-message" class="form-control" rows="3" cols="25" placeholder="Message"></textarea>
			</div>
			<div class="enq-captcha">
				<?php echo $bodycontent["widget"];?>
				<?php echo $bodycontent["script"];?>
			</div>
		</div>
		
		<div class="col-md-7">
			<div class="contact-submit">
				<button class="btn btn-danger">Submit</button>
			</div>
		</div>
		</form> <!-- Contact Enquiry Form END -->
		
		<div class="col-md-12">
			<div class="contact-enquiry-error" style="padding:1%;">
				<p id="contact-enquiry-error" class="error-style" style="color:#F95340;"></p>
			</div>
		</div>
	
	</div>
</div>



