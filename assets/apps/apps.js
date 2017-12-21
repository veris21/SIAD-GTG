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
var arsip_method;
var message = '';
var maksimal;
var sisa;
function refresh(){
  location.reload();
}

function hitungkarakter(){  
  var max = 150;
  var message = $('[name="message"]').val().length;
  $('[name="sisa"').val(max - message);
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
// Pertanahan
$("#list_permohonan").DataTable({
  responsive: true,
});

$("#list_bap").DataTable({
  responsive: true,
});

$("#table_klasifikasi_surat").DataTable({
  responsive: true, 
  rowGroup: {
    dataSrc: 'tipe'
    }
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

            SETTING FUNGSI - FUNSI
_________________________________________________
================================================*/

// TODO: SETTING Untuk Pencarian


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
  function input_penduduk_baru(){
    swal({
            title: 'Apa Anda Menginput Data Penduduk Baru?',
            text: "Data penduduk Akan digunakan untuk mengaktifkan fitur - fitur SiDesa !",
            type: 'success',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Iya, Input Data!'              
          }, function isConfirm(){
            $('#input_data_penduduk_baru')[0].reset();
            $('#modal_input_data_penduduk_baru').modal('show');
          });
           
  }

  function button_input_desa(){
    // swal('Di Klik','Tombol dipencet!','error');
    // $('#desa_baru')[0].reset();
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
    $('#bap_input')[0].reset();
    $('#modal_bap').modal('show');
  }

  function posting_arsip(){
    arsip_method = 'posting_arsip';
    $('#arsip_input')[0].reset();
    $('#modal_arsip').modal('show');
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

function save_edit_data_desa(){
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

function save_data_penduduk_baru(){
  $('#input_data_penduduk_baru').submit(function(evt){
    evt.preventDefault();
    var url = baseUrl+'input/datapenduduk';
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
        swal('Selamat !','Berhasil Input Data Penduduk Baru Ke Sistem!','success');
        location.reload();
      }, error: function (jqXHR, textStatus, errorThrown) {
        swal('Astagapeer','Ade Nok Salah Mudel e...!','error');
       }
    });
    
  });
}

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
        text: "Data Tim Verifikasi Akan di Input ke Sistem!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Iya, Simpan!'              
      }, function isConfirm(){
        $.ajax({
          url:baseUrl+'berita_acara/input',
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
              location.reload();
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

/*/================================================/*/
/*/                                                /*/
/*/               DON'T BE A DICK                  /*/
/*/                                                /*/
/*/================================================/*/
