<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <?php use_stylesheet('reset') ?>
    <?php use_stylesheet('text') ?>
    <?php use_stylesheet('form') ?>
    <?php use_stylesheet('buttons') ?>
    <?php use_stylesheet('grid') ?>
    <?php use_stylesheet('layout') ?>
    <?php use_stylesheet('jquery-ui-1.8.12.custom') ?>
    <?php use_stylesheet('jquery.visualize') ?>
    <?php use_stylesheet('facebox') ?>
    <?php use_stylesheet('uniform.default') ?>
    <?php use_stylesheet('dataTables') ?>
    <?php use_stylesheet('custom') ?>
    
    <?php use_javascript('jquery-1.5.2.min.js') ?>
    <?php use_javascript('jquery-ui-1.8.12.custom.min.js') ?>
    <?php use_javascript('excanvas.min.js') ?>
    <?php use_javascript('facebox.js') ?>
    <?php use_javascript('jquery.visualize.js') ?>
    <?php use_javascript('jquery.dataTables.min.js') ?>
    <?php use_javascript('jquery.tablesorter.min.js') ?>
    <?php use_javascript('jquery.uniform.min.js') ?>
    <?php use_javascript('jquery.placeholder.min.js') ?>
    <?php use_javascript('widgets.js') ?>
    <?php use_javascript('dashboard.js') ?>
    
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
    

<div id="wrapper">
	
	<div id="top">
		
		<div class="content_pad">			
			<ul class="right">
				<li><a href="" class="top_icon"><span class="ui-icon ui-icon-person"></span>Logged in as John Doe</a></li>
				<li><a href="" class="new_messages top_alert">1 New Message</a></li>
				<li><a href="./settings.html">Settings</a></li>
				<li><a href="../index.html">Logout</a></li>
			</ul>
		</div> <!-- .content_pad -->
		
	</div> <!-- #top -->	
	
	<div id="header">
		
		<div class="content_pad">
			<h1><a href="../dashboard.html">Dashboard Admin</a></h1>
			
			<ul id="nav">
				<li class="nav_icon"><a href="<?php echo url_for("Home/Index");?>"><span class="ui-icon ui-icon-home"></span>Home</a></li>

				<li class="nav_dropdown nav_current nav_icon">
					<a href="#"><span class="ui-icon ui-icon-gripsmall-diagonal-se"></span>Manage Records</a>
					
					<div class="nav_menu">			
						<ul>
							
							<li><a href="<?php echo url_for("City/List");?>">Cities</a></li>	
							<li><a href="<?php echo url_for("CategoryGroup/List");?>">Groups</a></li>	
							<li><a href="<?php echo url_for("ItemCategory/List");?>">Category</a></li>	
							<li><a href="<?php echo url_for("Power/List");?>">Power</a></li>	
							<li><a href="<?php echo url_for("Milage/List");?>">Milage</a></li>	
							<li><a href="<?php echo url_for("CarBrand/List");?>">Brand</a></li>	
											
						</ul>
						
					</div>
				</li>
				
	
			
			</ul>
		</div> <!-- .content_pad -->
		
	</div> <!-- #header -->	
	
	<div id="masthead">
		
		<div class="content_pad">
			
			<h1 class="">Table Styles</h1>
			
			<div id="bread_crumbs">
				<a href="../dashboard.html">Home</a> / 
				<a href="" class="current_page">Table Styles</a>				
			 </div> <!-- #bread_crumbs -->
			
			<div id="search">
				<form action="http://madebyamp.com/search" method="get" />
					<input type="text" value="" placeholder="Search" name="search" id="search_input" title="Search" />					
					<input type="submit" value="" name="submit" class="submit" />					
				</form>
			</div> <!-- #search -->
			
		</div> <!-- .content_pad -->
		
	</div> <!-- #masthead -->	
	
	<div id="content" class="xgrid">
		
		<div class="x12">
			
			<?php echo $sf_content ?>
			
			
					
		
			
		</div> <!-- .x12 -->
		
	</div> <!-- #content -->
	
	<div id="footer">		
		<div class="content_pad">			
			<p>&copy; 2010-11 Copyright <a href="http://madebyamp.com/">MadeByAmp</a>. Powered by <a href="../index.html">Dashboard Admin</a>.</p>
		</div> <!-- .content_pad -->
	</div> <!-- #footer -->		
	
</div> <!-- #wrapper -->



<script>
	
$(document).ready ( function () 
{
	Dashboard.init ();
});

</script>

</body> 
 
</html>