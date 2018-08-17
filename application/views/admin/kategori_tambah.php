<?php include "admin_top.php";?>

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item active">Kategori</li>
            <li class="breadcrumb-item active">Tambah</li>
          </ol>

          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-plus-square"></i>
              Tambah Kategori</div>
            <div class="card-body">
			<?php if($this->session->flashdata('msg')!=NULL){?>
			<div class="alert alert-warning">
				<label> <i class="icon fa fa-exclamation-circle"></i> <?php echo $this->session->flashdata('msg'); ?></label>
			</div>
			<?php } ?>
				<br />
			<form action="<?php echo base_url()."admin/proses_tambah_kategori";?>" method="post" enctype="multipart/form-data">
			  <div class="form-group row">
				<label for="nama" class="col-sm-2 col-form-label">Nama Kategori</label>
				<div class="col-sm-3">
				  <input type="text" class="form-control" id="nama" name="nama">
				</div>
			  </div>
			  <div class="form-group row">
				<label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi Kategori</label>
				<div class="col-sm-5">
				  <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
				</div>
			  </div>
			  <div class="form-group row">
				<label for="foto" class="col-sm-2 col-form-label">Gambar Kategori</label>
				<div class="col-sm-3">
				  <input type="file" class="form-control-file" id="foto" name="foto">
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