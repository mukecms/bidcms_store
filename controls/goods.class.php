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
header("content-type:text/html;charset=utf-8");
class goods_controller extends controller
{
	function __construct(){
		$this->models_dir=MODELS_PATH;
		$this->views_dir=VIEWS_PATH;
	}

	function index_action(){
		global $store_id;
		
		$container=array('and shop_id=:sid',array(':sid'=>$store_id));
		$showpage=array('isshow'=>1,'current_page'=>intval($_GET['page']),'page_size'=>20,'url'=>'index.php?con=goods');
		$group_list=$this->bidcms_model('goods_group')->get_page(array('and shop_id=:sid',array(':sid'=>$store_id)));
		$list=$this->bidcms_model("goods_base")->get_page($container,$showpage,'order by id desc');
		$pageinfo=$this->bidcms_parse_page($list['page'],$showpage);
		include $this->bidcms_template('list','views/goods');
	}
	function group_action(){
		global $token,$store_id;
		$mod=$this->bidcms_model("goods_group");
		$mod->custom_fields='id,title,updatetime,goods_count';
		$list=$mod->get_page(array('and shop_id=:sid',array(":sid"=>$store_id)));
		$edit_url='index.php?con=goods&act=group_edit';
		include $this->bidcms_template('group','views/goods');
	}
	function group_edit_action(){
		global $store_id;
		$mod=$this->bidcms_model('goods_group');
		if($this->bidcms_submit_check('commit')){
			$_POST['shop_id']=$store_id;
			$mod->save($_POST);
			echo '{"status":1,"msg":""}';
		} else {
			$id=intval($_GET['id']);
			$info=$mod->get_info_primary_id($id);
			include $this->bidcms_template('group_edit','views/goods');
		}

	}
	function del_group_action(){
		global $manager,$store_id;
		$_POST['shopid']=$store_id;
		$this->bidcms_model('goods_group')->del($_POST);
		$result['status']=1;
		$result['msg']='';
		echo $this->bidcms_json($result);
	}
	function add_step1_action(){

	}
	function add_step2_action(){
		global $store_id;
		$mod=$this->bidcms_model('goods_base');
		if($this->bidcms_submit_check("commit")){
			$update_id=$_POST['update_id'];
			//商品基本信息
			
			$goods_base['title']=$_POST['title'];
			$files=explode(',',$_POST['file_path']);
			$goods_base['thumb']=$files[0];
			$goods_base['goods_no']=$_POST['goods_no'];
			$goods_base['slogan']=$_POST['slogan'];
			$goods_base['platform']=$_POST['platform'];
			$goods_base['buy_url']=$_POST['buy_url'];
			$group_info=explode('-',$_POST['group_id']);
			$goods_base['group_id']=intval($group_info[0]);
			$goods_base['group_name']=isset($group_info[1])?$group_info[1]:'';
			$goods_base['cat_id']=$_POST['cat_id'];
			$goods_base['serial']=$_POST[''];
			$goods_base['original_price']=$_POST['original_price'];
			$goods_base['price']=$_POST['price'];
			$goods_base['rank_price']=json_encode($_POST['rank_price']);
			$goods_base['num']=$_POST['num'];
			$goods_base['unit']=$_POST['unit'];
			$goods_base['is_point']=intval($_POST['is_point']);
			$goods_base['buy_need_points']=intval($_POST['buy_need_points']);
			$goods_base["pictures"] = trim($_POST['file_path']);
			$goods_base["fixings"] = htmlspecialchars($_POST['fixings']);
			$goods_base['quota']=intval($_POST['quota']);

			//商品设置
			$goods_setting['is_fx_commission']=intval($_POST['is_fx_commission']);
			$goods_setting['directly_money']=floatval($_POST['directly_money']);
			$goods_setting['superior_money']=floatval($_POST['superior_money']);
			$goods_setting['three_money']=floatval($_POST['three_money']);
			$goods_setting['is_fx_point']=floatval($_POST['is_fx_point']);
			$goods_setting['self_point']=floatval($_POST['self_point']);
			$goods_setting['directly_point']=floatval($_POST['directly_point']);
			$goods_setting['superior_point']=floatval($_POST['superior_point']);
			$goods_setting['three_point']=floatval($_POST['three_point']);
			
			$goods_setting['is_cod']=intval($_POST['is_cod']);
			$goods_setting['hide_stock']=intval($_POST['hide_stock']);
			$goods_setting['join_level_discount']=intval($_POST['join_level_discount']);
			$goods_setting['is_buy_card']=intval($_POST['is_buy_card']);
			$goods_setting['is_show_sale']=intval($_POST['is_show_sale']);
			$goods_setting['freight']=intval($_POST['freight']);
			$key='freight'.$goods_setting['freight'];
			$goods_setting['freight_val']=intval($_POST[$key]);
			
			//商品规格
			$goods_sku["color_img"] =trim($_POST['sku_color_img']);
			$goods_sku["norms"] =trim($_POST['norms']);
			$goods_sku["props"] = trim($_POST['props']);
			$sku_props=json_decode($_POST['sku_props'],true);
			foreach($sku_props as $k=>$v){
				$sku_props[$k]['rank_price']=$_POST['sku_rank_price'][$v['rank_props']];
			}
			$goods_sku["sku_props"] =json_encode($sku_props);
			if($update_id>0){
				$id=$this->bidcms_model("goods_base")->update_data(array('and id=:id',array(':id'=>$update_id)),$goods_base);
			} else {
				$goods_base['shop_id']=$store_id;
				$goods_base['updatetime']=time();
				$update_id=$this->bidcms_model("goods_base")->insert_data($goods_base);
			}
			$goods_setting['goods_id']=$update_id;
			$goods_sku['goods_id']=$update_id;
			$this->bidcms_model("goods_setting")->delete_data(array('and goods_id=:gid',array(':gid'=>$update_id)));
			$this->bidcms_model("goods_setting")->insert_data($goods_setting);
			$this->bidcms_model("goods_sku")->delete_data(array('and goods_id=:gid',array(':gid'=>$update_id)));
			$this->bidcms_model("goods_sku")->insert_data($goods_sku);
			if($_POST['next']==1){
				sheader("index.php?con=goods&act=add_step3&id=".$update_id,3,array('message'=>'保存成功'));
			} else {
				sheader("",0,array('message'=>'保存成功'));
			}
		} else {
			$id=intval($_GET['id']);
			$group_list=$this->bidcms_model('goods_group')->get_page(array('and shop_id=:sid',array(':sid'=>$store_id)));
			$cate_list=$this->bidcms_model('goods_cate')->get_page(array('and shop_id=:sid',array(':sid'=>$store_id)));
			$rank_list=$this->bidcms_model('customer_rank')->get_cache_shop_id($store_id);
			//运费模板
			$freight_list=$this->bidcms_model('freight_tpl')->get_page(array('and shop_id=:sid',array(':sid'=>$store_id)));
			$skus=array('norms'=>'[]','props'=>'{}','color_img'=>'{}','sku_props'=>'{}');
			$goods_setting=array();
			if($id>0){
				$info=$this->bidcms_model('goods_base')->get_info_primary_id($id);
				$info['fixings']=!empty($info['fixings'])?htmlspecialchars_decode($info['fixings']):'[]';
				$goods_setting=$this->bidcms_model('goods_setting')->get_info_join_id($id);
				$group_ids=explode(',',$info['group_id']);
				$rank_price=json_decode($info['rank_price'],true);
				$goods_sku=$this->bidcms_model('goods_sku')->get_info_join_id($id);
				if(!empty($goods_sku)){
					$skus=$goods_sku;
				}
			}
			include $this->bidcms_template('add_step2','views/goods');
		}
	}
	function add_step3_action(){
		global $manager;
		if($this->bidcms_submit_check("commit")){
			$data['goods_id']=intval($_POST['id']);
			if($data['goods_id']>0){
				$this->bidcms_model('goods_content')->delete_data(array('and goods_id=:id',array(':id'=>$data['goods_id'])));
			}
			$data['content']=htmlspecialchars($_POST['content']);
			$id=$this->bidcms_model('goods_content')->insert_data($data);
			if($id>0){
				$result['status']=1;
				$result['msg']='';
				$result['link']='index.php?con=goods';
				echo $this->bidcms_json($result);
			}
		} else {
			$id=intval($_GET['id']);
			$info=$this->bidcms_model('goods_content')->get_info_join_id($id);
			include $this->bidcms_template('add_step3','views/goods');
		}
	}

	function del_action(){
		global $store_id;
		$id=$this->bidcms_request("id");
		if(is_array($id)){
			$ids=implode(",",$id);
		} else {
			$ids=$id;
		}
		if(!empty($ids)){
			$this->bidcms_model('goods_base')->delete_data(array(' and id in ('.$ids.') and shop_id=:sid',array(':sid'=>$store_id)));
			$this->bidcms_model("goods_content")->delete_data(array(' and goods_id in ('.$ids.')',array()));
			$this->bidcms_model("goods_sku")->delete_data(array(' and goods_id in ('.$ids.')',array()));
		}
		$result['status']=1;
		$result['msg']='';
		echo $this->bidcms_json($result);
	}
	function cate_action(){
		global $store_id;
		$list=$this->bidcms_model("goods_cate")->get_page(array('and shop_id=:sid',array(':sid'=>$store_id)),array(),'order by cat_displayorder desc,cat_layer asc');

		include $this->bidcms_template('cate','views/goods');
	}
	function edit_cate_action(){
		global $store_id;

		$mod=$this->bidcms_model("goods_cate");
		if($this->bidcms_submit_check('commit')){
			$type='insert';
			$id=$this->bidcms_request('class_id');
			$parent_id=$this->bidcms_request('parent_id');

			$mod->dataset['cat_name']=$this->bidcms_request('class_name');
			$mod->dataset['cat_thumb']=$this->bidcms_request('class_img');
			$mod->dataset['cat_displayorder']=$this->bidcms_request('serial');
			$mod->dataset['url']=$this->bidcms_request('link');
			$mod->dataset['updatetime']=time();
			if($id>0){
				$type='update';
				$mod->update_data(array('and id=:id',array(':id'=>$id)));
			} else{
				$mod->dataset['shop_id']=$store_id;
				$id=$mod->insert_data();
			}
			if($id>0){
				if($parent_id>0){
					$data['cat_pid']=$parent_id;
					$parent=$mod->get_info_primary_id($parent_id);
					$data['cat_level']=$parent['cat_level']+1;
					$data['cat_layer']=$parent['cat_layer'].'-'.$id;
				}else{
					$data['cat_pid']=0;
					$data['cat_level']=1;
					$data['cat_layer']=$id;
				}
				$mod->dataset=array();
				if($type=='insert'){
					$mod->update_data(array(' and id=:id',array(':id'=>$id)),$data);
				} elseif($type=='update'){
					$info=$mod->get_info_primary_id($id);
					if($info['cat_pid']!=$parent_id && $parent_id!=$info['cat_id']){
						$level_diff=$info['cat_level']-$data['cat_level'];
						$mod->update_data(array('and id=:id',array(':id'=>$id)),$data);
						$sql="update ".tname($mod->table,$mod->db_index)." set cat_layer=REPLACE(cat_layer,'".$info['cat_layer']."-','".$data['cat_layer']."-'),cat_level=cat_level-".$level_diff."  where cat_layer like '".$info['cat_layer']."-%' and shop_id=".$store_id;
						$mod->db->exec($sql);
					}
				}
			}

		}
		echo '{"status":"1","msg":"","id":"'.$id.'"}';
	}
	function ajax_cate_action(){
		global $store_id;
		$cates=array();
		$list=$this->bidcms_model("goods_cate")->get_page(array('and shop_id=:sid',array(':sid'=>$store_id)),array(),'order by cat_displayorder desc,cat_layer asc');
		foreach($list as $k=>$v){
			$cates[]=array('class_id'=>$v['id'],'class_name'=>$v['cat_name'],'cat_level'=>$v['cat_level'],'temp'=>str_repeat('&nbsp;',$v['cat_level']));
		}
		$result['code']='1';
		$result['data']=$cates;
		echo $this->bidcms_json($result);
	}
	function ajax_itemSku_action(){
		echo '{"status":1,"data":[]}';
	}

	function point_exchange_action(){
		global $store_id;
		$page=$this->bidcms_request("page","get");
		$type=$this->bidcms_request("type","get");
		$container_text='and shop_id=:sid and is_point=1';
		$container_data[':sid']=$store_id;
		if(!empty($type)){
			$container_text.=' and m_status=:status';
			$container_data[':status']=$type;
		}
		$container=array($container_text,$container_data);
		$showpage=array('isshow'=>1,'current_page'=>intval($_GET['page']),'page_size'=>20,'url'=>'index.php?con=goods&act=point_exchange');
		$list=$this->bidcms_model("goods_base")->get_page($container,$showpage);

		include $this->bidcms_template('point_exchange','views/goods');
	}
}
