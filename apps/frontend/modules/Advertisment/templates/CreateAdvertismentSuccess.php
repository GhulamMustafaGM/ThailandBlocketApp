<?php use_helper("ccCustom"); ?>

<script language="javascript" >

	

	function AddUploadfield()
	{
		$html_str = "<input type='file' name='advertisment_image[]' size='30'>";
		$('#upload_div').append($html_str);
	}

	function LoadAjaxForm()
	{
		if($("#category").val() != -1)
		{
			$("#ajax_form").load("<?php echo url_for('Advertisment/LoadAjaxForm'); ?>?id=" + $("#category").val());
		}
	}
	
	
	
	function LoadCities()
	{
		if($("#region").val() != -1)
		{
			$("#cities_div").load("<?php echo url_for('Advertisment/LoadCities'); ?>?id=" + $("#region").val());
		}
	}

	
</script>


<form action="CreateAdvertisment" method="POST" enctype="multipart/form-data">

<h1>Post Advertisment</h1>
<?php if($status_flag): ?>
	<h3> <span style="color: green;"> Add created successfully, create another! </span> </h3>
<?php endif; ?>
<br />
<br />
<table>
	<tr>
		<td><span style="color: black">Name: </span></td>
		<td><input type="text" name="user_name" > </td>
		
	</tr>
	<tr>
		<td><span style="color: black">Email:</span></td>
		<td><input type="text" name="user_email" ></td>
		
	</tr>
	<tr>
		<td><span style="color: black">Contact Phone:</span></td>
		<td><input type="text" name="contact_phone" ></td>
		
	</tr>
	<tr>
		<td><span style="color: black">Headline:</span></td>
		<td><input type="text" name="add_title" ></td>
		
	</tr>
	<tr>
		<td><span style="color: black">Region:</span></td>
		<td>
			<select id="region" name="region" onclick="LoadCities()">
					<option value="-1"> -- Select Region -- </option>	
				<?php foreach($regions AS $region):?>
			  		<option value="<?php echo $region['id']; ?>"><?php echo $region['name']; ?></option>	
			  	<?php endforeach; ?>		  
			</select>
		</td>
		
	</tr>
	<tr>
		<td><span style="color: black">City:</span></td>
		<td>
			<div id="cities_div">
				<select name="city" id="city" disabled="disabled">
						<option value="-1"> -- Select City -- </option>					  
				</select>	
			</div>
			
		</td>
		
	</tr>
	
	<tr>
		<td><span style="color: black">Category:</span></td>
		<td>
			<select name="item_category_id" id="category" onchange='LoadAjaxForm()'>
				<option value="-1"> -- Select Category -- </option>	
				<?php foreach($category_group AS $grup):?>
					<optgroup label="<?php echo $grup['name']; ?>">
					<?php foreach($grup['ItemCategory'] AS $item_category):?>
			  		<option value="<?php echo $item_category['id']; ?>"><?php echo $item_category['name']; ?></option>	
			  		<?php endforeach; ?>
			  		</optgroup>		  
			  	<?php endforeach; ?>		  
			</select>
		</td>
		
	</tr>
	
	<tr>
		<td><span style="color: black">Price:</span></td>
		<td><input type="text" name="price" ></td>
		
	</tr>	
		
	<tr>
		<td><span style="color: black">Text:</span></td>
		<td><textarea name="description"  rows="5" cols="20">  </textarea> </td>
	</tr>	
	
</table>

<div id="ajax_form" >
	Ajax form will load here
</div>

<table>
<tr>
		<td>Images:</td>
		<td>
			
				<input type="file" name="advertisment_image[]" size="30"> 
				<div id="upload_div">
				</div>
			
		</td>
		<tr><td><input type="button" name="add_more" value="Add More" onclick="AddUploadfield()" ></input></td></tr>
		
</tr>
	
		

</table>

<table>
<tr>
		<td><input type="submit" value="submit"/></td>
		<td></td>
</tr>
	
		

</table>

</form>
