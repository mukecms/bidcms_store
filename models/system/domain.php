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
class system_domain_class extends model
{
	public $table='system_domain';
	
	
	public $definition=array(

		'primary'=>'shop_id'
	);
	function save($post){
		if($post['shop_id']>0){
			$info=$this->get_info_primary_id($post['shop_id']);
			$this->dataset['name']=$post['domain_name'];
			$this->dataset['beian_no']=$post['beian_no'];
			$this->dataset['icp_number']=$post['icp_number'];
			if($info['shop_id']>0){
				return $this->update_data(array('and shop_id=:id',array(':id'=>$info['shop_id'])));
			} else {
				$this->dataset['shop_id']=$post['shop_id'];
				return $this->insert_data();
			}
		}
		
	}
}
