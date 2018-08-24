<?php
/*
	[Bidcms.com!] (C)2009-2011 Bidcms.com.
	This is NOT a freeware, use is subject to license terms
	$author limengqi
	$Id: showcase.class.php 2010-08-24 10:42 $
*/
if(!defined('IN_BIDCMS')) {
	exit('Access Denied');
}
header("content-type:text/html;charset=utf-8");
class special_controller extends controller
{
	function __construct(){
		$this->models_dir=MODELS_PATH;
		$this->views_dir=VIEWS_PATH.'/special';
	}
	function index_action(){
		global $store_id;
		if($store_id>0){
			$url='index.php?con=special';
			$showpage=array('isshow'=>1,'current_page'=>intval($_GET['page']),'page_size'=>20,'url'=>$url);
			$container=array('and shop_id=:sid',array(':sid'=>$store_id));
			$list=$this->bidcms_model('special_base')->get_page($container,$showpage);
			include $this->bidcms_template('home');
		}
	}
	function del_action(){
		if($customer_id>0){
			$_POST['uid']=$customer['id'];
			$id=$this->bidcms_model('special_base')->del($_POST);
			if($id>0){
				echo '{"status":1,"data":[]}';
				exit;
			}
		}
	}
	function cate_action(){
		global $store_id;
		$url='index.php?con=special&act=cate';
		$page=$this->bidcms_request('page','get');
		$showpage=array('isshow'=>1,'current_page'=>intval($page),'page_size'=>20,'url'=>$url);
		$container=array('and shop_id=:sid',array(':sid'=>$store_id));
		$list=$this->bidcms_model('special_cate')->get_page($container,$showpage);

		include $this->bidcms_template('cate');
	}
	function del_cate_action(){
		global $store_id;
		$id=$this->bidcms_model('special_cate')->del($_POST);
		if($id>0){
			echo '{"status":1,"data":[]}';
			exit;
		}
	}
	function edit_cate_action(){
		global $store_id;
		if($this->bidcms_submit_check('commit')){
			$_POST['shop_id']=$store_id;
			$this->bidcms_model('special_cate')->save($_POST);
			echo '{"status":1,"data":[]}';
			exit;
		} else {
			$id=intval($_GET['id']);
			$info=array();
			if($id>0){
				$info=$this->bidcms_model('special_cate')->get_info_primary_id($id);
			}
			include $this->bidcms_template('edit_cate');
		}

	}
	function edit_action(){
		global $store_id;
		if($this->bidcms_submit_check('commit')){
			$_POST['shop_id']=$store_id;
			$id=$this->bidcms_model('special_base')->save($_POST);
			if($id>0){
				echo '{"status":1,"data":[]}';
				exit;
			}
		} else {
			$id=intval($_GET['id']);
			$info=array();
			if($id>0){
				$info=$this->bidcms_model('special_base')->get_info_primary_id($id);
			} else {
				$info=array('content'=>'{&quot;page&quot;:{&quot;title&quot;:&quot;\u4e13\u9898\u9875\u9762&quot;,&quot;view_pic&quot;:&quot;\/statics\/images\/diy\/waitupload.png&quot;,&quot;praise_num&quot;:&quot;0&quot;,&quot;hasMargin&quot;:&quot;1&quot;,&quot;backgroundColor&quot;:&quot;#f8f8f8&quot;,&quot;category&quot;:[],&quot;excerpt&quot;:&quot;&quot;,&quot;isOpenSpread&quot;:&quot;0&quot;},&quot;PModules&quot;:[],&quot;LModules&quot;:[]}','title'=>'专题页面','view_pic'=>'/statics/images/diy/waitupload.png','praise_num'=>0);
			}
			include $this->bidcms_template('edit');
		}

	}
}
