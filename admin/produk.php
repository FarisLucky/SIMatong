<div class="produk" id="produk">
	<div class="row">
		<div class="col-sm-12">
		<h2>
		    Data Produk
		    <small>Control produk</small>
		</h2>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-sm-12">
		<a href="index.php?halaman=tambahproduk" class="btn btn-success btn-md tambah">Tambah</a>
		</div>
	</div>
	<div class="responsive">
	<table class="table table-bordered table-striped">
		<thead class="bg-primary">
			<th>No</th>
			<th>Nama Produk</th>
			<th>Deskripsi</th>
			<th>Stok</th>
			<th>Berat</th>
			<th>Harga</th>
			<th>Event</th>
			<th>Foto</th>
			<th>Aksi</th>
			</thead>
		<tbody>
			<?php 
				$dataProduk = query("SELECT * FROM tbl_produk INNER JOIN tbl_event ON tbl_produk.id_event = tbl_event.id_event");
			 	$no = "1";	 
			 	foreach ($dataProduk as $produk) {	
			 ?>
			<tr>
				<td><?= $no; ?></td>
				<td><?= $produk["nama_produk"]; ?></td>
				<td width="400px"><?= $produk["deskripsi"]; ?></td>
				<td><?= $produk["stok"]; ?></td> 
				<td><?= $produk["berat"]; ?></td>
				<td><?= $produk["harga"]; ?></td>
				<td width="130px"><?= $produk["nama_event"]; ?></td>
				<td>
					<img src="../foto_produk/<?= $produk["foto"];  ?>" width="100px;">
				</td>
				<td>
					<a href="index.php?halaman=hapusproduk&id=<?= $produk['id_produk']; ?>" class="btn btn-danger btn-xs" id="hapus_produk">Hapus</a>
					<a href="index.php?halaman=ubahproduk&id=<?= $produk['id_produk'];  ?>" class="btn btn-warning btn-xs">Ubah</a>
				</td>
			</tr>
			<?php 
				$no++;
				} ?>
		</tbody>
	</table>
	</div>
</div>