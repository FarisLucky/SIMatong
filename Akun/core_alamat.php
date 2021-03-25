<?php
    include'../core/koneksi.php';
    if (isset($_POST['id'])) {
        $tampil = "";  
        $id = intval($_POST['id']);
        $getData = query("SELECT * FROM alamat_anggota WHERE id_alamat = '$id'");
        $tampil .= '
        <form action="" method="post">
        <input type="hidden" class="hidden_id" id="id_alamat_anggota" value="'.$getData[0]["id_alamat"].'" name="id_alamat1">
        <div class="form-group row">
            <label for="nama"><i class="fa fa-home"></i>&nbsp;Nama Rumah</label>
            <input type="text" class="form-control form-control-sm" id="rumah1" value="'.$getData[0]["nama_rumah"].'" name="rumah1" placeholder="Masukkan Nama Rumah">
        </div>
        <div class="form-group row">
                <label for="nama"><i class="fa fa-address-book"></i>&nbsp;Alamat</label>
                <textarea type="text" class="form-control form-control-sm" id="alamat1" name="alamat1">'.$getData[0]["alamat_lengkap"].'</textarea>
        </div>
        <div class="form-group row">
                <label for="nama"><i class="fa fa-address-book"></i>&nbsp;Kecamatan</label>
                <input type="text" class="form-control form-control-sm" id="kecamatan1" value="'.$getData[0]["kecamatan"].'" name="kecamatan1" placeholder="Masukkan kecamatan">
        </div>
        <div class="form-group row">
                <label for="nama"><i class="fa fa-address-book"></i>&nbsp;Kabupaten</label>
                <input type="text" class="form-control form-control-sm" id="kabupaten1" value="'.$getData[0]["kabupaten"].'" name="kabupaten1" placeholder="Masukkan Kabupaten">
        </div>
        <div class="form-group row">
                <label for="telp"><i class="fa fa-phone"></i>&nbsp;Telp</label>
                <input type="text" class="form-control form-control-sm" id="telp1" value="'.$getData[0]["no_telp"].'" name="telp1" placeholder="Masukkan Telp">
        </div>
        <div class="form-group row">
                <button type="submit" class="btn btn-success btn-sm" name="simpan_alamat" id="simpan1"><i class="fa fa-plus-circle"></i>&nbsp;Simpan</button>
        </div>
        </form>
        ';
    echo $tampil;
    }

    if (isset($_POST["nama_tambahName"])){
        $nama_rumah = mysqli_real_escape_string($conn,$_POST['nama_tambahName']);
        $alamat = mysqli_real_escape_string($conn,$_POST['alamat_tambahName']);
        $kec = mysqli_real_escape_string($conn,$_POST['kecamatan_tambahName']);
        $kab = mysqli_real_escape_string($conn,$_POST['kabupaten_tambahName']);
        $telp = mysqli_real_escape_string($conn,$_POST['telp_tambahName']);
        $anggota = $_SESSION['id_anggota'];
        $sql="INSERT INTO alamat_anggota VALUES('','$nama_rumah','$alamat','$kec','$kab','$telp','$anggota')";
        if ($rows = mysqli_query($conn,$sql) == true) {
            echo"<script>alert('Data Berhasil ditambahkan');</script>";
            echo"<script>window.location='alamat-1.php';</script>";
        }
        else{
            echo"gagal" or mysqli_error();
        }
    }
?>