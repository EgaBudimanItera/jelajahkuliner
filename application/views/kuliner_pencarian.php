<!DOCTYPE HTML>
<!--
	Colorized by TEMPLATED
    templated.co @templatedco
    Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<?php include "include/head.php";?>
	<body class="homepage">

	<?php include "include/header.php";?>
		
	<?php include "include/banner.php";?>

	<!-- Main -->
		<div id="main">
			
			<!-- Main Content -->
			<div class="container">
				<div class="row">
				<div class="12u">
						<form action = "<?php echo base_url()."pencarian";?>" method="get">
							  <input type="hidden" name="lat" value="<?php echo $lat;?>" />
							  <input type="hidden" name="lng" value="<?php echo $lng;?>" />
							  <input type="submit" value="Kembali" />
						</form><br /><br />
				</div>
				<?php foreach($kuliner AS $k) { ?>
					<div class="12u">
						<div class="incbox3">
						<font size="5"><?php echo $k->nama_kuliner;?></font><br />
						</div>
						<div class="row">
							<div class="3u">
							<img src="<?php echo base_url()."assets/images/".$k->foto_kuliner;?>" height="150px">
							</div>
							<div class="9u">
								<p><strong><font size="3" color="green">Menu andalan: <?php echo $k->menu_andalan;?></font></strong></p>
								<p>Jarak dari lokasi Anda input: <?php echo ($this->distance->haversineFormula($k->lat_kuliner, $k->lng_kuliner, $lat, $lng)/1000);?> KM</p>
								<p><?php echo $k->deskripsi_kuliner;?></p>
								<form action = "<?php echo base_url()."kuliner";?>" method="get">
									  <input type="hidden" name="id" value="<?php echo $k->id_kuliner;?>" />
									  <input type="hidden" name="lat" value="<?php echo $lat;?>" />
									  <input type="hidden" name="lng" value="<?php echo $lng;?>" />
									  <input type="submit" value="Lihat Detail" />
								</form><br /><br />
							</div>
						</div>
					<hr />
					</div>
				<?php } ?>
				</div>
			
			
			</div>
			<!-- /Main Content -->
			
		</div>
	<!-- /Main -->
	<?php include "include/copyright.php";?>

	</body>
</html>