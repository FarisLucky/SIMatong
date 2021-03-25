<?php
    include'../core/koneksi.php';
    
    // Masuk Ke keranjang
    if (isset($_POST["data_id"])) {
        if (!isset($_SESSION['sudahLogin'])) {
            echo"Anda belum login";
        }
        else if(isset($_SESSION["sudahLogin"])) {
            $id = $_POST["data_id"];
            $stok = $_POST["stok"];
            $jumlah = $_POST["jumlah"];
            $total = $_POST["harga"] * $jumlah;
            $anggota = $_SESSION["id_anggota"];
            $insert = "INSERT INTO keranjang VALUES('','$id','$anggota','$jumlah','$total')";
            $sql = mysqli_query($conn,$insert);
            if (mysqli_affected_rows($conn) > 0) {
                $ttl_stok = $stok - $jumlah;
                $update = "UPDATE tbl_produk SET stok ='$ttl_stok' WHERE id_produk = '$id'";
                $rsUpdate = mysqli_query($conn,$update);
                echo"Produk masuk ke keranjang";
            }
            //echo"<script>location='../produk/produk.php';</script>";
            // echo"<script>alert('berhasil');</script>";
            // echo"<script>location='../transaksi/keranjang.php';</script>";
        }
    }
    // Live Search Berdasarkan Event
    if (isset($_POST['id'])) {
        $tampil='';
        if ($_POST['id'] != '') {        
            $id_event = $_POST['id'];
            $sql = "SELECT * FROM tbl_produk WHERE id_event = '$id_event'";
        }
        else{
            $sql = "SELECT * FROM tbl_produk";
        }
        $rsSelect = mysqli_query($conn,$sql);
        while ($rows = mysqli_fetch_assoc($rsSelect)) {
            $tampil .='
            <div class="col-md-3">
                <div class="card border-0">
                    <img src="'.$url_login.'foto_produk/'.$rows["foto"].'" alt="" class="img-fluid img_hover">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-md-9">
                            <a href="#" class="card-title" id="title">'.$rows["nama_produk"].'</a><br>
                            <small>Rp '.number_format($rows["harga"],2,",",".").'</small>
                        </div>
                        <div class="col-md-3 text-center">
                        <a href="'.$url_login.'transaksi/pesan.php?id='.$rows["id_produk"].'" class="" id="beli_produk">
                            <i class="fa fa-2x fa-cart-plus"></i>
                        </a>
                        </div>
                        </div>
                        <div class="row" id="button">
                        <div class="col-md-12">
                        <a href="produk.php?halaman=detail&id='.$rows["id_produk"].'" class="btn btn-sm btn-outline-primary col-md-12">Detail</a>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            ';
        }
        echo $tampil;
    }

    // Live Search
    if (isset($_POST["search"])) {
        $output = '';
        $search = $_POST["search"];
        $searchData = "SELECT * FROM tbl_produk WHERE nama_produk LIKE '%$search%'";
        $querySearch = mysqli_query($conn,$searchData);
        while ($rows = mysqli_fetch_assoc($querySearch)) {
            $output .='
            <div class="col-md-3">
                <div class="card border-0">
                    <img src="'.$url_login.'foto_produk/'.$rows["foto"].'" alt="" class="img-fluid img_hover">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-md-9">
                            <a href="#" class="card-title" id="title">'.$rows["nama_produk"].'</a><br>
                            <small>Rp '.number_format($rows["harga"],2,",",".").'</small>
                        </div>
                        <div class="col-md-3 text-center">
                        <a href="'.$url_login.'transaksi/pesan.php?id='.$rows["id_produk"].'" class="" id="beli_produk">
                            <i class="fa fa-2x fa-cart-plus"></i>
                        </a>
                        </div>
                        </div>
                        <div class="row" id="button">
                        <div class="col-md-12">
                        <a href="produk.php?halaman=detail&id='.$rows["id_produk"].'" class="btn btn-sm btn-outline-primary col-md-12">Detail</a>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            ';
        }
        echo $output;
    }
?>