<?php
    include"../../core/koneksi.php";
    if (isset($_POST["input"])) {
        $tampil="";
        $no = "1";	 
        $input = $_POST["input"];
        $dataPembelian = "SELECT tp.id_pembelian AS id_pembelian,ta.nama_lengkap,tp.tgl_pembelian,tp.total_pembelian,aa.alamat_lengkap,tp.status_pembelian FROM tbl_pembelian tp INNER JOIN tbl_anggota ta ON tp.id_anggota = ta.id_anggota INNER JOIN alamat_anggota aa ON aa.id_alamat = tp.id_alamat WHERE ta.nama_lengkap LIKE '%$input%'";
        $queryData = mysqli_query($conn,$dataPembelian);
        while ($pembelian = mysqli_fetch_assoc($queryData)) {
    
        $tampil.='
        <tr>
            <td>'.$no.'</td>
            <td>'.$pembelian["nama_lengkap"].'</td>
            <td>'.$pembelian["tgl_pembelian"].'</td>
            <td>'.$pembelian["total_pembelian"].'</td>
            <td>'.$pembelian["alamat_lengkap"].'</td>
            <td>'.$pembelian["status_pembelian"].'</td>
            <td>
                <a href="index.php?halaman=detail&id='.$pembelian["id_pembelian"].'" class="btn btn-danger btn-sm" name="detail">Detail</a>
            </td>
        </tr>
        ';
            $no++;
        }

        echo $tampil;
    }

    if (isset($_POST["input_status"])) {
        $tampil="";
        $no = "1";	 
        $input = $_POST["input_status"];
        $dataPembelian = "SELECT tp.id_pembelian AS id_pembelian,ta.nama_lengkap,tp.tgl_pembelian,tp.total_pembelian,aa.alamat_lengkap,tp.status_pembelian FROM tbl_pembelian tp INNER JOIN tbl_anggota ta ON tp.id_anggota = ta.id_anggota INNER JOIN alamat_anggota aa ON aa.id_alamat = tp.id_alamat WHERE tp.status_pembelian LIKE '%$input%'";
        $queryData = mysqli_query($conn,$dataPembelian);
        while ($pembelian = mysqli_fetch_assoc($queryData)) {
    
        $tampil.='
        <tr>
            <td>'.$no.'</td>
            <td>'.$pembelian["nama_lengkap"].'</td>
            <td>'.$pembelian["tgl_pembelian"].'</td>
            <td>'.$pembelian["total_pembelian"].'</td>
            <td>'.$pembelian["alamat_lengkap"].'</td>
            <td>'.$pembelian["status_pembelian"].'</td>
            <td>
                <a href="index.php?halaman=detail&id='.$pembelian["id_pembelian"].'" class="btn btn-danger btn-sm" name="detail">Detail</a>
            </td>
        </tr>
        ';
            $no++;
        }

        echo $tampil;
    }
?>