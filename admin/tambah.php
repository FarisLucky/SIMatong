<?php 
	if (isset($_POST["save"])) {
		if (tambahProduk($_POST,$_FILES["upload_foto"]) > 0) {
			echo "<script>alert('Berhasil gan');</script>";
			echo "<script>location='index.php?halaman=produk'</script>";
		}
		else{

		}
	}
 ?>

<div class="tambahProduk" id="tambahProduk">
	<div class="row">
		<div class="col-md-12">
			<h3>Tambah Produk</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 text-right">
			<a href="index.php?halaman=produk" class="float-right btn-sm btn btn-warning">Kembali</a>
		</div>
	</div>
	<hr class="bg-success">
	<div class="row">
		<div class="col-sm-12">
			<form action="" method="post" class="form" enctype="multipart/form-data">
				<div class="row">
				<div class="form-group-sm col-sm-6">
					<label for="Nama_produk">Nama Produk</label>
					<input type="text" class="form-control" name="Nama_produk" required="">
				</div>
				<div class="form-group-sm col-sm-6">
					<label for="berat">Berat(Gr)</label>
					<input type="number" class="form-control " name="berat" required="">
				</div>
				</div>
				<br>
				<div class="row">
				<div class="form-group-sm col-sm-6">
					<label for="deskripsi">Deskripsi</label>
					<textarea class="form-control" id="deskripsi" name="deskripsi" required=""></textarea>
				</div>
				<div class="form-group-sm col-sm-6">
					<label for="harga">Harga</label>
					<input type="number" class="form-control" name="harga" id="harga" required="">
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
						?>
						<option value="<?= $event["id_event"];  ?>"> <?= $event["nama_event"];  ?></option>
						<?php 
							}
						 ?>
					</select>
					</div>
				<div class="form-group-sm col-sm-6">
					<label for="stok">Stok</label>
					<input type="number" class="form-control" name="stok" id="stok" required="">
				</div>
				</div>
				<br>
				<div class="row">
					<div class="form-group col-sm-6">	
							<label for="upload_foto" class="custom-file-label">Upload Foto</label>
							<input type="file" class="custom-file-input" id="upload_foto" name="upload_foto">
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