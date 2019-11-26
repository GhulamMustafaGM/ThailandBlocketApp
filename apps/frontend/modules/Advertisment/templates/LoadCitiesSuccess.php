<select name="city">				
	<?php foreach($cities AS $city):?>
  		<option value="<?php echo $city['id']; ?>"><?php echo $city['name']; ?></option>	
  	<?php endforeach; ?>		  
</select>