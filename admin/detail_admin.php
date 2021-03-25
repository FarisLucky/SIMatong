<?php 
    $id_pembelian = $_GET['id_beli'];
    $select = "SELECT dp.id_pembelian, produk.foto AS foto_produk,produk.nama_produk,berat,harga,dp.jumlah,total_harga ,tp.total_pembelian FROM detail_pembelian dp INNER JOIN tbl_produk produk ON dp.id_produk = produk.id_produk INNER JOIN tbl_pembelian tp ON dp.id_pembelian = tp.id_pembelian WHERE dp.id_pembelian = '$id_pembelian'";
    $query_pembeli = mysqli_query($conn,$select);
    if ($query_pembeli == true) {
        #
?>
<div class="detail_admin" id="detail_admin">
    <div class="row">
        <div class="col-md-12">
            <h4 class="text-center p">Detail Pembelian</h4>
        </div>
        <div class="col-md-12 text-right">
            <a href="<?= $url_login ?>admin/index.php?halaman=pembelian" class="btn btn-sm btn-warning">Kembali</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-header">
                    <span class="">list Produk</span>
                </div>
                <hr>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <ul>
                                <li>
                                    <?php 
                                        while ($fetch = mysqli_fetch_assoc($query_pembeli)) {
                                    ?>
                                    <div class="row produk_field">
                                        <div class="col-md-4">
                                            <img src="<?= $url_login ?>foto_produk/<?= $fetch['foto_produk']?>" alt="" style="width:150px;">
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="judul"><?= $fetch['nama_produk'] ?></span>
                                                </div>
                                                <div class="col-md-12">
                                                    <span class="judul"><?= $fetch['berat'] ?> gram</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <span class="judul"><?= $fetch['jumlah']?></span>
                                        </div>
                                        <div class="col-md-3">
                                            <span class="judul">Rp <?= number_format($fetch['total_harga'],2,',','.')?></span>
                                        </div>
                                    </div>
                                    <hr class="pembatas">
                                    <?php
                                    }
                                        }
                                    ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="panel panel-default">
                <div class="panel-header text-center">
                    <span>Total Pembelian</span>
                </div>
                <hr>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                                $Total = query("SELECT total_pembelian,status_pembelian,ta.nama_lengkap AS nama_lengkap,ta.no_telp,ta.email,aa.alamat_lengkap,aa.kecamatan,aa.kabupaten,aa.nama_rumah,aa.no_telp AS telp_rumah FROM tbl_pembelian tp INNER JOIN tbl_anggota ta ON tp.id_anggota = ta.id_anggota INNER JOIN alamat_anggota aa ON tp.id_alamat = aa.id_alamat WHERE id_pembelian = '$id_pembelian'");
                            ?>
                            <span>Rp <?= number_format($Total[0]['total_pembelian'],2,',','.') ?></span>
                        </div>
                        <br>
                        <div class="col-md-12 pb pt text-right">
                            <span class="judul link" id="btn_bukti">bukti pembayaran</span>
                        </div>
                        <div class="col-md-12">
                            <?php
                            $status = "Status";
                            $sukses = 'alert-info';
                            if ($Total[0]['status_pembelian'] == 'Pending') {
                                $status = 'Belum Bayar';
                                $sukses = 'alert-danger';
                            }
                            else if ($Total[0]['status_pembelian'] == 'Perlu konfirmasi') {
                                $status = 'Belum di verifikasi';
                                $sukses = 'alert-success';
                            }
                            if ($Total[0]['status_pembelian'] == 'Selesai') {
                                $status = 'Sudah Bayar';
                                $sukses = 'alert-success';
                            }
                            ?>
                            <div class="alert <?= $sukses?>"><span><?= $status ?></span></div>
                        </div>
                        <br>
                        <div class="col-md-12">
                            <?php
                                if ($Total[0]['status_pembelian'] == 'Perlu konfirmasi') {
                            ?>
                            <button type="button" class="btn btn-sm btn-success col-md-12" id="konfirmasi" data-id="<?= $id_pembelian ?>">Konfirmasi</button>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-header">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <span class="">Profil Pembeli</span>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-5">
                            <span class="judul">Nama</span>
                        </div>
                        <div class="col-md-7">
                            <span class="judul"><?= $Total[0]['nama_lengkap'] ?></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-5">
                            <span class="judul">No Telpon</span>
                        </div>
                        <div class="col-md-7">
                            <span class="judul"><?= $Total[0]['no_telp'] ?></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-5">
                            <span class="judul">Email</span>
                        </div>
                        <div class="col-md-7">
                            <span class="judul"><?= $Total[0]['email'] ?></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-5">
                            <span class="judul">Alamat Pengiriman</span>
                        </div>
                        <div class="col-md-7">
                            <span class="judul"><?= $Total[0]['alamat_lengkap'] ?> <?= $Total[0]['kecamatan'] ?> <?= $Total[0]['kabupaten']?><br><?= $Total[0]['telp_rumah'] ?></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-5">
                            <span class="judul">Telpon Rumah</span>
                        </div>
                        <div class="col-md-7">
                            <span class="judul"><?= $Total[0]['telp_rumah'] ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
    	<div class="modal fade " id="modal_bukti" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title" id="exampleModalLongTitle">Detail Pembelian</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
                </div>
                <?php
                    $bukti = query("SELECT bukti_pembayaran FROM pembayaran WHERE id_pembelian = '$id_pembelian'");
                ?>
				<div class="modal-body" id="bukti_bayar">
                    <img src="<?= $url_login ?>foto_produk/bukti_pembayaran/<?= $bukti[0]['bukti_pembayaran'] ?>" alt="">
				</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
			</div>
		</div>
    </div>