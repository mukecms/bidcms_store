$(function() {
	$(".fancybox").fancybox({
		padding: 5
	}),
  $(".j-del").click(function() {
		var comment_id = $(this).data("id");
		return $.jBox.show({
			title: "提示",
			content: _.template($("#tpl_jbox_simple").html(), {
				content: "删除后将不可恢复，是否继续？"
			}),
			btnOK: {
				onBtnClick: function(n) {
					$.jBox.close(n), $.ajax({
						url: "index.php?con=comment&act=ajax_del&v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							id: comment_id
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(t) {
							1 == t.status ? (HYD.hint("success", "恭喜您，删除成功！"), setTimeout(function() {
								$("#comment"+comment_id).remove();
							}, 1e3)) : HYD.hint("danger", "对不起，删除失败：" + t.msg), $.jBox.hideloading()
						}
					})
				}
			}
		}), !1
	}),
  $(".j-hide").click(function() {
    var _this=$(this);
		var t = $(this).data("id");
		return $.jBox.show({
			title: "提示",
			content: _.template($("#tpl_jbox_simple").html(), {
				content: "确认"+_this.html()+"吗？"
			}),
			btnOK: {
				onBtnClick: function(n) {
					$.jBox.close(n), $.ajax({
						url: "index.php?con=comment&act=ajax_hide&v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							id: t
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(t) {
							1 == t.status ? (HYD.hint("success", t.msg), setTimeout(function() {
								if(_this.html()=='显示评论'){
                  _this.html('隐藏评论');
                } else {
                  _this.html('显示评论');
                }
							}, 1e3)) : HYD.hint("danger", t.msg), $.jBox.hideloading()
						}
					})
				}
			}
		}), !1
	}),
  $(".j-add-hide").click(function() {
		var t = $(this).data("id");
		return $.jBox.show({
			title: "提示",
			content: _.template($("#tpl_jbox_simple").html(), {
				content: "确认隐藏追加评论吗？"
			}),
			btnOK: {
				onBtnClick: function(n) {
					$.jBox.close(n), $.ajax({
						url: "/Comment/ajax_add_hide?v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							id: t
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(t) {
							1 == t.status ? (HYD.hint("success", t.msg), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", t.msg), $.jBox.hideloading()
						}
					})
				}
			}
		}), !1
	}), $(".j-add-show").click(function() {
		var t = $(this).data("id");
		return $.jBox.show({
			title: "提示",
			content: _.template($("#tpl_jbox_simple").html(), {
				content: "确认显示追加评论吗？"
			}),
			btnOK: {
				onBtnClick: function(n) {
					$.jBox.close(n), $.ajax({
						url: "/Comment/ajax_add_show?v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							id: t
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(t) {
							1 == t.status ? (HYD.hint("success", t.msg), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", t.msg), $.jBox.hideloading()
						}
					})
				}
			}
		}), !1
	}), $(".btn_table_delAll").click(function() {
		var t = [],
			n = $(".table-ckbs:checked");
		return n.each(function() {
			t.push($(this).data("id"))
		}), t.length ? ($.jBox.show({
			title: "提示",
			content: _.template($("#tpl_jbox_simple").html(), {
				content: "删除后将不可恢复，是否继续？"
			}),
			btnOK: {
				onBtnClick: function(o) {
					$.jBox.close(o), $.ajax({
						url: "/Comment/ajax_all_del?v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							id: t
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(t) {
							1 == t.status ? n.parents("tr").fadeOut(300, function() {
								HYD.hint("success", "恭喜您，删除成功！")
							}) : HYD.hint("danger", "对不起，删除失败：" + t.msg), $.jBox.hideloading()
						}
					})
				}
			}
		}), !1) : void HYD.hint("warning", "对不起，请选择要删除的数据！")
	}),
  $(".j-replay").click(function() {
		var t = $("#tpl_comment_lists_replay").html(),
			n = $(t),
			o = n.find("textarea"),
			e = $(this).data("id");
		return $.jBox.show({
			title: "回复",
			content: n,
			btnOK: {
				onBtnClick: function(t) {
					var n = o.val();
					return "" == n ? void HYD.FormShowError(o, "请输入回复！") : ($.jBox.close(t), void $.ajax({
						url: "index.php?con=comment&act=reply_comment&v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							id: e,
							val: n
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(t) {
							1 == t.status ? (HYD.hint("success", "恭喜您，回复成功！"), setTimeout(function() {
								$("#reply"+e).html(t.msg);
							}, 1e3)) : HYD.hint("danger", "对不起，回复失败：" + t.msg), $.jBox.hideloading()
						}
					}))
				}
			}
		}), !1
	})
});
