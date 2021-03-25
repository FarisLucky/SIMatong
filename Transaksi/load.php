<section id="alamat" class="checkout_step">
                    <h2 class="alamat_pemesan disabled"><span class="d-inline-block alamat_number">2</span>&nbsp;Alamat Pemesan</h2>
                    <div class="content_alamat">
                        <input type="hidden" id="alamat_hidden" name="alamat_hidden" value="<?= $id_alamat ?>">
                        <p>Pilih alamat yang digunakan untuk alamat pemesanan, jika belum ada alamat maka tambahkan alamat <a href="<?= $url_login ?>akun/alamat-1.php">Disini</a></p>
                        <div class="row">
                            <div class="col-md-10">
                                <p class="alamat_utama">Alamat Utama</p>
                                <div class="pilihan_alamat">
                                    <div class="row">
                                    <div class="col-md-6">
                                        <p><?= $nama_pemesan; ?></p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= $alamat; ?></p>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-sm btn-kuning" id="ubah_pemesan" data-alamat="<?php echo $id_alamat; ?>" data-id="<?php echo $_SESSION['id_anggota'] ?>">Ubah</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-simpan btn-sm float-right" id="info_alamat" name="info_alamatName" value="<?= $id_alamat ?>">Lanjutkan</button>
                            </div>
                        </div>
                    </div>    
                </section>