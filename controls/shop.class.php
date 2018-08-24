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
class shop_controller extends controller
{
	function __construct(){
		$this->models_dir=MODELS_PATH;
		$this->views_dir=VIEWS_PATH;
	}
	function index_action(){
		global $store_id;
		//模板列表
		$json=file_get_contents(API_STORE.'data/template/list.json');
		//当前使用的模板
		$homepage=$this->bidcms_model('shop_homepage')->get_one(array('and shop_id=:sid and is_default=1',array(':sid'=>$store_id)));
		$url=API_STORE.'m.php?shopid='.$store_id;
		
		include $this->bidcms_template('home','views/shop');
	}
	function set_home_action(){
		global $store_id;
		$id=intval($_POST['id']);
		if($id>0 && $store_id){
			$this->bidcms_model('shop_homepage')->update_data(array('and shop_id=:sid',array(':sid'=>$store_id)),array('is_default'=>0));
			$info=$this->bidcms_model('shop_homepage')->get_one(array('and shop_id=:sid and theme_id=:tid',array(':sid'=>$store_id,':tid'=>$id)));
			if(empty($info)){
				$json=file_get_contents(API_STORE.'data/template/list.json');
				$data=json_decode($json,true);
				foreach($data['data']['rows'] as $k=>$v){
					if($v['id']==$id){
						$this->bidcms_model('shop_homepage')->insert_data(array('shop_id'=>$store_id,'theme_id'=>$id,'name'=>$v['name'],'is_default'=>1,'hash'=>get_hash()));
						break;
					}
				}
				
			} else {
				$this->bidcms_model('shop_homepage')->update_data(array('and id=:id',array(':id'=>$info['id'])),array('is_default'=>1));
			}
			
			echo '{"status":1,"msg":""}';
		}
	}
	function edit_home_action(){
		global $token,$store_id;
		if($store_id>0){
			if($this->bidcms_submit_check("commit")){
				$content=$this->bidcms_request('content');
				$theme_id=$this->bidcms_request('theme_id');
				$bak_id=$this->bidcms_request('bak_id');
				$update_id=$this->bidcms_request('update_id');
				$data['content']=htmlspecialchars($content);
				$is_backup=$this->bidcms_request('is_backups');
				$is_preview=$this->bidcms_request('is_preview');
				if($is_backup==1){ //备份
					$data['theme_id']=$theme_id;
					$data['shop_id']=$store_id;
					$data['add_time']=time();
					$c=json_decode($content,true);
					$data['name']=$c['page']['title'];
					$data['id']=$this->bidcms_model('shop_bak')->insert_data($data);
					$data['content']='';
					$result=array('status'=>'1','msg'=>'','info'=>$data);
				} else{
					//检查是否已经有此模板
					$info=$this->bidcms_model('shop_homepage')->get_one(array('and theme_id=:tid and shop_id=:sid',array(':sid'=>$store_id,':tid'=>$theme_id)));
					if(!empty($info)){
						$this->bidcms_model('shop_homepage')->update_data(array('and id=:id',array(':id'=>$info['id'])),$data);
					} else {
						$data['theme_id']=$theme_id;
						$data['shop_id']=$store_id;
						$this->bidcms_model('shop_homepage')->insert_data($data);
					}
					$result=array('status'=>'1','msg'=>'');
					if($is_preview==1){
						$result['link']=API_ROOT.'/tool/qrcode.php?link='.urlencode(SITE_ROOT.'mobile.php?shopid='.$store_id);
					} else {
						$result['link']='index.php?con=shop';
					}
				}
				echo $this->bidcms_json($result);
			} else {
				$tid=$this->bidcms_request('tid','get');
				$homepage_id=$this->bidcms_request('hid','get');
				
				if($homepage_id>0){
					$homepage=$this->bidcms_model('shop_bak')->get_info_primary_id($homepage_id);
					if(!empty($homepage) && $homepage['shop_id']==$store_id){
						$tid=$homepage['theme_id'];
						include $this->bidcms_template('edit_home','views/shop');
					}
				} else{
					if($tid>0){
						$homepage=$this->bidcms_model('shop_homepage')->get_one(array('and shop_id=:sid and theme_id=:tid',array(':sid'=>$store_id,':tid'=>$tid)));
					} else {
						$homepage=$this->bidcms_model('shop_homepage')->get_one(array('and shop_id=:sid and is_default=1',array(':sid'=>$store_id)));
						$tid=$homepage['theme_id'];
					}
					include $this->bidcms_template('edit_home','views/shop');
				}
			}
		}
	}
	function get_preview_list_action(){
		global $token,$store_id;
		$result['status']='-1';
		if($store_id>0){
			$this->bidcms_model('shop_bak')->custom_fields='id,shop_id,theme_id,name,add_time';
			$list=$this->bidcms_model('shop_bak')->get_list_join_id($store_id);
			$result['status']='1';
			$result['msg']='';
			$result['list']=$list;
		}
		echo $this->bidcms_json($result);
	}
	function edit_preview_action(){
		global $store_id;
		$id=$this->bidcms_request('id');
		if($this->bidcms_submit_check('commit')){
			$info=$this->bidcms_model('shop_bak')->get_info_primary_id($id);
			if($info['shop_id']==$store_id){
				$dotype=$this->bidcms_request('dotype');
				if($dotype=='del'){
					$this->bidcms_model('shop_bak')->delete_data(array('and id=:id',array(':id'=>$id)));
				} elseif($dotype=='save_name'){
					$name=$this->bidcms_request('name');
					$this->bidcms_model('shop_bak')->update_data(array('and id=:id',array(':id'=>$id)),array('name'=>$name));
				}
			}
		}
		echo '{"status":"1","msg":""}';
	}
	function setting_action(){
		global $token,$store_id;
		$type=$this->bidcms_request('type','get');
		if($this->bidcms_submit_check('commit')){
			if(!in_array($type,array('userpage','intro','detail','navigation','limit_buy','privilege'))){
				echo '{"status":0,"msg":"参数不是可接受的值"}';
				exit;
			}
			$_POST['shop_id']=$store_id;
			$is_preview=intval($_POST['is_preview']);
			$id=$this->bidcms_model('shop_setting')->save($_POST,$type);
			if($id>0){
				echo '{"status":1,"link":"\/Shop\/user_center.html"}';
				exit;
			} else {
				echo '{"status":0,"msg":""}';
				exit;
			}
		} else {
			echo '{"status":-1,"msg":"当前域名不允许提交数据"}';
			exit;
		}
	}
	function userpage_action(){
		global $token,$store_id;
		if(!empty($token)){
			$mod=$this->bidcms_model('shop_setting');
			$mod->custom_fields='shop_id,userpage';
			$info=$mod->get_info_primary_id($store_id);
			$content=$info['userpage'];
		}
		include $this->bidcms_template('userpage','views/shop');
	}
	function detail_action(){
		global $token,$store_id;
		if(!empty($token)){
			$mod=$this->bidcms_model('shop_setting');
			$mod->custom_field='id,uid,detail';
			$info=$mod->get_info_primary_id($store_id);
			$content=$info['detail'];
		}
		include $this->bidcms_template('detail','views/shop');
	}

	function navigation_action(){
		global $token,$store_id;
		if(!empty($token)){
			$mod=$this->bidcms_model('shop_setting');
			$mod->custom_field='id,uid,navigation';
			$info=$mod->get_info_primary_id($store_id);
			$content=$info['navigation'];
		}
		include $this->bidcms_template('navigation','views/shop');
	}

	function limit_action(){
		global $token,$store_id;

		if($store_id>0){
			$mod=$this->bidcms_model('shop_setting');
			$mod->custom_field='id,uid,limit_buy';
			$info=$mod->get_info_primary_id($store_id);
			$content=$info['limit_buy'];
		}
		include $this->bidcms_template('limit','views/shop');
	}
	function intro_action(){
		global $store_id;

		if($store_id>0){
			$mod=$this->bidcms_model('shop_setting');
			$mod->custom_field='id,uid,intro';
			$info=$mod->get_info_primary_id($store_id);
			$content=$info['intro'];
		}
		include $this->bidcms_template('intro','views/shop');
	}
}
