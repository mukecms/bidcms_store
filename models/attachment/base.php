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
class attachment_base_class extends model
{
	public $table='attachment_base';
	public $prefix='http://shop.bidcms.com/wxapp/index.php';
	
	public $definition=array(
		'primary'=>'shop_id'
	);

	function save($post){
		$data['shop_id']=intval($post['shop_id']);
		$data['filepath']=$post['file_path'];
		$type=substr($post['file_path'],strpos($post['file_path'],'.')+1);
		$data['file_type']=0;
		if(in_array($type,array('amr','mp3'))){
			$data['file_type']=1;
		}
		$data['filename']=$post['file_name'];
		$data['updatetime']=time();
		return $this->insert_data($data);
	}
}
