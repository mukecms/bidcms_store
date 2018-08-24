<?php
/*
	[Bidcms.com!] (C)2009-2011 Bidcms.com.
	This is NOT a freeware, use is subject to license terms
	$author limengqi
	$Id: userclass.php 2016-03-24 10:42 $
*/
if(!defined('IN_BIDCMS')) {
	exit('Access Denied');
}
class coupon_base_class extends model
{
	public $table='coupon_base';
	public $prefix='http://shop.bidcms.com/plugins/discount/api.php';
	public $definition=array(
		'primary'=>'id',
		'join'=>'shop_id'
	);
	public function get_list_ids($ids,$data){
		$coupons=$this->get_page(array('and id in ('.implode(',',$ids).')',array()));
		$rows=array();
		foreach($coupons as $key=>$val){ //过滤无效的优惠券
			if($val['start_time']>time() || $val['end_time']<time()){
				continue;
			}
			if($val['receive']>=$val['total']){
				continue;
			}
			if(!empty($val['goods_ids'])){
				$gids=explode(',',$val['goods_ids']);
				$goods_ids=is_array($data['goods_ids'])?$data['goods_ids']:array($data['goods_ids']);
				$pass=0;
				foreach($goods_ids as $goods_id){
					if(in_array($goods_id,$gids)){
						$pass++;
					}
				}
				if(0==$pass){
					continue;
				}
			}
			if($val['isatleast']==1 && $data['order_price']<$val['atleast']){
				continue;
			}
			if($val['type']==1){
				$val['amount']=intval($data['order_price']-($val['amount']*$data['order_price'])/100);
			}
			$rows[]=$val;
		}
		
		unset($coupons);
		return $rows;
	}
}
