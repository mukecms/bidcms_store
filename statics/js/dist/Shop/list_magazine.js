$(function() {
	$(".j-qrcode").click(function() {
		var t = $(this).data("url");
		HYD.showQrcode("http://shop.bidcms.com/tool/qrcode.php?link=" + t)
	}), $(".j-del").click(function() {
		var id = $(this).data("id");
		return console.log(id), $.jBox.show({
			title: "提示",
			content: _.template($("#tpl_jbox_simple").html(), {
				content: "删除后将不可恢复，是否继续？"
			}),
			btnOK: {
				onBtnClick: function(n) {
					$.jBox.close(n), $.ajax({
						url: "index.php?con=special&act=del&v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							id: id
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(t) {
							1 == t.status ? (HYD.hint("success", "恭喜您，删除成功！"), setTimeout(function() {
								$("#list"+id).remove();
							}, 1e3)) : HYD.hint("danger", "对不起，删除失败：" + t.msg), $.jBox.hideloading()
						}
					})
				}
			}
		}), !1
	}), $(".btn_table_delAll").click(function() {
		var ids = [],
			n = $(".table-ckbs:checked");
		return n.each(function() {
			ids.push($(this).data("id"))
		}), ids.length ? ($.jBox.show({
			title: "提示",
			content: _.template($("#tpl_jbox_simple").html(), {
				content: "删除后将不可恢复，是否继续？"
			}),
			btnOK: {
				onBtnClick: function(o) {
					$.jBox.close(o), $.ajax({
						url: "/Shop/batchDelMagazine?v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							id: ids
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(t) {
							1 == t.status ? (n.parents("tr").fadeOut(300, function() {
								HYD.hint("success", "恭喜您，删除成功！")
							}), setTimeout(function() {
								for(i in ids){
									$("#list"+ids[i]).remove();
								}
							}, 300)) : HYD.hint("danger", "对不起，删除失败：" + t.msg), $.jBox.hideloading()
						}
					})
				}
			}
		}), !1) : void HYD.hint("warning", "对不起，请选择要删除的数据！")
	}), $(".btn_table_offshelf").click(function() {
		var t = [],
			n = $(".table-ckbs:checked");
		return n.each(function() {
			t.push($(this).data("id"))
		}), t.length ? ($.jBox.show({
			title: "提示",
			content: _.template($("#tpl_jbox_simple").html(), {
				content: "您确认要下架吗？"
			}),
			btnOK: {
				onBtnClick: function(o) {
					$.jBox.close(o), $.ajax({
						url: "/Shop/batchStoreMagazine?v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							id: t
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(t) {
							1 == t.status ? (n.parents("tr").fadeOut(300, function() {
								HYD.hint("success", "恭喜您，操作成功！")
							}), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", "对不起，操作失败：" + t.msg), $.jBox.hideloading()
						}
					})
				}
			}
		}), !1) : void HYD.hint("warning", "对不起，请选择要下架的数据！")
	}), $(".btn_table_onshelf").click(function() {
		var t = [],
			n = $(".table-ckbs:checked");
		return n.each(function() {
			t.push($(this).data("id"))
		}), t.length ? ($.jBox.show({
			title: "提示",
			content: _.template($("#tpl_jbox_simple").html(), {
				content: "您确认要上架吗？"
			}),
			btnOK: {
				onBtnClick: function(o) {
					$.jBox.close(o), $.ajax({
						url: "/Shop/batchDisplayMagazine?v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							id: t
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(t) {
							1 == t.status ? (n.parents("tr").fadeOut(300, function() {
								HYD.hint("success", "恭喜您，操作成功！")
							}), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", "对不起，操作失败：" + t.msg), $.jBox.hideloading()
						}
					})
				}
			}
		}), !1) : void HYD.hint("warning", "对不起，请选择要上架的数据！")
	})
});