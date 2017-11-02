<?php
function sms_notifikasi($to, $message, $return = '0')
{
  $id = 1;
  $CI =& get_instance();
  $key = $CI->option_model->sms_opt($id)->row_array();
  $userkey = $key['userKey'];
  $passkey = $key['passKey'];
	$smsgatewayurl = $key['url'];
  $elementapi = $key['kirim_api'];
  $type = $key['type'];
	$message = urlencode($message);
	$parameterapi = $elementapi.'?userkey='.$userkey.'&passkey='.$passkey.'&nohp='.$to.'&tipe='.$type.'&pesan='.$message;
	$smsgatewaydata = $smsgatewayurl.$parameterapi;
	$url = $smsgatewaydata;
	$ch=curl_init();
	curl_setopt($ch, CURLOPT_POST, false);
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$output=curl_exec($ch);
	if (!$output) {
		$output = file_get_contents($smsgatewaydata);
	}
	if ($return == '1')
	{
		return $output;
	}else{
    return;
	}
}
