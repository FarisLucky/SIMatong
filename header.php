<?php 
    $url = "http://localhost/simatong/";
    // $_SESSION["notif"] = false; 
    $notif = "";
    $date = date("Y-m-d");
    // var_dump($date);
    $date = query("SELECT nama_event,tgl_event FROM tbl_event WHERE id_event = '1'");
    if (!isset($_SESSION["sudahLogin"])) {
      $nama = "";
    } 
    else{
      $data = query("SELECT * FROM tbl_anggota WHERE id_anggota = '".$_SESSION['id_anggota']."'");
      $nama = $data[0]['username'];
    }

    $data = mysqli_query($conn,"SELECT COUNT(id_pembelian) AS pembeli,nama_lengkap FROM tbl_pembelian INNER JOIN tbl_anggota ON tbl_pembelian.id_anggota = tbl_anggota.id_anggota");
    if ($data == true) {
        $fetch_ttl = mysqli_fetch_assoc($data);
    }
    else{
      mysqli_error($conn); 
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
      <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <title><?= $_SESSION['title'] ?></title>
  </head>
  <body>
  <!-- Header --> 
  <div class="header">
        <div class="container-fluid">
          <div class="row judul">
            <ul class="ul1">
            <li>
              <a href="#judul_3" style="border-bottom:1px solid white" id="scrolen"><i class="fa fa-phone"></i>&nbsp;082213034131</a>
            </li>
            <li>
              <a href="" style="border-bottom:1px solid white"><i class="fa fa-envelope-o"></i>&nbsp;simatongyuk@gmail.com</a>
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
          <div class="row judul_2">
            <div class="container">
              <div class="row mid">
                <div class="col-md-4">
                  <a class="navbar-brand page-scroll" href="<?php echo $url_login?>index.php">
                    <img src="<?php echo $url_login; ?>view/img/logo.png" width="170px;"> 
                  </a>
                </div>
                <div class="col-md-4">
                  <!-- <div class="form-group row">
                    <div class="col-md-10 p-0">
                      <input type="text" class="form-control" placeholder="Cari Produk">
                    </div>
                    <div class="col-md-2 p-0">
                      <button type="button" class="btn btn-kuning">Cari</button>
                    </div>
                  </div> -->
                  <div class="row">
                    <div class="col-md-12 info-center text-center">
                      <h4 class="text-white d-inline-block"><?= ucwords($date[0]['nama_event']) ?> 
                      </h4>
                        <span class="fa fa-question-circle info-event"></span>
                      <h2 class="cd_event text-white" data-date="<?= $date[0]['tgl_event']?>"></h2>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 align-self-center">
                  <!-- <h5 class="text-center text-white"><span class="fa fa-street-view"></span>&nbsp;Total Pemesan&nbsp;<strong><?= $fetch_ttl['pembeli'] ?></strong>&nbsp;</h5> -->

                  <div class="row">
                    <div class="col-md-8 offset-4 car">
                      <a href="">
                          <span class="fa fa-car front"></span>
                          <span class="fa fa-car back"></span>
                        <i>Info Pengiriman</i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="judul_3" id="judul_3">
            <!-- <div class="container xy"> -->
              <nav class="navbar navbar-expand-md navbar-light text-white" id="navigasi">
                <div class="container">
                <button class="navbar-toggler bg-dark" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarContent">
                  <div class="col-md-11">
                    <ul class="navbar-nav" id="ul_nav">
                      <li class="nav-item cool-link"><a href="<?php echo $url_login ?>index.php" id="home" class="nav-link">Beranda</a></li>
                      <li class="nav-item cool-link"><a href="<?php echo $url_login ?>Produk/Produk.php" class="nav-link ">Produk</a></li>
                      <li class="nav-item cool-link"><a href="<?php echo $url_login ?>Artikel/artikel.php" class="nav-link ">Artikel</a></li>
                      <li class="nav-item cool-link"><a href="<?php echo $url_login ?>galeri/galeri.php" class="nav-link ">Galeri</a></li>  
                      <li class="nav-item cool-link"><a href="#contact" class="nav-link page-scroll">Hubungi Kami</a></li>
                    </ul>
                  </div>
                  <div class="col-md-1">
                      <ul class="navbar-nav ml-auto">
                        <?php 
                          if(empty($_SESSION["sudahLogin"])) {
                        ?>
                            <li class="nav-item pl-1"><a href="<?= $url_login  ?>Akun/login.php" class="btn btn-outline-success btn-sm mt-1 mr-2" id="masuk"><i class="fa fa-sign-in"></i>&nbspMasuk</a></li>
                        <?php
                          }
                        else
                        {
                        ?>
                        <li class="nav-item"><a href="<?php echo $url_login; ?>transaksi/keranjang.php" class="shopping"><i class="fa fa-shopping-cart "></i></a></li>
                      </ul>
                      <?php 
                        }
                      ?>
                  </div>
                </div>
              </div>
              </nav>
            <!-- </div> -->
          </div>        
        </div>
        </div>
        
        <div class="header2">
          <nav class="navbar navbar-expand-md navbar-light bg-white text-white">
                <a href="<?= $url_login ?>"><img src="<?php echo $url_login; ?>view/img/logo1.png" alt="" width="80px"></a>
                <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbar2" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar2">
                  <div class="col-md-11">
                    <ul class="navbar-nav" id="ul_nav">
                      <li class="nav-item cool-link"><a href="<?php echo $url_login ?>index.php" id="home" class="nav-link">Beranda</a></li>
                      <li class="nav-item cool-link"><a href="<?php echo $url_login ?>Produk/Produk.php" class="nav-link ">Patungan</a></li>
                      <li class="nav-item cool-link"><a href="<?php echo $url_login ?>Artikel/artikel.php" class="nav-link ">Artikel</a></li>
                      <li class="nav-item cool-link"><a href="<?php echo $url_login ?>galeri/galeri.php" class="nav-link ">Galeri</a></li>
                      <li class="nav-item cool-link"><a href="#contact" class="nav-link page-scroll">Hubungi Kami</a></li>
                    </ul>
                  </div>
                  <div class="col-md-1">
                      <ul class="navbar-nav ml-auto">
                        <?php 
                          if(empty($_SESSION["sudahLogin"])) {
                        ?>
                            <li class="nav-item pl-1"><a href="<?= $url_login  ?>Akun/login.php" class="btn btn-outline-success btn-sm mt-1 mr-2" id="masuk"><i class="fa fa-sign-in"></i>&nbspMasuk</a></li>
                        <?php
                          }
                        else
                        {
                        ?>
                        <li class="nav-item"><a href="<?php echo $url_login; ?>transaksi/keranjang.php" class="shopping"><i class="fa fa-shopping-cart "></i></a></li>
                      </ul>
                      <?php 
                        }
                      ?>
                  </div>
                </div>
              </nav>
        </div>

        <div id="notif-header" class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Info Penyembelihan</h5>
                <button type="button" class="close" data-dismiss="modal">
                  <span class="fa fa-close"></span>
                </button>
              </div>
              <div class="modal-body">
                <p>Penyembelihan Sapi untuk simatong akan di laksanakan pada <?= $date[0]['tgl_event'] ?></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>