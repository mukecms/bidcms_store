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
class agent_controller extends controller
{
	function __construct(){
		$this->models_dir=MODELS_PATH;
		$this->views_dir=VIEWS_PATH.'agent/';
	}
	function index_action(){
		global $store_id;
		$container=array('and shop_id=:sid and status=1',array(':sid'=>$store_id));
		$showpage=array('isshow'=>1,'current_page'=>intval($_GET['page']),'page_size'=>20,'url'=>'index.php?con=agent&act=apply');
		//分销商等级
		$agent_rank=$this->bidcms_model("agent_rank")->get_page(array('and shop_id=:sid',array(':sid'=>$store_id)));
		$list=$this->bidcms_model("agent_apply")->get_page($container,$showpage);
		$customer_ids=array();
		foreach($list as $k=>$v){
			$customer_ids[]=$v['customer_id'];
		}
		if(!empty($customer_ids)){
			$customer_counts=$this->bidcms_model('customer_count')->get_page(array('and id in ('.implode(',',$customer_ids).')',array()));
			foreach($customer_counts as $k=>$v){
				$amounts[$v['customer_id']]=$v;
			}
		}
		$pageinfo=$this->bidcms_parse_page($list['page'],$showpage);
		include $this->bidcms_template('agent_index');
	}
	function setTime_action(){
		global $store_id;
		if($this->bidcms_submit_check('commit')){
			$id=$this->bidcms_request('user_id');
			$post['reviewed_time']=strtotime($this->bidcms_request('start_time'));
			$post['end_time']=strtotime($this->bidcms_request('end_time'));
			if($id>0){
				$this->bidcms_model("customer_base")->update_data(array('and id=:id and shop_id=:sid',array(':id'=>$id,':sid'=>$store_id)),$post);
			}
			echo '{"status":"1","msg":""}';
		}
	}
	//审核通过
	function apply_pass_action(){
		global $store_id;
		$id=$this->bidcms_request("apply_id");
		if($id>0){
			$agent_level=$this->bidcms_request("rank_id");
			$start_time=$this->bidcms_request("start_time");
			$end_time=$this->bidcms_request("end_time");
			$remark=$this->bidcms_request("remark");
			$info=$this->bidcms_model("agent_apply")->get_info_primary_id($id);
			if($info['id']>0 && $info['shop_id']==$store_id){
				$parent_id=$info['customer_id'];
				if(!empty($info['invite_uid'])){ //分销商申请过后，将我的邀请者做为我的上级并继承邀请者的上级关系
					$inviter=$this->bidcms_model("agent_apply")->get_one(array('and bidcms_id=:bid',array(':bid'=>$info['invite_uid'])));
					if($inviter['status']==1){
						$parent_id=$inviter['parent_uid'].','.$info['customer_id'];
					}
				}
				$this->bidcms_model("agent_apply")->update_data(array('and id=:id',array(':id'=>$id)),array('status'=>1,'reviewed_time'=>time(),'start_time'=>$start_time,'reviewed_remark'=>$remark,'agent_level'=>$agent_level,'end_time'=>$end_time,'parent_uid'=>$parent_id));
				
			}
			echo '{"status":"1","msg":""}';
		}
	}
	//拒绝审核
	function apply_nopass_action(){
		global $store_id;
		$id=$this->bidcms_request("apply_id");
		if($id>0){
			$remark=$this->bidcms_request("remark");
			$info=$this->bidcms_model("agent_apply")->get_info_primary_id($id);
			if($info['id']>0 && $info['shop_id']==$store_id){
				$this->bidcms_model("agent_apply")->update_data(array('and id=:id',array(':id'=>$id)),array('status'=>-1,'reviewed_time'=>time(),'reviewed_remark'=>$remark));
			}
			echo '{"status":"1","msg":""}';
		}
	}
	function apply_action(){
		global $store_id;
		$container=array('and shop_id=:sid',array(':sid'=>$store_id));
		$showpage=array('isshow'=>1,'current_page'=>intval($_GET['page']),'page_size'=>20,'url'=>'index.php?con=agent&act=apply');
		$rank_list=$this->bidcms_model("agent_rank")->get_cache_shop_id($store_id);
		
		$list=$this->bidcms_model("agent_apply")->get_page($container,$showpage);
		$pageinfo=$this->bidcms_parse_page($list['page'],$showpage);
		include $this->bidcms_template('agent_apply');
	}

	function rank_action(){
		global $store_id;
		$container=array('and shop_id=:sid',array(':sid'=>$store_id));
		$list=$this->bidcms_model("agent_rank")->get_page($container);
		include $this->bidcms_template('agent_rank');
	}
	
	function editRank_action(){
		global $store_id;
		if($this->bidcms_submit_check("commit")){
			$id=$this->bidcms_request("rank_id");
			$data['title']=$this->bidcms_request('title');
			$data['level']=$this->bidcms_request('agent_level');
			$data['reward_money']=$this->bidcms_request('reward_money');
			$data['reward_point']=$this->bidcms_request('reward_point');
			$data['draw_num']=$this->bidcms_request('draw_num');
			$data['draw_money']=$this->bidcms_request('draw_money');
			//修改等级
			if($id>0){
				$this->bidcms_model("agent_rank")->update_data(array('and id=:id',array(':id'=>$id)),$data);
			} else {
				$data['shop_id']=$store_id;
				$this->bidcms_model("agent_rank")->insert_data($data);
			}

			echo '{"status":"1","msg":""}';
		}

	}
	function commission_action(){
		global $store_id;
		if($this->bidcms_submit_check('commit')){
			$content=$this->bidcms_request('remark');
			$commission=floatval($this->bidcms_request('commission'));
			$id=$this->bidcms_request('id');
			if($id>0){
				$info=$this->bidcms_model("order_commission")->get_info_primary_id($id);
				if($info['shop_id']==$store_id){
					if($commission==-1){
						$this->bidcms_model("order_commission")->update_data(array('and id=:id',array(':id'=>$id)),array('balance_status'=>-1,'balance_time'=>time(),'content'=>$content));
					} elseif($commission>0) {
						$this->bidcms_model("order_commission")->update_data(array('and id=:id',array(':id'=>$id)),array('commission'=>($commission*100),'content'=>$content));
					}
					
				}
				echo '{"status":"1","msg":""}';
			}
		} else {
			$container=array('and shop_id=:sid',array(':sid'=>$store_id));
			$showpage=array('isshow'=>1,'current_page'=>intval($_GET['page']),'page_size'=>20,'url'=>'index.php?con=agent&act=commission');
			$list=$this->bidcms_model("order_commission")->get_page($container,$showpage);
			$pageinfo=$this->bidcms_parse_page($list['page'],$showpage);
			include $this->bidcms_template('commission_list');
		}
	}
	//修改分销商等级
	function setRank_action(){
		global $store_id;
		$id=$this->bidcms_request('user_id');
		$rank_id=$this->bidcms_request('agent_rank_id');
		if($id>0){
			$info=$this->bidcms_model('agent_apply')->get_info_primary_id($id);
			if($info['shop_id']==$store_id && $info['agent_level']!=$rank_id){
				$this->bidcms_model('agent_apply')->update_data(array('and id=:id',array(':id'=>$id)),array('agent_level'=>$rank_id));
			}
			echo '{"status":"1","msg":""}';
			exit;
		}
		echo '{"status":"-1","msg":""}';
	}
}
