<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <img src="<?php echo base_url(); ?>application/assets/images/life-style-health-mantra.jpg" class="img-responsive" />
        </div>
    </div>
</div>

<div class="container-fluid">

	<div class="row row-container facility-heading">
		<div class="col-md-6  "><?php echo $bodycontent['cardDtl']['card_desc'];?></div>
		<div class="col-md-6 ">Duration : <?php echo $bodycontent['cardDtl']['card_duration'];?></div>
		<div class="col-md-6 ">Admission Amt (w/o Service Tax) : <?php echo $bodycontent['cardDtl']['package_rate'];?></div>
		<div class="col-md-6 ">Renewal Amt (w/o Service Tax) : <?php echo $bodycontent['cardDtl']['renewal_rate'];?></div>
	</div>
	<div class="row row-container" style="margin-top:0px !important;">
		<div class="col-md-12">
			<a href="<?php echo base_url()?>services/onlineregistration/<?php echo $bodycontent['cardDtl']['card_id'];?>/<?php echo $bodycontent['branchcode'];?>" style="text-decoration:none;"><h2 style="text-align:center;">
			<span class="label label-success">Buy Now</span></h2></a>
		</div>
	</div>
	

	<div class="row row-container facilityDetail">
		<div class="col-md-12">
			<h3 style="color:#FF8E70;">Mantra <?php echo $bodycontent['cardDtl']['card_desc'];?> Facility Chart</h3>
		</div>
	
		<div class="col-md-12">
			<?php 
				if($bodycontent['complDtl']){
			?>
			<h5>Complimentary</h5>
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Description</th>
							<th style="text-align:right;">Qty</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$x = 1;
						foreach($bodycontent['complDtl'] as $complimentaryDtl){ ?>
						<tr>
							<td><?php echo $x++; ?></td>
							<td><?php echo $complimentaryDtl['coupon_title'];?></td>
							<td align="right"><?php echo $complimentaryDtl['qty'];?></td>
						</tr>	
					<?php }	 ?>
					</tbody>
				</table>
			</div>
				<?php } else{echo "";}?>
		</div>
		<?php if($bodycontent['workoutDtl'] OR $bodycontent['healthandfitness']){ ?>
		<div class="col-md-12">
			<h3 style="color:#FF8E70;">Key package facilities</h3>
		</div>
		<?php }else{echo "";} ?>
		
		<!--Work Out -->
		<div class="col-md-12">
		<?php
			if($bodycontent['workoutDtl'])
					{
						?>
						<h5>Work out facilities</h5>
						<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Description</th>
									<th style="text-align:right;">Qty</th>
								</tr>
							</thead>
							<tbody>
					
					<?php $m=1;
						foreach($bodycontent['workoutDtl'] as $workoutDtl)
						{?>
						<tr>
								<td><?php echo $m++; ?></td>
								<td><?php echo $workoutDtl['workout_coupon_title']; ?></td>
								<td><?php echo $workoutDtl['workoutqty']; ?></td>
						</tr>
							
				<?php	} ?>
						 </tbody>
						</table>
						</div>
				<?php 
					} ?>
		</div>
		
		
		
		
		
		<div class="col-md-12">
		<?php
			if($bodycontent['healthandfitness'])
					{
						?>
						<h5>Health & Fitness assessment facilities</h5>
						<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Description</th>
									<th style="text-align:right;">Qty</th>
								</tr>
							</thead>
							<tbody>
					
					<?php $n=1;
						foreach($bodycontent['healthandfitness'] as $healthandfitness)
						{?>
						<tr>
							<td><?php echo $n++; ?></td>
							<td><?php echo $healthandfitness['HF_coupon_title']; ?></td>
							<td><?php echo $healthandfitness['HF_qty']; ?></td>
						</tr>
							
				<?php	} ?>
						 </tbody>
						</table>
						</div>
				<?php 
					} ?>
		</div>
		
		
	</div>
</div>
