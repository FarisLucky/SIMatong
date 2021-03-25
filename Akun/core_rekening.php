<?php
    include'../core/koneksi.php';
    if (isset($_POST['id'])) {
        $tampil = "";  
        $id = intval($_POST['id']);
        $getData = query("SELECT * FROM tbl_rekening WHERE id_rekening = '$id'");
        $tampil .= '
        <form action="" method="post">
        <input type="hidden" class="hidden_id" id="id_rekId" name="id_rekName" value="'.$getData[0]["id_rekening"].'"">
        <div class="form-group row">
            <label for="no_rekId"><i class="fa fa-home"></i>&nbsp;Nomor Rekening</label>
            <input type="number" class="form-control form-control-sm" id="no_rekId" value="'.$getData[0]["no_rekening"].'" name="no_rekName">
        </div>
        <div class="form-group row">
                <label for="nama_rekId"><i class="fa fa-address-book"></i>&nbsp;Nama Pemilik</label>
                <textarea type="text" class="form-control form-control-sm" id="nam_rekId" name="nama_rekName">'.$getData[0]["nama_pemilik"].'</textarea>
        </div>
        <div class="form-group row">
                <label for="bank_rekId"><i class="fa fa-address-book"></i>&nbsp;Nama Bank</label>
                <input type="text" class="form-control form-control-sm" id="bank_rekId" value="'.$getData[0]["nama_bank"].'" name="bank_rekName">
        </div>
        <div class="form-group row">
                <button type="submit" class="btn btn-success btn-sm" name="simpan_rekName" id="simpan_rekId"><i class="fa fa-plus-circle"></i>&nbsp;Simpan</button>
        </div>
        </form>
        ';
        echo $tampil;
    }
    if (isset($_POST['rekening_nomor'])) {
        $no = mysqli_real_escape_string($conn,$_POST['rekening_nomor']);
        $nama = mysqli_real_escape_string($conn,$_POST['rekening_nama']);
        $bank = mysqli_real_escape_string($conn,$_POST['rekening_bank']);
        $anggota = $_SESSION['id_anggota'];
        $insert = "INSERT INTO tbl_rekening VALUES('','$nama','$bank','$no','$anggota')";
        $queryInsert = mysqli_query($conn,$insert);
        if (mysqli_affected_rows($conn) > 0) {
            echo"<script>alert('Data Berhasil ditambahkan');</script>";
            echo"<script>window.location='rekening.php';</script>";
        }
        else{
            echo"<script>alert('Gagal ditambahkan');</script>";
            echo mysqli_error($conn);    
        }
    }
?>