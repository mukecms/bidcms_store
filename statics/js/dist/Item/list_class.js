$(function() {
	$(document).on("click", ".j-qrcode", function(t) {
		var a = escape(site_root+'index.php?act=goods_class&id='+$(this).data("id"));
		HYD.showQrcode("index.php?act=qrcode&link=" + a)
	}),
	$(document).on("click", ".j-editClass", function(t) {
		var a = $(this),
			i = a.data("id"),
			n = a.data("pid"),
			s = {
				title: a.data("title"),
				pid: a.data("pid"),
				img: a.data("img"),
				serial: a.data("serial"),
				link: a.data("link")
			},
			e = _.template($("#tpl_edit_class").html(), s),
			o = $(e);
		$.jBox.show({
			title: "编辑分类",
			content: o,
			onOpen: function() {
				$.post("index.php?con=goods&act=ajax_cate", {
					id: i
				}, function(t) {
					var a = o.find('select[name="pid"]'),
						i = '<option value="0" selected="">顶级分类</option>';
					$("option", a).remove(),
					$.each(t.data, function(t, a) {
						i += a.class_id == n ? "<option value='" + a.class_id + "' selected>" + a.temp + a.class_name + "</option>" : "<option value='" + a.class_id + "'>" + a.temp + a.class_name + "</option>"
					}),
					a.append(i)
				},'json')
			},
			btnOK: {
				onBtnClick: function(t) {
					var a = t.find("input[name='title']"),
						n = $.trim(a.val()),
						s = t.find("select[name='pid']").val(),
						e = t.find("input[name='file_path']").val(),
						o = t.find("input[name='serial']").val(),
						l = t.find("input[name='link']").val();
					return "" == n ? (HYD.FormShowError(a, "类目名称不能为空"), !1) : ($.jBox.close(t), void $.ajax({
						url: "index.php?con=goods&act=edit_cate&v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						beforeSend: function() {
							$.jBox.showloading()
						},
						data: {
							class_name: n,
							parent_id: s,
							class_id: i,
							class_img: e,
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
	}), $(document).on("click", ".j-delClass", function(t) {
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
	}), $(".j-able").click(function() {
		var t = $(this).data("able"),
			a = $(this).data("id");
		if ("disable" == t) var i = "启用";
		else var i = "禁用";
		$.jBox.show({
			title: i + "分类",
			content: "确认要" + i + "吗？",
			btnOK: {
				onBtnClick: function(i) {
					$.jBox.close(i), $.ajax({
						url: "/Item/ajaxAbleClass?v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							id: a,
							able: t
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(t) {
							1 == t.status ? (HYD.hint("success", "恭喜您，操作成功！"), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", "对不起，操作失败：" + t.msg), $.jBox.hideloading()
						}
					})
				}
			}
		})
	}), $(".btn_table_delAll").click(function() {
		var t = [],
			a = $(".table-ckbs:checked");
		return a.each(function() {
			t.push($(this).data("id"))
		}), t.length ? ($.jBox.show({
			title: "批量删除分类",
			content: "删除分类会一起删除分类下的子分类，确认删除吗？",
			btnOK: {
				onBtnClick: function(a) {
					$.jBox.close(a), $.ajax({
						url: "/Item/DelAllClass?v=" + Math.round(100 * Math.random()),
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
		}), !1) : void HYD.hint("warning", "对不起，请选择需要删除的分类！")
	}), $(document).on("click", ".img-list-add", function() {
		HYD.popbox.ImgPicker(function(t) {
			var a = '<li><span class="img-list-btndel j-delimg"><i class="gicon-trash white"></i></span><span class="img-list-overlay"></span><img src="' + t[0] + '"></li>';
			$(".img-list").empty().append(a), $(".j-imglist-dataset").val(t[0])
		})
	}), $(document).on("click", ".j-delimg", function() {
		var t = '<li class="img-list-add">+</li>';
		$(".img-list").empty().append(t), $(".j-imglist-dataset").val("")
	});
	$(".j-list_class_bg").click(function() {
		var t = $(this);
		t.addClass("checked").find(".gicon").addClass("white"), t.find("input").attr("checked", !0), t.siblings(".j-list_class_bg").removeClass("checked").find(".gicon").removeClass("white"), t.siblings(".j-list_class_bg").find("input").attr("checked", !1), 1 == t.index() ? $(".showClass").show() : $(".showClass").hide()
	})
});
