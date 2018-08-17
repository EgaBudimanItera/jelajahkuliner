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
			<?php if($this->session->flashdata('msg')!=NULL){?>
			<blockquote>
				<label> <i class="icon fa fa-exclamation-circle"></i> <?php echo $this->session->flashdata('msg'); ?></label>
			</blockquote>
			<?php } ?>
					<p>Klik pada peta lokasi Anda saat ini:</p>
						<form action = "<?php echo base_url()."kulinerpencarian";?>" method="get">
							  <input type="hidden" class="form-control" id="lat" name="lat">
							  <input type="hidden" class="form-control" id="lng" name="lng">
							  <input type="text" name="current_location" id="pac-input" size="100"/> 
							  <input type="submit" value="Cari lokasi terdekat" />
						</form><br /><br />
						<div id="mapPencarian"></div>
						<script>
						
						
						
						  var map;
						  var markerL = false;
						  
						  function initMap() {
							map = new google.maps.Map(document.getElementById('mapPencarian'), {
							  center: {lat: -5.4104608, lng: 105.2801762},
							  zoom: 13
							});
							var image = '<?php echo base_url();?>assets/images/mapmarker.png';
							
							<?php
							
							foreach ($kuliner AS $k) { ?>
							var marker=new google.maps.Marker({
							  position: new google.maps.LatLng(<?php echo $k->lat_kuliner.",".$k->lng_kuliner;?>),
							  map: map,
							  icon: image
							});
						  <?php } ?>
						  
							// Create the search box and link it to the UI element.
							var input = document.getElementById('pac-input');
							var searchBox = new google.maps.places.SearchBox(input);
							
							// Bias the SearchBox results towards current map's viewport.
							map.addListener('bounds_changed', function() {
							  searchBox.setBounds(map.getBounds());
							});

							var markers = [];
							// Listen for the event fired when the user selects a prediction and retrieve
							// more details for that place.
							searchBox.addListener('places_changed', function() {
							  var places = searchBox.getPlaces();

							  if (places.length == 0) {
								return;
							  }

							  // Clear out the old markers.
							  markers.forEach(function(marker) {
								marker.setMap(null);
							  });
							  markers = [];

							  // For each place, get the icon, name and location.
							  var bounds = new google.maps.LatLngBounds();
							  places.forEach(function(place) {
								if (!place.geometry) {
								  console.log("Returned place contains no geometry");
								  return;
								}
								var icon = {
								  url: place.icon,
								  size: new google.maps.Size(71, 71),
								  origin: new google.maps.Point(0, 0),
								  anchor: new google.maps.Point(17, 34),
								  scaledSize: new google.maps.Size(25, 25)
								};

								// Create a marker for each place.
								markers.push(new google.maps.Marker({
								  map: map,
								  icon: icon,
								  title: place.name,
								  position: place.geometry.location
								}));

								if (place.geometry.viewport) {
								  // Only geocodes have viewport.
								  bounds.union(place.geometry.viewport);
								} else {
								  bounds.extend(place.geometry.location);
								}
							  });
							  map.fitBounds(bounds);
							});
							
							//Listen for any clicks on the map.
							google.maps.event.addListener(map, 'click', function(event) {                
								//Get the location that the user clicked.
								var clickedLocation = event.latLng;
								//If the marker hasn't been added.
								if(markerL === false){
									//Create the marker.
									markerL = new google.maps.Marker({
										position: clickedLocation,
										map: map
									});
									//Listen for drag events!
									google.maps.event.addListener(markerL, 'dragend', function(event){
										markerLocation();
									});
								} else{
									//Marker has already been added, so just change its location.
									markerL.setPosition(clickedLocation);
								}
								//Get the marker's location.
								markerLocation();
							});
						
								
							//This function will get the marker's current location and then add the lat/long
							//values to our textfields so that we can save the location.
							function markerLocation(){
								//Get location.
								var currentLocation = markerL.getPosition();
								//Add lat and lng values to a field that we can save.
								document.getElementById('lat').value = currentLocation.lat(); //latitude
								document.getElementById('lng').value = currentLocation.lng(); //longitude
							}
						  
						  }
						  
						</script>
						<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDq2VSWoG2bynT0PIGkz2vhNdJ_7cL1vVA&callback=initMap&libraries=places"
						async defer></script>
					</div>
				</div>
			</div>
			<!-- /Main Content -->
			
		</div>
	<!-- /Main -->
	<?php include "include/copyright.php";?>

	</body>
</html>