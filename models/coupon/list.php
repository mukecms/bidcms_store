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
class coupon_list_class extends model
{
	public $table='coupon_list';
	public $prefix='http://shop.bidcms.com/plugins/discount/api.php';
	public $definition=array(
		'primary'=>'id',
		'join'=>'shop_id'
	);
	//获取匹配的有效优惠券（订单金额，指定商品)
	function get_best($data){
		global $base;
		$list=$this->get_page(array('and shop_id=:sid and customer_id=:cuid and status=0',array(':sid'=>$data['shop_id'],':cuid'=>$data['customer_id'])));
		$ids=array();
		foreach($list as $v){
			$ids[]=$v['coupon_id'];
		}
		$coupons=array();
		if(!empty($ids)){
			$rows=$base->bidcms_model('coupon_base')->get_list_ids($ids,$data);
		}
		unset($list);
		
		return $rows;
	}
}
