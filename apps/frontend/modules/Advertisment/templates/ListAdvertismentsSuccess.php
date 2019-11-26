<pre>
	<?php // print_r($adds); ?>
</pre>



<h2>Advertisments</h2>
<table>
	<?php $count = 1; ?>
	<?php foreach($adds AS $add): ?>
	
	<tr>
		<td width="50px;"><span style=" color: black"><?php echo $count++; ?></span></td>
		<td>
		</td>
		
		<td></td>
	</tr>
	<tr>
		<td width="50px;"></span></td>
		<td>
			<table>
				<tr>
					<td width="150"><?php echo image_tag('/'. 'uploads' .'/'.$add['AdvertismentImage'][0]['image_path'], 'size=100x100' );  ?></td>
					<td>
						<span style=" color: green"><a href="<?php echo url_for('Advertisment/AddvertismentDetails?id='.$add['id']);?>"><?php echo $add['add_title'];?></a></span><br/>
						<span> <?php echo $add['price'];?> </span>
					</td>
				<tr/>
			</table>
		<td></td>
	</tr>
	<?php endforeach; ?>
</table>