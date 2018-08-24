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
class shop_setting_class extends model
{
	public $table='shop_setting';
	public $definition=array(

		'primary'=>'shop_id'
	);

	function save($post,$type){
		if($post['shop_id']){
			$this->customer_fields='shop_id';
			$info=$this->get_info_primary_id($post['shop_id']);
			$this->dataset[$type]=htmlspecialchars($post['content']);
			if($info['shop_id']>0){
				return $this->update_data(array(' and shop_id=:sid',array(':sid'=>$post['shop_id'])));
			} else {
				$this->dataset['shop_id']=$post['shop_id'];
				$this->insert_data();
				return true;
			}
		}

	}
}
