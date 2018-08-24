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
class goods_group_class extends model
{
	public $table='goods_group';
	
	
	public $definition=array(
		'primary'=>'id',
		'join'=>'shop_id'
	);
	
	function save($post){
		$id=intval($post['update_id']);
		$this->dataset['title']=trim($post['title']);
		$content=$post['content'];
		if(empty($content)){
			$content='{"page":{"title":"'.$post['title'].'","hasMargin":1,"backgroundColor":"#f8f8f8"},"PModules":[],"LModules":[{"id":"2018720235254505","type":"GoodsGroup","draggable":true,"sort":1,"content":{"showtitle":"'.$post['title'].'","firstPriority":1,"secondPriority":1,"fulltext":"编辑分组内容","privType":1,"autoDisplay":1,"layout":1,"showPrice":true,"userRank":0,"agentRank":0,"showIco":true,"showName":true,"goodstyle":1,"layoutstyles":1,"goodstxt":"立即购买","titleLine":0,"version":1,"goodslist":[],"modulePadding":5},"dom_conitem":null,"ue":null,"dom_ctrl":null}]}';
		}
		$this->dataset['content']=htmlspecialchars($content);
		
		if($id>0){
			return $this->update_data(array(' and id=:id',array(':id'=>$id)));
		} else{
			$this->dataset['updatetime']=time();
			$this->dataset['shop_id']=intval($post['shop_id']);
			$this->dataset['goods_count']=0;
			
			return $this->insert_data();
		}
  }
	function del($post){
		$info=$this->get_info_primary_id(intval($post['id']));
		if($info['id']>0 && $info['shop_id']==$post['shopid']){
			$container=array('and id=:id',array(':id'=>$info['id']));
			$this->delete_data($container);
		}

	}
}
