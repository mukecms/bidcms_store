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
class system_controller extends controller
{
	function __construct(){
		$this->models_dir=MODELS_PATH;
		$this->views_dir=VIEWS_PATH;
	}
	function index_action(){
		global $store_id;
		$mod=$this->bidcms_model('system_shop');
		if($this->bidcms_submit_check('commit')){
			$_POST['shop_id']=$store_id;
			$status=$mod->save($_POST);
			if($status>0){
				echo '{"status":1,"msg":"success"}';
			} else {
				echo '{"status":0,"msg":"未改变任何数据"}';
			}
		} else {
			$shopinfo=array();
			if($store_id>0){
				$rows=$mod->get_page(array('and shop_id=:sid',array(':sid'=>$store_id)));
			}
			foreach($rows as $v){
				$shopinfo[$v['name']]=$v['value'];
			}
			include $this->bidcms_template('shop','views/system');
		}
	}
	function setting_action(){
		global $store_id;
		$mod=$this->bidcms_model('system_setting');
		if($this->bidcms_submit_check('commit')){
			$_POST['shop_id']=$store_id;
			$status=$mod->save($_POST);
			if($status>0){
				echo '{"status":1}';
			} else {
				echo '{"status":0,"msg":"未改变任何数据"}';
			}
		} else {
			$shopinfo=array();
			if($store_id>0){
				$rows=$mod->get_page(array('and shop_id=:sid',array(':sid'=>$store_id)));
			}
			foreach($rows as $v){
				$shopinfo[$v['name']]=$v['value'];
			}
			include $this->bidcms_template('setting','views/system');
		}
	}
	function pay_action(){
		global $store_id;
		$mod=$this->bidcms_model('system_pay');
		$type=in_array($_GET['type'],array('alipay','wx','jd','paypal','paybao','union','bill'))?$_GET['type']:'alipay';
		if($this->bidcms_submit_check('commit')){
			$_POST['shop_id']=$store_id;
			$status=$mod->save($_POST);
			if($status>0){
				echo '{"status":1}';
			} else {
				echo '{"status":0,"msg":"未改变任何数据"}';
			}
			exit;
		}
		$shopinfo=$mod->get_list($store_id);
		if('wx'==$type){
			sheader("http://shop.bidcms.com/basis.html#/app/".$store_id."/pay/home/payment",3,array('message'=>'将跳转到微信管理平台进行设置'));
		}
		include $this->bidcms_template($type.'_pay','views/system');
	}

	function withdraw_action(){
		global $store_id;
		$mod=$this->bidcms_model('system_setting');
		if($this->bidcms_submit_check('commit')){
			$_POST['shop_id']=$store_id;
			$status=$mod->save_multi($_POST);
			if($status>0){
				echo '{"status":1}';
			} else {
				echo '{"status":0,"msg":"未改变任何数据"}';
			}
			exit;
		}
		$shopinfo=$mod->get_list($store_id);
		include $this->bidcms_template('withdraw','views/system');
	}

	function points_action(){
		global $store_id;
		$mod=$this->bidcms_model('system_setting');
		$shopinfo=$mod->get_list($store_id);
		include $this->bidcms_template('points','views/system');
	}

	function apply_action(){
		global $store_id;
		$mod=$this->bidcms_model('system_setting');
		$shopinfo=$mod->get_list($store_id);
		include $this->bidcms_template('apply','views/system');
	}

	function audit_action(){
		global $store_id;
		$mod=$this->bidcms_model('system_setting');
		$shopinfo=$mod->get_list($store_id);
		include $this->bidcms_template('audit','views/system');
	}

	function agent_rank_action(){
		global $store_id;
		$mod=$this->bidcms_model('system_setting');
		$shopinfo=$mod->get_list($store_id);
		$rank=array(array('id'=>1,'title'=>'一级代理商'));
		//$rank=$this->bidcms_model('agent_rank')->get_list_shopid($store_id);
		include $this->bidcms_template('agent_rank','views/system');
	}

	function auto_confirm_action(){
		global $store_id;
		$mod=$this->bidcms_model('system_setting');
		$shopinfo=$mod->get_list($store_id);
		include $this->bidcms_template('auto_confirm','views/system');
	}

	function promise_edit_action(){
		global $store_id;
		$mod=$this->bidcms_model('system_promise');
		if($this->bidcms_submit_check('commit')){
			$_POST['shop_id']=$store_id;
			if($_POST['update_id']>0){
				$id=$mod->modify($_POST);
			} else {
				$id=$mod->add($_POST);
			}
			echo '{"status":1,"msg":"数据修改成功"}';
		}
	}
	function promise_del_action(){
		global $store_id;
		$mod=$this->bidcms_model('system_promise');
		if($this->bidcms_submit_check('commit')){
			$_POST['shop_id']=$store_id;
			$id=$mod->del($_POST);
			echo '{"status":1,"msg":"操作成功"}';
		}
	}
	function promise_action(){
		global $store_id;
		$mod=$this->bidcms_model('system_promise');
		if($this->bidcms_submit_check('commit')){
			$_POST['shop_id']=$store_id;
			if($_POST['id']>0){
				$id=$mod->update_status($_POST);
			}
			echo '{"status":1,"msg":"状态更新成功"}';
		} else {
			$list=$mod->get_list($store_id);
			include $this->bidcms_template('promise','views/system');
		}
	}
	function domain_action(){
		global $store_id;
		$status=array('待提交','审核通过','审核未通过');
		$status_color=array('label-default','label-success','label-danger');
		$mod=$this->bidcms_model('system_domain');
		if($this->bidcms_submit_check('commit')){
			if($_POST['chk_know_unbind']!=1){
				echo '{"status":0,"msg":"请先勾选“我已知晓绑定后不可以再解绑”"}';
			}
			$_POST['shop_id']=$store_id;
			$status=$mod->save($_POST);
			if($status>0){
				echo '{"status":1,"msg":"更新成功，请等待审核"}';
			} else {
				echo '{"status":0,"msg":"更新失败"}';
			}
			exit;
		}
		$info=$mod->get_info_primary_id($store_id);
		include $this->bidcms_template('domain','views/system');
	}
	function logs_action(){
		include $this->bidcms_template('logs','views/system');
	}
	
}
