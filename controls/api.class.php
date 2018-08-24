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
class api_controller extends controller
{
	function __construct(){
		$this->models_dir=MODELS_PATH;
		$this->views_dir=VIEWS_PATH;
	}
	
	function haveVerifySet_action(){
		echo '{"status":0,"msg":"\u60a8\u6ca1\u6709\u6b64\u9879\u6743\u9650"}';
	}
	function orderTotal_action(){
		echo '{"status":1,"orderList":{"day":["05-04","05-05","05-06","05-07","05-08","05-09","05-10"],"series_today":[0,0,0,0,0,0,0]}}';
	}
	function mmpv_action(){
		echo '{"status":1,"mmpvList":{"minute":["18:38","18:39","18:40","18:41","18:42","18:43","18:44","18:45","18:46","18:47","18:48","18:49","18:50","18:51","18:52","18:53"],"series_today":[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]}}';
	}
	
	function orderPie_action(){
		echo '{"status":1,"orderList":{"total_fee":0,"Ftotal_fee":0}}';
	}
	function orderFxTotal_action(){
		echo '{"status":1,"orderList":{"day":["05-04","05-05","05-06","05-07","05-08","05-09","05-10"],"series_today":[0,0,0,0,0,0,0]}}';
	}
	function orderPriceTotal_action(){
		echo '{"status":1,"orderList":{"day":["05-04","05-05","05-06","05-07","05-08","05-09","05-10"],"t":[0,0,0,0,0,0,0],"f":[0,0,0,0,0,0,0]}}';
	}
	function limit_word_action(){
		echo '{"status":0,"word":"hello"}';
	}
	function getDataCount_action(){
		echo '{"status":1,"content":"<tr>\r\n    <td>\r\n        <div class=\"dataItems\">\u603b\u8ba1\u8ba2\u5355\uff08\u7b14\uff09<\/div>\r\n        <div class=\"dataItems\">\r\n            <span class=\"num1\">0<\/span>\r\n        <\/div>\r\n        <div class=\"dataItems\">\u73af\u6bd4\u589e\u5e45\r\n            <span class=\"num2 data-rise\">0% <i class=\"icon-tablesData\"><\/i>\r\n            <\/span>\r\n        <\/div>\r\n    <\/td>\r\n    <td>\r\n        <div class=\"dataItems\">\u603b\u6d88\u8d39\u91d1\u989d\uff08\u5143\uff09<\/div>\r\n        <div class=\"dataItems\">\r\n            <span class=\"num1\">0<\/span>\r\n        <\/div>\r\n        <div class=\"dataItems\">\u73af\u6bd4\u589e\u5e45\r\n            <span class=\"num2 data-rise\">0% <i class=\"icon-tablesData\"><\/i>\r\n            <\/span>\r\n        <\/div>\r\n    <\/td>\r\n\r\n    <td>\r\n        <div class=\"dataItems\">\u672c\u6708\u8ba2\u5355\uff08\u7b14\uff09<\/div>\r\n        <div class=\"dataItems\">\r\n            <span class=\"num1\">0<\/span>\r\n        <\/div>\r\n        <div class=\"dataItems\">\u73af\u6bd4\u589e\u5e45\r\n            <span class=\"num2 data-rise\">0% <i class=\"icon-tablesData\"><\/i>\r\n            <\/span>\r\n        <\/div>\r\n    <\/td>\r\n    <td>\r\n        <div class=\"dataItems\">\u672c\u6708\u6d88\u8d39\u91d1\u989d\uff08\u5143\uff09<\/div>\r\n        <div class=\"dataItems\">\r\n            <span class=\"num1\">0<\/span>\r\n        <\/div>\r\n        <div class=\"dataItems\">\u73af\u6bd4\u589e\u5e45\r\n            <span class=\"num2 data-rise\"> 0% <i class=\"icon-tablesData\"><\/i>\r\n            <\/span>\r\n        <\/div>\r\n    <\/td>\r\n    <!--\r\n    <td class=\"bdr\">\r\n        <div class=\"dataItems\">\u6628\u65e5\u5e97\u94fa\u6d4f\u89c8\u91cf<\/div>\r\n        <div class=\"dataItems\">\r\n            <span class=\"num1\"><\/span>\r\n        <\/div>\r\n        <div class=\"dataItems\">\u73af\u6bd4\u589e\u5e45\r\n            <span class=\"num2 data-rise\"> % <i class=\"icon-tablesData\"><\/i>\r\n            <\/span>\r\n        <\/div>\r\n    <\/td>\r\n    -->\r\n\r\n<\/tr>"}';
	}
	function getTongJi_action(){
		global $token;
		//当前帐户
		$manager=$this->bidcms_model('system_user')->get_one(array('and hash=:h',array(':h'=>$token)));
		//申请的分销商数

		echo '{"status":1,"msg":"<div class=\"zh_infor_left\">\r\n    <div class=\"zh_infor_tt\">\r\n        <i class=\"lit_icon mfl\"><\/i>\r\n        <span class=\"itt\"><b>\u5f53\u524d\u8d26\u53f7\uff1a<\/b><\/span>'.$manager['username'].'    <\/div>\r\n    <div class=\"zh_infor_cent\" style=\"margin-top:8px;\">\r\n        <div class=\"zh_infor_item\">\u5206\u9500\u5546\u6570\uff1a<span class=\"red\">0<\/span><\/div>\r\n        <div class=\"zh_infor_item\">\u5f85\u5ba1\u6838\u5206\u9500\u5546\u6570\uff1a<span class=\"red\">0<\/span><\/div>\r\n        <div class=\"zh_infor_item\">\u7533\u8bf7\u63d0\u73b0\u7b14\u6570\uff1a<span class=\"red\">0<\/span> \u7b14<\/div>\r\n        <div class=\"zh_infor_item\">\u5df2\u652f\u51fa\u4f63\u91d1\uff1a<span class=\"red\">0<\/span> \u5143<\/div>\r\n        <div class=\"zh_infor_item\">\u4f63\u91d1\u4f59\u989d\uff1a<span class=\"red\">0<\/span> \u5143<\/div>\r\n        <div class=\"zh_infor_item\">\u5f85\u6536\u76ca\u4f63\u91d1\uff1a<span class=\"red\">0<\/span> \u5143<\/div>\r\n        <div class=\"clear\"><\/div>\r\n    <\/div>\r\n<\/div>\r\n<div class=\"zh_infor_right\">\r\n    <div class=\"zh_infor_tt\">\r\n        <i class=\"lit_icon mfr\"><\/i>\r\n        <span class=\"itt\"><b>\u5e93\u5b58\u63d0\u9192\uff1a<\/b><\/span><a href=\"\/Item\/lists\/item_status\/warn\">\u6709<span class=\"red\">0<\/span>\u4ef6\u5546\u54c1\u5df2\u8fbe\u5230\u8b66\u6212\u5e93\u5b58<\/a>\r\n    <\/div>\r\n    <div class=\"zh_infor_cent\" style=\"margin-top:8px;\">\r\n        <div class=\"zh_infor_item\">\u51fa\u552e\u4e2d\u7684\u5546\u54c1\u6570\uff1a<span class=\"red\">0<\/span><\/div>\r\n        <div class=\"zh_infor_item\">\u4ed3\u5e93\u4e2d\u5546\u54c1\u6570\uff1a<span class=\"red\">0<\/span><\/div>\r\n        <div class=\"zh_infor_item\">\u5df2\u552e\u7f44\u7684\u5546\u54c1\u6570\uff1a<span class=\"red\">0<\/span><\/div>\r\n        <div class=\"clear\"><\/div>\r\n    <\/div>\r\n    <div class=\"zh_infor_cent\">\r\n        <div class=\"zh_infor_item\">\u5f85\u4ed8\u6b3e\u8ba2\u5355\u6570\uff1a<span class=\"red\">0<\/span> \u7b14<\/div>\r\n        <div class=\"zh_infor_item\">\u5f85\u53d1\u8d27\u8ba2\u5355\u6570\uff1a<span class=\"red\">0<\/span> \u7b14<\/div>\r\n        <div class=\"zh_infor_item\">\u5f85\u9000\/\u6362\u8d27\u8ba2\u5355\u6570\uff1a<span class=\"red\">0<\/span> \u7b14<\/div>\r\n        <div class=\"clear\"><\/div>\r\n    <\/div>\r\n<\/div>\r\n<div class=\"clear\"><\/div>"}';
	}
	function getUserPrevMonthPointTopSort_action(){
		echo '{"status":1,"msg":"<table class=\"chart-table\">\r\n    <colgroup>\r\n        <col width=\"9%\">\r\n        <col width=\"41%\">\r\n        <col width=\"30%\">\r\n        <col width=\"20%\">\r\n    <\/colgroup>\r\n    <thead>\r\n    <tr>\r\n        <td><\/td>\r\n        <td>\u6635\u79f0\/\u624b\u673a\u53f7<\/td>\r\n        <td>\u83b7\u5f97\u79ef\u5206<\/td>\r\n        <td>\u6392\u540d<\/td>\r\n    <\/tr>\r\n    <\/thead>\r\n    <tbody>\r\n    <tr><td colspan=\"4\" class=\"txtCenter\">\u6682\u65e0\u4fe1\u606f<\/td><\/tr>\r\n            <\/tbody>\r\n<\/table>"}';
	}
	function getUserCurrentPointTopSort_action(){
		echo '{"status":1,"msg":"<table class=\"chart-table\">\r\n    <colgroup>\r\n        <col width=\"9%\">\r\n        <col width=\"41%\">\r\n        <col width=\"30%\">\r\n        <col width=\"20%\">\r\n    <\/colgroup>\r\n    <thead>\r\n    <tr>\r\n        <td><\/td>\r\n        <td>\u6635\u79f0\/\u624b\u673a\u53f7<\/td>\r\n        <td>\u5f53\u524d\u79ef\u5206<\/td>\r\n        <td>\u6392\u540d<\/td>\r\n    <\/tr>\r\n    <\/thead>\r\n    <tbody>\r\n    <tr><td colspan=\"4\" class=\"txtCenter\">\u6682\u65e0\u4fe1\u606f<\/td><\/tr>\r\n            <\/tbody>\r\n<\/table>"}';
	}
	
}
