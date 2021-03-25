<?php 
  require'../header.php';

  $data_anggota = query("SELECT username,nama_lengkap,email FROM tbl_anggota WHERE id_anggota = '".$_SESSION['id_anggota']."'");
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
        <div class="col-md-8 text-center mt-4 py-2 text-white title_profil">
          <span class="judul_profil">Setting Profil</span>
        </div>
        <div class="col-md-3 offset-1 mt-4 py-2 text-center title_setting">
          <span class="judul_profil">Setting Akun</span>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8 body_profil m-0 p-0">
          <div class="row col-md-12">
          <img src="<?= $url ?>view/img/daging6.jpg" alt="" class="rounded rounded-circle img-fluid img-thumbnail col-md-4  img_profil" style="border: 1px solid blue;">
          
          <form action="" class="pt-2 pb-3 col-md-8" method="post">
            <div class="form-group row">
              <label for="Nama" class="col-md-3">Nama</label>
              <input type="text" class="form-control col-md-9" name="nama_lengkap" value="<?= $data_anggota[0]['nama_lengkap'] ?>" <?php echo "$read";?>>
            </div>
            <div class="form-group row">
              <label for="Nama" class="col-md-3">Email</label>
              <input type="text" class="form-control col-md-9" name="Email" value="<?= $data_anggota[0]['email'] ?>" <?php echo "$read";?>>
            </div>
            <div class="form-group row">
              <label for="Nama" class="col-md-3">Username</label>
              <input type="text" class="form-control col-md-9" name="Username" value="<?= $data_anggota[0]['username']  ?>" <?php echo "$read";?>>
            </div>
            <div class="form-group row">
              <label for="Nama" class="col-md-3">Password</label>
              <input type="text" class="form-control col-md-9" name="Password">
            </div>
            
            <button type="button" class="btn ml-4 mt-4" data-toggle="modal" data-target="#modal_ubah">Ubah Data</button>
          </form>
        </div>
        </div>
      <div class="col-md-3 offset-1 pt-2">
          <ul class="menu_Setting text-center my-3">
            <li><a href="akun-1.php">Akun</a></li>
            <li><a href="profil-1.php">Profil</a></li>
            <li><a href="alamat-1.php">Alamat</a></li>
            <li><a href="">Rekening</a></li>
          </ul>
      </div>

    </div>
  </section>
<!-- Modal -->
<div class="modal fade" id="modal_ubah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <form action="" method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ubah Akun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
          <div class="form-group row">
            <label for="nama" class="col-md-2 offset-1">Nama</label>
            <input type="text" class="form-control col-md-8" id="nama" value="<?= $data_anggota[0]['nama_lengkap'] ?>" name="nama">
          </div>
          <div class="form-group row">
            <label for="nama" class="col-md-2 offset-1">Email</label>
            <input type="text" class="form-control col-md-8" id="email" value="<?= $data_anggota[0]['email'] ?>" name="email">
          </div>
          <div class="form-group row">
            <label for="nama" class="col-md-2 offset-1">User</label>
            <input type="text" class="form-control col-md-8" id="user" value="<?= $data_anggota[0]['username'] ?>" name="user">
          </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
      </div>
        </form>
    </div>
  </div>
</div>
 <!-- Tentang Kami -->
        <section class="tentang-kami my-3 py-3" id="tentang-kami">
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