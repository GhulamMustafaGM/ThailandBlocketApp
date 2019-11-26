

<form action="Edit" method="POST" >
<input type="hidden" name="id" value="<?php echo $id; ?>">
	<table>
	
		<tr>
			<td>	Title:	</td>
			<td>	<input name="title" type="text" value="<?php echo $category_group[0]['name']?>" />	</td>
		</tr>
		
		<tr>
			<td>	</td>
			<td>	<input name="submit" type="submit" value="Submit" />	</td>
		</tr>
				
	</table>

</form>