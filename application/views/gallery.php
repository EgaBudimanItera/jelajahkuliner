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
				<?php foreach($kategori AS $k) { ?>
					<div class="4u">
						<div class="boxgallery">
							<div class="incbox3">
							<a href="<?php echo base_url()."kulinerkategori?kategori=".$k->id_kategori;?>"><font size="5"><?php echo $k->nama_kategori;?></font></a>
							</div>
							<img src="<?php echo base_url()."assets/images/".$k->foto_kategori;?>" width="100%">
							<div class="incbox2">
								<p><?php echo $k->deskripsi_kategori;?></p>
							</div>
						</div>
					</div>
				<?php } ?>
				</div>
			
			
			</div>
			<!-- /Main Content -->
			
		</div>
	<!-- /Main -->
	<?php include "include/copyright.php";?>

	</body>
</html>