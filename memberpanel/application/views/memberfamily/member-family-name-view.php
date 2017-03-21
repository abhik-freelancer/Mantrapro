<select id="membr-family-name" name="membr-family-name" class="searchabledropdown form-control" data-show-subtext="true" data-live-search="true">
<option value="0">Select</option>
<?php foreach($memberFamilyName as $family_name): ?>
<option value="<?php echo $family_name['id'];?>"><?php echo $family_name['familyname'];?></option>
<?php endforeach; ?>
</select>
