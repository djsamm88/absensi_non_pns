<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('hanya_nomor'))
{
	function hanya_nomor($string) 
	{
		if (preg_match('/[0-9]+/', $string))
		{
			return preg_replace('/\D/', '', $string);
		}else{
			return (int)0;
		}
		
	}
}

function rupiah($nilai, $pecahan = 0) 
{
    return number_format($nilai, $pecahan, ',', '.');
}

function buang_spasi($string)
{
	$string = preg_replace('/\s+/', '', $string);
	return $string;
}

function tanggalindo($tanggal)
{
$taketgl = substr($tanggal, 0,10);
$tahun = substr($taketgl, 0,4);
$bulan = substr($taketgl, 5,2);
$tanggal = substr($taketgl, 8,2);

if($bulan=="01") $bulan = "Januari";
if($bulan=="02") $bulan = "Februari";
if($bulan=="03") $bulan = "Maret";
if($bulan=="04") $bulan = "April";
if($bulan=="05") $bulan = "Mei";
if($bulan=="06") $bulan = "Juni";
if($bulan=="07") $bulan = "Juli";
if($bulan=="08") $bulan = "Agustus";
if($bulan=="09") $bulan = "September";
if($bulan=="10") $bulan = "Oktober";
if($bulan=="11") $bulan = "November";
if($bulan=="12") $bulan = "Desember";

$tgl = $tanggal." ".$bulan." ".$tahun;

return $tgl;
}

function tglindo($tanggal)
{
$taketgl = substr($tanggal, 0,10);
$tahun = substr($taketgl, 0,4);
$bulan = substr($taketgl, 5,2);
$tanggal = substr($taketgl, 8,2);


$tgl = $tanggal."-".$bulan."-".$tahun;

return $tgl;
}



function blnindo($tanggal)
{
$taketgl = substr($tanggal, 0,10);
$tahun = substr($taketgl, 0,4);
$bulan = substr($taketgl, 5,2);
$tanggal = substr($taketgl, 8,2);

if($bulan=="01") $bulan = "Januari";
if($bulan=="02") $bulan = "Februari";
if($bulan=="03") $bulan = "Maret";
if($bulan=="04") $bulan = "April";
if($bulan=="05") $bulan = "Mei";
if($bulan=="06") $bulan = "Juni";
if($bulan=="07") $bulan = "Juli";
if($bulan=="08") $bulan = "Agustus";
if($bulan=="09") $bulan = "September";
if($bulan=="10") $bulan = "Oktober";
if($bulan=="11") $bulan = "November";
if($bulan=="12") $bulan = "Desember";



return $bulan;
}




function bulanindo($bulan)
{	
if($bulan=="01") $bulan = "Januari";
if($bulan=="02") $bulan = "Februari";
if($bulan=="03") $bulan = "Maret";
if($bulan=="04") $bulan = "April";
if($bulan=="05") $bulan = "Mei";
if($bulan=="06") $bulan = "Juni";
if($bulan=="07") $bulan = "Juli";
if($bulan=="08") $bulan = "Agustus";
if($bulan=="09") $bulan = "September";
if($bulan=="10") $bulan = "Oktober";
if($bulan=="11") $bulan = "November";
if($bulan=="12") $bulan = "Desember";
return $bulan;
}


function bulantahunindo($bulan)
{
	
$taketgl = substr($bulan, 0,10);
$tahun = substr($taketgl, 0,4);
$bulan = substr($taketgl, 5,2);
$tanggal = substr($taketgl, 8,2);
	
if($bulan=="01") $bulan = "Jan";
if($bulan=="02") $bulan = "Feb";
if($bulan=="03") $bulan = "Mar";
if($bulan=="04") $bulan = "Apr";
if($bulan=="05") $bulan = "Mei";
if($bulan=="06") $bulan = "Jun";
if($bulan=="07") $bulan = "Jul";
if($bulan=="08") $bulan = "Agu";
if($bulan=="09") $bulan = "Sep";
if($bulan=="10") $bulan = "Okt";
if($bulan=="11") $bulan = "Nov";
if($bulan=="12") $bulan = "Des";
return $bulan." ".$tahun;
}



function tahunindo($bulan)
{
	
$taketgl = substr($bulan, 0,10);
$tahun = substr($taketgl, 0,4);
$bulan = substr($taketgl, 5,2);
$tanggal = substr($taketgl, 8,2);
	
if($bulan=="01") $bulan = "Jan";
if($bulan=="02") $bulan = "Feb";
if($bulan=="03") $bulan = "Mar";
if($bulan=="04") $bulan = "Apr";
if($bulan=="05") $bulan = "Mei";
if($bulan=="06") $bulan = "Jun";
if($bulan=="07") $bulan = "Jul";
if($bulan=="08") $bulan = "Agu";
if($bulan=="09") $bulan = "Sep";
if($bulan=="10") $bulan = "Okt";
if($bulan=="11") $bulan = "Nov";
if($bulan=="12") $bulan = "Des";
return $tahun;
}


function menitKeJam($time, $format = '%02d:%02d') 
{
    if ($time < 1) {
        return;
    }
    $hours = floor($time / 60);
    $minutes = ($time % 60);
    return sprintf($format, $hours, $minutes);
}
//echo menitKeJam(250, '%02d Jam %02d menit');




function isWeekend($date) 
{
    $weekDay = date('w', strtotime($date));
    return ($weekDay == 0 || $weekDay == 6);
}



function curl_file_exist($url){
    $ch = curl_init($url);    
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if($code == 200){
       $status = true;
    }else{
      $status = false;
    }
    curl_close($ch);
   return $status;
}


function buang_single_quote($string)
{
	return (str_replace("'","`",$string));
}



function ambil_thumbs($url)
{		
	if(strpos($url, 'user_image') !== false) {
	 	$url_images = explode("user_image",$url);
		$get_images = str_replace("/images/","user_image/_thumbs/Images/",$url_images[1]);	
			
		return $url_images[0].$get_images;
	} else {
		return $url;
	}

}



function buat_link($text)
{ 
  $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
  $text = trim($text, '-');
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
  $text = strtolower($text);
  $text = preg_replace('~[^-\w]+~', '', $text);
  if (empty($text))
  {
    return 'n-a';
  }
  return $text;
}

function randomnya($length = 10) 
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) 
	{
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}


function dapat_gambar($semua)
{				
		$frst_image = preg_match_all( '|<img.*?src=[\'"](.*?)[\'"].*?>|i', $semua, $matches );
		
		if(@$matches[ 1 ][ 0 ]){					
			return @$matches[ 1 ][ 0 ];
			
		}else{
			return "https://medantechno.com/user_image/images/medan_techno.jpg";
		}
		
	
}


function buat_desc($isi,$panjang=300)
{
	$out = substr(strip_tags($isi),0,$panjang).'...';
	return preg_replace('!\s+!', ' ', $out);
}


function embed_youtube($string)
{
	return preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","<iframe width=\"420\" height=\"315\" src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>",$string);
}



function bikin_username($id_member,$nama)
{
	
  $text = preg_replace('~[^\\pL]+~u', '', $nama);
  $text = trim($text, '');
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
  $text = strtolower($text);
  $text = preg_replace('~[^-\w]+~', '', $text);
	
	return $text.$id_member;
}



function exec_url($fullurl)
{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_VERBOSE, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_FAILONERROR, 0);
		curl_setopt($ch, CURLOPT_URL, $fullurl);
		
		$returned =  curl_exec($ch);
	
		return ($returned);

}



function httpsCurl($url) 
{

$header = array("Accept: application/json");

$ch = curl_init();
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_ENCODING, "gzip");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)');

$retValue = curl_exec($ch);
$response = json_decode(curl_exec($ch));
$ee       = curl_getinfo($ch);
print_r($ee);

print_r($retValue);

}



function post_ke_firebase($fullurl,$fields)
{
		
		$jsonnya = json_encode($fields);
		
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_VERBOSE, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_FAILONERROR, 0);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
		curl_setopt($ch, CURLOPT_URL, $fullurl);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$jsonnya);
		$returned =  curl_exec($ch);
	
		return(json_decode($returned));
}

function put_ke_firebase($fullurl,$fields)
{
		
		$jsonnya = json_encode($fields);
		
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_VERBOSE, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_FAILONERROR, 0);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
		curl_setopt($ch, CURLOPT_URL, $fullurl);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$jsonnya);
		$returned =  curl_exec($ch);
	
		return(json_decode($returned));
}

function patch_ke_firebase($fullurl,$fields)
{
		
		$jsonnya = json_encode($fields);
		
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_VERBOSE, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_FAILONERROR, 0);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
		curl_setopt($ch, CURLOPT_URL, $fullurl);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$jsonnya);
		$returned =  curl_exec($ch);
	
		return(json_decode($returned));
}

//var_dump(kirim_ke_firebase('https://pay-inm.firebaseio.com/tbl_admin_online.json',array("a"=>"b","c"=>"d")));



function tanggal_antara($a,$b)
{

	$period = new DatePeriod(
				 new DateTime($a),
				 new DateInterval('P1D'),
				 new DateTime($b)
			);

	$c = array();
	foreach($period as $date)
	{
		$c[] = $date->format("Y-m-d");
	}
	
	$c[] = $b;
	
	return $c;
}




function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
