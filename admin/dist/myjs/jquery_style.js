$(document).ready(function(){
    
    // Simpan Ubah Pd
    // Hapus Produk
    $('a#hapus_produk').on("click",function(e){
        e.preventDefault();
        const alamat = $(this).attr("href");
        Swal({
            title: 'Yakin dihapus ?',
            text: "You won't be able to revert this!",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus !'
        }).then((result) => {
            if (result.value) {
                window.location.href = alamat;
            }
        })
    });

    // Hapus Event
    $('a#hapus_event').on("click",function(e){
        e.preventDefault();
        const alamat = $(this).attr("href");
        Swal({
            title: 'Yakin dihapus ?',
            text: "You won't be able to revert this!",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus !'
        }).then((result) => {
            if (result.value) {
                window.location.href = alamat;
            }
        })
    });

    // live search
    $("#search_admin").on("keyup",function(e){
        e.preventDefault();
        const input = $(this).val();
        $.ajax({
            url:"core_admin/core_search.php",
            type:"post",
            data:{input:input},
            success:function(value_input){
                $("#content_pembelian").html(value_input);
            }
        });
    })

    // live search status
    $("#search_status").on("click",function(e){
        e.preventDefault();
        const input_status = $("#status_select").val();
        // alert(input_status);
        $.ajax({
            url: "core_admin/core_search.php",
            type: "post",
            data: { input_status:input_status },
            success: function (valueT) {
                $("#content_pembelian").html(valueT);
            }
        });
    });
    

    // button Detail
    // $(".button_detail").on("click",function(){
    //     const id_pembelian = $(this).attr("id");
    //     $("#detail_proses").load("detail_admin.php",function(){
    //         $("#modal_detail").modal("show");
    //     });
    // });

    // KOnfirmasi Pembayaran
    $("#konfirmasi").on("click",function(e){
        e.preventDefault();
        const alamat = "core_admin/core_konfirmasi.php";
        const type = "post";
        const id_pembelian = $(this).attr("data-id");
        const data ={id_pembelian:id_pembelian};
        const loc = "index.php?halaman=pembelian";
        Swal({
            title:"Konfirmasi Pembayaran",
            text:"Apakah ingin di konfirmasi ?",
            type:"question",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Konfirmasi'
        }).then((result) => {
            if (result.value) {
                update(alamat,type,data,loc);
            }
        });
    });

    function update($alamat,$type,$data,$href){
        $.ajax({
            url:$alamat,
            type:$type,
            data:$data,
            success:function(Datax){
                Swal({
                    title:"Sukses",
                    text:"Proses"+Datax,
                    type:"success"
                }).then((result)=>{
                    if (result.value) {
                        window.location=$href;
                    }
                })
            }
        });
    };

    // modal bukti pembayaran;
    $('#btn_bukti').on("click",function(){
        $("#modal_bukti").modal("show");
    });
    
});