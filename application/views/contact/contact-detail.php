<?php $add = str_replace(",", "", str_replace(" ", "+", $contactDesc['address'])); ?>

<p class="c-branch-name"><?php echo $contactDesc['brnach'];?></p>
<p class="c-branch-add"><?php echo $contactDesc['address'];?></p>
<p class="c-branch-phone"><?php echo $contactDesc['phone_no'];?></p>
<div class="branch_map" style="width:100%;border:2px solid #E4E4E4;">
	<iframe width="100%" height="320px" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=<?php echo $add;?>&aq=0&ie=UTF8&hq=&hnear=<?php echo $add;?>&t=m&ll=,&z=12&iwloc=&output=embed"></iframe>
</div>
