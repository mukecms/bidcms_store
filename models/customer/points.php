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
class customer_points_class extends model
{
	public $table='customer_points';
	public $prefix='http://shop.bidcms.com/wxapp/index.php';
	public $definition=array(
		'primary'=>'id',
		'join'=>'uid'
	);
}
