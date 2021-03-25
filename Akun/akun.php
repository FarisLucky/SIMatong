<?php 
  include"../core/koneksi.php";
  $_SESSION['title'] = "History !";
	require'../header.php';

	$data_anggota = query("SELECT id_anggota,username,nama_lengkap,email,no_telp,foto FROM tbl_anggota WHERE id_anggota = '".$_SESSION['id_anggota']."'");
  $read = "readonly";
 ?>
	<section class="profil" id="profil">
    <div class="hjl"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-9">
        <div class="row">
        <div class="col-md-12 text-center mt-4 py-2 text-white title_profil">
					<span class="judul_profil">Setting Profil</span>
        </div>
        </div>
				<div class="row">
        <div class="col-md-4">
        <form action="" class="pb-3" method="post" id="form_tbl">
        <div class="card">
          <img src="<?= $url ?>foto_produk/foto_profil/<?= $data_anggota[0]['foto']?>" alt="" class="" id="img_profil" height="300px;">
          <div class="card-body text-center">
            <h5 class="card-title"><?= ucfirst($data_anggota[0]['nama_lengkap']) ?></h5>
          </div>
        </div>
        </div>
        <div class="col-md-8 mt-3">
						<div class="form-group row">
							<label for="nama" class="col-md-3">Nama</label>
            <input type="text" class="form-control col-md-9" name="namaAkun_tbl" id="nama_tbl" value="<?= $data_anggota[0]['nama_lengkap'] ?>" <?php echo "$read";?>>
            </div>
            <div class="form-group row">
							<label for="username" class="col-md-3">Username</label>
							<input type="text" class="form-control col-md-9" name="usernameAkun_tbl" id="username_tbl" value="<?= $data_anggota[0]['username']  ?>" <?php echo "$read";?>>
						</div>
						<div class="form-group row">
							<label for="email" class="col-md-3">Email</label>
							<input type="text" class="form-control col-md-9" name="emailAkun_tbl" id="email_tbl" value="<?= $data_anggota[0]['email'] ?>" <?php echo "$read";?>>
						</div>
						<div class="form-group row">
							<label for="telp" class="col-md-3">Telp</label>
							<input type="text" class="form-control col-md-9" name="telpAkun_tbl" id="telp_tbl" value="<?php echo $data_anggota[0]['no_telp'] ?>" <?php echo $read ?>>
            </div>	
						<button type="button" class="btn btn-primary mr-auto" name="ubah_akun" id="data_akun" data-id="<?php echo $data_anggota[0]['id_anggota'] ?>">Ubah Data</button>
        </div>
      </form>
		  </div>
      </div>
      <div class="col-md-2 offset-1">
		    <div class="col-md-12 mt-4 py-2 text-center title_setting">
					<span class="judul_profil">Setting Akun</span>
        </div>
        <div class="col-md-12">
          <ul class="menu_Setting text-center my-3">
            <li><a href="akun.php" class="active">Akun</a></li>
            <li><a href="profil-1.php">Profil</a></li>
            <li><a href="alamat-1.php">Alamat</a></li>
            <li><a href="rekening.php">Rekening</a></li>
            <li><a href="password.php">Ubah Password</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
<!-- Modal -->
<div class="modal fade" id="modal_ubah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><i class="fa fa-2x fa-edit"></i>&nbsp;Ubah Akun</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form id="ubah_form" method="post" action="core_akun.php" enctype="multipart/form-data">
          <input type="hidden" name="id_modal" id="idAnggota">
        	<div class="form-group row">
        		<label for="nam1" class="col-md-2 offset-1">Nama</label>
        		<input type="text" class="form-control col-md-8" id="nama1" name="nama">
          </div>
          <div class="form-group row">
        		<label for="user1" class="col-md-2 offset-1">User</label>
        		<input type="text" class="form-control col-md-8" id="user1" name="user">
        	</div>
        	<div class="form-group row">
        		<label for="email1" class="col-md-2 offset-1">Email</label>
        		<input type="text" class="form-control col-md-8" id="email1" name="email">
          </div>
          <div class="form-group row">
        		<label for="telp1" class="col-md-2 offset-1">Telp</label>
        		<input type="text" class="form-control col-md-8" id="telp1" name="telp">
          </div>
          <div class="form-group row pl-2">
                <img src="" class="offset-1 img-circle" width="200px" height="200px" id="pict">
          </div>
        	<div class="form-group row">
              <label for="foto" class="col-md-2 offset-1">Upload Foto</label>
              <input type="file" class="form-control col-md-8" name="upload" id="foto">
          </div>
        <button type="submit" class="btn btn-success offset-1" name="simpan" id="simpan_akun"><i class="fa fa-plus-circle"></i>&nbsp;Simpan</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
 <!-- Tentang Kami -->
        <section class="tentang-kami py-3" id="tentang-kami">
          <div class="container">
            <div class="container">
              <div class="row">
                <div class="col-md-3">                  
                </div>
                <div class="col-md-3 pr-3 ">
                  <p>BeefFarm adalah sebuah toko online penjualan daging yang menjual macam macam daging sapi yang segar dan berkualitas dan halal dengan pemotongan yang nmenurut prosedur yang benar</p>
                </div>
                <div class="col-md-3">
                  <span>ikuti Kami</span><br>
                  <a href=""><img src="<?= $url ?>view/img/produk/facebook.png" alt="" class="ml-1 mt-1"></a>
                  <a href=""><img src="<?= $url ?>view/img/produk/instagram.png" alt="" class="mt-1"></a>
                  <br>
                  <span>Hubungi Online</span><br>
                  <a href=""><img src="<?= $url ?>view/img/produk/whatsapp.png" alt="" class="ml-1 mt-1"></a>
                </div>
                <div class="col-md-3">
                  <span>Pembayaran</span><br>
                  <a href=""><img src="<?= $url ?>view/img/produk/bri.png" alt="" class="ml-5 mt-1"></a>
                  <a href=""><img src="<?= $url ?>view/img/produk/bni.png" alt="" class="ml-2 mt-1"></a>
                  <a href=""><img src="<?= $url ?>view/img/produk/mandiri.png" alt="" class="ml-5 mt-1"></a>
                </div>
              </div>
            </div>
          </div>
        </section>
 <?php 
 	include'../footer.php';
  ?>