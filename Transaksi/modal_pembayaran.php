<?php
    include"../core/koneksi.php";
?>
<section class= "pembayaran" id="pembayaran">
    <div class="container">
        <div class="row">
            <div class="col-md-8 pr-3">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row bayar_header">
                <!-- <div class="hello"> -->
                </div>
                <div class="fm_rekening">
                <div class="form-group row">
                    <label for="rekening" class="col-md-3">Nomor Rekening</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control form-control-sm">
                    </div>
                </div>
                </div>
                <div class="row" id="shw_rekening">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="nama" class="col-md-3">Nama Pemilik</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bank" class="col-md-3">Bank</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                                <label for="upload" class="col-md-3">Bukti Bayar</label>
                                <div class="col-md-9">
                                    <input type="file" class="form-control form-control-sm" name="upload_bayar" id="bukti">
                                </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-circle btn-sm btn-warning col-md-3 text-white">Batal</button>
                    <button type="submit" class="btn btn-circle btn-sm btn-danger col-md-3" name="kirim_pembayaran">Kirim</button>
                </div>
            </form>
            </div>
            <div class="col-md-4 pl-0">
                <div class="alert alert-info mt-3">Pembayaran Produk dikirim ke No Rekening <strong>0021-01-162902-50-0</strong> atas nama <strong>Admin siMatong</strong>
                lewat bank <strong>BRI</strong></div>
            </div>
        </div>
    </div>
</section>