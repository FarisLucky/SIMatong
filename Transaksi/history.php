<?php
  include"../core/koneksi.php";
  $_SESSION['title'] = "History !";
  include"../header.php";
  if (isset($_SESSION["id_anggota"])) {
    $anggota = $_SESSION["id_anggota"];
    // print_r($anggota);
    date_default_timezone_set("Asia/Jakarta");
    $time = date("Y-m-d H:i:s",strtotime("now"));
    $time2 = new DateTime(date("2018-12-12 13:00:00"));
    // var_dump($time);
    // Select data pembelian
    $select = "SELECT * FROM tbl_pembelian WHERE id_anggota = '".$_SESSION['id_anggota']."'";
    $querySelect = mysqli_query($conn,$select);
    if (mysqli_num_rows($querySelect) > 0) {
        $fetchData = mysqli_fetch_assoc($querySelect);
        $deletePembelian = "DELETE FROM tbl_pembelian WHERE id_anggota = '".$_SESSION['id_anggota']."' AND tgl_tempoBayar < '$time' AND status_pembelian = 'Pending'";
        $queryDelete = mysqli_query($conn,$deletePembelian);
    }
  }
?>
<section class="history" id="history">
<div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="text-center header_checkout bg-light p-4">Riwayat Pembelian</h3>
      </div>
    </div>
    <div class="row">
    <div class="col-md-12">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="proses-tab" data-toggle="tab" href="#belum_bayar">Belum Bayar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="selesai-tab" data-toggle="tab" href="#proses">Belum di Konfirmasi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="nilai-tab" data-toggle="tab" href="#selesai">Selesai</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="nilai-tab" data-toggle="tab" href="#penilaian">Komentar</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="belum_bayar" role="tabpanel" aria-labelledby="proses-tab">
        <div class="container container-table">
        <div class="row mt-3">
          <div class="col-md-12">
            <small class="fa fa-shopping-bag color">&nbsp;Pesanan Belum di Bayar</small>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered">
              <thead class="bg-success text-white">
                <th>No</th>
                <th>Tgl_Pembelian</th>
                <th width="13%">Nama Rumah</th>
                <th>Tempo Pembayaran</th>
                <th>Alamat Pengiriman</th>
                <th>Total Biaya</th>
                <th width="13%">Aksi</th>
              </thead>
              <tbody>
                <?php
                  $no ='1';
                  $sql1 = query("SELECT id_pembelian,tgl_pembelian,tgl_tempoBayar,tbl_anggota.nama_lengkap,alamat_anggota.alamat_lengkap AS alamat_ongkir,alamat_anggota.kabupaten AS kab_ongkir,alamat_anggota.kecamatan AS kec_ongkir,alamat_anggota.nama_rumah AS nama_alamat,total_pembelian,status_pembelian FROM tbl_pembelian INNER JOIN tbl_anggota ON tbl_pembelian.id_anggota = tbl_anggota.id_anggota INNER JOIN alamat_anggota ON tbl_pembelian.id_alamat = alamat_anggota.id_alamat WHERE tbl_pembelian.id_anggota = '".$_SESSION['id_anggota']."' AND tbl_pembelian.status_pembelian = 'Pending'");
                  if (empty($sql1)) {
                    echo"<tr>
                              <td colspan='7' class='text-center'><h4><i class='fa fa-eye-slash'></i>&nbsp;Tidak ada yang perlu dibayar</h4></td>
                        </tr>";
                  }
                  else{
                    foreach ($sql1 as $rows) {
                    ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $rows['tgl_pembelian'] ?></td>
                        <td>Rumah <?php echo $rows['nama_alamat'] ?></td>
                        <td><?php echo $rows['tgl_tempoBayar'] ?></td>
                        <td><?php echo $rows['alamat_ongkir'] ?> Kabupaten <?php echo $rows['kab_ongkir'] ?> Kecamatan <?php echo $rows['kec_ongkir'] ?></td>
                        <td><?php echo "Rp ".number_format($rows['total_pembelian'],2,',','.') ?></td>`
                        <td>
                          <div class="row">
                            <div class="col-md-12">
                              <button type="button" class="btn btn-sm btn-success detail_history" id="<?php echo $rows['id_pembelian'] ?>" value="<?php echo date($rows['tgl_pembelian']) ?>" data-tempo="<?php echo date($rows['tgl_tempoBayar']) ?>" >Lihat</button>
                              <a href="<?php echo $url_login ?>transaksi/pembayaran.php?id=<?php echo $rows['id_pembelian'] ?>" class="btn btn-sm btn-danger float-right" id="bayar" name="bayar_val" value="<?php echo$rows["id_pembelian"] ?>">Bayar</a>
                            </div>
                          </div>
                        </td>
                    </tr>
                    <?php
                    $no++;
                    }
                  }
                ?>

              </tbody>
          </table>
        </div>
        </div>
        </div>

        <!-- Konfirmasi pembayaran -->
        <div class="tab-pane fade" id="proses" role="tabpanel" aria-labelledby="selesai-tab">
          <div class="container container-table">
              <div class="row mt-3">
                <div class="col-md-12">
                  <small class="fa fa-window-close color">&nbsp;Pesanan Belum di Konfirmasi</small>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-success text-white">
                      <th>No</th>
                      <th>Tgl_Pembelian</th>
                      <th width="13%">Nama Rumah</th>
                      <th>Tempo Pembayaran</th>
                      <th>Alamat Pengiriman</th>
                      <th>Total Biaya</th>
                      <th width="13%">Aksi</th>
                    </thead>
                    <tbody>
                      <?php
                        $no ='1';
                        $sql1 = query("SELECT id_pembelian,tgl_pembelian,tgl_tempoBayar,tbl_anggota.nama_lengkap,alamat_anggota.alamat_lengkap AS alamat_ongkir,alamat_anggota.kabupaten AS kab_ongkir,alamat_anggota.kecamatan AS kec_ongkir,alamat_anggota.nama_rumah AS nama_alamat,total_pembelian,status_pembelian FROM tbl_pembelian INNER JOIN tbl_anggota ON tbl_pembelian.id_anggota = tbl_anggota.id_anggota INNER JOIN alamat_anggota ON tbl_pembelian.id_alamat = alamat_anggota.id_alamat WHERE tbl_pembelian.id_anggota = '".$_SESSION['id_anggota']."' AND tbl_pembelian.status_pembelian = 'Perlu konfirmasi'");
                        if (empty($sql1)) {
                          echo"<tr>
                                    <td colspan='7' class='text-center'><h4><i class='fa fa-eye-slash'></i>&nbsp;Tidak ada yang perlu diKonfirmasi</h4></td>
                              </tr>";
                        }
                        else{
                        foreach ($sql1 as $rows) {
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $rows['tgl_pembelian'] ?></td>
                            <td>Rumah <?php echo $rows['nama_alamat'] ?></td>
                            <td><?php echo $rows['tgl_tempoBayar'] ?></td>
                            <td><?php echo $rows['alamat_ongkir'] ?> Kabupaten <?php echo $rows['kab_ongkir'] ?> Kecamatan <?php echo $rows['kec_ongkir'] ?></td>
                            <td><?php echo "Rp ".number_format($rows['total_pembelian'],2,',','.') ?></td>

                            <td>
                              <button type="button" class="btn btn-sm btn-outline-warning detail_history" id="<?php echo $rows['id_pembelian'] ?>" value="<?php echo date($rows['tgl_pembelian']) ?>" data-tempo="<?php echo date($rows['tgl_tempoBayar']) ?>" >Detail Pembelian</button>
                            </td>
                        </tr>
                        <?php
                        $no++;
                        }
                      }
                      ?>

                    </tbody>
                </table>
              </div>
            </div>
        </div>
        <!-- Sudah Konfirmasi -->
        <div class="tab-pane fade" id="selesai" role="tabpanel" aria-labelledby="nilai-tab">
            <div class="container container-table">
              <div class="row mt-3">
                <div class="col-md-12">
                  <small class="fa fa-check-circle color">&nbsp;Pesanan Selesai</small>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-success text-white">
                      <th>No</th>
                      <th>Tgl_Pembelian</th>
                      <th width="13%">Nama Rumah</th>
                      <th>Tempo Pembayaran</th>
                      <th>Alamat Pengiriman</th>
                      <th>Total Biaya</th>
                      <th width="13%">Aksi</th>
                    </thead>
                    <tbody>
                      <?php
                        $no ='1';
                        $sql1 = query("SELECT id_pembelian,tgl_pembelian,tgl_tempoBayar,tbl_anggota.nama_lengkap,alamat_anggota.alamat_lengkap AS alamat_ongkir,alamat_anggota.kabupaten AS kab_ongkir,alamat_anggota.kecamatan AS kec_ongkir,alamat_anggota.nama_rumah AS nama_alamat,total_pembelian,status_pembelian FROM tbl_pembelian INNER JOIN tbl_anggota ON tbl_pembelian.id_anggota = tbl_anggota.id_anggota INNER JOIN alamat_anggota ON tbl_pembelian.id_alamat = alamat_anggota.id_alamat WHERE tbl_pembelian.id_anggota = '".$_SESSION['id_anggota']."' AND tbl_pembelian.status_pembelian = 'Selesai'");
                        if (empty($sql1)) {
                          echo"<tr>
                                    <td colspan='7' class='text-center'><h4><i class='fa fa-eye-slash'></i>&nbsp;Tidak ada Pembelian</h4></td>
                              </tr>";
                        }
                        else{
                        foreach ($sql1 as $rows) {
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $rows['tgl_pembelian'] ?></td>
                            <td>Rumah <?php echo $rows['nama_alamat'] ?></td>
                            <td><?php echo $rows['tgl_tempoBayar'] ?></td>
                            <td><?php echo $rows['alamat_ongkir'] ?> Kabupaten <?php echo $rows['kab_ongkir'] ?> Kecamatan <?php echo $rows['kec_ongkir'] ?></td>
                            <td><?php echo "Rp ".number_format($rows['total_pembelian'],2,',','.') ?></td>

                            <td>
                            <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-sm btn-success detail_history" id="<?php echo $rows['id_pembelian'] ?>" value="<?php echo date($rows['tgl_pembelian']) ?>" data-tempo="<?php echo date($rows['tgl_tempoBayar']) ?>">Lihat</button>
                                <a href="<?= $url_login ?>transaksi/cetak/cetak.php?idpembelian=<?= $rows['id_pembelian'] ?>" target="blank" class="btn btn-sm btn-danger float-right">Cetak</a>
                            </div>
                            </div>
                            </td>
                        </tr>
                        <?php
                        $no++;
                        }
                      }
                      ?>

                    </tbody>
                </table>
              </div>
            </div>
        </div>
        <!-- Batas -->

        <!-- Sudah Konfirmasi -->
        <div class="tab-pane fade" id="penilaian" role="tabpanel" aria-labelledby="nilai-tab">
            <div class="container container-table">
              <div class="row mt-3">
                <div class="col-md-12">
                  <small class="fa fa-check-circle color">&nbsp;Pesanan Selesai</small>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-success text-white">
                      <th>No</th>
                      <th>Tgl_Pembelian</th>
                      <th width="13%">Nama Rumah</th>
                      <th>Tempo Pembayaran</th>
                      <th>Alamat Pengiriman</th>
                      <th>Total Biaya</th>
                      <th width="13%">Aksi</th>
                    </thead>
                    <tbody>
                      <?php
                        $no ='1';
                        $pembelian = "";
                        $queryComent = query("SELECT * FROM tbl_comment WHERE id_pembelian='$pembelian'");
                        if (empty($sql1)) {
                          echo"<tr>
                                    <td colspan='7' class='text-center'><h4><i class='fa fa-eye-slash'></i>&nbsp;Tidak ada Pembelian</h4></td>
                              </tr>";
                        }
                        else{
                        foreach ($sql1 as $rows) {
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $rows['tgl_pembelian'] ?></td>
                            <td>Rumah <?php echo $rows['nama_alamat'] ?></td>
                            <td><?php echo $rows['tgl_tempoBayar'] ?></td>
                            <td><?php echo $rows['alamat_ongkir'] ?> Kabupaten <?php echo $rows['kab_ongkir'] ?> Kecamatan <?php echo $rows['kec_ongkir'] ?></td>
                            <td><?php echo "Rp ".number_format($rows['total_pembelian'],2,',','.') ?></td>

                            <td>
                            <div class="row">
                            <div class="col-md-12 text-center">
                              <button type="button" class="btn btn-sm btn-info comment px-3" value="<?= $rows['id_pembelian'] ?>">Nilai</button>
                            </div>
                            </div>
                            </td>
                        </tr>
                        <?php
                        $no++;
                        }
                      }
                      ?>

                    </tbody>
                </table>
              </div>
            </div>
        </div>
        <!-- Batas -->
      </div>
      </div>
      </div>
</div>
</section>

<div class="modal fade" id="history_modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail Pembelian</h5>
        <span class="close" data-dismiss="modal">
          <i class="fa fa-close"></i>
        </span>
      </div>
      <div class="modal-body">
        <!-- Body -->
        <div class="row ml-5">
          <form action="" method="post">
            <div class="form-group row">
              <label for="comentar" clas="col-md-3">Beri Komentar</label>
              <div class="col-md-9">
                <textarea class="form-control" name="coment" id="id_coment" cols="50" rows="3"></textarea>
              </div>
            </div>
            <div class="form-group">
              <button type="button" class="btn btn-sm btn-success float-right" id="kirim_coment">Kirim</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
  include'../footer.php';
?>