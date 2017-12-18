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
var save_method;
var arsip_method;      

function refresh(){
  location.reload();
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
          url:base_url+'cari/skt/'+nik,
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
                  swal('Oops...','Something went wrong!','error');
                }
        });
      }
    }

  function input_penduduk_baru(){
    swal({
            title: 'Apa Anda Menginput Data Penduduk Baru?',
            text: "Data penduduk Akan digunakan untuk mengaktifkan fitur - fitur SiDesa !",
            type: 'success',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Iya, Setujui Data!'              
          }, function isConfirm(){
            $('#input_data_penduduk_baru')[0].reset();
            $('#modal_input_data_penduduk_baru').modal('show');
          });
           
  }

  
  function buat_disposisi(){
    $('#disposisi_input')[0].reset();
    $('#modal_disposisi').modal('show');
  }

  

  // ====================================== PERTANAHAN
  
  
  function pernyataan_input(){
    $('#pernyataan_input')[0].reset();
    $('#modal_pernyataan').modal('show');
  }

  function input_tim_verifikasi(){
    $('#bap_input')[0].reset();
    $('#modal_bap').modal('show');
  }

  
 

  // DISPOSISI
  
  

  function posting_arsip(){
    arsip_method = 'posting_arsip';
    $('#arsip_input')[0].reset();
    $('#modal_arsip').modal('show');
  }

  
    
    function posting(){
      save_method = 'posting_klasifikasi';
      $('#klasifikasi')[0].reset(); // reset form on modals
      $('#modal_klasifikasi').modal('show');
    }
    