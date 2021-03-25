<?php 
    include'../core/koneksi.php';
    if (isset($_POST["profil_id"])) {
        $id = intval($_POST["profil_id"]);
        $jk = mysqli_real_escape_string($conn,$_POST['modal_jk']);
        $tgl = mysqli_real_escape_string($conn,$_POST['profil_tgl']);
        $tempat = mysqli_real_escape_string($conn,$_POST['profil_tempat']);
        $alamat = mysqli_real_escape_string($conn,$_POST['profil_alamat']);
        $updateProfil = "UPDATE tbl_anggota SET jenis_kelamin ='$jk',tgl_lahir = '$tgl',tempat_lahir='$tempat',alamat='$alamat' WHERE id_anggota = '$id'";
        $queryUpdate = mysqli_query($conn,$updateProfil);
        if ($queryUpdate == true) {
            echo"<script>window.location.href = 'profil-1.php';</script>";
        }
        echo $jk;
    }
?>