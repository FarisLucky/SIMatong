<!DOCTYPE html>
<html>
<head>
	<title>insert artikel</title>
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
</head>
<body>
	<?php 
		if (isset($_POST['addart'])) {
			$judul = $_POST['Judul_artikel'];
			$desk = $_POST['deskripsi'];
			$nama = $_FILES['uploud']['name'];
			$dir = '../view/img/artikel/'.$nama;
			$namat = $_FILES['uploud']['tmp_name'];
			$ekstensi_boleh = array('jpg','png');
			$ekstensi = pathinfo($nama, PATHINFO_EXTENSION);

			if (in_array($ekstensi, $ekstensi_boleh)) {
				move_uploaded_file($namat, $dir);
				$query = mysqli_query($conn, "INSERT INTO tbl_artikel(id_artikel,Judul_artikel,deskripsi,foto) VALUES(NULL, '$judul', '$desk', '$nama')");
				if ($query) {
					echo "<div class='alert alert-success'>
  							<strong>BERHASIL!</strong> Menambahkan Artikel.
						  </div>";
				}
				else{
					echo "<div class='alert alert-danger'>
  							<strong>GAGAL!</strong> Menambahkan Artikel.
						  </div>";
				}
			}
			else{
				echo "<div class='alert alert-danger'>
  							Ekstensi gambar salah!!!
						  </div>";
			}
		}
	?>
	<form method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label>Judul Artikel</label>
			<input class="form-control" type="text" name="Judul_artikel" placeholder="Judul Artikel">
			<br><label>Foto Artikel</label>
			<input type="file" name="uploud">	
			<br><label>Deskripsi</label>
			<textarea name="deskripsi" id="deskripsi"></textarea>
			<script type="text/javascript">CKEDITOR.replace('deskripsi');</script><br>
		</div>
		<div class="row">
			<div class="col-md-6">
				<button type="submit" name="addart" class="form-control btn btn-success">Tambah</button>
			</div>
			<div class="col-md-6">
				<button type="reset" class="form-control btn btn-danger">Batal</button>
			</div>	
		</div>
	</form>
</body>
</html>