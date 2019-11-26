<h2>Advertisment Details  
	<a href="http://www.facebook.com/share.php?u=<url>" onclick="return fbs_click()" target="_blank"><img src="<?php echo image_path('facebook-share-icon.gif'); ?>" alt="Share on Facebook" /></a>
	<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
	<a href="http://twitter.com/share" class="twitter-share-button">Tweet</a>
	</h2>
<table>
	<?php $count = 1; ?>
	<?php $add = $add_details[0]; ?>
	<tr>
		<td width="50px;"><span style=" color: black"><?php echo $count++; ?></span></td>
		<td><span style="font-weight: bold; color: black"><?php echo $add['add_title'];?></span></td>
		
		<td></td>
	</tr>
	<tr>
		<td width="50px;"></span></td>
		<td>
			<table>
				<tr>
					<td><span style=" color: green">Posted By:</span></td>
					<td><?php echo $add['user_name'];?></td>
				</tr>
				<tr>
					<td><span style=" color: green">Contact Phone:</span></td>
					<td><?php echo $add['contact_phone'];?></td>
				</tr>
				<tr>
					<td><span style=" color: green">Heading:</span></td>
					<td><?php echo $add['add_title'];?></td>
				</tr>
				<tr>
					<td><span style=" color: green">Price:</span></td>
					<td><?php echo $add['price'];?></td>
				</tr>
				<tr>
					<td><span style=" color: green">Posted By:</span></td>
					<td><?php echo $add['description'];?></td>
				</tr>
				
				<tr>
					<td colspan="2" valign="middle"><span style=" color: black; font-weight: bold; ">Other Details</span></td>
					
				</tr>
				<?php foreach($add['AdvertismentDetails'] AS $details): ?>
					<tr>
					<td><span style=" color: green"><?php echo $details['key_name']?>:</span></td>
					<td><?php echo $details['key_value']?></td>
				</tr>
				<?php endforeach; ?>
				
			</table>
			
			
			


<div id="jquery-image-zoom-example">
			
			<table>
				<tr>
				
				<?php foreach( $add['AdvertismentImage'] AS $image ): ?>
					<td>
						<a href="<?php echo image_path('/'. 'uploads' .'/'.$image['image_path'], 'size=500x500' );?>">
	    					<?php echo image_tag('/'. 'uploads' .'/'.$image['image_path'], 'size=100x100' );  ?>
	    				</a>
					</td>
				<?php endforeach; ?>	
				</tr>
			</table>
</div>
		
		
		
	</tr>
	
</table>
<script language="javascript">
jQuery(document.body).imageZoom();


function fbs_click() 
	{
		u=location.href;
		t=document.title;
		window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=626,height=436');
		return false;
	}
	
</script>
