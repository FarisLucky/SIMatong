<?php
    include"../core/koneksi.php";
    $_SESSION['title'] = "History !";
    include'../header.php';
    $tempo="";
    if (!isset($_SESSION['id_anggota']) || empty($_SESSION['id_anggota'])) {
        echo"<script>alert('Maaf, Anda Harus Login Dulu');</script>";
        echo"<script>location='../akun/login.php';</script>";
    }
    $nama_pemesan = '';
    $alamat = '';
    $alamat_pemesan='';
    $users = query("SELECT * FROM tbl_anggota WHERE id_anggota ='".$_SESSION['id_anggota']."'");

    if (isset($_SESSION["id_anggota"])) {
        $sql = "SELECT id_alamat,nama_rumah,alamat_lengkap,kecamatan,kabupaten,no_telp,(SELECT email from tbl_anggota WHERE id_anggota = '".$_SESSION['id_anggota']."') AS email,(SELECT nama_lengkap from tbl_anggota WHERE id_anggota = '".$_SESSION['id_anggota']."') AS nama_lengkap FROM alamat_anggota WHERE id_anggota = '".$_SESSION['id_anggota']."'";
        $querySelect = mysqli_query($conn,$sql);
        $alert = "";
        if (mysqli_num_rows($querySelect) == true) {
            $getData = mysqli_fetch_assoc($querySelect);
            $id_alamat = $getData['id_alamat'];
            $nama_pemesan = 'Nama Pemesan : '.$getData["nama_lengkap"].'<br>'.$getData["no_telp"].'<br>'.$getData["email"].'';
            $alamat ='Alamat : '.$getData["alamat_lengkap"].' Kec. '.$getData["kecamatan"].' Kab. '.$getData["kabupaten"].'<br>Rumah '.$getData["nama_rumah"].'';
        }
        else{
            $alert .="<div class='alert alert-danger'>Silahkan Tambahkan Alamat Pemesanan di Profil</div>";
        }
    }
    if (isset($_POST['simpan_alamat'])) {
        $pilih = mysqli_real_escape_string($conn,$_POST['pilihan_anda']);
        $select = "SELECT id_alamat,nama_rumah,alamat_lengkap,kecamatan,kabupaten,no_telp,(SELECT email from tbl_anggota WHERE id_anggota = '".$_SESSION['id_anggota']."') AS email,(SELECT nama_lengkap from tbl_anggota WHERE id_anggota = '".$_SESSION['id_anggota']."') AS nama_lengkap FROM alamat_anggota WHERE id_alamat = '$pilih'";
        $querySelect = mysqli_query($conn,$select);
        if ($querySelect == true) {
            $getData = mysqli_fetch_assoc($querySelect);
            $nama_pemesan = 'Nama Pemesan : '.$getData["nama_lengkap"].'<br>'.$getData["no_telp"].'<br>'.$getData["email"].'';
            $alamat ='Alamat : '.$getData["alamat_lengkap"].' Kec. '.$getData["kecamatan"].' Kab. '.$getData["kabupaten"].' <br>Rumah '.$getData["nama_rumah"].'';
            $id_alamat = $getData["id_alamat"];
        }
        else{
            mysqli_error($conn);
        }
    }
    // var_dump($_SESSION["pemesan"]["id_pemesan"]." ".$_SESSION["pemesan"]["alamat_pemesan"]." ".$_SESSION["pemesan"]["id_ongkir"]);
?>
<section class="checkout" id="checkout" >
    <div class="row">
        <div class="col-md-12 text-center">
            <h4 class="pb-3">Detail Pesanan</h4>
        </div>
    </div>
    <form action="" method="post" id="checkout_pemesanan">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <section id="akun" class="checkout_step">
                    <h2 class="info_pemesan"><span class="d-inline-block number">1</span>&nbsp;Informasi Pemesan</h2>
                    <div class="content">
                        <?php
                            if (!empty($_SESSION["pemesan"]["id_pemesan"])) {
                        ?>
                        <input type="hidden" id="akun_hidden" name="akun_hidden" value="<?= $_SESSION['pemesan']['id_pemesan'] ?>">
                        <?php
                            }
                        ?>
                        <p>Data akun sesuai dengan data <a href="<?= $url_login?>akun/akun.php"><?= $users[0]['nama_lengkap'] ?></a></p>
                        <p>Atau anda ingin logout <a href="<?= $url_login?>akun/logout.php">Logout</a></p>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-simpan btn-sm float-right" id="info_akun" name="info_akunName" value="<?= $users[0]["id_anggota"] ?>">Lanjutkan</button>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="alamat" class="checkout_step">
                    <h2 class="alamat_pemesan"><span class="d-inline-block alamat_number">2</span>&nbsp;Alamat Pemesan</h2>
                    <div class="content_alamat">
                        <?php
                            if (!empty($_SESSION["pemesan"]["alamat_pemesan"])) {
                                # code...
                        ?>
                        
                        <input type="hidden" id="alamat_hidden" name="alamat_hidden" value="<?= $_SESSION['pemesan']['alamat_pemesan'] ?>">
                        
                        <?php
                            }
                        ?>
                        <p>Pilih alamat yang digunakan untuk alamat pemesanan, jika belum ada alamat maka tambahkan alamat <a href="<?= $url_login ?>akun/alamat-1.php">Disini</a></p>
                        <div class="row">
                            <div class="col-md-10">
                                <p class="alamat_utama">Alamat Utama</p>
                                <div class="pilihan_alamat">
                                    <div class="row">
                                    <div class="col-md-6">
                                        <p><?= $nama_pemesan; ?></p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= $alamat; ?></p>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-sm btn-kuning" id="ubah_pemesan" data-alamat="<?php echo $id_alamat; ?>" data-id="<?php echo $_SESSION['id_anggota'] ?>">Ubah</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-simpan btn-sm float-right" id="info_alamat" name="info_alamatName" value="<?= $id_alamat ?>">Lanjutkan</button>
                            </div>
                        </div>
                    </div>    
                </section>
                <section id="ongkir" class="checkout_step">
                    <h2 class="ongkir_pemesan"><span class="d-inline-block ongkir_number">3</span>&nbsp;Ongkir Pemesanan</h2>
                    <div class="content_ongkir">
                        <?php
                            if (!empty($_SESSION["pemesan"]["ongkir_pemesan"])) {
                            
                        ?>

                        <input type="hidden" id="ongkir_hidden" name="ongkir_hidden" value="<?= $_SESSION['pemesan']['id_ongkir'] ?>">
                        
                        <?php
                            } 
                        ?> 
                        <p>Pilih Ongkos Kirim untuk pengiriman barang anda : </p>

                        <div class="row">
                            <div class="col-md-6">
                                <select name="ongkir" id="ongkir" class="custom-select form-control form-control-sm">
                                    <option data-value="ongkir" value="pilih ongkir">Pilih Ongkos Kirim</option>
                                    <?php
                                        $ongkirs = query("SELECT * FROM ongkir");
                                        foreach ($ongkirs as $ongkir) {
                                    ?>
                                    <option data-value="<?php echo $ongkir['Harga'] ?>" value="<?php echo $ongkir['id_ongkir']; ?>"><?php echo $ongkir["Kecamatan"]; ?> - Rp <?php echo number_format($ongkir["Harga"],2,",","."); ?></option>
                                    <?php       
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-kuning btn-sm" id="check_total">Check Total</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-simpan btn-sm float-right" name="info_ongkirName" id="info_ongkir" data-ongkir="<?= $_SESSION['pemesan']['id_ongkir'] ?>">Lanjutkan</button>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="pembayaran" class="checkout_step">
                    <h2 class="bayar_pesanan"><span class="d-inline-block">4</span>&nbsp;Pesan Sekarang</h2>
                    <div class="content_bayar">
                        <?php
                            if (isset($_SESSION["pemesan"]["ongkir_pemesan"])) {
                        
                        ?>
                        <input type="hidden" id="ongkir_hidden" name="ongkir_hiddenName" value="<?= $_SESSION['pemesan']['ongkir_pemesan'] ?>">
                        <?php 
                            }
                        ?>
                        <p>Pesan barang anda Sekarang juga sebelum kehabisan stok :v </p>
                        
                        <div class="row mt-4">
                            <div class="col-md-7">
                                <p><strong>Catatan !</strong> Batas terakhir pembayaran 3 Hari setelah pemesanan</p>
                            </div>
                            <div class="col-md-5">
                                <button type="submit" class="btn btn-danger col-md-12" name="pesan_barang" id="pesan_barang">Buat Pesanan</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </section>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <span class="jumlah">Jumlah Produk</span>
                                        <!-- Ambil data Count -->
                                <?php
                                    $count = "SELECT SUM(jumlah) AS jumlah FROM keranjang WHERE id_anggota = '".$_SESSION['id_anggota']."'";
                                    $queryCount = mysqli_query($conn,$count);
                                    $fetchCount = mysqli_fetch_assoc($queryCount);
                                ?>
                                        <span class="jumlah float-right"><?= $fetchCount['jumlah'] ?></span>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <span class="jumlah">Total Pembelian</span>
                                        <!-- Ambil data SUM -->
                                <?php
                                    $count = "SELECT SUM(total_pembelian) AS total FROM keranjang WHERE id_anggota = '".$_SESSION['id_anggota']."'";
                                    $queryCount = mysqli_query($conn,$count);
                                    $fetchCount = mysqli_fetch_assoc($queryCount);
                                ?>
                                        <span class="jumlah total_value float-right" data-harga="<?= $fetchCount["total"] ?>">Rp <?= number_format($fetchCount['total'],2,',','.') ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <span class="jumlah">Ongkos Kirim</span>
                                        <!-- Ambil data SUM --> 
                                        <span class="jumlah_value jumlah float-right">
                                            <?php 
                                            if (isset($_SESSION["pemesan"]["ongkir_pemesan"])) {
                                                echo"Rp ".$_SESSION["pemesan"]["ongkir_pemesan"]; 
                                            }
                                            else {
                                                echo"Rp 0";
                                            }
                                            ?></span>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php 
                                            $ttl="";
                                            if (isset($_SESSION["pemesan"]["ongkir_pemesan"])) {
                                                $ongkir = $_SESSION["pemesan"]["ongkir_pemesan"];
                                                $jml = $fetchCount["total"];
                                                $ttl = $jml + $ongkir;
                                            }
                                            else {
                                                $ttl = "0";
                                            }
                                            ?>
                                        <span class="jumlah">Total Pemesanan</span>
                                        <input type="hidden" id="ttl_pembelian" name="ttl_pembelian" value="<?= $ttl;?>">
                                        <span class="ttl_all float-right">Rp <?= $ttl ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>						
                </div>
                <br>
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 py-2">
                                        <span class="text-mading"><i class="fa fa-check-square"></i>&nbsp;Produk Daging Segar dan sehat sudah terjamin</span>
                                    </div>
                                    <hr>
                                    <div class="col-md-12 py-2">
                                        <span class="text-mading"><i class="fa fa-car"></i>&nbsp;Pengiriman Cepat tanpa Lambat</span>
                                    </div>
                                    <hr>
                                    <div class="col-md-12 py-2">
                                        <span class="text-mading"><i class="fa fa-hand-lizard-o"></i>&nbsp;Harga Murah dan Kualitas Mewah</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>					
                </div>
            </div>
        </div>
    </div>
</section>

<div class="row pt-4">
	<div class="container font-artikel">
		<div style="width: 100%; height: 20px; border-bottom: 1px solid black; text-align: center">
		<span style="font-size: 20px; background-color: #F3F5F6; padding: 0 10px;">
		Lihat Artikel Lain
		</span>
		</div>
	</div>
</div>
<br>
<div class="container">
	<div class="row">
	<?php
		$ambilArtikel = query("SELECT * FROM tbl_artikel order by id_artikel desc");
		foreach ($ambilArtikel as $artikel) {
	?>
		<!-- <div class="col-md-2">
		</div> -->
		<div class="col-md-3">
		<a href="<?= $url_login ?>artikel/detail.php?id_artikel=<?php echo $artikel['id_artikel']?>" class="" style="color: 	black; text-decoration: none;">
			<img src="<?php echo $url_login ."view/img/artikel/". $artikel['foto'] ?>"  height="150px" alt="responsive image">
			<div class="card-title font-weight-bold">
				<?php echo $artikel['Judul_artikel'] ?><br>
					<small><span class="fa fa-user"></span>by : Admin</small>
			</div>
			<div class="card-body">
				<small><?php echo substr($artikel['deskripsi'],0,50) ?>...</small>
			</div>
		</a>
		</div>
		<!-- <div class="col-md-2">	
		</div> -->
	<?php } ?>
</div>
</div>


<div class="modal fade" id="pilih_alamat">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-fa-address-book"></i>Pilih Alamat</h5>
                <button type="buttong" class="close" data-dismiss="modal">
                    <span class="fa fa-close"></span>
                </button>
            </div>
            <div class="modal-body body_alamat">

            </div>
            <div class="modal-footer">
                <small>copyright&copy;2018&amp;SIMatong</small>
            </div>
        </div>
    </div>
</div>
<?php
    include'../footer.php';
?>