$(function() {
	var t = {
			1: {
				page: {
					title: "会员权益"
				},
				PModules: [{
					id: 1,
					type: 1,
					draggable: !1,
					sort: 0,
					content: {
						fulltext: "&lt;section&nbsp;class=&quot;mgrade_mid&nbsp;g-box&quot;&gt;&lt;section&gt;&lt;/section&gt;&lt;section&nbsp;class=&quot;g-flex&quot;&gt;普通会员&lt;p&gt;会员俱乐部内所有特权商品&lt;/p&gt;&lt;/section&gt;&lt;/section&gt;&lt;section&nbsp;class=&quot;mgrade_bot&quot;&gt;&lt;strong&gt;特权介绍&lt;/strong&gt;&lt;p&gt;会员俱乐部内所有特权商品，在30天最低价的基础上，针对不同淘宝会员等级[V1-V3][V4-V5][V6]会员，额外享受折上折&lt;/p&gt;&lt;/section&gt;"
					}
				}],
				LModules: []
			}
		},
		o = $("#j-initdata").val();
	o = o.length ? $.parseJSON(o) : t[1], _.each(o.PModules, function(t, o) {
		var n = 0 == o;
		HYD.DIY.add(t, n)
	}), _.each(o.LModules, function(t) {
		HYD.DIY.add(t)
	}), $("#j-savePage").click(function() {
		return $.ajax({
			url: '/index.php?con=shop&act=setting&type=privilege',
			type: "post",
			dataType: "json",
			data: {
				commit:1,
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
