<?php 
  include"../core/koneksi.php";
  $_SESSION['title'] = "History !";
  require'../header.php';

  $read = "readonly";


  // Simpan Ubah Rekening
  if (isset($_POST['simpan_rekName'])) {
        $id = intval($_POST['id_rekName']);
        $nama_pemilik = mysqli_real_escape_string($conn,$_POST['nama_rekName']);
        $nam_bank = mysqli_real_escape_string($conn,$_POST['bank_rekName']);
        $no_rek = mysqli_real_escape_string($conn,$_POST['no_rekName']);
        $anggota = $_SESSION['id_anggota'];

        $updateData = "UPDATE tbl_rekening SET nama_pemilik = '$nama_pemilik',nama_bank = '$nam_bank',no_rekening = '$no_rek' WHERE id_rekening = '$id' ";
        $queryUpdate = mysqli_query($conn,$updateData);
  }
  // Hapus Alamat
  if (isset($_POST['hapus_rekening'])) {
      $id = intval($_POST['hapus_rekening']);
      $hapusData = "DELETE FROM tbl_rekening WHERE id_rekening = '$id'";
      $queryDelete = mysqli_query($conn,$hapusData);
      if ($queryDelete == true) {
        echo"<script>alert('Data Berhasil Dihapus')</script>";
      }
  }
 ?>
  <section class="profil" id="profil">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="row text-center mt-4 py-2 text-white title_profil">
          <div class="col-md-10">
            <span class="judul_profil">Rekening</span>  
          </div>
          <div class="col-md-2">
            <button class="btn btn-sm btn-primary" id="tambah_rek" name="rekening_tambah" data-toggle="modal"><i class="fa fa-plus-circle text-white"></i>&nbspTambah</button>  
          </div>
          </div>
          <div class="row text-center">
          <form action="" class="col-md-12" method="post">
          <div class="table-responsive" id="table_alamat">
          <table class="table">
            <thead>
              <tr>
                <th width="30px;">No</th>
                <th width="100px;">Nomor Rekening</th>
                <th width="100px;">Nama Pemilik</th>
                <th width="80px;">Bank</th>
                <th width="80px;">Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php
            $nomer= "1";
            $reks = query("SELECT * FROM tbl_rekening WHERE id_anggota = '".$_SESSION['id_anggota']."'");

              foreach ($reks as $rek) {
            ?>
            <tr>
                <td><?php echo $nomer ?></td>
                <td><?php echo $rek['no_rekening'] ?></td>
                <td><?php echo $rek['nama_pemilik'] ?></td>
                <td><?php echo $rek['nama_bank'] ?></td>
                <td>
                  <button type="button" class="btn btn-sm ubah_rek btn-info" name="ubah" id="<?php echo $rek['id_rekening'] ?>">Ubah</button>
                  <button type="submit" class="btn btn-sm btn-danger" name="hapus_rekening" value="<?php echo $rek['id_rekening'] ?>">Hapus</button>
                </td>
                
            </tr>
            <?php
            $nomer++;
              }
            ?>
            </tbody>
            </table>
            </div>
          </form>
          </div>
        </div>
      <div class="col-md-2 offset-1">
      <div class="col-md-12 mt-4 py-2 text-center title_setting">
          <span class="judul_profil">Setting Akun</span>
      </div>
      <div class="col-md-12 pt-2">
          <ul class="menu_Setting text-center my-3">
            <li><a href="akun.php">Akun</a></li>
            <li><a href="profil-1.php">Profil</a></li>
            <li><a href="alamat-1.php">Alamat</a></li>
            <li><a href="rekening.php" class="active">Rekening</a></li>
            <li><a href="password.php">Ubah Password</a></li>
          </ul>
      </div>
      </div>
    </div>
  </section>


<!-- Modal Ubah Alamat -->
<div class="modal fade" id="ubah_rekening">
<div class="modal-dialog ">
    <div class="modal-content p-3">
      <div class="modal-header">
        <h4 class="modal-title"><i class="fa fa-2x fa-edit"></i>Ubah Alamat</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal_bodyRek">
  <!-- Modal body from Tajax -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Insert -->
<div class="modal fade" id="tambah_rekening" >
  <div class="modal-dialog">
    <div class="modal-content p-3">
    <div class="modal_header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><i class="fa fa-2x fa-book"></i>&nbsp;Tambah Rekening</h4>
    </div>
    <div class="modal-body">
      <form action="core_rekening.php" method="post" id="form_rekening">
        <div class="form-group">
          <label for="no_rek"><i class="fa fa-bookmark"></i>&nbsp;Nomor Rekening</label>
          <input type="number" id="no_rek" name="rekening_nomor" class="form-control-sm form-control" required placeholder="Masukkan Nomor Rekening">
        </div>
        <div class="form-group">
          <label for="nama_rek"><i class="fa fa-address-book"></i>&nbsp;Nama Pemilik</label>
          <input type="text" id="nama_rek" name="rekening_nama" class="form-control-sm form-control" required placeholder="Masukkan Nama Pemilik">
        </div>
        <div class="form-group">
          <label for="bank_rek"><i class="fa fa-address-book"></i>&nbsp;Nama Bank</label>
          <input type="text" id="bank_rek" name="rekening_bank" class="form-control-sm form-control" required placeholder="Masukkan Nama Bank">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-success" id="tambah_rek" name="rekening_tambah" ><i class="fa fa-plus-circle"></i>&nbsp;Simpan</button>
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
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
                  <p>SiMatong adalah sebuah toko online penjualan daging yang menjual macam macam daging sapi yang segar dan berkualitas dan halal dengan pemotongan yang nmenurut prosedur yang benar</p>
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