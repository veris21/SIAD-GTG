<?php
function cek_login(){
      $CI=&get_instance();
      if($CI->session->userdata('status_login') !='Oke'){
          redirect(BASE_URL);
      }
}
?>
