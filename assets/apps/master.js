
// // ======= Posting Via Ajax 
// var save_method;
//       function posting(){
//         save_method = 'posting_klasifikasi';
//         $('#klasifikasi')[0].reset(); // reset form on modals
//         $('#modal_klasifikasi').modal('show');
//       }
//       function delete_posting(id){
//         event.preventDefault();
//         var url = '<?php echo BASE_URL."klasifikasi/delete/";?>'+id;
//         swal({
//               title: 'Apa Anda Yakin?',
//               text: "Data AKan dihapus Secara Permanen!",
//               type: 'warning',
//               showCancelButton: true,
//               confirmButtonColor: '#3085d6',
//               cancelButtonColor: '#d33',
//               confirmButtonText: 'Iya, Hapus Data!'              
//             }, function isConfirm(){
//               $.ajax({
//                 url:url,
//                 type:"POST",
//                 dataType:"JSON",
//                 success: function (data){
//                   swal('Good job!','Berhasil Menghapus data!','success');
//                   location.reload();
//                 },
//                   error: function (jqXHR, textStatus, errorThrown)
//                   {
//                     swal('Oops...','Something went wrong!','error');
//                   }
//               });
//             });
//       }
//       function edit_posting(id){
//         save_method= 'edit_klasifikasi';
//         $('#klasifikasi')[0].reset(); // reset form on modals
//         $.ajax({
//           url:'<?php echo BASE_URL."klasifikasi/get/";?>'+id,
//           type:"GET",
//           dataType:"JSON",
//           success: function(data){
//             $('[name="id"]').val(data.id);
//             $('[name="kode"]').val(data.kode);
//             $('[name="klasifikasi"]').val(data.klasifikasi);
//             $('#modal_klasifikasi').modal('show');
//             $('.modal-title').text('Edit Data Klasifikasi');
//           },
//             error: function (jqXHR, textStatus, errorThrown)
//             {
//               swal('Oops...','Something went wrong!','error');
//             }
//         });
//       }
//       function save(){
//         var url;
//         switch (save_method) {
//           case 'posting_klasifikasi':
//             url = '<?php echo BASE_URL."klasifikasi/posting";?>';
//             break;
//           case 'edit_klasifikasi':
//             url = '<?php echo BASE_URL."klasifikasi/edit";?>';
//             break;
//           default:
//             break;
//         }
//         $.ajax({
//           url:url,
//           type:'POST',
//           data:$('#klasifikasi').serialize(),
//           dataType: 'JSON',
//           success: function (data){
//             $('#modal_klasifikasi').modal('show');
//             swal('Good job!','Berhasil menambahkan data!','success');
//             location.reload();
//           },
//             error: function (jqXHR, textStatus, errorThrown)
//             {
//               swal('Oops...','Something went wrong!','error');
//             }
//         });
//       }