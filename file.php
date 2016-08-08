<?php
require "config.php";

	$search = isset($_POST['search']);
	$data = glob('*');
	$text = "";

	if($search) {
		$text = $_POST['search'];
	}

	$dataFix = preg_grep("~".preg_quote($text, "~")."~", $data);
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
				
				<div class="col-md-6">
					<a href="phpmyadmin" target="_blank">
						<img src="<?php echo $dir; ?>/bg/phpmyadmin.png" width="100">
					</a>
				</div>
				<div class="col-md-6">
					<form method="POST" action="">
						<input class="col-md-9" name="search" type="text" value="<?php echo $text; ?>" placeholder="masukan kata yang akan dicari.." autocomplete="off"/>
						<input class="pull-right col-md-3 btn btn-primary" type="submit" value="Cari" />
					</form>
				</div>
			</div>
		</div>		

		<br>
		<div class="row">
			<div style="width: 90%;background: rgba(255,255,255,0.3); padding: 20px 20px 0px 20px;margin: 0px auto !important;">
			
			<?php foreach ($dataFix as $folder) : ?>
				<?php if ($folder != 'index.php' && $folder != 'localhost' && $folder != 'bg' && $folder != 'bower_components' && $folder != 'phpmyadmin') : ?>
					<?php 
					$staFolder = stat($folder);
					$style = '';
					$icon = 'glyphicon-folder-open';
					if(!is_dir($folder)) {
						$style = 'style="color: red;"';
						$icon = 'glyphicon-file';
					}
					?>
					
					<div class="col-md-4 folder" style="height: 100px;">
						<a class="font-folder" href="<?php echo $folder; ?>" target="_blank" <?php echo $style; ?>>
							<div class="col-md-3">
								<i class="glyphicon <?php echo $icon; ?>" style="font-size: 50px;"></i>
							</div>
							
							<div class="col-md-6">
								<b style="font-size: 14px;">
									<?php echo $folder; ?>
								</b>
								<br />
								<span style="font-size: 12px;">
									<?php echo date('d M Y H:i:s',$staFolder['mtime']); ?>
								</span>
							</div>
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
				      "<?php echo $dir; ?>/bg/4.jpg",
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