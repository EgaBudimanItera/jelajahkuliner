<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Login</title>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url();?>assets/sbadmin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url();?>assets/sbadmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url();?>assets/sbadmin/css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
			<?php if($this->session->flashdata('msg')!=NULL){?>
			<div class="alert alert-warning">
				<label> <i class="icon fa fa-exclamation-circle"></i> <?php echo $this->session->flashdata('msg'); ?></label>
			</div>
			<?php } ?>
        <div class="card-body">
          <form action="<?php echo base_url()."admin/processlogin";?>" method="post">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputUsername" class="form-control" placeholder="Username" required="required" autofocus="autofocus" name="username">
                <label for="inputUsername">Username</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="required" name="password">
                <label for="inputPassword">Password</label>
              </div>
            </div>
            <input type="submit" class="btn btn-primary btn-block" value="Login" />
          </form>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url();?>assets/sbadmin/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url();?>assets/sbadmin/vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
