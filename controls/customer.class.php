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
class customer_controller extends controller
{
	function __construct(){
		$this->models_dir=MODELS_PATH;
		$this->views_dir=VIEWS_PATH.'customer/';
	}
	function index_action(){
		global $store_id;
		$container=array('and shop_id=:sid',array(':sid'=>$store_id));
		$showpage=array('isshow'=>1,'current_page'=>intval($_GET['page']),'page_size'=>20,'url'=>'index.php?con=customer');
		//会员列表
		$list=$this->bidcms_model("customer_base")->get_page($container,$showpage);
		//会员等级
		$customer_rank=$this->bidcms_model("customer_rank")->get_page($container);
		
		foreach($list['data'] as $k=>$v){
			$customer_ids[]=$v['id'];
		}
		if(!empty($customer_ids)){
			$customer_counts=$this->bidcms_model('customer_count')->get_page(array('and customer_id in ('.implode(',',$customer_ids).')',array()));
			foreach($customer_counts as $k=>$v){
				$amounts[$v['customer_id']]=$v;
			}
		}
		$pageinfo=$this->bidcms_parse_page($list['page'],$showpage);
		
		include $this->bidcms_template('customer_index');
	}
	function point_log_action(){
		global $store_id;
		$showpage=array('isshow'=>1,'current_page'=>intval($_GET['page']),'page_size'=>20,'url'=>'index.php?con=customer&act=point_log');
		$list=$this->bidcms_model('customer_points')->get_page(array('and shop_id=:sid',array(':sid'=>$store_id)),$showpage,'order by id desc');
		$pageinfo=$this->bidcms_parse_page($list['page'],$showpage);
		include $this->bidcms_template('point_log');
	}
	function rank_action(){
		global $store_id;
		
		$container=array('and shop_id=:sid',array(':sid'=>$store_id));
		$list=$this->bidcms_model("customer_rank")->get_page($container);
		
		include $this->bidcms_template('customer_rank');
	}
	function letter_action(){
		global $store_id;
		//会员等级
		$customer_rank=$this->bidcms_model("customer_rank")->get_cache_shop_id($store_id);
		//分销商等级
		$agent_rank=$this->bidcms_model("agent_rank")->get_cache_shop_id($store_id);
		$container=array('and shop_id=:sid',array(':sid'=>$store_id));
		$showpage=array('isshow'=>1,'current_page'=>intval($_GET['page']),'page_size'=>20,'url'=>'index.php?con=customer&act=letter');
		$list=$this->bidcms_model("customer_letter")->get_page($container,$showpage);
		$pageinfo=$this->bidcms_parse_page($list['page'],$showpage);
		include $this->bidcms_template('customer_letter');
	}
	function privilege_action(){
		global $store_id;
		if($store_id>0){
			$mod=$this->bidcms_model('shop_setting');
			$mod->custom_fields='shop_id,privilege';
			$info=$mod->get_info_primary_id($store_id);
			$content=$info['privilege'];
		}
		include $this->bidcms_template('customer_privilege');
	}

	function edit_action(){
		global $store_id;
		if($this->bidcms_submit_check('commit')){
			$id=$this->bidcms_request('user_id');
			$post['username']=$this->bidcms_request('name');
			$post['email']=$this->bidcms_request('email');
			$post['mobile']=$this->bidcms_request('mobile');
			$pass=$this->bidcms_request('password');
			$remark=$this->bidcms_request('user_remark');
			if(!empty($pass)){
				$post['password']=md52($pass);
			}
			if(!empty($remark)){
				$post['remark']=$remark;
			}
			if($id>0){
				$this->bidcms_model("customer_base")->update_data(array('and id=:id and shop_id=:sid',array(':id'=>$id,':sid'=>$store_id)),$post);
			}
			echo '{"status":"1","msg":""}';
		}
	}
	function deluser_action(){
		global $store_id;
		if($this->bidcms_submit_check('commit')){
			$id=$this->bidcms_request('id');
			if($id>0){
				$this->bidcms_model("customer_base")->delete_data(array('and id=:id and shop_id=:sid',array(':id'=>$id,':sid'=>$store_id)));
			}
			echo '{"status":"1","msg":""}';
		}
	}
	function delRank_action(){
		global $store_id;
		$id=$this->bidcms_request('id');
		if($id>0){
			//判断是否存在
			$info=$this->bidcms_model("customer_rank")->get_one(array('and id=:id',array(':id'=>$id)));
			if($info['shop_id']==$store_id){
				$this->bidcms_model("customer_rank")->delete_data(array('and id=:id',array(':id'=>$id)));
				echo '{"status":"1","msg":""}';
				exit;
			}
			
		}
		echo '{"status":"-1","msg":""}';
	}
	function setRank_action(){
		global $store_id;
		$id=$this->bidcms_request('user_id');
		if($id>0){
			$post['level']=$this->bidcms_request('rank_id');
			$this->bidcms_model("customer_base")->update_data(array('and id=:id and shop_id=:sid',array(':id'=>$id,':sid'=>$store_id)),$post);
		}
		echo '{"status":"1","msg":""}';
	}
	
	function setPoint_action(){
		global $store_id;
		$id=$this->bidcms_request('user_id');
		if($id>0){
			$point=$this->bidcms_request('point');
			$remark=$this->bidcms_request('remark');
			$customer=$this->bidcms_model('customer_base')->get_info_primary_id($id);
			//奖励积分
			$this->bidcms_model("customer_points")->insert_data(array('uid'=>$customer['id'],'shop_id'=>$store_id,'updatetime'=>time(),'username'=>$customer['username'],'content'=>'后台积分调整'.$remark,'type'=>'system','old_point'=>$customer['point'],'point'=>$point,'end_point'=>$customer['point']+$point));
			$this->bidcms_model("customer_base")->update_data(array(' and id=:uid',array(':uid'=>$customer['id'])),array('point'=>$customer['point']+$point));
		}
		echo '{"status":"1","msg":""}';
	}
	//调整余额
	function setAmount_action(){
		global $store_id;
		$id=$this->bidcms_request('user_id');
		$remark=$this->bidcms_request('remark');
		$amount=$this->bidcms_request('payment');
		if($this->bidcms_submit_check('commit')){
			if($id>0 && $amount!=0){
				$customer=$this->bidcms_model('customer_base')->get_info_primary_id($id);
				$customer_count=$this->bidcms_model('customer_count')->get_info_join_id($id);
				if($customer['shop_id']==$store_id && $customer_count['id']>0){
					$this->bidcms_model("customer_amounts")->insert_data(array('uid'=>$customer['id'],'shop_id'=>$store_id,'updatetime'=>time(),'username'=>$customer['username'],'content'=>'后台金额调整'.$remark,'type'=>'system','old_amount'=>$customer_count['amount'],'amount'=>$amount,'end_amount'=>$customer_count['amount']+$amount));
					$this->bidcms_model("customer_count")->update_data(array(' and customer_id=:uid',array(':uid'=>$customer['id'])),array('amount'=>$customer['amount']+$amount));
				}
			}
			echo '{"status":"1","msg":""}';
		}
		
	}
	//发红包
	function setRedpack_action(){
		global $store_id;
		$id=$this->bidcms_request('user_id');
		$amount=$this->bidcms_request('total_amount');
		$remark=$this->bidcms_request('wishing');
		if($this->bidcms_submit_check('commit')){
			if($id>0 && $amount>0){
				$customer=$this->bidcms_model('customer_base')->get_info_primary_id($id);
				$customer_count=$this->bidcms_model('customer_count')->get_info_join_id($id);
				if($customer['shop_id']==$store_id && $customer_count['id']>0){
					$this->bidcms_model("customer_amounts")->insert_data(array('uid'=>$customer['id'],'shop_id'=>$store_id,'updatetime'=>time(),'username'=>$customer['username'],'content'=>$remark,'type'=>'redpack','old_amount'=>$customer_count['amount'],'amount'=>$amount,'end_amount'=>$customer_count['amount']+$amount));
					$this->bidcms_model("customer_base")->update_data(array(' and customer_id=:uid',array(':uid'=>$customer['id'])),array('amount'=>$customer_count['amount']+$amount));
				}
			}
			echo '{"status":"1","msg":""}';
		}
		
	}
	function resetPayPassword_action(){
		global $store_id;
		$id=$this->bidcms_request('id');
		if($id>0){
			$post['pay_password']=md52($this->bidcms_request('password'));
			$this->bidcms_model("customer_base")->update_data(array('and id=:id and shop_id=:sid',array(':id'=>$id,':sid'=>$store_id)),$post);
		}
		echo '{"status":"1","msg":""}';
	}
	function editRank_action(){
		global $store_id;
		if($this->bidcms_submit_check("commit")){
			$id=$this->bidcms_request("rank_id");
			$data['title']=$this->bidcms_request('alias');
			$data['amount']=$this->bidcms_request('amount');
			$data['discount']=$this->bidcms_request('discount');
			$data['trades']=$this->bidcms_request('count');
			$data['point']=$this->bidcms_request('point');
			$data['level']=$this->bidcms_request('level');
			$data['content']=$this->bidcms_request('content');
			//修改等级
			if($id>0){
				$this->bidcms_model("customer_rank")->update_data(array('and id=:id',array(':id'=>$id)),$data);
			} else {
				$data['shop_id']=$store_id;
				$this->bidcms_model("customer_rank")->insert_data($data);
			}

			echo '{"status":"1","msg":""}';
		}

	}
	function editLetter_action(){
		global $store_id;
		if($this->bidcms_submit_check("commit")){
			$id=$this->bidcms_request("message_id");
			$data['to_id']=$this->bidcms_request('type');
			$data['to_username']=$GLOBALS['letter_group'][$data['to_id']];
			$data['content']=$this->bidcms_request('content');
			$data['updatetime']=time();
			$data['rank_id']=$this->bidcms_request('rank_id');
			$data['agent_rank_id']=$this->bidcms_request('agent_rank_id');

			//发送系统站内信
			if($id>0){
				$this->bidcms_model("customer_letter")->update_data(array('and id=:id',array(':id'=>$id)),$data);
			} else {
				$data['to_type']=1;
				$data['status']=100;
				$data['from_id']=0;
				$data['from_username']='系统';
				$data['shop_id']=$store_id;
				$this->bidcms_model("customer_letter")->insert_data($data);
			}

			echo '{"status":"1","msg":""}';
		}
	}
	function setLetter_action(){
		global $store_id;
		$id=$this->bidcms_request('user_id');
		if($id>0){
			$content=$this->bidcms_request('content');
			$customer=$this->bidcms_model('customer_base')->get_info_primary_id($id);
			//发送站内信
			$this->bidcms_model("customer_letter")->insert_data(array('to_id'=>$customer['id'],'shop_id'=>$store_id,'updatetime'=>time(),'from_id'=>0,'content'=>$content,'status'=>'0'));
			$this->bidcms_model("customer_base")->update_data(array(' and id=:uid',array(':uid'=>$customer['id'])),array('mail'=>$customer['mail']+1));
		}
		echo '{"status":"1","msg":""}';
	}
	function cash_action(){
		global $store_id;
		$container=array('and shop_id=:sid',array(':sid'=>$store_id));
	
		$showpage=array('isshow'=>1,'current_page'=>intval($_GET['page']),'page_size'=>20,'url'=>'index.php?con=property&act=withdraw');
		$list=$this->bidcms_model("customer_amounts")->get_page($container,$showpage,'order by id desc');
		
		$pageinfo=$this->bidcms_parse_page($list['page'],$showpage);
		
		include $this->bidcms_template('cash_list');
	}
}
