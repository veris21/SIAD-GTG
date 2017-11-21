<?php
function cek_login(){
      $CI=&get_instance();
      if($CI->session->userdata('status_login') != 'Oke' || $CI->session->userdata('status_login') == '' || $CI->session->userdata('status_login') == NULL){
        redirect('public');
      }
}
?>
