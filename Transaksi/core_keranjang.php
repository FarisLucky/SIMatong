<?php
    include'../core/koneksi.php';
	if (isset($_POST["id_anggota"]) && isset($_POST["id_produk"])) {
		$tampil = "";
		$id_anggota = mysqli_real_escape_string($conn,$_POST["id_anggota"]);
		$id_produk = mysqli_real_escape_string($conn,$_POST["id_produk"]);
		
		// Ambil Data
		$getCart = "SELECT id_produk,id_anggota,jumlah FROM keranjang WHERE id_produk ='$id_produk' AND id_anggota= '$id_anggota'";
		$queryGet = mysqli_query($conn,$getCart);
		$rsNum = mysqli_num_rows($queryGet);
		if ($rsNum == 1) {
			$fetchRows = mysqli_fetch_assoc($queryGet);
			$tampil .='
                <form action="" method="post" id="form_modalCart">
                    <input type="hidden" name="id_produkCart" id="id_produkCart" value="'.$fetchRows['id_produk'].'">
                    <input type="hidden" name="id_anggotaCart" id="id_anggotaCart" value="'.$fetchRows['id_anggota'].'">
                    <div class="form-group">
                        <label for="input_jumlah"><i class="fa fa-balance-scale"></i>&nbsp;Jumlah</label>
                        <input type="number" id="input_jumlah" name="input_jumlahName" class="form-control form-control-sm" value="'.$fetchRows["jumlah"].'">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-sm btn-success" id="simpan_qttY" name="simpan_qtt">Simpan</button>
                    </div>
                </form>
			';
        }
        else {
			mysqli_error($conn);
		}
		echo $tampil;
    }
	$sql = "SELECT id_keranjang FROM keranjang WHERE id_anggota = '".$_SESSION['id_anggota']."'";
	$query = mysqli_query($conn,$sql);
	$result = mysqli_num_rows($query);
	if ($result == NULL) {
		echo"Keranjang belanja kosong";
	}
    
?>