<?php
class curl
{   
	var $cookie_file;  // 设置Cookie文件保存路径及文件名  
	function __construct()  
	{  

	}  
	// 模拟获取内容函数               
	function get($url)
	{      
		$curl = curl_init(); // 启动一个CURL会话      
		curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址                  
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查      
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2); // 从证书中检查SSL加密算法是否存在      
		curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // 模拟用户使用的浏览器      
		if (ini_get('open_basedir') == '' && ini_get('safe_mode' == 'Off')) {
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
		}   
		curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer      
		curl_setopt($curl, CURLOPT_HTTPGET, 1); // 发送一个常规的Post请求      
		curl_setopt($curl, CURLOPT_COOKIEFILE, $this->cookie_file); // 读取上面所储存的Cookie信息      
		curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环      
		curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容      
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回      
		$tmpInfo = curl_exec($curl); // 执行操作      
		if (curl_errno($curl)) {      
		 echo 'Errno'.curl_error($curl);      
		}
		curl_close($curl); // 关闭CURL会话      
		return $tmpInfo; // 返回数据      
	}      
	 // 模拟提交数据函数               
	function post($url,$data)
	{     
		$curl = curl_init(); // 启动一个CURL会话      
		curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址                  
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查      
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2); // 从证书中检查SSL加密算法是否存在      
		curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // 模拟用户使用的浏览器      
		if (ini_get('open_basedir') == '' && ini_get('safe_mode' == 'Off')) {
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
		}    
		curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer      
		curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求      
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data); // Post提交的数据包      
		curl_setopt($curl, CURLOPT_COOKIEFILE, $this->cookie_file); // 读取上面所储存的Cookie信息      
		curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环      
		curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容      
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回      
		$tmpInfo = curl_exec($curl); // 执行操作      
		if (curl_errno($curl)) {      
		 return curl_error($curl);      
		}      
		curl_close($curl); // 关键CURL会话      
		return $tmpInfo; // 返回数据      
	}
	function request($url, $method= 'GET', $post_fields = null, $time_out = 15, $header = null, $cookie = null,$useCert=false)
	{
		if (!function_exists('curl_init'))
		{
			exit('CURL not support');
		}
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
		curl_setopt($curl, CURLOPT_TIMEOUT, $time_out);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($curl, CURLOPT_HEADER, FALSE);
		if (ini_get('open_basedir') == '' && ini_get('safe_mode' == 'Off')) {
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
		}
		if($useCert == true){
			//设置证书
			//使用证书：cert 与 key 分别属于两个.pem文件
			curl_setopt($ch,CURLOPT_SSLCERTTYPE,'PEM');
			curl_setopt($ch,CURLOPT_SSLCERT, SSLCERT_PATH);
			curl_setopt($ch,CURLOPT_SSLKEYTYPE,'PEM');
			curl_setopt($ch,CURLOPT_SSLKEY, SSLKEY_PATH);
		}
		if('POST'==strtoupper($method)){
			curl_setopt($curl, CURLOPT_POST, TRUE);
		} else if('GET'==strtoupper($method)){
			curl_setopt($curl, CURLOPT_HTTPGET, true);
		} else{
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, strtoupper($method));
		}
		if ($post_fields)
		{
			curl_setopt($curl, CURLOPT_POSTFIELDS, $post_fields);
		}
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLINFO_HEADER_OUT, TRUE);
		if (isset($header) AND is_array($header))
		{
			curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
		}

		if (substr($url, 0, 8) == 'https://')
		{
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
			//curl_setopt($curl, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1);
		}

		if ($cookie AND is_array($cookie))
		{
			curl_setopt($curl, CURLOPT_COOKIE, urldecode(http_build_query($cookie, '', '; ')));
		}

		$response = curl_exec($curl);

		curl_close($curl);

		return $response;
	}
}