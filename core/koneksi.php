<?php 
	session_start();
	$db = "simatong";
	$conn = mysqli_connect("localhost","root","",$db) or die(mysql_error());
	$url_login = "http://localhost/simatong/";
	
function query($db){ 
	global $conn;
	$result = mysqli_query($conn,$db);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	} 
	return $rows; 
}

// Insert Daftar Anggota
function insertDaftar($data){
	global $conn;
	$nama	= ucfirst(mysqli_real_escape_string($conn,$data["Nama"]));
	$user	= strtolower(stripslashes($data["User"]));
	$jk		= mysqli_real_escape_string($conn,$data["jenis_kelamin"]);
	$tgl	= mysqli_real_escape_string($conn,$data["tgl_lahir"]);
	$tempat	= mysqli_real_escape_string($conn,$data["tempat"]);
	$alamat	= mysqli_real_escape_string($conn,$data["alamat"]);
	$telp	= mysqli_real_escape_string($conn,$data["telp"]);
	$email	= mysqli_real_escape_string($conn,$data["Email"]);
	$pass1	= mysqli_real_escape_string($conn,$data["Password"]);
	$pass2	= mysqli_real_escape_string($conn,$data["Password2"]);
	
	// Cek Username
	$result = mysqli_query($conn,"SELECT * FROM tbl_anggota WHERE username = '$user'");
	if (mysqli_fetch_assoc($result)) {
		echo"<script>alert('user Sudah Terdaftar !')</script>";
		return false;
	}
	// Cek Password
	if ($pass1 !== $pass2) {
		echo"<script>Check();</script>";
	return false;
	}

	$password = password_hash($pass1,PASSWORD_DEFAULT);
	
	$sql = "INSERT INTO tbl_anggota(nama_lengkap,jenis_kelamin,tgl_lahir,tempat_lahir,alamat,email,no_telp,username,password) VALUES('$nama','$jk','$tgl','$tempat','$alamat','$email','$telp','$user','$password')";

	$result = mysqli_query($conn,$sql);

	return mysqli_affected_rows($conn);
}

	// Admin 
function perbaruiProduk($method,$file_foto){
	global $conn;
	global $url_login;
    $namaProduk = ucwords(mysqli_escape_string($conn,$method["Nama_produk"]));
    $deskripsi = mysqli_escape_string($conn,$method["deskripsi"]);
    $berat = mysqli_escape_string($conn,$method["berat"]);
    $harga = mysqli_escape_string($conn,$method["harga"]);
    $stok = mysqli_escape_string($conn,$method["stok"]);
    $event = $method["event"];
    $nama_foto = $file_foto['name'];
	$lokasi_foto = $file_foto['tmp_name'];
	$size_foto = $file_foto["size"];
	// jika tidak kosong lokasi foto sementara
    if (!empty($lokasi_foto)) {
		$ext = array("jpeg","jpg","png");
		$name_photos = explode(".",$nama_foto);
		$getExt = strtolower(end($name_photos));
		if (in_array($getExt,$ext)) {
			if ($size_foto != 0) {
				$get_photo = query("SELECT foto FROM tbl_produk WHERE id_produk = '$_GET[id]'");
				unlink("../foto_produk/".$get_photo[0]['foto']);
				move_uploaded_file($lokasi_foto,"../foto_produk/".$nama_foto);  
				$sql = "UPDATE tbl_produk set nama_produk='$namaProduk', deskripsi = '$deskripsi',berat='$berat',foto='$nama_foto',harga='$harga',stok='$stok',id_event='$event' WHERE id_produk='$_GET[id]'";
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
    $sql = "UPDATE tbl_produk set nama_produk='$namaProduk', deskripsi = '$deskripsi',berat='$berat',harga='$harga',stok='$stok',id_event='$event' WHERE id_produk='$_GET[id]'";
    $result = mysqli_query($conn,$sql);  
    }
    
    return $result;
 }
  function tambahProduk($method,$file_foto){
    global $conn;
    $namaProduk = ucwords(mysqli_escape_string($conn,$method["Nama_produk"]));
    $deskripsi = mysqli_escape_string($conn,$method["deskripsi"]);
    $berat = mysqli_escape_string($conn,$method["berat"]);
    $harga = mysqli_escape_string($conn,$method["harga"]);
    $stok = mysqli_escape_string($conn,$method["stok"]);
    $event = $method["event"];
    $nama_foto = $file_foto['name'];
    $lokasi_foto = $file_foto['tmp_name'];
	$size_foto = $file_foto['size'];
	
	$ext = array(".jpeg","jpg","png");
	$getExt = strtolower(end(explode(".",$nama_foto)));
	if (in_array($getExt,$ext)) {
		if ($size_foto != 0) {
			move_uploaded_file($lokasi_foto,"../foto_produk/".$nama_foto);
			$sql = "INSERT INTO tbl_produk(nama_produk,deskripsi,berat,foto,harga,stok,id_event) VALUES('$namaProduk','$deskripsi','$berat','$nama_foto','$harga','$stok','$event')";
			$result = mysqli_query($conn,$sql);
			return mysqli_affected_rows($conn);
		}
		else {
			echo"<script>alert('Gagal ! Ukuran Gambar Max 2MB')</script>";
		}
	}
	else {
		echo"<script>alert('Masukkan Format gambar yang benar !')</script>";
	}
 }
function saran($tb, $fields, $values){
	global $conn;

	$imFields = implode(",", $fields);
	$imValues = implode(",", $values);

	$sql = "insert into $tb($imFields) values($imValues)";
	$result = mysqli_query($conn, $sql);

	$success = "no";
	if ($result) {
		$success = "yes";
		echo"<script>alert('Data BErhasil di tambahkan')</script>";
		return $success;
	}
}


// BUAT PESANAN
function bayar($sessi_pembeli,$jumlah_bayar){
	global $conn;
	$pembeli = $sessi_pembeli;
	$rek = $_POST['rekening'];
	$tgl_bayar = date('Y-m-d');
	$foto = $_FILES["upload_bukti"]['name'];
	$lokasi = $_FILES["upload_bukti"]['tmp_name'];
	move_uploaded_file($lokasi,"../upload_foto/".$foto);

	$insert = "INSERT INTO tbl_pembayaran VALUES('','$pembeli','$rek','$jumlah_bayar','$tgl_bayar','$foto')";
	$rs = mysqli_query($conn,$insert);

	return mysqli_affected_rows($conn);
}

?>
