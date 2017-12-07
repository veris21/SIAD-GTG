$(".fancybox").fancybox({
    openEffect: "none",
    closeEffect: "none"
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

  $("#table_klasifikasi_surat").DataTable({
    responsive: true, 
    rowGroup: {
      dataSrc: 'tipe'
      }
  });

  $(".select2").select2();
  $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
  $("[data-mask]").inputmask();

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
  // fast_search system load
  $('#fast_search').select2({
    ajax: {
      url: 'lookup',
      dataType: 'json',
      processResults: function (data) {
        return {
          results: data
        };
      },
      cache: true
    }
  });

  function cari_data() {
    event.preventDefault();
    var nik = $('[name="cari_tanah_nik"]').val();
    if(nik!=''){
      $('#loader-icon').show();
      $('#result_cari_data').hide();
      $('#data_kosong').hide();
      $.ajax({
        url:'<?php echo BASE_URL.'cari/nik/';?>'+nik,
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
      // $.get('<?php echo BASE_URL.'cari/nik/';?>'+nik,
      //   function(data){
      //     if(data){
      //       $('#result_cari_data').show();
      //       var obj = JSON.parse(data);
      //         console.log(data);
      //       $('#no_nik').text("NIK "+obj.no_nik);
      //       $('#no_kk').text("No. KK "+obj.no_kk);
      //       $('#nama').text(obj.nama);
      //       $('#ttl').text(obj.tempat_lahir+"/"+obj.tanggal_lahir);
      //       $('#pddk_akhir').text(obj.pddk_akhir);
      //     }else{
      //       $('#result_cari_data').hide();
      //       $('#data_kosong').show();  
      //     }            
      // });
    }
  }