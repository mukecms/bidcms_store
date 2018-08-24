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
class freight_controller extends controller
{
	function __construct(){
		$this->models_dir=MODELS_PATH;
		$this->views_dir=VIEWS_PATH;
	}
	function index_action(){
		global $store_id,$freight_company;
		$list=$this->bidcms_model("freight_tpl")->get_page(array('and shop_id=:sid',array(':sid'=>$store_id)));

		include $this->bidcms_template('index','views/freight');
	}
	function add_tpl_action(){
		global $store_id,$freight_company;
		if($this->bidcms_submit_check("commit")){
			$_POST['shop_id']=$store_id;
			$id=$this->bidcms_model("freight_tpl")->save($_POST);
			sheader("index.php?con=freight",3,array('message'=>'添加成功'));
		} else {
			$id=intval($this->bidcms_request('id','get'));
			$info=array();
			if($id>0){
				$info=$this->bidcms_model('freight_tpl')->get_info_primary_id($id);
			}
			include $this->bidcms_template('add_tpl','views/freight');
		}

	}
	function del_tpl_action(){
		global $store_id;
		$id=$this->bidcms_request("id");
		$id=is_array($id)?implode(',',$id):$id;
		if(!empty($id)){
			$this->bidcms_model('freight_tpl')->delete_data(array(' and id in ('.$id.') and shop_id=:sid',array(':sid'=>$store_id)));
		}
		echo '{"status":1,"msg":"删除成功"}';
	}
	function delivery_action(){
		global $store_id;
		$list=$this->bidcms_model("freight_delivery")->get_page(array('and shop_id=:sid',array(':sid'=>$store_id)));
		include $this->bidcms_template('delivery','views/freight');
	}
	function add_delivery_action(){
		global $store_id;
		echo $this->bidcms_submit_check('commit');
		if($this->bidcms_submit_check('commit')){
			$_POST['shop_id']=$store_id;
			$id=$this->bidcms_model('freight_delivery')->save($_POST);
			if($id>0){
				sheader("index.php?con=freight&act=delivery",3,array('message'=>'添加成功'));
			}
		} else {
			$id=$this->bidcms_request('id','get');
			$print_items=array();
			if($id>0){
				$info=$this->bidcms_model('freight_delivery')->get_info_primary_id($id);
				$print_items=json_decode($info['print_items'],true);
			}
			include $this->bidcms_template('add_delivery','views/freight');
		}
	}
	function del_delivery_action(){
		global $store_id;
		$id=$this->bidcms_request("id");
		$id=is_array($id)?implode(',',$id):$id;
		if(!empty($id)){
			$this->bidcms_model('freight_delivery')->delete_data(array(' and id in ('.$id.') and shop_id=:sid',array(':sid'=>$store_id)));
		}
		echo '{"status":1,"msg":"删除成功"}';
	}
	function default_delivery_action(){
		global $store_id;
		$id=$this->bidcms_request("id");
		if($id>0){
			$info=$this->bidcms_model("freight_delivery")->get_info_primary_id($id);
			if(!empty($info) && $info['id']>0 and $info['shop_id']==$store_id){
					$this->bidcms_model('freight_delivery')->update_data(array('and id=:id',array(':id'=>$id)),array('is_default'=>!$info['is_default']));
			}

		}
		echo '{"status":1,"msg":"设置成功"}';
	}
	function cod_action(){
		include $this->bidcms_template('cod','views/freight');
	}

	function address_action(){
		global $store_id;
		$list=$this->bidcms_model("freight_address")->get_page(array('and shop_id=:sid',array(':sid'=>$store_id)));
		include $this->bidcms_template('address','views/freight');
	}
	function add_address_action(){
		global $store_id;
		if($this->bidcms_submit_check('commit')){
			$_POST['shop_id']=$store_id;
			$id=$this->bidcms_model('freight_address')->save($_POST);
			if($id>0){
				sheader("index.php?con=freight&act=address",3,array('message'=>'添加成功'));
			}
		} else {
			$id=$this->bidcms_request('id','get');
			if($id>0){
				$info=$this->bidcms_model('freight_address')->get_info_primary_id($id);
			}
			include $this->bidcms_template('add_address','views/freight');
		}
	}
	function del_address_action(){
		global $store_id;
		$id=$this->bidcms_request("id");
		if($id>0){
			$this->bidcms_model('freight_address')->delete_data(array(' and id=:id and shop_id=:sid',array(':id'=>$id,':sid'=>$store_id)));
		}
		echo '{"status":1,"msg":"删除成功"}';
	}
}
