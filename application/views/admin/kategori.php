<?php include "admin_top.php";?>

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item active">Kategori</li>
          </ol>

          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-folder"></i>
              Kategori</div>
            <div class="card-body">
			<?php if($this->session->flashdata('msg')!=NULL){?>
			<div class="alert alert-warning">
				<label> <i class="icon fa fa-exclamation-circle"></i> <?php echo $this->session->flashdata('msg'); ?></label>
			</div>
			<?php } ?>
				<br />
			  <a class="btn btn-primary" href="<?php echo base_url()."admin/tambah_kategori";?>">
				<i class="fas fa-fw fa-plus"></i>
				<span>Tambah Kategori</span>
			  </a>
			  <br /><br />
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Gambar</th>
                      <th>Nama Kategori</th>
                      <th>Deskripsi</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
				  <?php $i = 1; 
				  foreach ($kategori AS $k) { ?>
                    <tr>
                      <td><?php echo $i++;?></td>
                      <td><img src="<?php echo base_url()."assets/images/".$k->foto_kategori;?>" height="100px"></td>
                      <td><?php echo $k->nama_kategori;?></td>
                      <td><?php echo $k->deskripsi_kategori;?></td>
                      <td>
						  <a class="btn btn-warning btn-sm" href="<?php echo base_url()."admin/ubah_kategori/".$k->id_kategori;?>">
							<i class="fas fa-fw fa-edit"></i>
							<span>Ubah</span>
						  </a>
						<br>

						  <a class="btn btn-danger btn-sm" href="<?php echo base_url()."admin/hapus_kategori/".$k->id_kategori;?>">
							<i class="fas fa-fw fa-trash"></i>
							<span>Hapus</span>
						  </a>
					  
					  </td>
                    </tr>
				  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted"></div>
          </div>
          

        </div>
        <!-- /.container-fluid -->

<?php include "admin_bottom.php";?>