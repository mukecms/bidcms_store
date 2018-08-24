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
class property_controller extends controller
{
	function __construct(){
		$this->models_dir=MODELS_PATH;
		$this->views_dir=VIEWS_PATH;
	}
	
	//提现审核通过
	function withdraw_audit_action(){
		global $store_id;
		$pay_money=floatval($this->bidcms_request('pay_money'));
		$id=intval($this->bidcms_request('log_id'));
		if($this->bidcms_submit_check('cimmit')){
			if($id>0){
				$info=$this->bidcms_model('customer_amounts')->get_info_primary_id($id);
				if(!empty($info) && $info['id']>0 && $info['shop_id']==$store_id && $info['type']=='CASHFREEZE'){
					$this->bidcms_model('customer_amounts')->update_data(array('and id=:id',array(':id'=>$info['id'])),array('type'=>'CASHAUDIT','content'=>'审核通过'));
				}
			}
			echo '{"status":"1","msg":""}';
		}
	}
	//提现审核被驳回
	function withdraw_reject_action(){
		global $store_id;
		$content=$this->bidcms_request('reason');
		$id=intval($this->bidcms_request('log_id'));
		if($this->bidcms_submit_check('commit')){
			if($id>0){
				$info=$this->bidcms_model('customer_amounts')->get_info_primary_id($id);
				$customer_count=$this->bidcms_model('customer_count')->get_info_primary_id($info['uid']);
				if(!empty($info) && $info['id']>0 && $info['shop_id']==$store_id && $info['type']=='CASHFREEZE'){
					if($customer_count['id']>0){
						$data=array('type'=>'CASHREJECT','content'=>$content);
						$this->bidcms_model('customer_amounts')->update_data(array('and id=:id',array(':id'=>$info['id'])),$data);
						$old_amount=$customer_count['amount']+abs($info['amount']);
						$wait_amount=$customer_count['wait_amount']-abs($info['amount']);
						$this->bidcms_model('customer_count')->update_data(array('and customer_id=:id',array(':id'=>$info['uid'])),array('amount'=>$old_amount,'wait_amount'=>$wait_amount));
					}
				}
			}
			echo '{"status":"1","msg":""}';
		}
	}
	//发放金额
	function withdraw_record_action(){
		global $store_id;
		$sn=$this->bidcms_request('running_number');
		$id=intval($this->bidcms_request('log_id'));
		$trade_time=$this->bidcms_request('trade_time');
		$is_red_pack=intval($this->bidcms_request('is_red_pack'));
		if($id>0){
			$info=$this->bidcms_model('customer_amounts')->get_info_primary_id($id);
			if(!empty($info) && $info['id']>0 && $info['shop_id']==$store_id && $info['type']=='CASHAUDIT'){
				
				$data=array('type'=>'CASHGRANT','trade_time'=>strtotime($trade_time),'running_number'=>$sn,'content'=>'提现已经处理','is_red_pack'=>$is_red_pack);
				
				$this->bidcms_model('customer_amounts')->update_data(array('and id=:id',array(':id'=>$info['id'])),array('type'=>'CASHGRANT','trade_time'=>strtotime($trade_time),'running_number'=>$sn,'content'=>'提现已经处理','is_red_pack'=>$is_red_pack));
			}
		}
		echo '{"status":"1","msg":""}';
	}
}
