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
class system_user_class extends model
{
	public $table='system_user';
	public $prefix='http://shop.bidcms.com/wxapp/index.php';

	function get_cache_hash($hash){
		global $cache;
		$key="systemuser".substr($hash,0,1).":".$hash;
		$info=$cache->get($key);
		if(empty($info)){
			$info=$this->get_one(array('and hash=:h',array(':h'=>$hash)));
			$cache->set($key,$info);
		}
		return $info;
	}
}
