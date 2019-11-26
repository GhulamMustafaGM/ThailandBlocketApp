
				
				<table class="data display">
					<thead>
						<tr>
							<th>Nr.</th>
							<th>Title</th>
							<th>Operation</th>
						</tr>
					</thead>
					<tbody>
						<?php $count = 1;?>
	<?php foreach($adds AS $add):?>
						<tr class="odd gradeX">
							<td><?php echo $count++; ?></td>
							<td><?php echo $add['add_title'];?></td>
							<td class="center"><?php echo link_to("Approve", "Home/ApproveAdd?id=".$add['id']);?></td>
							
						</tr>
						<?php endforeach; ?>
						
						</tbody>
					</table>
					
					<br /><br /><br />