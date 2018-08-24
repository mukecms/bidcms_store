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
class system_setting_class extends model
{
	public $table='system_setting';
	
	public $definition=array(

		'primary'=>'id',
		'joing'=>'shop_id'
	);
	function get_list($shop_id){
		global $cache;
		$key="system:setting:".$shop_id;
		$list=$cache->get($key);
		if(empty($list)){
			$list=$rows=array();
			if($shop_id>0){
				$rows=$this->get_page(array('and shop_id=:sid',array(':sid'=>$shop_id)));
			}
			foreach($rows as $v){
				$list[$v['name']]=$v['value'];
			}
			$cache->set($key,$list);
		}

		return $list;
	}
	function save($post){
		if($post['shop_id']>0 && !empty($post['name'])){
			$info=$this->get_one(array('and shop_id=:sid and name=:name',array(':sid'=>$post['shop_id'],':name'=>$post['name'])));
			if(is_array($post['value'])){
				$this->dataset['value']=implode(',',$post['value']);
			} else {
				$this->dataset['value']=htmlspecialchars($post['value']);
			}
			if($info['id']>0){
				return $this->update_data(array('and id=:id',array(':id'=>$info['id'])));
			} else {
				$this->dataset['shop_id']=$post['shop_id'];
				$this->dataset['name']=$post['name'];
				return $this->insert_data();
			}
		}

	}
}
