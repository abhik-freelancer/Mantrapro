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