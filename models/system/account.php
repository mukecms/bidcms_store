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
class system_account_class extends model
{
	public $table='weixin_account';
	public $prefix='http://shop.bidcms.com/wxapp/index.php';
	function get_cache_info($store_id){
		global $cache;
		$key="shop".intval($store_id%10).":".$store_id;
		$info=$cache->get($key);
		if(empty($info)){
			if($store_id>0){
				$info=$this->get_page(array('and shop_id=:id',array(':id'=>$store_id)));
				$cache->set($key,$info);
			}
		}
		return $info;
	}
}
