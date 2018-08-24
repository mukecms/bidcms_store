$(function() {
	var t = {
			page: {
				title: "商品详情"
			},
			PModules: [{
				id: 1,
				type: 1,
				draggable: !1,
				sort: 0,
				content: {
					fulltext: "&lt;div class=&quot;goods-details-block&quot;&gt;&lt;h4&gt;商品详细内容区&lt;/h4&gt;&lt;p&gt;自定义商品内容&lt;/p&gt;&lt;/div&gt;"
				}
			}],
			LModules: []
	},
	l = $("#j-initdata").val();
	l = l.length ? $.parseJSON(l) : t, _.each(l.PModules, function(t, l) {
		var n = 0 == l ? !0 : !1;
		HYD.DIY.add(t, n)
	}), _.each(l.LModules, function(t) {
		HYD.DIY.add(t)
	}), 
	$("#j-savePage").click(function() {
		return $.ajax({
			url: 'index.php?con=goods&act=add_step3',
			type: "post",
			dataType: "json",
			data: {
				commit: 1,
				id:$("#j-pageID").val(),
				content: JSON.stringify(HYD.DIY.Unit.getData())
			},
			beforeSend: function() {
				$.jBox.showloading()
			},
			success: function(t) {
				1 == t.status ? HYD.hint("success", "恭喜您，保存成功！") : HYD.hint("danger", "对不起，保存失败：" + t.msg), $.jBox.hideloading()
			}
		}), !1
	})
});