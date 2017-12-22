/*==============================================
      AUTH UID VALIDATE
===============================================*/
function validate(){
    event.preventDefault();
    var uid = $('[name="uid"]').val();
    var pass = $('[name="pass"]').val();
    $('#overlay').show();
    $('[class="auth-form"]').hide();
    $.ajax({
      url: baseUrl+'auth',
      type:"POST",
      dataType:"JSON",
      data:$("#auth").serialize(),
      success: function(data){
        if(data.status == true ){
          $('#overlay').hide();
          swal('Login Berhasil','Sistem dibuka...!','success');
          window.location.replace(baseUrl);
        }else{
          $('#overlay').hide();
          $('[class="auth-form"]').show();
          $('#auth')[0].reset();
          swal('Login ditolak','data tidak ditemukan e...!','warning');         
        }
      }, error: function (jqXHR, textStatus, errorThrown)
      {
        $('#overlay').hide();
        $('[class="auth-form"]').show();
        $('#auth')[0].reset();
        swal('Astagapeer','Ade Nok Salah Mudel e...!','error');       
      }
    });
  }