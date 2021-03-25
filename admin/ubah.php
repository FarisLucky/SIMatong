<?php 
	if (isset($_POST["save"])) {
		if (perbaruiProduk($_POST,$_FILES["upload_foto"]) == true) {
			echo "<script>alert('Data Sudah diubah')</script>";
			// echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
			echo "<script>window.location.href='index.php?halaman=produk'</script>";
		}
	}
 ?>
<div class="ubahProduk" id="ubahProduk">
	<?php 
		$ambilProduk = query("SELECT * FROM tbl_produk INNER JOIN tbl_event ON tbl_produk.id_event = tbl_event.id_event WHERE id_produk = '$_GET[id]'");
	?>
	<div class="row judul">
		<div class="col-md-12">
			<h3>Atur produk<small><?= $ambilProduk[0]["nama_produk"]  ?></small></h3>
		</div>
	</div>
	<div class="row judul">
		<div class="col-md-12 text-right">
			<a href="index.php?halaman=produk" class="btn-sm btn btn-warning kembali">Kembali</a>
		</div>
	</div>
	<hr class="bg-primary">
	<div class="row">
		<div class="col-sm-12">
			<form action="" method="post" class="form_ubahProduk" enctype="multipart/form-data">
				<div class="row">
				<div class="form-group-sm col-sm-6">
					<label for="Nama_produk">Nama Produk</label>
					<input type="text" class="form-control" name="Nama_produk" value="<?= $ambilProduk[0]["nama_produk"];  ?>">
				</div>
				<div class="form-group-sm col-sm-6">
					<label for="berat">Berat(Gr)</label>
					<input type="number" class="form-control " name="berat" value="<?= $ambilProduk[0]["berat"];  ?>">
				</div>
				</div>
				<br>
				<div class="row">
				<div class="form-group-sm col-sm-6">
					<label for="deskripsi">Deskripsi</label>
					<textarea class="form-control" id="deskripsi" name="deskripsi"><?= $ambilProduk[0]["deskripsi"];  ?></textarea>
				</div>
				<div class="form-group-sm col-sm-6">
					<label for="harga">Harga</label>
					<input type="number" class="form-control" name="harga" id="harga" value="<?= $ambilProduk[0]["harga"] ?>">
				</div>
				</div>
				<br>
				<div class="row">
					<div class="form-group-sm col-sm-6">
					<label for="event">Event</label>
					<select class="form-control" id="event" name="event">
						<?php 
							$events = query("SELECT * FROM tbl_event");
							foreach ($events as $event) {
								if ($event["id_event"] == $ambilProduk[0]["id_event"]) {
									$select= "selected";
								}
								else{
									$select = "";
								}
						?>
						<option value="<?= $event["id_event"];  ?>" <?= $select;  ?>> <?= $event["nama_event"];  ?></option>
						<?php 
							}
						?>
					</select>
					</div>
				<div class="form-group-sm col-sm-6">
					<label for="stok">Stok</label>
					<input type="number" class="form-control" name="stok" id="stok" value="<?= $ambilProduk[0]["stok"] ?>">
				</div>
				</div>
				<br>
				<div class="row">
					<div class="form-group col-sm-6">	
						<label for="upload_foto" class="custom-file-label">Upload Foto</label>
						<input type="file" class="custom-file-input" id="upload_foto" name="upload_foto">
					</div>
					<div class="form-group col-sm-6">
						<img src="../foto_produk/<?= $ambilProduk[0]["foto"]; ?>" class="img" id="img">
						<label for="img">Foto Produk</label>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-12 p-5">
						<button type="submit" class="btn btn-primary btn-sm tombol" name="save" id="simpan_ubahPD">Save</button>
						<a href="index.php?halaman=event" class="btn-sm btn btn-warning kembali">Batal</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>