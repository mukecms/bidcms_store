$(function() {
	$(".j-addCategory").click(function() {
		$.jBox.show({
			title: "添加类目",
			content: _.template($("#tpl_category").html()),
			btnOK: {
				onBtnClick: function(t) {
					var n = t.find("input[name='title']"),
						o = $.trim(n.val()),
						e = t.find("select[name='pid']").val();
					return "" == o ? (HYD.FormShowError(n, "类目名称不能为空"), !1) : ($.jBox.close(t), void $.ajax({
						url: "index.php?con=goods&act=add_cate&v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						beforeSend: function() {
							$.jBox.showloading()
						},
						data: {
							title: o,
							pid: e
						},
						success: function(t) {
							1 == t.status ? (HYD.hint("success", "恭喜，操作成功" + t.msg), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", "对不起，操作失败" + t.msg), $.jBox.hideloading()
						}
					}))
				}
			}
		})
	}), $(".j-editCategory").click(function() {
		var t = $(this),
			n = t.data("id"),
			o = {
				title: t.data("title"),
				pid: t.data("pid")
			},
			e = _.template($("#tpl_edit_category").html(), o),
			a = $(e);
		$.jBox.show({
			title: "编辑类目",
			content: a,
			btnOK: {
				onBtnClick: function(t) {
					var o = t.find("input[name='title']"),
						e = $.trim(o.val()),
						a = t.find("select[name='pid']").val();
					return "" == e ? (HYD.FormShowError(o, "类目名称不能为空"), !1) : ($.jBox.close(t), void $.ajax({
						url: "index.php?con=goods&act=edit_cate&v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						beforeSend: function() {
							$.jBox.showloading()
						},
						data: {
							title: e,
							pid: a,
							id: n
						},
						success: function(t) {
							1 == t.status ? (HYD.hint("success", "恭喜，操作成功" + t.msg), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", "对不起，操作失败" + t.msg), $.jBox.hideloading()
						}
					}))
				}
			}
		})
	}), $(".j-del").click(function() {
		var t = $(this),
			n = t.data("id");
		return $.jBox.show({
			title: "删除类目",
			content: "删除类目会一起删除类目下的子类目，确认删除吗？",
			btnOK: {
				onBtnClick: function(t) {
					$.jBox.close(t), $.ajax({
						url: "index.php?con=goods&act=del_cate&v=" + Math.round(100 * Math.random()),
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
	}), $(".btn_table_delAll").click(function() {
		var t = [],
			n = $(".table-ckbs:checked");
		return n.each(function() {
			t.push($(this).data("id"))
		}), t.length ? ($.jBox.show({
			title: "批量删除类目",
			content: "删除类目会一起删除类目下的子类目，确认删除吗？",
			btnOK: {
				onBtnClick: function(n) {
					$.jBox.close(n), $.ajax({
						url: "/Item/DelAllCategory?v=" + Math.round(100 * Math.random()),
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
		}), !1) : void HYD.hint("warning", "对不起，请选择需要删除的类目！")
	})
});