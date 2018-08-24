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
class sku_base_class extends model
{
	public $table='sku_base';
	
	
	public $definition=array(
		'primary'=>'id'
	);

	function save($post){
		$info=array();
		$text=trim($post['name']);
		if(!empty($text)){
			$info=$this->get_one(array('and name=:name',array(':name'=>$text)));
			if($info['id']>0){
				return $info;
			} else {
				$this->dataset['name']=$text;
				$data['id']=$this->insert_data();
				$data['name']=$text;
				return $data;
			}
		}
	}
	function save_sku_attribute($post){
		$info=array();
		$sku_id=intval($post['id']);
		$text=trim($post['text']);
		if($sku_id>0 && !empty($text)){
			$info=$this->GetOne(array('and sku_id=:id and name=:name',array(':id'=>$sku_id,':name'=>$text)),array('id','name','sku_id'),'',$this->table_sku_attr);
			if($info['id']>0){
				return $info;
			} else {
				$data=array('sku_id'=>$sku_id,'name'=>$text);
				$data['id']=$this->InsertData($data,false,$this->table_sku_attr);
				return $data;
			}
		}
	}
	function get_sku_by_name($text){
		$info=array();
		if($id>0){
			$info=$this->GetOne(array('and name=:name',array(':name'=>$text)),array('name','id'),'');
		}
		return $info;
	}
	function get_sku_by_gid($gid){
		$info=array();
		if($gid>0){
			$info=$this->GetOne(array('and goods_id=:gid',array(':gid'=>$gid)),array(),'',$this->table_goods_sku);
		}
		return $info;
	}
	function get_info_by_id($id){
		$info=array();
		if($id>0){
			$info=$this->GetOne(array('and id=:id',array(':id'=>$id)));
		}
		return $info;
	}
	function get_list($container=array(),$page=0,$url='',$nopage=true){
		if($nopage){
			$showpage=array('currentpage'=>intval($page),'pagesize'=>20);
		} else {
			$showpage=array('isshow'=>1,'currentpage'=>intval($page),'pagesize'=>20,'url'=>$url);
		}
		$list=$this->GetPage($showpage,$container,array(),'order by id desc');
		return $list;
	}
	
}
