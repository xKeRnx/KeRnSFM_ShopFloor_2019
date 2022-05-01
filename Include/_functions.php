<?php
if($__TOKEN == "hardcodeshitbykernstudios"){
	$user_agent     =   @$_SERVER['HTTP_USER_AGENT'];
	
	function mssql_escape_string($str){
		return $GLOBALS['conn']->real_escape_string($str);	
	}
	
	function getlang($str){
		$conn = $GLOBALS["conn"];
		$sellang = "lang_".$GLOBALS["lang"];
		$getsetquery =("SELECT ".$sellang." FROM language WHERE name='$str' LIMIT 1");
		$getsetresult = $conn->query($getsetquery); 
		if( $getsetresult->num_rows == 1) {  
			$getsetrow = $getsetresult->fetch_row();
			return $getsetrow['0'];
		}else{
			return "error";
		}
	}
	
	function translate($text, $from, $to)
	{
		$api = 'trnsl.1.1.20200309T205951Z.7767e122084c9d8d.5830cffa15446437f418fcaaad679b59f7faeebf'; // TODO: Get your key from https://tech.yandex.com/translate/
		$url = file_get_contents('https://translate.yandex.net/api/v1.5/tr.json/translate?key=' . $api . '&lang=' . $from . '-' . $to . '&text=' . urlencode($text));
		$json = json_decode($url);
		return $json->text[0];
	}
	
	
	function getutf8($str){
		return $str;
	}
	
	function getset($str){
		$conn = $GLOBALS["conn"];
		$str = $GLOBALS['conn']->real_escape_string($str);
		$getsetquery =("SELECT setting FROM settings WHERE name='$str' LIMIT 1");
		$getsetresult = $conn->query($getsetquery); 
		if( $getsetresult->num_rows == 1) {  
			$getsetrow = $getsetresult->fetch_row();
			return $getsetrow['0'];
		}else{
			return "error";
		}
	}

	
	
	function mssql_message_string($str){
		$search=array("\\","\0","'",'"');
		$replace=array("\\\\","\\0","\'",'\"');
		return str_replace($search,$replace,$str);
	}
	
	function format_interval(DateInterval $interval) {
		$result = "";
		if ($interval->y) { $result .= $interval->format("%y years "); }
		if ($interval->m) { $result .= $interval->format("%m months "); }
		if ($interval->d) { $result .= $interval->format("%d days "); }
		if ($interval->h) { $result .= $interval->format("%h hours "); }
		if ($interval->i) { $result .= $interval->format("%i minutes "); }

		return $result;
	}
		
	function encrypt_decrypt($action, $string, $secret_key) {
		$output = false;
		$encrypt_method = "AES-256-CBC";
		$secret_iv = '1234567812345678';
		// hash
		$key = hash('sha256', $secret_key);
		
		// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
		$iv = substr(hash('sha256', $secret_iv), 0, 16);
		if ( $action == 'encrypt' ) {
			$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
			$output = base64_encode($output);
		} else if( $action == 'decrypt' ) {
			$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
		}
		return $output;
	}
		
	
	function getRemoteIP(){
		if(isset($_SERVER['HTTP_CF_CONNECTING_IP'])){
			$_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_CF_CONNECTING_IP'];
		}
		return $_SERVER['REMOTE_ADDR'];
	}
	
	function generateRandomString($length) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $randomString;
	}
	
	function get_data($url) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}
	
	function minutesToTime($minutes) {
		$d = floor ($minutes / 1440);
		$h = floor (($minutes - $d * 1440) / 60);
		$m = $minutes - ($d * 1440) - ($h * 60);
		//
		// Then you can output it like so...
		//
		return "{$d} days, {$h} hours, {$m} minutes";
	}
	
   function getIP() {
      foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
         if (array_key_exists($key, $_SERVER) === true) {
            foreach (explode(',', $_SERVER[$key]) as $ip) {
               if (filter_var($ip, FILTER_VALIDATE_IP) !== false) {
                  return $ip;
               }
            }
         }
      }
   }
	
	function getBrowser() {

			global $user_agent;

			$browser        =  "Unknown";

			$browser_array  =   array(
									'/trident/i'    =>  'Internet Explorer',
									'/msie/i'       =>  'Internet Explorer',
									'/firefox/i'    =>  'Firefox',
									'/safari/i'     =>  'Safari',
									'/chrome/i'     =>  'Chrome',
									'/edge/i'       =>  'Edge',
									'/opera/i'      =>  'Opera',
									'/netscape/i'   =>  'Netscape',
									'/maxthon/i'    =>  'Maxthon',
									'/konqueror/i'  =>  'Konqueror',
									'/mobile/i'     =>  'Safari',
									'/CriOS/i'     =>  'Chrome'
								);

			foreach ($browser_array as $regex => $value) { 

				if (preg_match($regex, $user_agent)) {
					$browser    =   $value;
				}

			}

			return $browser;

		}

	function getOS() { 

		global $user_agent;

		$os_platform    =   "Unknown OS Platform";

		$os_array       =   array(
								'/windows nt 10/i'     	=>  'Windows 10',
								'/windows nt 6.3/i'     =>  'Windows 8.1',
								'/windows nt 6.2/i'     =>  'Windows 8',
								'/windows nt 6.1/i'     =>  'Windows 7',
								'/windows nt 6.0/i'     =>  'Windows Vista',
								'/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
								'/windows nt 5.1/i'     =>  'Windows XP',
								'/windows xp/i'         =>  'Windows XP',
								'/windows nt 5.0/i'     =>  'Windows 2000',
								'/windows me/i'         =>  'Windows ME',
								'/win98/i'              =>  'Windows 98',
								'/win95/i'              =>  'Windows 95',
								'/win16/i'              =>  'Windows 3.11',
								'/macintosh|mac os x/i' =>  'Mac OS X',
								'/mac_powerpc/i'        =>  'Mac OS 9',
								'/linux/i'              =>  'Linux',
								'/ubuntu/i'             =>  'Ubuntu',
								'/iphone/i'             =>  'iPhone',
								'/ipod/i'               =>  'iPod',
								'/ipad/i'               =>  'iPad',
								'/android/i'            =>  'Android',
								'/blackberry/i'         =>  'BlackBerry',
								'/webos/i'              =>  'Mobile'
							);

		foreach ($os_array as $regex => $value) { 

			if (preg_match($regex, $user_agent)) {
				$os_platform    =   $value;
			}

		}   

		return $os_platform;

	}

}
?>