<?php include "admin_top.php";?>

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item active">Kategori</li>
            <li class="breadcrumb-item active">Ubah</li>
          </ol>

          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-plus-square"></i>
              Ubah Kategori</div>
            <div class="card-body">
			<?php if($this->session->flashdata('msg')!=NULL){?>
			<div class="alert alert-warning">
				<label> <i class="icon fa fa-exclamation-circle"></i> <?php echo $this->session->flashdata('msg'); ?></label>
			</div>
			<?php } ?>
				<br />
			<form action="<?php echo base_url()."admin/proses_ubah_kategori";?>" method="post" enctype="multipart/form-data">
			  <input type="hidden" value="<?php echo $kategori->id_kategori?>" name="id_kategori">
			  <div class="form-group row">
				<label for="nama" class="col-sm-2 col-form-label">Nama Kategori</label>
				<div class="col-sm-3">
				  <input type="text" class="form-control" id="nama" value="<?php echo $kategori->nama_kategori?>" name="nama">
				</div>
			  </div>
			  <div class="form-group row">
				<label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi Kategori</label>
				<div class="col-sm-5">
				  <textarea class="form-control" id="deskripsi" name="deskripsi"><?php echo $kategori->deskripsi_kategori?></textarea>
				</div>
			  </div>
			  <div class="form-group row">
				<label for="foto" class="col-sm-2 col-form-label">Gambar Kategori Awal</label>
				<div class="col-sm-3">
				  <img src="<?php echo base_url()?>assets/images/<?php echo $kategori->foto_kategori?>" height="150" width="300"> 
				</div>
			  </div>
			  <div class="form-group row">
				<label for="foto" class="col-sm-2 col-form-label">Gambar Kategori Ubah</label>
				<div class="col-sm-6">
				  <input type="file" class="form-control-file" id="foto" name="foto"> 
				  <input type="hidden" class="form-control" id="gambarlama" value="<?php echo $kategori->foto_kategori?>" name="gambarlama">
				</div>
			  </div>
            <div class="form-group row">
				<label for="inputFile" class="col-sm-2 col-form-label"></label>
				<div class="col-sm-3">
					<input type="submit" class="btn btn-primary btn-block" value="Simpan" />
					
				</div>
				<div class="col-sm-3">
					<input type="reset" class="btn btn-danger btn-block" value="Reset" />
				</div>
            </div>
			</form>
            </div>
            <div class="card-footer small text-muted"></div>
          </div>
          

        </div>
        <!-- /.container-fluid -->

<?php include "admin_bottom.php";?>