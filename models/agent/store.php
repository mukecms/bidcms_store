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
class agent_store_class extends model
{
	public $table='agent_store';

	
	public $definition=array(

		'primary'=>'id',
		'join'=>'shop_id'
	);
	public function get_cache_info($shop_id,$customer_id){
		global $cache,$base;
		$key='agent:store:'.$shop_id.'_'.$customer_id;
		$info=$cache->get($key);
		if(empty($info)){
			$info=$base->get_one(array('and customer_id=:cid and shop_id=:sid',array(':sid'=>$shop_id,':cid'=>$customer_id)));
			$cache->set($key,$info);
		}
		return $info;
	}
}
