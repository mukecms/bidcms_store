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
class special_base_class extends model
{
	public $table='special_base';
	
	public $definition=array(
		'primary'=>'id',
		'join'=>'shop_id'
	);
	function save($post){
		global $cache;
		$info=array('id'=>0);
		if($post['id']>0){
			$info=$this->get_info_primary_id($post['id']);
		}
		$this->dataset['content']=htmlspecialchars($post['content']);
		$this->dataset['title']=trim($post['title']);
		$this->dataset['intro']=trim($post['excerpt']);
		$this->dataset['view_pic']=trim($post['view_pic']);
		$this->dataset['updatetime']=time();
		$this->dataset['cate_id']=trim($post['cate_id']);
		if($info['id']>0){
			$cache->delete('special:id:'.$info['id']);
			$this->update_data(array(' and id=:id',array(':id'=>$info['id'])));
			return $info['id'];
		} else {
			$this->dataset['shop_id']=$post['shop_id'];
			$this->dataset['status']=0;
			return $this->insert_data();
		}
	}

	function del($post){
		global $cache;
		if(is_array($post['id'])){
			foreach($post['id'] as $v){
				$info=$this->get_info_primary_id($v);
				if($info['id']>0){
					//$cache->remove('special:id:'.$info['id']);
					$this->delete_data(array('id=:id',array(':id'=>$info['id'])));
				}
			}

		} elseif($post['id']>0){
			$info=$this->get_info_primary_id($post['id']);
			if($info['id']>0){
				//$cache->remove('special:id:'.$info['id']);
				$this->delete_data(array('id=:id',array(':id'=>$info['id'])));
			}
		}
		return true;
	}


}
