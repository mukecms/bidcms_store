<?php
class freight_delivery_class extends model {
	public $table='freight_delivery';
	
	public $definition=array(

		'primary' => 'id',
		'join'=>'shop_id'
	);
	public function save($post){
		$info=array();

		if($post['update_id']>0){ //参数为空
			$info=$this->get_info_primary_id($post['update_id']);
		}
		$this->dataset['company_id']=$post['shipping_company_id'];
		$this->dataset['title']=$post['print_temp_name'];
		$this->dataset['paper_width']=$post['printing_paper_width'];
		$this->dataset['paper_height']=$post['printing_paper_height'];
		$this->dataset['img_url']=$post['img_url'];

		$this->dataset['print_items']=json_encode($post['print_items_params']);
		if($info['id']>0){ //参数为空
			$id =$this->update_data(array(' and id=:id',array(':id'=>$info['id'])));
		} else {
			$this->dataset['shop_id']=$post['shop_id'];
			$id = $this->insert_data();
		}
		return $id;
	}

}
