/*===============================================
_________________________________________________

            SETTING BASE URL CONFIG
  Code @author By :  Veris Juniardi
  Published for SiDesa Gantung 2018
  
  Contact : @veris_juniardi
  Email   : veris.juniardi@gmail.com
_________________________________________________
================================================*/
var base_url = window.location.origin + '/' + window.location.pathname.split ('/') [1] + '/';
var save_method = '';
var user_method = '';
var rt_method = '';
var dusun_method = '';
var arsip_method;
var message = '';
var maksimal;
var sisa;
var koordinat_method = '';
var bap_method = '';


$(function () {
  $('.main-img').imgPreload();
});

function refresh(){
  location.reload();
}

function hitungkarakter(){  
  var max = 150;
  var message = $('[name="message"]').val().length;
  $('[name="sisa"').val(max - message);
}

 function sms_uid() {
   swal({
     title: 'Apa Anda Yakin?',
     text: "Kirim SMS UID dan Pass user ke Semua !",
     type: 'warning',
     showCancelButton: true,
     confirmButtonColor: '#3085d6',
     cancelButtonColor: '#d33',
     confirmButtonText: 'Iya, Kirim!'
   }, function isConfirm() {
     $.ajax({
       url: baseUrl + 'sms/blast',
       type: "POST",
       dataType: "JSON",
       success: function (data) {
         swal('Selamat !', 'Berhasil Kirim SMS Blast !', 'success');
         location.reload();
       },
       error: function (jqXHR, textStatus, errorThrown) {
         swal('Astagapeer', 'Ade Nok Salah Mudel e...!', 'error');
         location.reload();
       }
     });
   });
 }
/*===============================================
_________________________________________________

            SETTING DATATABLES
_________________________________________________
================================================*/


$(".select2").select2();
$("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
$("[data-mask]").inputmask();

$(".fancybox").fancybox({
  closeBtn  : false,
  helpers		: {
    buttons	: {}
  }
});

$("#table_arsip_masuk").DataTable({
  responsive: true, 
  order:[[ 0, "desc"]],
  rowGroup: {
    dataSrc: 'tipe'
    }
});

$("#list-user").DataTable({
  responsive: true, 
  order:[[ 5, "desc"]]        
});

// ==========================
// SMS SETTING
$("#sms_set").DataTable({
  responsive: true,
});

function edit_setting_sms(id){

}

function aktifkan_setting_sms(id){
  swal({
    title: 'Apa Anda Ingin Merubah Status Aktif API?',
    text: "Status API SMS akan di aktifkan oleh sistem !",
    type: 'success',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Iya, Aktifkan Status!'              
  }, function isConfirm(){
    $.ajax({
      url:baseUrl+'sms/aktif/'+id,
      type:"POST",
      dataType:"JSON",
      success: function(data){
        swal('Selamat !','Berhasil Mengaktifkan API SMS !','success');
              location.reload();
            }
            ,error: function (jqXHR, textStatus, errorThrown)
              {
                swal('Astagapeer','Ade Nok Salah Mudel e...!','error');
                location.reload();
              }
    });
  });
}

function nonaktifkan_setting_sms(id){
  swal({
    title: 'Apa Anda Ingin Merubah Status Aktif API?',
    text: "Status API SMS akan di nonaktifkan oleh sistem !",
    type: 'error',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Iya, Nonaktifkan Status!'              
  }, function isConfirm(){
    $.ajax({
      url:baseUrl+'sms/nonaktif/'+id,
      type:"POST",
      dataType:"JSON",
      success: function(data){
        swal('Selamat !','Berhasil Nonaktifkan API SMS !','success');
              location.reload();
            }
            ,error: function (jqXHR, textStatus, errorThrown)
              {
                swal('Astagapeer','Ade Nok Salah Mudel e...!','error');
                location.reload();
              }
    });
  });
}
var api_method = '';
function add_api(){
  api_method = 'add_api';
  $('#data_api_form')[0].reset();
  $('#modal_data_api').modal('show');
}

function edit_api(id){
  api_method = 'update_api';
  var url = baseUrl+'sms/get/'+id;
  $('#data_api_form')[0].reset();
  $.ajax({
    url:url,
    type:"GET",
    dataType:"JSON",
    success: function(data){
      $('[name="user"]').val(data.user);
      $('[name="pass"]').val(data.pass);
      $('[name="url"]').val(data.url);
      $('[name="api_id"]').val(data.id);
      $('#modal_data_api').modal('show');
      $('.modal-title').text('Edit Data API');
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
      swal('Astagapeer','Ade Nok Salah Mudel e...!','error');
    }
  });
}

function save_data_api(){
  switch (api_method) {
    case 'add_api':
    var url = baseUrl+'sms/api/input';
      break;
    case 'update_api':
    var url = baseUrl+'sms/api/update'; 
      break;  
  }
  $.ajax({
    url:url,
    type:"POST",
    dataType:"JSON",
    data: $('#data_api_form').serialize(),
    success: function(data){
      swal('Selamat !','Berhasil Menyimpan Data API SMS !','success');
      location.reload();
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
      swal('Astagapeer','Ade Nok Salah Mudel e...!','error');
      location.reload();
    }
  });
}
// ==========================
// Pertanahan
$("#list_permohonan").DataTable({
  responsive: true,
});

$("#list_bap").DataTable({
  responsive: true,
});

$("#aset_desa").DataTable({
  responsive: true,
});

$("#table_klasifikasi_surat").DataTable({
  responsive: true, 
  rowGroup: {
    dataSrc: 'tipe'
    }
});

$("#list_skt").DataTable({
  responsive: true,
});

$("#list_aset").DataTable({
  responsive: true,
});

$("#master_penduduk").DataTable({
  responsive: true, 
  rowGroup: {
    dataSrc: 'no_kk'
    }
});

$("#mutasi_penduduk").DataTable({
  responsive: true, 
  rowGroup: {
    dataSrc: 'no_kk'
    }
});

$("#adm-wilayah").DataTable({
  responsive: true, 
  rowGroup: {
    dataSrc: 'nama_dusun'
    }       
});
$("#adm-desa").DataTable({
  responsive: true, 
  rowGroup: {
    dataSrc: 'nama_kecamatan'
    }
});
$("#adm-dusun").DataTable({
  responsive: true, 
  rowGroup: {
    dataSrc: 'nama_desa'
  }
});
$("#notif_history").DataTable({
  responsive: true, 
  order:[[ 1, "desc"]]
});
/*===============================================
_________________________________________________

            SETTING FUNGSI - FUNGSI
_________________________________________________
================================================*/

// TODO: SETTING Untuk Pencarian

function cari_data_arsip(){
  event.preventDefault();
  var minLength = 6;
  var data = $('[name="cari_arsip"]').val();
  if(data.length < minLength ){
    $('#label').text('Input Minimal 6 Karakter');
    $('#loader').show();
  }else{
    $('#label').text('');
    $('#loader').show();
    $.ajax({
      url: baseUrl+'arsip/cari_data',
      type:"GET",
      data:"keyword="+data,
      cache:false,
      dataType:"JSON",
      success: function(data){
        // console.log(data);
        if(data.status == true){
          $('#loader').hide();
          $('#hasil').html('<ul class="timeline timeline-inverse">'+data.hasil+'</ul>');
        }else{
          $('#loader').hide();
          $('#hasil').html("<div class='well'><h2 class='text-center'>Data Tidak ditemukan !!!</h2></div>");
        }
        
      }, error: function (jqXHR, textStatus, errorThrown)
      {
        $('#loader').hide();
        swal('Astagapeer','Ade Nok Salah Mudel e...!','error');
      }
    });
  }
}


function cari_data_skt(){
      event.preventDefault();
      var nik = $('[name="cari_tanah_skt"]').val();
      if(nik!=''){
        $('#loader-icon').show();
        $('#result_cari_data').hide();
        $('#data_kosong').hide();
        $.ajax({
          url: baseUrl+'cari/skt/'+nik,
          type:'GET',
          success:function(data){
            $('#loader-icon').hide();
            if(data!='null' ){
              var obj = JSON.parse(data);
                console.log(data);
              $('#no_nik').text("NIK "+obj.no_nik);
              $('#no_kk').text("No. KK "+obj.no_kk);
              $('#nama').text(obj.nama);
              $('#ttl').text(obj.tempat_lahir+"/"+obj.tanggal_lahir);
              $('#pddk_akhir').text(obj.pddk_akhir);
              $('#shdk').text(obj.shdk);
              $('#agama').text(obj.agama);
              $('#pekerjaan').text(obj.pekerjaan);
              $('#status').text(obj.status);
              $('#shdrt').text(obj.shdrt+"  Orang");
              $('#alamat').text(obj.alamat);
              $('#no_rt').text(obj.no_rt);
              $('#dusun').text(obj.dusun);
              $('[name="kependudukan_id"]').val(obj.id);
              $('[name="no_nik"]').val(obj.no_nik);
              $('[name="pemohon"]').val(obj.nama);

              $('#result_cari_data').show();
              $('#data_kosong').hide();
            }else{
              $('#result_cari_data').hide();
              $('#data_kosong').show();
            }
           
          }, error: function (jqXHR, textStatus, errorThrown)
                {
                  swal('Astagapeer','Ade Nok Salah Mudel e...!','error');
                }
        });
      }
    }

  /*/ Modul Confirm Input /*/  
  function input_aset(){
     $('#aset_desa_form')[0].reset();
     $('#modal_aset_desa').modal('show');
  }

  function tambah_dusun(){
    dusun_method = 'posting_dusun';
    $('#data_dusun_form')[0].reset();
    $('#modal_data_dusun').modal('show');
  }

  function tambah_rt(){
    rt_method = 'posting_rt';
    $('#data_rt_form')[0].reset();
    $('#modal_data_rt').modal('show');
  }

  function button_input_desa(){
    $('#desa_baru')[0].reset();
    $('#modal_desabaru').modal('show');
  }
 
  function buat_disposisi(){
    $('#disposisi_input')[0].reset();
    $('#modal_disposisi').modal('show');
  }
  
  function pernyataan_input(){
    $('#pernyataan_input')[0].reset();
    $('#modal_pernyataan').modal('show');
  }

  function input_tim_verifikasi(){
    bap_method = 'input_tim';
    $('#petugas_pemeriksa').show();
    $('#pesan').hide();
    $('#bap_input')[0].reset();
    $('#modal_bap').modal('show');
  }
  function setujui_verifikasi() {
    bap_method = 'setujui_bap';
    $('#petugas_pemeriksa').hide();
    $('#pesan').show();
    $('#bap_input')[0].reset();
    $('.modal-title').text('Setujui &amp; Input Berita Acara');
    $('#modal_bap').modal('show');
  }

  function posting_arsip(){
    arsip_method = 'posting_arsip';
    $('#arsip_input')[0].reset();
    $('#modal_arsip').modal('show');
  }

  function balasan_arsip(){
    $('#balas_arsip_form')[0].reset();
    $('#modal_balas_arsip').modal('show');
  } 

  function setujui_balasan_arsip(id){
    swal({
      title: 'Apa Anda Yakin?',
            text: "Setujui Balasan Konsep Surat ke Sistem!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Iya, Setujui Konsep!'              
          }, function isConfirm(){
            $.ajax({
              url:baseUrl+'arsip/balasan/setujui/'+id,
              type:"POST",
              dataType:"JSON",            
              success: function(data){
                swal('Selamat !','Berhasil Setujui Konsep Balasan !','success');
                location.reload();
              }
              ,error: function (jqXHR, textStatus, errorThrown)
                {
                  swal('Astagapeer','Ade Nok Salah Mudel e...!','error');
                  location.reload();
                }
            });
    });
  }
    
  function posting(){
    save_method = 'posting_klasifikasi';
    $('#klasifikasi')[0].reset();
    $('#modal_klasifikasi').modal('show');
  }

  function add_user(){
    user_method = 'posting_user';
    $('#user_data')[0].reset();
    $('#modal_user').modal('show');
  }


  function get_koordinat_gps(){
    var startPos;
    var geoOptions = {
      enableHighAccuracy: true
    }
    var geoSuccess = function (position) {
      startPos = position;
      swal('Buka Kunci GPS', 'Lat : ' + startPos.coords.latitude + ' Lng : ' + startPos.coords.longitude, 'success');
    };
    var geoError = function (error) {
      console.log('Error occurred. Error code: ' + error.code);
    };
    navigator.geolocation.getCurrentPosition(geoSuccess, geoError, geoOptions);
  }

  function add_titik_tengah(){
    var startPos;
    var geoOptions = {
      enableHighAccuracy: true
    }
    var geoSuccess = function(position) {
      startPos = position;
      swal('Buka Kunci GPS','Lat : '+startPos.coords.latitude +' Lng : '+startPos.coords.longitude,'success');
    };
    var geoError = function(error) {
      console.log('Error occurred. Error code: ' + error.code);
      // error.code can be:
      //   0: unknown error
      //   1: permission denied
      //   2: position unavailable (error response from location provider)
      //   3: timed out
    };
    navigator.geolocation.getCurrentPosition(geoSuccess, geoError, geoOptions);    
  }
/*====================================================*/

/* ===================================================*/
/*/ Fungsi Cari Data /*/
function cari_data() {
  event.preventDefault();
  var nik = $('[name="cari_tanah_nik"]').val();
  if(nik!=''){
    $('#loader-icon').show();
    $('#result_cari_data').hide();
    $('#data_kosong').hide();
    $.ajax({
      url: baseUrl+'cari/nik/'+nik,
      type:'GET',
      success:function(data){
        $('#loader-icon').hide();
        if(data!='null' ){
          var obj = JSON.parse(data);
            console.log(data);
          $('#no_nik').text("NIK "+obj.no_nik);
          $('#no_kk').text("No. KK "+obj.no_kk);
          $('#nama').text(obj.nama);
          $('#ttl').text(obj.tempat_lahir+"/"+obj.tanggal_lahir);
          $('#pddk_akhir').text(obj.pddk_akhir);
          $('#shdk').text(obj.shdk);
          $('#agama').text(obj.agama);
          $('#pekerjaan').text(obj.pekerjaan);
          $('#status').text(obj.status);
          $('#shdrt').text(obj.shdrt+"  Orang");
          $('#alamat').text(obj.alamat);
          $('#no_rt').text(obj.no_rt);
          $('#dusun').text(obj.dusun);
          $('[name="kependudukan_id"]').val(obj.id);
          $('[name="no_nik"]').val(obj.no_nik);
          $('[name="pemohon"]').val(obj.nama);

          $('#result_cari_data').show();
          $('#data_kosong').hide();
        }else{
          $('#result_cari_data').hide();
          $('#data_kosong').show();
        }             
      }, error: function (jqXHR, textStatus, errorThrown)
            {
              swal('Astagapeer','Ade Nok Salah Mudel e...!','error');
            }
    });
  }
}

/*/ Modul Simpan Data /*/

function save_desa_baru(){
  swal({
    title: 'Apa Anda Yakin?',
          text: "Data Desa Akan di Input ke Sistem!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Iya, Simpan!'              
        }, function isConfirm(){
          $.ajax({
            url:baseUrl+'desa/input',
            type:"POST",
            data:$('#desa_baru').serialize(),
            dataType:"JSON",            
            success: function(data){
              swal('Selamat !','Berhasil Posting Data Desa !','success');
              location.reload();
            }
            ,error: function (jqXHR, textStatus, errorThrown)
              {
                swal('Astagapeer','Ade Nok Salah Mudel e...!','error');
                location.reload();
              }
          });
  });
}

function save_data_rt(){
  var url;
  switch (rt_method) {
    case 'posting_rt':
    url = baseUrl+'rt/input';
      break;
    case 'edit_rt':
    url = baseUrl+'rt/update'; 
      break;  
    default:
      break;
  }
  $.ajax({
    url:url,
    type:"POST",
    data:$('#data_rt_form').serialize(),
    dataType: 'JSON',
    success: function (data){
      swal('Selamat !','Berhasil Input data!','success');
      location.reload();
    },
      error: function (jqXHR, textStatus, errorThrown)
      {
        swal('Astagapeer','Ade Nok Salah Mudel e...!','error');
      }

  });
}

function save_data_dusun(){
  var url;
  switch (dusun_method) {
    case 'posting_dusun':
    url = baseUrl+'dusun/input'; 
      break;
    case 'edit_dusun':
    url = baseUrl+'dusun/update';  
      break;  
    default:
      break;
  }
  $.ajax({
    url:url,
    type:"POST",
    data:$('#data_dusun_form').serialize(),
    dataType: 'JSON',
    success: function (data){
      swal('Selamat !','Berhasil Input data!','success');
      location.reload();
    },
      error: function (jqXHR, textStatus, errorThrown)
      {
        swal('Astagapeer','Ade Nok Salah Mudel e...!','error');
      }

  });
}

function save_data_desa(){
  swal({
    title: 'Apa Anda Yakin?',
          text: "Data Desa Akan di Perbaharui ke Sistem!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Iya, Simpan!'              
        }, function isConfirm(){
          $.ajax({
            url:baseUrl+'desa/update',
            type:"POST",
            data:$('#data_desa_form').serialize(),
            dataType:"JSON",            
            success: function(data){
              swal('Selamat !','Berhasil Posting Data Desa !','success');
              location.reload();
            }
            ,error: function (jqXHR, textStatus, errorThrown)
              {
                swal('Astagapeer','Ade Nok Salah Mudel e...!','error');
                location.reload();
              }
          });
  });
}


function save_balasan_arsip(){
  $('#balas_arsip_form').submit(function(evt){
    evt.preventDefault();
    var url = baseUrl+'arsip/balasan';
    var formData = new FormData($(this)[0]);
    $.ajax({
      url:url,
      type:"POST",
      data:formData,
      async: false,
      cache: false,
      contentType: false,
      enctype: 'multipart/form-data',
      processData: false,
      success: function(data){
        swal('Selamat !','Berhasil Input Data Balasan Arsip Ke Sistem!','success');
        location.reload();
      }, error: function (jqXHR, textStatus, errorThrown) {
        swal('Astagapeer','Ade Nok Salah Mudel e...!','error');
       }
    });
  });
}

// ============================AUTO FILL DATA WILAYAH
$('#kecamatan').hide();
$('#desa').hide();
$('#dsn').hide();
$('#rt').hide();
$('#null').hide();

$('[name="kabupaten"]').change(function () {
  var kabupaten = $('[name="kabupaten"]').val();
  $('#kecamatan').hide();
  $('#desa').hide();
  $('#dsn').hide();
  $('#rt').hide();

  $.ajax({
    url: baseUrl + 'get/kecamatan/' + kabupaten,
    type: "GET",
    dataType: "JSON",
    success: function (data) {
      $('#kecamatan').show();
      if (data.status == true) {
        $('[name="kecamatan"]').html(data.hasil);
        console.log(data.hasil);
      } else {
        console.log(data);
      }
    }
  });
});


$('[name="kecamatan"]').change(function () {
  var kecamatan = $('[name="kecamatan"]').val();
  $('#desa').hide();
  $('#dsn').hide();
  $('#rt').hide();  $.ajax({
    url: baseUrl + 'get/desa/' + kecamatan,
    type: "GET",
    dataType: "JSON",
    success: function (kec) {      
      if (kec.status == true) {
        $('#desa').show();
        $('[name="desa"]').html(kec.hasil);
        console.log(kec.hasil);
      } else {
        console.log(kec);
      }
    }
  });
});

$('[name="desa"]').change(function () {
  var desa = $('[name="desa"]').val();
  $('#dsn').hide();
  $('#rt').hide();
    $.ajax({
    url: baseUrl + 'get/dusun/' + desa,
    type: "GET",
    dataType: "JSON",
    success: function (desa) {
      if (desa.status == true) {
        $('#dsn').show();
        $('[name="dusun"]').html(desa.hasil);
        console.log(desa.hasil);
      } else {
        console.log(desa);
      }
    }
  });
});

$('[name="dusun"]').change(function () {
  var dusun = $('[name="dusun"]').val();
  $('#rt').hide();
  $.ajax({
    url: baseUrl + 'get/rt/' + dusun,
    type: "GET",
    dataType: "JSON",
    success: function (dusun) {
      if (dusun.status == true) {
        $('#rt').show();
        $('[name="rt"]').html(dusun.hasil);
        console.log(dusun.hasil);
      } else {
        console.log(dusun);
      }
    }
  });
});

/* ======================= PENDUDUK MASTER CONTROL SYSTEM ========== */
var penduduk_method = '';

function edit_penduduk(id) {
  swal({
    title: 'Apa Anda Ingin Mengubah Data ?',
    text: "Data akan dipanggil System, Mungkin butuh beberapa saat!",
    type: 'success',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Iya, Edit Data!'
  }, function isConfirm() {
    $('#input_data_penduduk_baru')[0].reset();
    $.ajax({
      url: baseUrl + 'data_penduduk/get/'+id,
      type: "GET",
      dataType: "JSON",
      success: function (data){
        var obj = data.results;
        penduduk_method = 'update_penduduk';
        console.log(obj);
        $('[name="id"]').val(obj.id);
        $('[name="alamat"]').val(obj.alamat);
        $('[name="no_kk"]').val(obj.no_kk);
        $('[name="no_nik"]').val(obj.no_nik);
        $('[name="nama"]').val(obj.nama);
        $('[name="jenis_kelamin"]').val(obj.jenis_kelamin);
        $('[name="tempat_lahir"]').val(obj.tempat_lahir);
        $('[name="tanggal_lahir"]').val(obj.tanggal_lahir);
        $('[name="pekerjaan"]').val(obj.pekerjaan);
        $('[name="agama"]').val(obj.agama);
        $('[name="status"]').val(obj.status);
        $('[name="shdk"]').val(obj.shdk);
        $('[name="shdrt"]').val(obj.shdrt);
        $('[name="pddk_akhir"]').val(obj.pddk_akhir);
        $('[name="nama_ayah"]').val(obj.nama_ayah);
        $('[name="nama_ibu"]').val(obj.nama_ibu);
        $('[name="kabupaten"]').val(obj.id_kabupaten);
        // $('[name="kecamatan"]').val(obj.id_kecamatan);
        // $('[name="desa"]').val(obj.id_desa);
        // $('[name="dusun"]').val(obj.id_dusun);
        // $('[name="rt"]').val(obj.no_rt);
        $('.modal-title').text('Edit Data Penduduk');
        $('#modal_input_data_penduduk_baru').modal('show');
      }
    });
  });
}

function input_penduduk_baru() {
 swal({
   title: 'Apa Anda Menginput Ingin Data Penduduk?',
   text: "Data penduduk Akan digunakan untuk mengaktifkan fitur - fitur SiDesa !",
   type: 'success',
   showCancelButton: true,
   confirmButtonColor: '#3085d6',
   cancelButtonColor: '#d33',
   confirmButtonText: 'Iya, Input Data!'
 }, function isConfirm() {
   $('#input_data_penduduk_baru')[0].reset();
   penduduk_method = 'insert_penduduk';
   $('#modal_input_data_penduduk_baru').modal('show');
 });
}

function save_penduduk_baru(){
  switch (penduduk_method) {
    case 'update_penduduk':
    var url = baseUrl + 'data_penduduk/update';
      break;
    case 'insert_penduduk':
    var url = baseUrl + 'data_penduduk/input';
      break;  
  }
  $('#input_data_penduduk_baru').submit(function(evt){
    evt.preventDefault();
    var formData = new FormData($(this)[0]);
    $.ajax({
      url: url,
      type: "POST",
      data: formData,
      async: false,
      cache: false,
      contentType: false,
      enctype: 'multipart/form-data',
      processData: false,
      success: function(data){
        swal('Selamat !','Berhasil Input Data Penduduk Baru Ke Sistem!','success');
        location.reload();
      }, error: function (jqXHR, textStatus, errorThrown) {
        swal('Astagapeer','Ade Nok Salah Mudel e...!','error');
       }
    });
    
  });
}
/* ==================================================================== */
/*|                                                                    |*/
/*|                                                                    |*/
/*|                                                                    |*/
/*|                                                                    |*/
/* ==================================================================== */

function desa_edit(){
$('#data_desa_form')[0].reset();
$('#modal_data_desa').modal('show');
}

function permohonan_setujui(){
  $('#setuju_input')[0].reset();
  $('#modal_setuju').modal('show');
}

function posting_permohonan(){
$('#permohonan_form').submit(function(evt){
  evt.preventDefault();
  var formData = new FormData($(this)[0]);
  var url = baseUrl+'permohonan/input';
  $.ajax({
      url:url,
      type: "POST",
      data: formData,
      async: false,
      cache: false,
      contentType: false,
      enctype: 'multipart/form-data',
      processData: false,
      success: function(data){
        swal('Selamat !','Berhasil Posting Permohonan!','success');
        location.reload();
      }, error: function (jqXHR, textStatus, errorThrown) {
        swal('Astagapeer','Ade Nok Salah Mudel e...!','error');
       }
    });

});
}

/*/ Modul Cetak /*/
function cetak_disposisi(id){
event.preventDefault();
  var url = baseUrl+'disposisi/cetak/'+id;
  swal({
        title: 'Apa Anda Yakin untuk Mencetak?',
        text: "Data Naskah Dinas Akan Di Cetak!",
        type: 'success',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Iya, Cetak Data!'              
      }, function isConfirm(){
        $.ajax({
          url:url,
          type:"POST",
          dataType:"JSON",
          success: function (data){
            swal('Selamat !','Berhasil Mencetak data!'+data.link,'success');
            location.reload();
          },
            error: function (jqXHR, textStatus, errorThrown)
            {
              swal('Astagapeer','Ade Nok Salah Mudel e...!','error');
            }
        });
      });
}

function cetak_permohonan(id){
event.preventDefault();
var url = baseUrl+'permohonan/cetak/'+id;
  swal({
        title: 'Apa Anda Yakin untuk mencetak Surat Permohonan?',
        text: "Cetak Surat Permohonan dari Sistem!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Iya, Cetak!'              
      }, function isConfirm(){
        $.ajax({
          url:url,
          type:"POST",
          dataType:"JSON",            
          success: function (data){
            swal('Selamat !','Berhasil Generate PDF !','success');
            location.reload();
          },
            error: function (jqXHR, textStatus, errorThrown)
            {
              swal('Astagapeer','Ade Nok Salah Mudel e...!','error');
            }
        });
      });
}

function cetak_pernyataan(id){
event.preventDefault();
var url = baseUrl+'pernyataan/cetak/'+id;
swal({
        title: 'Apa Anda Yakin?',
        text: "Cetak Surat Peryataan dari Sistem!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Iya, Cetak!'              
      }, function isConfirm(){
        $.ajax({
          url:url,
          type:"POST",
          dataType:"JSON",            
          success: function (data){
            swal('Selamat !','Berhasil Generate PDF !','success');
            location.reload();
          },
            error: function (jqXHR, textStatus, errorThrown)
            {
              swal('Astagapeer','Ade Nok Salah Mudel e...!','error');
            }
        });
      });
}

/* Modul Save / Simpan */
function kirim_sms(){
  event.preventDefault();
  var url = baseUrl+'sms/kirim/';
  swal({
          title: 'Apa Anda Yakin untuk Mengirim SMS?',
          text: "Sms Akan Dikirim Sesuai Pilihan!",
          type: 'success',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Iya, Kirim!'              
        }, function isConfirm(){
          $.ajax({
            url:url,
            type:"POST",
            dataType:"JSON",
            data: $('#sms_input').serialize(),
            success: function (data){
              swal('Selamat !','Berhasil Kirim Sms!','success');
              location.reload();
            },
              error: function (jqXHR, textStatus, errorThrown)
              {
                swal('Astagapeer','Ade Nok Salah Mudel e...!','error');
              }
          });
        }); 
}

function persetujuan_save(){
  event.preventDefault();
  var url = baseUrl+'permohonan/setuju/';
  swal({
          title: 'Apa Anda Yakin untuk Menyetujui Permohonan?',
          text: "Akses ke Form Pernyataan akan dibuka!",
          type: 'success',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Iya, Setujui Data!'              
        }, function isConfirm(){
          $.ajax({
            url:url,
            type:"POST",
            dataType:"JSON",
            data: $('#setuju_input').serialize(),
            success: function (data){
              swal('Selamat !','Berhasil Buka Kunci data!','success');
              location.reload();
            },
              error: function (jqXHR, textStatus, errorThrown)
              {
                swal('Astagapeer','Ade Nok Salah Mudel e...!','error');
              }
          });
        });
}

function bap_save(){
event.preventDefault();
swal({
  title: 'Apa Anda Yakin?',
        text: "Data Verifikasi Akan di Input ke Sistem!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6', 
        cancelButtonColor: '#d33',
        confirmButtonText: 'Iya, Simpan!'              
      }, function isConfirm(){
        var url;
        switch (bap_method) {
          case 'setujui_bap':
            url = baseUrl + 'berita_acara/input';
            break;
          case 'input_tim':
            url = baseUrl + 'tim_pemeriksa/input';
            break;
        }
        $.ajax({
          url:url,
          type:"POST",
          data:$('#bap_input').serialize(),
          dataType:"JSON",            
          success: function(data){
            swal('Selamat !','Berhasil Posting Data Tim Verifikasi Tanah !','success');
            location.reload();
          }
          ,error: function (jqXHR, textStatus, errorThrown)
            {
              swal('Astagapeer','Ade Nok Salah Mudel e...!','error');
              // location.reload();
            }
        });
});
}

function pernyataan_save(){
event.preventDefault();
swal({
        title: 'Apa Anda Yakin?',
        text: "Data Pernyataan Akan di Input ke Sistem!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Iya, Simpan!'              
      }, function isConfirm(){
        $.ajax({
          url: baseUrl+'pernyataan/input',
          type: "POST",
          data: $('#pernyataan_input').serialize(),
          dataType: "JSON",            
          success: function(data){
            swal('Selamat !', 'Berhasil Posting Data Pernyataan !','success');
            location.reload();
          }
          ,error: function (jqXHR, textStatus, errorThrown)
            {
              swal('Astagapeer','Ade Nok Salah Mudel e...!','error');
              location.reload();
            }
        });           
      });
}

function save_disposisi(){
  event.preventDefault();
  swal({
        title: 'Apa Anda Yakin?',
        text: "Kirim dan teruskan Disposisi!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Iya, Kirim!'              
      }, function isConfirm(){
        $.ajax({
          url:baseUrl+'disposisi/post',
          type:"POST",
          data:$('#disposisi_input').serialize(),
          dataType:"JSON",            
          success: function (data){
            swal('Selamat !','Berhasil Posting Data Disposisi !','success');
            location.reload();
          },
            error: function (jqXHR, textStatus, errorThrown)
            {
              swal('Astagapeer','Ade Nok Salah Mudel e...!','error');
            }
        });
      });

}

function save_user(){
  // event.preventDefault();
  var url;
  switch (user_method) {
    case 'posting_user':
    url = baseUrl+'user/input';
      break;
    case 'update_user':
    url = baseUrl+'user/update';
      break;  
    default:
      break;
  }     
  $.ajax({
    url:url,
    type:"POST",
    data:$('#user_data').serialize(),
    dataType: 'JSON',
    success: function (data){
      swal('Selamat !','Berhasil Input data!','success');
      location.reload();
    },
      error: function (jqXHR, textStatus, errorThrown)
      {
        swal('Astagapeer','Ade Nok Salah Mudel e...!','error');
      }

  });
  
}


function save_arsip(){
  var url;
  switch (arsip_method) {
    case 'posting_arsip':
    url = baseUrl+'arsip/input';
      break;
    case 'edit_arsip':
    url = baseUrl+'arsip/update';
      break;
    default:
      break;
  }
  $('#arsip_input').submit(function(evt){
    evt.preventDefault();
    var formData = new FormData($(this)[0]);
    $.ajax({
      url:url,
      type: "POST",
      data: formData,
      async: false,
      cache: false,
      contentType: false,
      enctype: 'multipart/form-data',
      processData: false,
      success: function(data){
        swal('Selamat !','Berhasil Input Data Arsip!','success');
        location.reload();
      }, error: function (jqXHR, textStatus, errorThrown) {
        swal('Astagapeer','Ade Nok Salah Mudel e...!','error');
       }
    });
    
  });
}


function save(){
  var url;
  switch (save_method) {
    case 'posting_klasifikasi':
      url = baseUrl+'klasifikasi/posting';
      break;
    case 'edit_klasifikasi':
      url = baseUrl+'klasifikasi/edit';
      break;
    default:
      break;
  }
  $.ajax({
    url:url,
    type:'POST',
    data:$('#klasifikasi').serialize(),
    dataType: 'JSON',
    success: function (data){
      $('#modal_klasifikasi').modal('show');
      swal('Selamat !','Berhasil menambahkan data!','success');
      location.reload();
    },
      error: function (jqXHR, textStatus, errorThrown)
      {
        swal('Astagapeer','Ade Nok Salah Mudel e...!','error');
      }
  });
}

/*/ Modul Edit /*/
function edit_dusun(id){
  dusun_method = 'edit_dusun';
  $('#data_dusun_form')[0].reset();
  $.ajax({
    url: baseUrl+'dusun/get/'+id,
    type: "GET",
    dataType:"JSON",
    success: function(data){
      $('[name="dusun_id"]').val(data.id);
      $('[name="nama_dusun"]').val(data.nama_dusun);
      $('[name="alamat_dusun"]').val(data.alamat_dusun);
      $('[name="dusun_uid"]').val(data.uid);
      $('#modal_data_dusun').modal('show');
      $('.modal-title').text('Edit Data RT');
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
      swal('Astagapeer','Ade Nok Salah Mudel e...!','error');
    }    
  });
}

function edit_rt(id){
  rt_method = 'edit_rt';
  $('#data_rt_form')[0].reset();
  $.ajax({
    url: baseUrl+'rt/get/'+id,
    type: "GET",
    dataType:"JSON",
    success: function(data){
      $('[name="rt_id"]').val(data.id);
      $('[name="nama_rt"]').val(data.nama_rt);
      $('[name="rt_uid"]').val(data.uid);
      $('[name="dusun_id"]').val(data.dusun_id);
      $('#modal_data_rt').modal('show');
      $('.modal-title').text('Edit Data RT');
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
      swal('Astagapeer','Ade Nok Salah Mudel e...!','error');
    }    
  });
}

function edit_posting(id){
  save_method= 'edit_klasifikasi';
  $('#klasifikasi')[0].reset(); // reset form on modals
  $.ajax({
    url: baseUrl+'klasifikasi/get/'+id,
    type:"GET",
    dataType:"JSON",
    success: function(data){
      $('[name="id"]').val(data.id);
      $('[name="kode"]').val(data.kode);
      $('[name="klasifikasi"]').val(data.klasifikasi);     
      $('#modal_klasifikasi').modal('show');
      $('.modal-title').text('Edit Data Klasifikasi');
    },
      error: function (jqXHR, textStatus, errorThrown)
      {
        swal('Astagapeer','Ade Nok Salah Mudel e...!','error');
      }
  });
}

function edit_user(id){
  user_method= 'update_user';
  $('#user_data')[0].reset();
  $.ajax({
    url: baseUrl+'user/get/'+id,
    type:"GET",
    dataType:"JSON",
    success: function(data){
      $('[name="id"]').val(data.id);
      $('[name="uid"]').val(data.uid);
      $('[name="fullname"]').val(data.fullname);
      $('[name="keterangan_jabatan"]').val(data.keterangan_jabatan);
      $('[name="hp"]').val(data.hp);
      $('#desa').hide();
      $('#jabatan').hide();
      $('#password').hide();
      $('#modal_user').modal('show');
      $('.modal-title').text('Update Data User');
    },
      error: function (jqXHR, textStatus, errorThrown)
      {
        swal('Astagapeer','Ade Nok Salah Mudel e...!','error');
      }
  });

}

/*/ Modul Delete /*/
function delete_posting(id){
  event.preventDefault();
  var url =  baseUrl+'klasifikasi/delete/'+id;
  swal({
        title: 'Apa Anda Yakin?',
        text: "Data Akan dihapus Secara Permanen!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Iya, Hapus Data!'              
      }, function isConfirm(){
        $.ajax({
          url:url,
          type:"POST",
          dataType:"JSON",
          success: function (data){
            swal('Selamat !','Berhasil Menghapus data!','success');
            location.reload();
          },
            error: function (jqXHR, textStatus, errorThrown)
            {
              swal('Astagapeer','Ade Nok Salah Mudel e...!','error');
            }
        });
      });
}

function hapus_rt(id){
  event.preventDefault();
  var url =  baseUrl+'rt/delete/'+id;
  swal({
        title: 'Apa Anda Yakin?',
        text: "Data Akan dihapus Secara Permanen!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Iya, Hapus Data!'              
      }, function isConfirm(){
        $.ajax({
          url:url,
          type:"POST",
          dataType:"JSON",
          success: function (data){
            swal('Selamat !','Berhasil Menghapus data!','success');
            location.reload();
          },
            error: function (jqXHR, textStatus, errorThrown)
            {
              swal('Astagapeer','Ade Nok Salah Mudel e...!','error');
            }
        });
      });
}

function hapus_dusun(id){
  event.preventDefault();
  var url =  baseUrl+'dusun/delete/'+id;
  swal({
        title: 'Apa Anda Yakin?',
        text: "Data Akan dihapus Secara Permanen!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Iya, Hapus Data!'              
      }, function isConfirm(){
        $.ajax({
          url:url,
          type:"POST",
          dataType:"JSON",
          success: function (data){
            swal('Selamat !','Berhasil Menghapus data!','success');
            location.reload();
          },
            error: function (jqXHR, textStatus, errorThrown)
            {
              swal('Astagapeer','Ade Nok Salah Mudel e...!','error');
            }
        });
      });
}

function delete_user(id){
  event.preventDefault();
  var url =  baseUrl+'user/delete/'+id;
  swal({
        title: 'Apa Anda Yakin?',
        text: "Data Akan dihapus Secara Permanen!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Iya, Hapus Data!'              
      }, function isConfirm(){
        $.ajax({
          url:url,
          type:"POST",
          dataType:"JSON",
          success: function (data){
            swal('Selamat !','Berhasil Menghapus data!','success');
            location.reload();
          },
            error: function (jqXHR, textStatus, errorThrown)
            {
              swal('Astagapeer','Ade Nok Salah Mudel e...!','error');
            }
        });
      });
}

/*/ Modul Tandai /*/
function baca_arsip(id){
  $.ajax({
    url: baseUrl+'disposisi/tandai/baca/'+id,
    dataType: "JSON",
    type: "POST",
    success:function(data){
      swal('Selamat !','Membaca Detail!','success');
    }, error: function (jqXHR, textStatus, errorThrown) {
        swal('Astagapeer','Ade Nok Salah Mudel e...!','error');
       }
  });
}

function lihat_notif(id){
$.ajax({
  url: baseUrl+'notifikasi/baca/'+id,
  type:"POST",
  dataType:"JSON",
  success:function(data){
    swal('Ditandai!','Ditandai Telah Di Baca !','success');
  }, error: function (jqXHR, textStatus, errorThrown) {
        swal('Astagapeer','Ade Nok Salah Mudel e...!','error');
       }
});
}


/*================================================= */
/*/                Peta Handler System             /*/
/*/================================================/*/

function push_data(id, luas) {
   event.preventDefault();
   swal({
     title: 'Apa Anda Yakin?',
     text: "Data Akan di Funalisasi database Utama tabel SKT/Rekomendasi !",
     type: 'warning',
     showCancelButton: true,
     confirmButtonColor: '#3085d6',
     cancelButtonColor: '#d33',
     confirmButtonText: 'Iya, Push Data!'
   }, function isConfirm() {
     html2canvas($("#map-canvas"), {
       useCORS: true,
       onrendered: function (canvas) {
         var imagedata = canvas.toDataURL('image/png');
         var imgdata = imagedata.replace(/^data:image\/(png|jpg);base64,/, "");
        //  var formData = new FormData($(this)[0]);
         $.ajax({
               url: baseUrl+'polygon/push',
               type: "POST",
               data: { img_data : imgdata, bap_id : id },
               success: function (data) {
                  // console.log(data);
                  swal('Selesai!', 'Berhasil Push dan Kunci data Pertanahan !', 'success');
                  location.reload();
               }, error: function (jqXHR, textStatus, errorThrown) {
                  swal('Astagapeer', 'Ade Nok Salah Mudel e...!', 'error');
               }
         });
       }
     });
   });
}

//bap_input

function edit_titik_tengah(id){ 
  var url = baseUrl + 'get/koordinat/tengah/' + id;
  event.preventDefault();
  swal({
    title: 'Apa Anda Ingin Merubah Titik Tengah?',
    text: "Edit Data Titik Tengah",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Iya, Edit Data!'
  }, function isConfirm() {
    $('#data_koordinat')[0].reset();
    $.ajax({
      url: url,
      type: "GET",
      dataType: "JSON",
      success: function (data) {
        koordinat_method = 'edit_koordinat_tengah';
        $('[name="tengah_id"]').val(data.id);
        $('[name="lat"]').val(data.lat);
        $('[name="lng"]').val(data.lng);
        $('[name="keterangan"]').val(data.keterangan);
        $('#foto-patok img').attr('src', baseUrl + 'assets/uploader/patok/' + data.foto_tanah);
        $('#utara').hide();
        $('#selatan').hide();
        $('#barat').hide();
        $('#timur').hide();

        $('#modal_koordinat').modal('show');
        $('.modal-title').text('Update Titik Tengah');
      },
      error: function (jqXHR, textStatus, errorThrown) {
        swal('Astagapeer', 'Ade Nok Salah Mudel e...!', 'error');
      }
    });
  });
}

function edit_patok(id) {
  var url = baseUrl + 'get/koordinat/tanah/' + id;
  event.preventDefault();
  swal({
    title: 'Apa Anda Ingin Merubah Data Patok?',
    text: "Edit Data Patok",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Iya, Edit Data!'
  }, function isConfirm() {      
      $('#data_koordinat')[0].reset();
      $.ajax({
        url: url,
        type:"GET",
        dataType: "JSON",
        success: function(data){          
          koordinat_method = 'edit_koordinat_tanah';
          $('[name="id_patok"]').val(data.id);
          $('[name="lat"]').val(data.lat);
          $('[name="lng"]').val(data.lng);
          $('[name="utara"]').val(data.utara);
          $('[name="selatan"]').val(data.selatan);
          $('[name="timur"]').val(data.timur);
          $('[name="barat"]').val(data.barat);
          $('#keterangan').hide();

          $('#foto-patok img').attr('src', baseUrl+'assets/uploader/patok/'+data.link_dokumentasi);
          $('#modal_koordinat').modal('show'); 
          $('.modal-title').text('Update Data Patok');
        },
        error: function (jqXHR, textStatus, errorThrown) {
          swal('Astagapeer', 'Ade Nok Salah Mudel e...!', 'error');
        }
      });
  });
}

function hapus_patok(id) {
  event.preventDefault();
  swal({
    title: 'Apa Anda Ingin Menghapus Data Patok ?',
    text: "Hapus Data Patok Secara Permanen",
    type: 'error',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Iya, Hapus Patok!'
  }, function isConfirm() {   
    $.ajax({
      url: baseUrl +'delete/koordinat/'+id,
      type:"POST",
      success: function(data){
        swal('Selamat !', 'Berhasil Menghapus Data Koordinat di Sistem!', 'success');
        location.reload();
      },
      error: function (jqXHR, textStatus, errorThrown) {
        swal('Astagapeer', 'Ade Nok Salah Mudel e...!', 'error');
      }

    });
  });
}


function add_koordinat_tengah() {
  var data_koor;
  koordinat_method = 'koordinat_tengah';
  var geoOptions = {
    enableHighAccuracy: true
  }
  var geoSuccess = function (position) {
    data_koor = position;
    $('[name="lat"]').val(data_koor.coords.latitude);
    $('[name="lng"]').val(data_koor.coords.longitude);
    console.log('Lat: ' + data_koor.coords.latitude + ', Lng : ' + data_koor.coords.longitude);
  };
  var geoError = function (error) {
    console.log('Error occurred. Error code: ' + error.code);
  };
  navigator.geolocation.getCurrentPosition(geoSuccess, geoError, geoOptions);
  $('#data_koordinat')[0].reset();
  $('#patok').hide();
  $('#foto-patok').hide();
  $('#utara').hide();
  $('#selatan').hide();
  $('#barat').hide();
  $('#timur').hide();
  $('#modal_koordinat').modal('show');
}



function add_koordinat() {
  koordinat_method = 'koordinat_tanah';
  var data_koor;
  var geoOptions = {
    enableHighAccuracy: true
  }
  var geoSuccess = function (position) {
    data_koor = position;
    $('[name="lat"]').val(data_koor.coords.latitude);
    $('[name="lng"]').val(data_koor.coords.longitude);
    console.log('Lat: ' + data_koor.coords.latitude + ', Lng : ' + data_koor.coords.longitude);
  };
  var geoError = function (error) {
    console.log('Error occurred. Error code: ' + error.code);
  };
  navigator.geolocation.getCurrentPosition(geoSuccess, geoError, geoOptions);
  $('#data_koordinat')[0].reset();
  $('#foto-patok').hide();
  $('#keterangan').hide();
  $('#modal_koordinat').modal('show');
}

function save_koordinat() {
  var url;
  switch (koordinat_method) {
    case 'koordinat_tengah':
      url = baseUrl + 'koordinat/tengah';
      break;
    case 'edit_koordinat_tengah':
      url = baseUrl + 'update/koordinat/tengah';
      break;
    case 'koordinat_tanah':
      url = baseUrl + 'koordinat/tanah';
      break;
    case 'edit_koordinat_tanah':
      url = baseUrl + 'update/koordinat';
      break;
  }
  $('#data_koordinat').submit(function (evt) {
    evt.preventDefault();
    var formData = new FormData($(this)[0]);
    $.ajax({
      url: url,
      type: "POST",
      data: formData,
      async: false,
      cache: false,
      contentType: false,
      enctype: 'multipart/form-data',
      processData: false,
      success: function (data) {
        swal('Selamat !', 'Berhasil Input Data Koordinat Ke Sistem!', 'success');
        // var obj = JSON.parse(data);
        // console.log("status : "+obj.status + " message : "+obj.message);
        location.reload();
      }, error: function (jqXHR, textStatus, errorThrown) {
        swal('Astagapeer', 'Ade Nok Salah Mudel e...!', 'error');
      }
    });
  });

}

function aktifasi_download(){
  // $('#aktivasi_form')[0].reset();
  $('#aktivasi_modal').modal('show');
}

function buka_kunci_download(){
  event.preventDefault();
  swal({
    title: 'Apa Anda Ingin Mengaktivasi Data Download ?',
    text: "Data Akan Mengirimkan Jenis Surat Tanah dan Perhitungan Luas dari System",
    type: 'error',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Iya, Aktivasi Data!'
  }, function isConfirm() {
    $.ajax({
      url: baseUrl + 'aktivasi/download',
      type: "POST",
      dataType:"JSON",
      data: $('#aktivasi_form').serialize(),
      success: function (data) {
        swal('Selamat !', 'Berhasil Mengaktivasi Tombol Download di Sistem!', 'success');
        location.reload();
      },
      error: function (jqXHR, textStatus, errorThrown) {
        swal('Astagapeer', 'Ade Nok Salah Mudel e...!', 'error');
      }

    });
  });
}

function add_geo(){
  $('#data_geo')[0].reset();
  $('#modal_geo').modal('show');
}

function save_geo(){
  var url = baseUrl + 'geojson/input';
  $('#data_geo').submit(function (evt) {
    evt.preventDefault();
    var formData = new FormData($(this)[0]);
    $.ajax({
      url: url,
      type: "POST",
      data: formData,
      async: false,
      cache: false,
      contentType: false,
      enctype: 'multipart/form-data',
      processData: false,
      success: function (data) {
        swal('Selamat !', 'Berhasil Input Data Koordinat Ke Sistem!', 'success');
        // var obj = JSON.parse(data);
        // console.log("status : "+obj.status + " message : "+obj.message);
        location.reload();
      },
      error: function (jqXHR, textStatus, errorThrown) {
        swal('Astagapeer', 'Ade Nok Salah Mudel e...!', 'error');
      }
    });
  });
}

function ganti_password_one(id){
  $('#setting_user')[0].reset();
  $('#set_uid').hide();
  $('#set_nama').hide();
  $('#set_keterangan').hide();
  $('#set_hp').hide();
  $('#set_uid').hide();

  $('#password').show();
  $('#modal_setting_user').modal('show');
}

function edit_user_one(id){
  $('#setting_user')[0].reset();
  $('#password').hide();

  $('#set_uid').show();
  $('#set_nama').show();
  $('#set_keterangan').show();
  $('#set_hp').show();
  $('#set_uid').show();

  $('#modal_setting_user').modal('show');
}

function save_setting_one(){

}

function validate_setting_pass(){
  
}

/*/================================================/*/
/*/                                                /*/
/*/               DON'T BE A DICK                  /*/
/*/                                                /*/
/*/           Just Call Me if You See              /*/
/*/           This Code Provided For               /*/
/*/           https://si-desa.id project           /*/
/*/           By : Veris Juniardi                  /*/
/*/================================================/*/
