<script language="javascript">
	function LoadCarModels()
	{
		if($("#car_brand").val() != -1)
		{
			$("#car_model_div").load("<?php echo url_for('Advertisment/LoadCarModels'); ?>?brand_name=" + $("#car_brand").val());
		}
	}
</script>

<input type="hidden" name="item_category" value="CARS">
<table>
	<tr>
		<td>Registeration year:</td>
		<td><input type="text" name="registeration_year"/></td>
	</tr>
	<tr>
		<td>Brand:</td>
		<td>
			<select name="extra_fields[Brand]" onchange="LoadCarModels()" id="car_brand">
				<option value="-1"> -- Select Brand -- </option>
				<?php foreach($data['car_brand'] AS $model):?>
			  		<option value="<?php echo $model['name']; ?>"><?php echo $model['name']; ?></option>	
			  	<?php endforeach; ?>		  
			</select>
		</td>
	</tr>
	
	<tr>
		<td>Model:</td>
		<td>
			<div id="car_model_div">
				<select name="extra_fields[Model]" id="car_model" disabled="disabled">
					<option value="-1"> -- Select Model -- </option>					  
				</select>
			</div>
		</td>
	</tr>
	<tr>
		<td>Power:</td>
		<td>
			<select name="extra_fields[Power]">
				<option value="-1"> -- Select Power -- </option>
				<?php foreach($data['power'] AS $power):?>
			  		<option value="<?php echo $power['name']; ?>"><?php echo $power['name']; ?></option>	
			  	<?php endforeach; ?>		  
			</select>
		</td>
	</tr>
	<tr>
		<td>Milage:</td>
		<td>
			<select name="extra_fields[Milage]">
				<option value="-1"> -- Select Milage -- </option>
				<?php foreach($data['milage'] AS $milage):?>
			  		<option value="<?php echo $milage['name']; ?>"><?php echo $milage['name']; ?></option>	
			  	<?php endforeach; ?>		  
			</select>
		</td>
	</tr>
</table>