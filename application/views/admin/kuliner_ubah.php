<?php include "admin_top.php";?>

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item active">Lokasi Kuliner</li>
            <li class="breadcrumb-item active">Ubah</li>
          </ol>

          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-plus-square"></i>
              Ubah Lokasi Kategori</div>
            <div class="card-body">
			<?php if($this->session->flashdata('msg')!=NULL){?>
			<div class="alert alert-warning">
				<label> <i class="icon fa fa-exclamation-circle"></i> <?php echo $this->session->flashdata('msg'); ?></label>
			</div>
			<?php } ?>
				<br />
			<form action="<?php echo base_url()."admin/proses_ubah_kuliner";?>" method="post" enctype="multipart/form-data">
			<input type="hidden" value="<?php echo $kuliner->id_kuliner?>" name="id_kuliner">
			  <div class="form-group row">
				<label for="nama" class="col-sm-2 col-form-label">Nama Lokasi Kuliner</label>
				<div class="col-sm-3">
				  <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $kuliner->nama_kuliner;?>">
				</div>
			  </div>
			  <div class="form-group row">
				<label for="nama" class="col-sm-2 col-form-label">Kategori Kuliner</label>
				<div class="col-sm-3">
				  <select class="form-control" id="kategori" name="kategori">
				  <?php foreach ($kategori AS $k) { ?>
					<option value="<?php echo $k->id_kategori;?>"><?php echo $k->nama_kategori;?></option>
				  <?php } ?>
				  </select>
				</div>
			  </div>
			  <div class="form-group row">
				<label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi Tempat Kuliner</label>
				<div class="col-sm-5">
				  <textarea class="form-control" id="deskripsi" name="deskripsi"><?php echo $kuliner->deskripsi_kuliner;?></textarea>
				</div>
			  </div>
			  <div class="form-group row">
				<label for="menu" class="col-sm-2 col-form-label">Menu Andalan</label>
				<div class="col-sm-3">
				  <input type="text" class="form-control" id="menu" name="menu" value="<?php echo $kuliner->menu_andalan;?>">
				</div>
			  </div>
			  <div class="form-group row">
				<label for="kisaran" class="col-sm-2 col-form-label">Kisaran Harga</label>
				<div class="col-sm-3">
				  <input type="text" class="form-control" id="kisaran" name="kisaran" value="<?php echo $kuliner->kisaran_harga;?>">
				</div>
			  </div>
			  <div class="form-group row">
				<label for="foto" class="col-sm-2 col-form-label">Gambar Kuliner</label>
				<div class="col-sm-3">
				  <img src="<?php echo base_url()."assets/images/".$kuliner->foto_kuliner;?>" height="150px">
				</div>
			  </div>
			  <div class="form-group row">
				<label for="foto" class="col-sm-2 col-form-label"></label>
				<div class="col-sm-3">
				  <input type="file" class="form-control-file" id="foto" name="foto">
				</div>
			  </div>
			  <div class="form-group row">
				<label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-5">
				  <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $kuliner->alamat;?>">
				</div>
			  </div>
			  <div class="form-group row">
				<label for="alamat" class="col-sm-2 col-form-label">Peta</label>
				<div class="col-sm-10">
					<p>Klik pada Peta untuk menandai lokasi.</p>
					<input type="text" name="current_location" id="pac-input" size="100"/> 
					<div id="map"></div>
				</div>
			  </div>
	<style>
      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

	</style>
    <script>
						  var map;
						  var markerL = false;
						  
						  function initMap() {
							map = new google.maps.Map(document.getElementById('map'), {
							  center: {lat: <?php echo $kuliner->lat_kuliner;?>, lng: <?php echo $kuliner->lng_kuliner;?>},
							  zoom: 13
							});
						  
							// Create the search box and link it to the UI element.
							var input = document.getElementById('pac-input');
							var searchBox = new google.maps.places.SearchBox(input);
							map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
							
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
							
							var markerL=new google.maps.Marker({
							  position: new google.maps.LatLng(<?php echo $kuliner->lat_kuliner.",".$kuliner->lng_kuliner;?>),
							  map: map,
							  draggable:true
							});
							
							//Listen for drag events!
							google.maps.event.addListener(markerL, 'dragend', function(event){
								markerLocation();
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
										map: map,
										draggable:true
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
			  <div class="form-group row">
				<label for="lat" class="col-sm-2 col-form-label">Latitude</label>
				<div class="col-sm-3">
				  <input type="text" class="form-control" id="lat" name="lat" value="<?php echo $kuliner->lat_kuliner;?>">
				</div>
			  </div>
			  <div class="form-group row">
				<label for="long" class="col-sm-2 col-form-label">Longitude</label>
				<div class="col-sm-3">
				  <input type="text" class="form-control" id="lng" name="lng" value="<?php echo $kuliner->lng_kuliner;?>">
				</div>
			  </div>
            <div class="form-group row">
				<label for="inputFile" class="col-sm-2 col-form-label"></label>
				<div class="col-sm-3">
					<input type="submit" class="btn btn-primary btn-block" value="Simpan" />
				</div>
            </div>
			</form>
            </div>
            <div class="card-footer small text-muted"></div>
          </div>
          

        </div>
        <!-- /.container-fluid -->

<?php include "admin_bottom.php";?>