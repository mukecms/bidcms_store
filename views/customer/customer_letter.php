
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- 满足有些用户在手机端访问的需要 -->

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <title>站内信列表 - Bidcms开源电商</title>
    <!-- 线上环境 -->
        <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/css/component-min.css">    <link rel="stylesheet" href="<?php echo SITE_ROOT;?>statics/plugins/jbox/jbox-min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo SITE_ROOT;?>statics/modulesCss/progress.css">

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
            <h1 class="content-right-title">站内信列表<a class="gicon-info-sign gicon_linkother" href="//www.wifenxiao.com/Index/help_show/lm/help/id/227.html" target="_blank"></a></h1>


    <a href="javascript:;" class="btn btn-success J-letter">添加站内信</a>
    <div class="tablesWrap">
        <form action="" method="post" name="form1">
            <div class="tables-searchbox">
                <input type="text" autocomplete="off" name="start_time" value="" placeholder="发送时间" class="input Wdate" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd'})">
                <span class="mgr5">至</span>
                <input type="text" autocomplete="off" name="end_time" value="" placeholder="发送时间" class="input Wdate" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd'})">
                <button class="btn btn-primary"><i class="gicon-search white"></i>查询</button>
            </div>
        </form>
        <!-- end tables-searchbox -->
        <table class="wxtables">
            <colgroup>
                <col width="10%">
                <col width="43%">
                <col width="20%">
                <col width="9%">
                <col width="13%">
            </colgroup>
            <thead>
            <tr>
                <td>发送群体</td>
                <td>发送内容</td>
                <td>发送时间</td>
                <td>未读人数</td>
                <td>操作</td>
            </tr>
            </thead>
            <tbody>
            <?php if(!empty($list['data'])){?>
              <?php foreach($list['data'] as $v){?>
                <tr>
                    <td><?php echo $v['to_username'];?></td>
                    <td><?php echo $v['content'];?></td>
                    <td><?php echo date('Y-m-d H:i:s',$v['updatetime']);?></td>
                    <td><?php echo $v['status'];?></td>
                    <td><a href="javascript:;"  data-id="<?php echo $v['id'];?>" data-type="<?php echo $v['to_type'];?>" data-rank="<?php echo $v['rank_id'];?>" data-agent="<?php echo $v['agent_rank_id'];?>" data-content="<?php echo $v['content'];?>"  class="btn btn-mini btn-primary J-edit">编辑</a>
                    <a href="javascript:;" class="btn btn-mini btn-danger j-del" data-id="<?php echo $v['id'];?>" >删除</a>
                    </td>
                </tr>
              <?php }?>
            <?php } else {?>
            <tr><td colspan="6">暂无信息</td></tr>
            <?php }?>
            </tbody>
        </table>
        <!-- end wxtables -->
                <!-- end tables-btmctrl -->
    </div>
    <!-- end tablesWrap -->

        </div>
        <!-- end content-right -->

        <a href="javascript:;" class="btn-leftMenuFold" id="j-btn-leftMenuFold" ></a>
    </div>
</div>
<!-- end container -->
<!-- end footer -->
    <div class="fixedBar">
        <ul>
            <li class="shopManager8"><a href="javascript:;" data-target="#shop_8">会员管理</a></li>        </ul>
        <a href="javascript:;" class="fixedBar-btn" id="j-fixedBar-btn"></a>
    </div><a href="#" id="j-gotop" class="gotop" title="回到顶部"></a>
<!-- end gotop -->
    <script type="text/j-template" id="tpl_edit_letter">
        <div class="formitems inline">
            <label class="fi-name"><span class="colorRed">*</span>选择发送用户：</label>
            <div class="form-controls">
                <select class="select small send_select" name="type" >
                    <option value="-1">请选择</option>
                    <?php foreach($GLOBALS['letter_group'] as $k=>$v){?>
                        <option  value="<?php echo $k;?>" <% if(type==<?php echo $k;?>){%>selected<% }%> ><?php echo $v;?>
                        </option>
                    <?php }?>
                </select>
            </div>
            <span class="fi-help-text"></span>
        </div>
        <div class="formitems inline">
            <label class="fi-name">会员等级：</label>
            <div class="form-controls pdt3">
                <select class="select small user_select" name="rank_id" >
                    <option value="-1">请选择</option>
                    <?php foreach($customer_rank as $k=>$v){?>
                    <option  value="<?php echo $v['id'];?>" <% if(rank==<?php echo $v['id'];?>){%>selected<% }%>><?php echo $v['title'];?></option>
                    <?php }?>
                    </select>
                <span class="fi-help-text">指定等级会员时必填</span>
            </div>
        </div>
        <div class="formitems inline">
            <label class="fi-name">分销商等级：</label>
            <div class="form-controls pdt3">
                <select class="select small agent_select" name="agent_rank_id" >
                    <option value="-1">请选择</option>
                    <?php foreach($agent_rank as $k=>$v){?>
                    <option  value="<?php echo $v['id'];?>" <% if(rank==<?php echo $v['id'];?>){%>selected<% }%>><?php echo $v['title'];?></option>
                    <?php }?>
                </select>
                <span class="fi-help-text">指定等级分销商时必填</span>
            </div>
        </div>
        <div class="formitems inline">
            <label class="fi-name"><span class="colorRed">*</span>内容：</label>
            <div class="form-controls">
                <textarea name="content" id="" class="textarea"><%= content %></textarea>
                <span class="fi-help-text"></span>
            </div>
        </div>
    </script>
    <script type="text/j-template" id="tpl_letter">
        <div class="formitems inline">
            <label class="fi-name"><span class="colorRed">*</span>选择发送用户：</label>
            <div class="form-controls">
                <select class="select small send_select" name="type" >
                    <option value="-1">请选择</option>
                    <?php foreach($GLOBALS['letter_group'] as $k=>$v){?>
                        <option value="<?php echo $k;?>"><?php echo $v;?></option>
                    <?php }?>
                </select>
                <span class="fi-help-text"></span>
            </div>
            <span class="fi-help-text"></span>
        </div>
        <div class="formitems inline">
            <label class="fi-name">会员等级：</label>
            <div class="form-controls pdt3">
                <select class="select small user_select" name="rank_id" >
                    <option value="-1">请选择</option>
                    <?php foreach($customer_rank as $k=>$v){?>
                    <option  value="<?php echo $v['id'];?>"><?php echo $v['title'];?></option>
                    <?php }?>
                </select>
                <span class="fi-help-text">指定等级会员或分销商时必填</span>
            </div>
        </div>
        <div class="formitems inline">
            <label class="fi-name">分销商等级：</label>
            <div class="form-controls pdt3">
                <select class="select small agent_select" name="agent_rank_id" >
                    <option value="-1">请选择</option>
                    <?php foreach($agent_rank as $k=>$v){?>
                    <option  value="<?php echo $v['id'];?>"><?php echo $v['title'];?></option>
                    <?php }?>
                </select>
                <span class="fi-help-text">指定等级分销商时必填</span>
            </div>
        </div>
        <div class="formitems inline">
            <label class="fi-name"><span class="colorRed">*</span>内容：</label>
            <div class="form-controls">
                <textarea name="content" id="" class="textarea"></textarea>
                <span class="fi-help-text"></span>
            </div>
        </div>
    </script>
    <script type="text/j-template" id="tpl_detail_letter">
        <div class="formitems inline">
            <label class="fi-name"><span class="colorRed">*</span>选择发送用户：</label>
            <div class="form-controls">
                <div class="radio-group">
                <select class="select small send_select" name="type" >
                    <?php foreach($GLOBALS['letter_group'] as $k=>$v){?>
                        <option  value="<?php echo $k;?>" <% if(type==<?php echo $k;?>){%>selected<% }%> ><?php echo $v;?>
                        </option>
                    <?php }?>
                </select>
                </div>
            </div>
            <span class="fi-help-text"></span>
        </div>
        <div class="formitems inline">
            <label class="fi-name">会员等级：</label>
            <div class="form-controls pdt3">
                <select class="select small user_select" name="rank_id" >
                    <option value="-1">请选择</option>
                    <?php foreach($GLOBALS['rank'] as $k=>$v){?>
                        <option value="<?php echo $k;?>"><?php echo $v;?></option>
                        <?php }?>
                </select>
                <span class="fi-help-text">指定等级会员时必填</span>
            </div>
        </div>
        <div class="formitems inline">
            <label class="fi-name">分销商等级：</label>
            <div class="form-controls pdt3">
                <select class="select small agent_select" name="agent_rank_id" >
                    <option value="-1">请选择</option>
                                    </select>
                <span class="fi-help-text">指定等级分销商时必填</span>
            </div>
        </div>
        <div class="formitems inline">
            <label class="fi-name"><span class="colorRed">*</span>内容：</label>
            <div class="form-controls">
                <textarea name="content" id="" class="textarea"><%= content %></textarea>
                <span class="fi-help-text"></span>
            </div>
        </div>
    </script>

<!--end front template  -->

<?php include "views/global_footer.php";?>

    <script src="<?php echo SITE_ROOT;?>statics/plugins/My97DatePicker/WdatePicker.js"></script>
    <script src="<?php echo SITE_ROOT;?>statics/js/dist/User/letter.js"></script>


</body>
</html>
<!-- 20170105 -->
