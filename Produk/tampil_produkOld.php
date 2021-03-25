 <!-- Menu Produk -->
<section class="menu_produk" id="menu_produk">
  <div class="container">
    <div class="row">
    <div class="col-md-12 banner">
      <div id="header_search">
        <div class="row">
          <h4>pesan daging sapi untuk event - event tertentu</h4><br>
        </div>
        <ul>
            <li>Pesan daging pada saat hari raya islam</li>
            <li>Daging hanya tersedia pada event - event tertentu</li>
            <li>Daging yang segar dan berkualitas</li>
        </ul>
        <div class="row">
          <div class="col-md-5">
              <small>Cari berdasarkan event-event tertentu</small>
              <?php
                $events = query("SELECT * FROM tbl_event");
              ?>
                <select class="custom-select custom-select-lg" name="filter_name" id="filter_id">
                    <option selected value="">Pilih Event</option>
                  <?php
                    foreach ($events as $event) {
                  ?>
                    <option value="<?php echo $event['id_event'] ?>"><?php echo $event["nama_event"].' - '.$event["tgl_event"] ?></option>
                  <?php
                    }
                  ?>
                </select>
          </div>
          <div class="col-md-5 offset-1">
            <small>Cari berdasarkan nama produk tertentu</small>
            <form action="" method="post">
                <div class="input-group ">
                  <div class="input-group-prepend">
                    <span class="input-group-text input-group-lg fa fa-2x fa-search" id="inputGroupPrepend2"></span>
                  </div>
                  <input type="text" class="form-control form-control-lg" id="search_input" name="search" placeholder="Cari berdasarkan nama" aria-describedby="inputGroupPrepend2" required>
                </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
  <div class="container">
    <div class="row pt-4">
      <hr>
        <h5>List Daging</h5>
      <hr>
    </div>
    <div class="row mb-3" id="live_produk">
        <?php 
          $ambilFoto = query("SELECT * FROM tbl_produk INNER JOIN tbl_event ON tbl_produk.id_event = tbl_event.id_event");
          foreach ($ambilFoto as $foto) {
        ?>
          <div class="col-md-3">
            <div class="card border-0">
              <img src="<?= $url ?>foto_produk/<?= $foto["foto"];  ?>" alt="" class="img-fluid img_hover">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-9">
                    <small class="txt"><?php echo $foto["nama_event"] ?></small><br>
                    <a href="#" class="card-title" id="title"><?= $foto["nama_produk"];  ?></a><br>
                    <small>Rp.<?= number_format($foto["harga"],2,',','.');  ?></small>
                  </div>
                  <div class="col-md-3 text-center">
                  <a href="<?php echo $url_login; ?>transaksi/pesan.php?id=<?= $foto['id_produk']?>" class="" id="beli_produk">
                    <i class="fa fa-2x fa-cart-plus"></i>
                  </a>
                  </div>
                </div>
                <div class="row" id="button">
                <div class="col-md-12">
                  <a href="produk.php?halaman=detail&id=<?= $foto["id_produk"];  ?>" class="btn btn-sm btn-outline-primary col-md-12">Detail</a>
                </div>
                </div>
              </div>
            </div>
          </div>
        <?php
          }
        ?>
        </form>
      </div>
  </div>
</section>
        