<?php
namespace App\Helpers;

use Carbon\Carbon;
use Carbon\CarbonInterval;
use DateTime, DateInterval, DatePeriod;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;

class Shortcut {  

    public function inf_medium_bulan($bln)
	{
		switch ($bln)
		{
			case 1:
				return "Jan";
				break;
			case 2:
				return "Feb";
				break;
			case 3:
				return "Mar";
				break;
			case 4:
				return "Apr";
				break;
			case 5:
				return "Mei";
				break;
			case 6:
				return "Jun";
				break;
			case 7:
				return "Jul";
				break;
			case 8:
				return "Ags";
				break;
			case 9:
				return "Sep";
				break;
			case 10:
				return "Okt";
				break;
			case 11:
				return "Nov";
				break;
			case 12:
				return "Des";
				break;
		}
	}

    public static function medium_bulan($bln) 
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

    public static function daydate_indo($tanggal){
		$ubah = gmdate($tanggal, time()+60*60*8);
		$pecah = explode("-",$ubah);
		$tgl = $pecah[2];
		$bln = $pecah[1];
		$thn = $pecah[0];

		$nama = date("l", mktime(0,0,0,$bln,$tgl,$thn));
		$nama_hari = "";
		if($nama=="Sunday") {$nama_hari="Minggu";}
		else if($nama=="Monday") {$nama_hari="Senin";}
		else if($nama=="Tuesday") {$nama_hari="Selasa";}
		else if($nama=="Wednesday") {$nama_hari="Rabu";}
		else if($nama=="Thursday") {$nama_hari="Kamis";}
		else if($nama=="Friday") {$nama_hari="Jumat";}
		else if($nama=="Saturday") {$nama_hari="Sabtu";}
		return $nama_hari;
	} 

    public function tanggalHarian() 
	{
		date_default_timezone_set("Asia/Jakarta");  
		if(Request::segment(3) AND Request::segment(4)) { 
			$bulan = Request::segment(4);
			$tahun = Request::segment(3);
			$tanggal = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
		} else { 
			$bulan = date('m');
			$tahun = date('Y');
			$tanggal = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
		}
		
		$start = $tahun.'-'.$bulan.'-1';
		$end = $tahun.'-'.$bulan.'-'.$tanggal;
		$loop_date =  Shortcut::loop_date($start,$end);   
		
		$val = array();
		foreach($loop_date as $i) 
		{
			$val[] = $this->tanggal_short($i);
		}
		return json_encode($val);
	}
 
	public static function tanggalLower($tanggal)
    {
        $arr_bln = ["Januari","Februari","Maret", "April", "Mei", "Juni","Juli","Agustus","September","Oktober", "November","Desember"];
        $cek_time = explode(' ',$tanggal);
        if($cek_time[0]){
            $bln = explode('-',$cek_time[0]);
        }else{
            $bln = explode('-',$tanggal);
        }
         return $bln[2].' '.$arr_bln[$bln[1]-1].' '.$bln[0];
        
    } 
	public static function tanggal($tanggal)
    {
        $arr_bln = ["JANUARI","FEBRUARI","MARET", "APRIL", "MEI", "JUNI","JULI","AGUSTUS","SEPTEMBER","OKTOBER", "NOVEMBER","DESEMBER"];
        $cek_time = explode(' ',$tanggal);
        if($cek_time[0]){
            $bln = explode('-',$cek_time[0]);
        }else{
            $bln = explode('-',$tanggal);
        }
         return $bln[2].' '.$arr_bln[$bln[1]-1].' '.$bln[0];
        
    } 
 
	public static function tanggal_short($tanggal)
    {
        $arr_bln = ["JAN","FEB","MAR", "APR", "MEI", "JUN","JUL","AGU","SEP","OKT", "NOV","DES"];
        $cek_time = explode(' ',$tanggal);
        if($cek_time[0]){
            $bln = explode('-',$cek_time[0]);
        }else{
            $bln = explode('-',$tanggal);
        }
         return $bln[2].' '.$arr_bln[$bln[1]-1].' '.$bln[0];
        
    } 
	
	function formatRupiah($angka) 
	{
 
		if(is_numeric($angka)) {
			$format_rupiah = 'Rp ' . number_format($angka, '2', ',', '.');
			return $format_rupiah;
		}
		else {
			echo "$angka" . " bukan angka yang valid!" . "\n";
		}
	}

    public static function loop_date($start, $end)
    {
		date_default_timezone_set("Asia/Jakarta");  
        $begin = new DateTime(strtolower($start));
        $end = new DateTime(strtolower($end));
        $end = $end->modify( '+1 day' ); 

        $interval = new DateInterval('P1D');
        $daterange = new DatePeriod($begin, $interval ,$end);
        foreach($daterange as $rs){
            $new_daterange[] = $rs->format('Y-m-d');
        }
        return $new_daterange;
    }

    public static function loop_month()
    {
		date_default_timezone_set("Asia/Jakarta");   
		$new_month = array();
        for($i = 1; $i <= 12; $i++){
            $new_month[] = $i;
        }
        return $new_month;
    }
    
    public static function random_strings($length_of_string)
	{
	
		// String of all alphanumeric character
		$str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
	
		// Shuffle the $str_result and returns substring
		// of specified length
		return substr(str_shuffle($str_result),
						0, $length_of_string);
	}
	public static function timeago($timestamp)
	{
        date_default_timezone_set("Asia/Jakarta");
		// Set the locale to 'id' for Bahasa Indonesia
		Carbon::setLocale('id');
		// Customize the "time ago" translation to match the desired format
		CarbonInterval::setLocale('id', [
			'year'      => 'tahun',
			'month'     => 'bulan',
			'week'      => 'minggu',
			'day'       => 'hari',
			'hour'      => 'jam',
			'minute'    => 'menit',
			'second'    => 'detik',
			'year_ago'      => ':count tahun yang lalu',
			'month_ago'     => ':count bulan yang lalu',
			'week_ago'      => ':count minggu yang lalu',
			'day_ago'       => ':count hari yang lalu',
			'hour_ago'      => ':count jam yang lalu',
			'minute_ago'    => ':count menit yang lalu',
			'second_ago'    => ':count detik yang lalu',
		]);
		// Create a Carbon instance from the timestamp
		$carbonDate = Carbon::parse($timestamp);
		// Get the "time ago" in Indonesian
		$timeAgo = $carbonDate->diffForHumans();
		return $timeAgo;
	}

	public static function onuse($timestamp)
	{
        date_default_timezone_set("Asia/Jakarta");
		// Set the locale to 'id' for Bahasa Indonesia
		Carbon::setLocale('id');
		// Customize the "time ago" translation to match the desired format
		CarbonInterval::setLocale('id', [
			'year'      => 'tahun',
			'month'     => 'bulan',
			'week'      => 'minggu',
			'day'       => 'hari',
			'hour'      => 'jam',
			'minute'    => 'menit',
			'second'    => 'detik',
			'year_ago'      => ':count tahun',
			'month_ago'     => ':count bulan',
			'week_ago'      => ':count minggu',
			'day_ago'       => ':count hari',
			'hour_ago'      => ':count jam',
			'minute_ago'    => ':count menit',
			'second_ago'    => ':count detik',
		]);
		// Create a Carbon instance from the timestamp
		$carbonDate = Carbon::parse($timestamp);
		// Get the "time ago" in Indonesian
		$timeAgo = $carbonDate->diffForHumans();
		return $timeAgo;
	}
	public static function getToken()
	{
		$body = [  
            'act' => 'GetToken',
            'username' => env('API_USERNAME'),
            'password' => env('API_PASSWORD'),
        ];
        $api_response = Http::withOptions(['verify'=>false])
        ->post(env('API_ENDPOINT'), $body);
        $response=$api_response->getBody()->getContents();
        $get_contents = json_decode($response);
		return $get_contents->data->token;
	}
}