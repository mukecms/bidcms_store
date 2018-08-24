<?php
class freight_address_class extends model {
	public $table='freight_address';
	
	public $definition=array(

		'primary' => 'id',
		'join'=>'shop_id'
	);
	public function save($post){
		$info=array();
		if($post['update_id']>0){ //参数为空
			$info=$this->get_info_primary_id($post['update_id']);
		}
		$this->dataset['store_name']=$post['store_name'];
		$this->dataset['phone']=$post['phone'];
		$this->dataset['name']=$post['name'];
		$this->dataset['mobile']=$post['mobile'];
		$this->dataset['imgdir']=$post['imgdir'];
		$this->dataset['longitude']=$post['longitude'];
		$this->dataset['latitude']=$post['latitude'];
		$this->dataset['address']=strip_tags($post['address']);
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
