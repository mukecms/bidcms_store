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
class statistics_controller extends controller
{
	function __construct(){
		$this->models_dir=MODELS_PATH;
		$this->views_dir=VIEWS_PATH;
	}
	function index_action(){
		include $this->bidcms_template('order_chart','views/statistics');
	}
	function coupon_chart_action(){
		include $this->bidcms_template('coupon_chart','views/statistics');
	}
	function point_chart_action(){
		include $this->bidcms_template('point_chart','views/statistics');
	}
	function user_chart_action(){
		include $this->bidcms_template('user_chart','views/statistics');
	}
	function user_attr_chart_action(){
		include $this->bidcms_template('user_attr_chart','views/statistics');
	}
	function user_business_chart_action(){
		include $this->bidcms_template('user_business_chart','views/statistics');
	}
	function province_city_user_action(){
		echo '{"status":1,"data":[]}';
	}
	function user_attr_ajax_chart_action(){
		echo '{"status":1,"data":{"sex":[100,0,0],"region":{"name":["\u5317\u4eac","\u5929\u6d25","\u4e0a\u6d77","\u91cd\u5e86","\u6cb3\u5317","\u6cb3\u5357","\u4e91\u5357","\u8fbd\u5b81","\u9ed1\u9f99\u6c5f","\u6e56\u5357","\u5b89\u5fbd","\u5c71\u4e1c","\u65b0\u7586","\u6c5f\u82cf","\u6d59\u6c5f","\u6c5f\u897f","\u6e56\u5317","\u5e7f\u897f","\u7518\u8083","\u5c71\u897f","\u5185\u8499\u53e4","\u9655\u897f","\u5409\u6797","\u798f\u5efa","\u8d35\u5dde","\u5e7f\u4e1c","\u9752\u6d77","\u897f\u85cf","\u56db\u5ddd","\u5b81\u590f","\u6d77\u5357","\u53f0\u6e7e","\u6fb3\u95e8","\u5357\u6d77\u8bf8\u5c9b","\u672a\u77e5"],"value":[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,2]}}}';
	}
	function coupon_data_count_action(){
		echo '{"status":1,"content":"<tr>\r\n    <td>\r\n        <div class=\"dataItems\">\u603b\u53d1\u653e\u4f18\u60e0\u5238\uff08\u5f20\uff09<\/div>\r\n        <div class=\"dataItems\">\r\n            <span class=\"num1\">0<\/span>\r\n        <\/div>\r\n    <\/td>\r\n    <td>\r\n        <div class=\"dataItems\">\u603b\u4f7f\u7528\u4f18\u60e0\u5238\uff08\u5f20\uff09<\/div>\r\n        <div class=\"dataItems\">\r\n            <span class=\"num1\">0<\/span>\r\n        <\/div>\r\n    <\/td>\r\n<\/tr>"}';
	}
	function coupon_ajax_chart_action(){
		echo '{"status":1,"orderList":{"date":["2017-02-02","2017-02-03","2017-02-04","2017-02-05","2017-02-06","2017-02-07","2017-02-08","2017-02-09","2017-02-10","2017-02-11","2017-02-12","2017-02-13","2017-02-14","2017-02-15","2017-02-16","2017-02-17","2017-02-18","2017-02-19","2017-02-20","2017-02-21","2017-02-22","2017-02-23","2017-02-24","2017-02-25","2017-02-26","2017-02-27","2017-02-28","2017-03-01","2017-03-02","2017-03-03"],"total_coupon":[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],"use_coupon":[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],"total_get_coupon":0,"total_use_coupon":0}}';
	}
	function user_data_count_action(){
		echo '{"status":1,"content":"<tr>\r\n    <td>\r\n        <div class=\"dataItems\">\u4f1a\u5458\u603b\u6570\uff08\u4eba\uff09<\/div>\r\n        <div class=\"dataItems\">\r\n            <span class=\"num1\">2<\/span>\r\n        <\/div>\r\n    <\/td>\r\n    <td>\r\n        <div class=\"dataItems\">\u7c89\u4e1d\u603b\u6570\uff08\u4eba\uff09<\/div>\r\n        <div class=\"dataItems\">\r\n            <span class=\"num1\">0<\/span>\r\n        <\/div>\r\n    <\/td>\r\n    <td>\r\n        <div class=\"dataItems\">\u5206\u9500\u5546\u603b\u6570\uff08\u4eba\uff09<\/div>\r\n        <div class=\"dataItems\">\r\n            <span class=\"num1\">0<\/span>\r\n        <\/div>\r\n    <\/td>\r\n    <td>\r\n        <div class=\"dataItems\">\u4ee3\u7406\u5546\u603b\u6570\uff08\u4eba\uff09<\/div>\r\n        <div class=\"dataItems\">\r\n            <span class=\"num1\">0<\/span>\r\n        <\/div>\r\n    <\/td>\r\n\r\n    <td>\r\n        <div class=\"dataItems\">\u672c\u6708\u65b0\u589e\u4f1a\u5458\u6570\uff08\u4eba\uff09<\/div>\r\n        <div class=\"dataItems\">\r\n            <span class=\"num1\">0<\/span>\r\n        <\/div>\r\n    <\/td>\r\n\r\n    <td>\r\n        <div class=\"dataItems\">\u672c\u6708\u65b0\u589e\u7c89\u4e1d\u6570\uff08\u4eba\uff09<\/div>\r\n        <div class=\"dataItems\">\r\n            <span class=\"num1\">0<\/span>\r\n        <\/div>\r\n    <\/td>\r\n\r\n    <td>\r\n        <div class=\"dataItems\">\u672c\u6708\u65b0\u589e\u5206\u9500\u5546\u6570\uff08\u4eba\uff09<\/div>\r\n        <div class=\"dataItems\">\r\n            <span class=\"num1\">0<\/span>\r\n        <\/div>\r\n    <\/td>\r\n<\/tr>"}';
	}
	
	function last_user_data_count_action(){
		echo '{"status":1,"content":"<tr>\r\n    <td>\r\n        <div class=\"dataItems\">\u4e0a\u6708\u65b0\u589e\u4f1a\u5458\u6570\uff08\u4eba\uff09<\/div>\r\n        <div class=\"dataItems\">\r\n            <span class=\"num1\">0<\/span>\r\n        <\/div>\r\n        <div class=\"dataItems\">\u73af\u6bd4\u589e\u5e45\r\n            <span class=\"num2 data-lower\">100% <i class=\"icon-tablesData\"><\/i>\r\n            <\/span>\r\n        <\/div>\r\n    <\/td>\r\n    <td>\r\n        <div class=\"dataItems\">\u4e0a\u6708\u65b0\u589e\u7c89\u4e1d\u6570\uff08\u4eba\uff09<\/div>\r\n        <div class=\"dataItems\">\r\n            <span class=\"num1\">0<\/span>\r\n        <\/div>\r\n        <div class=\"dataItems\">\u73af\u6bd4\u589e\u5e45\r\n            <span class=\"num2 data-rise\">0% <i class=\"icon-tablesData\"><\/i>\r\n            <\/span>\r\n        <\/div>\r\n    <\/td>\r\n    <td>\r\n        <div class=\"dataItems\">\u4e0a\u6708\u65b0\u589e\u5206\u9500\u5546\u6570\uff08\u4eba\uff09<\/div>\r\n        <div class=\"dataItems\">\r\n            <span class=\"num1\">0<\/span>\r\n        <\/div>\r\n        <div class=\"dataItems\">\u73af\u6bd4\u589e\u5e45\r\n            <span class=\"num2 data-rise\">0% <i class=\"icon-tablesData\"><\/i>\r\n            <\/span>\r\n        <\/div>\r\n    <\/td>\r\n    <td>\r\n        <div class=\"dataItems\">\u4e0a\u6708\u65b0\u589e\u4f9b\u5e94\u5546\u6570\uff08\u4eba\uff09<\/div>\r\n        <div class=\"dataItems\">\r\n            <span class=\"num1\">0<\/span>\r\n        <\/div>\r\n        <div class=\"dataItems\">\u73af\u6bd4\u589e\u5e45\r\n            <span class=\"num2 data-rise\">0% <i class=\"icon-tablesData\"><\/i>\r\n            <\/span>\r\n        <\/div>\r\n    <\/td>\r\n<\/tr>"}';
	}
	function user_pie_data_action(){
		echo '{"status":1,"data":{"fans_per":0,"fans_per_other":100,"agent_per":0,"agent_per_other":100,"dls_per":0,"dls_per_other":100,"buy_per":0,"buy_per_other":100,"buys_per":0,"buys_per_other":100,"buyss_per":0,"buyss_per_other":100}}';
	}
	
	function user_ajax_chart_action(){
		echo '{"status":1,"orderList":{"date":["2017-02-02","2017-02-03","2017-02-04","2017-02-05","2017-02-06","2017-02-07","2017-02-08","2017-02-09","2017-02-10","2017-02-11","2017-02-12","2017-02-13","2017-02-14","2017-02-15","2017-02-16","2017-02-17","2017-02-18","2017-02-19","2017-02-20","2017-02-21","2017-02-22","2017-02-23","2017-02-24","2017-02-25","2017-02-26","2017-02-27","2017-02-28","2017-03-01","2017-03-02","2017-03-03"],"new_user":[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],"new_pub":[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],"new_agent":[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]}}';
	}
	
	
	function get_order_count_action(){
		echo '{"status":1,"content":"<tr>\r\n<td>\r\n<div class=\"dataItems\">\u603b\u8ba1\u8ba2\u5355\uff08\u7b14\uff09<\/div>\r\n<div class=\"dataItems\">\r\n<span class=\"num1\">0<\/span>\r\n<\/div>\r\n<\/td>\r\n<td>\r\n<div class=\"dataItems\">\u603b\u6d88\u8d39\u91d1\u989d\uff08\u5143\uff09<\/div>\r\n<div class=\"dataItems\">\r\n<span class=\"num1\">0<\/span>\r\n<\/div>\r\n<\/td>\r\n\r\n<td>\r\n<div class=\"dataItems\">\u672c\u6708\u8ba2\u5355\uff08\u7b14\uff09<\/div>\r\n<div class=\"dataItems\">\r\n<span class=\"num1\">0<\/span>\r\n<\/div>\r\n<\/td>\r\n<td>\r\n<div class=\"dataItems\">\u672c\u6708\u6d88\u8d39\u91d1\u989d\uff08\u5143\uff09<\/div>\r\n<div class=\"dataItems\">\r\n<!--<span class=\"num1\">0<\/span>-->\r\n<span class=\"num1\">0<\/span>\r\n<\/div>\r\n<\/td>\r\n\r\n<\/tr>"}';
	}
	function get_history_order_count_action(){
		echo '{"status":1,"content":"<tr>\r\n<td>\r\n<div class=\"dataItems\">\u4e0a\u6708\u8ba2\u5355\uff08\u7b14\uff09<\/div>\r\n<div class=\"dataItems\">\r\n<span class=\"num1\">0<\/span>\r\n<\/div>\r\n<div class=\"dataItems\">\u73af\u6bd4\u589e\u5e45\r\n<span class=\"num2 data-rise\">0% <i class=\"icon-tablesData\"><\/i>\r\n<\/span>\r\n<\/div>\r\n<\/td>\r\n<td>\r\n<div class=\"dataItems\">\u4e0a\u6708\u8ba2\u5355\u91d1\u989d\uff08\u5143\uff09<\/div>\r\n<div class=\"dataItems\">\r\n<span class=\"num1\">0<\/span>\r\n<\/div>\r\n<div class=\"dataItems\">\u73af\u6bd4\u589e\u5e45\r\n<span class=\"num2 data-rise\">0% <i class=\"icon-tablesData\"><\/i>\r\n<\/span>\r\n<\/div>\r\n<\/td>\r\n<td>\r\n<div class=\"dataItems\">\u4e0a\u6708\u6210\u4ea4\u8ba2\u5355\uff08\u7b14\uff09<\/div>\r\n<div class=\"dataItems\">\r\n<span class=\"num1\">0<\/span>\r\n<\/div>\r\n<div class=\"dataItems\">\u73af\u6bd4\u589e\u5e45\r\n<span class=\"num2 data-rise\">0% <i class=\"icon-tablesData\"><\/i>\r\n<\/span>\r\n<\/div>\r\n<\/td>\r\n<td>\r\n<div class=\"dataItems\">\u4e0a\u6708\u6210\u4ea4\u91d1\u989d\uff08\u5143\uff09<\/div>\r\n<div class=\"dataItems\">\r\n<span class=\"num1\">0<\/span>\r\n<\/div>\r\n<div class=\"dataItems\">\u73af\u6bd4\u589e\u5e45\r\n<span class=\"num2 data-rise\">0% <i class=\"icon-tablesData\"><\/i>\r\n<\/span>\r\n<\/div>\r\n<\/td>\r\n<\/tr>"}';
	}
	function get_order_chart_action(){
		echo '{"status":1,"orderList":{"date":["2016-12-27","2016-12-28","2016-12-29","2016-12-30","2016-12-31","2017-01-01","2017-01-02","2017-01-03","2017-01-04","2017-01-05","2017-01-06","2017-01-07","2017-01-08","2017-01-09","2017-01-10","2017-01-11","2017-01-12","2017-01-13","2017-01-14","2017-01-15","2017-01-16","2017-01-17","2017-01-18","2017-01-19","2017-01-20","2017-01-21","2017-01-22","2017-01-23","2017-01-24","2017-01-25"],"order_num":[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],"payment_num":[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],"pay_order_num":[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],"pay_payment_num":[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],"total_num":0,"total_money":0,"total_pay_num":0,"total_pay_money":0}}';
	}
	function point_data_count_action(){
		echo '{"status":1,"content":"<tr>\r\n    <td>\r\n        <div class=\"dataItems\">\u603b\u79ef\u5206\uff08\u4e2a\uff09<\/div>\r\n        <div class=\"dataItems\">\r\n            <span class=\"num1\">10<\/span>\r\n        <\/div>\r\n    <\/td>\r\n    <td>\r\n        <div class=\"dataItems\">\u5df2\u4f7f\u7528\u79ef\u5206\uff08\u4e2a\uff09<\/div>\r\n        <div class=\"dataItems\">\r\n            <span class=\"num1\"><\/span>\r\n        <\/div>\r\n    <\/td>\r\n    <td>\r\n        <div class=\"dataItems\">\u672a\u4f7f\u7528\u79ef\u5206\uff08\u4e2a\uff09<\/div>\r\n        <div class=\"dataItems\">\r\n            <span class=\"num1\">10<\/span>\r\n        <\/div>\r\n    <\/td>\r\n<\/tr>"}';
	}
	function point_ajax_chart_action(){
		echo '{"status":1,"orderList":{"date":["2017-02-02","2017-02-03","2017-02-04","2017-02-05","2017-02-06","2017-02-07","2017-02-08","2017-02-09","2017-02-10","2017-02-11","2017-02-12","2017-02-13","2017-02-14","2017-02-15","2017-02-16","2017-02-17","2017-02-18","2017-02-19","2017-02-20","2017-02-21","2017-02-22","2017-02-23","2017-02-24","2017-02-25","2017-02-26","2017-02-27","2017-02-28","2017-03-01","2017-03-02","2017-03-03"],"use_point":[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],"total_point":[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],"total_add_point":0,"total_use_point":0}}';
	}
	function user_data_commission_action(){
		echo '{"status":1,"content":"<tr>\r\n    <td>\r\n        <div class=\"dataItems\">\u4f1a\u5458\u603b\u4f59\u989d\uff08\u5143\uff09<\/div>\r\n        <div class=\"dataItems\">\r\n            <span class=\"num1\">0.00<\/span>\r\n        <\/div>\r\n    <\/td>\r\n    <td>\r\n        <div class=\"dataItems\">\u5206\u9500\u5546\u603b\u4f63\u91d1\uff08\u5143\uff09<\/div>\r\n        <div class=\"dataItems\">\r\n            <span class=\"num1\">0<\/span>\r\n        <\/div>\r\n    <\/td>\r\n    <td>\r\n        <div class=\"dataItems\">\u5206\u9500\u5546\u603b\u4f63\u91d1\u4f59\u989d\uff08\u5143\uff09<\/div>\r\n        <div class=\"dataItems\">\r\n            <span class=\"num1\">0<\/span>\r\n        <\/div>\r\n    <\/td>\r\n    <td>\r\n        <div class=\"dataItems\">\u5206\u9500\u5546\u603b\u63d0\u73b0\u4f63\u91d1\uff08\u5143\uff09<\/div>\r\n        <div class=\"dataItems\">\r\n            <span class=\"num1\">0<\/span>\r\n        <\/div>\r\n    <\/td>\r\n\r\n    <td>\r\n        <div class=\"dataItems\">\u672c\u6708\u5206\u9500\u5546\u4e1a\u52a1\u4f63\u91d1\uff08\u5143\uff09<\/div>\r\n        <div class=\"dataItems\">\r\n            <span class=\"num1\">0<\/span>\r\n        <\/div>\r\n    <\/td>\r\n    <td>\r\n        <div class=\"dataItems\">\u672c\u6708\u5206\u9500\u5546\u4f63\u91d1\u63d0\u73b0\u91d1\u989d\uff08\u5143\uff09<\/div>\r\n        <div class=\"dataItems\">\r\n            <span class=\"num1\">0<\/span>\r\n        <\/div>\r\n    <\/td>\r\n\r\n    \r\n<\/tr>\r\n"}';
	}
	function agent_data_order_action(){
		echo '{"status":1,"content":"<tr>\r\n    <td>\r\n        <div class=\"dataItems\">\u672c\u6708\u6709\u4e1a\u52a1\u7684\u5206\u9500\u5546\u6570\uff08\u4eba\uff09<\/div>\r\n        <div class=\"dataItems\">\r\n            <span class=\"num1\">0<\/span>\r\n        <\/div>\r\n    <\/td>\r\n    <td>\r\n        <div class=\"dataItems\">\u672c\u6708\u5df2\u63d0\u73b0\u7684\u5206\u9500\u5546\u6570\uff08\u4eba\uff09<\/div>\r\n        <div class=\"dataItems\">\r\n            <span class=\"num1\">0<\/span>\r\n        <\/div>\r\n    <\/td>\r\n    <\/tr>"}';
	}
	function last_user_data_commission_action(){
		echo '{"status":1,"content":"<tr>\r\n    <td>\r\n        <div class=\"dataItems\">\u4e0a\u6708\u5206\u9500\u5546\u4e1a\u52a1\u4f63\u91d1\uff08\u5143\uff09<\/div>\r\n        <div class=\"dataItems\">\r\n            <span class=\"num1\">0<\/span>\r\n        <\/div>\r\n        <div class=\"dataItems\">\u73af\u6bd4\u589e\u5e45\r\n            <span class=\"num2 data-rise\">0% <i class=\"icon-tablesData\"><\/i>\r\n            <\/span>\r\n        <\/div>\r\n    <\/td>\r\n    <td>\r\n        <div class=\"dataItems\">\u4e0a\u6708\u5206\u9500\u5546\u4f63\u91d1\u63d0\u73b0\u91d1\u989d\uff08\u5143\uff09<\/div>\r\n        <div class=\"dataItems\">\r\n            <span class=\"num1\">0<\/span>\r\n        <\/div>\r\n        <div class=\"dataItems\">\u73af\u6bd4\u589e\u5e45\r\n            <span class=\"num2 data-rise\">0% <i class=\"icon-tablesData\"><\/i>\r\n            <\/span>\r\n        <\/div>\r\n    <\/td>\r\n    <\/tr>"}';
	}
	function last_agent_data_order_action(){
		echo '{"status":1,"content":"<tr>\r\n    <td>\r\n        <div class=\"dataItems\">\u4e0a\u6708\u6709\u4e1a\u52a1\u7684\u5206\u9500\u5546\u6570\uff08\u4eba\uff09<\/div>\r\n        <div class=\"dataItems\">\r\n            <span class=\"num1\">0<\/span>\r\n        <\/div>\r\n        <div class=\"dataItems\">\u73af\u6bd4\u589e\u5e45\r\n            <span class=\"num2 data-rise\">0% <i class=\"icon-tablesData\"><\/i>\r\n            <\/span>\r\n        <\/div>\r\n    <\/td>\r\n    <td>\r\n        <div class=\"dataItems\">\u4e0a\u6708\u5df2\u63d0\u73b0\u7684\u5206\u9500\u5546\u6570\uff08\u4eba\uff09<\/div>\r\n        <div class=\"dataItems\">\r\n            <span class=\"num1\">0<\/span>\r\n        <\/div>\r\n        <div class=\"dataItems\">\u73af\u6bd4\u589e\u5e45\r\n            <span class=\"num2 data-rise\">0% <i class=\"icon-tablesData\"><\/i>\r\n            <\/span>\r\n        <\/div>\r\n    <\/td>\r\n    <\/tr>"}';
	}
	function user_most_buy_num_top_action(){
		echo '{"status":1,"content":"<table class=\"chart-table\">\r\n    <colgroup>\r\n        <col width=\"10%\">\r\n        <col width=\"20%\">\r\n        <col width=\"20%\">\r\n        <col width=\"20%\">\r\n    <\/colgroup>\r\n    <thead>\r\n    <tr>\r\n        <td class=\"txtCenter\">\u6392\u540d<\/td>\r\n        <td>\u6635\u79f0\/\u624b\u673a<\/td>\r\n        <td>\u8d2d\u7269\u6b21\u6570<\/td>\r\n        <td>\u6ce8\u518c\u65f6\u95f4<\/td>\r\n    <\/tr>\r\n    <\/thead>\r\n    <tbody>\r\n    <tr><td colspan=\"4\" class=\"txtCenter\">\u6682\u65e0\u4fe1\u606f<\/td><\/tr>\r\n        <\/tbody>\r\n<\/table>"}';
	}
	function user_most_buy_price_top_action(){
		echo '{"status":1,"content":"<table class=\"chart-table\">\r\n    <colgroup>\r\n        <col width=\"10%\">\r\n        <col width=\"20%\">\r\n        <col width=\"20%\">\r\n        <col width=\"20%\">\r\n    <\/colgroup>\r\n    <thead>\r\n    <tr>\r\n        <td class=\"txtCenter\">\u6392\u540d<\/td>\r\n        <td>\u6635\u79f0\/\u624b\u673a<\/td>\r\n        <td>\u8d2d\u7269\u91d1\u989d<\/td>\r\n        <td>\u6ce8\u518c\u65f6\u95f4<\/td>\r\n    <\/tr>\r\n    <\/thead>\r\n    <tbody>\r\n    <tr><td colspan=\"4\" class=\"txtCenter\">\u6682\u65e0\u4fe1\u606f<\/td><\/tr>\r\n        <\/tbody>\r\n<\/table>"}';
	}
	function user_most_point_top_action(){
		echo '{"status":1,"content":"<table class=\"chart-table\">\r\n    <colgroup>\r\n        <col width=\"10%\">\r\n        <col width=\"20%\">\r\n        <col width=\"20%\">\r\n        <col width=\"20%\">\r\n    <\/colgroup>\r\n    <thead>\r\n    <tr>\r\n        <td class=\"txtCenter\">\u6392\u540d<\/td>\r\n        <td>\u6635\u79f0\/\u624b\u673a<\/td>\r\n        <td>\u4f1a\u5458\u79ef\u5206<\/td>\r\n        <td>\u6ce8\u518c\u65f6\u95f4<\/td>\r\n    <\/tr>\r\n    <\/thead>\r\n    <tbody>\r\n            <tr>\r\n                <td class=\"txtCenter\">1<\/td>\r\n                <td><a href=\"\/User\/detail\/id\/22157718.html\" target=\"_blank\">17090310762<\/a><\/td>\r\n                <td>10<\/td>\r\n                <td>2016-07-29<\/td>\r\n            <\/tr><tr>\r\n                <td class=\"txtCenter\">2<\/td>\r\n                <td><a href=\"\/User\/detail\/id\/27020622.html\" target=\"_blank\">13720984421<\/a><\/td>\r\n                <td><\/td>\r\n                <td>2017-01-14<\/td>\r\n            <\/tr>    <\/tbody>\r\n<\/table>"}';
	}
	function user_balance_top_action(){
		echo '{"status":1,"content":"<table class=\"chart-table\">\r\n    <colgroup>\r\n        <col width=\"10%\">\r\n        <col width=\"20%\">\r\n        <col width=\"20%\">\r\n        <col width=\"20%\">\r\n    <\/colgroup>\r\n    <thead>\r\n    <tr>\r\n        <td class=\"txtCenter\">\u6392\u540d<\/td>\r\n        <td>\u6635\u79f0\/\u624b\u673a<\/td>\r\n        <td>\u4f1a\u5458\u4f59\u989d<\/td>\r\n        <td>\u6ce8\u518c\u65f6\u95f4<\/td>\r\n    <\/tr>\r\n    <\/thead>\r\n    <tbody>\r\n            <tr>\r\n                <td class=\"txtCenter\">1<\/td>\r\n                <td><a href=\"\/User\/detail\/id\/22157718.html\" target=\"_blank\">17090310762<\/a><\/td>\r\n                <td>0.00<\/td>\r\n                <td>2016-07-29<\/td>\r\n            <\/tr><tr>\r\n                <td class=\"txtCenter\">2<\/td>\r\n                <td><a href=\"\/User\/detail\/id\/27020622.html\" target=\"_blank\">13720984421<\/a><\/td>\r\n                <td>0.00<\/td>\r\n                <td>2017-01-14<\/td>\r\n            <\/tr>    <\/tbody>\r\n<\/table>"}';
	}
	function user_agent_commission_top_action(){
		echo '{"status":1,"content":"<table class=\"chart-table\">\r\n    <colgroup>\r\n        <col width=\"10%\">\r\n        <col width=\"20%\">\r\n        <col width=\"20%\">\r\n        <col width=\"20%\">\r\n    <\/colgroup>\r\n    <thead>\r\n    <tr>\r\n        <td class=\"txtCenter\">\u6392\u540d<\/td>\r\n        <td>\u6635\u79f0\/\u624b\u673a<\/td>\r\n        <td>\u4f63\u91d1<\/td>\r\n        <td>\u6ce8\u518c\u65f6\u95f4<\/td>\r\n    <\/tr>\r\n    <\/thead>\r\n    <tbody>\r\n    <tr><td colspan=\"4\" class=\"txtCenter\">\u6682\u65e0\u4fe1\u606f<\/td><\/tr>\r\n        <\/tbody>\r\n<\/table>"}';
	}
	function user_left_commission_top_action(){
		echo '{"status":1,"content":"<table class=\"chart-table\">\r\n    <colgroup>\r\n        <col width=\"10%\">\r\n        <col width=\"20%\">\r\n        <col width=\"20%\">\r\n        <col width=\"20%\">\r\n    <\/colgroup>\r\n    <thead>\r\n    <tr>\r\n        <td class=\"txtCenter\">\u6392\u540d<\/td>\r\n        <td>\u6635\u79f0\/\u624b\u673a<\/td>\r\n        <td>\u4f63\u91d1\u4f59\u989d<\/td>\r\n        <td>\u6ce8\u518c\u65f6\u95f4<\/td>\r\n    <\/tr>\r\n    <\/thead>\r\n    <tbody>\r\n    <tr><td colspan=\"4\" class=\"txtCenter\">\u6682\u65e0\u4fe1\u606f<\/td><\/tr>\r\n        <\/tbody>\r\n<\/table>"}';
	}
	function user_tx_price_top_action(){
		echo '{"status":1,"content":"<table class=\"chart-table\">\r\n    <colgroup>\r\n        <col width=\"10%\">\r\n        <col width=\"20%\">\r\n        <col width=\"20%\">\r\n        <col width=\"20%\">\r\n    <\/colgroup>\r\n    <thead>\r\n    <tr>\r\n        <td class=\"txtCenter\">\u6392\u540d<\/td>\r\n        <td>\u6635\u79f0\/\u624b\u673a<\/td>\r\n        <td>\u63d0\u73b0\u4f63\u91d1<\/td>\r\n        <td>\u6ce8\u518c\u65f6\u95f4<\/td>\r\n    <\/tr>\r\n    <\/thead>\r\n    <tbody>\r\n    <tr><td colspan=\"4\" class=\"txtCenter\">\u6682\u65e0\u4fe1\u606f<\/td><\/tr>\r\n        <\/tbody>\r\n<\/table>"}';
	}
	function user_consume_top_action(){
		echo '{"status":1,"content":"<table class=\"chart-table\">\r\n    <colgroup>\r\n        <col width=\"10%\">\r\n        <col width=\"20%\">\r\n        <col width=\"20%\">\r\n        <col width=\"20%\">\r\n    <\/colgroup>\r\n    <thead>\r\n    <tr>\r\n        <td class=\"txtCenter\">\u6392\u540d<\/td>\r\n        <td>\u6635\u79f0\/\u624b\u673a<\/td>\r\n        <td>\u6d88\u8d39\u91d1\u989d<\/td>\r\n        <td>\u6ce8\u518c\u65f6\u95f4<\/td>\r\n    <\/tr>\r\n    <\/thead>\r\n    <tbody>\r\n    <tr><td colspan=\"4\" class=\"txtCenter\">\u6682\u65e0\u4fe1\u606f<\/td><\/tr>\r\n            <\/tbody>\r\n<\/table>"}';
	}
	function user_business_ajax_chart_action(){
		echo '{"status":1,"orderList":{"date":["2017-02-02","2017-02-03","2017-02-04","2017-02-05","2017-02-06","2017-02-07","2017-02-08","2017-02-09","2017-02-10","2017-02-11","2017-02-12","2017-02-13","2017-02-14","2017-02-15","2017-02-16","2017-02-17","2017-02-18","2017-02-19","2017-02-20","2017-02-21","2017-02-22","2017-02-23","2017-02-24","2017-02-25","2017-02-26","2017-02-27","2017-02-28","2017-03-01","2017-03-02","2017-03-03"],"have_order_num":[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],"have_order_agent":[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],"have_tx_agent":[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],"have_commission_agent":[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],"have_tx_commission_dls":[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]}}';
	}
}