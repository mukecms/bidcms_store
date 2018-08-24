$(function() {
	var t = $("#j-initdata").val();
	t = t.length ? $.parseJSON(t) : Defaults,$(".j-pagetitle").text(t.page.title), $(".j-pagetitle-ipt").val(t.page.title),
		_.each(t.PModules, function(t, a) {
			HYD.DIY.add(t)
		}), _.each(t.LModules, function(t) {
			HYD.DIY.add(t)
		}),
		function() {
			$(".diy-actions").find(".j-page-addModule").click(function() {
				$(".diy-ctrl-item").each(function() {
					var t = $(this),
						a = t.data("origin");
					"pagetitle" == a && ($("html,body").animate({
						scrollTop: "85px"
					}, 300), t.show().siblings().remove())
				})
			});
			var a = $(".j-page-hasMargin"),
				e = $("#diy-phone");
			a.length && (1 == t.page.hasMargin || "undefined" == typeof t.page.hasMargin ? (a.filter("[value=1]").attr("checked", !0), e.removeClass("noMargin")) : (a.filter("[value=0]").attr("checked", !0), e.addClass("noMargin")), a.change(function() {
				var t = $(this).val();
				1 == t ? e.removeClass("noMargin") : e.addClass("noMargin")
			}));
			var n = $("#j-page-backgroundColor");
			if (n.length) {
				var i = "#f8f8f8",
					o = $("#diy-contain");
				t.page.backgroundColor && (i = t.page.backgroundColor), n.css("backgroundColor", i).data("color", i), o.css("backgroundColor", i), n.ColorPicker({
					color: i,
					onShow: function(t) {
						return $(t).fadeIn(500), !1
					},
					onHide: function(t) {
						return $(t).fadeOut(500), !1
					},
					onChange: function(t, a, e) {
						var a = "#" + a;
						n.css("backgroundColor", a).data("color", a), o.css("backgroundColor", a)
					}
				})
			}
		}(),
		function() {
			function t(t) {
				var n = $.extend(!0, {}, e, t);
				$.ajax({
					url: 'index.php?con=shop&act=edit_home',
					type: "post",
					dataType: "json",
					data: {
						content: JSON.stringify(n.data),
						theme_id:$("#j-themeId").val(),
						update_id:$("#j-pageId").val(),
						bak_id:$("#j-bakId").val(),
						commit:1,
						is_preview: n.is_preview,
						is_backups: n.is_backups
					},
					beforeSend: function() {
						$.jBox.showloading()
					},
					success: function(t) {
						1 == t.status ? (HYD.hint("success", n.text_success), n.callback && n.callback(t)) : HYD.hint("danger", n.text_failed + t.msg), $.jBox.hideloading()
					}
				})
			}
			var e = {
				data: null,
				is_preview: 0,
				text_success: "恭喜您，保存成功！",
				text_failed: "对不起，保存失败：",
				callback: null
			};
			$("#j-savePage").click(function() {
				return t({
					data: HYD.DIY.Unit.getData()
				}), !1
			}), $("#j-saveAndPrvPage").click(function() {
				return t({
					data: HYD.DIY.Unit.getData(),
					is_preview: 1,
					callback: function(t) {
						setTimeout(function() {
							$.jBox.show({
								title: "预览商城",
								content: "<div style='text-align:center;'><img src='"+t.link+"'/><p>&nbsp;</p><p>使用手机扫描二维码预览商城</p></div>",
								width: 400,
								height: 400,
								btnOK: {
									show: !1
								},
								btnCancel: {
									show: !1
								},
							})
						}, 1e3)
					}
				}), !1
			}), $("#j-homeRecover").click(function() {
				return $.jBox.show({
					title: "还原模板",
					content: "确认还原为初始状态吗？你的装修内容将被清空且无法还原，请谨慎操作！",
					btnOK: {
						onBtnClick: function(e) {
							$.jBox.close(e), t({
								data: Defaults,
								text_success: "恭喜您，恢复成功！",
								text_failed: "对不起，恢复失败：",
								callback: function() {
									setTimeout(function() {
										window.location.reload()
									}, 1e3)
								}
							})
						}
					}
				}), !1
			});
			var n = {
					getTplsList: "index.php?con=shop&act=get_preview_list",
					editTpl: "index.php?con=shop&act=edit_preview"
				},
				i = "";
			$("#j-backups").click(function() {
				var e = [];
				return $.ajax({
					url: n.getTplsList,
					type: "post",
					dataType: "json",
					data: {},
					success: function(a) {
						1 == a.status && (e = a.list, i = _.template($("#tpl_popup_selectBackups").html(), {
							lists: a.list
						}), $.jBox.show({
							width: 500,
							height: 450,
							title: "装修备份",
							content: i,
							onOpen: function(e) {
								$("#Backups_list");
								$(e).find(".J_add_Backups").click(function() {
									var a = $(e).find(".J_noData");
									return $(e).find("ul li").length > 2 ? void HYD.hint("danger", "最多只能添加三个装修记录") : void t({
										data: HYD.DIY.Unit.getData(),
										is_backups: 1,
										text_success: "恭喜您，备份数据保存成功！",
										callback: function(t) {
											var n = _.template($("#tpl_popup_addBackups").html(), t.info);
											$(e).find("ul").append(n), a && a.remove()
										}
									})
								}), $(e).on("click", ".J-delData", function() {
									var t = $(this),
										e = t.data("id");
									$.jBox.show({
										title: "删除数据",
										content: '<div class="mgt30">确认删除此条备份内容？</div>',
										btnOK: {
											onBtnClick: function(i) {
												$.jBox.close(i), $.ajax({
													url: n.editTpl,
													type: "post",
													dataType: "json",
													data: {
														id: e,
														dotype: "del",
														commit:1
													},
													success: function() {
														1 == a.status ? t.parents("li").remove() : HYD.hint("danger", a.msg)
													}
												})
											}
										}
									})
								}), $(e).on("click", ".J-rename", function() {
									var t = $(this),
										a = t.text();
									t.removeClass("J-rename"), t.html('<input type="text" value="' + a + '" class="input J-alias" />'), t.find(".J-alias").focus()
								}), $(e).on("change", ".J-alias", function() {
									var t = $(this),
										a = t.val(),
										e = t.parent().data("id");
									$.ajax({
										url: n.editTpl,
										type: "post",
										dataType: "json",
										data: {
											name: a,
											id: e,
											commit:1,
											dotype: "save_name"
										},
										success: function(t) {
											1 == t.status ? HYD.hint("success", t.msg) : HYD.hint("danger", t.msg)
										}
									})
								}), $(e).on("blur", ".J-alias", function() {
									var t = $(this),
										a = t.val();
									t.parents("h2").addClass("J-rename"), t.parents("h2").html(a + '<i class="edit-rename J-edit-rename"></i>')
								})
							},
							btnOK: {
								show: !1
							},
							btnCancel: {
								show: !1
							}
						}))
					}
				}), !1
			})
		}()
});
