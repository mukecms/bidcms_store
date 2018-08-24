<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>发布商品 - Bidcms开源电商</title>
    <!-- 线上环境 -->
        <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/component-min.css">
        <link rel="stylesheet" href="statics/plugins/jbox/jbox-min.css">

    <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/Item/add.css">
    <style type="text/css">
        .used-button-focused .used-button-inner-box,
        .used-button-focused .used-button-outer-box,
        .used-button-hover .used-button-inner-box,
        .used-button-hover .used-button-outer-box,
        .used-menu-buttonmenu-button-open .used-button-inner-box,
        .used-menu-buttonmenu-button-open .used-button-outer-box {
            border-color: #ffad33!important;
        }
        .lastused-category {
            height: 26px;
            margin: 15px 0;
            position:relative;
        }
        .lastused-category label {
            color: #f60;
        }
        .used-button {
            margin: 2px;
            border: 0;
            padding: 0;
            text-decoration: none;
            list-style: none;
            vertical-align: middle;
            cursor: default;
            outline: 0;
            background-color: #FFF;
            line-height: 18px;
            display: inline-block;
        }
        .used-button-outer-box {
            margin: 0;
            border-width: 1px 0;
            padding: 0;
        }
        .used-button-inner-box, .used-button-outer-box {
            border-style: solid;
            border-color: #8ab6dd;
            vertical-align: top;
        }
        .used-button-inner-box {
            -moz-box-orient: vertical;
            border-width: 0 1px;
            white-space: nowrap;
        }
        .used-menu-button-caption {
            padding-right: 4px;
            vertical-align: top;
            margin: 0 4px;
            width: 287px;
            position: relative;
            display: -moz-inline-box;
            display: inline-block;
        }
        .used-menu-button-dropdown {
            height: 20px;
            width: 20px;
            background: url(statics/images/dropdown.png) -1px -1px no-repeat;
            vertical-align: top;
            position: relative;
            display: -moz-inline-box;
            display: inline-block;
        }
        .used-button-focused .used-menu-button-dropdown,
        .used-button-hover .used-menu-button-dropdown,
        .used-menu-buttonmenu-button-open .used-menu-button-dropdown {
            background-position: -1px -23px;
        }
        .used-button-hover .used-menu-button-dropdown,
        .used-menu-buttonmenu-button-open .used-menu-button-dropdown {
            border-color: #ffad33;
        }

        .used-menu {
            background: #fff;
            border: 1px solid #ffad33;
            cursor: default;
            margin: 0;
            outline: 0;
            padding: 4px 0;
            position: absolute;
            z-index: 20000;
        }
        .used-menuitem {
            list-style: none;
            margin: 0;
            padding: 4px;
            white-space: nowrap;
            overflow: hidden;
        }
        .used-menuitem-content {
            font: 400 13px Arial,sans-serif;
        }
        .used-menu .even {
            background-color: #eee;
        }
        .used-menuitem-highlight, .used-menuitem-hover {
            background-color: #ffefd6!important;
            border: 1px solid #ffe0b2;
            padding-bottom: 3px;
            padding-top: 3px;
        }
        .used-popupmenu{
            left: 113px;
            top: 24px;
            z-index: 9999;
            width: 323px;
            display:none;
        }

    </style>

</head>
<body class="cp-bodybox">
<?php include "views/global_top.php";?>

<div class="container">
    <div class="inner clearfix">
        <div class="content-left fl">
        <?php include "views/global_nav.php";?>
		</div>
        <!-- end content-left -->

        <div class="content-right">
            <h1 class="content-right-title">发布商品<a class="gicon-info-sign gicon_linkother" href="//www.wifenxiao.com/Index/help_show/lm/help/id/39.html" target="_blank"></a></h1>


    <form action="index.php" method="get" id="formAdd">
	<input type="hidden" name="con" value="goods">
	<input type="hidden" name="act" value="add_step2">
	<ul class="wizard">
        <li class="wizard-item process">
            <dl class="wizard-item-content">
                <dt class="wizard-ic-step">
                    <span class="wizard-icstp-num">1</span>
                    <span class="wizard-icstp-title">选择商品类目</span>
                </dt>
                <dd class="wizard-ic-desc"></dd>
            </dl>
        </li>
        <li class="wizard-item">
            <dl class="wizard-item-content">
                <dt class="wizard-ic-step">
                    <span class="wizard-icstp-num">2</span>
                    <span class="wizard-icstp-title">编辑商品信息</span>
                </dt>
                <dd class="wizard-ic-desc"></dd>
            </dl>
        </li>
        <li class="wizard-item">
            <dl class="wizard-item-content">
                <dt class="wizard-ic-step">
                    <span class="wizard-icstp-num">3</span>
                    <span class="wizard-icstp-title">编辑商品详情</span>
                </dt>
            </dl>
        </li>
    </ul>
    <div class="panel-single panel-single-light mgt20">
        <div class="mgt15 cat_2">
            <div class="lastused-category mgt15">
                <label for="J_CateLastUsed">您最近使用的类目：</label>
                <div class="used-button used-select">
                    <div class="used-contentbox used-button-outer-box">
                        <div class="used-button-inner-box">
                            <div class="used-menu-button-caption">请选择</div>
                            <div class="used-menu-button-dropdown">&nbsp;</div>
                        </div>
                    </div>
                </div>
                <div class="used-popupmenu used-menu">
                    <div class="used-contentbox js-used-contentbox">
                        <div class="used-option used-menuitem">
                            <div class="used-contentbox  used-menuitem-content">请选择</div>
                        </div>
                                              <!--  <div class="used-option used-menuitem">
                            <div class="used-contentbox  used-menuitem-content">箱包皮具/热销女包/男包&gt;&gt;女士包袋2</div>
                        </div>
                        <div class="even used-option used-menuitem">
                            <div class="used-contentbox  used-menuitem-content">箱包皮具/热销女包/男包&gt;&gt;女士包袋3</div>
                        </div>-->
                    </div>
                </div>
            </div>
            <div class="cate-container">
                <div class="cate-main">
                    <div id="cate-cascading">
                        <div class="cc-listwrap">
                         <ol id="J_OlCascadingList" class="cc-list">
								<li class="cc-list-item J-all-list-item" tabindex="-1">
									<div class="cc-cbox-filter">
										<input type="text" autocomplete="off" class="J-input-search input-search" placeholder="输入名称/拼音首字母">
									</div>
									<div role="tree" class="cc-tree">
										<ul role="listbox" tabindex="-1" hidefocus="-1" unselectable="on" class="cc-tree-cont">
										<li class="cc-tree-group  cc-tree-expanded" data-expanded="true">
										<div class="cc-tree-gname J-first-cat">游戏话费</div>
										<ul class="cc-tree-gcont" role="group">
											<li data-cat_id="40" data-spell="txqqzq" class="J-catname cc-tree-item cc-hasChild-item">腾讯QQ专区</li><li data-cat_id="99" data-spell="wlyxdk" class="J-catname cc-tree-item cc-hasChild-item">网络游戏点卡</li><li data-cat_id="50011665" data-spell="wyzb yxb zh dl" class="J-catname cc-tree-item cc-hasChild-item">网游装备/游戏币/帐号/代练</li><li data-cat_id="50016891" data-spell="yxwpjypt" class="J-catname cc-tree-item cc-hasChild-item">游戏物品交易平台</li>
										</ul>
								</li>
								<li class="cc-tree-group  cc-tree-expanded" data-expanded="true">
										<div class="cc-tree-gname J-first-cat">文化玩乐</div>
										<ul class="cc-tree-gcont" role="group">
											<li data-cat_id="29" data-spell="cw cwspjyp" class="J-catname cc-tree-item cc-hasChild-item">宠物/宠物食品及用品</li><li data-cat_id="50025707" data-spell="djxl qzsg lyfw" class="J-catname cc-tree-item cc-hasChild-item">度假线路/签证送关/旅游服务</li><li data-cat_id="23" data-spell="gd yb zh sc" class="J-catname cc-tree-item cc-hasChild-item">古董/邮币/字画/收藏</li><li data-cat_id="50454031" data-spell="jdmp sjyc ztly" class="J-catname cc-tree-item cc-hasChild-item">景点门票/实景演出/主题乐园</li><li data-cat_id="50014442" data-spell="jtp" class="J-catname cc-tree-item cc-hasChild-item">交通票</li><li data-cat_id="50017300" data-spell="lq jt gq pj" class="J-catname cc-tree-item cc-hasChild-item">乐器/吉他/钢琴/配件</li><li data-cat_id="33" data-spell="sj zz bz" class="J-catname cc-tree-item cc-hasChild-item">书籍/杂志/报纸</li><li data-cat_id="50011949" data-spell="tjjd tskz gylg" class="J-catname cc-tree-item cc-hasChild-item">特价酒店/特色客栈/公寓旅馆</li><li data-cat_id="34" data-spell="yl ys mx yx" class="J-catname cc-tree-item cc-hasChild-item">音乐/影视/明星/音像</li>
										</ul>
								</li>
								<li class="cc-tree-group  cc-tree-expanded" data-expanded="true">
										<div class="cc-tree-gname J-first-cat">生活服务</div>
										<ul class="cc-tree-gcont" role="group">
											<li data-cat_id="124254004" data-spell="" class="J-catname cc-tree-item ">智能电脑硬件</li><li data-cat_id="50025111" data-spell="bdhshfw" class="J-catname cc-tree-item cc-hasChild-item">本地化生活服务</li><li data-cat_id="120950001" data-spell="bxfx" class="J-catname cc-tree-item cc-hasChild-item">保险分销</li><li data-cat_id="50019095" data-spell="csk scgwk" class="J-catname cc-tree-item cc-hasChild-item">超市卡/商场购物卡</li><li data-cat_id="50008075" data-spell="cyms" class="J-catname cc-tree-item cc-hasChild-item">餐饮美食</li><li data-cat_id="50025110" data-spell="dy yc tyss" class="J-catname cc-tree-item cc-hasChild-item">电影/演出/体育赛事</li><li data-cat_id="50023575" data-spell="fc zf xf esf wtfw" class="J-catname cc-tree-item cc-hasChild-item">房产/租房/新房/二手房/委托服务</li><li data-cat_id="50488001" data-spell="fwsc" class="J-catname cc-tree-item cc-hasChild-item">服务市场</li><li data-cat_id="50026555" data-spell="gwthq dgmb" class="J-catname cc-tree-item cc-hasChild-item">购物提货券/蛋糕面包</li><li data-cat_id="50025004" data-spell="gxdz sjfw diy" class="J-catname cc-tree-item cc-hasChild-item">个性定制/设计服务/DIY</li><li data-cat_id="50014927" data-spell="jypx" class="J-catname cc-tree-item cc-hasChild-item">教育培训</li><li data-cat_id="50018252" data-spell="tsh" class="J-catname cc-tree-item cc-hasChild-item">淘商号</li><li data-cat_id="50014811" data-spell="wd wlfw rj" class="J-catname cc-tree-item cc-hasChild-item">网店/网络服务/软件</li><li data-cat_id="50158001" data-spell="wldpdj yhq" class="J-catname cc-tree-item cc-hasChild-item">网络店铺代金/优惠券</li><li data-cat_id="50024451" data-spell="wm ws dcfw" class="J-catname cc-tree-item cc-hasChild-item">外卖/外送/订餐服务</li><li data-cat_id="50007216" data-spell="xhsd hhfz lzyy" class="J-catname cc-tree-item cc-hasChild-item">鲜花速递/花卉仿真/绿植园艺</li><li data-cat_id="50026523" data-spell="xxyl" class="J-catname cc-tree-item cc-hasChild-item">休闲娱乐</li>
										</ul>
								</li>
								<li class="cc-tree-group  cc-tree-expanded" data-expanded="true">
										<div class="cc-tree-gname J-first-cat">汽配摩托</div>
										<ul class="cc-tree-gcont" role="group">
											<li data-cat_id="50074001" data-spell="mtc ddc zb pj" class="J-catname cc-tree-item cc-hasChild-item">摩托车/电动车/装备/配件</li><li data-cat_id="26" data-spell="qc yp pj gz" class="J-catname cc-tree-item cc-hasChild-item">汽车/用品/配件/改装</li><li data-cat_id="50024971" data-spell="xc esc" class="J-catname cc-tree-item cc-hasChild-item">新车/二手车</li>                                </ul>
								</li>
								<li class="cc-tree-group  cc-tree-expanded" data-expanded="true">
										<div class="cc-tree-gname J-first-cat">服装鞋包</div>
										<ul class="cc-tree-gcont" role="group">
											<li data-cat_id="50010404" data-spell="fspj pd mz wj" class="J-catname cc-tree-item cc-hasChild-item">服饰配件/皮带/帽子/围巾</li><li data-cat_id="50011740" data-spell="lxnx" class="J-catname cc-tree-item cc-hasChild-item">流行男鞋</li><li data-cat_id="1625" data-spell="nsny nsny jjf" class="J-catname cc-tree-item cc-hasChild-item">女士内衣/男士内衣/家居服</li><li data-cat_id="50006843" data-spell="nx" class="J-catname cc-tree-item cc-hasChild-item">女鞋</li><li data-cat_id="30" data-spell="nz" class="J-catname cc-tree-item cc-hasChild-item">男装</li><li data-cat_id="16" data-spell="nz nsjp" class="J-catname cc-tree-item cc-hasChild-item">女装/女士精品</li><li data-cat_id="50006842" data-spell="xbpj rxnb nb" class="J-catname cc-tree-item cc-hasChild-item">箱包皮具/热销女包/男包</li>                                </ul>
								</li>
								<li class="cc-tree-group  cc-tree-expanded" data-expanded="true">
										<div class="cc-tree-gname J-first-cat">手机数码</div>
										<ul class="cc-tree-gcont" role="group">
											<li data-cat_id="50008090" data-spell="3csmpj" class="J-catname cc-tree-item cc-hasChild-item">3C数码配件</li><li data-cat_id="50007218" data-spell="bgsb hc xgfw" class="J-catname cc-tree-item cc-hasChild-item">办公设备/耗材/相关服务</li><li data-cat_id="1101" data-spell="bjbdn" class="J-catname cc-tree-item ">笔记本电脑</li><li data-cat_id="11" data-spell="dnyj xsq dnzb" class="J-catname cc-tree-item cc-hasChild-item">电脑硬件/显示器/电脑周边</li><li data-cat_id="20" data-spell="dw pj yx gl" class="J-catname cc-tree-item cc-hasChild-item">电玩/配件/游戏/攻略</li><li data-cat_id="50018004" data-spell="dzcd dzs whyp" class="J-catname cc-tree-item cc-hasChild-item">电子词典/电纸书/文化用品</li><li data-cat_id="50023904" data-spell="ghjpsm" class="J-catname cc-tree-item cc-hasChild-item">国货精品数码</li><li data-cat_id="1201" data-spell="mp3 mp4 ipod lyb" class="J-catname cc-tree-item ">MP3/MP4/iPod/录音笔</li><li data-cat_id="50019780" data-spell="pbdn mid" class="J-catname cc-tree-item ">平板电脑/MID</li><li data-cat_id="50012164" data-spell="sck up cc ydyp" class="J-catname cc-tree-item cc-hasChild-item">闪存卡/U盘/存储/移动硬盘</li><li data-cat_id="1512" data-spell="sj" class="J-catname cc-tree-item ">手机</li><li data-cat_id="14" data-spell="smxj dfxj sxj" class="J-catname cc-tree-item cc-hasChild-item">数码相机/单反相机/摄像机</li><li data-cat_id="50018222" data-spell="tsj ytj fwq" class="J-catname cc-tree-item cc-hasChild-item">台式机/一体机/服务器</li><li data-cat_id="50018264" data-spell="wlsb wlxg" class="J-catname cc-tree-item cc-hasChild-item">网络设备/网络相关</li>                                </ul>
								</li>
								<li class="cc-tree-group  cc-tree-expanded" data-expanded="true">
										<div class="cc-tree-gname J-first-cat">家用电器</div>
										<ul class="cc-tree-gcont" role="group">
											<li data-cat_id="50012082" data-spell="cfdq" class="J-catname cc-tree-item cc-hasChild-item">厨房电器</li><li data-cat_id="50022703" data-spell="djd" class="J-catname cc-tree-item cc-hasChild-item">大家电</li><li data-cat_id="50002768" data-spell="grhl bj amqc" class="J-catname cc-tree-item cc-hasChild-item">个人护理/保健/按摩器材</li><li data-cat_id="50012100" data-spell="shdq" class="J-catname cc-tree-item cc-hasChild-item">生活电器</li><li data-cat_id="50011972" data-spell="yydq" class="J-catname cc-tree-item cc-hasChild-item">影音电器</li>                                </ul>
								</li>
								<li class="cc-tree-group  cc-tree-expanded" data-expanded="true">
										<div class="cc-tree-gname J-first-cat">美妆饰品</div>
										<ul class="cc-tree-gcont" role="group">
											<li data-cat_id="50010788" data-spell="cz xs mzgj" class="J-catname cc-tree-item cc-hasChild-item">彩妆/香水/美妆工具</li><li data-cat_id="50023282" data-spell="mfhf jf" class="J-catname cc-tree-item cc-hasChild-item">美发护发/假发</li><li data-cat_id="1801" data-spell="mrhf mt jy" class="J-catname cc-tree-item cc-hasChild-item">美容护肤/美体/精油</li><li data-cat_id="50468001" data-spell="sb" class="J-catname cc-tree-item cc-hasChild-item">手表</li><li data-cat_id="50013864" data-spell="sp lxss ssspx" class="J-catname cc-tree-item cc-hasChild-item">饰品/流行首饰/时尚饰品新</li><li data-cat_id="50011397" data-spell="zb zs c hj" class="J-catname cc-tree-item cc-hasChild-item">珠宝/钻石/翡翠/黄金</li><li data-cat_id="28" data-spell="zippo rsjd yj" class="J-catname cc-tree-item cc-hasChild-item">ZIPPO/瑞士军刀/眼镜</li>                                </ul>
								</li>
								<li class="cc-tree-group  cc-tree-expanded" data-expanded="true">
										<div class="cc-tree-gname J-first-cat">母婴用品</div>
										<ul class="cc-tree-gcont" role="group">
											<li data-cat_id="35" data-spell="nf fs yyp ls" class="J-catname cc-tree-item cc-hasChild-item">奶粉/辅食/营养品/零食</li><li data-cat_id="50014812" data-spell="np xh wb tcc" class="J-catname cc-tree-item cc-hasChild-item">尿片/洗护/喂哺/推车床</li><li data-cat_id="122650005" data-spell="tx qzx" class="J-catname cc-tree-item cc-hasChild-item">童鞋/亲子鞋</li><li data-cat_id="50008165" data-spell="tz qzz" class="J-catname cc-tree-item cc-hasChild-item">童装/亲子装</li><li data-cat_id="25" data-spell="wj mx dm zj yz" class="J-catname cc-tree-item cc-hasChild-item">玩具/模型/动漫/早教/益智</li><li data-cat_id="50022517" data-spell="yfz ycfyp yy" class="J-catname cc-tree-item cc-hasChild-item">孕妇装/孕产妇用品/营养</li>                                </ul>
								</li>
								<li class="cc-tree-group  cc-tree-expanded" data-expanded="true">
										<div class="cc-tree-gname J-first-cat">家居建材</div>
										<ul class="cc-tree-gcont" role="group">
											<li data-cat_id="50008163" data-spell="csyp" class="J-catname cc-tree-item cc-hasChild-item">床上用品</li><li data-cat_id="50020579" data-spell="dz dg" class="J-catname cc-tree-item cc-hasChild-item">电子/电工</li><li data-cat_id="50020332" data-spell="jcjc" class="J-catname cc-tree-item cc-hasChild-item">基础建材</li><li data-cat_id="122852001" data-spell="jjby" class="J-catname cc-tree-item cc-hasChild-item">居家布艺</li><li data-cat_id="50020808" data-spell="jjsp" class="J-catname cc-tree-item cc-hasChild-item">家居饰品</li><li data-cat_id="27" data-spell="jzzc" class="J-catname cc-tree-item cc-hasChild-item">家装主材</li><li data-cat_id="50020611" data-spell="sy bgjj" class="J-catname cc-tree-item cc-hasChild-item">商业/办公家具</li><li data-cat_id="50020857" data-spell="tssgy" class="J-catname cc-tree-item cc-hasChild-item">特色手工艺</li><li data-cat_id="50020485" data-spell="wj gj" class="J-catname cc-tree-item cc-hasChild-item">五金/工具</li><li data-cat_id="50023804" data-spell="zxsj sg jl" class="J-catname cc-tree-item cc-hasChild-item">装修设计/施工/监理</li><li data-cat_id="50008164" data-spell="zzjj" class="J-catname cc-tree-item cc-hasChild-item">住宅家具</li>                                </ul>
								</li>
								<li class="cc-tree-group  cc-tree-expanded" data-expanded="true">
										<div class="cc-tree-gname J-first-cat">百货食品</div>
										<ul class="cc-tree-gcont" role="group">
											<li data-cat_id="50026800" data-spell="bjsp ssyybcsp" class="J-catname cc-tree-item cc-hasChild-item">保健食品/膳食营养补充食品</li><li data-cat_id="124458005" data-spell="c" class="J-catname cc-tree-item cc-hasChild-item">茶</li><li data-cat_id="50026316" data-spell="c kf cy" class="J-catname cc-tree-item cc-hasChild-item">茶/咖啡/冲饮</li><li data-cat_id="50016349" data-spell="cf pyj" class="J-catname cc-tree-item cc-hasChild-item">厨房/烹饪用具</li><li data-cat_id="2813" data-spell="cryp by jsyp" class="J-catname cc-tree-item cc-hasChild-item">成人用品/避孕/计生用品</li><li data-cat_id="50020275" data-spell="ctzbyyp" class="J-catname cc-tree-item cc-hasChild-item">传统滋补营养品</li><li data-cat_id="122952001" data-spell="cyj" class="J-catname cc-tree-item cc-hasChild-item">餐饮具</li><li data-cat_id="21" data-spell="jjry" class="J-catname cc-tree-item cc-hasChild-item">居家日用</li><li data-cat_id="122950001" data-spell="jqyp lp" class="J-catname cc-tree-item cc-hasChild-item">节庆用品/礼品</li><li data-cat_id="50016348" data-spell="jt grqjgj" class="J-catname cc-tree-item cc-hasChild-item">家庭/个人清洁工具</li><li data-cat_id="50002766" data-spell="ls jg tc" class="J-catname cc-tree-item cc-hasChild-item">零食/坚果/特产</li><li data-cat_id="50016422" data-spell="lymm nbgh dwp" class="J-catname cc-tree-item cc-hasChild-item">粮油米面/南北干货/调味品</li><li data-cat_id="50050359" data-spell="scrl xxsg ss" class="J-catname cc-tree-item cc-hasChild-item">水产肉类/新鲜蔬果/熟食</li><li data-cat_id="122928002" data-spell="snzl" class="J-catname cc-tree-item cc-hasChild-item">收纳整理</li><li data-cat_id="50025705" data-spell="xhqjj wsj z x" class="J-catname cc-tree-item cc-hasChild-item">洗护清洁剂/卫生巾/纸/香薰</li>                                </ul>
								</li>
								<li class="cc-tree-group  cc-tree-expanded" data-expanded="true">
										<div class="cc-tree-gname J-first-cat">运动户外</div>
										<ul class="cc-tree-gcont" role="group">
											<li data-cat_id="50013886" data-spell="hw ds yy lxyp" class="J-catname cc-tree-item cc-hasChild-item">户外/登山/野营/旅行用品</li><li data-cat_id="50010728" data-spell="yd  js qmyp" class="J-catname cc-tree-item cc-hasChild-item">运动/瑜伽/健身/球迷用品</li><li data-cat_id="50510002" data-spell="ydb hwb pj" class="J-catname cc-tree-item cc-hasChild-item">运动包/户外包/配件</li><li data-cat_id="50011699" data-spell="ydf xxfz" class="J-catname cc-tree-item cc-hasChild-item">运动服/休闲服装</li><li data-cat_id="50012029" data-spell="ydxnew" class="J-catname cc-tree-item cc-hasChild-item">运动鞋new</li><li data-cat_id="122684003" data-spell="zxc qxzb lpj" class="J-catname cc-tree-item cc-hasChild-item">自行车/骑行装备/零配件</li>
										</ul>
								</li>
								<li class="cc-tree-group  cc-tree-expanded" data-expanded="true">
										<div class="cc-tree-gname J-first-cat">其他</div>
										<ul class="cc-tree-gcont" role="group">
											<li data-cat_id="50004958" data-spell="" class="J-catname cc-tree-item cc-hasChild-item">移动/联通/电信充值中心</li><li data-cat_id="50023878" data-spell="" class="J-catname cc-tree-item cc-hasChild-item">自用闲置转让</li><li data-cat_id="50024612" data-spell="" class="J-catname cc-tree-item cc-hasChild-item">外卖/外送/订餐服务（垂直市场）</li><li data-cat_id="124116010" data-spell="" class="J-catname cc-tree-item cc-hasChild-item">零售O2O</li><li data-cat_id="124468001" data-spell="" class="J-catname cc-tree-item cc-hasChild-item">农机/农具/农膜</li><li data-cat_id="124470001" data-spell="" class="J-catname cc-tree-item cc-hasChild-item">畜牧/养殖物资</li><li data-cat_id="124470006" data-spell="" class="J-catname cc-tree-item cc-hasChild-item">整车(经销商)</li><li data-cat_id="124484008" data-spell="" class="J-catname cc-tree-item cc-hasChild-item">模玩/动漫/周边/cos/桌游</li><li data-cat_id="125022006" data-spell="" class="J-catname cc-tree-item cc-hasChild-item">全球购官网直购（专用）</li><li data-cat_id="125102006" data-spell="" class="J-catname cc-tree-item cc-hasChild-item">到家业务</li><li data-cat_id="123536002" data-spell="altxzslm" class="J-catname cc-tree-item cc-hasChild-item">阿里通信专属类目</li><li data-cat_id="50016350" data-spell="bx（hjsf）" class="J-catname cc-tree-item cc-hasChild-item">保险（汇金收费）</li><li data-cat_id="50230002" data-spell="fwsp" class="J-catname cc-tree-item cc-hasChild-item">服务商品</li><li data-cat_id="121380001" data-spell="gnjp gjjp zzfw" class="J-catname cc-tree-item cc-hasChild-item">国内机票/国际机票/增值服务</li><li data-cat_id="50008141" data-spell="jl" class="J-catname cc-tree-item cc-hasChild-item">酒类</li><li data-cat_id="122718004" data-spell="jtbj" class="J-catname cc-tree-item cc-hasChild-item">家庭保健</li><li data-cat_id="50023717" data-spell="otcyp yyqx jsyp" class="J-catname cc-tree-item cc-hasChild-item">OTC药品/医疗器械/计生用品</li><li data-cat_id="50023724" data-spell="qt" class="J-catname cc-tree-item cc-hasChild-item">其他</li><li data-cat_id="50050471" data-spell="sy sxfw" class="J-catname cc-tree-item cc-hasChild-item">摄影/摄像服务</li><li data-cat_id="120894001" data-spell="tnl" class="J-catname cc-tree-item cc-hasChild-item">淘女郎</li><li data-cat_id="50690010" data-spell="wxshfw" class="J-catname cc-tree-item cc-hasChild-item">无线生活服务</li><li data-cat_id="50023722" data-spell="yxyj fly" class="J-catname cc-tree-item cc-hasChild-item">隐形眼镜/护理液</li><li data-cat_id="121266001" data-spell="zc" class="J-catname cc-tree-item cc-hasChild-item">众筹</li><li data-cat_id="124242008" data-spell="znsmsb" class="J-catname cc-tree-item cc-hasChild-item">智能数码设备</li>
										</ul>
								</li>
                         </ol>
						 </div>
					</div>
                </div>
            </div>
        </div>
    </div>

    <div class="cate-path cat_2">
        <dl>
            <div class="clearfix">
                <dt>您当前选择的是：</dt>
                <dd>
                    <ol class="category-path" id="J_OlCatePath"></ol>
                </dd>
            </div>
        </dl>
        <span id="J_SpanPointer" class="arrow up"></span>
    </div>
	<span class="fi-help-text mgt15 mgl15 error" id="j-catID-helper"></span>
	<input type="hidden" name="cat_id" id="J-cat-id" value="">
    <div class="panel-single panel-single-light mgt20 txtCenter">
        <input type="submit" class="btn btn-primary btn-submit" value="下一步">
    </div>
    </div>
	</div>
	</form>

        </div>
        <!-- end content-right -->
    </div>
</div>
<!-- end container -->

<!--tip-->
<!-- end footer -->
    <div class="fixedBar">
        <ul>
            <li class="shopManager3"><a href="javascript:;" data-target="#shop_3">商品管理</a></li><li class="shopManager4"><a href="javascript:;" data-target="#shop_4">分组管理</a></li><li class="shopManager5"><a href="javascript:;" data-target="#shop_5">批量导入</a></li>        </ul>
        <a href="javascript:;" class="fixedBar-btn" id="j-fixedBar-btn"></a>
    </div>
	<a href="#" id="j-gotop" class="gotop" title="回到顶部"></a>
<!-- end gotop -->
<!--end front template  -->
<?php include "views/global_footer.php";?>


<script src="<?php echo SITE_ROOT;?>statics/js/dist/Item/add.js"></script>
<script type="text/javascript">
	$(function(){
		$('.used-button').click(function(event){
			event.stopPropagation();
			$(this).siblings('.used-popupmenu').toggle();
		});
		$(document).click(function (event) {
			$('.used-popupmenu').hide();
		});
		$('.used-button').on({
			mouseover:function(){
			$(this).addClass('used-button-hover');},
			mouseout:function(){
				var me = $(this);
				$('.used-popupmenu').on({
					mouseover:function(){
						me.addClass('used-button-hover');
					},
					mouseout:function(){
						me.removeClass('used-button-hover')
					}
				});
				me.removeClass('used-button-hover')
			}
		});
		$('.used-contentbox .used-option').each(function(){
			$(this).hover(function(){
				$(this).addClass('used-menuitem-hover').siblings().removeClass('used-menuitem-hover');
			});
		});

		$('.used-option').click(function(){
			var me = $(this);
			var optxt = me.text();
			var arr = me.data('id').split('-');
			var curhtml = '';
			if(arr.length == 2){
				var id = arr[1];
				var sid = arr[0];
			}
			if(arr.length == 3){
				var id = arr[2];
				var sid = arr[1];
				var tid = arr[0];
			}
			if(arr.length == 4){
				var id = arr[3];
				var sid = arr[2];
				var tid = arr[1];
				var fid = arr[0];
			}
			me.addClass('selected').siblings().removeClass('selected');
			$('.used-select').find('.used-menu-button-caption').text(optxt);
			$('#J_OlCatePath').empty().text(optxt);
			me.closest('.used-popupmenu').hide();
			$('.cc-tree-cont li').each(function(){
				var _this = $(this);
				var cat_id = _this.data('cat_id');
				if(id == cat_id){
					getdata(_this,function(){
						$('.cc-cbox-cont li').each(function() {
							var $this = $(this);
							var cat_id = $this.data('cat_id');
							if(sid == cat_id){
								if(arr.length > 1){
									getdata($this,function(){
										$('.cc-cbox-cont li').each(function() {
											var qthis = $(this);
											var cat_id = qthis.data('cat_id');
											if(tid == cat_id){
												qthis.click();
												if(arr.length > 2){
													getdata(qthis,function(){
														$('.cc-cbox-cont li').each(function() {
															var cat_id = $(this).data('cat_id');
															if(fid == cat_id){
																$(this).click();
															}
														})
													});
												}
											}
										})
									});
								}

							}
						});
					})
				}
			});

			$('.cc-selected').each(function(i){
				if(i == 0){
					curhtml += '<li>'+$(this).html()+'</li>';
				}else{
					curhtml += '<li>&nbsp;&gt;&nbsp;'+$(this).html()+'</li>';
				}
			})

			$('#J_OlCatePath').html(curhtml);
		})
	})
</script>


</body>
</html>
<!-- 20160728 -->
