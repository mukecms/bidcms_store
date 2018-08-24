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
class orders_controller extends controller
{
	function __construct(){
		$this->models_dir=MODELS_PATH;
		$this->views_dir=VIEWS_PATH;
	}
	function numbers_action(){
		global $store_id;
		$order_count=$this->bidcms_model("order_base")->order_count($store_id);
		$d['status']=1;
		$d['data']=$order_count;
		echo $this->bidcms_json($d);
	}
	function getExpress_action(){
		echo '{"status":1,"data":{"express_name":12,"order_no":1,"result":{"list":[{"status":"1","time":"2017/2/21"}]}}}';
	}
	function index_action(){
		global $store_id,$cache;
		$page=$this->bidcms_request('page','get');
		$page_size=$this->bidcms_request('page_size','get');
		$page_size=empty($page_size)?20:$page_size;
		$order_status=$this->bidcms_request('status','get');
		$order_mod=$this->bidcms_model("order_base");
		$url='index.php?con=orders';
		$f='and shop_id=:sid';
		$d[':sid']=$store_id;
		if($order_status!=null){
			$f.=' and order_status=:status';
			$d[':status']=$order_status;
			$url.='&status='.$order_status;
		}
		$fields=array('receiver_name'=>'receiver_name','express_no'=>'express_no','receiver_address'=>'address','receiver_mobile'=>'receiver_mobile','shipping_type'=>'shipping_type','mobile_orderno'=>'order_sn','user_id'=>'customer_id');
		if(!empty($_POST['start_create_time'])){
			$f.=' and updatetime>=:stime';
			$d[':stime']=strtotime($_POST['start_create_time']);
		}
		if(!empty($_POST['end_create_time'])){
			$f.=' and updatetime<=:etime';
			$d[':etime']=strtotime($_POST['end_create_time']);
		}
		if(!empty($_POST)){
				foreach($fields as $k=>$v){
						if(!empty($_POST[$k])){
							$f.=' and '.$fields[$k].'=:'.$k;
							$d[':'.$k]=$_POST[$k];
						}
				}
		}
		$container=array($f,$d);
		$showpage=array('isshow'=>1,'current_page'=>intval($page),'page_size'=>intval($page_size),'url'=>$url.'&page_size='.$page_size);

		$list=$order_mod->get_page($container,$showpage,'order by id desc');
		foreach($list['data'] as $k=>$v){
			$list['data'][$k]['goods']=$this->bidcms_model('order_goods')->get_list_order_id($v['id']);
		}
		$pageinfo=$this->bidcms_parse_page($list['page'],$showpage);
		//自提地址
		$self_address=$this->bidcms_model('freight_address')->get_page(array('and shop_id=:sid',array(':sid'=>$store_id)));
		
		include $this->bidcms_template('index','views/orders');
	}
	function exchange_action(){
        global $store_id;
		$fields=array('receiver_name'=>'receiver_name','express_no'=>'express_no','receiver_address'=>'address','receiver_mobile'=>'receiver_mobile','mobile_orderno'=>'order_sn');

        $url='index.php?con=orders&act=exchange';
        $page=$this->bidcms_request('page','get');
		$status=$this->bidcms_request('status','get');
		$f='and shop_id=:sid';
		$d[':sid']=$store_id;
		if($status==1){
			$f.=' and order_status in (-5,5)';
		} else {
			$f.=' and order_status in (-5,-4,5)';
		}
		if(!empty($_POST['start_create_time'])){
			$f.=' and updatetime>=:stime';
			$d[':stime']=strtotime($_POST['start_create_time']);
		}
		if(!empty($_POST['end_create_time'])){
			$f.=' and updatetime<=:etime';
			$d[':etime']=strtotime($_POST['end_create_time']);
		}
		if(!empty($_POST)){
				foreach($fields as $k=>$v){
						if(!empty($_POST[$k])){
							$f.=' and '.$fields[$k].'=:'.$k;
							$d[':'.$k]=$_POST[$k];
						}
				}
		}
		$container=array($f,$d);
        $showpage=array('isshow'=>1,'current_page'=>intval($page),'page_size'=>20,'url'=>$url);
		$list=$this->bidcms_model('order_base')->get_page($container,$showpage,'order by refund_time desc');

        foreach($list['data'] as $k=>$v){
		  $goods=$this->bidcms_model('order_goods')->get_list_order_id($v['id']);
			$refund=$this->bidcms_model('order_refund')->get_page(array('and order_id=:oid',array(':oid'=>$v['id'])));
			foreach($refund as $key=>$val){
				$refund[$key]['imglist']=json_decode($val['imglist']);
				if(!empty($val['goods_id'])){
					foreach($goods as $gitem){
						if(strpos('a,'.$val['goods_id'].',b',','.$gitem['goods_id'].',')>0){
							$refund[$key]['goods'][]=$gitem;
						}
					}

				}
			}
			$list['data'][$k]['refund']=$refund;

        }
		unset($refund,$goods);
        $pageinfo=$this->bidcms_parse_page($list['page'],$showpage);

		include $this->bidcms_template('exchange','views/orders');
	}
	function refund_order_action(){
		global $store_id;
		$remark=$this->bidcms_request('remark');
		$id=$this->bidcms_request('id');
		$status=$this->bidcms_request('status');
		if($id>0){
			$info=$this->bidcms_model('order_refund')->get_info_primary_id($id);
			if($info['id']>0 && $info['shop_id']==$store_id){
				$this->bidcms_model('order_refund')->update_data(array('and id=:id',array(':id'=>$id)),array('remark'=>$remark,'status'=>$status));
				$this->bidcms_model('order_base')->update_data(array('and id=:id',array(':id'=>$info['order_id'])),array('order_status'=>$status*5));
			}

			echo '{"status":"1","msg":""}';
			exit;
		}
		echo '{"status":"-1","msg":""}';
	}
	function reply_comment_action(){
		global $store_id;
		$content=$this->bidcms_request('val');
		$id=$this->bidcms_request('id');
		if($id>0){
			$this->bidcms_model('order_comment')->update_data(array('and id=:id',array(':id'=>$id)),array('reply'=>$content,'reply_time'=>time()));
			echo '{"status":"1","msg":"'.$content.'"}';
			exit;
		}
		echo '{"status":"-1","msg":""}';
	}
	function comment_action(){
		global $store_id;
		$f='and shop_id=:sid';
		$d[':sid']=$store_id;
		$start_time=$this->bidcms_request('start_time');
		$end_time=$this->bidcms_request('end_time');
		$page=$this->bidcms_request('page');
		if(!empty($start_time)){
			$f.=' and updatetime>='.strtotime($start_time);
		}
		if(!empty($end_time)){
			$f.=' and updatetime<='.strtotime($end_time);
		}
		$container=array($f,$d);
		$showpage=array('isshow'=>1,'current_page'=>intval($page),'page_size'=>20,'url'=>$url);
		$list=$this->bidcms_model('order_comment')->get_page($container,$showpage,'order by id desc');
		foreach($list['data'] as $k=>$v){
			$list['data'][$k]['imglist']=json_decode($v['imglist']);
			$goods_info=$this->bidcms_model('order_goods')->get_one(array('and order_id=:oid and goods_id=:gid',array(':oid'=>$v['order_id'],':gid'=>$v['goods_id'])));
			$list['data'][$k]['goods']=$goods_info;
		}
		$pageinfo=$this->bidcms_parse_page($list['page'],$showpage);
		include $this->bidcms_template('comment','views/orders');
	}
	function ajax_order_list_action(){
		$order_id=intval($this->bidcms_request('order_id'));
		$result=array('status'=>'-1','msg'=>'','data'=>array());
		$data=array();
		if($order_id>0){
			$order=$this->bidcms_model("order_base")->get_info_primary_id($order_id);
			$goods=array();
			$goods_list=$this->bidcms_model('order_goods')->get_list_order_id($order_id);
			foreach($goods_list as $k=>$v){
				$goods[]=array('href'=>'?con=item&id='.$v['goods_id'],'title'=>$v['goods_name'],'img'=>$v['goods_thumb'],'price'=>$v['current_price'],'sku'=>$v['sku_name'],'num'=>$v['num']);
			}
			$data['dataset']=$goods;
			$data['coupon']=null;
			if(!empty($order['coupon_id'])){
				$data['coupon']=array('title'=>$order['coupon_name'],'money'=>$coupon['coupon_price']);
			}
			$data['riseOrDrop']='0';
			$data['freight']=$order['post_price'];
			$data['orderPrice']=$order['goods_price'];
			$data['realPrice']=$order['payable'];
			$result['status']='1';
			$result['data']=$data;
		}

		echo $this->bidcms_json($result);
	}
	function edit_order_action(){
		global $store_id;

		if($this->bidcms_submit_check('commit')){
				$id=$this->bidcms_request("id");
				if($id>0 && $store_id>0){
				$riseOrDrop=floatval($this->bidcms_request("rise"));
				$freight=floatval($this->bidcms_request("freight"));
				$mod=$this->bidcms_model("order_base");
				$table=tname($mod->table,$mod->db_index);
				$sql="update ".$table." set post_price=".$freight.",payable=goods_price+(".floatval($freight+$riseOrDrop).") where id=".$id." and shop_id=".$store_id;
				$mod->db->exec($sql);
			}
		}
		echo '{"status":"1","msg":""}';
	}
	//确认收货
	function confirm_order_action(){
		global $store_id;
		if($this->bidcms_submit_check('commit')){
				$id=$this->bidcms_request("id");
				if($id>0 && $store_id>0){
					$this->bidcms_model("order_base")->update_data(array('and id=:id and shop_id=:sid',array(':id'=>$id,':sid'=>$store_id)),array('order_status'=>3,'receiver_time'=>time()));
				}
				echo '{"status":"1","msg":""}';
		}
	}
	//确认发货
	function send_order_action(){
		global $store_id;
		if($this->bidcms_submit_check('commit')){
				$id=$this->bidcms_request("id");
				if($id>0 && $store_id>0){
					$this->bidcms_model("order_base")->update_data(array('and id=:id and shop_id=:sid',array(':id'=>$id,':sid'=>$store_id)),array('order_status'=>2,'receiver_time'=>time()));
				}
				echo '{"status":"1","msg":""}';
		}
	}
	//确认发货
	function send_goods_action(){
		global $store_id,$freight_company;
		if($this->bidcms_submit_check('commit')){
				$id=$this->bidcms_request("id");
				$mod=$this->bidcms_model('order_base');
				$order=$mod->get_info_primary_id($id);
				if(empty($order['express_id'])){
					$data=array('order_status'=>2,'express_time'=>time());
				}
				$is_self=$this->bidcms_request('is_self_take');
				if($is_self==1){
					$data['express_id']=$this->bidcms_request("self_address_id");
					$data['express_name']="self_take";
				} else {
					$data['express_id']=$this->bidcms_request("express");
					if($data['express_id']=='10'){
						$data['express_name']=$this->bidcms_request("express_name");
					} else {
						$data['express_name']=$freight_company[$data['express_id']];
					}

				}
				$data['express_no']=$this->bidcms_request("express_no");
				
				if($id>0 && $store_id>0){
					$mod->update_data(array('and id=:id and shop_id=:sid',array(':id'=>$id,':sid'=>$store_id)),$data);
				}
				echo '{"status":"1","msg":""}';
		}
	}
	//确认发货
	function change_address_action(){
		global $store_id;
		if($this->bidcms_submit_check('commit')){
				$id=$this->bidcms_request("id");
				$mod=$this->bidcms_model('order_base');
				$data['address']=$this->bidcms_request("address");
				$data['receiver_name']=$this->bidcms_request("name");
				$data['receiver_mobile']=$this->bidcms_request("mobile");
				$is_self=$this->bidcms_request('is_self_take');
        if($id>0 && $store_id>0){
					$mod->update_data(array('and id=:id and shop_id=:sid',array(':id'=>$id,':sid'=>$store_id)),$data);
				}
				echo '{"status":"1","msg":""}';
		}
	}
	function update_order_sku_action(){
		$id=intval($this->bidcms_request('id'));
		$skus=$this->bidcms_request('sku_ids');
		$ogids=$this->bidcms_request('item_ids');
		foreach($skus as $k=>$v){
			$sku=explode('-',$v);
			$data['sku_id']=$sku[0];
			$data['sku_name']=$sku[1];
			$ogid=$ogids[$k];
			$this->bidcms_model('order_goods')->update_data(array('and id=:id',array(':id'=>$ogid)),$data);
		}
		echo '{"status":"1","msg":""}';
	}
	function get_order_sku_action(){
		$id=intval($this->bidcms_request('order_id'));
		$result=array('data'=>array());
		if($id>0){
			$goods=$this->bidcms_model('order_goods')->get_list_order_id($id);
			foreach($goods as $k=>$v){
				$attr_sku=$this->bidcms_model('goods_sku')->get_info_join_id($v['goods_id']);
				$props=json_decode($attr_sku['props'],true);
				$sku_props=json_decode($attr_sku['sku_props'],true);
				$new_sku=array();
				foreach($sku_props as $ks=>$vs){
					$name=array();
					$p=explode(';',$ks);
					foreach($p as $val){
						$name[]=$props[$val];
					}
					$new_sku[]=array('sku_id'=>$ks,'sku_name'=>implode(',',$name));
				}
				$goods[$k]['arr_sku']=$new_sku;
			}
			$result['data']=$goods;
		}
		echo $this->bidcms_json($result);
	}
}
