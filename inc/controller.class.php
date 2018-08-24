<?php
/*
	[Phpup.Net!] (C)2009-2011 Phpup.net.
	This is NOT a freeware, use is subject to license terms

	$Id: session.class.php 2010-08-24 10:42 $
*/
if(!defined('IN_BIDCMS')) {
	exit('Access Denied');
}
class controller
{
	private static $models = array();
	public $models_dir='models';
	public $views_dir='views';
	public function bidcms_model($model_name,$models_dir=''){
		$models_dir=!empty($models_dir)?$models_dir:$this->models_dir;
		$model_key=str_replace('/','_',$models_dir).'_'.$model_name;
		if (!isset(self::$models[$model_key])){
			$file=$models_dir.'/'.str_replace('_','/',$model_name).'.php';
			if(is_file($file)) {
				include_once($file);
				$class_name=$model_name.'_class';
				if(!class_exists($class_name)){
					die('Model class_'.$model_name.' Is Lost');
				}
				self::$models[$model_key] = new $class_name();
			} else {
				die('Model class_'.$model_name.' Is Lost');
			}
		}

		return self::$models[$model_key];
	}
	public function bidcms_template($file,$tpldir = '',$stuffix='php') {
		$tpl_dir = !empty($tpldir)?$tpldir:$this->views_dir;
		$tplfile = $tpl_dir.'/'.$file.'.'.$stuffix;
		if(!file_exists($tplfile)) {
			exit($file.'文件不存在');
		}
		return $tplfile;
	}
	public function bidcms_request($data,$type='post',$r=false) {
		global $cookie;
		if($type=='post'){
			if($r){
				return $_POST;
			} else {
				return isset($_POST[$data])?$_POST[$data]:null;
			}
		} elseif($type=='input'){
			$d=file_get_contents('php://input');
			$res=json_decode($d,true);
			if($r){
				return $res;
			} else {
				return isset($res[$data])?$res[$data]:null;
			}
		} elseif($type=='get'){
			if($r){
				return $_GET;
			} else {
				return isset($_GET[$data])?$_GET[$data]:null;
			}
		} elseif($type=='cookie'){
			return $cookie->get($data);
		} elseif($type=='session'){
			if($r){
				return $_SESSION;
			} else {
				return isset($_SESSION[$data])?$_SESSION[$data]:null;
			}
		}
	}
	public function bidcms_json($data,$jsonp=false,$callback='') {
		header("content-type:application/json");
		if($jsonp){
			return $callback.'('.json_encode($data).');';
		} else{
			return json_encode($data);
		}
	}
	public function bidcms_add_css($file){
		$GLOBALS['css_list'][]=$file;
	}
	public function bidcms_script($data,$function='iframe',$parent=true) {
		$str='<script type="text/javascript">';
		$data=json_encode($data);
		if($parent){
			$str.='parent.'.$function.'('.$data.')';
		} else {
			$str.=$function.'('.$data.')';
		}
		$str.='</script>';
		return $str;
	}
	
	//判断表单提交
	public function bidcms_submit_check($submitbutton)
	{
		if(empty($_REQUEST[$submitbutton]))
		{
			return false;
		}
		else
		{
			$host=preg_replace("/https?:\/\/([^\:\/]+).*/i", "\\1", $_SERVER['HTTP_REFERER']);
			if(($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_SERVER['HTTP_X_FLASH_VERSION']) && in_array($host,array('store.bidcms.com')))) {
				return true;
			}
			return false;
		}
	}
	//解析页码
	public function bidcms_parse_page($count,$showpage,$example=1)
	{
		include_once 'classes/page.class.php';
		$page=new page($count);
		$page->pageSize=$showpage['page_size'];
		$page->setPage();
		$page->absolutePage=$showpage['current_page'];
		$page->pageShowButton=10;
		$page->url=$showpage['url'];
		$page->pageinfo=$page->setFormatPage();
		if($example==1)
		{
			$pageinfo='';
			if($page->prevPage==0)
			{
				$pageinfo.="<a class='disabled'>上一页</a>";
			}
			else
			{

				$pageinfo.="<A class='prev' data-page='".$page->prevPage."' HREF='".$page->parseurl($page->prevPage)."'>上一页</A>";
			}
			$button=$page->setFormatPage();
			foreach($button as $key=>$v)
			{
				if($v==$page->absolutePage+1)
				{
					$pageinfo.="<a href='javascript:;' class='cur'>".$v."</a>";
				}
				else
				{
					$pageinfo.="<a href='".$page->parseurl($v-1)."' data-page='".($v-1)."' class='not'>".$v."</a>";
				}
			}
			if($page->nextPage<$page->total)
			{
				$pageinfo.="<A class='next' data-page='".$page->nextPage."' HREF='".$page->parseurl($page->nextPage)."'>下一页<b></b></A>";
			}
			else
			{
				$pageinfo.="<a class='disabled'>下一页</a>";
			}
			//$pageinfo.='</ul>';
		}
		return $pageinfo;
	}
	public function ajax_json_output($array)
	{
		return str_replace(array("\r", "\n", "\t"), '', json_encode($array));
	}
}
