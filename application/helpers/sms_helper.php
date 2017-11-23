<?php
function sms_notifikasi($to, $message, $return = '0')
{
  $id = 1;
  $CI =& get_instance();
  $key = $CI->option_model->sms_opt($id)->row_array();
  // $userkey="cmtiad"; // userkey lihat di zenziva
  // $passkey="v3r15juniard1"; // set passkey di zenziva
  $userkey=$key['userKey']; // userkey lihat di zenziva
  $passkey=$key['passKey']; // set passkey di zenziva
  $url = "https://reguler.zenziva.net/apps/smsapi.php";
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
