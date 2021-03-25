<?php 
	$id = $_GET['id'];
	function formatharga($harga){
		$format = "Rp ".number_format($harga,2,',','.');
		return $format;
	}
	$read = 'readonly';
?>
	<section class="produk-detail mb-5" id="produk-detail">
	<div class="container">
		<div class="row my-2">
			<div class="col-md-12 my-3">
				<h4 class="text-center">---- Produk Detail ----</h4>
			</div>
		</div>
		<div class="row">
					<?php
						$produk = query("SELECT * FROM tbl_produk INNER JOIN tbl_event ON tbl_produk.id_event = tbl_event.id_event WHERE id_produk = '$id'");
						$harga = $produk[0]["harga"];
					?>
				<div class="col-md-4 offset-1">
					<img src="<?= $url ?>foto_produk/<?= $produk[0]["foto"];  ?>" alt="" class="img-thumbnail img-fluid">
				</div>
				<div class="col-md-6">
					<div class="card">
						<div class="card-header text-center">
							<h3 class="card-title"><?= $produk[0]["nama_produk"];  ?></h3>
						</div>
						<div class="card-body">
							<h5 class="formatHarga" data-harga="<?= $harga ?>"><?= formatharga($harga); ?></h5>
								<p>Pemesanan daging ini tersedia pada event <a href="event.php" class="alert-link"><?= $produk[0]["nama_event"]; ?></a></p>
								<div class="col-md-12">
								<form action="" method="post">
								<input type="hidden" name="idproduk" value="<?php echo $id; ?>" <?php echo $read; ?>>
								<table class="table">
									<tr>
										<td width="150px;">Stok tersedia</td>
										<td><?= $produk[0]["stok"]; ?></td>
									</tr>
									<tr>
										<td width="150px;">Berat</td>
										<td><?= $produk[0]["berat"]."&nbspg"; ?></td>
									</tr>
									<tr>
											<div class="form-group">
											<td width=""><label for="jumlah"></label>Jumlah</td>
											<td><input type="number" name="jumlah" min="1" max="<?php echo $produk[0]["stok"]; ?>" class="form-control" id="jumlah_beli" value='1' required></td>
											<td><small class="alert alert-info notif_produk" id="<?= $produk[0]["stok"] ?>">Max Beli&nbsp<?php echo $produk[0]["stok"]; ?></small></td>
											</div>
									</tr>
								</table>
							</div>
							<p></p>
							<hr>
							<button type="submit" class="btn btn-danger col-md-12 pesanan" name="keranjang" id="keranjang_produk" data-id="<?= $id ?>">Masuk Keranjang</button>
						</div>
						</form>
						<?php
							if (isset($_POST["keranjang"])) {
							if (!isset($_SESSION["sudahLogin"])) {
								echo"<script>login();</script>"; 
								echo"<script>location='../akun/login.php';</script>";
								exit;
							}
							else if(isset($_SESSION["sudahLogin"])) {
								$jumlah = $_POST["jumlah"];
								$total = $produk[0]['harga'] * $jumlah;
								$anggota = $_SESSION["id_anggota"];
								$insert = "INSERT INTO keranjang VALUES('','$id','$anggota','$jumlah','$total')";
								$sql = mysqli_query($conn,$insert);
								if (mysqli_affected_rows($conn) > 0) {
									$stok = $produk[0]['stok'] - $jumlah;
									$update = "UPDATE tbl_produk SET stok ='$stok' WHERE id_produk = '$id'";
									$rsUpdate = mysqli_query($conn,$update);
								}
								//echo"<script>location='../produk/produk.php';</script>";
								echo"<script>alert('berhasil');</script>";
								echo"<script>location='../transaksi/keranjang.php';</script>";
							}
							}
							?>
						</div>
					</div>
				</div>
		</div>
			<br>
			<div class="row">
			<div class="col-md-11 offset-1">
				<h5 class="text-left">Deskripsi</h5>
					<p><?= $produk[0]["deskripsi"]; ?></p>
				</div>
			</div>
	</div>
	</section>