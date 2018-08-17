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
					<div class="4u">
						<img src="<?php echo base_url()."assets/images/".$profil->foto;?>">
					</div>
					<div class="8u">
						<?php echo $profil->profil;?>
					</div>
				</div>
			
			</div>
			<!-- /Main Content -->
			
		</div>
	<!-- /Main -->
	<?php include "include/copyright.php";?>

	</body>
</html>