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
			<td>	</td>
			<td>	<input name="submit" type="submit" value="Submit" />	</td>
		</tr>
				
	</table>

</form>