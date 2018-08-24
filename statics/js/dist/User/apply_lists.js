$(function() {
	$(".j-pass").click(function() {
		var t = $(this),
			a = t.data("id");
			var n = _.template($("#tpl_apply_pass").html(), {}),
			template= $(n);
			return $.jBox.show({
			width: 400,
			title: "提示",
			content:template,
			btnOK: {
				onBtnClick: function(t) {
					$.jBox.close(t),
					$.ajax({
						url: "?con=agent&act=apply_pass&v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							commit:1,
							apply_id: a,
							rank_id:template.find("select[name='agent_rank_id']").val(),
							start_time:template.find("input[name='start_time']").val(),
							end_time:template.find("input[name='end_time']").val(),
							remark:template.find("input[name='remark']").val()
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(t) {
							1 == t.status ? (HYD.hint("success", "审核通过"), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : 2 == t.status ? HYD.hint("danger", t.msg, 5e3) : HYD.hint("danger", "对不起，编辑失败：" + t.msg), $.jBox.hideloading()
						}
					})
				}
			}
		}), !1
	}),
	$(".j-npass").click(function() {
		var t = $(this),
			a = t.data("id");
		defaults = {};
		var n = _.template($("#tpl_apply_nopass_remark").html(), defaults),
			i = $(n),
			e = i.find("input[name='remark']");
		return $.jBox.show({
			width: 400,
			title: "提示",
			content: i,
			btnOK: {
				onBtnClick: function(t) {
					$.jBox.close(t), $.ajax({
						url: "?con=agent&act=apply_nopass&v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							commit:1,
							apply_id: a,
							remark: e.val()
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(t) {
							1 == t.status ? (HYD.hint("success", "操作成功"), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", "对不起，设置失败"), $.jBox.hideloading()
						}
					})
				}
			}
		}), !1
	})
});
