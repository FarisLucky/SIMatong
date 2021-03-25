<?php
    include"../core/koneksi.php";
    $_SESSION['title'] = "History !";
    include"../header.php";

    $passwordT = query("SELECT tbl_anggota.password AS pass,id_anggota FROM tbl_anggota WHERE id_anggota = '".$_SESSION['id_anggota']."'");
    $pass_lama = $passwordT[0]['pass'];
    // var_dump($pass_lama);
?>
<section class="profil" id="profil">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
            <div class="col-md-12 text-center mt-4 py-2 text-white title_profil">
                <span class="judul_profil">Ubah Password</span>
            </div>
            <div class="col-md-12">
            <div class="row">
            <div class="col-md-1">
        
            </div>
            <div class="col-md-10">
                <form action="" class="" method="post">
                    <div class="form-group row">
                        <label for="Nama" class="col-md-5"><i class="fa fa-unlock"></i>&nbsp;Password Saat Ini</label>
                        <input type="password" class="form-control form-control-sm col-md-7" name="password_lama" id="pass_lama" >
                    </div>
                    <div class="form-group row">
                        <label for="Nama" class="col-md-5"><i class="fa fa-key"></i>&nbsp;Password Yang Baru</label>
                        <input type="password" class="form-control form-control-sm col-md-7" name="new_pass" id="new_pass">
                    </div>
                    <div class="form-group row">
                        <label for="Nama" class="col-md-5"><i class="fa fa-history"></i>&nbsp;Konfirmasi Password Baru</label>
                        <input type="password" class="form-control form-control-sm col-md-7 " name="confirm_pass" id="confirm_pass">
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="button" class="btn btn-primary btn-sm px-2" name="ubah_pass1" id="ubah_pass" data-id="<?php echo $passowrdT[0]['id_anggota'] ?>">Konfirmasi</button>
                        </div>
                    </div>    
                </form>
            </div>
            </div>
                    </div>
        </div>
        <div class="col-md-2 offset-2">
            <div class="col-md-12 offset-1 mt-4 py-2 text-center title_setting">
            <span class="judul_profil">Setting Akun</span>
            </div>
            <div class="col-md-12 offset-1 pt-2">
                <ul class="menu_Setting text-center my-3">
                <li><a href="akun.php">Akun</a></li>
                <li><a href="profil-1.php">Profil</a></li>
                <li><a href="alamat-1.php">Alamat</a></li>
                <li><a href="rekening.php">Rekening</a></li>
                <li><a href="password.php" class="active">Ubah Password</a></li>
                </ul>
            </div>
        </div>
        </div>
    </section>
<?php
    include"../footer.php";
?>