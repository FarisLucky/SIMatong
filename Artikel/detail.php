<?php 
include"../core/koneksi.php";
$_SESSION["title"] = "Detail Artikel !";
include "../header.php";
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Detail Artikel</title>
</head>
<body>
	<?php 
	$id = $_GET['id_artikel'];
	$result = mysqli_query($conn, "select * from tbl_artikel where id_artikel = $id");
	foreach ($result as $artikel) {
	 ?>
<div class="row">
	<div class="container">
		<h4 class="text-center font-artikel pt-5"><?php echo $artikel['Judul_artikel'] ?></h4><br>
		<div class="container-fluid">
			<img src="<?php echo $url_login ."view/img/artikel/". $artikel['foto'] ?>" width="100%" height="350">
			<div class="">
				<p><?php echo $artikel['deskripsi'] ?></p>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<?php } ?>
	<div class="container font-artikel">
		<div style="width: 100%; height: 20px; border-bottom: 1px solid black; text-align: center">
		<span style="font-size: 20px; background-color: #F3F5F6; padding: 0 10px;">
		Lihat Artikel Lain
		</span>
		</div>
	</div>
</div>
<br>
<div class="container">
	<div class="row">
	<?php
		$ambilArtikel = query("SELECT * FROM tbl_artikel order by id_artikel desc");
		foreach ($ambilArtikel as $artikel) {
	?>
		<!-- <div class="col-md-2">
		</div> -->
		<div class="col-md-3">
		<a href="detail.php?id_artikel=<?php echo $artikel['id_artikel']?>" class="" style="color: 	black; text-decoration: none;">
			<img src="<?php echo $url_login ."view/img/artikel/". $artikel['foto'] ?>"  height="150px" alt="responsive image">
			<div class="card-title font-weight-bold">
				<?php echo $artikel['Judul_artikel'] ?><br>
					<small><span class="fa fa-user"></span>by : Admin</small>
			</div>
			<div class="card-body">
				<small><?php echo substr($artikel['deskripsi'],0,50) ?>...</small>
			</div>
		</a>
		</div>
		<!-- <div class="col-md-2">	
		</div> -->
	<?php } ?>
</div>
</div>
</body>
</html>
<?php 
include "../footer.php";
 ?>