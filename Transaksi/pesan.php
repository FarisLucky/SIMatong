<?php
	include'../core/koneksi.php';
	if (!isset($_SESSION['id_anggota']) || empty($_SESSION['id_anggota'])) {
		echo"<script>alert('Maaf Anda Belum Login, Login Dulu ! :)');</script>";
		echo"<script>window.location='../akun/login.php';</script>";
	}
	else{
		$id = $_GET['id'];
		$jumlah = "1";
		$anggota = $_SESSION['id_anggota'];
		$produk = "SELECT jumlah FROM keranjang WHERE id_anggota = '$anggota' AND id_produk = '$id'";
		$queryCheck = mysqli_query($conn,$produk);
		$numRows = mysqli_num_rows($queryCheck);
		if ($numRows == true) {
			$fetch = mysqli_fetch_assoc($queryCheck);
			$autoJumlah = $fetch['jumlah'] + $jumlah;
			$harga = query("SELECT harga FROM tbl_produk WHERE id_produk ='$id'");
			$sumTotal = $harga[0]['harga'] * $autoJumlah;
			
			$updateJumlah = "UPDATE keranjang SET jumlah = '$autoJumlah', total_pembelian = '$sumTotal' WHERE id_anggota = '$anggota' AND id_produk = '$id'";
			$queryUpdate = mysqli_query($conn,$updateJumlah);
			if ($queryUpdate == true) {
				$produk = query("SELECT stok FROM tbl_produk WHERE id_produk = '$id'");
				$stok = $produk[0]['stok'] - $jumlah;
				$update = "UPDATE tbl_produk SET stok ='$stok' WHERE id_produk = '$id'";
				$rsUpdate = mysqli_query($conn,$update);
				echo"<script>alert('Barang Sukses di Keranjang');</script>";
				echo"<script>window.location='keranjang.php';</script>";
				exit;
			}
			else {
				mysqli_error($conn);
				exit;
			} 
		}
		else{
			$sql = query("SELECT harga FROM tbl_produk WHERE id_produk = '$id'");
			$sumTotal = $sql[0]['harga'] * $jumlah;
			$insertProduk = "INSERT INTO keranjang VALUES('','$id','$anggota','$jumlah','$sumTotal')";
			$queryInsert = mysqli_query($conn,$insertProduk);
			if (mysqli_affected_rows($conn) > 0) {
				$produk = query("SELECT stok FROM tbl_produk WHERE id_produk = '$id'");
				$stok = $produk[0]['stok'] - $jumlah;
				$update = "UPDATE tbl_produk SET stok ='$stok' WHERE id_produk = '$id'";
				$rsUpdate = mysqli_query($conn,$update);
				echo"<script>alert('Barang Sukses di Keranjang');</script>";
				echo"<script>window.location='keranjang.php';</script>";
				exit;
			}
			else {
				echo mysqli_error($conn);
				exit;
			}
		}
	}

?>