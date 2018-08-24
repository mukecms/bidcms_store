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
class design_controller extends controller
{
	function __construct(){
		$this->models_dir=MODELS_PATH;
		$this->views_dir=VIEWS_PATH;
	}
	function getFolderTree_action(){
		global $store_id;
		$container=array('and shop_id=:sid',array(':sid'=>$store_id));
		$showpage=array('current_page'=>0,'page_size'=>20);
		$list=$this->bidcms_model("attachment_cate")->get_page($container,$showpage);
	
		$tree=array(array('name'=>'系统图标','subFolder'=>array(),'id'=>0,'picNum'=>50));
		foreach($list as $k=>$v){
			$tree[]=array('name'=>$v['title'],'subFolder'=>array(),'id'=>$v['id'],'picNum'=>$v['files']);
		}
		$data=array('status'=>1,'msg'=>'','data'=>array('total'=>count($tree),'tree'=>$tree));
		unset($list);
		echo bidcms_encode($data);
	}
	function getModule_action(){
		echo '{"status":1,"list":[{"custom_module_id":"4000195","title":"\u81ea\u5b9a\u4e49\u6a21\u5757","create_time":"2016-05-17 23:08:43","link":"http:\/\/mob.91weimai.com\/Shop\/module\/id\/4000195\/sid\/4001109.html"}],"page":""}';
	}
	function getSubFolderTree_action(){
		echo '{"status":1,"data":[],"msg":""}';
	}
	public function delFolder_action(){
		global $store_id;
		$id=$_POST['id'];
		$type=$_POST['type'];
		$this->bidcms_model('attachment_cate')->delete_data(array('and id=:id and shop_id=:sid',array(':id'=>$id,':sid'=>$store_id)));
		if($type==2){
			$list=$this->bidcms_model('attachment_base')->get_page(array('and groupId=:gid',array(':gid'=>$id)));
			foreach($list as $k=>$v){
				if($v['id']>0){
					if(!empty($v['filepath'])){
						$file=SYSTEM_PATH.str_replace(SITE_ROOT,'',$v['filepath']);
						@unlink($file);
					}
					$this->bidcms_model('attachment_base')->delete_data(array('and id=:id',array(':id'=>$v['id'])));
				}
			}
		}
		echo '{"status":1,"msg":"success"}';
	}
	function img_list_action(){
		global $store_id;
		$page=intval($_POST['p']);
		$addsql=' and shop_id=:sid';
		$keysql[':sid']=$store_id;
		$cat_id=intval($_GET['id']);
		if($cat_id>0){
			$addsql.=' and cate_id=:cid';
			$keysql[':cid']=$cat_id;
			$att=array();
		} elseif($cat_id==0) {
			$list=array(
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/22/22nev01.png','name'=>'首页'),
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/22/22nev02.png','name'=>'订单'),
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/22/22nev03.png','name'=>'消息'),
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/22/22nev04.png','name'=>'个人中心'),
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/46/37nav_img_01.png','name'=>'暂无'),
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/46/37nav_img_02.png','name'=>'暂无'),
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/46/37nav_img_03.png','name'=>'暂无'),
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/46/37nav_img_04.png','name'=>'暂无'),
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/46/37nav_img_05.png','name'=>'暂无'),
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/46/37nav_img_06.png','name'=>'暂无'),
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/46/37nav_img_07.png','name'=>'暂无'),
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/46/37nav_img_08.png','name'=>'暂无'),
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/46/37nav_img_09.png','name'=>'暂无'),
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/46/37nav_img_10.png','name'=>'暂无'),
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/51/51nav_img1.png','name'=>'暂无'),
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/51/51nav_img2.png','name'=>'暂无'),
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/51/51nav_img3.png','name'=>'暂无'),
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/51/51nav_img4.png','name'=>'暂无'),
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/51/51nav_img5.png','name'=>'暂无'),
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/51/51nav_img6.png','name'=>'暂无'),
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/51/51nav_img7.png','name'=>'暂无'),
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/51/51nav_img8.png','name'=>'暂无'),
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/51/51nav_img9.png','name'=>'暂无'),
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/52/52nev01.png','name'=>'暂无'),
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/52/52nev02.png','name'=>'暂无'),
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/52/52nev03.png','name'=>'暂无'),
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/52/52nev04.png','name'=>'暂无'),
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/52/52nev05.png','name'=>'暂无'),
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/52/52nev06.png','name'=>'暂无'),
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/52/52nev07.png','name'=>'暂无'),
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/52/52nev08.png','name'=>'暂无'),
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/52/52nev09.png','name'=>'暂无'),
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/52/52nev10.png','name'=>'暂无'),
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/3/26nev01.png','name'=>'暂无'),
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/3/26nev02.png','name'=>'暂无'),
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/3/26nev03.png','name'=>'暂无'),
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/3/26nev04.png','name'=>'暂无'),
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/1/48nav_img_01.png','name'=>'暂无'),
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/1/48nav_img_02.png','name'=>'暂无'),
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/1/48nav_img_03.png','name'=>'暂无'),
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/1/48nav_img_04.png','name'=>'暂无'),
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/2/50tab_ico.png','name'=>'暂无'),
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/2/50tab_ico_1.png','name'=>'暂无'),
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/2/50tab_ico_2.png','name'=>'暂无'),
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/2/50tab_ico_3.png','name'=>'暂无'),
				array('id'=>0,'file'=>'//shop.bidcms.com/store/data/template/51/51nav_img10.png','name'=>'暂无')
			);
			$att=array_slice($list,$page*28,28);
			$page_str="<a class='disabled'>上一页</a><a href='javascript:;' data-page='0' class='".($page==0?'cur':'')."'>1</a><a href='javascript:;' class='".($page==1?'cur':'')."' data-page='1'>2</a><a class='disabled'>下一页</a>";
		}
		if($cat_id!=0){
			$addsql.=' and file_type=0';
			$container=array($addsql,$keysql);
			$showpage=array('isshow'=>1,'page_size'=>28,'current_page'=>$page,'url'=>'index.php?con=design&act=img_list');

			$list=$this->bidcms_model('attachment_base')->get_page($container,$showpage);
			$page_str=$this->bidcms_parse_page($list['page'],$showpage);
			foreach($list['data'] as $k=>$v){
				$att[]=array('id'=>$v['id'],'file'=>$v['filepath'],'name'=>$v['filename']);
			}
		}
		$data['status']=1;
		$data['data']=$att;
		$data['msg']='';
		$data['page']=$page_str;
		echo $this->bidcms_json($data);
	}
	function media_list_action(){
		global $store_id;
		$page=intval($_GET['page']);
		$att=array();
		$addsql=' and shop_id=:sid';
		$keysql[':sid']=$store_id;
		$addsql.=' and file_type=1';

		$container=array($addsql,$keysql);
		$showpage=array('isshow'=>1,'page_size'=>20,'current_page'=>$page,'url'=>'index.php?con=design&act=media_list');

		$list=$this->bidcms_model('attachment_base')->get_page($container,$showpage);
		$page_str=$this->bidcms_parse_page($list['page'],$showpage);
		foreach($list['data'] as $k=>$v){
			$att[]=array('file_id'=>$v['id'],'file_path'=>SITE_ROOT.$v['filepath'],'file_name'=>$v['filename']);
		}
		$data['status']=1;
		$data['list']=$att;
		$data['msg']='';
		$data['page']=$page_str;
		echo $this->bidcms_json($data);
	}
	function renameImg_action(){
		global $store_id;
		$mod=$this->bidcms_model('attachment_base');
		$id=intval($_POST['file_id']);
		if($id>0){
			$info=$mod->get_info_primary_id($id);
			if($info['id']>0 && $store_id==$info['shop_id']){
				$mod->dataset['filename']=trim($_POST['file_name']);
				$mod->update_data(array('and id=:id',array(':id'=>$id)));
			}
		}
		unset($post);
		$data['status']=1;
		echo $this->bidcms_json($data);
	}
	function moveImg_action(){
		$cate_id=intval($_POST['cate_id']);
		$file_ids=$_POST['file_id'];
		if(count($file_ids)>0){
			$this->bidcms_model('attachment_base')->movefile($file_ids,$cate_id);
		}
		$data['status']=1;
		echo $this->bidcms_json($data);
	}
	function delImg_action(){
		global $store_id;
		if(!empty($_POST['file_id'])){
			$ids=implode(',',$_POST['file_id']);
		}
		$list=$this->bidcms_model('attachment_base')->get_page(array('and id in ('.$ids.')',array()));
		foreach($list as $k=>$v){
			if($v['id']>0){
				if(!empty($v['filepath'])){
					$file=SYSTEM_PATH.str_replace(SITE_ROOT,'',$v['filepath']);
					@unlink($file);
				}
				$this->bidcms_model('attachment_base')->delete_data(array('and id=:id',array(':id'=>$v['id'])));
			}
		}
		echo '{"status":1,"msg":""}';
	}
	function addFolder_action(){
		global $store_id;
		if($store_id>0){
			$post['shop_id']=$store_id;
			$post['updatetime']=time();
			$post['title']=trim($_POST['name']);
			$post['parent_id']=$_POST['parent_id']>0?$_POST['parent_id']:0;
			$data['status']=1;
			$id=$this->bidcms_model('attachment_cate')->insert_data($post);
			echo '{"status":1,"msg":"success","data":"'.$id.'"}';
			exit;
		} else {
			echo '{"status":-1,"msg":"添加失败"}';
		}
	}
	function sub_folder_action(){
		echo '{"status":1,"data":{"total":"3","nocat_total":"3","tree":[]},"msg":""}';
	}
	function renameFolder_action(){
		global $store_id;
		$post['title']=$_POST['name'];
		$id=$_POST['category_img_id']>0?$_POST['category_img_id']:0;
		if($id>0 && $store_id>0){
			$this->bidcms_model('attachment_cate')->update_data(array('and id=:id and shop_id=:sid',array(':id'=>$id,':sid'=>$store_id)),$post);
			echo '{"status":1,"msg":"success"}';
			exit;
		}
	}
	function getGroup_action(){
		global $store_id;
		$data=array();
		if($store_id>0){
			$group_list=array();
			$group_model=$this->bidcms_model("goods_group");
			$group_model->custom_fields='id,title,goods_count,updatetime';
			$group_list=$this->bidcms_model("goods_group")->get_page(array('and shop_id=:shop_id',array(':shop_id'=>$store_id)));

			foreach($group_list as $k=>$v){
				$data[]=array('group_id'=>$v['id'],'title'=>$v['title'],'create_time'=>date('Y-m-d H:i:s',$v['updatetime']),'link'=>'?act=group&id='.$v['id']);
			}
			unset($group_list);
		}

		$result['status']=1;
		$result['list']=$data;
		$result['page']="1";
		echo $this->bidcms_json($result);
	}
	function uploadFile_action(){
		global $store_id;
		if($store_id<1){
			echo '[]';
			exit;
		}
		include ROOT_PATH.'inc/classes/upload.class.php';
		$up=new upload();
		$up->updir=SYSTEM_PATH."data/upload/".date('Y/m');
		
		if($up->checkIsFile() && $up->checkSize() && $up->checkType() && $up->checkStatus())
		{
			$file=$up->execute();
			$post['shop_id']=$store_id;
			$post['file_path']=SITE_ROOT.str_replace(SYSTEM_PATH,'',$file);
			$post['file_name']=$up->handle['name'];
			$id=$this->bidcms_model('attachment_base')->save($post);
			$post['status']=1;
			$post['file_id']=$id;
			echo $this->bidcms_json($post);
			exit;
		} else {
			echo $this->bidcms_json($up->error);
			exit;
		}

	}
	function getItem_action(){
		global $store_id;
		
		$page=intval($this->bidcms_request("p",'post'));
		
		$title=$this->bidcms_request("title");
		$group_id=$this->bidcms_request("class_id");
		$item_id=$this->bidcms_request("item_id");
		$status=$this->bidcms_request("status");
		$result=array('status'=>1,'list'=>array(),'class_lists'=>array());
		if($store_id>0){
			$add_fields='and shop_id=:shop_id';
			$data=array(':shop_id'=>$store_id);
			$item_id=is_array($item_id)?implode(',',$item_id):$item_id;
			if(!empty($item_id)){
				$add_fields.=' and id in ('.$item_id.')';
			}
			if(!empty($title)){
				$add_fields.=' and title like "%'.$title.'%"';
			}
			if($status!=null && $status>=0){
				$add_fields.=' and status=:status';
				$data[':status']=$status;
			}
			if($group_id>0){
				$add_fields.=' and group_id=:group_id';
				$data[':group_id']=$group_id;
			}
			$container=array($add_fields,$data);
			$showpage=array('isshow'=>1,'current_page'=>$page,'page_size'=>15);
			$list=$this->bidcms_model('goods_base')->get_page($container,$showpage);
			foreach($list['data'] as $k=>$v){
				$thumb=substr($v['thumb'],0,4)=='http' || substr($v['thumb'],0,2)=='//'?$v['thumb']:SITE_ROOT.$v['thumb'];
				$result['list'][]=array(
					'item_id'=>$v['id'],
					'title'=>$v['title'],
					'price'=>$v['price'],
					'original_price'=>$v['original_price'],
					'create_time'=>date('Y-m-d H:i:s',$v['updatetime']),
					'link'=>API_STORE.'m.php?con=item&wxapp='.urlencode('/pages/detail/index?id='.$v['id']).'&id='.$v['id'],
					'pic'=>$thumb,
					'sale_num'=>$v['sale_num'],
					'max_limit'=>$v['quota'],
					'is_compress'=>0,
					'platform'=>$v['platform']
					);
			}
			$page_str=$this->bidcms_parse_page($list['page'],$showpage);
			
			$group_model=$this->bidcms_model("goods_group");
			$group_model->custom_fields='id,title,goods_count';
			$group_list=$group_model->get_page(array('and shop_id=:shop_id',array(':shop_id'=>$store_id)));
			$result['page']=$page_str;
			$result['class_lists']=$group_list;
			unset($list);
		}
		echo $this->bidcms_json($result);
	}
	function getMagazine_action(){
		global $store_id;
		$page=intval($_GET['p']);
		$result=array('status'=>1,'list'=>array());
		if($store_id>0){
			$list=$this->bidcms_model('special_base')->get_list_join_id($store_id);
			foreach($list as $k=>$v){
				$result['list'][]=array('magazine_id'=>$v['id'],'title'=>$v['title'],'create_time'=>date('Y-m-d H:i:s',$v['updatetime']),'link'=>API_STORE.'m.php?con=special&wxapp='.urlencode('/pages/index/index?id='.$v['id']).'&id='.$v['id']);
			}
			unset($list);
		}
		$result['page']=$page;
		echo $this->bidcms_json($result);
	}
	function getMagazineCategory_action(){
		global $store_id;
		$page=intval($_GET['p']);
		$result=array('status'=>1,'list'=>array());
		if($store_id>0){
			$list=$this->bidcms_model('special_cate')->get_list_join_id($store_id);
			foreach($list as $k=>$v){
				$result['list'][]=array('magazine_category_id'=>$v['id'],'title'=>$v['title'],'create_time'=>date('Y-m-d H:i:s',$v['updatetime']),'link'=>API_STORE.'m.php?act=scate&id='.$v['id']);
			}
			unset($list);
		}
		$result['page']=$page;
		echo $this->bidcms_json($result);
	}
	function getGame_action(){
		echo '{"status":1,"list":[],"page":""}';
	}
	function compose_action(){
		global $store_id;
		if(isset($_GET['id'])){

			echo file_get_contents(ROOT_PATH."data/composedata/dataset".$_GET['id'].".json");
		}

	}
}
