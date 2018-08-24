$(function() {
	$(document).on("click", ".j-editClass", function(t) {
		var a = $(this),
			i = a.data("id"),
			n = a.data("pid"),
			s = {
				title: a.data("title"),
				serial: a.data("serial"),
				link: a.data("link")
			},
			e = _.template($("#tpl_edit_class").html(), s),
			o = $(e);
		$.jBox.show({
			title: "编辑分类",
			content: o,
			btnOK: {
				onBtnClick: function(t) {
					var a = t.find("input[name='title']"),
						n = $.trim(a.val()),
						o = t.find("input[name='serial']").val(),
						l = t.find("input[name='link']").val();
					return "" == n ? (HYD.FormShowError(a, "类目名称不能为空"), !1) : ($.jBox.close(t), void $.ajax({
						url: "index.php?con=special&act=edit_cate&v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						beforeSend: function() {
							$.jBox.showloading()
						},
						data: {
							title: n,
							class_id: i,
							serial: o,
							link: l,
							commit:1
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
	}),
	$(document).on("click", ".j-delClass", function(t) {
		var a = $(this),
			i = a.data("id");
		return $.jBox.show({
			title: "删除分类",
			content: "删除分类会一起删除类目下的子分类，确认删除吗？",
			btnOK: {
				onBtnClick: function(t) {
					$.jBox.close(t), $.ajax({
						url: "index.php?con=goods&act=del_class&v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							id: i
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
	})

});
