<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('terbilang')){
	function terbilang ($number) {
		$words = "";
		$arr_number = array(
		"",
		"Satu",
		"Dua",
		"Tiga",
		"Empat",
		"Lima",
		"Enam",
		"Tujuh",
		"Delapan",
		"Sembilan",
		"Sepuluh",
		"Sebelas");

		if($number<12)
		{
			$words = " ".$arr_number[$number];
		}
		else if($number<20)
		{
			$words = terbilang($number-10)." Belas";
		}
		else if($number<100)
		{
			$words = terbilang($number/10)." Puluh ".terbilang($number%10);
		}
		else if($number<200)
		{
			$words = "Seratus ".terbilang($number-100);
		}
		else if($number<1000)
		{
			$words = terbilang($number/100)." Ratus ".terbilang($number%100);
		}
		else if($number<2000)
		{
			$words = "Seribu ".terbilang($number-1000);
		}
		else if($number<1000000)
		{
			$words = terbilang($number/1000)." Ribu ".terbilang($number%1000);
		}
		else if($number<1000000000)
		{
			$words = terbilang($number/1000000)." Juta ".terbilang($number%1000000);
		}
		else
		{
			$words = "undefined";
		}
		return $words;
	}
}
if ( ! function_exists('bulan'))
{
	function bulan($bln)
	{
		switch ($bln)
		{
			case 1:
				return "Januari";
				break;
			case 2:
				return "Februari";
				break;
			case 3:
				return "Maret";
				break;
			case 4:
				return "April";
				break;
			case 5:
				return "Mei";
				break;
			case 6:
				return "Juni";
				break;
			case 7:
				return "Juli";
				break;
			case 8:
				return "Agustus";
				break;
			case 9:
				return "September";
				break;
			case 10:
				return "Oktober";
				break;
			case 11:
				return "November";
				break;
			case 12:
				return "Desember";
				break;
		}
	}
}

if ( ! function_exists('romawi'))
{
	function romawi($rm)
	{
		switch ($rm)
		{
			case 1:
				return "I";
				break;
			case 2:
				return "II";
				break;
			case 3:
				return "III";
				break;
			case 4:
				return "IV";
				break;
			case 5:
				return "V";
				break;
			case 6:
				return "VI";
				break;
			case 7:
				return "VII";
				break;
			case 8:
				return "VIII";
				break;
			case 9:
				return "IX";
				break;
			case 10:
				return "X";
				break;
			case 11:
				return "XI";
				break;
			case 12:
				return "XII";
				break;
		}
	}
}


if ( ! function_exists('nama_hari'))
{
	function nama_hari($hari)
	{
		switch ($hari) {
			case 'Sun':
				return 'Minggu';
				break;
			case 'Mon':
				return 'Senin';
				break;
			case 'Tue':
				return 'Selasa';
				break;
			case 'Wed':
				return 'Rabu';
				break;
			case 'Thu':
				return 'Kamis';
				break;
			case 'Fri':
				return 'Jumat';
				break;
			case 'Sat':
				return 'Sabtu';
				break;
			default:
				# code...
				break;
		}
	}
}