<?php
//验证码工具类
class captcha{
    //属性
    private $width;
    private $height;
    private $fontsize;
    private $pixes;
    private $lines;
    private $str_len;
    /*
     * 构造方法
     * @param1 array $arr = array()，初始化属性的关联数组
    */
    public function __construct($arr = array()){
      //初始化
      $this->width = $arr['width'];
      $this->height = $arr['height'];
      $this->fontsize = $arr['fontsize'];
      $this->pixes = $arr['pixes'];
      $this->lines = $arr['lines'];
      $this->str_len = $arr['str_len'];
    }
    /*
     * 产生验证码图片
    */
    public function generate($filename){
      //制作画布
      $img = imagecreatetruecolor($this->width,$this->height);
      //给定背景色
      $bg_color = imagecolorallocate($img,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));
      imagefill($img,0,0,$bg_color);
      //制作干扰线
      $this->getLines($img);
      //增加干扰点
      $this->getPixels($img);
      //增加验证码文字
      $captcha = $this->getCaptcha();
      //文字颜色
      $str_color = imagecolorallocate($img,mt_rand(0,100),mt_rand(0,100),mt_rand(0,100));
      //写入文字
      //计算文字应该出现的起始位置
      $start_x = ceil($this->width/2) - 25;
      $start_y = ceil($this->height/2) - 8;
      if(imagestring($img,$this->fontsize,$start_x,$start_y,$captcha,$str_color)){
        //成功：输出验证码
		if(!empty($filename)){
			imagepng($img,$filename);
			return '{"errcode":"0","errmsg":"","data":{"base64":"data:image/png;base64,'.base64_encode(file_get_contents($filename)).'","captcha":"'.substr(md5(date('ymdhi').strtolower($captcha)),$this->str_len,16).'"}}';
		} else {
			imagepng($img);
		}
	  }else{
        //失败
        return false;
      }
    }
    /*
     * 获取验证码随机字符串
     * @return string $captcha，随机验证码文字
    */
    private function getCaptcha(){
      //获取随机字符串
      $str = implode('',array_merge(range('a','z'),range('A','Z'),range(1,9)));
      //随机取
      $captcha = '';  //保存随机字符串
      for($i = 0,$len = strlen($str);$i < $this->str_len;$i++){
        //每次随机取一个字符
        $captcha .= $str[mt_rand(0,$len - 1)] . ' ';
      }
     //返回值
      return str_replace(' ','',$captcha);
    }
    /*
     * 增加干扰点
     * @param1 resource $img
    */
    private function getPixels($img){
      //增加干扰点
      for($i = 0;$i < $this->pixes;$i++){
        //分配颜色
        $pixel_color = imagecolorallocate($img,mt_rand(100,150),mt_rand(100,150),mt_rand(100,150));
        //画点
        imagesetpixel($img,mt_rand(0,$this->width),mt_rand(0,$this->height),$pixel_color);
      }
    }
    /*
     * 增加干扰线
     * @param1 resource $img，要增加干扰线的图片资源
    */
    private function getLines($img){
      //增加干扰线
      for($i = 0;$i < $this->lines;$i++){
        //分配颜色
        $line_color = imagecolorallocate($img,mt_rand(150,200),mt_rand(150,200),mt_rand(150,200));
        //画线
        imageline($img,mt_rand(0,$this->width),mt_rand(0,$this->height),mt_rand(0,$this->width),mt_rand(0,$this->height),$line_color);
      }
    }
}