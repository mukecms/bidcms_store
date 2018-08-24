$(function() {
	var t = {
			page: {
				title: "商品限购提示页",
				goto_time: 3
			},
			PModules: [{
				id: 1,
				type: 1,
				draggable: !1,
				sort: 0,
				content: {
					fulltext: '<h1 style="text-align:center;"><img src="/statics/mobile/images/error_goods.png" width="70%" alt="" style="display:block;margin:0 auto;" /></h1><p class="success" style="font-size:16px;font-weight:bold;text-align:center">该商品为限购商品，您买得太多了</p>'
				}
			}],
			LModules: []
	};
	HYD.DIY.Unit.event_typelimitbuy = function(t, e) {
		var o = e.dom_conitem;
		e.ue && e.ue.destroy(), e.ue = UE.getEditor("editor" + e.id), e.ue.ready(function() {
			e.ue.setContent(HYD.DIY.Unit.html_decode(e.content.fulltext)), e.ue.focus(!0);
			var t = function() {
					var t = e.ue.getContent();
					"" == t && (t = "<p>『富文本编辑器』</p>"), o.find(".fulltext").html(t), e.content.fulltext = HYD.DIY.Unit.html_encode(t)
				};
			e.ue.addListener("selectionchange", t), e.ue.addListener("contentChange", t)
		})
	};
	var e = $("#j-initdata").val();
	e = e.length ? $.parseJSON(e) : t, $(".j-pagetitle").text(e.page.title), $(".j-gototime-ipt").val(e.page.goto_time), $(".j-gototime-ipt").change(function(t) {
		e.page.goto_time = $(this).val()
	}), _.each(e.PModules, function(t, e) {
		var o = 0 == e ? !0 : !1;
		HYD.DIY.add(t, o)
	}), _.each(e.LModules, function(t) {
		HYD.DIY.add(t)
	}), $("#j-savePage").click(function() {
		return $.ajax({
			url: 'index.php?con=shop&act=setting&type=limit_buy',
			type: "post",
			dataType: "json",
			data: {
				commit: 1,
				content: JSON.stringify(HYD.DIY.Unit.getData(e))
			},
			beforeSend: function() {
				$.jBox.showloading()
			},
			success: function(t) {
				1 == t.status ? (HYD.hint("success", "恭喜您，保存成功！"), setTimeout(function() {
					window.location.href = t.link
				}, 1e3)) : HYD.hint("danger", "对不起，保存失败：" + t.msg), $.jBox.hideloading()
			}
		}), !1
	})
});