<?php 
	include"../core/koneksi.php";
	$_SESSION['title'] = "Keranjang !";
	include'../header.php';
	function formatharga($harga){
		$format = "Rp ".number_format($harga,2,',','.');
		return $format;
	}
	$read ='readonly';
	if (!isset($_SESSION['id_anggota']) || empty($_SESSION['id_anggota'])) {
        echo"<script>alert('Maaf, Anda Harus Login Dulu');</script>";
        echo"<script>location='../akun/login.php';</script>";
	}
	else{
	$sql = "SELECT id_keranjang FROM keranjang WHERE id_anggota = '".$_SESSION['id_anggota']."'";
	$query = mysqli_query($conn,$sql);
	$result = mysqli_num_rows($query);
	if ($result == NULL) {

		echo"<script>alert('Keranjang Kosong');</script>";
		echo"<script>location='../index.php';</script>";
	}
	}
?>
		<section id="keranjang" class="keranjang my-4">
			<div class="container">
				<div class="row">
					<div class="col-md-8 mt-2">
						<div class="card mb-3">
							<div class="card-header">
								<h4>Keranjang Belanja</h4>
							</div>
							<hr>
							<?php
							$no = "1";
							$ambilData = query("SELECT * FROM keranjang INNER JOIN tbl_produk ON keranjang.id_produk = tbl_produk.id_produk INNER JOIN tbl_event
							ON tbl_produk.id_event = tbl_event.id_event WHERE id_anggota = '".$_SESSION['id_anggota']."'");
							?>
							<div class="card-body">
								<div class="row">
									<div class="col-md-12">
										<ul class="card-items">
							<?php
								foreach ($ambilData as $data) {
							?>
											<li class="py-3">
												<div class="row">
													<div class="col-md-3">
														<div class="row">
															<span class="img-item">
																<img src="<?= $url_login ?>foto_produk/<?= $data['foto'] ?>" alt="">
															</span>
														</div>
													</div>
													<div class="col-md-3">
														<div class="row">
															<div class="col-md-12">
																<span><?= $data['nama_produk'] ?></span>
															</div>
															<div class="col-md-12">
																<span> Rp <?= number_format($data['harga'],2,',','.') ?></span>
															</div>
															<div class="col-md-12">
																<span><?= $data['nama_event'] ?></span>
															</div>
														</div>
													</div>
													<div class="col-md-5 py-3">
														<div class="row">
															<div class="col-md-5">
																<div class="row tombol">
																	<div class="col-md-6">
																		<input type="number" class="form-control form-control-sm form-control-range" value="<?php echo $data['jumlah']; ?>" min="1" max="" <?php echo $read; ?>>
																	</div>
																	<div class="col-md-6">
																		<button type="submit" class="btn btn-sm btn-kuning btn_modalClass" name="btn_modalName" id="<?php echo $data['id_anggota']; ?>" value="<?php echo $data['id_produk'] ?>">Ubah</button>
																	</div>
																</div>
															</div>
															<div class="col-md-5 pt-2">
																<span class="text-tengah">Rp <?= number_format($data['total_pembelian'],2,',','.') ?></span>
															</div>
															<div class="col-md-1 pt-2">
																<a href="hapusproduk.php?idkeranjang=<?php echo $data['id_keranjang'];?>&id_produk=<?php echo $data['id_produk'] ?>&jumlah=<?php echo $data['jumlah'] ?>" id="hapus_keranjang" data-keranjang="<?php echo $data['id_keranjang'];?>" data-produk="<?php echo $data['id_produk'] ?>" data-jumlah="<?php echo $data['jumlah'] ?>"><i class="fa fa-trash "></i></a>
															</div>
														</div>
													</div>
													<div class="clear"></div>
												</div>
											</li>
											<hr>
								<?php
									}
								?>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="row previous">
							<div class="col-md-12">
								<a href="<?php echo $url_login; ?>produk/produk.php"><i class="fa fa-chevron-circle-left"></i>&nbsp;Belanja Lagi</a>
							</div>
						</div>
					</div>

					<!-- DAta Sebelah Right -->
					
					<div class="col-md-4 mt-2" id="value">
						<div class="card">
							<div class="card-header">
								<div class="row">
									<div class="container">
										<div class="row">
											<div class="col-md-12">
												<span class="jumlah">Jumlah Produk</span>
												<!-- Ambil data Count -->
										<?php
											$count = "SELECT SUM(jumlah) AS jumlah FROM keranjang WHERE id_anggota = '".$_SESSION['id_anggota']."'";
											$queryCount = mysqli_query($conn,$count);
											$fetchCount = mysqli_fetch_assoc($queryCount);
										?>
												<span class="jumlah float-right"><?= $fetchCount['jumlah'] ?></span>
											</div>
										</div>
										<hr>
										<div class="row">
											<div class="col-md-12">
												<span class="jumlah">Total Pembelian</span>
												<!-- Ambil data SUM -->
										<?php
											$count = "SELECT SUM(total_pembelian) AS total FROM keranjang WHERE id_anggota = '".$_SESSION['id_anggota']."'";
											$queryCount = mysqli_query($conn,$count);
											$fetchCount = mysqli_fetch_assoc($queryCount);
										?>
												<span class="jumlah float-right">Rp <?= number_format($fetchCount['total'],2,',','.') ?></span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-md-12 text-center">
										<a href="<?php echo $url_login; ?>transaksi/prosescheckout.php" class="btn btn-kuning col-md-12">Checkout</a>
									</div>
								</div>
							</div>						
						</div>
						<br>
						<div class="card">
							<div class="card-header">
								<div class="row">
									<div class="container">
										<div class="row">
											<div class="col-md-12">
												<span class="text-mading"><i class="fa fa-check-square"></i>&nbsp;Produk Daging Segar dan sehat sudah terjamin</span>
											</div>
											<hr>
											<div class="col-md-12">
												<span class="text-mading"><i class="fa fa-car"></i>&nbsp;Pengiriman Cepat tanpa Lambat</span>
											</div>
											<hr>
											<div class="col-md-12">
												<span class="text-mading"><i class="fa fa-hand-lizard-o"></i>&nbsp;Harga Murah dan Kualitas Mewah</span>
											</div>
										</div>
										<hr>
									</div>
								</div>
							</div>					
						</div>
					</div>
				</div>
			</div>
<br>
<div class="row">
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
		<a href="<?= $url_login ?>artikel/detail.php?id_artikel=<?php echo $artikel['id_artikel']?>" class="" style="color: 	black; text-decoration: none;">
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
<!-- Modal Beraksi -->


		<?php
			if (isset($_POST["simpan_qtt"])) {
				$qtt = intval($_POST['input_jumlahName']);
				$csm = mysqli_real_escape_string($conn,$_POST['id_anggotaCart']);
				$pdc = mysqli_real_escape_string($conn,$_POST['id_produkCart']);
				$getHarga = query("SELECT harga FROM tbl_produk WHERE id_produk = '$pdc'");
				$sumTotal= $getHarga[0]["harga"] * $qtt;
				$update = "UPDATE keranjang SET jumlah = '$qtt',total_pembelian = '$sumTotal' WHERE id_produk='$pdc' AND id_anggota = '$csm'";
				$queryUpdate = mysqli_query($conn,$update);
				if ($queryUpdate == true) {
					echo"<script>alert('Berhasil diubah');</script>";
					echo"<script>window.location='';</script>";
				}
			}
		?>
		<div class="modal fade" id="modal_jumlah">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title"><i class="fa fa-2x fa-edit"></i>&nbsp;Update Jumlah</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body body_jumlah">
						<!-- Body_modal Keranjang -->
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-sm btn-default" id="save_keranjang" data-dismiss="modal">Batal</button>
					</div>
				</div>
			</div>
		</div>	
		</section>

	<?php 
		include'../footer.php';
	?>	