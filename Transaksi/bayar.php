<?php
    include"../core/koneksi.php";
    $_SESSION["title"] = "Bayar !";
    include'../header.php';
    // $pembelian = $_GET['pembelian'];
    $pembelian = $_GET['id'];
    $bayar = "SELECT total_pembelian FROM tbl_pembelian WHERE id_pembelian = '$pembelian'";
    $query = mysqli_query($conn,$bayar);
    $rs = mysqli_fetch_assoc($query);
        // Kode SMT(bulan)(tgl)(nopesanan)
    $date = date("d");
    $selectSql = "SELECT MAX(kd_pembayaran) as kd_pembayaran FROM pembayaran";
    $querySelect = mysqli_query($conn,$selectSql);
    $fetch = mysqli_fetch_assoc($querySelect);
    $kd_brg = $fetch["kd_pembayaran"];
    $urut  = (int) substr($kd_brg,6);
    $urut++;
    $char = "SMT".$date;
    $kd_pmbyrn = $char .sprintf("%04s",$urut);

    if (!isset($_SESSION['id_anggota']) || empty($_SESSION['id_anggota'])) {
        echo"<script>alert('Maaf, Anda Harus Login Dulu');</script>";
        echo"<script>location='../akun/login.php';</script>";
    }
    if (isset($_POST["kirim_pembayaran"])){
        $rekening = $_POST["rek"];
        $now = date("Y-m-d");
        $total_beli = $rs["total_pembelian"];
        $bukti = $_FILES["upload_bayar"]["name"];
        $loc = $_FILES["upload_bayar"]["tmp_name"];
        $size = $_FILES["upload_bayar"]["size"];
        // var_dump($_FILES);
        if (!empty($bukti)) {
            $validate = array("jpg","jpeg","png");
            $getExt = explode(".",$bukti);
            $ext = strtolower(end($getExt));
            if (in_array($ext,$validate)) {
                if ($size != 0) {
                    $upload = move_uploaded_file($loc,"../foto_produk/bukti_pembayaran/".$bukti);
                    $insert = "INSERT INTO pembayaran VALUES('$kd_pmbyrn','$pembelian','$rekening','$total_beli','$now','$bukti')";
                    $queryInsert = mysqli_query($conn,$insert);
                    if (mysqli_affected_rows($conn) > 0) {
                        $confirm = ucfirst('perlu konfirmasi');
                        $updatePembelian = "UPDATE tbl_pembelian SET status_pembelian = '$confirm' WHERE id_pembelian ='$pembelian'";
                        $queryUpdate = mysqli_query($conn,$updatePembelian);
                        if ($queryUpdate == true) {
                            echo"<script>alert('Pembayaran akan di proses oleh admin');</script>";
                            echo"<script>window.location='history.php'</script>";
                        }
                    }
                }
                else {
                    echo"<script>alert('Ukuran Gambar Max 2 MB')</script>";
                }
            }
            else {
                echo"<script>alert('Masukkan Format Gambar yang Benar')</script>";
            }
        }
    }
?>

<section class= "pembayaran" id="pembayaran">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row bayar_header">
                <!-- <div class="hello"> -->
                <div class="col-md-4">
                    <a href="../" class="btn btn-sm btn-info mt-2"><i class="fa fa-plus-circle"></i>&nbspKelola Rekening </a>
                </div>
                <div class="col-md-8 mb-3 mt-2">
                    <h5 class="text-center">Pembayaran</h5>
                </div>
                <!-- </div> -->
                </div>
                <div class="fm_rekening">
                <div class="form-group row">
                    <label for="rekening" class="col-md-4">Nomor Rekening</label>
                    <div class="col-md-7">
                        <input type="text" name="" class="form-control form-control-sm" id="">
                    </div>
                </div>
                </div>
                <div class="row" id="shw_rekening">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="nama" class="col-md-4">Nama Pemilik</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bank" class="col-md-4">Bank</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                                <label for="upload" class="col-md-4">Bukti Bayar</label>
                                <div class="col-md-7">
                                    <input type="file" class="form-control form-control-sm" name="upload_bayar" id="bukti">
                                </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-circle btn-warning col-md-3 text-white">Batal</button>
                    <button class="btn btn-circle btn-danger col-md-3" name="kirim_pembayaran">Kirim</button>
                </div>
            </form>
            </div>
            <div class="col-md-6">
            <div class="alert alert-warning alert-dismissible fade show mt-4" role="alert">
                <strong>Jika Belum ada Rekening,</strong> Klik tombol <strong>kelola akun rekening</strong> atau untuk mengelola rekening anda yang akan di gunakan untuk pembayaran atau <a href=""><strong>Klik disini </strong></a>untuk bayar tanpa save rekening.

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="alert alert-info mt-3">Pembayaran Produk dikirim ke No Rekening <strong>0021-01-162902-50-0</strong> atas nama <strong>Admin siMatong</strong>
                lewat bank <strong>BRI</strong> dengan jumlah sebesar <strong>Rp <?php echo number_format($rs['total_pembelian'],2,',','.') ?></strong></div>
            </div>
        </div>
    </div>
</section>

<?php
    include'../footer.php';
?>