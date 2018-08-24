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
class system_shops_class extends model
{
	public $table='system_shops';
	public $prefix='http://shop.bidcms.com/wxapp/index.php';
	function get_cache_hash($hash,$store_id){
		global $cache;
		$key="shop".($store_id%10).":".$hash;
		$info=$cache->get($key);
		if(empty($info)){
			if($store_id>0 && !empty($hash)){
				$info=$this->get_one(array('and wid=:h and id=:id',array(':h'=>$hash,':id'=>$store_id)));
				$cache->set($key,$info);
			}
		}
		return $info;
	}
}
