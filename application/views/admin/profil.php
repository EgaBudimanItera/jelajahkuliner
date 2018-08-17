<?php include "admin_top.php";?>

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Profil</li>
          </ol>

          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-user"></i>
              Profil</div>
            <div class="card-body">
			<?php if($this->session->flashdata('msg')!=NULL){?>
			<div class="alert alert-warning">
				<label> <i class="icon fa fa-exclamation-circle"></i> <?php echo $this->session->flashdata('msg'); ?></label>
			</div>
			<?php } ?>
				<br />
			<form action="<?php echo base_url()."admin/proses_simpan_profil";?>" method="post" enctype="multipart/form-data">
			  <div class="form-group row">
				<label for="foto" class="col-sm-2 col-form-label">Foto Profil</label>
				<div class="col-sm-3">
				 <img src="<?php echo base_url()."assets/images/".$profil->foto;?>" height="150px">
				</div>
			  </div>
			  <div class="form-group row">
				<label for="foto" class="col-sm-2 col-form-label"></label>
				<div class="col-sm-3">
				  <input type="file" class="form-control-file" id="foto" name="foto">
				</div>
			  </div>
			  <div class="form-group row">
				<label for="profil" class="col-sm-2 col-form-label">Profil</label>
				<div class="col-sm-5">
				  <textarea class="form-control" id="profil" name="profil" rows="20"><?php echo $profil->profil;?></textarea>
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