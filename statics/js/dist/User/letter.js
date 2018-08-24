$(function() {
	$(".J-letter").click(function() {
		return $.jBox.show({
			width: 600,
			height: 600,
			title: "添加站内信",
			content: _.template($("#tpl_letter").html()),
			btnOK: {
				onBtnClick: function(t) {
					$.jBox.close(t);
					var n = t.find(".user_select").val(),
						e = t.find(".agent_select").val(),
						a = t.find(".send_select").val(),
						o = t.find("textarea[name='content']").val();
					$.ajax({
						url: "?con=customer&act=editLetter&v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							commit:1,
							rank_id: n,
							agent_rank_id: e,
							type: a,
							content: o
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(t) {
							1 == t.status ? (HYD.hint("success", "恭喜您，添加成功！"), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", "对不起，添加失败：" + t.msg), $.jBox.hideloading()
						}
					})
				}
			}
		}), !1
	}), $(".J-edit").click(function() {
		var t = $(this),
			n = t.data("id");
		defaults = {
			type: t.data("type"),
			rank: t.data("rank"),
			agent: t.data("agent"),
			content: t.data("content")
		};
		var e = _.template($("#tpl_edit_letter").html(), defaults),
			a = $(e),
			o = a.find(".user_select"),
			i = a.find(".agent_select"),
			d = a.find("textarea[name='content']");
		return $.jBox.show({
			width: 600,
			height: 600,
			title: "编辑站内信",
			content: a,
			btnOK: {
				onBtnClick: function(e) {
					$.jBox.close(e);
					var a = e.find(".send_select").val(),
						s = o.val(),
						c = i.val(),
						l = d.val();
					$.ajax({
						url: "?con=customer&act=editLetter&v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							commit:1,
							message_id: n,
							type: a,
							rank_id: s,
							content: l,
							agent_rank_id: c
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(n) {
							1 == n.status ? (HYD.hint("success", "恭喜您，编辑成功！"), t.data("content", l), t.data("rank", s), t.data("type", a), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", "对不起，编辑失败：" + n.msg), $.jBox.hideloading()
						}
					})
				}
			}
		}), !1
	}), $(".J-del").click(function() {
		var t = $(this),
			n = t.data("id");
		return $.jBox.show({
			width: 300,
			title: "删除站内信",
			content: "确认要删除此信息吗？",
			btnOK: {
				onBtnClick: function(t) {
					$.jBox.close(t), $.ajax({
						url: "/User/delLetter?v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							id: n
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(t) {
							1 == t.status ? (HYD.hint("success", "恭喜您，删除成功！"), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", "对不起，删除失败：" + t.msg), $.jBox.hideloading()
						}
					})
				}
			}
		}), !1
	}), $(".J-send").click(function() {
		var t = $(this),
			n = t.data("id");
		return $.jBox.show({
			width: 300,
			title: "发送站内信",
			content: "确认要发送此信息吗？",
			btnOK: {
				onBtnClick: function(t) {
					$.jBox.close(t), $.ajax({
						url: "/User/sendLetter?v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							id: n
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(t) {
							1 == t.status ? (HYD.hint("success", "恭喜您，发送成功！"), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", "对不起，发送失败：" + t.msg), $.jBox.hideloading()
						}
					})
				}
			}
		}), !1
	}), $(".j-delAll").click(function() {
		var t = [],
			n = $(".table-ckbs:checked");
		return n.each(function() {
			t.push($(this).data("id"))
		}), t.length ? ($.jBox.show({
			title: "批量删除站内信",
			content: "确认要删除选中的站内信息吗？",
			btnOK: {
				onBtnClick: function(n) {
					$.jBox.close(n), $.ajax({
						url: "/User/delAllLetter?v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							ids: t
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(t) {
							1 == t.status ? (HYD.hint("success", "恭喜您，删除成功！"), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", "对不起，删除失败：" + t.msg), $.jBox.hideloading()
						}
					})
				}
			}
		}), !1) : void HYD.hint("warning", "对不起，请选择需要删除的站内信息！")
	}), $(".J-detail").click(function() {
		var t = $(this);
		t.data("id");
		defaults = {
			type: t.data("type"),
			rank: t.data("rank"),
			agent: t.data("agent"),
			content: t.data("content")
		};
		var n = _.template($("#tpl_detail_letter").html(), defaults),
			e = $(n);
		e.find(".user_select"), e.find(".agent_select"), e.find("textarea[name='content']");
		return $.jBox.show({
			width: 600,
			height: 600,
			title: "站内信详情",
			content: e,
			btnOK: {
				onBtnClick: function(t) {
					$.jBox.close(t)
				}
			}
		}), !1
	})
});
