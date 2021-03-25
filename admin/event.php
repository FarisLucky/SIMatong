<div class="event" id="event">
	<div class="row">
		<div class="col-sm-12">
			<h2>
				Data Event
				<small>Control Event</small>
			</h2>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-sm-12">
				<a href="index.php?halaman=tambahevent" class="btn btn-success tambah">Tambah</a>
			</div>
		</div>
		<div class="table-responsive mt-3">
		<table class="table table-bordered tabel-striped">
			<thead class="bg-primary">
				<th>Id Event</th>
				<th>Nama Event</th>
				<th>Tanggal</th>
				<th>Action</th>
			</thead>
				<tbody>
			<?php 
				$dataEvent = query("SELECT * FROM tbl_event");
				// $no = "1";	 
				foreach ($dataEvent as $event) {	
			?>
			<tr>
				<!-- <td><?= $no; ?></td> -->
				<td><?= $event["id_event"]; ?></td>
				<!-- <td width="400px"><?= $event["deskripsi"]; ?></td> -->
				<td><?= $event["nama_event"]; ?></td>
				<td><?= $event["tgl_event"]; ?></td>
				<!-- <td>
					<img src="../foto_event/<?= $event["foto"];  ?>" width="100px;">
				</td> -->
				<td width="200px">
				<div class="col-md-30">
					<a href="index.php?halaman=hapusevent&id_event=<?= $event['id_event']; ?>" class="btn btn-danger btn-xs" id="hapus_event" data-id="<?= $event['id_event']; ?>" data-flash="">Hapus</a>
					<a href="index.php?halaman=ubahevent&id_event=<?= $event['id_event'];  ?>" class="btn btn-warning btn-xs" id="ubah_event" data-flash="">Ubah</a>
				</td>
			</tr>
			<?php 
				} ?>
		</tbody>
	</table>
	</div>
</div>