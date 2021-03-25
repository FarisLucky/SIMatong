<?php
    include'../core/koneksi.php';
    $id = $_POST["keranjang"];
    $id_produk = $_POST['produk'];
    $jumlah = $_POST['jumlah'];
    $getProduk = "SELECT stok FROM tbl_produk WHERE id_produk = '$id_produk'";
    $rsProduk = mysqli_query($conn,$getProduk);
    if (mysqli_num_rows($rsProduk) == true) {
        $fetchProduk = mysqli_fetch_assoc($rsProduk);
    }
    $hapus = "DELETE FROM keranjang WHERE id_keranjang = '$id'";
    $sql = mysqli_query($conn,$hapus);
    if ($sql == true) {
        $setProduk = $fetchProduk['stok'] + $jumlah;
        $stokUpdate = "UPDATE tbl_produk SET stok = '".$fetchProduk['stok']."'";
        $rsUpdate = mysqli_query($conn,$stokUpdate);
    }
    // echo"<script>alert('Produk dihapus dari keranjang')</script>";
    // echo"<script>location='keranjang.php';</script>";
?>