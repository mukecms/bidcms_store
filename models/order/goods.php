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
class order_goods_class extends model
{
	public $table='order_goods';
	
	
	public $definition=array(

		'join'=>'goods_id',
		'primary'=>'id'
	);

	public function get_list_order_id($oid){
		global $cache;
		$key='order'.($oid%10).':goods:'.$oid;
		$list=$cache->get($key);
		if(empty($list)){
			$list=$this->get_page(array('and order_id=:oid',array(':oid'=>$oid)),array('index'=>'goods_id'));
			$cache->set($key,$list);
		}
		return $list;
	}
}
