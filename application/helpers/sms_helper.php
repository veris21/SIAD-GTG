<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function sms_notifikasi($to, $message, $return = '0')
{
  $id = 1;
  $CI =& get_instance();
  $key = $CI->option_model->sms_opt($id)->row_array();
  // $userkey="cmtiad"; // userkey lihat di zenziva
  // $passkey="v3r15juniard1"; // set passkey di zenziva
  $userkey=$key['user']; // userkey lihat di zenziva
  $passkey=$key['pass']; // set passkey di zenziva
  $link = $key['url'];
  $url = $link."/apps/smsapi.php";
  $curlHandle = curl_init();
  curl_setopt($curlHandle, CURLOPT_URL, $url);
  curl_setopt($curlHandle, CURLOPT_POSTFIELDS, 'userkey='.$userkey.'&passkey='.$passkey.'&nohp='.$to.'&pesan='.urlencode($message));
  curl_setopt($curlHandle, CURLOPT_HEADER, 0);
  curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
  curl_setopt($curlHandle, CURLOPT_POST, 1);
  $results = curl_exec($curlHandle);
  curl_close($curlHandle);
}

function check_sisa_sms(){
  $id = 1;
  $CI =& get_instance();
  $key = $CI->option_model->sms_opt($id)->row_array();
  $userkey=$key['user']; // userkey lihat di zenziva
  $passkey=$key['pass']; // set passkey di zenziva
  $link = $key['url'];
  $url = $link."/apps/smsapibalance.php";
  $curlHandle = curl_init();
  curl_setopt($curlHandle, CURLOPT_URL, $url);
  curl_setopt($curlHandle, CURLOPT_POSTFIELDS, 'userkey='.$userkey.'&passkey='.$passkey);
  curl_setopt($curlHandle, CURLOPT_HEADER, 0);
  curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
  curl_setopt($curlHandle, CURLOPT_POST, 1);
  $results = curl_exec($curlHandle);
  curl_close($curlHandle);
  return $results;
}
