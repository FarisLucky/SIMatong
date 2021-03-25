<?php 
	include"../../core/koneksi.php";
	if (isset($_POST["hidden_id"])) {		
	$id = $_POST["hidden_id"];
    $namaProduk = ucwords(mysqli_escape_string($conn,$_POST["Nama_produk"]));
    $deskripsi = mysqli_escape_string($conn,$_POST["deskripsi"]);
    $berat = mysqli_escape_string($conn,$_POST["berat"]);
    $harga = mysqli_escape_string($conn,$_POST["harga"]);
    $stok = mysqli_escape_string($conn,$_POST["stok"]);
    $event = $_POST["event"];
    $nama_foto = $_FILES["upload_foto"]['name'];
	$lokasi_foto = $_FILES["upload_foto"]['tmp_name'];
	$size_foto = $_FILES["upload_foto"]["size"];
	// jika tidak kosong lokasi foto sementara
    if (!empty($lokasi_foto)) {
		$ext = array("jpeg","jpg","png");
		$getExt = strtolower(end(explode(".",$nama_foto)));
		if (in_array($getExt,$ext)) {
			if ($size_foto != 0) {
				$nama_foto = query("SELECT foto FROM tbl_produk WHERE id_produk = '$id'");
				unlink("../foto_produk/".$nama_foto[0]['foto']);
				move_uploaded_file($lokasi_foto,"../foto_produk/".$nama_foto);  
				$sql = "UPDATE tbl_produk set nama_produk='$namaProduk', deskripsi = '$deskripsi',berat='$berat',foto='$nama_foto',harga='$harga',stok='$stok',id_event='$event' WHERE id_produk='$id'";
				$result = mysqli_query($conn,$sql);
			}
			else {
				echo"<script>alert('Masukkan Format Gambar yang benar !')</script>";
				return false;
			}
		}
		else{
			echo"<script>alert('Masukkan Format Gambar yang benar !')</script>";
			return false;
		}
    }
    else{
    $sql = "UPDATE tbl_produk set nama_produk='$namaProduk', deskripsi = '$deskripsi',berat='$berat',harga='$harga',stok='$stok',id_event='$event' WHERE id_produk='$id'";
    $result = mysqli_query($conn,$sql);  
	}
	echo "<script>location='index.php?halaman=produk'</script>";
	}
?>