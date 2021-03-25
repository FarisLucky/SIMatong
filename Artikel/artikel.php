<?php 
	include "../core/koneksi.php";
	$_SESSION['title'] = "Artikel !";
	include "../header.php";
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<br>
<!-- <section class="artikel" id="artikel"> -->
	<div class="container">
	<h4 class="text-center py-3">Artikel</h4>
	<?php 

	$ambilArtikel = query("select * from tbl_artikel order by id_artikel desc");
	foreach ($ambilArtikel as $artikel) {
			
	?>
		<div class="row">
			<div class="col-md-3 offset-md-2">
				<img src="<?php echo $url_login ."view/img/artikel/". $artikel['foto'] ?>" class="img-fluid" alt="responsive image">
			</div>
			<div class="card col-md-5">
				<div class="font-artikel artikel card-title h5 font-weight-bold">
					<?php echo $artikel['Judul_artikel'] ?><br>
					<div class="card-by">
						<small><span class="fa fa-user"></span>by : Admin</small>
					</div>
				</div>
				<div class="card-body">
					<small><?php echo substr($artikel['deskripsi'],0,100) ?>...</small>
				</div>
				<a href="detail.php?id_artikel=<?php echo $artikel['id_artikel']?>" class="btn btn-info btn-artikel">Lihat Lengkap Artikel>></a>
			</div>
		</div>
		<br>
	<?php } ?>
	</div>
</body>
</html>
 <?php 
 include'../footer.php';
  ?>