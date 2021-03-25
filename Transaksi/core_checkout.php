<?php
    include"../core/koneksi.php";
    if (isset($_POST['ttl_pembelian'])) {
        $pemesan = $_SESSION["pemesan"]["id_pemesan"];
        $alamat = $_SESSION["pemesan"]["alamat_pemesan"];
        $ongkir = $_SESSION["pemesan"]["id_ongkir"];
        $ttl_pembelian = $_POST["ttl_pembelian"];
        date_default_timezone_set("Asia/Jakarta");
        $tempo = date("Y-m-d H:i:s",strtotime("+3 days"));
        $date = date("Y-m-d H:i:s");
        // var_dump($pemesan." ".$alamat." ".$ongkir." ".$ttl_pembelian);
        // Sql Insert
        $insert = "INSERT INTO tbl_pembelian(tgl_pembelian,tgl_tempoBayar,id_anggota,id_ongkir,id_alamat,total_pembelian) VALUES('$date','$tempo','$pemesan','$ongkir','$alamat','$ttl_pembelian')";
        $queryInsert = mysqli_query($conn,$insert);
        if (mysqli_affected_rows($conn) > 0) {
            $insertId = mysqli_insert_id($conn);
            // Insert Detail Pembelian
            $detailinsert = "INSERT INTO detail_pembelian(id_pembelian,id_produk,jumlah,total_harga) SELECT '$insertId',id_produk,jumlah,total_pembelian FROM keranjang WHERE id_anggota = '$pemesan'";
            $queryDetail = mysqli_query($conn,$detailinsert);
            if (mysqli_affected_rows($conn) > 0) {
                unset($_SESSION['pemesan']['id_pemesan']);
                unset($_SESSION['pemesan']['alamat_pemesan']);
                unset($_SESSION['pemesan']['id_ongkir']);
                unset($_SESSION['pemesan']['ongkir_pemesan']);
                echo"Produk dipesan";
            }
            else{
                echo"insert detail".mysqli_error($conn);
            }
            $hapusKeranjang = "DELETE FROM keranjang WHERE id_anggota = '$pemesan'";
            $rsHapus = mysqli_query($conn,$hapusKeranjang);
        }
        else {
            echo "Insert pembelian".mysqli_error($conn);
        }
    }

    if(isset($_POST["id_pemesan"])){
        $_SESSION["pemesan"]["id_pemesan"] = $_POST["id_pemesan"];
    }
    else if (isset($_POST["alamat"])) {
        $_SESSION["pemesan"]["alamat_pemesan"] = $_POST["alamat"];
        echo $_SESSION["pemesan"]["alamat_pemesan"] = $_POST["alamat"];
    }
    elseif (isset($_POST["id_ongkir"])) {
        $_SESSION["pemesan"]["ongkir_pemesan"] = $_POST["ongkir"];
        $_SESSION["pemesan"]["id_ongkir"] = $_POST["id_ongkir"];
        echo $_SESSION["pemesan"]["ongkir_pemesan"];
    }
    else {
        echo"";
    }

    if (isset($_POST["id_anggota"])) {
        $tampil = "";
        $id = intval($_POST['id_anggota']);
        $id_alamat = intval($_POST['id_alamat']); 
        $getAlamat = query("SELECT id_alamat,nama_rumah,alamat_lengkap,kecamatan,kabupaten,no_telp,(SELECT nama_lengkap FROM tbl_anggota WHERE id_anggota ='$id') AS nama_anggota FROM alamat_anggota WHERE id_anggota = '$id'");
        $tampil .='
        <form action="" method="post" id="form_checkout">
            <table class="table">
                <tr>
                    <th>Nama Pemesan</th>
                    <th>Alamat Pengiriman</th>
                    <th>Aksi</th>
                </tr>
            ';
        foreach ($getAlamat as $row) {
            if ($id_alamat == $row["id_alamat"]) {
                $check = "checked";
            }
            else{
                $check = "";
            }
            $tampil .=' <tr>
                            <td width="30%">'.$row["nama_anggota"].'<br>'.$row["no_telp"].'</td>
                            <td width="0%">'.$row["alamat_lengkap"].' Kec. '.$row["kecamatan"].' Kab. '.$row["kabupaten"].' <br> Rumah '.$row["nama_rumah"].'</td>
                            <td width="20%">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input radio_alamat" name="pilihan_anda" id="'.$row["id_alamat"].'" value="'.$row["id_alamat"].'" '.$check.'>
                                    <label for="'.$row["id_alamat"].'" class="custom-control-label">Pilih</label>
                                </div>
                            </td>
                        </tr>';
        }
        $tampil .='
            </table>
            <button type="submit" class="btn btn-success btn-sm" name="simpan_alamat" id="btn_simpan">Simpan</button>
            </form
        ';
        echo $tampil;
        exit;
        }
    
?>