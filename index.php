<?php
require "config.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<title>List Website Applications</title>
	</head>
	<link rel="stylesheet" type="text/css" href="<?php echo $dir; ?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<style type="text/css">
	.row {
		margin: 0px !important;
	}
	a:hover {
		text-decoration: none;
	}
	.font-folder {
		font-size: 20px;
		color: #FFF;
		text-shadow: 0px 2px 2px #000;
	}
	.font-folder:hover {
		color: #DDD;
	}
	.font-folder:active {
		color: #FFF !important;
	}
	.folder {
		padding-bottom: 20px;
	}
	</style>

	<body style="">

		<div class="row">

			<div class="col-md-12">
				<h2 style="color: #FFF;">#Work <?php echo $_SERVER['SERVER_SOFTWARE']; ?></h2>
			</div>

		</div>

		<div class="row">
			<div class="col-md-12">
				<a href="phpmyadmin" target="_blank">
					<img src="<?php echo $dir; ?>/bg/phpmyadmin.png" width="100">
				</a>
				<br>
				<br>
			</div>
		</div>		

		<div class="row">
			<div style="width: 90%;background: rgba(255,255,255,0.3); padding: 20px 20px 0px 20px;margin: 0px auto !important;">
			<?php foreach (glob('*') as $folder) : ?>
				<?php if ($folder != 'index.php' && $folder != 'bower.json' && $folder != 'phpmyadmin' && $folder != 'bg' && $folder != 'bower_components' && $folder != 'arc' && $folder != 'bootstrap-3.3.5' && $folder != 'phpmyadmin.png') : ?>
				<div class="col-md-4 folder">
					<a class="font-folder" href="<?php echo $folder; ?>" target="_blank">
						<?php if (!is_dir($folder)) : ?>
						<?php $style = 'style="color: red;"'; ?>
							<i class="glyphicon glyphicon-file" <?php echo $style; ?>></i> 
						<?php else : ?>
						<?php $style = ''; ?>
							<i class="glyphicon glyphicon-folder-open" <?php echo $style; ?>></i> 
						<?php endif; ?>
							&nbsp;
							<span <?php echo $style; ?>>
								<?php echo $folder; ?>
							</span>
					</a>
				</div>
				<?php endif; ?>
			<?php endforeach; ?>
			<div style="clear: both;"> &nbsp; </div>
			</div>

		</div>

		<script type="text/javascript" src="<?php echo $dir; ?>/bower_components/jquery/dist/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo $dir; ?>/bower_components/jquery-backstretch/jquery.backstretch.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('body').backstretch([
				      "<?php echo $dir; ?>/bg/1.jpg",
				      "<?php echo $dir; ?>/bg/2.jpg",
				  	], 
				  	{
				  		duration: 3000, 
				  		fade: 750
				  	}
				);
			});
		</script>

	</body>
</html>