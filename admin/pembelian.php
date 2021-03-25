<?php
	$no = "1";	
	$dataPembelian = query("SELECT tp.id_pembelian AS id_beli,ta.nama_lengkap,tp.tgl_pembelian,tp.total_pembelian,aa.alamat_lengkap,tp.status_pembelian FROM tbl_pembelian tp INNER JOIN tbl_anggota ta ON tp.id_anggota = ta.id_anggota INNER JOIN alamat_anggota aa ON aa.id_alamat = tp.id_alamat");
?>
<div class="anggota" id="anggota">
<h2 class="m-4">
    Data pembelian
    <small>Control Pembelian</small>
</h2>
<br>
<div class="row">
	<div class="col-md-6">
	<div class="form-group">
		<div class="row">
			<div class="col-md-6" style="padding-right:10px;">
				<span>cari berdasarkan status</span>
				<select name="select_status" id="status_select" class="form-control-sm form-control">
					<option value="">Status Pembelian</option>
					<option value="Pending">Pending</option>
					<option value="Perlu konfirmasi">Perlu Konfirmasi</option>
					<option value="Selesai">Selesai</option>
				</select>
			</div>
			<div class="col-md-6" style="padding:0px;">
				<button class="btn btn-sm btn-primary cari" id="search_status" style="margin-top:23px;margin-left:0px;">cari</button>
			</div>
		</div>
	</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<div class="row">
				<div class="col-md-8 offset-2">
				<span>cari berdasarkan nama</span>
					<input type="text" class="form-control form-control-sm" id="search_admin" placeholder="cari langsung berdasarkan Nama">
				</div>
			</div>
		</div>
	</div>
</div>
<div class="content_beli">
<table class="table table-bordered table-hover">
	<thead class="bg-primary">
		<th>No</th>
		<th>Nama Pemesan</th>
		<th>Tanggal</th>
		<th>Total Pembelian</th>
		<th>Alamat Pengiriman</th>
		<th>Status</th>
		<th>Aksi</th>
		</thead>
	<tbody id="content_pembelian">
		<?php 
			foreach ($dataPembelian as $pembelian) {	 
		?>
		<tr>
			<td><?= $no; ?></td>
			<td><?= $pembelian["nama_lengkap"]; ?></td>
			<td><?= $pembelian["tgl_pembelian"]; ?></td>
			<td><?= $pembelian["total_pembelian"]; ?></td>
			<td><?= $pembelian["alamat_lengkap"]; ?></td>
			<td><?= $pembelian["status_pembelian"]; ?></td>
			<td>
				<a href="<?= $url_login ?>admin/index.php?halaman=detail&id_beli=<?= $pembelian["id_beli"] ?>" class="btn btn-danger btn-sm button_detail" name="detail" id="<?= $pembelian["id_beli"] ?>"><i class="fa fa-list" style="border-radius='50%;'"></i></a>
			</td>
		</tr>
		<?php 
			$no++;
			} ?>
	</tbody>
</table>
</div>

<!-- Modal Detail -->
	<div class="modal fade " id="modal_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title" id="exampleModalLongTitle">Detail Pembelian</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" id="detail_proses">
				
				</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
			</div>
		</div>

</div>