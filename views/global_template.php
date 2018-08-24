<!-- diy common start -->
<script type="text/j-template" id="tpl_diy_conitem">
	<div class="diy-conitem">
		<%= html %>
		<div class="diy-conitem-action">
			<div class="diy-conitem-action-btns">
				<a href="javascript:;" class="diy-conitem-btn diy-edit j-edit">编辑</a>
				<a href="javascript:;" class="diy-conitem-btn diy-del j-del">删除</a>
			</div>
		</div>
	</div>
</script>

<script type="text/j-template" id="tpl_diy_ctrl">
	<div class="diy-ctrl-item" data-origin="item">
		<%= html %>
	</div>
</script>
<!-- diy common end -->

<!-- start ImgPicker -->
<script type="text/j-template" id="tpl_popbox_ImgPicker">
	<div id="ImgPicker">
		<div class="tabs clearfix">
		    <a href="javascript:;" class="active tabs_a fl" data-origin="imgpicker" data-index="1">选择图片</a>
		    <a href="javascript:;" class="tabs_a fl j-initupload" data-origin="imgpicker" data-index="2">上传新图片</a>
		</div>
		<!-- end tabs-->
		<div class="tabs-content" data-origin="imgpicker">
		    <div class="tc" data-index="1">
		        <ul class="img-list imgpicker-list clearfix"></ul>
				<!-- end img-list -->
				<div class="imgpicker-actionPanel clearfix">
					<div class="fl">
						<a href="javascript:;" class="btn btn-primary" id="j-btn-listuse">使用选中图片</a>
					</div>
					<div class="fr">
						<div class="paginate"></div>
					</div>
				</div>
				<!-- end imgpicker-actionPanel -->
		    </div>

		    <div class="tc hide" data-index="2">
				<div class="uploadifyPanel clearfix">
					<ul class="img-list imgpicker-upload-preview"></ul>
					<input type="file" name="imgpicker_upload_input" id="imgpicker_upload_input">
				</div>

				<div class="imgpicker-actionPanel">
					<a href="javascript:;" class="btn btn-primary" id="j-btn-uploaduse">使用上传的图片</a>
				</div>
				<!-- end imgpicker-actionPanel -->
		    </div>
		</div>
		<!-- end tabs-content -->
	</div>
</script>

<script type="text/j-template" id="tpl_popbox_ImgPicker_listItem">
	<% _.each(dataset,function(url){ %>
		<li>
			<span class="img-list-overlay"><i class="img-list-overlay-check"></i></span>
			<img src="<%= url %>">
		</li>
	<% }) %>
</script>

<script type="text/j-template" id="tpl_popbox_ImgPicker_uploadPrvItem">
	<li>
		<span class="img-list-btndel j-imgpicker-upload-btndel"><i class="gicon-trash white"></i></span>
		<span class="img-list-overlay"></span>
		<img src="<%= url %>">
	</li>
</script>
<!-- end ImgPicker -->

<!-- start ModulePicker -->
<script type="text/j-template" id="tpl_popbox_ModulePicker">
	<div id="ModulePicker">
		<ul class="modulePicker-list"></ul>
		<div class="clearfix mgt10">
			<div class="paginate fr"></div>
		</div>
	</div>
</script>

<script type="text/j-template" id="tpl_popbox_ModulePicker_item">
	<% _.each(dataset,function(data){%>
		<li class="clearfix">
			<a href="<%= data.link %>" target="_blank" class="modulePicker-list-title fl ovfEps a_hover" title="<%= data.title %>"><%= data.title %></a>
			<a href="javascript:;" class="btn btn-primary btn-small fr j-select">选取</a>
		</li>
	<% }) %>
</script>
<!-- end ModulePicker -->

<!-- start GoodsAndGroupPicker -->
<script type="text/j-template" id="tpl_popbox_GoodsAndGroupPicker_cateitem">
	<% _.each(dataset,function(data){%>
		<li class="clearfix" data-group="<%= data.group_id %>">
			<a href="<%= data.link %>" class="fl a_hover" target="_blank" title="<%= data.title %>"><%= data.title %></a>
			<a href="javascript:;" class="btn fr j-select">选取</a>
		</li>
	<% }) %>
</script>
<script type="text/j-template" id="tpl_popbox_GoodsAndGroupPicker">
	<div id="GoodsAndGroupPicker">
        <div class="tabs clearfix">
            <a href="javascript:;" class="active tabs_a fl" data-origin="goodsandgroup" data-index="1">商品</a>
            <a href="javascript:;" class="tabs_a fl j-tab-group" data-origin="goodsandgroup" data-index="2">商品分组</a>
        </div>
        <!-- end tabs -->
        <div class="tabs-content" data-origin="goodsandgroup">
            <div class="tc" data-index="1">
                <ul class="gagp-goodslist"></ul>
				<div class="clearfix mgt10">
					<div class="fl">
						<a href="javascript:;" class="btn btn-primary j-btn-goodsuse">确定使用</a>
					</div>
					<div class="paginate fr"></div>
				</div>
            </div>
            <div class="tc hide" data-index="2">
                <ul class="gagp-grouplist"></ul>
				<div class="clearfix mgt10">
					<div class="paginate fr"></div>
				</div>
            </div>
        </div>
	</div>
</script>

<script type="text/j-template" id="tpl_popbox_GoodsAndGroupPicker_goodsitem">
	<% _.each(dataset,function(data){%>
		<li class="clearfix" data-item="<%= data.item_id %>">
			<a href="<%= data.link %>" class="fl" target="_blank" title="<%= data.title %>">
			    <div class="table-item-img">
			    	<% if(data.is_compress){ %>
			        	<img src="<%= data.pic %>80x80" alt="<%= data.title %>">
			        <% }else{ %>
			        	<img src="<%= data.pic %>" alt="<%= data.title %>">
			        <% } %>
			    </div>
			    <div class="table-item-info">
			        <p><%= data.title %></p>
			        <span class="price">&yen;<%= data.price %></span>
			    </div>
			</a>
			<a href="javascript:;" class="btn fr j-select mgt15 mgr15">选取</a>
		</li>
	<% }) %>
</script>

<script type="text/j-template" id="tpl_popbox_GoodsAndGroupPicker_groupitem">
	<% _.each(dataset,function(data){%>
		<li class="clearfix" data-group="<%= data.group_id %>">
			<a href="<%= data.link %>" class="fl a_hover" target="_blank" title="<%= data.title %>"><%= data.title %></a>
			<a href="javascript:;" class="btn fr j-select">选取</a>
		</li>
	<% }) %>
</script>
<!-- end GoodsAndGroupPicker -->

<!-- start MgzAndMgzCate -->
<script type="text/j-template" id="tpl_popbox_MgzAndMgzCate">
	<div id="MgzAndMgzCate">
        <div class="tabs clearfix">
            <a href="javascript:;" class="active tabs_a fl" data-origin="MgzAndMgzCate" data-index="1">微站页面</a>
            <a href="javascript:;" class="tabs_a fl j-tab-mgzcate" data-origin="MgzAndMgzCate" data-index="2">微站列表</a>
        </div>
        <!-- end tabs -->
        <div class="tabs-content" data-origin="MgzAndMgzCate">
            <div class="tc" data-index="1">
                <ul class="mgz-list mgz-list-panel1"></ul>
				<div class="clearfix mgt10">
					<div class="paginate fr"></div>
				</div>
            </div>
            <div class="tc hide" data-index="2">
                <ul class="mgz-list mgz-list-panel2"></ul>
				<div class="clearfix mgt10">
					<div class="fl">
						<a href="javascript:;" class="btn btn-primary j-btn-use">确定使用</a>
					</div>
					<div class="paginate fr"></div>
				</div>
            </div>
        </div>
	</div>
</script>

<script type="text/j-template" id="tpl_popbox_MgzAndMgzCate_item">
	<% _.each(dataset,function(data){%>
		<li class="clearfix">
			<a href="<%= data.link %>" class="fl a_hover" target="_blank" title="<%= data.title %>"><%= data.title %></a>
			<a href="javascript:;" class="btn fr j-select">选取</a>
		</li>
	<% }) %>
</script>
<!-- end MgzAndMgzCate -->

<!-- start GamePicker -->
<script type="text/j-template" id="tpl_popbox_GamePicker">
	<div id="GamePicker">
        <div class="tabs clearfix">
            <a href="javascript:;" class="active tabs_a fl" data-origin="GamePicker" data-index="1">营销游戏</a>
            <a href="javascript:;" class="tabs_a fl j-tab-game" data-origin="GamePicker" data-index="2">店铺工具</a>
            <a href="javascript:;" class="tabs_a fl j-tab-game" data-origin="GamePicker" data-index="3">卡券中心</a>
            <a href="javascript:;" class="tabs_a fl j-tab-game" data-origin="GamePicker" data-index="4">会员营销</a>
			<a href="javascript:;" class="tabs_a fl j-tab-game" data-origin="GamePicker" data-index="5">限时促销</a>
			<a href="javascript:;" class="tabs_a fl j-tab-game" data-origin="GamePicker" data-index="6">互动工具</a>
        </div>
        <!-- end tabs -->
        <div class="tabs-content" data-origin="GamePicker">
			<% _.each(dataset,function(data,index){%>
			<div class="tc <%if(index!=0){%>hide<% }%>" data-index="<%=(index+1)%>">
                <ul class="game-list game-list-panel<%=(index+1)%>">
					<% _.each(data.material_list,function(item,cindex){%>
					<li class="clearfix">
						<a href="<%= item.link %>" class="fl a_hover" target="_blank" title="<%= item.title %>"><%= item.title %></a>
						<a href="javascript:;" class="btn fr j-select" data-parent="<%=index%>" data-index="<%=cindex%>">选取</a>
					</li>
					<% }) %>
				</ul>
				<div class="clearfix mgt10">
					<div class="paginate fr"></div>
				</div>
            </div>
			<% }) %>
        </div>
	</div>
</script>
<!-- end GamePicker -->

<script type="text/j-template" id="tpl_albums_main">
	<div id="albums">
		<div class="albums-title clearfix">
			<span class="fl">我的图库<b>（注意：当图片文件夹数量大于300个，将不显示三级子分类文件夹）</b></span>
			<a href="javascript:;" class="fr" id="j-close" title="关闭"><i class="gicon-remove"></i></a>
		</div>
		<div class="albums-container clearfix">
			<div class="albums-cl fl">
				<div class="albums-cl-actions">
					<a href="javascript:;" id="j-addFolder"><i class="gicon-plus"></i><span>添加</span></a>
					<a href="javascript:;" id="j-renameFolder"><i class="gicon-pencil"></i><span>重命名</span></a>
					<a href="javascript:;" id="j-delFolder"><i class="gicon-trash"></i><span>删除</span></a>
				</div>
				<div class="albums-cl-tree" id="j-panelTree">
					<p class="txtCenter pdt10 loading j-loading"><i class="icon-loading"></i></p>
				</div>
			</div>
			<div class="albums-cr fl">
				<div class="albums-cr-actions">
					<div id="temparea" style="display:none;"></div>
					<input type="hidden" id="upimgpath" value=""><a href="javascript:;" class="btn btn-success" data-id="upimg" id="j-uploadImg">添加图片</a>
					<a href="javascript:;" id="j-moveImg" class="btn btn-primary mgl10">移动图片到</a>
                    <a href="javascript:;" id="j-cateImg" class="btn btn-primary mgl5">移动分类到</a>
					<a href="javascript:;" id="j-delImg" class="btn btn-danger mgl5">删除所选图片</a>
					<input type="text" placeholder="请输入图片名称" style="width: 160px;padding:6px;vertical-align: 0;border-radius: 2px;border: 1px solid #ccc;"><a href="javascript:;" id="j-delImg" class="btn btn-primary mgl10 searchImg">搜索</a>
				</div>
				<div class="albums-cr-imgs" id="j-panelImgs">
					<p class="txtCenter pdt10 loading j-loading"><i class="icon-loading"></i></p>
				</div>
				<div class="albums-cr-ctrls clearfix">
					<a href="javascript:;" id="j-useImg" class="btn btn-primary fl">使用选中的图片</a>
					<div class="paginate fr" id="j-panelPaginate"></div>
				</div>
			</div>
		</div>
	</div>
</script>
<!-- end tpl_albums_main -->

<script type="text/j-template" id="tpl_albums_overlay">
	<div id="albums-overlay"></div>
</script>
<!-- end tpl_albums_overlay -->

<script type="text/j-template" id="tpl_albums_tree">
	<dl class="j-albumsNodes">
		<dt data-id="-1" data-add="1" data-rename="0" data-del="0">
		<i class="icon-folder open"></i>
		<span class="j-treeShowTxt"><em class="j-name">所有图片</em>(<em class="j-num"><%=dataset.total%></em>)</span>
		</dt>
		<dd><%=nodes%></dd>
	</dl>
</script>
<!-- end tpl_albums_tree -->

<script type="text/j-template" id="tpl_albums_tree_fn">
	<% _.each(dataset,function(item){%>
		<%if(item.parent_id==0 || item.id==0){%>
			<dl>
		<%}else{%>
			<dl style="display:none;">
		<%}%>
			<%if(item.id==0){%>
				<dt data-id="<%=item.id%>" data-add="0" data-rename="0" data-del="0">
			<%}else{%>
				<dt data-id="<%=item.id%>" data-add="1" data-rename="1" data-del="1">
			<%}%>
				<i class="icon-folder"></i>
				<span class="j-treeShowTxt"><em class="j-name"><%=item.name%></em>(<em class="j-num"><%=item.picNum%></em>)</span>
				<%if(item.id!=0){%>
					<input type="text" class="ipt j-ip" maxlength="10" value="<%=item.name%>"><i class="icon-loading j-loading"></i>
				<%}%>
			</dt>
			<dd>
				<%if(item.subFolder && item.subFolder.length){%>
					<%= templateFn({dataset:item.subFolder, templateFn:templateFn}) %>
				<%}%>
			</dd>
		</dl>
	<%})%>
</script>

<script type="text/j-template" id="tpl_albums_delFolder">
	<div>
		<p class="ftsize14 bold">删除该文件夹同时会删除其子文件夹，是否继续？</p>
		<div class="radio-group mgt5">
			<label><input type="radio" name="isDelImgs" value="1" checked>不删除图片</label>
			<label><input type="radio" name="isDelImgs" value="2">同时删除图片</label>
		</div>
	</div>
</script>
<!-- end tpl_albums_delFolder -->

<script type="text/j-template" id="tpl_albums_imgs">
	<%if(dataset){%>
	<ul class="clearfix">

		<% _.each(dataset,function(item,index){ %>
			<li class="fl" data-id="<%=item.id%>">
				<img src="<%=item.file%>">
				<div class="albums-cr-imgs-selected"><i></i></div>
				<div class="albums-edit">
					<span><i class="gicon-pencil edit-img-name"></span></i>
					<p><%=item.name%></p>
					<div class="img-name-edit">
						<input type="text" value="<%=item.name%>" style="width:60%;" name="rename" class="file_name"/>
						<a href="javascript:;" class="renameImg">确定</a>
					</div>
				</div>
			</li>
		<% }) %>
	</ul>
	<%}else{%>
		<p class="albums-cr-imgs-noPic j-noPic">暂无图片</p>
	<%}%>
</script>
<!-- end tpl_albums_imgs -->

<script type="text/j-template" id="tpl_popup_selectGoods">
	<div>
		<input type="text" name="title" placeholder="请输入商品关键词" class="input xlarge" value="<%=formdata.title || ""%>">
		 <select name="status" class="select">
	        <option value="-1" <%if(formdata.status==-1){%>selected<%}%>>在售中</option>
	        <option value="3" <%if(formdata.status==3){%>selected<%}%>>仓库中</option>
	    </select>
	    <select name="class_id" class="select small newselect">
            <option value="-1" selected>商品分组</option>
            <option value="0" <% if (formdata.class_id === 0 ){ %>selected<% } %>>未分类</option>
            <% if(classlists.length){ %>
            	 <% _.each(classlists,function(item){ %>
                	<option value="<%= item.id %>" <% if (formdata.group_id  == item.id){ %>selected<% } %>><% if (item.temp){ %><%= item.temp %><% } %><%= item.title%></option>
            	<% }) %>
            <% } %>
        </select>
	    <a href="javascript:;" class="btn btn-primary j-search"><i class="gicon-search white"></i>查询</a>
	</div>

    <table class="wxtables mgt10 table-selectGoods">
    	<colgroup>
			<col width="5%">
			<col width="28%">
			<col width="5%">
			<col width="28%">
			<col width="5%">
			<col width="28%">
		</colgroup>
        <thead>
            <tr>
                <td></td>
                <td>商品</td>
                <td></td>
                <td>商品</td>
                <td></td>
                <td>商品</td>
            </tr>
        </thead>
        <tbody>
            <% if(dataset.length){ %>
                <tr>
                    <% _.each(dataset,function(item,index){ %>
                            <td class="txtCenter">
                            	<%if(selectIds.indexOf(item.item_id)<0){%>
                            		<%
                            			var isSelected=false;
	                            		if(curPageCache && curPageCache.ids.join(",").indexOf(item.item_id)>=0){
                            				isSelected=true;
	                            		}
                            		%>
	                        		<a href="javascript:;" class="icon-select j-select <%if(isSelected){%>cur<%}%>" data-index="<%=index%>"></a>
	                                <input type="checkbox" class="j-chkbox" data-index="<%=index%>" data-itemid="<%= item.item_id %>" style="display:none;" <%if(isSelected){%>checked<%}%>>
                                <%}%>
                            </td>
                            <td style="border-right: 1px solid #e7e7eb;">
                                <a href="<%= item.link %>" class="block" target="_blank" title="<%= item.title %>">
                                    <div class="table-item-img">
                                        <img src="<%= item.pic %><%if(item.is_compress){%>80x80<%}%>" alt="<%= item.title %>">
                                    </div>
                                    <div class="table-item-info">
                                        <p><%= item.title %></p>
                                        <span class="price">现价 &yen;<%= item.price %></span>
                                        <%if(selectIds.indexOf(item.item_id)>=0){%>
                                        	<div class="label">已选择该商品</div>
                                    	<%}%>
                                    </div>
                                </a>
                            </td>
                        <% if((index+1)%3==0){%>
                            </tr><tr>
                        <%}%>
                    <% }) %>
                </tr>
            <% }else{ %>
                <tr><td colspan="6" class="txtCenter">暂无数据</td></tr>
            <% } %>
        </tbody>
    </table>

    <div class="mgt15 clearfix">
    	<%if(selectMod==2){%>
        <div class="fl">
            <a href="javascript:;" class="btn btn-primary j-selectAll">全选</a>
            <a href="javascript:;" class="btn btn-primary j-selectReverse">反选</a>
            <a href="javascript:;" class="btn btn-primary j-cancelSelectAll">取消全选</a>
            <a href="javascript:;" class="btn btn-success j-use">使用选中的商品</a>
        </div>
        <%}%>
        <div class="fr paginate"><%= page %></div>
        <!-- end paginate -->
    </div>
    <!-- end tables-btmctrl -->
</script>
<!-- end tpl_item_importTable -->
    <script type="text/j-template" id="icon_imgPicker">
	<div id="icon-container">
		<div class="albums-title clearfix">
			<span class="fl">选择图片</span>
			<a href="javascript:;" class="fr" id="Jclose" title="关闭">
				<i class="gicon-remove"></i>
			</a>
		</div>
		<div class="albums-container">
			<div class="albums-cr-actions noborder">
				<a href="javascript:;" data-style="style1" class="btn btn-primary mgl10 cur">风格一<i></i></a>
				<a href="javascript:;" data-style="style2" class="btn btn-primary mgl10">风格二<i></i></a>
				<a href="javascript:;" data-style="style3" class="btn btn-primary mgl10">风格三<i></i></a>
			</div>
			<div class="albums-color-tab">
				<h2><a href="javascript:;" class="btn btn-primary mgl10">选择颜色</a><span>(小图标下面的文字仅供参考,背景色可自行修改)</span></h2>
				<ul class="clearfix">
					<li data-color="color0"><span class="color color0"></span><span>黑色</span></li>
					<li data-color="color1"><span class="color color1"></span><span>白色</span></li>
					<li data-color="color2"><span class="color color2"></span><span>灰色</span></li>
					<li data-color="color3"><span class="color color3"></span><span>红色</span></li>
					<li data-color="color4"><span class="color color4"></span><span>黄色</span></li>
					<li data-color="color5"><span class="color color6"></span><span>蓝色</span></li>
					<li data-color="color6"><span class="color color5"></span><span>绿色</span></li>
					<li data-color="color7"><span class="color color7"></span><span>紫色</span></li>
					<li data-color="color8"><span class="color color8"></span><span>橙色</span></li>
				</ul>
			</div>
			<div class="albums-icon-tab"></div>
			<div class="albums-cr-ctrls clearfix">
				<a href="javascript:;" id="j-useIcon" class="btn btn-primary fl">使用选中的图片</a>
			</div>
		</div>
	</div>
</script>
<script type="text/j-template" id="icon_imglist">
	<ul class="clearfix">
		<% _.each(data.list,function(item){ %>
			<li><img src="<%= data.url %><%= item %>" width="80" alt=""><span><i></i></span></li>
		<% }) %>
	</ul>
</script>
<!--图文素材弹窗选择器 -->
<!-- start 本文图文 -->
<script type="text/j-template" id="tpl_materialPicker_text_pre">
	<dl class="materialPrePanel mgt20">
		<dt>
			<div class="single-summary pd10"><%= summary %></div>
		</dt>
	</dl>
</script>
<!-- end 本文图文 -->

<!-- start 单条图文选择器 -->
<script type="text/j-template" id="tpl_materialPicker_single_table">
	<div style="text-align:right;"><a href="/MaterialOne/add" class="btn btn-success btn-small" target="_blank">添加单条图文</a></div>
	<table class="wxtables mgt15" style="width:650px;">
        <thead>
            <tr>
                <td>标题</td>
                <td>创建时间</td>
                <td>操作</td>
            </tr>
        </thead>
        <tbody>
	        <% if(list.length){ %>
	        	<% _.each(list,function(item){ %>
		            <tr>
		            	<td>
		            		<div class="ng ng_single">
							    <div class="ng_item">
							        <div class="td_cont with_label">
							            <span class="label label-success">图文</span>
							            <div class="text">
							                <a href="<%= item.link %>" target="_blank" class="part new_window" title="<%= item.title %>"><%= item.title %></a>
							            </div>
							        </div>
							    </div>
							    <div class="ng_item view_more">
							        <a href="<%= item.link %>" class="td_cont clearfix new_window">
							            <span class="pull-left">阅读全文</span>
							            <span class="pull-right">&gt;</span>
							        </a>
							    </div>
							</div>
		            	</td>
		            	<td><%= item.datetime %></td>
		            	<td><a href="javascript:;" class="btn btn-small btn-primary j-select">选择</a></td>
		            </tr>
	            <% }) %>
	        <% }else{ %>
				<tr><td colspan="4" class="txtCenter">暂无数据</td></tr>
        	<% } %>
        </tbody>
    </table>

    <div class="clearfix mgt15">
        <div class="paginate fr"><%= page %></div>
    </div>
</script>

<script type="text/j-template" id="tpl_materialPicker_single_pre">
	<dl class="materialPrePanel mgt20" style="border: 1px solid #E7E7EB;">
		<dt>
			<h1 class="single-title first-t"><%= title %></h1>
			<p class="single-datetime first-d"><%= datetime %></p>
			<div class="cover-wrap">
				<img src="<%= coverimg %>" >
			</div>
			<p class="single-summary first-p"><%= summary %></p>
			<a href="<%= link %>" target="_blank" class="single-link clearfix first-a">
				<span class="fl">阅读全文</span>
				<span class="fr symbol">&gt;</span>
			</a>
		</dt>
	</dl>
</script>
<!-- end 单条图文选择器 -->

<!-- start 多条图文选择器 -->
<script type="text/j-template" id="tpl_materialPicker_mutil_table">
	<div style="text-align:right;"><a href="/MaterialMore/add" class="btn btn-success btn-small" target="_blank">添加多条图文</a></div>
	<table class="wxtables mgt15" style="width:650px;">
        <thead>
            <tr>
                <td>标题</td>
                <td>创建时间</td>
                <td>操作</td>
            </tr>
        </thead>
        <tbody>
        	<% if(list.length){ %>
	        	<% _.each(list,function(item){ %>
		            <tr>
		            	<td>
		            		<div class="ng ng_multiple">
							    <div class="ng_item">
							        <div class="td_cont with_label">
							            <span class="label label-success">图文1</span>
							            <div class="text">
							                <a href="<%= item.link %>" target="_blank" class="part new_window" title="<%= item.title %>"><%= item.title %></a>
							            </div>
							        </div>
							    </div>
							    <% _.each(item.dataset,function(subitem){ %>
								    <div class="ng_item">
								        <div class="td_cont with_label">
								            <span class="label label-success">图文2</span>
								            <div class="text">
								                <a href="<%= subitem.link %>" target="_blank" class="part new_window" title="<%= subitem.title %>"><%= subitem.title %></a>
								            </div>
								        </div>
								    </div>
							    <% }) %>
							</div>
		            	</td>
		            	<td><%= item.datetime %></td>
		            	<td><a href="javascript:;" class="btn btn-small btn-primary j-select">选择</a></td>
		            </tr>
	            <% }) %>
            <% }else{ %>
				<tr><td colspan="4" class="txtCenter">暂无数据</td></tr>
        	<% } %>
        </tbody>
    </table>

    <div class="clearfix mgt15">
        <div class="paginate fr"><%= page %></div>
    </div>
</script>

<script type="text/j-template" id="tpl_materialPicker_mutil_pre">
	<dl class="materialPrePanel mgt20 bgcfff border">
		<dt class="mb10 mt10">
			<a href="<%= redirect %>" target="_blank">
				<div class="cover-wrap">
					<img src="<%= coverimg %>" class="img-cover">
				</div>
				<h2 class="w262"><%= title %></h2>
			</a>
		</dt>
		<% _.each(dataset,function(item){ %>
			<dd class="newWidth">
				<a class="border-top_1 p" href="<%= item.link %>" target="_blank">
					<h3><%= item.title %></h3>
					<div class="pic"><img src="<%= item.img %>" alt=""></div>
				</a>
			</dd>
		<% }) %>
	</dl>
</script>
<!-- end 多条图文选择器 -->

<!-- 自定义菜单 营销活动选项卡 -->
<script type="text/j-template" id="tpl_menu_tab">
	<% _.each(list,function(item){ %>
		<li class="clearfix">
			<a href="<%= item.urlview%><%=item.link%>" class="fl a_hover" target="_blank" title="<%= item.title %>"><%= item.title %></a>
			<a href="javascript:;" data-link_id="<%= item.link_id%>" class="btn fr j-select">选取</a>
		</li>
	<% }) %>



</script>


<script type="text/j-template" id="tpl_menu_ump">
<div id="GamePicker">
		<div class="tabs clearfix">
			<%for (var i in gamelist){%>
				<a href="javascript:void(0)" class="tabs_a j-tab-game fl " title="<%= gamelist[i] %>"  data-keys="<%=i%>"><%= gamelist[i] %></a>
			<% } %>
		</div>
		<div class="tabs-content" data-origin="GamePicker">
			<div class="tc" data-index="1">
				 <ul class="game-list game-list-panel1">

				 </ul>
				 <div class="clearfix mgt10">
					<div class="paginate fr"><%= page %></div>
				</div>
			</div>
		</div>
	</div>

</script>
<!-- 自定义菜单 活动页面 -->
 <script type="text/j-template" id="tpl_menu_ump">
// 	<div>
// 		<table class="wxtables mgt15">
// 			<thead>
// 				<tr>
// 					<td>标题</td>
// 					<td width="60">操作</td>
// 				</tr>
// 			</thead>
// 			<tbody>
// 				<% _.each(list,function(item){ %>
// 				<tr>
// 					<td><%= item.title %><input data-link_id="<%= item.link_id%>" type="hidden" value="<%= item.urlview%><%=item.link%>"></td>
// 					<td><input type="button" class="btn btn-primary j-select-link" name="" value="选择"></td>
// 				</tr>
// 				<% }) %>
// 			</tbody>
// 		</table>
// 		<div class="clearfix mgt15">
//             <div class="paginate fr"><%= page %></div>
//         </div>
// 	</div>
 </script>

<!-- 自定义菜单 选择商品 -->
<script type="text/j-template" id="tpl_menu_detail">

	<div id="GoodsAndGroupPicker">
		<ul class="gagp-goodslist">
			<% _.each(list,function(data){%>
				<li class="clearfix">
					<a href="<%= data.link %><%= data.urlview %>" class="fl" target="_blank" title="<%= data.title %>">
					    <div class="table-item-img">
					        <img src="<%= data.file_path %>" alt="<%= data.title %>">
					    </div>
					    <div class="table-item-info">
					        <p><%= data.title %></p>
					        <span class="price">&yen;<%= data.price %></span>
					    </div>
					</a>
					<a href="javascript:;" data-link_id="<%= data.link_id%>" class="btn fr j-select mgt10">选取</a>
				</li>
			<% }) %>
		</ul>
		<div class="clearfix mgt15">
        	<div class="paginate fr"><%= page %></div>
    	</div>
	</div>
</script>
<script type="text/j-template" id="tpl_menu_page">
	<div class="clearfix mgt10">
		<div class="paginate fr"><%= page %></div>
	</div>
</script>
<!-- 选择自定义链接 -->
<script type="text/j-template" id="tpl_menu_lst">
	<div id="GoodsAndGroupPicker">
		<ul class="gagp-goodslist">
		<% _.each(list,function(data){%>
			<li class="clearfix">
				<a href="<%= data.link %><%= data.urlview %>" class="fl a_hover lh30" target="_blank" title="<%= data.title %>"><%= data.title %></a>
				<a href="javascript:;" data-link_id="<%= data.link_id%>" class="btn fr j-select">选取</a>
			</li>
		<% }) %>
		</ul>
        <div class="clearfix mgt15">
            <div class="paginate fr"><%= page %></div>
        </div>
	</div>

</script>

<!-- 自定义菜单 商品分组 -->
<script type="text/j-template" id="tpl_menu_group">
	<div id="GoodsAndGroupPicker">
		<div class="tabs-content" data-origin="goodsandgroup">
            <div class="tc" data-index="1">
                <ul class="gagp-goodslist">
				<% _.each(list,function(data){%>
					<li class="clearfix" >
						<a href="<%= data.link %>" class="fl a_hover" target="_blank" title="<%= data.title %>"><%= data.title %></a>
						<a href="javascript:;" class="btn fr j-select">选取</a>
					</li>
				<% }) %>
				</ul>
            </div>
        </div>
	</div>
	<div class="clearfix mgt15">
        <div class="paginate fr"><%= page %></div>
    </div>
</script>

<!-- 自定义菜单 微站页面 -->
<script type="text/j-template" id="tpl_menu_magazine">


	<div id="GoodsAndGroupPicker">
		<div class="tabs-content" data-origin="goodsandgroup">
            <div class="tc" data-index="1">
                <ul class="gagp-goodslist">
				<% _.each(list,function(data){%>
					<li class="clearfix" >
						<a href="<%= data.link %>" class="fl a_hover" target="_blank" title="<%= data.title %>"><%= data.title %></a>
						<a href="javascript:;" class="btn fr j-select">选取</a>
					</li>
				<% }) %>
				</ul>
            </div>
        </div>
        <div class="clearfix mgt15">
            <div class="paginate fr"><%= page %></div>
        </div>
	</div>

</script>

<!-- 自定义菜单 微站列表 -->
<script type="text/j-template" id="tpl_menu_sort">

	<div id="GoodsAndGroupPicker">
		<div class="tabs-content" data-origin="goodsandgroup">
            <div class="tc" data-index="1">
                <ul class="gagp-goodslist">
				<% _.each(list,function(data){%>
					<li class="clearfix" >
						<a href="<%= data.link %>" class="fl a_hover" target="_blank" title="<%= data.title %>"><%= data.title %></a>
						<a href="javascript:;" class="btn fr j-select">选取</a>
					</li>
				<% }) %>
				</ul>
            </div>
        </div>
        <div class="clearfix mgt15">
            <div class="paginate fr"><%= page %></div>
        </div>
	</div>

</script>

<!-- start ImgPicker -->
<script type="text/j-template" id="tpl_popbox_ImgPicker">
	<div id="ImgPicker">
		<div class="tabs clearfix">
		    <a href="javascript:;" class="active tabs_a fl" data-origin="imgpicker" data-index="1">选择图片</a>
		    <a href="javascript:;" class="tabs_a fl j-initupload" data-origin="imgpicker" data-index="2">上传新图片</a>
		</div>
		<!-- end tabs-->
		<div class="tabs-content" data-origin="imgpicker">
		    <div class="tc" data-index="1">
		        <ul class="img-list imgpicker-list clearfix"></ul>
				<!-- end img-list -->
				<div class="imgpicker-actionPanel clearfix">
					<div class="fl">
						<a href="javascript:;" class="btn btn-primary" id="j-btn-listuse">使用选中图片</a>
					</div>
					<div class="fr">
						<div class="paginate"></div>
					</div>
				</div>
				<!-- end imgpicker-actionPanel -->
		    </div>

		    <div class="tc hide" data-index="2">
				<div class="uploadifyPanel clearfix">
					<ul class="img-list imgpicker-upload-preview"></ul>
					<input type="file" name="imgpicker_upload_input" id="imgpicker_upload_input">
				</div>

				<div class="imgpicker-actionPanel">
					<a href="javascript:;" class="btn btn-primary" id="j-btn-uploaduse">使用上传的图片</a>
				</div>
				<!-- end imgpicker-actionPanel -->
		    </div>
		</div>
		<!-- end tabs-content -->
	</div>
</script>

<script type="text/j-template" id="tpl_popbox_ImgPicker_listItem">
	<% _.each(dataset,function(url){ %>
		<li>
			<span class="img-list-overlay"><i class="img-list-overlay-check"></i></span>
			<img src="<%= url %>">
		</li>
	<% }) %>
</script>

<script type="text/j-template" id="tpl_popbox_ImgPicker_uploadPrvItem">
	<li>
		<span class="img-list-btndel j-imgpicker-upload-btndel"><i class="gicon-trash white"></i></span>
		<span class="img-list-overlay"></span>
		<img src="<%= url %>">
	</li>
</script>
<!-- 自定义菜单中的单张图片 -->
<script type="text/j-template" id="tpl_popbox_ImgPicker_listItem2">
	<% _.each(dataset,function(item){ %>
		<li>
			<span class="img-list-overlay"><i class="img-list-overlay-check"></i></span>
			<img src="<%= item.file_path %>" data-id="<%=item.file_id%>">
		</li>
	<% }) %>
</script>
<script type="text/j-template" id="tpl_popbox_ImgPicker_uploadPrvItem2">
	<li>
		<span class="img-list-btndel j-imgpicker-upload-btndel"><i class="gicon-trash white"></i></span>
		<span class="img-list-overlay"></span>
		<img src="<%= url %>" data-id="<%=id%>">
	</li>
</script>
<!-- end ImgPicker-->
<!-- start audio -->
<script type="text/j-template" id="tpl_popbox_Audio">
	<div id="ImgPicker">
		<div class="tabs clearfix">
		    <a href="javascript:;" class="active tabs_a fl" data-origin="imgpicker" data-index="1">选择音频</a>
		    <a href="javascript:;" class="tabs_a fl j-initupload" data-origin="imgpicker" data-index="2">上传新音频</a>
		</div>
		<!-- end tabs-->
		<div class="tabs-content" data-origin="imgpicker">
		    <div class="tc" data-index="1">
		        <ul class="img-list imgpicker-list clearfix"></ul>
				<!-- end img-list -->
				<div class="imgpicker-actionPanel clearfix">
					<div class="fl">
						<a href="javascript:;" class="btn btn-primary" id="j-btn-listuse">使用选中音频</a>
						<a href="javascript:;" class="btn btn-default" id="j-btn-listdel">删除选中音频</a>
					</div>
					<div class="fr">
						<div class="paginate"></div>
					</div>
				</div>
				<!-- end imgpicker-actionPanel -->
		    </div>

		    <div class="tc hide" data-index="2">
				<div class="uploadifyPanel clearfix">
					<ul class="img-list imgpicker-upload-preview"></ul>
					<input type="file" name="imgpicker_upload_input" id="imgpicker_upload_input">
				</div>

				<div class="imgpicker-actionPanel">
					<a href="javascript:;" class="btn btn-primary" id="j-btn-uploaduse">使用上传的音频</a>
				</div>
				<!-- end imgpicker-actionPanel -->
		    </div>
		</div>
		<!-- end tabs-content -->
	</div>
</script>
<!-- 自定义菜单中的音频 -->
<script type="text/j-template" id="tpl_popbox_ImgPicker_audio">
	<% _.each(dataset,function(item){ %>
		<li>
			<span class="img-list-overlay"><i class="img-list-overlay-check"></i></span>
			<div class="audio-flag" data-src="<%= item.file_path %>" data-id="<%=item.file_id%>"><i></i></div>
			<div class="audio-name">
				<b class="j-curname"><%= item.file_name %></b>
				<div class="j-edit-name">
					<input type="text" name="audioName" value="<%= item.file_name %>">
					<a href="javascript:;" class="btn btn-primary j-getAudioName" data-id="<%=item.file_id%>" title="确定保存">确定</a>
				</div>
				<p class="j-get-edit-name"><i class="gicon-pencil edit-img-name"></i></p>
			</div>
		</li>
	<% }) %>
</script>
<script type="text/j-template" id="tpl_popbox_ImgPicker_audio2">
	<li>
		<span class="img-list-btndel j-imgpicker-upload-btndel"><i class="gicon-trash white"></i></span>
		<span class="img-list-overlay"></span>
		<div data-src="<%= url %>" data-id="<%=id%>" width="64" height="64"><i></i></div>
	</li>
</script>
<!-- start video -->
<script type="text/j-template" id="tpl_popbox_Video">
	<div id="ImgPicker">
		<div class="tabs clearfix">
		    <a href="javascript:;" class="active tabs_a fl" data-origin="videolst" data-index="1">选择视频</a>
		    <a href="javascript:;" class="tabs_a fl j-initupload" data-origin="video" data-index="2">上传新视频</a>
		</div>
		<!-- end tabs-->
		<div class="tabs-content" data-origin="video">
		    <div class="tc" data-index="1">
		        <ul class="img-list imgpicker-list clearfix"></ul>
				<!-- end img-list -->
				<div class="imgpicker-actionPanel clearfix">
					<div class="fl">
						<a href="javascript:;" class="btn btn-primary" id="j-btn-listuse">使用选中视频</a>
						<a href="javascript:;" class="btn btn-default" id="j-btn-listdel">删除选中视频</a>
					</div>
					<div class="fr">
						<div class="paginate"></div>
					</div>
				</div>
				<!-- end imgpicker-actionPanel -->
		    </div>

		    <div class="tc hide" data-index="2">
				<div class="uploadifyPanel clearfix">
					<ul class="img-list imgpicker-upload-preview"></ul>
					<input type="file" name="imgpicker_upload_input" id="imgpicker_upload_input">
				</div>
				<div class="imgpicker-actionPanel">
					<a href="javascript:;" class="btn btn-primary" id="j-btn-uploaduse">使用上传的视频</a>
				</div>
				<!-- end imgpicker-actionPanel -->
		    </div>
		</div>
		<!-- end tabs-content -->
	</div>
</script>
<!-- 自定义菜单中的视频 -->
<script type="text/j-template" id="tpl_popbox_ImgPicker_video">
	<% _.each(dataset,function(item){ %>
		<li>
			<span class="img-list-overlay"><i class="img-list-overlay-check"></i></span>
			<div class="video" data-src="<%= item.file_path %>" data-id="<%=item.file_id%>" width="64" height="64"><i></i></div>
		</li>
	<% }) %>
</script>
<script type="text/j-template" id="tpl_popbox_ImgPicker_video2">
	<li>
		<span class="img-list-btndel j-imgpicker-upload-btndel"><i class="gicon-trash white"></i></span>
		<span class="img-list-overlay"></span>
		<div class="video" data-src="<%= url %>" data-id="<%= id %>" width="64" height="64"><i></i></div>
	</li>
</script>

<script type="text/j-template" id="dq-box">
	<div class="dq-box">
	   <img src="/Public/images/gong.jpg" alt=""/>
	</div>
</script>

<script type="text/j-template" id="tpl_add_imgList">
	<%var ids=[];%>
	<% if (data.length){ %>
	<% _.each(data,function(goods){ %>
	<li data-item="<%= goods.item_id %>">
		<a href="<%= goods.link %>" target="_blank">
			<span class="img-list-btndel j-delgoods"><i class="gicon-trash white"></i></span>
			<span class="img-list-overlay"></span>
			<% if(goods.is_compress){ %>
			<img src="<%= goods.pic %>80x80">
			<% }else{ %>
			<img src="<%= goods.pic %>">
			<% } %>
		</a>
	</li>
	<%ids.push(goods.item_id)%>
	<% }) %>
	<% } %>
	<li class="img-list-add j-addgoods">+</li>
	<input type="hidden" name="goods_ids" value="<%=ids.join(',')%>">
</script>

    <script type="text/j-template" id="tpl_popup_selectCompose">
    <div class="J-composeBox">
        <div class="compose_top clearfix">
            <div class="title fl">微排版</div>
            <div class="button clearfix fr">
                <button type="button" class="btn btn-success J-okClk">确定</button>
                <button type="button" class="btn butcall J-noClk">取消</button>
            </div>
        </div>
        <div class="compose_content">
            <div class="clearfix" id="full-page">
                <nav id="nav" class="pull-left fl">
                    <ul>
                    	<li class="filter active" data-filter="filter-11" data-id="11"><span class="nav-txt">自定义素材</span></li>
                        <li class="filter" data-filter="filter-1" data-id="1"><span class="nav-txt">标题</span></li>
                        <li class="filter" data-filter="filter-2" data-id="2"><span class="nav-txt">正文</span></li>
                        <li class="filter" data-filter="filter-3" data-id="3"><span class="nav-txt">图片</span></li>
                        <li class="filter" data-filter="filter-4" data-id="4"><span class="nav-txt">模板</span></li>
                        <li class="filter" data-filter="filter-5" data-id="5"><span class="nav-txt">引导关注</span></li>
                        <li class="filter" data-filter="filter-6" data-id="6"><span class="nav-txt">引导阅读</span></li>
                        <li class="filter" data-filter="filter-7" data-id="7"><span class="nav-txt">分割线</span></li>
                        <li class="filter" data-filter="filter-8" data-id="8"><span class="nav-txt">点赞分享</span></li>
                        <li class="filter" data-filter="filter-9" data-id="9"><span class="nav-txt">模板套装</span></li>
                    </ul>
                </nav>
                <section id="tmpl" class="pull-left fl">
                    <h2>模板列表</h2>
                    <ul class="compose_lists"></ul>
                </section>
                <section class="editorBox pull-left fl">
                    <textarea id="edit_content" name="edit_content"></textarea>
                </section>
            </div>
        </div>
    </div>

</script>

<script type="text/j-template" id="tpl_Compose_lists">
    <% if(dataset.length){ %>
        <% _.each(dataset,function(item){ %>
        <li class="tmpl-list mix animated filter-1 copyright-none bounceInDown" data-cat="filter-<%= item.id %>" data-id="<%= item.id %>" data-toggle="tooltip" data-placement="left" title="" data-original-title="点击可以插入此样式">
            <section class="pEditor">
                <%= html_decode(item.html) %>
            </section>
            <div class="hode-txt"><%= item.tip %></div>
        </li>
        <% }) %>
    <% } %>
</script>
