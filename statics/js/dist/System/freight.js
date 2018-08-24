$(function() {
  $(".j-del").click(function() {
		var t = $(this).data("id");
		return $.jBox.show({
			title: "提示",
			content: _.template($("#tpl_jbox_simple").html(), {
				content: "删除后将不可恢复，是否继续？"
			}),
			btnOK: {
				onBtnClick: function(n) {
					$.jBox.close(n), $.ajax({
						url: "index.php?con=freight&act=del_tpl&v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							id: t
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(t) {
							1 == t.status ? (HYD.hint("success", "恭喜您，删除成功！"), setTimeout(function() {
								$("#tpl"+t).remove();
							}, 1e3)) : HYD.hint("danger", "对不起，删除失败：" + t.msg), $.jBox.hideloading()
						}
					})
				}
			}
		}), !1
	}),
   $(".btn_table_delAll").click(function() {
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
						url: "index.php?con=freight&act=del_tpl&v=" + Math.round(100 * Math.random()),
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
							}) : HYD.hint("danger", "对不起，删除失败：" + t.msg), $.jBox.hideloading(), setTimeout(function() {
								window.location.reload()
							}, 1e3)
						}
					})
				}
			}
		}), !1) : void HYD.hint("warning", "对不起，请选择要删除的数据！")
	})
});
