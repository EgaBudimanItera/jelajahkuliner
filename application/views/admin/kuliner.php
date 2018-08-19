<?php include "admin_top.php";?>

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item active">Lokasi Kuliner</li>
          </ol>

          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-list-ul"></i>
              Lokasi Kuliner</div>
            <div class="card-body">
			<?php if($this->session->flashdata('msg')!=NULL){?>
			<div class="alert alert-warning">
				<label> <i class="icon fa fa-exclamation-circle"></i> <?php echo $this->session->flashdata('msg'); ?></label>
			</div>
			<?php } ?>
				<br />
			  <a class="btn btn-primary" href="<?php echo base_url()."admin/tambah_kuliner";?>">
				<i class="fas fa-fw fa-plus"></i>
				<span>Tambah Lokasi Kuliner</span>
			  </a>
			  <br /><br />
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Tempat</th>
                      <th>Kategori</th>
                      <th>Menu Andalan</th>
                      <th>Kisaran Harga</th>
                      <th>Isi</th>
                      <th>Alamat</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
				  <?php $i = 1; 
				  foreach ($kuliner AS $k) { ?>
                    <tr>
                      <td><?php echo $i++;?></td>
                      <td><?php echo $k->nama_kuliner;?></td>
                      <td><?php echo $k->nama_kategori;?></td>
                      <td><?php echo $k->menu_andalan;?></td>
                      <td><?php echo $k->kisaran_harga;?></td>
                      <td><?php echo $k->deskripsi_kuliner;?></td>
                      <td><?php echo $k->alamat;?></td>
                      <td>
						  <a class="btn btn-warning btn-sm" href="<?php echo base_url()."admin/ubah_kuliner/".$k->id_kuliner;?>">
							<i class="fas fa-fw fa-edit"></i>
							<span>Ubah</span>
						  </a>
						  <br />
						  <a class="btn btn-danger btn-sm" href="<?php echo base_url()."admin/hapus_kuliner/".$k->id_kuliner;?>">
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