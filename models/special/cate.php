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
class special_cate_class extends model {
	public $table='special_cate';
	
	
	public $definition=array(

		'multilang' => false,
		'primary' => 'id',
		'join'=>'shop_id'
	);
	public function save($post){
		$info=array();
		if($post['class_id']>0){ //参数为空
			$info=$this->get_info_primary_id($post['class_id']);
		}
		$this->dataset['title']=$post['title'];
		$this->dataset['updatetime']=time();
		$this->dataset['num']=0;
		$this->dataset['serial']=$post['serial'];
		$this->dataset['url']=$post['link'];
		if($info['id']>0){ //参数为空
			$category_id =$this->update_data(array(' and id=:id',array(':id'=>$info['id'])));
		} else {
			$this->dataset['shop_id']=$post['shop_id'];
			$category_id = $this->insert_data();
		}
		return $category_id;
	}

	function del($post){
		global $cache;
		if(is_array($post['id'])){
			foreach($post['id'] as $v){
				$info=$this->get_info_primary_id($v);
				if($info['id']>0){
					//$cache->remove('special:id:'.$info['id']);
					$this->delete_data(array(' and id=:id',array(':id'=>$info['id'])));
				}
			}

		} elseif($post['id']>0){
			$info=$this->get_info_primary_id($post['id']);
			if($info['id']>0){
				//$cache->remove('special:id:'.$info['id']);
				$this->delete_data(array(' and id=:id',array(':id'=>$info['id'])));
			}
		}
		return true;
	}
}
