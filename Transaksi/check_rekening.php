<?php
        include'../core/koneksi.php';
        if (isset($_POST["id_rek"])) {
                if ($_POST['id_rek'] != '') {
                        $coba =query("SELECT * FROM tbl_rekening WHERE id_rekening = '".$_POST['id_rek']."'");
?>
            <div class="col-md-12">
                <div class="form-group row">
                                <label for="nama" class="col-md-4">Nama Pemilik</label>
                                <div class="col-md-7">
                                        <input type="text" class="form-control form-control-sm" value="<?php echo $coba[0]['nama_pemilik']  ?>">
                                </div>
                </div>
                <div class="form-group row">
                <label for="bank" class="col-md-4">Bank</label>
                <div class="col-md-7">
                <input type="text" class="form-control form-control-sm" value="<?php echo $coba[0]['nama_bank']  ?>">
                    </div>
                </div>
            </div>
<?php
                }
                else{
 ?>
                <div class="form-group row">
                    <label for="nama" class="col-md-3">Nama Pemilik</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="bank" class="col-md-3">Bank</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control form-control-sm">
                    </div>
                </div>
 <?php                       
                }
        }
?>