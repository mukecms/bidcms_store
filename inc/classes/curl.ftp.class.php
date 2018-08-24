<?php

/*
 * To change this template, choose Tools | Templates
 * ftp curl方法操作类
 */
class ftp{
    //FTP服务器地址
    public static $host = "114.215.139.175";
    //FTP端口
    public static $port = "21";
    //上传的FTP目录
    public static $uploaddir = "";
    //读取的FTP目录
    public static $readdir = "";
    //FTP用户名
    public static $usrname = "mukecms";
    //FTP密码
    public static $pwd = "limengqi";
    /*
     * curl 方法将文件上传到FTP服务器
     * $filename上传到FTP的文件名，$uploadfile具体需要上传文件的地址（我用的绝对路径）
     */
    public static function ftp_upload($filename,$uploadfile)
    {
        $url = "ftp://".self::$host.":".self::$port."/".self::$uploaddir."/".$filename;
        //需要上传的文件
        $fp = fopen ($uploadfile, "r"); 
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_VERBOSE, 1);  //有意外发生则报道 
        curl_setopt($ch, CURLOPT_USERPWD, self::$usrname.':'.self::$pwd); //FTP登陆账号密码，模拟登陆 
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_PUT, 1); //用HTTP上传一个文件 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //不输出 
        curl_setopt($ch, CURLOPT_INFILE, $fp); //要上传的文件 
        $http_result = curl_exec($ch); //执行 
        $error = curl_error($ch); 
        curl_close($ch); 
        fclose($fp);
        //成功上传文件 返回true
        if (!$error) 
        { 
            return true;
        }
     }
    /*
     * curl 方法将读取FTP文件并保存在本地使用
     * $filenameFTP服务器文件名，$filepath 保存到本地（服务器）的目录
     */    
    public static function ftp_read($filename,$filepath)
    {       
        $curl = curl_init(); 
        
        $target_ftp_file = "ftp://".self::$host.":".self::$port."/".self::$readdir."/".$filename;//完整路径
        curl_setopt($curl, CURLOPT_URL,$target_ftp_file);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_VERBOSE, 1);
        curl_setopt($curl, CURLOPT_FTP_USE_EPSV, 0);
        curl_setopt($curl, CURLOPT_TIMEOUT, 300); // times out after 300s
        curl_setopt($curl, CURLOPT_USERPWD,self::$usrname.':'.self::$pwd);//FTP用户名：密码
        // Sets up the output file
        //本地保存目录
        if(is_dir($filepath)){
         $outfile = fopen($filepath.$filename, 'w');//保存到本地的文件名
         curl_setopt($curl,CURLOPT_FILE,$outfile);
         // Executes the cURL 
         $info = curl_exec($curl);
         fclose($outfile);
         $error_no = curl_errno($curl);
         curl_close($curl);
         //成功读取文件，返回 true
         if($info){
             return true;
         }
        }        
     }
}
?>
