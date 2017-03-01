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
			<a href="#" style="text-decoration:none;"><h2 style="text-align:center;">
			<span class="label label-success">Buy Now</span></h2></a>
		</div>
	</div>
	

	<div class="row row-container facilityDetail">
		<!--
		<div class="col-md-12">
			<?php 
				if($bodycontent['cardDtl']){
					echo "<h2>".$bodycontent['cardDtl']['card_desc']." (".$bodycontent['cardDtl']['card_code'].")"."</h2>";
				}
			?>
		</div>
		-->
	
		<div class="col-md-12">
			<?php 
				if($bodycontent['complDtl']){
			?>
			<h3>Complimentary</h3>
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
		
		<div class="col-md-12">
		<?php if($bodycontent['packagePart']) { ?>
			<h3>Work Out & Fitness</h3>
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
						$i = 1;
						foreach($bodycontent['packagePart'] as $complimentaryDtl){ ?>
						<tr>
							<td><?php echo $i++; ?></td>
							<td><?php echo $complimentaryDtl['coupon_title'];?></td>
							<td align="right"><?php echo $complimentaryDtl['qty'];?></td>
						</tr>	
					<?php }	 ?>
					</tbody>
				</table>
			</div>
		<?php } else{ echo "";}?>
		</div>
		
		
	</div>
</div>
