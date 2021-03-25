<?php 
	if (isset($_POST["save"])) {
		$nama = mysqli_real_escape_string($conn,$_POST["Nama_event"]);
		$tgl = mysqli_real_escape_string($conn,$_POST["tgl_event"]);

		$update = mysqli_query($conn,"UPDATE tbl_event SET nama_event = '$nama',tgl_event='$tgl' WHERE id_event = '$_GET[id_event]'");
		if ($update == true) {
			echo "<script>alert('Berhasil diubah');</script>";
			echo "<script>window.location.href='index.php?halaman=event'</script>";
		}
		else{
			echo "asdas".mysqli_error($conn);
		}
	}
	elseif (isset($_POST["batal"])) {
		echo "<script>window.location.href='index.php?halaman=event'</script>";
	}
 ?>
<div class="ubahProduk" id="ubahProduk">
	<?php 
		$ambilEvent = query("SELECT * FROM tbl_event  WHERE id_event = '$_GET[id_event]'");
	?>
	<div class="row judul">
		<div class="col-sm-8">
			<h3>Atur event<small> <?= $ambilEvent[0]["nama_event"]  ?></small></h3>
		</div>
		<div class="col-sm-4">
			<a href="index.php?halaman=event" class="btn-sm btn btn-warning kembali">Kembali</a>
		</div>
	</div>
	<hr class="bg-primary">
	<div class="row">
		<div class="col-sm-12">
			<form action="" method="post" class="form" enctype="multipart/form-data">
				<div class="row">
				<div class="form-group-sm col-sm-6">
					<label for="Nama_produk">Nama Event</label>
					<input type="text" class="form-control" name="Nama_event" value="<?= $ambilEvent[0]["nama_event"];  ?>">
				</div>
				<div class="row">
					<div class="form-group-sm col-sm-6">
					<label for="event">Event</label>
					<input type="date" class="form-control" name="tgl_event" value="<?= $ambilEvent[0]["tgl_event"];  ?>">
					</div>
				</div>
				<br>
				</div>
				<br>
				<div class="row">
					<div class="col-md-12">
						<button type="submit" class="btn btn-primary tombol" name="save">Save</button>
						<button type="submit" class="btn btn-warning tombol" name="batal">Batal</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>