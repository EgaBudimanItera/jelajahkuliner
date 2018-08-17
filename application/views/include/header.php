	<!-- Header -->
		<div id="header">
			<div id="logo-wrapper">
				<div class="container">
						
					<!-- Logo -->
						<div id="logo">
							<h1><a href="#">JELAJAH KULINER</a></h1>
							<span>Design by TEMPLATED</span>
						</div>
					
				</div>
			</div>			
			<div class="container">
				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li <?php if ($link == "home") echo 'class="active"';?>><a href="<?php echo base_url()."";?>">Homepage</a></li>
							<li <?php if ($link == "gallery") echo 'class="active"';?>><a href="<?php echo base_url()."gallery";?>">Gallery</a></li>
							<li <?php if ($link == "pencarian") echo 'class="active"';?>><a href="<?php echo base_url()."pencarian";?>">Pencarian</a></li>
							<li <?php if ($link == "profil") echo 'class="active"';?>><a href="<?php echo base_url()."profil";?>">Profil</a></li>
						</ul>
					</nav>
			</div>
		</div>
	<!-- Header -->