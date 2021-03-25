<?php 
	if (isset($_POST["save"])) {
		$nama_event = mysqli_real_escape_string($conn,$_POST["nama_event"]);
		$tgl_event = mysqli_real_escape_string($conn,$_POST["tanggal_event"]);

		$insertEvent = mysqli_query($conn,"INSERT INTO tbl_event VALUES('','$nama_event','$tgl_event')");
		if (mysqli_affected_rows($conn) > 0) {
			echo "<script>alert('Event ditambahkan !')</script>";
			echo "<script>location='index.php?halaman=event'</script>";
		}
		else {
			mysqli_error($conn);
		}
	}
 ?>

<div class="tambahProduk" id="tambahProduk">
	<div class="row">
		<div class="col-sm-12">
			<h3>Tambah Event</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 text-right">
			<a href="index.php?halaman=event" class="btn-sm btn btn-warning kembali">Kembali</a>
		</div>
	</div>
	<hr class="bg-success">
	<div class="row">
		<div class="col-sm-12">
			<form action="" method="post" class="form">
				<div class="row">
				<div class="form-group-sm col-sm-6">
					<label for="Nama_produk">Nama Event</label>
					<input type="text" class="form-control" name="nama_event" required="">
				</div>
				<div class="form-group-sm col-sm-6">
					<label for="berat">Tanggal Event</label>
					<input type="date" class="form-control " name="tanggal_event" required>
				</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-12">
						<button type="submit" class="btn btn-success tombol" name="save">Simpan</button>&nbsp;&nbsp;
						<button type="submit" class="btn btn-warning tombol" name="batal">Batal</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>