<?php 
  include "../core/koneksi.php";
  $_SESSION['title'] = "Produk !";
  include"../header.php";
  if (isset($_GET["halaman"])) {
    if ($_GET["halaman"] == "detail") {
      include 'produk_detail.php';
    }
  }
  else{
    include 'tampil_produk.php';
  }
include'../footer.php';
?>