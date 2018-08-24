<?php
/*
	[Bidcms.com!] (C)2009-2011 Bidcms.com.
	This is NOT a freeware, use is subject to license terms
	$author limengqi
	$Id: showcase.class.php 2010-08-24 10:42 $
*/
if(!defined('IN_BIDCMS')) {
	exit('Access Denied');
}
class comment_controller extends controller
{
	function __construct(){
		$this->models_dir=MODELS_PATH;
		$this->views_dir=VIEWS_PATH;
	}
	function ajax_del_action(){
		global $store_id;
		$content=$this->bidcms_request('val');
		$id=$this->bidcms_request('id');
		if($id>0){
			$mod=$this->bidcms_model('order_comment');
			$mod->delete_data(array('and id=:id',array(':id'=>$id)));
			echo '{"status":"1","msg":""}';
			exit;
		}
		echo '{"status":"-1","msg":""}';
	}
	function ajax_hide_action(){
		global $store_id;
		$content=$this->bidcms_request('val');
		$id=$this->bidcms_request('id');
		if($id>0){
			$mod=$this->bidcms_model('order_comment');
			$sql="update ".tname($mod->table,$mod->db_index)." set is_hide=not is_hide where id=".$id;
			$mod->db->exec($sql);
			echo '{"status":"1","msg":""}';
			exit;
		}
		echo '{"status":"-1","msg":""}';
	}
	function reply_comment_action(){
		global $store_id;
		$content=$this->bidcms_request('val');
		$id=$this->bidcms_request('id');
		if($id>0){
			$this->bidcms_model('order_comment')->update_data(array('and id=:id',array(':id'=>$id)),array('reply'=>$content,'reply_time'=>time()));
			echo '{"status":"1","msg":"'.$content.'"}';
			exit;
		}
		echo '{"status":"-1","msg":""}';
	}

}
