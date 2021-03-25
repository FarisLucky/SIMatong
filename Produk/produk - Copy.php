<?php 
  
  include"../header.php";

 ?>
        <!-- Menu Produk -->
        <section class="menu_produk" id="menu_produk">
          <div class="container child_header">
            <div class="row">
              <div class="col-md-12 p-2">
                <a href="" class="home">Home</a>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-md-3">
                <h5 class="custom_filter">------<img src="<?php echo $url ?>view/img/produk/filter.png" alt="">Filter Pencarian   ------</h5>
                <form action="" class="">
                  <select class="custom-select" name="" id="">
                    <option selected>Pilih Event</option>
                    <option value="Hari Raya Idul Fitri">Hari Raya Idul Fitri</option>
                    <option value="Hari Raya Idul Adha">Hari Raya Idul Adha</option>
                  </select>
                </form><br>
                <span>
                  <strong class="col-md-4">Filter Harga</strong>
                </span>
                <form action="">
                  <div class="input-group ">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroupPrepend2">Min</span>
                    </div>
                    <input type="text" class="form-control col-4" id="validationDefaultUsername" placeholder="Min" aria-describedby="inputGroupPrepend2" required>
                    <div class="input-group-prepend ml-4">
                      <span class="input-group-text" id="inputGroupPrepend2">Max</span>
                    </div>
                    <input type="text" class="form-control col-4" id="validationDefaultUsername" placeholder="Max" aria-describedby="inputGroupPrepend2" required>
                  </div>
                </form>
                <p><input type="hidden" class="price_range" value="0,500"></p>
                <button class="btn text-white value="filter">Filter</button>
         </div>
         <div class="col-md-8 offset-1">
          <div class="row">
            <div class="col-md-12"> 
            <h5 class="custom_produk">------ Daftar Produk ------</h5>
            </div>
          </div>
          <!-- List Produk -->
          <?php 
            $ambilFoto = query("SELECT * FROM tbl_produk");
            foreach ($ambilFoto as $foto) {
          ?>

          <div class="row">
            <div class="col-md-4">
              <div class="card">
                <img src="<?php echo $url ?>view/img/daging.jpg" alt="" class="img-thumbnail">
                <div class="card-body text-center">
                  <a href="#" class="card-title">Daging Biasa</a>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus iusto in, saepe, </p>
                </div>
              </div>
            </div>
            <?php
            }
           ?>
          <!--   <div class="col-md-4">
              <div class="card">
              <img src="<?php echo $url ?>view/img/daging.jpg" alt="" class="img-thumbnail">
              <div class="card-body text-center">
                <a href="#" class="card-title">Daging Biasa</a>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus iusto in, saepe, </p>
              </div>
            </div>
            </div>
            <div class="col-md-4">
              <div class="card">
              <img src="<?php echo $url ?>view/img/daging.jpg" alt="" class="img-thumbnail">
              <div class="card-body text-center">
                <a href="#" class="card-title">Daging Biasa</a>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus iusto in, saepe, </p>
              </div>
            </div>
            </div>
            <div class="col-md-4">
              <div class="card">
              <img src="<?php echo $url ?>view/img/daging.jpg" alt="" class="img-thumbnail">
              <div class="card-body text-center">
                <a href="#" class="card-title">Daging Biasa</a>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus iusto in, saepe, </p>
              </div>
            </div>
            </div>
            <div class="col-md-4">
              <div class="card">
              <img src="<?php echo $url ?>view/img/daging.jpg" alt="" class="img-thumbnail">
              <div class="card-body text-center">
                <a href="#" class="card-title">Daging Biasa</a>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus iusto in, saepe, </p>
              </div>
            </div>
            </div>
            <div class="col-md-4">
              <div class="card">
              <img src="<?php echo $url ?>view/img/daging.jpg" alt="" class="img-thumbnail">
              <div class="card-body text-center">
                <a href="#" class="card-title">Daging Biasa</a>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus iusto in, saepe, </p>
              </div>
            </div>
            </div> -->
            </div>
            </div>
          </div>
        </div> 
        </section>
        
        <!-- Tentang Kami -->
        <section class="tentang-kami mt-3 py-3" id="tentang-kami">
          <div class="container">
            <div class="container">
              <div class="row">
                <div class="col-md-2">
                  
                </div>
                <div class="col-md-3 pr-3 ">
                  <p>BeefFarm adalah sebuah toko online penjualan daging yang menjual macam macam daging sapi yang segar dan berkualitas dan halal dengan pemotongan yang nmenurut prosedur yang benar</p>
                </div>
                <div class="col-md-3 offset-1">
                  <span>ikuti Kami</span><br>
                  <a href=""><img src="<?php echo $url ?>view/img/produk/facebook.png" alt="" class="ml-1 mt-1"></a>
                  <a href=""><img src="<?php echo $url ?>view/img/produk/instagram.png" alt="" class="mt-1"></a>
                  <br>
                  <span>Hubungi Online</span><br>
                  <a href=""><img src="<?php echo $url ?>view/img/produk/whatsapp.png" alt="" class="ml-1 mt-1"></a>
                </div>
                <div class="col-md-3">
                 <span>Pembayaran</span><br>
                  <a href=""><img src="<?php echo $url ?>view/img/produk/bri.png" alt="" class="ml-5 mt-1"></a>
                  <a href=""><img src="<?php echo $url ?>view/img/produk/bni.png" alt="" class="ml-2 mt-1"></a>
                  <a href=""><img src="<?php echo $url ?>view/img/produk/mandiri.png" alt="" class="ml-5 mt-1"></a>
                </div>
              </div>
            </div>
          </div>
        </section>
       <?php 

        include'../footer.php';
        ?>