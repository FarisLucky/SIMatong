<?php 
  include"../core/koneksi.php";
  $_SESSION['title'] = "History !";
	require'../header.php';

	$data_anggota = query("SELECT * FROM tbl_anggota WHERE id_anggota = '".$_SESSION['id_anggota']."'");
	$read = "readonly";
	if (isset($_POST["simpan"])) {
		if (updateData($_SESSION["id_anggota"]) > 0) {
			echo"<script>alert('Data Berhasil Disimpan !');window.location=''</script>";
		}
	}
 ?>

	<section class="profil" id="profil">
		<div class="container">
			<div class="row">
        <div class="col-md-8">
				<div class="col-md-12 text-center mt-4 py-2 text-white title_profil">
					<span class="judul_profil">Setting Profil</span>
				</div>
        <div class="col-md-12">
        <div class="row">
          <div class="col-md-1">
          
          </div>
          <div class="col-md-10">
            <form action="" class="" method="post">
						<div class="form-group row">
							<label for="Nama" class="col-md-3"><i class="fa fa-user"></i>&nbsp;Jenis Kelamin</label>
							<input type="text" class="form-control form-control-sm col-md-8" name="jenis_kelamin" id="form_jk" value="<?= $data_anggota[0]['jenis_kelamin'] ?>" <?php echo "$read";?>>
						</div>
						<div class="form-group row">
							<label for="Nama" class="col-md-3"><i class="fa fa-calendar"></i>&nbsp;Tanggal Lahir</label>
							<input type="text" class="form-control form-control-sm col-md-8" name="tgl_lahir" id="form_tgl" value="<?= $data_anggota[0]['tgl_lahir']  ?>" <?php echo "$read";?>>
						</div>
            <div class="form-group row">
              <label for="Nama" class="col-md-3"><i class="fa fa-area-chart"></i>&nbsp;Tempat Lahir</label>
              <input type="text" class="form-control form-control-sm col-md-8" name="tempat_lahir" id="form_tempat" value="<?= $data_anggota[0]['tempat_lahir']  ?>" <?php echo "$read";?>>
            </div>
            <div class="form-group row">
              <label for="Nama" class="col-md-3"><i class="fa fa-map"></i>&nbsp;Alamat</label>
              <textarea class="form-control form-control-sm col-md-8" name="alamat" id="form_alamat" <?php echo "$read";?>><?= $data_anggota[0]['alamat']  ?></textarea>
            </div>
						<button type="button" class="btn btn-primary btn-sm" name="ubah_profil1" id="profil1" data-id="<?php echo $data_anggota[0]['id_anggota'] ?>">Ubah Data</button>
					</form>
          </div>
        </div>
				</div>
      </div>
      <div class="col-md-2 offset-2">
        <div class="col-md-12 offset-1 mt-4 py-2 text-center title_setting">
          <span class="judul_profil">Setting Akun</span>
        </div>
        <div class="col-md-12 offset-1 pt-2">
            <ul class="menu_Setting text-center my-3">
              <li><a href="akun.php">Akun</a></li>
              <li><a href="profil-1.php" class="active">Profil</a></li>
              <li><a href="alamat-1.php">Alamat</a></li>
              <li><a href="rekening.php">Rekening</a></li>
              <li><a href="password.php">Ubah Password</a></li>
            </ul>
        </div>
      </div>
    </div>
  </section>
<!-- Modal -->
<div class="modal fade" id="modal_profil1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ubah Akun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="form_profil" action="core_profil.php" method="post">
      <input type="hidden" id="modal_id" name="profil_id">
            <div class="form-group row">
              <label class="col-md-3"> Jenis Kelamin</label>
              <div class="custom-control custom-radio col-md-3">
                <input type="radio" id="radio1" name="modal_jk" value="laki-laki" class="custom-control-input">
                <label for="radio1" class="custom-control-label">Laki-Laki&nbsp;</label>
              </div>
              <div class="custom-control custom-radio col-md-3">
                <input type="radio" id="radio2" name="modal_jk" value="perempuan" class="custom-control-input">
                <label for="radio2" class="custom-control-label">Perempuan</label>
              </div>
						</div>
						<div class="form-group row">
							<label for="modal_tgl" class="col-md-3">Tanggal Lahir</label>
							<input type="date" class="form-control form-control-sm col-md-8" name="profil_tgl" id="modal_tgl">
						</div>
            <div class="form-group row">
              <label for="modal_tempat" class="col-md-3">Tempat Lahir</label>
              <input type="text" class="form-control form-control-sm col-md-8" name="profil_tempat" id="modal_tempat">
            </div>
            <div class="form-group row">
              <label for="modal_alamat" class="col-md-3">Alamat</label>
              <textarea class="form-control form-control-sm col-md-8" name="profil_alamat" id="modal_alamat"></textarea>
            </div>
            <div class="form-group row">
              <button type="submit" class="btn btn-success ml-3" name="profil_simpan" id="modal_simpan">Simpan</button>
            </div>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


 <?php 
 	include'../footer.php';
  ?>