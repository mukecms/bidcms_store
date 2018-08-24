$(function() {
	var t = {
			page: {
				title: "分销说明"
			},
			PModules: [{
				id: 1,
				type: 1,
				draggable: !1,
				sort: 0,
				content: {
					fulltext: "&lt;section class=&quot;fx-money clearfix&quot;&gt;&lt;section class=&quot;fx-money-title&quot;&gt;&lt;section class=&quot;line&quot;&gt;&lt;/section&gt;&lt;h2&gt;分销赚钱&lt;/h2&gt;&lt;/section&gt;&lt;section class=&quot;fx-depict&quot;&gt;&lt;p&gt;&lt;span&gt;• &lt;/span&gt;请复制分销文字链接并在微信朋友圈发布或点现在分销按钮分享到微信朋友圈；&lt;/p&gt;&lt;p&gt;&lt;span&gt;• &lt;/span&gt;从您的分销链接注册成为会员，对方将成为您的下级会员；&lt;/p&gt;&lt;p&gt;&lt;span&gt;• &lt;/span&gt;您的下级会员任何时候购买产品，您都可以获取相应的提成；&lt;/p&gt;&lt;p&gt;&lt;span&gt;• &lt;/span&gt;您的下级会员的下级会员购买产品，您又可以获取相应的提成。&lt;/p&gt;&lt;/section&gt;&lt;section class=&quot;fx-marks&quot;&gt;&lt;p&gt;&lt;span&gt;* &lt;/span&gt;说明：&lt;/p&gt;&lt;p&gt;分享之后会带有独有PID编码，您的好友访问之后，系统会自动检测统计，此会员一旦注册成为会员，您将成为他的上级会员。&lt;/p&gt;&lt;p&gt;计算佣金时，优惠部分不计处佣金中，也不包含运费，只计算实际支付金额减去运费后的费用。&lt;/p&gt;&lt;/section&gt;&lt;/section&gt;"
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
	}), $("#j-savePage").click(function() {
		return $.ajax({
			url: 'index.php?con=shop&act=setting&type=intro',
			type: "post",
			dataType: "json",
			data: {
				commit: 1,
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