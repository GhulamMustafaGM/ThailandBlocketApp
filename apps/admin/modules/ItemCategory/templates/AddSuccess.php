<?php if($status_flag): ?>
	Record created successfully.
<?php endif; ?>

<form action="Add" method="POST" >

	<table>
	
		<tr>
			<td>	Title:	</td>
			<td>	<input name="title" type="text" />	</td>
		</tr>
		
		<tr>
			<td>	Associated Form:	</td>
			<td>	<input name="associated_form" type="text" />	</td>
		</tr>
		
		<tr>
			<td>	Parent Category:	</td>
			<td>	
					<select name="category_group">				
						<?php foreach($category_groups AS $group):?>
					  		<option value="<?php echo $group['id']; ?>"><?php echo $group['name']; ?></option>	
					  	<?php endforeach; ?>		  
					</select>
			</td>
		</tr>
		
		<tr>
			<td>	</td>
			<td>	<input name="submit" type="submit" value="Submit" />	</td>
		</tr>
				
	</table>

</form>