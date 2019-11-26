	
	
	<select name="extra_fields[Model]" id="car_model">
					<option value="-1"> -- Select Model -- </option>	
					<?php foreach($car_models AS $model):?>
						<option value="<?php echo $model['name']; ?>"> <?php echo $model['name']; ?> </option>						
					<?php endforeach; ?>		
	</select>
	