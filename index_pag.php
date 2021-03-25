<?php
    include"core/koneksi.php";

    $perPage = 4; //Banyak Halaman;
    $page="";
    $tampil = '';
    if (isset($_POST["page"])) {
        $page = $_POST["page"];
    }
    else {
        $page = 1;
    }
    $start = ($page - 1) * $perPage;           
    $sql = "SELECT * FROM tbl_produk INNER JOIN tbl_event ON tbl_produk.id_event = tbl_event.id_event ORDER By id_produk desc LIMIT $start, $perPage";
    $result1 = mysqli_query($conn,$sql);
    $tampil .= '
        <div class="row">
    ';
    while ($data = mysqli_fetch_assoc($result1)) {
        $tampil .= '
            <div class="col-md-3">
            <div class="card border-0">
                <img src="'.$url_login.'foto_produk/'.$data["foto"].'" alt="" class="img-fluid img_hover">
                <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <small class="txt">'.$data["nama_event"].'</small><br>
                        <a href="'.$url_login.'produk/produk.php?halaman=detail&id='.$data["id_produk"].'" class="card-title" id="title">'.$data["nama_produk"].'</a><br>
                        <small>Rp '.number_format($data["harga"],2,",",".").'</small>
                    </div>
                    <div class="col-md-3 text-center">
                    <a href="'.$url_login.'transaksi/pesan.php?id='.$data["id_produk"].'" class="" id="beli_produk">
                    <i class="fa fa-2x fa-cart-plus"></i>
                    </a>
                    </div>
                </div>
                <div class="row" id="button">
                <div class="col-md-12">
                    <a href="'.$url_login.'produk/produk.php?halaman=detail&id='.$data["id_produk"].'" class="btn btn-sm btn-outline-primary col-md-12">Detail</a>
                </div>
                </div>
                </div>
            </div>
            </div>
        ';
    }
    $tampil .='
        </div>
        <div class="row mt-3">
            <div class="col-md-12 text-center">
    ';
    $sqlAll = mysqli_query($conn,"SELECT * FROM tbl_produk ORDER By id_produk DESC");
    $total = mysqli_num_rows($sqlAll);
    $total_pages = ceil($total/$perPage);
    for ($i=1; $i <= $total_pages ; $i++)
    { 
        $tampil .='
            <span class="mx-3 pagination_link" style="cursor:pointer;" id="'.$i.'">'.$i.'</span>
        ';
    }
    $tampil .='
        </div>
    </div>';
    

    echo $tampil;

?>