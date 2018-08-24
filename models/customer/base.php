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
class customer_base_class extends model
{
	public $table='customer_base';
	public $prefix='http://shop.bidcms.com/wxapp/index.php';
	public $definition=array(
		'primary'=>'id',
		'join'=>'shop_id'
	);
	function get_cache_primary_id($id){
		global $cache;
		$key="user".($id%10).":".$id;
		$info=$cache->get($key);
		if(empty($info)){
			$info=$this->get_info_primary_id($id);
			$cache->set($key,$info);
		}
		return $info;
	}
	function get_cache_hash($hash){
		global $cache;
		$key="user".substr($hash,0,1).":".$hash;
		$info=$cache->get($key);
		if(empty($info)){
			$info=$this->get_one(array('and hash=:h',array(':h'=>$hash)));
			$cache->set($key,$info);
		}
		return $info;
	}
}
