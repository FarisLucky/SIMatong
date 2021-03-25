
<?php 
    include "core/koneksi.php";
    $url = "http://localhost/simatong/";
    // $_SESSION["notif"] = false;
    $notif = "";
    if (!isset($_SESSION["sudahLogin"])) {
      $nama = "";
    } 
    else{
      $data = query("SELECT * FROM tbl_anggota WHERE id_anggota = '".$_SESSION['id_anggota']."'");
      $nama = $data[0]['username'];
    }
?>
<!doctype html>
<html lang="en" id="home">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="<?php echo "$url_login"; ?>view/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo "$url_login"; ?>view/style/sweetalert2.min.css">
      <link rel="stylesheet" href="<?php echo "$url_login"; ?>view/css/font.awesome/css/font.awesome.min.css">
      <link rel="stylesheet" href="<?php echo "$url_login"; ?>view/style/style.css"> 
      <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <title>Simatong!</title>
  </head>
  <body>
      <!-- Header --> 
      <div class="header">
        <div class="judul d-none d-md-block d-sm-none pb-1">
          <ul class="ul1">
            <li>
              <a href="" style="border-bottom:1px solid white"><i class="fa fa-phone"></i>&nbsp;082213034131</a>
            </li>
            <li>
              <a href=""  style="border-bottom:1px solid white"><i class="fa fa-envelope-o"></i>&nbsp;simatongyuk@gmail.com</a>
            </li>
          </ul>
          <ul class="ul2">
              <?php 
              if (!empty($_SESSION["id_anggota"])) {
            ?>  
            <li id="loginUser">
              <div class="dropdown-show">
                <a href=""  class="dropdown-toggle" data-toggle="dropdown" dropdown-menu="dropdownMenuLink" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i><span class="p-1"><?= $nama; ?></span></a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item text-dark" id="profil" href="<?php echo $url_login ?>transaksi/history.php"><i class="fa fa-history">&nbspHistory</i></a>
                  <a class="dropdown-item text-dark" id="profil" href="<?php echo $url_login ?>akun/akun.php"><i class="fa fa-user">&nbspProfil</i></a>
                  <a class="dropdown-item text-dark" href="<?php echo $url_login; ?>Akun/logout.php" ><i class="fa fa-power-off">&nbspKeluar</i></a>
                </div>
              </div>
            </li>
              <?php 
              }
              ?>
            <li>
              <a href="" style="border-bottom:1px solid white"><span class="fa fa-bell"></span>&nbsp;Notification</a>
            </li>
            <li>
              <a href="" style="border-bottom:1px solid white;"><span class="fa fa-question-circle"></span>&nbsp;Bantuan</a>
            </li>
            <?php
              if (empty($_SESSION["id_anggota"])) {
            ?>
            <li>
              <a href="<?= $url_login  ?>Akun/signup.php" id="btn_daftar" style="border-bottom: 1px solid white"><i class="fa fa-address-card"></i>&nbsp;Daftar</a>
            </li>
            <?php
              }
            ?>
          </ul>
        </div>
        <nav class="navbar navbar-expand-md navbar-dark bg-white py-1" id="navigasi">
            <div class="container-fluid ">

              <!-- Brand/logo -->
              <a class="navbar-brand page-scroll" href="<?php echo $url_login?>index.php">
                <img src="<?php echo $url_login; ?>view/img/logo.png" alt="" width="90px"> 
              </a>
              
            <button class="navbar-toggler bg-dark" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
              <ul class="navbar-nav ml-auto" id="ul_nav">
                <li class="cool-link"><a href="<?php echo $url_login ?>index.php" id="home" class="nav-link">Beranda</a></li>
                <li class="cool-link"><a href="<?php echo $url_login ?>Produk/Produk.php" class="nav-link ">Produk</a></li>
                <li class="cool-link"><a href="<?php echo $url_login ?>Artikel/artikel.php" class="nav-link ">Artikel</a></li>
                <li class="cool-link"><a href="<?php echo $url_login ?>galeri/galeri.php" class="nav-link ">Galeri</a></li>
              <li class="cool-link"><a href="#contact" class="nav-link page-scroll">Hubungi Kami</a></li>
                    <?php 
                      if(empty($_SESSION["sudahLogin"])) {
                    ?>
                        <li class="nav-item pl-1"><a href="<?= $url_login  ?>Akun/login.php" class="btn btn-outline-success btn-sm mt-1 mr-2" id="masuk"><i class="fa fa-sign-in"></i>&nbspMasuk</a></li>
                    <?php
                      }
                    else
                    {
                    ?>
                      </ul>
                      <ul class="navbar-nav mx-4">
                        <a href="<?php echo $url_login; ?>transaksi/keranjang.php" class="shopping"><h5><i class="fa fa-shopping-cart "></i></h5></a>
                      </ul>
                    <?php 
                      }
                    ?>
            </div>
            </div>
          </nav>
        </div>

        <!-- Modal -->
        <!-- <div class="modal fade">
          <div class="modal-dialog modal-dialog-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4>Hubungi Kami</h4>
              </div>
              <div class="modal-body">
                      
              </div>
            </div>
          </div>
        </div> -->