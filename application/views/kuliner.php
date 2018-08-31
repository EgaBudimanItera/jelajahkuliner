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
						<div class="incbox3">
						<font size="5"><?php echo $k->nama_kuliner;?></font><br />
						</div>
						<div class="row">
							<?php
							   if(!empty($k->foto_kuliner)){

							?>
							<div class="8u">
							<img src="<?php echo base_url()."assets/images/".$k->foto_kuliner;?>" width="400px">
							</div>
							<?php
							   }
							?>
							<?php
							   if(!empty($k->foto_kuliner2)){

							?>
							<div class="8u">
							<img src="<?php echo base_url()."assets/images/".$k->foto_kuliner2;?>" width="400px">
							</div>
							<?php
							   }
							?>
							<?php
							   if(!empty($k->foto_kuliner3)){

							?>

							<div class="8u">
							<img src="<?php echo base_url()."assets/images/".$k->foto_kuliner3;?>" width="400px">
							</div>
							<?php
							   }
							?>
							<?php
							   if(!empty($k->foto_kuliner4)){

							?>
							<div class="8u">
							<img src="<?php echo base_url()."assets/images/".$k->foto_kuliner4;?>" width="400px">
							</div>
							<?php
							   }
							?>
							<div class="8u">
								<p><strong><font size="3" color="green">Menu andalan: <?php echo $k->menu_andalan;?></font></strong></p>
								<?php 
									if (!empty($k->lat_kuliner) AND !empty($k->lng_kuliner) AND !empty($lat) AND !empty($lng)) {
								?>
								<p>Jarak dari lokasi Anda input: <?php echo ($this->distance->haversineFormula($k->lat_kuliner, $k->lng_kuliner, $lat, $lng)/1000);?> KM</p>
									<?php } ?>
								<p>Deskripsi: <?php echo $k->deskripsi_kuliner;?></p>
								<p>Kisaran harga: <?php echo $k->kisaran_harga;?></p>
								<p>Alamat: <?php echo $k->alamat;?></p>
							</div>
						</div>
						<?php 
							if (!empty($k->lat_kuliner) AND !empty($k->lng_kuliner) AND !empty($lat) AND !empty($lng)) {
						?>
						<div class="row">
							<div class="12u"><br /><br /><p>Rute dari lokasi Anda:</p>
						<div id="mapPencarian"></div>
						<script>
						  var map;
						  
						  function initMap() {
							var directionsService = new google.maps.DirectionsService;
							var directionsDisplay = new google.maps.DirectionsRenderer;

							map = new google.maps.Map(document.getElementById('mapPencarian'), {});
							directionsDisplay.setMap(map);
							calculateAndDisplayRoute(directionsService, directionsDisplay);

							  function calculateAndDisplayRoute(directionsService, directionsDisplay) {
								directionsService.route({
								  origin: new google.maps.LatLng(<?php echo $lat.",".$lng;?>),
								  destination: new google.maps.LatLng(<?php echo $k->lat_kuliner.",".$k->lng_kuliner;?>),
								  travelMode: 'DRIVING'
								}, function(response, status) {
								  if (status === 'OK') {
									directionsDisplay.setDirections(response);
								  } else {
									window.alert('Directions request failed due to ' + status);
								  }
								});
						  }
						  }
						</script>
						<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDq2VSWoG2bynT0PIGkz2vhNdJ_7cL1vVA&callback=initMap&libraries=places"
						async defer></script>
							</div>
						</div>
							<?php } ?>
					<hr />
					</div>
				</div>
			
			
			</div>
			<!-- /Main Content -->
			
		</div>
	<!-- /Main -->
	<?php include "include/copyright.php";?>

	</body>
</html>