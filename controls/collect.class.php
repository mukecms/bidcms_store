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
class collect_controller extends controller
{
	function __construct(){
		$this->models_dir=MODELS_PATH;
		$this->views_dir=VIEWS_PATH;
	}

	function xiaomi_action(){
		global $store_id;

		$id=$this->bidcms_request('id','get');
		if(empty($id)){
			echo '参数错误';
			exit;
		} else {
			$file=ROOT_PATH.'data/cache/collect/xiaomi/'.$id.'.txt';
			if(!file_exists($file)){
				echo '文件不存在';
				exit;
			}
		}
		$str=file_get_contents($file);
		$json=json_decode($str,true);
		$seo_info=$json['data']['seo'];
		$view_content = $json["data"]["view_content"];
		$goods_list = $json["data"]["goods_info"];
		if(count($goods_list)<1){
			echo '商品不存在';
			exit;
		}
		//基本信息
		$base['title']= $seo_info["title"];
		$base['keywords']=$seo_info["keywords"];
		$base['slogan']= str_replace('"',"'",$seo_info["description"]);

		$goods_info = $goods_list[0];
		$base['shop_id']= 2;
		$base['cat_id']=11;
		$base['group_id']=0;
		$base['goods_no']= $id;
		//判断商品是否已经存在了
		$goods=$this->bidcms_model('goods_base')->get_one(array('and goods_no=:id',array(':id'=>$base['goods_no'])));
		if(!empty($goods)){
			echo '商品已经存在';
			exit;
		}
		$base['thumb']= $goods_info["img_url"];
		$base['platform']= 'xiaomi';
		$base['updatetime']= time();
		$base['quota']= $goods_info["buy_limit"];
		$base['original_price']= $goods_info["market_price"];
		$base['price']= $goods_info["price"];
		$base['num']= '100'; //显示库存
		$base['pictures']= implode(',',$view_content["galleryView"]["galleryView"]);
		$item_id=$this->bidcms_model('goods_base')->insert_data($base);
		if($item_id<1){
			echo '添加失败';
			exit;
		}
		//规格
		$goods_skus=$json['data']['buy_option'];
		if(!empty($goods_skus)){
			$sku=array('norms'=>array(),'props'=>array(),'color_img'=>array());
			$tempsku=array();
			foreach($goods_skus as $k=>$v){
				$props=array();
				foreach($v['list'] as $key=>$val){
					$props[]=$val['prop_value_id'];
					$sku['props'][$val['prop_value_id']]=$val['name'];
					$tempsku[$val['prop_value_id']]=$val;
					if(!empty($val['icon_color'])){
						$sku['color_img'][$val['prop_value_id']]=$val['icon_color'];
					}
				}
				$sku['norms'][]=array('name'=>$v['name'],'id'=>$v['prop_cfg_id'],'props'=>$props);
			}
			$o_price=$price=$base['price'];
			foreach($sku['norms'][0]['props'] as $k0=>$v0){
				$o_price=!empty($tempsku[$v0]['price'])?$tempsku[$v0]['price']:$o_price;
				$price=!empty($tempsku[$v0]['price'])?$tempsku[$v0]['price']:$price;
				$rank_price=array();
				$salenum="0";
				$stock='10';
				$code='';
				foreach($sku['norms'][1]['props'] as $k1=>$v1){
					$id=$v0.';'.$v1;
					
					$skus[$id]['rank_props']=$v0.'-'.$v1;
					$skus[$id]['o_price']=empty($o_price)?$tempsku[$v1]['price']:$o_price;
					$skus[$id]['price']=empty($o_price)?$tempsku[$v1]['price']:$price;
					$skus[$id]['props']=array($v0,$v1);
					$skus[$id]['salenum']=$salenum;
					$skus[$id]['stock']=$stock;
					$skus[$id]['rank_price']=$rank_price;
					$skus[$id]['code']=$code;
				}
			}
			$sku['sku_props']=json_encode($skus);
			$sku['goods_id']=$item_id;
			$sku['norms']=json_encode($sku['norms']);
			$sku['props']=json_encode($sku['props']);
			$sku['color_img']=json_encode($sku['color_img']);
			echo $this->bidcms_model('goods_sku')->insert_data($sku);
		}
		//商品详情
		$descTabs = $view_content["descTabsView"]["descTabsView"];
		$len=count($descTabs);
		$html='';
		for($i = 0; $i < $len; $i++)
		{
		   $html.="<h2>". $descTabs[$i]["name"]. "</h2>";
		   $tabContent = $descTabs[$i]["tabContent"];
		   $jlen = count($tabContent);
			if ($jlen > 0)
			{
				for ($j = 0; $j < $jlen; $j++)
				{
					$html.="<div>" . $tabContent[$j]["plainView"]["title"] . "</div><img src=\"" . $tabContent[$j]["plainView"]["img"] . "\"/><p>" . $tabContent[$j]["plainView"]["content"] . "</p>";
				}
			}
		}
		$html=htmlspecialchars($html);
		$html=htmlspecialchars('{"page":{"hasMargin":1,"backgroundColor":"#f8f8f8"},"PModules":[{"id":1,"type":1,"draggable":false,"sort":0,"content":{"fulltext":"'.$html.'","modulePadding":5},"dom_conitem":null,"ue":null,"dom_ctrl":null}],"LModules":[]}');
		echo $this->bidcms_model('goods_content')->insert_data(array('goods_id'=>$item_id,'content'=>$html));
	}
	
}
