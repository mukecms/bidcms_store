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
class order_comment_class extends model
{
	public $table='order_comment';
	
	public $definition=array(

		'join'=>'id',
		'primary'=>'goods_id'
	);

}
