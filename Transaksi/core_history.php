<?php
    include"../core/koneksi.php";
    if (isset($_POST["id_pembelian"])) {
        $id_pembelian = intval($_POST["id_pembelian"]);
        $tampil="";
        // Select Database
        $sql = "SELECT nama_lengkap,tgl_pembelian,tgl_tempoBayar,alamat.alamat_lengkap,alamat.nama_rumah,ongkir.Harga,tp.total_pembelian,status_pembelian FROM  tbl_pembelian AS tp INNER JOIN tbl_anggota AS ta ON ta.id_anggota = tp.id_anggota INNER JOIN alamat_anggota AS alamat ON alamat.id_alamat = tp.id_alamat INNER JOIN ongkir ON ongkir.id_ongkir = tp.id_ongkir WHERE tp.id_pembelian = '$id_pembelian'";
        $query = mysqli_query($conn,$sql);
        if ($query == true) {
        $fetchData = mysqli_fetch_assoc($query);
        $getTempo = $fetchData["tgl_tempoBayar"];
        $tempoBayar = explode(" ",$getTempo);
        $tampil .='
        <div class="row">
          <div class="col-md-7">
            <table>
                <tr>
                  <td colspan="2"><span class="data_pemesan">Data Pesanan</span></td>
                </tr>
                <tr>
                  <td width="35%"><span>Nama Pemesan</span></td>
                  <td>=</td>
                  <td><span><strong>'.$fetchData["nama_lengkap"].'</strong></span></td>
                </tr>
                <tr>
                  <td><span>Tanggal Pemesanan</span></td>
                  <td>=</td>
                  <td id="tgl_beli" data-pembelian="'.$fetchData["tgl_pembelian"].'"><span><strong>'.$fetchData["tgl_pembelian"].'</strong></span></td>
                </tr>
                <tr>
                  <td><span class="alamat">Alamat Pengiriman</span></td>
                  <td>=</td>
                  <td><span><strong>'.$fetchData["alamat_lengkap"].'</strong></span></td>
                </tr>
                <tr>
                  <td><span>Nama Rumah</span></td>
                  <td>=</td>
                  <td><span><strong>'.$fetchData["nama_rumah"].'</strong></span></td>
                </tr>
                <tr>
                  <td><span>Biaya Ongkir</span></td>
                  <td>=</td>
                  <td><span><strong>Rp '.number_format($fetchData["Harga"],2,",",".").'</strong></span></td>
                </tr>
                <tr>
                  <td><span>Total Biaya Pesanan</span></td>
                  <td>=</td>
                  <td><strong>Rp '.number_format($fetchData["total_pembelian"],2,",",".").'</strong></td>
                </tr>
            </table>
        </div>
        <div class="col-md-5">
        ';
          if ($fetchData['status_pembelian'] == "Pending") {
            $tampil .='
              <div class="row">
                <div class="alert alert-danger">Pesanan Belum Dibayar</div>
              </div>
              <div class="row">  
              <div class="col-md-11 cd" id="timer">
              </div>
              </div>
              ';
          }
        $tampil .= '
        </div
        </div>
        </div>
        <div class="row mt-3">
          <div class="col-md-12">
            <table class="table text-center bg-light">
              <tr>
                <th width="5%">No</th>
                <th width="20%">Gambar</th>
                <th width="30%"><span>Deksripsi Produk</span></th>
                <th width="10%"><span>Harga</span></th>
                <th width="10%"><span>Jumlah</span></th>
                <th width="10%"><span>Berat</span></th>
                <th width="15%"><span>Total Harga</span></th>
                <th><span></span></th>
              </tr>
          ';
        }
        else {
            mysqli_error($conn);
        }
        $nomer="1";
        $produk = query("SELECT * FROM detail_pembelian INNER JOIN tbl_produk AS produk ON detail_pembelian.id_produk = produk.id_produk WHERE id_pembelian = '$id_pembelian'");
        foreach ($produk as $rows) {
              $tampil .= '
              <tr>
                <td>'.$nomer.'</td>
                <td><img src="'.$url_login.'/foto_produk/'.$rows["foto"].'" class="img-thumbnail" width="100px" height="100px;"></td>
                <td><span><strong>'.$rows["nama_produk"].'</strong><br>'.$rows["deskripsi"].'</span></td>
                <td><span>Rp '.number_format($rows["harga"],2,",",".").'</span></td>
                <td><span>'.$rows["jumlah"].'</span></td>
                <td><span>'.$rows["berat"].' gram</span></td>
                <td><span>Rp '.number_format($rows["total_harga"],2,",",".").'</span></td>
              </tr>
            ';
            $nomer++;
            }
            $tampil .= '
                    </table>
                </div>
            </div>
            ';
        echo $tampil;
    }
    if (isset($_POST["beli"])) {
      $beli = intval($_POST["beli"]);

      echo $beli;
    }

    if (isset($_POST['value'])) {
      date_default_timezone_set("Asia/Jakarta");
      $date= date("Y-m-d H:i:s");
      $pembelian = $_POST['value'];
      $sessi = $_SESSION["id_anggota"];
      $coment = mysqli_real_escape_string($conn,$_POST['coment']);
      $sql_kirim = "INSERT INTO tbl_comment VALUES(NULL,'$coment','$date','$sessi','$pembelian')";
      $querySql = mysqli_query($conn,$sql_kirim);
      if (mysqli_affected_rows($conn) > 0) {
        echo"Berhasil dikirim";
      }
      else{
        echo mysqli_error($conn);
      }
    }
?>