<?php
/*
	[Phpup.Net!] (C)2009-2011 Phpup.net.
	This is NOT a freeware, use is subject to license terms

	$Id: page.class.php 2010-08-24 10:42 $
*/

if(!defined('IN_BIDCMS')) {
	exit('Access Denied');
}
/**
 *新闻分页类
 *作者:李孟琦(bidcms.com)
 *功能:通用分页程序
 *------------------------------------------------------------------------------------------------
$sql="select * from 表";
$query=mysql_query($sql);
$nums=mysql_num_rows($query);
$page=new page($nums);
$page->setPage();
$page->url="";
$button=$page->setFormatPage();
$page->parseVal();
$str="总数:".$page->count." 总页数:".$page->total." 每页:".$page->pageSize." 当前页".$page->absolutePage." <A HREF='".$page->url."=0'>首页</A>";
$str.="<A HREF='".$page->url."=".$page->prevPage."'>上一页</A>";
foreach($button as $key=>$v)
{
	if($v==$page->absolutePage)
	{
		$str.="<span>".($v+1)."</span>";
	}
	else
	{
		$str.="<a href='".$page->url."=".$v."'>".($v+1)."</a>";
	}
}
$str.="<A HREF='".$page->url."=".$page->nextPage."'>下一页</A> <A HREF='".$page->url."=".$page->total."'>尾页</A>";
echo $str;
 *-------------------------------------------------------------------------------------------------
*/
class page
{
	var $count=0; //列表总数量,必须自定义
	var $total=0; //总页数,不用更改,自动计算
	var $absolutePage=0; //当前页
	var $pageSize=30; //每页数量
	var $getVal='page'; //通过外部传过来的参数变量 
	var $url=''; //网址,在后面会自动加上参数
	var $pageShowButton=14; //显示出来按钮页的数量
	function page($count)
	{
		$this->count=$count;
	}
	//返回分页结果
	function setPage()
	{
		$this->pageSize=$this->pageSize>0?$this->pageSize:30;
		$this->total=ceil($this->count/$this->pageSize);
		if($this->absolutePage>0)
		{
			$this->prevPage=$this->absolutePage<$this->total?($this->absolutePage-1<0?0:$this->absolutePage-1):($this->total-1<0?0:$this->total-1);
		}
		else
		{
			$this->prevPage=0;
		}

		if($this->absolutePage<$this->total)
		{
			$this->nextPage=$this->absolutePage+1;
		}
		else
		{
			$this->nextPage=$this->total;
		}
	}
	
	//得到格式分的分页
	function setFormatPage(){
		$result=array();
		$pageshow=$this->pageShowButton;
		$center=ceil($pageshow/2);
		$left=$this->absolutePage-$center;
		$left=$left<0?1:$left;
		$right=$left+$pageshow;
		$right=$right>$this->total?$this->total:$right;
		for($i=$left;$i<=$right;$i++){
			$result[]=$i;
		}
		return $result;
	}
	//解析url
	function parseUrl($page)
	{
		$url=$this->url;
		if(strpos('a'.$url,'?')>0)
		{
			$de='&';
		}
		else
		{
			$de='?';
		}
		return $url.$de.$this->getVal.'='.$page;
	}
	
	
}
