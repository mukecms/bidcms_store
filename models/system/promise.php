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
class system_promise_class extends model
{
	public $table='system_promise';
	
	
	public $definition=array(

		'primary'=>'id',
		'join'=>'shop_id'
	);
	function get_list($shop_id){
		$rows=array();
		if($shop_id>0){
			$rows=$this->get_page(array('and shop_id=:sid',array(':sid'=>$shop_id)));
		}
		return $rows;
	}
	function update_status($post){
		if($post['shop_id']>0 && $post['id']>0){
			$info=$this->get_info_primary_id($post['id']);
			if($info['shop_id']==$post['shop_id']){
				$this->dataset['status']=intval($post['value']);
				return $this->update_data(array('and id=:id',array(':id'=>$info['id'])));
			}
		}
		return false;
	}
	function del($post){
		if($post['shop_id']>0 && $post['id']>0){
			$info=$this->get_info_primary_id($post['id']);
			if($info['shop_id']==$post['shop_id']){
				return $this->delete_data(array('id=:id',array(':id'=>$post['id'])));
			}
		}
		return false;
	}
	function add($post){
		if($post['shop_id']>0 && !empty($post['name'])){
			$this->dataset['shop_id']=intval($post['shop_id']);
			$this->dataset['name']=$post['name'];
			$this->dataset['image']=$post['img'];
			$this->dataset['desc']=$post['excerpt'];
			$this->dataset['type']=intval($post['type']);
			return $this->insert_data();
		}
		return false;
	}
	function modify($post){
		if($post['shop_id']>0 && $post['update_id']>0){
			$info=$this->get_info_primary_id($post['update_id']);
			if($info['shop_id']==$post['shop_id']){
				$this->dataset['name']=$post['name'];
				$this->dataset['image']=$post['img'];
				$this->dataset['desc']=$post['excerpt'];
				$this->dataset['type']=intval($post['type']);
				return $this->update_data(array('and id=:id',array(':id'=>$info['id'])));
			}
		}
		return false;
	}
}
