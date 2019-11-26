
	

<h2>Brand - (<a href="Add"> Add </a>) </h2>
				
				<table class="data display">
					<thead>
						<tr>
							<th>Nr.</th>
							<th>Name</th>
							<th>Operation</th>
						</tr>
					</thead>
					<tbody>
						<?php $count = 1;?>
						<?php foreach($category_groups AS $category): ?>
						<tr class="odd gradeX">
							<td><?php echo $count++; ?></td>
							<td><?php echo $category['name']; ?></td>
							
							<td class="center"><a href="Edit?id=<?php echo $category['id']; ?>">Edit</a> | <a href="#">Delete</a></td>
						</tr>
						<?php endforeach; ?>
						
						</tbody>
					</table>
					
					<br /><br /><br />