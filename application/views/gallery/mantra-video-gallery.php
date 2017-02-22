<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<img src="<?php echo base_url(); ?>application/assets/images/video-gallery-banner.jpg" class="img-responsive" />
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row row-container">
		<div class="col-md-12">
			<h1><span class="first-text-col">M</span>antra <span class="first-text-col">V</span>ideos</h1>
		</div>
		
	</div>
</div>


<div class="parralax-video-gallery">
<div class="container-fluid">
	<div class="row row-container">
		 <div id="amazingslider-wrapper-1" style="display:block;position:relative;max-width:auto;margin:0px auto 98px;">
			<div id="amazingslider-1" style="display:block;position:relative;margin:0 auto;">
				<ul class="amazingslider-slides" style="display:none;">
		<?php  if($bodycontent['videogallery']){
				foreach($bodycontent['videogallery'] as $videogallery){ 
				?>
				<li>
						<img src="https://img.youtube.com/vi/<?php echo $videogallery['videoid'];?>/hqdefault.jpg" alt="<?php echo $videogallery['videotitle'];?>"  title="<?php echo $videogallery['videotitle'];?>" data-description="" />
						<video preload="none" src="<?php echo $videogallery['videolink'];?>" ></video>
				</li> 	
								
		<?php 
			}} ?>
				</ul>
				<ul class="amazingslider-thumbnails" style="display:none;">
					<?php 
						if($bodycontent['videogallery']){
							foreach($bodycontent['videogallery'] as $video_thumbnail){ ?>
							
						 <li><img src="https://img.youtube.com/vi/<?php echo $video_thumbnail['videoid']; ?>/hqdefault.jpg" alt="<?php echo $video_thumbnail['videotitle']; ?>" title="<?php echo $video_thumbnail['videotitle']; ?>" /></li>	
								
					<?php	}
						}
					?>
				</ul>
			</div>
		</div>
	</div>
</div>
</div>




