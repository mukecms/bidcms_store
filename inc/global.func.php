<?php
/*
	[bidcms.com!] (C)2009-2011 bidcms.com.
	This is NOT a freeware, use is subject to license terms

	$Id: global.func.php 2010-08-24 10:42 $
*/

if(!defined('IN_BIDCMS')) {
	exit('Access Denied');
}
function global_addslashes($value)
{
	$value=trim($value);
	if (get_magic_quotes_gpc())
	{
		return $value;
	}
	else
	{
		return addslashes($value);
	}
}
function getUnicode($word)
{
	//获取其字符的内部数组表示，所以本文件应用utf-8编码！
	if (is_array( $word))
	$arr = $word;
	else
	$arr = str_split($word);
	//此时，$arr应类似array(228, 189, 160)
	//定义一个空字符串存储
	$bin_str = '';
	//转成数字再转成二进制字符串，最后联合起来。
	foreach ($arr as $value)
	$bin_str .= decbin(ord($value));
	//此时，$bin_str应类似111001001011110110100000,如果是汉字"你"
	//正则截取
	$bin_str = preg_replace('/^.{4}(.{4}).{2}(.{6}).{2}(.{6})$/','$1$2$3', $bin_str);
	// 此时， $bin_str应类似0100111101100000,如果是汉字"你"
	return bindec($bin_str); //返回类似20320， 汉字"你"
	//return dechex(bindec($bin_str)); //如想返回十六进制4f60，用这句
}
/**
 * get user real ip
 *
 * @return  string
 */
function real_ip()
{
    static $realip = NULL;

    if ($realip !== NULL)
    {
        return $realip;
    }

    if (isset($_SERVER))
    {
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        {
            $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);

            foreach ($arr AS $ip)
            {
                $ip = trim($ip);

                if ($ip != 'unknown')
                {
                    $realip = $ip;

                    break;
                }
            }
        }
        elseif (isset($_SERVER['HTTP_CLIENT_IP']))
        {
            $realip = $_SERVER['HTTP_CLIENT_IP'];
        }
        else
        {
            if (isset($_SERVER['REMOTE_ADDR']))
            {
                $realip = $_SERVER['REMOTE_ADDR'];
            }
            else
            {
                $realip = '0.0.0.0';
            }
        }
    }
    else
    {
        if (getenv('HTTP_X_FORWARDED_FOR'))
        {
            $realip = getenv('HTTP_X_FORWARDED_FOR');
        }
        elseif (getenv('HTTP_CLIENT_IP'))
        {
            $realip = getenv('HTTP_CLIENT_IP');
        }
        else
        {
            $realip = getenv('REMOTE_ADDR');
        }
    }

    preg_match("/[\d\.]{7,15}/", $realip, $onlineip);
    $realip = !empty($onlineip[0]) ? $onlineip[0] : '0.0.0.0';

    return $realip;
}
//get real address
function ip2city($ip='', $ipdatafile='') 
{
	include ROOT_PATH.'/inc/curl.class.php';
	$curl=new curl();
	$ip=empty($ip)?real_ip():$ip;
	$api='http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=text&ip='.$ip;
	$result=$curl->get($api);
	
	$arr=explode("\t",$result);
	
	if(isset($arr[5]))
	{
		$city=charset_encode($arr[5],$GLOBALS['charset'],'gbk');
		
		if(empty($city))
		{
			$city=!empty($_REQUEST['city'])?$_REQUEST['city']:'全国';
		}
	}
	else
	{
		$city='全国';
	}
	return $city;

}


//截取字符串
function sysSubStr($sourcestr,$cutlength)
{
	if(!$cutlength)
	{
		return $sourcestr;
	}
	$returnstr="";
	$i=0;
	$n=0;
	$str_length=strlen($sourcestr);    //字符串的字节数
	while (($n<$cutlength) and ($i<=$str_length))
	{
	$temp_str=substr($sourcestr,$i,1);
	$ascnum=Ord($temp_str); //得到字符串中第$i位字符的ascii码
	if ($ascnum>=224) //如果ASCII位高与224，
	{
	$returnstr=$returnstr.substr($sourcestr,$i,3); //根据UTF-8编码规范，将3个连续的字符计为单个字符
	$i=$i+3; //实际Byte计为3
	$n++; //字串长度计1
	}
	elseif ($ascnum>=192)//如果ASCII位高与192，
	{
	$returnstr=$returnstr.substr($sourcestr,$i,2); //根据UTF-8编码规范，将2个连续的字符计为单个字符
	$i=$i+2; //实际Byte计为2
	$n++; //字串长度计1
	}
	elseif ($ascnum>=65 && $ascnum<=90) //如果是大写字母，
	{
	$returnstr=$returnstr.substr($sourcestr,$i,1);
	$i=$i+1; //实际的Byte数仍计1个
	$n++; //但考虑整体美观，大写字母计成一个高位字符
	}
	else //其他情况下，包括小写字母和半角标点符号，
	{
	$returnstr=$returnstr.substr($sourcestr,$i,1);
	$i=$i+1;    //实际的Byte数计1个
	$n=$n+0.5;    //小写字母和半角标点等与半个高位字符宽…
	}
	}

	if ($str_length>$cutlength)
	{
	$returnstr = $returnstr . "";    //超过长度时在尾处加上省略号
	}

	return $returnstr;
}


//表前缀
function tname($table,$index=0)
{
	global $db_config;
	return '`'.$db_config[$index]['name'].'`.`'.$db_config[$index]['table_prefix'].$table.'`';
}
//md5加密
function md52($str,$len=20)
{
	$str=substr(md5($str),3,$len);
	return $str;
}


//读取文件内容
function readf($file)
{
	if(function_exists('file_get_contents'))
	{
		$content=file_get_contents($file);
	}
	else
	{
		$fp=fopen($file,'r');
		while(!feof($fp))
		{
			$content=fgets($fp,1024);
		}
		fclose($fp);
	}
	return $content;
}

//错误
function messageError($message)
{
	exit($message);
}

//保存图片
function savethumb($filename,$url)
{
	if(!empty($url))
	{
		
		$image=imagecreatefromjpeg($url);
		$size = getimagesize($url);
		$image_p = imagecreatetruecolor($size[0], $size[1]);
		imagecopyresampled($image_p, $image, 0, 0, 0, 0, $size[0],$size[1], $size[0], $size[1]);
		mkdir2(dirname($filename));
		imagepng($image_p,$filename);
	}
}
//写文件
function writefile($file,$content)
{
	if(function_exists('file_put_contents'))
	{
		return file_put_contents($file,$content);
	}
	else
	{
		$fp=fopen($file,'w');
		return fwrite($fp,$content);
		fclose($fp);
	}
}
//删除文件
function deletef($file)
{
	$cachedir='data/cache';
	$file=ROOT_PATH.'/'.$cachedir.'/'.$file.'.php';
	if(is_file($file))
	{
		unlink($file);
	}
}
//扫描目录

function bidcms_scandir($dir)
{
	$dirs=array();
	$path=array();
	if(!function_exists('scandir'))
	{
		if ($handle = opendir($dir)) {
			while (false !== ($file = readdir($handle))) {
				$dirs[]=$file;
			}
			closedir($handle);
		}
	}
	else
	{
		$dirs=scandir($dir);
	}
	foreach($dirs as $file){
		if($file!='.' && $file!='..'){
			$path[]=$file;
		}
	}
	unset($dirs);
	return $path;
}

function is_email($email)
{
	if(!empty($email))
	{
		return preg_match('/^[a-z0-9_\-]+(\.[_a-z0-9\-]+)*@([_a-z0-9\-]+\.)+([a-z]{2}|aero|arpa|biz|com|coop|edu|gov|info|int|jobs|mil|museum|name|nato|net|org|pro|travel)$/',$email);
	}
	return false;
}
//清除js和style
function clearJs($str)
{
	$str=str_replace('<style','<div class="limengqitemp" style="display:none"',$str);
	$str=str_replace('</style>','</div>',$str);
	$str=str_replace('<script','<div class="limengqitemp" style="display:none"',$str);
	$str=str_replace('</script>','</div>',$str);
	$str=str_replace("\n",'',$str);
	$str=str_replace("\r",'',$str);
	return $str;
}

//实现多种字符编码方式
function charset_encode($input,$_output_charset='utf-8' ,$_input_charset ="gbk" ) {
	$output = $input;
	if(!isset($_output_charset) )$_output_charset  = $GLOBALS['charset'];
	if($_input_charset == $_output_charset || $input ==null ) {
		$output = $input;
	} elseif (function_exists("mb_convert_encoding")){
		$output = mb_convert_encoding($input,$_output_charset,$_input_charset);
	} elseif(function_exists("iconv")) {
		$output = iconv($_input_charset,$_output_charset,$input);
	}
	return $output;
}


//按指定字数分组
function chunksplit($data)
{
	return chunk_split(base64_encode($data),20);
}

//从内容中分出图片
function getUploadPic($content,$url='')
{
	$content=str_replace('\'','',$content);
	$content=str_replace('>',' width="">',$content);
	$pattern=preg_match_all('/<img.*src\s*=\s*[\"|\']?\s*([^>\"\'\s]*)/i' ,$content,$match);
	$pic=array();
	$nv='';
	if($match[1])
	{
		if(!empty($url))
		{
			$urls=parse_url($url);
		}
		foreach($match[1] as $v)
		{
			if(!empty($v))
			{
				
				if(strpos($v,'ttp://'))
				{
					$nv=$v;
				}
				else
				{
					$nv=$urls['scheme'].'://'.$urls['host'].'/'.$v;
				}
				$pic[md5($nv)]=$nv;
				
			}
		}
		return array_values($pic);
		
	}
	return $pic;
}
//建立目录
function mkdir2($dir)
{
	if(!is_dir(dirname($dir)))
	{
		mkdir2(dirname($dir));
	}
	return mkdir($dir);
}

/*取出封面缩略图*/
function thumb($thumb,$small=false)
{
	$img=array('jpg','jpeg','gif','png');
	if($thumb)
	{
		$t=explode(',',$thumb);
		foreach($t as $k=>$v)
		{
			$c=explode('.',$v);
			if(is_file($v) && in_array($c[1],$img))
			{
				if($small)
				{
					$v=str_replace('.','_s.',$v);
				}
				$t[$k]=str_replace(SITE_ROOT,'',$v);
			}
			else
			{
				$t[$k]='data/nopicture.gif';
			}
		}
		return $t;
	}
	else
	{
		return array('data/nopicture.gif');
	}
}
/*生成url*/
function url($cus_url)
{
	global $setting;
	$url=SITE_ROOT.'index.php';
	if(isset($cus_url[0]) && !empty($cus_url[0])){
		$url.='?con='.$cus_url[0];
	} else {
		$url.='?con=index';
	}
	if(isset($cus_url[1]) && !empty($cus_url[1])){
		$url.='&act='.$cus_url[1];
	}
	return $url;
}

function formhash()
{
	return substr(md5(microtime()),rand(1,10),5);
}
//页面转向
function sheader($url='',$time=0,$message='')
{	
	include ROOT_PATH.'inc/redirect.php';
	exit;
}


//打印格式化的数组
function print_rr($data)
{
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}

function parseIP($ip)
{
	$ip=explode('.',$ip);
	foreach($ip as $k=>$v)
	{
		if($k>1)
		{
			$ip[$k]='*';
		}
	}
	return implode('.',$ip);
}
function parseMobile($mobile)
{
	if($mobile)
	{
		$mobile1=substr($mobile,0,3);
		$mobile2=substr($mobile,7);
	}
	return $mobile1.'****'.$mobile2;
}

function parseDate($datetime)
{
	$diff=time()-$datetime;
	$days=floor($diff/86400);
	$str='';
	if($days>0)
	{
		$str=$days.'天前';
	}
	else
	{
		$hour=floor(($diff-$days*86400)/3600);
		if($hour>0)
		{
			$str=$hour.'小时前';
		}
		else
		{
			$minute=floor(($diff-$days*86400-$hour*3600)/60);
			if($minute>0)
			{
				$str=$minute.'分钟前';
			}
			else
			{
				$second=$diff-$days*86400-$hour*3600-$minute*60;
				$str=$second>10?$second.'秒前':'刚刚';
			}
		}
	}
	return $str;
}


//多维数组转化成一维数组
function array_multi2single($array){
 static $result_array=array();
 foreach($array as $value){
  if(is_array($value)){
   array_multi2single($value);
  }else{
  $result_array[]=$value;
  }
 }
 return $result_array;
}

function bidcms_encode($var,$is_zh=false)
{
	if(! function_exists('json_encode'))
	{
		include ROOT_PATH.'/inc/json.class.php';
		$json=new Services_JSON();
		return $json->encode($var);
	}
	else
	{
		if($is_zh){
			if (version_compare(PHP_VERSION, '5.4.0') >= 0) {
				return json_encode($var, JSON_UNESCAPED_UNICODE);
			} else {
				$str = json_encode($var);
				$str = preg_replace_callback (
					"#\\\u([0-9a-f]{4})#i", 
					function($matchs) {
						return iconv('UCS-2BE', 'UTF-8',  pack('H4',  $matchs[1])); 
					},
					$str
				);
				return $str;
			}
		}
		return json_encode($var);
	}
}
function bidcms_decode($data,$is_array=true)
{
	if(! function_exists('json_decode'))
	{
		include ROOT_PATH.'/inc/json.class.php';
		$json=new Services_JSON();
		return $json->decode($data);
	}
	else
	{
		return json_decode($data,$is_array);
	}
}
function getUnicodeFromOneUTF8($word) {  
	$title=charset_encode($word,'GBK','UTF-8');
	$arr=str_split($title);
	$sum=0;
	foreach($arr as $k=>$v)
	{
		$sum+=ord($v);
	}
	return $sum;
}


function ftpMkdir($dir,&$ftp){
	$list=$ftp->filelist(dirname($dir));
	if(count($list)==0){
		ftpMkdir(dirname($dir),$ftp);
	}
	$ftp->mkdir($dir);
}


function lang($str,$dir='common',$lang='zh'){
	include ROOT_PATH.'/data/language/'.$lang.'/'.$dir.'.php';
	return $lang[$str];
}
/*
function authcode($string, $operation = 'DECODE', $key = '', $expiry = 0) {
    $ckey_length = 4; // 随机密钥长度 取值 0-32;
    // 加入随机密钥，可以令密文无任何规律，即便是原文和密钥完全相同，加密结果也会每次不同，增大破解难度。
    // 取值越大，密文变动规律越大，密文变化 = 16 的 $ckey_length 次方
    // 当此值为 0 时，则不产生随机密钥
    $key = md5($key ? $key : $GLOBALS['bidcms_scret']);
    $keya = md5(substr($key, 0, 16));
    $keyb = md5(substr($key, 16, 16));
    $keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length) : substr(md5(microtime()) , -$ckey_length)) : '';
    $cryptkey = $keya . md5($keya . $keyc);
    $key_length = strlen($cryptkey);
    $string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0) . substr(md5($string . $keyb) , 0, 16) . $string;
    $string_length = strlen($string);
    $result = '';
    $box = range(0, 255);
    $rndkey = array();
    for ($i = 0; $i <= 255; $i++) {
        $rndkey[$i] = ord($cryptkey[$i % $key_length]);
    }
    for ($j = $i = 0; $i < 256; $i++) {
        $j = ($j + $box[$i] + $rndkey[$i]) % 256;
        $tmp = $box[$i];
        $box[$i] = $box[$j];
        $box[$j] = $tmp;
    }
    for ($a = $j = $i = 0; $i < $string_length; $i++) {
        $a = ($a + 1) % 256;
        $j = ($j + $box[$a]) % 256;
        $tmp = $box[$a];
        $box[$a] = $box[$j];
        $box[$j] = $tmp;
        $result.= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
    }
    if ($operation == 'DECODE') {
        if ((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26) . $keyb) , 0, 16)) {
            return substr($result, 26);
        } else {
            return '';
        }
    } else {
        return $keyc . str_replace('=', '', base64_encode($result));
    }
}
function authcode($string,$operation='DECODE',$key=''){ 
    $key = md5($key ? $key : $GLOBALS['bidcms_scret']);
    $key_length=strlen($key);
    $string=$operation=='DECODE'?base64_decode($string):substr(md5($string.$key),0,8).$string; 
    $string_length=strlen($string); 
    $rndkey=$box=array(); 
    $result='';
    for($i=0;$i<=255;$i++){ 
           $rndkey[$i]=ord($key[$i%$key_length]); 
        $box[$i]=$i; 
    }
    for($j=$i=0;$i<256;$i++){ 
        $j=($j+$box[$i]+$rndkey[$i])%256; 
        $tmp=$box[$i]; 
        $box[$i]=$box[$j]; 
        $box[$j]=$tmp; 
    }
    for($a=$j=$i=0;$i<$string_length;$i++){ 
        $a=($a+1)%256; 
        $j=($j+$box[$a])%256; 
        $tmp=$box[$a]; 
        $box[$a]=$box[$j]; 
        $box[$j]=$tmp; 
        $result.=chr(ord($string[$i])^($box[($box[$a]+$box[$j])%256])); 
    }
    if($operation=='DECODE'){ 
        if(substr($result,0,8)==substr(md5(substr($result,8).$key),0,8)){ 
            return substr($result,8); 
        }else{ 
            return''; 
        } 
    }else{ 
        return str_replace('=','',base64_encode($result)); 
    } 
}
*/
function generateTree($items){
    $tree = array();
    foreach($items as $item){
        if(isset($items[$item['parent']])){
            $items[$item['parent']]['child'][] = &$items[$item['id']];
        }else{
            $tree[] = &$items[$item['id']];
        }
    }
    return $tree;
}
//扫描目录
function bidcmsscandir($dir)
{
	$dirs=array();
	if(!function_exists('scandir'))
	{
		if ($handle = opendir($dir)) {
			while (false !== ($file = readdir($handle))) {
				$dirs[]=$file;
			}
			closedir($handle);
		}
	}
	else
	{
		$dirs=scandir($dir);
	}
	return $dirs;
}
function get_hash(){
	return strtoupper(substr(authcode(microtime(),'ENCODE',time().rand(1000000,9999999)),0,10));
}
function authcode($string,$operation='DECODE',$skey=''){
	$skey = md5($skey ? $skey : $GLOBALS['bidcms_scret']);
	if($operation=='DECODE'){
		$strArr = str_split(str_replace(array('O0O0O', 'o000o', 'oo00o'), array('=', '+', '/'), $string), 2);
	    $strCount = count($strArr);
	    foreach (str_split($skey) as $key => $value)
	        $key <= $strCount  && isset($strArr[$key]) && $strArr[$key][1] === $value && $strArr[$key] = $strArr[$key][0];
	    return base64_decode(join('', $strArr));
	} else {
		$strArr = str_split(base64_encode($string));
	    $strCount = count($strArr);
	    foreach (str_split($skey) as $key => $value)
	        $key < $strCount && $strArr[$key].=$value;
	    return str_replace(array('=', '+', '/'), array('O0O0O', 'o000o', 'oo00o'), join('', $strArr));
	}
}