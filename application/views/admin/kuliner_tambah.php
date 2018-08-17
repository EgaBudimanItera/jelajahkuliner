<?php include "admin_top.php";?>

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item active">Lokasi Kuliner</li>
            <li class="breadcrumb-item active">Tambah</li>
          </ol>

          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-plus-square"></i>
              Tambah Lokasi Kategori</div>
            <div class="card-body">
			<?php if($this->session->flashdata('msg')!=NULL){?>
			<div class="alert alert-warning">
				<label> <i class="icon fa fa-exclamation-circle"></i> <?php echo $this->session->flashdata('msg'); ?></label>
			</div>
			<?php } ?>
				<br />
			<form action="<?php echo base_url()."admin/proses_tambah_kuliner";?>" method="post" enctype="multipart/form-data">
			  <div class="form-group row">
				<label for="nama" class="col-sm-2 col-form-label">Nama Lokasi Kuliner</label>
				<div class="col-sm-3">
				  <input type="text" class="form-control" id="nama" name="nama">
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
				  <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
				</div>
			  </div>
			  <div class="form-group row">
				<label for="menu" class="col-sm-2 col-form-label">Menu Andalan</label>
				<div class="col-sm-3">
				  <input type="text" class="form-control" id="menu" name="menu">
				</div>
			  </div>
			  <div class="form-group row">
				<label for="kisaran" class="col-sm-2 col-form-label">Kisaran Harga</label>
				<div class="col-sm-3">
				  <input type="text" class="form-control" id="kisaran" name="kisaran">
				</div>
			  </div>
			  <div class="form-group row">
				<label for="foto" class="col-sm-2 col-form-label">Gambar Kuliner</label>
				<div class="col-sm-3">
				  <input type="file" class="form-control-file" id="foto" name="foto">
				</div>
			  </div>
			  <div class="form-group row">
				<label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-5">
				  <input type="text" class="form-control" id="alamat" name="alamat">
				</div>
			  </div>
			  <div class="form-group row">
				<label for="alamat" class="col-sm-2 col-form-label">Peta</label>
				<div class="col-sm-10">
					<p>Klik pada Peta untuk menandai lokasi.</p>
					<div id="map"></div>
				</div>
			  </div>

    <script>
		//Set up some of our variables.
		var map; //Will contain map object.
		var marker = false; ////Has the user plotted their location marker? 
				
		//Function called to initialize / create the map.
		//This is called when the page has loaded.
		function initMap() {
		 
			//The center location of our map.
			var centerOfMap = new google.maps.LatLng(-5.4104608, 105.2801762);
		 
			//Map options.
			var options = {
			  center: centerOfMap, //Set center.
			  zoom: 13 //The zoom value.
			};
		 
			//Create the map object.
			map = new google.maps.Map(document.getElementById('map'), options);
		 
			//Listen for any clicks on the map.
			google.maps.event.addListener(map, 'click', function(event) {                
				//Get the location that the user clicked.
				var clickedLocation = event.latLng;
				//If the marker hasn't been added.
				if(marker === false){
					//Create the marker.
					marker = new google.maps.Marker({
						position: clickedLocation,
						map: map,
						draggable: true //make it draggable
					});
					//Listen for drag events!
					google.maps.event.addListener(marker, 'dragend', function(event){
						markerLocation();
					});
				} else{
					//Marker has already been added, so just change its location.
					marker.setPosition(clickedLocation);
				}
				//Get the marker's location.
				markerLocation();
			});
		}
				
		//This function will get the marker's current location and then add the lat/long
		//values to our textfields so that we can save the location.
		function markerLocation(){
			//Get location.
			var currentLocation = marker.getPosition();
			//Add lat and lng values to a field that we can save.
			document.getElementById('lat').value = currentLocation.lat(); //latitude
			document.getElementById('lng').value = currentLocation.lng(); //longitude
		}
				
				
		//Load the map when the page has finished loading.
		google.maps.event.addDomListener(window, 'load', initMap);
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDq2VSWoG2bynT0PIGkz2vhNdJ_7cL1vVA&callback=initMap"
    async defer></script>
			  <div class="form-group row">
				<label for="lat" class="col-sm-2 col-form-label">Latitude</label>
				<div class="col-sm-3">
				  <input type="text" class="form-control" id="lat" name="lat">
				</div>
			  </div>
			  <div class="form-group row">
				<label for="long" class="col-sm-2 col-form-label">Longitude</label>
				<div class="col-sm-3">
				  <input type="text" class="form-control" id="lng" name="lng">
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