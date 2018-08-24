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
class sku_attribute_class extends model
{
	public $table='sku_attribute';
	
	
	public $definition=array(

		'join'=>'sku_id'
	);
	function save($post){
		$info=array();
		$sku_id=intval($post['id']);
		$text=trim($post['text']);

		if($sku_id>0 && !empty($text)){
			$info=$this->get_one(array('and sku_id=:id and name=:name',array(':id'=>$sku_id,':name'=>$text)));
			if($info['id']>0){
				return $info;
			} else {
				$this->dataset=array('sku_id'=>$sku_id,'name'=>$text);
				$data['id']=$this->insert_data();
				$data['sku_id']=$sku_id;
				$data['name']=$text;
				return $data;
			}
		}
	}
}
