<?php
/*
	[Phpup.Net!] (C)2009-2011 Phpup.net.
	This is NOT a freeware, use is subject to license terms

	$Id: upload.class.php 2010-08-24 10:42 $
*/
/**
 *图片/文件上传类
 *作者:李孟琦(phpup.net)
 *功能:上传间个文件并提示错误
 *------------------------------------------------------------------------------------------------
$up=new upload('userfile');
$up->updir="/var/www/html/upload";
if($up->checkFile())
{
	if($file=$up->execute())
	{
		echo "insert into thumb (aid,thumb,pic,pictitle,picsize,pictype,uploaddate) values(NULL,'$up->thumb_file','$file','".$up->fname[1]['name']."','".$up->fname[1]['size']."','".$up->fname[1]['type']."',".time().")";
	}
}
<form enctype="multipart/form-data" action="" method="POST">
    Send this file: <input name="userfile" type="file" />
    <input type="submit" value="Send File" />
</form>
 *-------------------------------------------------------------------------------------------------
*/


if(!defined('IN_BIDCMS')) {
	exit('Access Denied');
}
class upload
{
	var $stuffix=array('image/jpg','image/gif','image/png','image/x-png',"image/pjpeg","image/jpeg","audio/mp3","audio/x-m4a","application/x-zip-compressed");
	var $max_upload=2097152000;
	var $updir='./upload';
	var $handle;
	var $width=192;
	var $height=192;
	var $insertid=0;
	var $fname='';
	function __construct($handle='')
	{
		if(empty($handle) || is_array($handle)){
			$h=array_values($_FILES);
			$this->handle=$h[0];
		} else {
			$this->handle=$_FILES[$handle];
		}
		$this->error=array();
	}
	 //分块上块文件API返回数据
	 public function bigFile($filename,$blobNum,$totalBlobNum){
		if(!is_dir($this->updir))
		{
			$this->mkdir2($this->updir);
		}
		$this->newFileName($filename);
		//判断是否是最后一块，如果是则进行文件合成并且删除文件块
		if($this->handle['size']>0){ 
			$blob= file_get_contents($this->handle['tmp_name']);
			return file_put_contents($this->fname,$blob,FILE_APPEND);
		}
		return 0;
	}
	//检查是否有上传的文件
	function checkIsFile()
	{
		if(empty($this->handle['name']))
		{
			$this->error['msg']='没有上传中的文件。';
			$this->error['err']=101;
			return false;
		}
		return true;
	}
	//上传错误信息
	function checkStatus()
	{
		switch($this->handle['error'])
		{
			case 1:
				$error="UPLOAD_ERR_INI_SIZE:上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值。 \n";
			break;
			case 2:
				$error="UPLOAD_ERR_FORM_SIZE:上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值。\n";
			break;
			case 3:
				$error="UPLOAD_ERR_PARTIAL:文件只有部分被上传\n";
			break;
			case 4:
				$error="UPLOAD_ERR_NO_FILE:没有文件被上传。\n";
			break;
			case 6:
				$error="UPLOAD_ERR_NO_TMP_DIR:找不到临时文件夹。\n";
			break;
			case 7:
				$error="UPLOAD_ERR_CANT_WRITE:文件写入失败。\n";
			break;
			default:
				$error="";
			break;
		}
		if(!empty($error))
		{
			$this->error['msg']=$error;
			$this->error['err']=104;
			return false;
		}
		return true;
	}
	
	//检查文件类型
	function checkType()
	{
		if(!in_array($this->handle['type'],$this->stuffix))
		{
			$this->error['msg']="文件类型不被允许";
			$this->error['err']=107;
			return false;
		}
		return true;
	}
	
	//检查文件尺寸
	function checkSize()
	{
		if($this->handle['size']>$this->max_upload)
		{
			$size=($this->max_upload/1024/1024);
			if($size<1)
			{
				$error="文件大小不能超过".ceil($size*1000)."K。 \n";
			}
			else
			{
				$error="文件大小不能超过".$size."M。 \n";
			}
			$this->error['msg']=$error;
			$this->error['err']=109;
			return false;
		}
		return true;
	}
	function is_upload_file($source) {
		return $source && ($source != 'none') && (is_uploaded_file($source) || is_uploaded_file(str_replace('\\\\', '\\', $source)));
	}
	//上传文件
	function execute($newfile='',$short=false)
	{
		if(!is_dir($this->updir))
		{
			$this->mkdir2($this->updir);
		}
		$this->newFileName($newfile);
		$returnFile=$short?str_replace($this->updir,'',$this->fname):$this->fname;
		if($this->is_upload_file($this->handle['tmp_name']))
		{
			if(function_exists('move_uploaded_file') && @move_uploaded_file($this->handle['tmp_name'],$this->fname))
			{
				return $returnFile;
			}
			elseif(@copy($this->handle['tmp_name'],$this->fname))
			{
				return $returnFile;
			}
			elseif(file_put_contents($this->fname,$this->handle['tmp_name']))
			{
				return $returnFile;
			}
			else
			{
				$error.="未上传成功可能原因:\n";
				if(!is_dir($this->updir))
				{
					$error.=$this->updir."目录不存在\n";
				}
				elseif(!is_writeable($this->updir))
				{
					$error.=$this->updir."目录没有写权限\n";
				}
				$this->error['msg']=$error;
				$this->error['err']=100;
				return false;
			}
		}
		return false;
	}
	function mkdir2($dir)
	{
		if(!is_dir(dirname($dir)))
		{
			$this->mkdir2(dirname($dir));
		}
		return mkdir($dir);
	}

	
	//进一步判断文件后缀
	function getFileType($filename)
	{
		$file =fopen($filename, "rb");
		$bin = fread($file, 2); //只读2字节
		fclose($file);
		$strInfo = @unpack("C2chars", $bin);
		$typeCode = intval($strInfo['chars1'].$strInfo['chars2']);
		$fileType = '';
		
		switch ($typeCode)
		{
			case 255216:
				$fileType = 'jpg';
				break;
			case 7173:
				$fileType = 'gif';
				break;
			case 6677:
				$fileType = 'bmp';
				break;
			case 13780:
				$fileType = 'png';
				break;
			case 255251:
				$fileType = 'mp3';
				break;
			case 235:
				$fileType = 'amr';
				break;
			case 7784:
				$fileType = 'midi';
				break;
			case 8297:
				$fileType = 'rar';
				break;
			case 4545:
				$fileType = 'pem';
				break;
			case 48130:
				$fileType = 'p12';
				break;
			case 7368:
				$fileType = 'mp3';
				break;
			case 91123:
				$xmlstr=file_get_contents($filename);
				$movies = json_decode($xmlstr);
				$fileType = is_array($movies)?'json':'unknown';
				break;
			default:
				$fileType = 'unknown';
			break;
		}
		return $fileType;
	}
	//新建文件名(重复的概率很小)
	function newFileName($filename='')
	{
		if($filename=='')
		{
			$fname=md5($this->handle['tmp_name'].$this->handle['size'].$this->handle['name']);
		}
		else
		{
			$fname=$filename;
		}
		$s=explode('.',$this->handle['name']);
		$this->fname=$this->updir.'/'.$fname.(isset($s[1])?'.'.$s[1]:'#');
	}
	//缩略图
	function setThumb($file,$thumb,$width=0,$height=0)
	{
		$type=getimagesize($file);
		switch($type['mime'])
		{
			case 'image/jpeg':
				$func="imagecreatefromjpeg";
				$func2="imagejpeg";
			break;
			case 'image/gif':
				$func="imagecreatefromgif";
				$func2="imagegif";
			break;
			case 'image/png':
				$func="imagecreatefrompng";
				$func2="imagepng";
			break;
			default:
				$func="imagecreatefromjpeg";
				$func2="imagejpeg";
			break;
		}
		if($width>0)
		{
			if($type[0]>$width)
			{
				$w=$width;
				$h=ceil(($width/$type[0])*$type[1]);
			}
			else
			{
				$w=$type[0];
				$h=$type[1];
			}
		}
		elseif($height>0)
		{
			
			if($type[1]>$height)
			{
				$h=$height;
				$w=ceil(($height/$type[1])*$type[0]);
			}
			else
			{
				$w=$type[0];
				$h=$type[1];
			}
		}
		if($w>0 && $h>0)
		{
			$dst=imagecreatetruecolor($w,$h);
			$source=$func($file);
			imagecopyresized($dst,$source,0,0,0,0,$w,$h,$type[0],$type[1]);
			$func2($dst,$thumb);
		}
	}
}