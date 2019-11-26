<br /><br />

	<h2>Cities</h2>
		<ul>
			<?php foreach($cities AS $city):?>
			<li><a href="<?php echo url_for("Advertisment/ListAdvertisments?id=".$city['id']);?>"><?php echo $city['name'];?>&nbsp;&nbsp; (<?php echo $city['Advertisement'][0]['COUNT'];?>)</a></li>
			<?php endforeach; ?>
		</ul>

