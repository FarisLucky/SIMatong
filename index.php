<?php 
  include "core/koneksi.php";
  $_SESSION['title'] = "Home !";
  include_once'header.php';
 ?>

<!-- Slider -->
      <div class="cnt_banner">
        <div class="container banner">
          <div class="carousel slide" data-ride="carousel" data-interval="4000" id="slides">
            <ul class="carousel-indicators">
              <li data-target="#slides" data-slide-to="0" class="active"></li>
              <li data-target="#slides" data-slide-to="1"></li>
              <li data-target="#slides" data-slide-to="2"></li>
            </ul>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="<?php echo $url_login; ?>view/img/slide.jpg" class="" alt="">
              </div>
              <div class="carousel-item">
                <img src="<?php echo $url_login; ?>view/img/slide1.jpg" class="" alt="">
              </div>
              <div class="carousel-item">
                <img src="<?php echo $url_login; ?>view/img/slide2.jpg" class="" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
          <!-- Produk -->
          <section class="produk" id="produk">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <h4 class="text-center">Jual Daging Sapi Berkualitas dan Sehat<hr></h4>
                  <div id="timeri"></div>
                </div>
              </div>
            <div class="container" id="pagination_page">
              
            </div>
          </section>

          <!-- About Us -->
        <section class="about" id="about">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <h3 class=" text-center">Tentang Kami</h3>
              </div>
              <div class="row">
                <div class="col-md-4">
                <div class="card">
                  <div class="card-header-pills text-center">
                    <img src="view/img/segar.png" alt="">
                  </div>
                  <div class="card-body">
                    <h5 class="font-weight-bold text-center">Segar</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati in sint harum distinctio repudiandae possimus autem, nulla velit!</p>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <div class="card-header-pills text-center">
                    <img src="view/img/health.png" alt="">
                  </div>
                  <div class="card-body">
                    <h5 class="font-weight-bold text-center">Sehat</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati in sint harum distinctio repudiandae possimus autem, nulla velit!</p>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <div class="card-header-pills text-center">
                    <img src="view/img/family.png" alt="">
                  </div>
                  <div class="card-body">
                    <h5 class="font-weight-bold text-center">Keluarga</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati in sint harum distinctio repudiandae possimus autem, nulla velit!</p>
                  </div>
                </div>
              </div>
              </div>
              </div>
              </div>
            </div>
        </section>
          <!-- Hubungi Kami -->
        <section class="contact" id="contact">
          <div class="container">
            <div class="row">
              <div class="col-12"><br>
              <h4 class="text-center">Hubungi Kami</h4>
              </div>
            </div>
            <div class="row py-2">
              <div class="col-md-4">
                <h5 class="text-center">---- Informasi Kami ----</h5>
                <i class="fa fa-map-marker">
                  <span>
                    Jl.Pakuniran Desa Pandean RT/RW 14/05<br>&nbsp;&nbsp;&nbsp; Kec Paiton Kab Probolinggo   
                  </span>
                </i><br>
                <i class="fa fa-user"> 
                  <span>
                  Abdullah
                  </span>
                </i><br>
                <i class="fa fa-phone">
                  <span>
                    082213034131
                  </span>
                </i>
              </div>
              <div class="col-md-8">
                <h5 class="text-center">Kirim Pesan</h5>
                <form method="post">
                <?php
                if (isset($_POST['submitSaran'])) {

                  $tb = "tbl_saran";
                  $fields = ["nama", "email", "subject", "pesan"];
                  $values = ["'".$_POST['nama']."'","'".$_POST['email']."'","'".$_POST['subject']."'","'".$_POST['pesan']."'"];
                  if (saran($tb, $fields, $values) == "yes") {
                    echo "Saran atau Kritik anda terkirim";
                  }
                  else{
                    echo "Gagal mengirim pesan", mysqli_connect_error();
                  }
                }
                ?>
                  <div class="form-group row">
                  <div class="col-md-6">
                  <input type="text" name="nama" class="form-control" placeholder="Nama">
                  </div>
                  <div class="col-md-6">
                  <input type="email" name="email" placeholder="Email" class="form-control">
                  </div>
                  </div>
                  <div class="form-group">
                    <input type="text" name="subject" class="form-control" placeholder="Subject">
                  </div>
                  <div class="form-group">
                    <textarea name="pesan" rows="5" class="form-control" placeholder="Pesan" maxlength="500"></textarea>
                  </div>
                  <button class="btn col-md-12" type="submit" name="submitSaran">Kirim Pesan</button>
                </form>
              </div>
            </div>
          </div>
        </section>
<?php 

  include'footer.php';
 ?>

          