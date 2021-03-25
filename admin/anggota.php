<div class="anggota" id="anggota">
<h2 class="m-4">
    Data Anggota
    <small>Control Anggota</small>
</h2>
<br>
<table class="table table-bordered table-hover">
	<thead class="bg-primary">
		<th>No</th>
		<th>Nama Lengkap</th>
		<th>Username</th>
		<th>Jenis Kelamin</th>
		<th>Tanggal Lahir</th>
		<th>Alamat</th>
		<th>Email</th>
		<th>No telp</th>
	</thead>
	<tbody>
		<?php 
			$dataAnggota = query("SELECT * FROM tbl_anggota");
			$no = "1";
			foreach ($dataAnggota as $anggota) {	
				
		?>
		<tr>
			<td><?= $no; ?></td>
			<td><?= $anggota["nama_lengkap"]; ?></td>
			<td><?= $anggota["username"]; ?></td>
			<td><?= $anggota["jenis_kelamin"]; ?></td>
			<td><?= $anggota["tgl_lahir"]; ?></td>
			<td><?= $anggota["alamat"]; ?></td>
			<td><?= $anggota["email"]; ?></td>
			<td><?= $anggota["no_telp"];  ?></td>
		</tr>
		<?php 
			$no++;
			} ?>
	</tbody>
</table>
</div>