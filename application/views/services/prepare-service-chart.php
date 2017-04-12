
<?php 
/*echo "<pre>";
	print_r($ratechart);
echo "</pre>";*/
?>

<?php 
if($ratechart){
$i=1;
foreach($ratechart as $rate_chart_head){ 
if($rate_chart_head['package_detail']){
$ratechartRefId = "#collapse".$i;
$ratechartTargetId = "collapse".$i;
?>

<div class="panel-group" id="rateChartAccordion">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title" data-toggle="collapse" data-parent="#rateChartAccordion" href="<?php echo $ratechartRefId;?>">
			<a href="javascript:;"><span class="glyphicon glyphicon-chevron-right"></span> <?php echo $rate_chart_head['category_name'];?></a></h4>
			<div id="<?php echo $ratechartTargetId; ?>" class="panel-collapse collapse ">
				<div class="table-responsive" style="margin-top: 10px;">
					<table class="table table-striped">
						<thead>
							<tr>
							<th>#</th>
							<th></th>
							<th>Package</th>
							<th>Duration</th>
							<th style="text-align:right;">Admission Amt <br>(w/o Service Tax)</th>
							<th style="text-align:right;">Renewal Amt <br>(w/o Service Tax)</th>
							<th>Facility(s)</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$k = 1;
							/*
							echo "<pre>";
							print_r($rate_chart_head['package_detail']);
							echo "</pre>";*/
							
							foreach($rate_chart_head['package_detail'] as $rate_chart_detail){?>
								<tr>
									<td><?php $k++;?></td>
									<td>
										<a href="javascript:;" onclick="window.location.href='<?php echo base_url()?>services/onlineregistration/<?php echo $rate_chart_detail['card_id'];?>/<?php echo $rate_chart_detail['branch_code'];?>'"><span class="label label-success">Buy</span></a>
									</td>
									<td><?php echo $rate_chart_detail['card_name']."(".$rate_chart_detail['card_code'].")"; ?></td>
									<td align="center"><?php echo $rate_chart_detail['card_duration']; ?></td>
									<td align="right"><?php echo $rate_chart_detail['package_rate']; ?></td>
									<td align="right"><?php echo $rate_chart_detail['renewal_rate']; ?></td>
									<td>
										<a href="javascript:;" onclick="window.location.href='<?php echo base_url()?>services/getFacilty/<?php echo $rate_chart_detail['card_id']; ?>/<?php echo $rate_chart_detail['branch_code'];?>'" ><img src="<?php echo base_url();?>application/assets/images/facility.png" /></a>
										
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


<?php 
}
$i++;		
}
}
?>

<!--

<div class="panel-group" id="rateChartAccordion">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title" data-toggle="collapse" data-parent="#rateChartAccordion" href="'+ratechartRefId+'">
			<a><span class="glyphicon glyphicon-chevron-right"></span> Category Name</a>
			
		
		</div>
	</div>
</div>

	
	
	

	
	if(codeprefix.package_detail.length>0){
					var ratechartRefId = "#collapse"+i;
					var ratechartTargetId = "collapse"+i;
					rateHtmlView+='<div class="panel-group" id="rateChartAccordion">';
					rateHtmlView+=' <div class="panel panel-default">';
					rateHtmlView+=' <div class="panel-heading">';
					rateHtmlView+='<h4 class="panel-title" data-toggle="collapse" data-parent="#rateChartAccordion" href="'+ratechartRefId+'">';
					rateHtmlView+='<a ><span class="glyphicon glyphicon-chevron-right"></span> ';
					rateHtmlView+=codeprefix.category_name+'</a>';
					rateHtmlView+='</h4>';
					rateHtmlView+=' </div>';
					rateHtmlView+='<div id="'+ratechartTargetId+'" class="panel-collapse collapse ">';
					/*
					rateHtmlView+='<h3>'+codeprefix.category_name+'</h3>';*/
					
					rateHtmlView+='<div class="table-responsive">';
					
					
					rateHtmlView+='<table class="table table-striped">';
					rateHtmlView+='<thead>';
					rateHtmlView+='<tr>';
					rateHtmlView+='<th>#</th>';
					rateHtmlView+='<th></th>';
					rateHtmlView+='<th>Package</th>';
					rateHtmlView+='<th>Duration</th>';
					rateHtmlView+='<th style="text-align:right;">Admission Amt <br>(w/o Service Tax)</th>';
					rateHtmlView+='<th style="text-align:right;">Renewal Amt <br>(w/o Service Tax)</th>';
					rateHtmlView+='<th>Facility(s)</th>';
					rateHtmlView+='</tr>';
					rateHtmlView+='</thead>';
					rateHtmlView+='<tbody>';
					
					$.each(codeprefix.package_detail,function(x,packageDtl){
						//console.log('<p>'+packageDtl.card_name+'</p>');
						var card_id= packageDtl.card_id;
						var branch_code = packageDtl.branch_code;
						rateHtmlView+='<tr>';
						rateHtmlView+='<td>'+(x+1)+'</td>';
						rateHtmlView+='<td><a href="javascript:void(0);"><span class="label label-success">Buy</span></a></td>';
						rateHtmlView+='<td>'+packageDtl.card_name+' ('+packageDtl.card_code+')'+'</td>';
						rateHtmlView+='<td align="center">'+packageDtl.card_duration+'</td>';
						rateHtmlView+='<td align="right">'+packageDtl.package_rate+'</td>';
						rateHtmlView+='<td align="right">'+packageDtl.renewal_rate+'</td>';
						rateHtmlView+='<td><a href="'+basepath+'services/getFacilty/'+card_id+'/'+branch_code+'"><img src="'+basepath+'application/assets/images/facility.png" /></a></td>';
						
			
						rateHtmlView+='</tr>';
						
						
					});
					rateHtmlView+='</tbody>';
					rateHtmlView+='</table>';
					rateHtmlView+='</div>';
					rateHtmlView+='</div>';
					rateHtmlView+='</div>';
					rateHtmlView+='</div>';
					}
					else{
						rateHtmlView+='';
					}
					
-->				