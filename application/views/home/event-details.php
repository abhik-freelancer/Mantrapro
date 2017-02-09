<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title detail-event-head" id="myModalLabel">Events on <?php echo date('d',strtotime($event_date))?> <?php echo date('M',strtotime($event_date));?> <?php echo date('Y',strtotime($event_date));?></h4>
      </div>
      <div class="modal-body event-detail-body">
            <div class="row">
    <?php 
	$event_brn = "";
    foreach($event_detail as $event_dtl){ 
		if($event_brn==$event_dtl['branch']){ ?>
			<div class="col-md-12">
				<div class="detail-even-branch"><?php echo "";?></div>
				<div class="detail-event-title"><?php echo $event_dtl['event_title'];?></div>
				<div class="detail-event-desc">
					<p>
						<?php echo $event_dtl['event_desc'];?>
					</p>
				</div>
			</div>
			 
		<?php }
		else{
			 $event_brn =$event_dtl['branch']; ?>
			 
			<div class="col-md-12">
				<div class="detail-even-branch"><?php echo $event_brn;?></div>
				<div class="detail-event-title"><?php echo $event_dtl['event_title'];?></div>
				<div class="detail-event-desc">
					<p>
						<?php echo $event_dtl['event_desc'];?>
					</p>
				</div>
			</div>
			
	<?php }
	?>
        
    <?php } ?>    

<!--                <div class="col-md-12">
                    <div class="detail-even-branch">Barrackpore</div>
                    <div class="detail-event-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit</div>
                    <div class="detail-event-desc">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod.
                    </p>
                    </div>
                </div>
                
            
-->                
            
                
</div>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>