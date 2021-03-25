    <!-- Menu Produk -->
    <section class="menu_produk" id="menu_produk">
    <div class="container">
    <div class="row">
    <div class="col-md-12 banner">
        <div id="header_search">
        <div class="row">
            <h4>Patungan Daging SiMatong</h4><br>
        </div>
        <div class="row">
            <div class="col-md-9">
                <p class="patungan-desc">Sebuah tempat yang menyediakan daging sapi yang segar dengan kualitas yang halal. SiMatong menyediakan daging yang menjual daging tersebut dengan konsep patungan yang dimana nantinya para pembeli akan iuran sesuai daging yang dipesan. </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul>
                    <li>Pesan daging pada saat Hari Raya Idul Fitri dan Idul Adha</li>
                    <li>Kualitas daging yang baik dan halal</li>
                    <li>Pengiriman yang cepat </li>
                </ul>
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
                    <!-- <small class="txt"><?php echo $foto["nama_event"] ?></small><br> -->
                    <a href="produk.php?halaman=detail&id=<?= $foto["id_produk"];  ?>" class="card-title" id="title"><?= $foto["nama_produk"];  ?></a><br>
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

    <section class="about" id="about">
            <div class="container">
            <div class="row">
                <div class="col-md-12 my-3">
                    <h3 class="text-center">Patungan</h3>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-card-header-pills pt-4 text-center">
                                <span class="fa fa-2x fa-balance-scale hijau"></span>
                            </div>
                            <div class="card-body">
                            <h5 class="font-weight-bold text-center">Patungan</h5>
                            <p>Kami sebagai penyedia layanan akan mengumpulkan uang para pembeli. Setelah uangnya terkumpul, uang tersebut akan kami gunakan untuk membeli beberapa ekor sapi sesuai stok pesanan yang kami sediakan</p>
                            </div>
                        </div>
                    </div>
                <div class="col-md-4">
                <div class="card">
                    <div class="card-header-pills pt-4 text-center">
                    <!-- <img src="<?= $url_login ?>view/img/health.png" alt=""> -->
                    <span class="fa fa-2x fa-share-alt hijau"></span>
                    </div>
                    <div class="card-body">
                    <h5 class="font-weight-bold text-center">Daging</h5>
                    <p>Daging yang di peroleh nantinya tidak hanya daging biasa aja, tetapi sebagai bonus membeli daging di SiMatong akan ada tambahan seperti tulang sapi tersebut akan dibagi rata sesuai stok yang disediakan. Daging kualitas segar dan halal.</p>
                    </div>
                </div>
                </div>
                <div class="col-md-4">
                <div class="card">
                    <div class="card-header-pills pt-4 text-center">
                    <!-- <img src="view/img/family.png" alt=""> -->
                    <span class="fa fa-2x fa-info-circle hijau"></span>
                    </div>
                    <div class="card-body">
                    <h5 class="font-weight-bold text-center">Kualitas Sapi</h5>
                    <p>Kami sudah bekerja-sama dengan pakar ahli potong sapi dan pakar tersebut sudah berpengalaman dalam hal potong - memotong sapi. Pakar tersebut juga pernah berprofesi sebagai penjual sapi jadi juga berpengalaman memilih sapi yang sehat</p>
                    </div>
                </div>
                </div>
                </div>
                </div>
                </div>
            </div>
        </section>

        <section class="coment">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h5 class="p-3">Komentar</h5>
                    </div>
                </div>
                <div class="row">
                    <?php
                        $querys = query("SELECT * FROM tbl_comment tc INNER JOIN tbl_anggota ta ON ta.id_anggota = tc.id_anggota ORDER BY id_comment DESC LIMIT 4");
                        foreach ($querys as $query) {
                    ?>

                    <div class="col-md-8 col-8 offset-2 box-coment mt-3">
                        <div class="box-header pt-3">
                            <img src="<?= $url_login ?>foto_produk/foto_profil/<?= $query['foto'] ?>" alt="">
                            <a href="#"><?= $query['nama_lengkap'] ?></a>
                            <span><?= $query['tgl_comment'] ?></span>
                        </div>
                        <hr>
                        <div class="box-body">
                            <p><?= $query['comment'] ?></p>
                        </div>
                    </div>
                    <br>
                    <?php
                        }
                        ?>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-8 col- offset-2 text-center">
                        <hr style="width:200px" class="float-left">
                        <a href="">Lihat Komentar Lain </a>
                        <hr style="width:200px" class="float-right">
                    </div>
                </div>
            </div>
        </section>
        