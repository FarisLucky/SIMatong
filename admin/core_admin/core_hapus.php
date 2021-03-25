<?php 
	if (isset($_GET['id'])) {
		# code...
		$hapusProduk = query("SELECT * FROM tbl_produk WHERE id_produk = '$_GET[id]'");
		$foto = $hapusProduk[0]["foto"];
		if (file_exists("../foto_produk/$foto")) {
			unlink("../foto_produk/$foto");
		}

		$delete = mysqli_query($conn,"DELETE FROM tbl_produk WHERE id_produk='$_GET[id]'");
		if ($delete == true ) {
			echo "<script>alert('Data diHapus Gan');</script>";
			echo "<script>location='index.php?halaman=produk'</script>";
		}
	else{
		echo "gagal".mysqli_error($conn);
	} 
	}
	elseif (isset($_GET["id_event"])) {
		$id_event = $_GET['id_event'];
		$sql = "DELETE FROM tbl_event WHERE id_event = '$id_event'";
		$queryDelete = mysqli_query($conn,$sql);
		if ($queryDelete == true) {
			echo "<script>alert('Data diHapus Gan');</script>";
			echo "<script>location='index.php?halaman=event'</script>";
		}
		else {
			echo "gagal".mysqli_error($conn);
		}
	}
 ?>