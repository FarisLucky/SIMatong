<?php
    include"../../core/koneksi.php";
    if (isset($_POST['id_pembelian'])) {
        $pembelian = $_POST['id_pembelian'];

        // Query;
        $query = "UPDATE tbl_pembelian SET status_pembelian='Selesai' WHERE id_pembelian = '$pembelian'";
        $queryUpdate = mysqli_query($conn,$query);
        if ($queryUpdate) {
            echo "Berhasil di Konfirmasi";
        }
        else{
            echo mysqli_error($conn);
        }
    }
?>