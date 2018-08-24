<?php
class freight_tpl_class extends model {
	public $table='freight_tpl';
	public $definition=array(

		'primary' => 'id',
		'join'=>'shop_id'
	);
	public function save($post){
		global $shop;
		$info=array();
		if($post['update_id']>0){ //参数为空
			$info=$this->get_info_primary_id($post['update_id']);
		}
		$this->dataset['title']=trim($post['title']);
		$this->dataset['company_id']=intval($post['company_id']);
		$this->dataset['type']=intval($post['type']);
		$this->dataset['is_regional_sale']=intval($post['is_regional_sale']);
		$this->dataset['content']=json_encode($post['content']);
		$this->dataset['is_full_mail']=intval($post['is_full_mail']);
		$this->dataset['status']=intval($post['status']);
		$this->dataset['full_mail_money']=floatval($post['full_mail_money']);

		if($info['id']>0){ //参数为空
			$id =$this->update_data(array(' and id=:id',array(':id'=>$info['id'])));
		} else {
			$this->dataset['shop_id']=$post['shop_id'];
			$id = $this->insert_data();
		}
		return $id;
	}

	function del($post){
		global $cache;
		if(is_array($post['id'])){
			foreach($post['id'] as $v){
				$info=$this->get_info_primary_id($v);
				if($info['id']>0 && $info['uid']==$post['uid']){
					//$cache->remove('special:id:'.$info['id']);
					$this->delete_data(array('id=:id',array(':id'=>$info['id'])));
				}
			}

		} elseif($post['id']>0){
			$info=$this->get_info_primary_id($post['id']);
			if($info['id']>0 && $info['uid']==$post['uid']){
				//$cache->remove('special:id:'.$info['id']);
				$this->delete_data(array('id=:id',array(':id'=>$info['id'])));
			}
		}
		return true;
	}

}
