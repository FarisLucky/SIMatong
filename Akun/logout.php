<?php 
require"../core/koneksi.php";
$_SESSION = [];
session_unset();
session_destroy();
echo"<script>alert('Terimakasih Sudah Login');</script>";
echo"<script>location='../index.php';</script>";
exit;

 ?>