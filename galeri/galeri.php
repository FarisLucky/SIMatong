<?php 
	include "../core/koneksi.php";
	$_SESSION['title'] = "Gallery !";
	include	"../header.php";
 ?>
	<div class="gallery">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="text-center p-4"> Image Gallery Design</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<a href="Images/foto1.jpg" data-lightbox="Gallery foto" data-title="Daun Pinus"><img src="Images/1foto.jpg"></a>
					<a href="Images/foto2.jpg" data-lightbox="Gallery foto" data-title="Hutan Tarzan"><img src="Images/2foto.jpg"></a>
					<a href="Images/foto3.jpg" data-lightbox="Gallery foto" data-title="Daun jari"><img src="Images/3foto.jpg"></a>
				</div>
				<div class="clearfix"></div>
				<div class="col-md-12">
					<a href="Images/foto7.jpg" data-lightbox="Gallery foto" data-title="Ranting Salju"><img src="Images/7foto.jpg"></a>
					<a href="Images/foto8.jpg" data-lightbox="Gallery foto" data-title="Ranting Salju"><img src="Images/8foto.jpg"></a>
					<a href="Images/foto10.jpg" data-lightbox="Gallery foto" data-title="Ranting Salju"><img src="Images/10foto.jpg"></a>
				</div>
				<div class="clearfix"></div>
				<div class="col-md-12">
					<a href="Images/foto11.jpg" data-lightbox="Gallery foto" data-title="Ranting Salju"><img src="Images/11foto.jpg"></a>
					<a href="Images/foto4.jpg" data-lightbox="Gallery foto" data-title="Ranting Salju"><img src="Images/4foto.jpg"></a>	
					<a href="Images/foto9.jpg" data-lightbox="Gallery foto" data-title="Ranting Salju"><img src="Images/9foto.jpg"></a>
				</div>
				<div class="clearfix"></div>
				<div class="col-md-12">
					<a href="Images/foto13.jpg" data-lightbox="Gallery foto" data-title="Ranting Salju"><img src="Images/13foto.jpg"></a>
					<a href="Images/foto14.jpg" data-lightbox="Gallery foto" data-title="Ranting Salju"><img src="Images/14foto.jpg"></a>
					<a href="Images/foto15.jpg" data-lightbox="Gallery foto" data-title="Ranting Salju"><img src="Images/15foto.jpg"></a>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<div class="card-footer">
		<small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
	</div>
<?php 
include "../footer.php";
 ?>