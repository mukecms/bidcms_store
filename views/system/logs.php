
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>查看日志 - Bidcms开源电商</title>
    <!-- 线上环境 -->
        <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/component-min.css">    <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/jbox/jbox-min.css">

</head>
<body class="cp-bodybox">
<?php include "views/global_top.php";?>

<div class="container">
    <div class="inner clearfix">
        <div class="content-left fl">
        <?php include "views/global_nav.php";?>
        </div>

        <div class="content-right">
            <h1 class="content-right-title">查看日志<a class="gicon-info-sign gicon_linkother" href="//www.wifenxiao.com/Index/help_show/lm/help/id/221.html" target="_blank"></a></h1>


    <form action="" method="post">
        <div class="tabs clearfix mgt15" style="border:0">
            <input type="text" placeholder="账号" class="input" name="account" value="">
            <input type="text" placeholder="数据ID" class="input mini" name="tb_id" value="">
            <input type="text" placeholder="日志" class="input mini" name="mark" value="">
            <input type="text" autocomplete="off" name="start_time" value="" placeholder="创建时间" class="input Wdate" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd'})">
            <span class="mgr5">至</span>
            <input type="text" autocomplete="off" name="end_time" value="" placeholder="创建时间" class="input Wdate" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd'})">
            <button class="btn btn-primary" style="line-height:26px;"><i class="gicon-search white"></i>查询</button>
        </div>
    </form>
    <div class="tablesWrap mgt10">
        <table class="wxtables">
            <colgroup>
                <col width="7%">
                <col width="15%">
                <col width="15%">
                <col width="18%">
                <col width="15%">
                <col width="15%">
                <col width="15%">
            </colgroup>
            <thead>
            <tr>
                <td>ID</td>
                <td>日志</td>
                <td>账号</td>
                <td>数据ID</td>
                <td>IP</td>
                <td>操作时间</td>
                <td>操作类型</td>
            </tr>
            </thead>
            <tbody>
                            <tr>
                        <td>15158543</td>
                        <td style="word-break:break-all;"><b>编辑店铺信息</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>4001109</b></td>
                        <td><b>218.26.54.207</b></td>
                        <td><b>2017-01-14 00:56:56</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>15158542</td>
                        <td style="word-break:break-all;"><b>编辑店铺信息</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>4001109</b></td>
                        <td><b>218.26.54.207</b></td>
                        <td><b>2017-01-14 00:56:54</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>15158537</td>
                        <td style="word-break:break-all;"><b>编辑店铺信息</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>4001109</b></td>
                        <td><b>218.26.54.207</b></td>
                        <td><b>2017-01-14 00:56:28</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>15158536</td>
                        <td style="word-break:break-all;"><b>编辑店铺信息</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>4001109</b></td>
                        <td><b>218.26.54.207</b></td>
                        <td><b>2017-01-14 00:56:27</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>14964424</td>
                        <td style="word-break:break-all;"><b>添加属性</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>148730</b></td>
                        <td><b>219.157.114.98</b></td>
                        <td><b>2017-01-08 23:45:32</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>14964396</td>
                        <td style="word-break:break-all;"><b>添加属性</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>148729</b></td>
                        <td><b>219.157.114.98</b></td>
                        <td><b>2017-01-08 23:41:44</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>14964388</td>
                        <td style="word-break:break-all;"><b>编辑商品时:add_sku:15110777</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>4483337</b></td>
                        <td><b>219.157.114.74</b></td>
                        <td><b>2017-01-08 23:39:21</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>14964387</td>
                        <td style="word-break:break-all;"><b>编辑商品</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>4483337</b></td>
                        <td><b>219.157.114.74</b></td>
                        <td><b>2017-01-08 23:39:21</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>14964204</td>
                        <td style="word-break:break-all;"><b>编辑商品时:add_sku:15110776</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>4483337</b></td>
                        <td><b>219.157.114.74</b></td>
                        <td><b>2017-01-08 23:19:44</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>14964203</td>
                        <td style="word-break:break-all;"><b>编辑商品</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>4483337</b></td>
                        <td><b>219.157.114.74</b></td>
                        <td><b>2017-01-08 23:19:44</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>14964184</td>
                        <td style="word-break:break-all;"><b>批量上架商品</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>4483337</b></td>
                        <td><b>219.157.114.72</b></td>
                        <td><b>2017-01-08 23:19:07</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>14962167</td>
                        <td style="word-break:break-all;"><b>添加商品</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>4697225</b></td>
                        <td><b>219.157.114.78</b></td>
                        <td><b>2017-01-08 21:18:47</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>14961281</td>
                        <td style="word-break:break-all;"><b>添加属性</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>148701</b></td>
                        <td><b>219.157.114.74</b></td>
                        <td><b>2017-01-08 20:40:44</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>14961280</td>
                        <td style="word-break:break-all;"><b>添加规格</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>12701</b></td>
                        <td><b>219.157.114.74</b></td>
                        <td><b>2017-01-08 20:40:40</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>14961274</td>
                        <td style="word-break:break-all;"><b>添加商品</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>4697214</b></td>
                        <td><b>219.157.114.77</b></td>
                        <td><b>2017-01-08 20:40:24</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>11494010</td>
                        <td style="word-break:break-all;"><b>添加商品详情</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>4517432</b></td>
                        <td><b>218.26.54.87</b></td>
                        <td><b>2016-11-11 22:49:42</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>11494005</td>
                        <td style="word-break:break-all;"><b>编辑商品</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>4455815</b></td>
                        <td><b>218.26.54.87</b></td>
                        <td><b>2016-11-11 22:49:34</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>11288604</td>
                        <td style="word-break:break-all;"><b>创建微杂志</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>4507381</b></td>
                        <td><b>218.26.54.208</b></td>
                        <td><b>2016-11-08 23:25:45</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>11162701</td>
                        <td style="word-break:break-all;"><b>批量上架微杂志</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>4011641</b></td>
                        <td><b>117.136.90.98</b></td>
                        <td><b>2016-11-06 23:51:30</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>11162678</td>
                        <td style="word-break:break-all;"><b>创建微杂志</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>4500395</b></td>
                        <td><b>117.136.90.98</b></td>
                        <td><b>2016-11-06 23:50:02</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>11162674</td>
                        <td style="word-break:break-all;"><b>创建微杂志</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>4500394</b></td>
                        <td><b>117.136.90.98</b></td>
                        <td><b>2016-11-06 23:49:30</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>11130139</td>
                        <td style="word-break:break-all;"><b>删除微杂志分类</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>4003378</b></td>
                        <td><b>117.136.4.112</b></td>
                        <td><b>2016-11-06 01:39:49</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>11130138</td>
                        <td style="word-break:break-all;"><b>创建微杂志分类</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>4003378</b></td>
                        <td><b>117.136.4.112</b></td>
                        <td><b>2016-11-06 01:39:34</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>11130124</td>
                        <td style="word-break:break-all;"><b>创建微杂志分类</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>4003377</b></td>
                        <td><b>117.136.4.112</b></td>
                        <td><b>2016-11-06 01:22:59</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>10967554</td>
                        <td style="word-break:break-all;"><b>编辑商品</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>4483337</b></td>
                        <td><b>223.104.14.67</b></td>
                        <td><b>2016-11-02 23:04:55</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>10967544</td>
                        <td style="word-break:break-all;"><b>添加商品</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>4483337</b></td>
                        <td><b>223.104.14.67</b></td>
                        <td><b>2016-11-02 23:04:25</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>10533119</td>
                        <td style="word-break:break-all;"><b>添加店铺主页模板</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>4465500</b></td>
                        <td><b>223.11.208.177</b></td>
                        <td><b>2016-10-24 23:39:37</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>10532944</td>
                        <td style="word-break:break-all;"><b>添加店铺主页模板</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>4465495</b></td>
                        <td><b>223.11.208.177</b></td>
                        <td><b>2016-10-24 23:32:04</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>10532935</td>
                        <td style="word-break:break-all;"><b>启用模板48</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>48</b></td>
                        <td><b>223.11.208.177</b></td>
                        <td><b>2016-10-24 23:30:38</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>10532918</td>
                        <td style="word-break:break-all;"><b>启用模板50</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>50</b></td>
                        <td><b>223.11.208.177</b></td>
                        <td><b>2016-10-24 23:30:15</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>10532915</td>
                        <td style="word-break:break-all;"><b>添加店铺主页模板</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>4465479</b></td>
                        <td><b>223.11.208.177</b></td>
                        <td><b>2016-10-24 23:30:03</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>10474915</td>
                        <td style="word-break:break-all;"><b>启用模板49</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>49</b></td>
                        <td><b>110.179.98.161</b></td>
                        <td><b>2016-10-23 21:11:58</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>10471263</td>
                        <td style="word-break:break-all;"><b>启用模板50</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>50</b></td>
                        <td><b>110.179.98.161</b></td>
                        <td><b>2016-10-23 18:28:14</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>10468990</td>
                        <td style="word-break:break-all;"><b>恢复店中店下架商品</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>4455815</b></td>
                        <td><b>110.179.98.161</b></td>
                        <td><b>2016-10-23 17:11:58</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>10468985</td>
                        <td style="word-break:break-all;"><b>批量上架商品</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>4455815</b></td>
                        <td><b>110.179.98.161</b></td>
                        <td><b>2016-10-23 17:11:46</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>10468410</td>
                        <td style="word-break:break-all;"><b>编辑商品</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>4455815</b></td>
                        <td><b>110.179.98.161</b></td>
                        <td><b>2016-10-23 16:56:19</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>10464883</td>
                        <td style="word-break:break-all;"><b>添加商品</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>4455815</b></td>
                        <td><b>110.179.98.161</b></td>
                        <td><b>2016-10-23 15:44:57</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>10459046</td>
                        <td style="word-break:break-all;"><b>编辑商品</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>4455297</b></td>
                        <td><b>110.179.98.161</b></td>
                        <td><b>2016-10-23 13:08:42</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>10459033</td>
                        <td style="word-break:break-all;"><b>添加商品</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>4455297</b></td>
                        <td><b>110.179.98.161</b></td>
                        <td><b>2016-10-23 13:08:09</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>10457225</td>
                        <td style="word-break:break-all;"><b>编辑商品</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>4455039</b></td>
                        <td><b>110.179.98.161</b></td>
                        <td><b>2016-10-23 12:00:49</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>10457067</td>
                        <td style="word-break:break-all;"><b>添加商品详情</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>4461242</b></td>
                        <td><b>110.179.98.161</b></td>
                        <td><b>2016-10-23 11:54:52</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>10457058</td>
                        <td style="word-break:break-all;"><b>编辑商品</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>4455039</b></td>
                        <td><b>110.179.98.161</b></td>
                        <td><b>2016-10-23 11:54:33</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>10457054</td>
                        <td style="word-break:break-all;"><b>添加属性</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>83802</b></td>
                        <td><b>110.179.98.161</b></td>
                        <td><b>2016-10-23 11:54:21</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>10456345</td>
                        <td style="word-break:break-all;"><b>添加商品</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>4455039</b></td>
                        <td><b>110.179.98.161</b></td>
                        <td><b>2016-10-23 11:35:35</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>10406688</td>
                        <td style="word-break:break-all;"><b>添加属性</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>83287</b></td>
                        <td><b>1.71.14.3</b></td>
                        <td><b>2016-10-21 21:29:33</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>10406687</td>
                        <td style="word-break:break-all;"><b>添加属性</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>83286</b></td>
                        <td><b>1.71.14.3</b></td>
                        <td><b>2016-10-21 21:29:29</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>10406588</td>
                        <td style="word-break:break-all;"><b>添加属性</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>83283</b></td>
                        <td><b>1.71.14.3</b></td>
                        <td><b>2016-10-21 21:21:22</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>10406396</td>
                        <td style="word-break:break-all;"><b>添加属性</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>83282</b></td>
                        <td><b>1.71.14.3</b></td>
                        <td><b>2016-10-21 21:15:50</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>10406394</td>
                        <td style="word-break:break-all;"><b>添加属性</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>83281</b></td>
                        <td><b>1.71.14.3</b></td>
                        <td><b>2016-10-21 21:15:47</b></td>
                        <td>商家</td>
                    </tr><tr>
                        <td>10406392</td>
                        <td style="word-break:break-all;"><b>添加规格</b></td>
                        <td><b>17090310762</b></td>
                        <td><b>8237</b></td>
                        <td><b>1.71.14.3</b></td>
                        <td><b>2016-10-21 21:15:44</b></td>
                        <td>商家</td>
                    </tr>            </tbody>
        </table>
        <!-- end wxtables -->
        <div class="tables-btmctrl clearfix">
            <div class="fr">
                <div class="paginate">
                    <a href='javascript:;' class='prev disabled'></a><a class='cur'>1</a><a href='/System/logs/p/2.html'>2</a><a href='/System/logs/p/2.html' class='next'></a>                </div>
                <!-- end paginate -->
            </div>
        </div>
        <!-- end tables-btmctrl -->
    </div><!-- 技 -->
    <!-- end tablesWrap -->

        </div>
        <!-- end content-right -->

        <a href="javascript:;" class="btn-leftMenuFold" id="j-btn-leftMenuFold" ></a>
    </div>
</div>
<!-- end container -->

<!--gonggao-->

<!-- end footer -->
    <div class="fixedBar">
        <ul>
            <li class="shopManager21"><a href="javascript:;" data-target="#shop_21">系统设置</a></li><li class="shopManager22"><a href="javascript:;" data-target="#shop_22">域名管理</a></li><li class="shopManager23"><a href="javascript:;" data-target="#shop_23">在线客服</a></li><li class="shopManager24"><a href="javascript:;" data-target="#shop_24">微信设置</a></li><li class="shopManager25"><a href="javascript:;" data-target="#shop_25">素材库</a></li><li class="shopManager26"><a href="javascript:;" data-target="#shop_26">短信</a></li><li class="shopManager27"><a href="javascript:;" data-target="#shop_27">物流管理</a></li><li class="shopManager29"><a href="javascript:;" data-target="#shop_29">系统日志</a></li>        </ul>
        <a href="javascript:;" class="fixedBar-btn" id="j-fixedBar-btn"></a>
    </div><a href="#" id="j-gotop" class="gotop" title="回到顶部"></a>
<!-- end gotop -->


<!--end front template  -->

 <?php include "views/global_footer.php";?>

    <script src="<?php echo SITE_ROOT;?>statics/plugins/My97DatePicker/WdatePicker.js"></script>
    



</body>
</html>
<!-- 20170105 -->
