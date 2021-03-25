 // All Script SiMatong

// Script Signup Check Username
$("#user_signup").focusout(function(){
  var hasil = $(this).val();
  if (hasil == "") {
    // Swal({
    //   title: "Kesalahan",
    //   text: "Username harus di isi !",
    //   type: "error"
    // }).then((result) => {
    //   if (result.value) {
    //     $("#user_signup").val("");
    //   }
    // })
  }
  else{
  $.ajax({ 
    url: "core_akses.php",
    type: "post",
    data: {usermen: hasil},
    success: function (Salah) {
      if (Salah == "User sudah ada") {
        Swal({
          title: "Kesalahan",
          text: Salah,
          type: "error"
        }).then((result)=>{
          if (result.value) {
            $("#user_signup").val("");
          }
        })
      }
      else{
        Swal({
          title: "User tersedia",
          text: "Nama user bisa digunakan",
          type: "success"
        })
      }
    }
  })
  }
});

// Script Password Daftar
$("#pass_2").focusout(function(){
  var hasil = $(this).val();
  var pass1 = $("#pass_1").val();
  if (pass1 != hasil) {
    Swal({
      title: "Kesalahan",
      text: "Password tidak cocok !!",
      type: "error"
    }).then((result) => {
      if (result.value) {
        $("#pass_1").val("");
        $("#pass_2").val("");
      }
    })
    
  }
});
// Signup Simatong
$("#signup_form").on("submit",function(e){
  e.preventDefault();
  var nama = $("#nama_user").val();
  var user = $("#user_signup").val();
  var jk = $(".jk").val();
  var tgl = $("#tgl_user").val();
  var tmp = $("#tmp_user").val();
  var alamat = $("#alamat_user").val();
  var tlp = $("#tlp_user").val();
  var email = $("#email_user").val();
  var pass1 = $("#pass_1").val();
  $.ajax({
    url:"core_akses.php",
    type: "post",
    data: {nama:nama,user:user,jk:jk,tgl:tgl,tmp:tmp,alamat:alamat,tlp:tlp,email:email,pass1:pass1},
    success:function(Salah){
      Swal({
        title: "Berhasil",
        text: Salah,
        type: "success"
      }).then((result)=>{
        if (result.value) {
          window.location='../index.php';
        }
      })
    }
  });
});


// Check Login
$("#login_simatong").on("click",function(e){
  e.preventDefault();
  var user_login = $("#user_login").val();
  var pass_login = $("#pass_login").val();
  $.ajax({
    url:"core_akses.php",
    type:"post",
    data:{user_login:user_login,pass_login:pass_login},
    success:function(Hasil){
      if (Hasil == "Password Salah" || Hasil == "Username tidak ditemukan") {
        Swal({
            title:"Kesalahan",
            text:Hasil,
            type:"error"
        }).then((result) => {
          if (result.value) {
            $("#user_login").val("");
            $("#pass_login").val("");
          }
        })
      }
      else{
        Swal({
          title:"Berhasil",
          text: "Login Berhasil, Selamat Menikmati :)",
          type:"success"
        }).then((result)=>{
          if (result.value) {
            window.location='../index.php';
          }
        })
      }
    }
  })
}); 

// Beli lewat detail produk
$("#produk-detail #keranjang_produk").on("click",function(e){
  e.preventDefault();
  var data_id = $(this).attr("data-id");
  var jumlah = $("#jumlah_beli").val();
  var harga = $(".formatHarga").attr("data-harga");
  var stok = $(".notif_produk").attr("id");
  // alert(data_id+" "+jumlah+" "+harga);
  $.ajax({
    url:"core_produk.php",
    type:"POST",
    data:{data_id:data_id,jumlah:jumlah,harga:harga,stok:stok},
    success:function(dataDetail){
      // alert(dataDetail);
      if (dataDetail == "Anda belum login") {
        Swal({
          title:"Informasi !",
          text: dataDetail,
          type:"warning"
        }).then((result)=>{
          if (result.value) {
            Swal({
              title: 'Login',
              text: "Apakah anda ingin Login ?",
              type: 'question',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Login !'
            }).then((result) => {
              if (result.value) {
                  window.location = "../akun/login.php";
              }
            })
          }
        })
      }
      else{
        Swal({
          title: "Berhasil !",
          text: dataDetail,
          type: "success"
        }).then((result) => {
          if (result.value) {
            window.location = "../transaksi/keranjang.php";
          }
        })
      }
    }
  });
});


// Pagination home hehe
$(document).ready(function () {
  load_data();
  function load_data(page) {
    $.ajax({
      url: "http://localhost/simatong/index_pag.php",
      method: "POST",
      data: { page: page }, 
      success: function (data) {
        $('#pagination_page').html(data);
      }
    })
  }
  $(document).on('click', '.pagination_link', function () {
    var page = $(this).attr("id");
    load_data(page);
  });
});

// Js Pemilihan Rekening Pembayaran
$("#rekening").change(function(){
  var id_rekening = $(this).val();
  $.ajax({
    url:"check_rekening.php",
    type:"post",
    data:{id_rek:id_rekening},
    success:function (data) {
      $("#shw_rekening").html(data)
    }
  })
});
// Js Pemilihan Rekening Pembayaran

// modal Tambah Alamat
$('#tambah_alamat').on('click',function(e){
  e.preventDefault();
  $('#add_modal').modal('show');
});

// Modal
$('#insert_form').on("submit", function () {
  $.ajax({
    url: $(this).attr("action"),
    type: $(this).attr("method"),
    data: new FormData(this),
    success: function () {
      alert("Data ditambah");
      $('add_moda').modal('hide');
    }
  });
});
// modal Ubah Alamat
$(".ubah_alamat").click(function(){
  var id_alamat = $(this).attr("id");
  $.ajax({
    url:"core_alamat.php",
    type:"POST",
    data:{id:id_alamat},
    success:function(dataTajax){
      $('.body_ajax').html(dataTajax);
      $("#ubah_modal").modal("show");
    }
  });
});

// Modal Tambah Rekening
$('#tambah_rek').on('click',function(e){
  e.preventDefault();
  $('#tambah_rekening').modal('show');
});
$('#form_rekening').on("submit",function(){
  // e.preventDefault();
  $.ajax({
    url: $(this).attr("action"),
    type: $(this).attr("method"),
    data: new FormData(this),
    success:function(){
      alert("Tambah Rekening Berhasil");
      $('#tambah_rekening').modal('hide');
    }
  })
})

// Modal Ubah Rekening
$(".ubah_rek").click(function(){
  var id_rekening = $(this).attr("id");
  $.ajax({
    url: "core_rekening.php",
    type:"POST",
    data:{id:id_rekening},
    success:function(rekData){
      $(".modal_bodyRek").html(rekData);
      $("#ubah_rekening").modal("show");
    }
  });
});

// Modal Setting Ubah Akun
$("#data_akun").on("click",function(e){
  e.preventDefault();
  var id = $(this).data('id');
  var nama = $('#nama_tbl').val();
  var user = $('#username_tbl').val();
  var email = $('#email_tbl').val();
  var telp = $('#telp_tbl').val();
  var img = $('#img_profil').attr("src");
  $('#idAnggota').val(id);
  $('#nama1').val(nama);
  $('#user1').val(user);
  $('#email1').val(email);
  $('#telp1').val(telp);
  $('#pict').attr('src',img);
  $('#modal_ubah').modal('show');
});

// Modal simpan Ubah Akun
$("#ubah_form").submit(function () {
  $.ajax({
    url: $(this).attr("action"),
    type: "post",
    data: new FormData(this),
    success: function (dataTajaxProfil) {
      alert('Data Berhasil di Ubah');
      $('#modal_ubah').modal('hide');
    }
  })
});

// Modal Profil 1
$('#profil1').click(function(){
  var id = $(this).data("id");
  var jk = $('#form_jk').val();
  var tgl = $('#form_tgl').val();
  var tempat = $('#form_tempat').val();
  var alamat = $('#form_alamat').val();
  $("#modal_id").val(id);
  if (jk == "") {
    $('#radio1').attr('checked',false);
    $('#radio2').attr('checked',false);
  }
  else if(jk == "laki-laki"){
    $('#radio1').attr('checked',true);
  }
  else{
    $('#radio2').attr('checked',true);
  }
  $("#modal_tgl").val(tgl);
  $("#modal_tempat").val(tempat);
  $("#modal_alamat").val(alamat);
  $("#modal_profil1").modal("show");
});

// Ubah Profil1
$("#form_profil").on('submit',function(){
  $.ajax({
    url:$(this).attr("action"),
    type:$(this).attr("method"),
    data: new FormData(this),
    success:function(profilData) {
      alert(profilData);
      $("#modal_profil1").modal("hide");
    }
  })
});


// FILTER Produk Live Search
$("#filter_id").change(function(){
  var id = $(this).val();
  $.ajax({
    url: 'core_produk.php',
    type: 'post',
    data: {id:id},
    success:function(data){
      $('#live_produk').html(data);
    }
  });
})

// Tampilkan Ubah Jumlah Keranjang
$(".btn_modalClass").click(function(){
  var id_anggota = $(this).attr("id");
  var id_produk = $(this).val();
  $.ajax({
    url: "core_keranjang.php",
    type: "POST",
    data:{id_anggota:id_anggota,id_produk:id_produk},
    success:function(dataJumlah){
      $(".body_jumlah").html(dataJumlah);
      $("#modal_jumlah").modal("show");
    }
  });
});

// Menampilkan body modal Checkout
$("#ubah_pemesan").click(function(e){
  e.preventDefault();
  var id = $(this).data("id");
  var id_alamat = $(this).data("alamat");
  $.ajax({
    url: "core_checkout.php",
    type:"post",
    data: {id_anggota:id,id_alamat:id_alamat},
    success:function(dataAlamat){
      $(".body_alamat").html(dataAlamat);
      $("#pilih_alamat").modal("show");
    }
  });
});


// Check Form Proses Checkout
function checkAlamat(e) {
  var id_alamat = $("#alamat_hidden").val();
  if (id_alamat == "") {
    e.preventDefault();
    alert("Masukkan Alamat");
  }
}

// Tampilkan Modal History Pembelian
$(".detail_history").click(function(){
  var id_pembelian = $(this).attr("id");
  var tgl = $(this).val();
  var tgl_tempo = $(this).attr("data-tempo");
  $.ajax({
    url: "core_history.php",
    type: "POST",
    data:{id_pembelian:id_pembelian},
    success:function(hasilData){
      $("#history_modal .modal-body").html(hasilData);
      $("#history_modal").modal("show");
      $("#history_modal #timer").countdown(tgl_tempo, function (event) {
        $(this).text(
          event.strftime('%D days %H h : %M m : %S s')
        );
      });
    }
  });
});

// Comment

$(".comment").on("click",function(){
  var id = $(this).val();
  $("#history_modal").modal("show");
  $("#history_modal h5").html("Beri Komentar");
  $("#kirim_coment").val(id);
});

$("#kirim_coment").on("click",function(){
  var value = $(this).val();
  var coment = $("#id_coment").val();
  // alert("Hello");
  $.ajax({
    url:"core_history.php",
    type:"post",
    data:{value:value,coment:coment},
    success:function(comentH){
      Swal({
        title:"Berhasil",
        text:comentH,
        type:"success"
      }).then((result) => {
        if (result.value) {
          window.location = "history.php";
        }
      })
    }
  });
});

$("#history #bayar").click(function(){
  window.location='pembayaran.php';
  var no_beli = $(this).val();
  $.ajax({
    url: "core_history.php",
    type: "POST",
    data:{beli:no_beli},
    success:function(dataSuccess){
      $
    }
  });
});

var tgl_tempo = $(".detail_history").attr("data-tempo");
$("#history_modal #timer").countdown(tgl_tempo,{elapse:false}).on("finish.countdown",function(event){
    if (event.elapsed) {
      alert("selesai");
    }
});


$("#search_input").keyup(function(e){
  e.preventDefault();
  var search = $(this).val();
  // alert(search);
  $.ajax({
    url: "core_produk.php",
    type: "POST",
    data: {search:search},
    success:function(dataSearch){
      $("#live_produk").html(dataSearch);
    }
  });
});

function klik_element(params) {
  $(".info_pemesan").click(function () {
    $(".content").show();
    $(".content_alamat").hide();
    $(".content_ongkir").hide();
    $(".content_bayar").hide();
  }); 
  $(".alamat_pemesan").click(function () {
    $(".content").hide();
    $(".content_alamat").show();
    $(".content_ongkir").hide();
    $(".content_bayar").hide();
  }); 
  $(".ongkir_pemesan").click(function () {
    $(".content").hide();
    $(".content_alamat").hide();
    $(".content_ongkir").show();
    $(".content_bayar").hide();
  }); 
  $(".bayar_pesanan").click(function () {
    $(".content").hide();
    $(".content_alamat").hide();
    $(".content_ongkir").hide();
    $(".content_bayar").show();
  }); 
}
if($("#akun_hidden").length > 0){
  $(".content").hide();
  $(".number").addClass("fa fa-check hijau");
  $(".number").empty();
  if($("#alamat #alamat_hidden").length > 0) {
    $(".content_alamat").hide();
    $(".alamat_number").addClass("fa fa-check hijau");
    $(".alamat_number").empty();
    if ($("#ongkir #ongkir_hidden").length > 0) {
      $(".content_ongkir").hide();
      $(".ongkir_number").addClass("fa fa-check hijau");
      $(".ongkir_number").empty();
      if ($("#pembayaran #bayar_hidden").length > 0) {
        $(".content_bayar").hide();
        $(".ongkir_number").addClass("fa fa-check hijau");
        $(".ongkir_number").empty();
      }
      else{
        $(".content_bayar").show();
      }
    }
    else{
      $(".content_ongkir").show();
      $(".content_bayar").hide();
    }

  }
  else{
    $(".content_alamat").show();
    $(".content_ongkir").hide();
    $(".content_bayar").hide();
  }
}
else{
  $(".content").show();
  $(".content_alamat").hide();
  $(".content_ongkir").hide();
  $(".content_bayar").hide();
}
klik_element();

// Ajax checkout $_SESSION pemesan akun;
$("#info_akun").click(function (e) {
  e.preventDefault();
  var id_pemesan = $(this).val();
  $.ajax({
    url: "core_checkout.php",
    type: "post",
    data: { id_pemesan:id_pemesan },
    success: function (dataAkun) {
      $(".content").hide();
      $(".number").addClass("fa fa-check hijau");
      $(".number").empty();
      location = 'prosescheckout.php';
      $(".content_alamat").show();
    }
  })
});

// Ajax Checkout sessi pemesan alamat
$("#info_alamat").click(function(e){
  e.preventDefault();
  var alamat =  $(this).val();
  $.ajax({
    url:"core_checkout.php",
    type:"post",
    data:{alamat:alamat},
    success:function(datajax){
      $(".content_alamat").hide();
      $(".alamat_number").addClass("fa fa-check hijau");
      $(".alamat_number").empty();
      location = 'prosescheckout.php';
      $(".content_ongkir").show();
    }
  });
});

// Ajax checkout Ongkir sessi pemesanan
$("#info_ongkir").click(function(e){
  e.preventDefault();
  var ongkir = parseInt($("#ongkir option:selected").attr("data-value"));
  var id_ongkir = $("#ongkir option:selected").val();
  // var total = parseInt($(".total_value").attr("data-harga"));
  // var ttl_h = parseInt(total) + parseInt(ongkir);
  // alert(ttl_all);
  if (id_ongkir == "pilih ongkir") {
    Swal({
      title:"Kesalahan",
      text:"pilih ongkos kirim dulu",
      type:"info"
    }).then((result)=>{
      if (result.value) {
        return false;
      }
    })
  }
  else{
  $.ajax({
    url:"core_checkout.php",
    type:"post",
    data:{ongkir:ongkir,id_ongkir:id_ongkir},
    success:function(dataJumlah){
      $(".content_ongkir").hide();
      $(".ongkir_number").addClass("fa fa-check hijau");
      $(".ongkir_number").empty(); 
      $("#ongkir option:selected").attr("selected",true);
      // $("span.jumlah_value").html("Rp "+dataJumlah);
      // $(".ttl_all").html(parseInt(ttl_h));
      location='prosescheckout.php';
      $(".content_bayar").show();
    }
  })
  }
});

$("#check_total").click(function(e){
  e.preventDefault();
  var id_ongkir = $("#ongkir option:selected").val();
  var ongkir = $("#ongkir option:selected").attr("data-value");
  var total = parseInt($(".total_value").attr("data-harga"));
  var ttl_h = parseInt(total) + parseInt(ongkir);
  // alert(ongkir);
  // alert(ttl_all);
  if (id_ongkir == "pilih ongkir") {
    Swal({
      title: "Kesalahan",
      text: "pilih ongkos kirim dulu",
      type: "info"
    }).then((result) => {
      if (result.value) {
        return false;
      }
    })
  }
  else{
      // var id_ongkir = parseInt($("#ongkir option:selected").attr("data-value"));
      $(".ttl_all").text("Rp " + parseInt(ttl_h));
      $("span.jumlah_value").html("Rp " + ongkir);
      // $("#info_ongkir").attr("data-ongkir",id_ongkir);
  }
});



// Kirim Modal Pembayaran
$("#pesan_barang").on("click",function(e){
  e.preventDefault();
  var id_anggota = $("#akun_hidden").val();
  var id_alamat = $("#alamat_hidden").val();
  var id_ongkir = $("#ongkir_hidden").val();
  var ttl_pembelian = $("#ttl_pembelian").val();
  if ($("#ongkir_hidden").length == 0) {
    Swal({
      title: "Kesalahan",
      text: "pilih ongkos kirim dulu",
      type: "info"
    }).then((result) => {
      if (result.value) {
        return false;
      }
    })
  }
  else
  {
  Swal({
    title: 'Pesan Sekarang ?',
    text: "Apakah anda ingin memesan sekarang!",
    type: 'question',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Pesan !'
  }).then((result) => {
    if (result.value) {
      // window.location.href = alamat;
        $.ajax({
          url: "core_checkout.php",
          type: "post",
          data: {ttl_pembelian:ttl_pembelian},
          success:function(produk_pesan) {
            Swal({
              title: "Berhasil !",
            text: produk_pesan+" !! Lakukan pembayaran di history",
              type: "success"
            }).then((result) => {
              if ((result.value)) {
                window.location = 'history.php';
              }
            })
          }
        })
    }
  })
}
});

// Hapus Keranjang
$("#keranjang #hapus_keranjang").on("click",function(e){
  e.preventDefault();
  var keranjang = $(this).attr("data-keranjang");
  var produk = $(this).attr("data-produk");
  var jumlah = $(this).attr("data-jumlah");
  Swal({
    title: 'Hapus',
    text: "ingin menghapus produk ?",
    type: 'question',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Hapus !'
  }).then((result) => {
    if (result.value) {
      $.ajax({
        url: "hapusproduk.php",
        type: "post",
        data: { keranjang: keranjang, produk: produk, jumlah: jumlah },
        success: function (hapus_keranjang) {
          Swal({
            title: "Berhasil",
            text: "Produk berhasil dihapus",
            type: "success"
          }).then((result) => {
            if (result.value) {
              window.location = 'keranjang.php';
            }
          })
        }
      })
    }
  })
})


// Ubah Password

$("#ubah_pass").on("click",function(e){
  e.preventDefault();
  var id_anggota = $(this).attr("data-id");
  var pass_lama = $("#pass_lama").val();
  var new_pass = $("#new_pass").val();
  var confirm_pass = $("#confirm_pass").val();
  Swal({
    title: 'Password',
    text: "ingin mengubah password ?",
    type: 'question',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Hapus !'
  }).then((result)=>{
    if (result.value) {
      $.ajax({
        url: "core_pass.php",
        type: "post",
        data: {
          id_anggota: id_anggota,
          pass_lama: pass_lama,
          new_pass: new_pass,
          confirm_pass: confirm_pass
        },
        success: function (hasilPass) {
          if (hasilPass == "Password berhasil diubah") {
            Swal({
              title: "Berhasil",
              text: hasilPass,
              type: "success"
            }).then((result) => {
              if (result.value) {
                $("#pass_lama").val("");
                $("#new_pass").val("");
                $("#confirm_pass").val("");
              }
            })
          }
          else{
            Swal({
              title: "Kesalahan",
              text: hasilPass,
              type: "error"
            }).then((result)=>{
              if (result.value) {
                $("#pass_lama").val("");
                $("#new_pass").val("");
                $("#confirm_pass").val("");
              }
            })
          }
        }
      })
    }
  })
});

// Check Keranjang
$(".shopping").on("click",function(e){
  e.preventDefault();
  var base_url = $(this).attr("href");
  $.ajax({
    url: base_url,
    success:function(helloHasil){
      if (helloHasil == "Keranjang belanja kosong") {
        Swal({
          title: "Kosong",
          text: helloHasil,
          type: "warning"
        })
      }
      else{
        window.location= base_url;
      }
    }
  });
});
    // Header Navigasi
  // window.onscroll = function() {myFunction()};

  //   var navbar = document.getElementById("navigasi");
  //   var sticky = navbar.offsetTop;

  //   function myFunction() {
  //     if (window.pageYOffset >= 130) {
  //       navbar.classList.add("fixed-top")
  //     } else {
  //       navbar.classList.remove("fixed-top");
  //     }
  //   }


// Scroll Item
$('.page-scroll').on("click",function(e){
  var link = $(this).attr("href");
  var tujuan = $(link);
  // console.log(tujuan.offset().top);
  $("#home").animate({
    scrollTop: tujuan.offset().top - 100
  },1250,'swing');
  e.preventDefault();
});


// WIndow scroll item
$(document).ready(function(){
  $(window).on("scroll", function () {
    var top = $(window).scrollTop();
    if (top >= 150) {

      // $("#navigasi").addClass("fixed-top");
      $("body").addClass("sticky-header");
      // alert("hello");
    } else {
      // $("#navigasi").removeClass("fixed-top");
      $("body").removeClass("sticky-header");
    }
  });

  var date = $(".cd_event").attr("data-date");

  $(".cd_event").countdown(date,function(event){
    $(this).text(
      event.strftime('%m month %d days')
    )
  })
});

$(".info-event").on("click",function(){
  $("#notif-header").modal("show");
});

// Hover 

// $(".car").mouseenter(function(){
//   $(this).addClass("car-add");
// });
// $(".car").mouseleave(function(){
//   $(this).removeClass("car-add");
// });
