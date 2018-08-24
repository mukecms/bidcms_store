$(function() {
	$(".j-disabled").click(function() {
		var t = $(this).data("id"),
			n = $(this).data("dz");
		if (1 == n) var e = "作废优惠券，是否继续？";
		else if (-1 == n) var e = "启用优惠券，是否继续？";
		else var e = "删除优惠券，是否继续？";
		return $.jBox.show({
			title: "提示",
			content: _.template($("#tpl_jbox_simple").html(), {
				content: e
			}),
			btnOK: {
				onBtnClick: function(e) {
					$.jBox.close(e), $.ajax({
						url: "",
						type: "post",
						dataType: "json",
						data: {
							id: t,
							dz: n,
							commit:1
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(t) {
							1 == t.status ? (1 == n ? HYD.hint("success", "恭喜您，优惠券已作废！") : -1 == n ? HYD.hint("success", "恭喜您，优惠券已启用！") : HYD.hint("success", "恭喜您，优惠券删除成功！"), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", "对不起，优惠券作废失败：" + t.msg), $.jBox.hideloading()
						}
					})
				}
			}
		}), !1
	})
});