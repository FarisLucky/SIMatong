<?php
    include"../core/koneksi.php";
    // echo"sfdsd";
    if (isset($_POST['id_anggota'])) {
        $pass_lama = mysqli_real_escape_string($conn,$_POST["pass_lama"]);
        $new_pass= mysqli_real_escape_string($conn,$_POST["new_pass"]);
        $confirm_pass = mysqli_real_escape_string($conn,$_POST["confirm_pass"]);
        $pass = query("SELECT tbl_anggota.password AS pass FROM tbl_anggota WHERE id_anggota = '".$_SESSION['id_anggota']."'");
        $password = $pass[0]["pass"];
        if (password_verify($pass_lama,$password)) {
            if ($new_pass == $confirm_pass) {
                $encrypt = password_hash($new_pass,PASSWORD_DEFAULT);
                // Update Password
                $queryUpdate = mysqli_query($conn,"UPDATE tbl_anggota SET password = '$encrypt' WHERE id_anggota = '".$_SESSION['id_anggota']."'");
                if ($queryUpdate == true) {
                    echo"Password berhasil diubah";
                }
            }
            else{
                echo"Password baru tidak cocok";
            }
        }
        else{
            echo"Password Salah".mysqli_error($conn);
        }
    }
?>