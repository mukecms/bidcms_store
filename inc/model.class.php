<?php
/*
	[Bidcms.Com!] (C)2009-2011 Bidcms.Com.
	This is NOT a freeware, use is subject to license terms

	$Id: model.class.php 2010-08-24 10:42 $
*/

if(!defined('IN_BIDCMS')) {
	exit('Access Denied');
}
class model
{
	public $table='';
	public $prefix='http://shop.bidcms.com/store/index.php';
	public function get_page($container=array(),$showpage=array(),$order=''){
		$url=$this->prefix.'?con=remote&act=get_page';
		$content=array();
		
		if(!empty($this->table)){
			$data=bidcms_encode(array('model'=>$this->table,'container'=>$container,'showpage'=>$showpage,'order'=>$order));
			
			$content=$GLOBALS['curl']->request($url,'PUT',$data);
			return bidcms_decode($content);
		}
		return $content;
	}
	public function get_one($container=array(),$order='',$showpage=array()){
		$url=$this->prefix.'?con=remote&act=get_one';
		$content=array();
		if(!empty($this->table)){
			$data=bidcms_encode(array('model'=>$this->table,'container'=>$container,'order'=>$order));
			$content=$GLOBALS['curl']->request($url,'PUT',$data);
			return bidcms_decode($content);
		}
		return $content;
	}
	public function get_sum($field,$container=array(),$showpage=array()){
		$url=$this->prefix.'?con=remote&act=get_sum';
		$content=array();
		if(!empty($this->table)){
			$data=bidcms_encode(array('model'=>$this->table,'field'=>$field,'showpage'=>$showpage,'container'=>$container,'order'=>$order));
			$content=$GLOBALS['curl']->request($url,'PUT',$data);
			return bidcms_decode($content);
		}
		return $content;
	}
	public function get_count($container=array(),$order='',$showpage=array()){
		$url=$this->prefix.'?con=remote&act=get_count';
		$content=array();
		if(!empty($this->table)){
			$data=bidcms_encode(array('model'=>$this->table,'showpage'=>$showpage,'container'=>$container,'order'=>$order));
			$content=$GLOBALS['curl']->request($url,'PUT',$data);
			return bidcms_decode($content);
		}
		return $content;
	}
	public function get_sql($sql){
		$url=$this->prefix.'?con=remote&act=get_sql';
		$content=array();
		if(!empty($this->table)){
			$data=bidcms_encode(array('model'=>$this->table,'sql'=>$sql));
			$content=$GLOBALS['curl']->request($url,'PUT',$data);
			return bidcms_decode($content);
		}
		return $content;
	}
	public function update_data($container,$data){
		$data=!empty($data)?$data:$this->dataset;
		$url=$this->prefix.'?con=remote&act=update_data';
		$rows=0;
		if(!empty($this->table)){
			$data=bidcms_encode(array('model'=>$this->table,'container'=>$container,'data'=>$data));
			$rows=$GLOBALS['curl']->request($url,'PUT',$data);
		}
		return $rows;
	}
	public function insert_data($data){
		$data=!empty($data)?$data:$this->dataset;
		$url=$this->prefix.'?con=remote&act=insert_data';
		$rows=0;
		if(!empty($this->table)){
			$data=bidcms_encode(array('model'=>$this->table,'data'=>$data));
			$rows=$GLOBALS['curl']->request($url,'PUT',$data);
		}
		return $rows;
	}
	public function delete_data($container){
		$url=$this->prefix.'?con=remote&act=delete_data';
		$rows=0;
		if(!empty($this->table)){
			$data=bidcms_encode(array('model'=>$this->table,'container'=>$container));
			$rows=$GLOBALS['curl']->request($url,'PUT',$data);
		}
		return $rows;
	}
	public function get_info_primary_id($id){
		$info=array();
		if($id>0 && !empty($this->definition['primary'])){
			$info=$this->get_one(array('and '.$this->definition['primary'].'=:id',array(':id'=>$id)));
		}
		return $info;
	}
	public function get_info_join_id($id){
		$info=array();
		if($id>0 && !empty($this->definition['join'])){
			$info=$this->get_one(array('and '.$this->definition['join'].'=:id',array(':id'=>$id)));
		}
		return $info;
	}
	function get_list_join_id($id,$is_mutil=false){
		$list=array();
		if(!empty($this->definition['join']) && !empty($id)){
			$container=array(' and '.$this->definition['join'].'=:id',array(':id'=>$id));
			$rows=$this->get_page($container);
			if($this->definition['multilang'] && isset($this->fields['language_id'])){
				if($is_mutil){
					foreach($rows as $k=>$v){
						$list[$v['language_id']][]=$v;
					}
				} else {
					foreach($rows as $k=>$v){
						$list[$v['language_id']]=$v;
					}
				}

			} else {
				return $rows;
			}

		}
		return $list;
	}
}
