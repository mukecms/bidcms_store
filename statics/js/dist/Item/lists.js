$(function() {
	$(".j-qrcode").click(function() {
		var t = $(this).data("id");
		HYD.showQrcode("/Public/rwcode/item_id/" + t)
	}), $(".j-del").click(function() {
		var id = $(this).data("id");
		return $.jBox.show({
			title: "提示",
			content: _.template($("#tpl_jbox_simple").html(), {
				content: "删除后将不可恢复，是否继续？"
			}),
			btnOK: {
				onBtnClick: function(n) {
					$.jBox.close(n), $.ajax({
						url: "index.php?con=goods&act=del&v=" + Math.round(100 * Math.random()),
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
				onBtnClick: function(e) {
					$.jBox.close(e), $.ajax({
						url: "index.php?con=goods&act=del&v=" + Math.round(100 * Math.random()),
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
									$("#list"+i).remove();
								}
								
							}, 300)) : HYD.hint("danger", "对不起，删除失败：" + t.msg), $.jBox.hideloading()
						}
					})
				}
			}
		}), !1) : void HYD.hint("warning", "对不起，请选择要删除的数据！")
	}), $(".j-offshelf").click(function() {
		var t = $(this).data("id");
		return $.jBox.show({
			title: "提示",
			content: _.template($("#tpl_jbox_simple").html(), {
				content: "确认要下架此商品吗？"
			}),
			btnOK: {
				onBtnClick: function(n) {
					$.jBox.close(n), $.ajax({
						url: "/Item/offshelf?v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							id: t
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
		}), !1
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
				onBtnClick: function(e) {
					$.jBox.close(e), $.ajax({
						url: "/Item/batch_action?v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							id: t,
							action: "store_item"
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
	}), $(".j-recommend").click(function() {
		var t = $(this).data("id");
		return $.jBox.show({
			title: "提示",
			content: _.template($("#tpl_jbox_simple").html(), {
				content: "确认要将此商品置顶吗？"
			}),
			btnOK: {
				onBtnClick: function(n) {
					$.jBox.close(n), $.ajax({
						url: "/Item/ajaxItemRecommon?v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							id: t,
							type: "recommon"
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
		}), !1
	}), $(".j-commend").click(function() {
		var t = $(this).data("id");
		return $.jBox.show({
			title: "提示",
			content: _.template($("#tpl_jbox_simple").html(), {
				content: "确认要将此商品取消置顶吗？"
			}),
			btnOK: {
				onBtnClick: function(n) {
					$.jBox.close(n), $.ajax({
						url: "/Item/ajaxItemRecommon?v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							id: t,
							type: "common"
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
		}), !1
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
				onBtnClick: function(e) {
					$.jBox.close(e), $.ajax({
						url: "/Item/batch_action?v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							id: t,
							action: "display_item"
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
	}), $(".btn_table_groupAll").click(function() {
		var t = [],
			n = $(".table-ckbs:checked");
		return n.each(function() {
			t.push($(this).data("id"))
		}), t.length ? ($.jBox.show({
			title: "请选择商品分组",
			content: _.template($("#tpl_group_all").html()),
			btnOK: {
				onBtnClick: function(n) {
					$.jBox.close(n);
					var e = [];
					n.find(".J-group_ids:checked").each(function(t) {
						e.push($(this).val())
					}), $.ajax({
						url: "/Item/edit_group_all?v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							id: t,
							group_ids: e
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(t) {
							1 == t.status ? setTimeout(function() {
								window.location.reload()
							}, 1e3) : HYD.hint("danger", "对不起，操作失败：" + t.msg), $.jBox.hideloading()
						}
					})
				}
			}
		}), !1) : void HYD.hint("warning", "对不起，请选择要分组的商品！")
	}), $(".btn_table_setLevel").click(function() {
		var t = [],
			n = $(".table-ckbs:checked");
		return n.each(function() {
			t.push($(this).data("id"))
		}), t.length ? ($.jBox.show({
			title: "提示",
			content: _.template($("#tpl_level").html()),
			btnOK: {
				onBtnClick: function(e) {
					$.jBox.close(e);
					var o = e.find("input[name='join_level_discount']:checked").val();
					$.ajax({
						url: "/Item/join_level_discount?v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							id: t,
							join_level_discount: o
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(t) {
							1 == t.status ? (n.parents("tr").fadeOut(300, function() {
								HYD.hint("success", t.msg)
							}), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", "对不起，操作失败：" + t.msg), $.jBox.hideloading()
						}
					})
				}
			}
		}), !1) : void HYD.hint("warning", "对不起，请选择要批量开启或关闭会员等级折扣的商品！")
	}), $(".btn_table_pass").click(function() {
		var t = [],
			n = $(".table-ckbs:checked");
		return n.each(function() {
			t.push($(this).data("id"))
		}), t.length ? ($.jBox.show({
			title: "提示",
			content: _.template($("#tpl_jbox_simple").html(), {
				content: "您确认要通过吗？"
			}),
			btnOK: {
				onBtnClick: function(e) {
					$.jBox.close(e), $.ajax({
						url: "/Item/batch_action?v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							id: t,
							action: "supplier_pass"
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
		}), !1) : void HYD.hint("warning", "对不起，请选择要通过的数据！")
	}), $(".btn_table_defuse").click(function() {
		var t = [],
			n = $(".table-ckbs:checked");
		return n.each(function() {
			t.push($(this).data("id"))
		}), t.length ? ($.jBox.show({
			title: "提示",
			content: _.template($("#tpl_jbox_simple").html(), {
				content: "您确认要拒绝吗？"
			}),
			btnOK: {
				onBtnClick: function(e) {
					$.jBox.close(e), $.ajax({
						url: "/Item/batch_action?v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							id: t,
							action: "supplier_defuse"
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
		}), !1) : void HYD.hint("warning", "对不起，请选择要拒绝的数据！")
	}), $(".j-comment").click(function() {
		var t = $(this).data("id");
		$.jBox.show({
			title: "添加评论",
			content: _.template($("#tpl_comment").html()),
			btnOK: {
				onBtnClick: function(n) {
					$.jBox.close(n);
					var e = n.find("textarea[name='detail']").val(),
						o = n.find("input[name='user_name']").val(),
						a = n.find(".j-imglist-dataset").val(),
						i = n.find("input[name='create_time']").val();
					$.ajax({
						url: "/Item/ajax_comment?v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						beforeSend: function() {
							$.jBox.showloading()
						},
						data: {
							type_id: t,
							detail: e,
							user_name: o,
							file_path: a,
							create_time: i
						},
						success: function(t) {
							1 == t.status ? (HYD.hint("success", "恭喜，操作成功" + t.msg), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", "对不起，操作失败" + t.msg), $.jBox.hideloading()
						}
					})
				}
			}
		})
	}), $(".j-repurchase").click(function() {
		var t = $(this),
			n = t.data("id"),
			e = {price: 0,directOneMoney:"",directOneRate: "",directTwoMoney: "",directTwoRate: "",directThreeMoney: "",directThreeRate: "",fxCommission: "",agencyOneMoney: "",agencyOneRate: "",agencyTwoMoney: "",agencyTwoRate: "",agencyThreeMoney: "",agencyThreeRate: "",dlCommission: "",getLower: "",is_repurchase: 0,store_money: "",store_rate: "",is_store_commission: "",staff_money: "",staff_rate: "",is_staff_commission: ""};
		$.ajax({
			url: "index.php?con=item&act=repurchase",
			type: "get",
			dataType: "json",
			beforeSend: function() {
				$.jBox.showloading()
			},
			data: {
				item_id: n
			},
			success: function(t) {
				e = {
					price: t.data("price"),
					directOneMoney: t.directonemoney,
					directOneRate: t.directonerate,
					directTwoMoney: t.directtwomoney,
					directTwoRate: t.directtworate,
					directThreeMoney: t.directthreemoney,
					directThreeRate: t.directthreerate,
					fxCommission: t.fxcommission,
					agencyOneMoney: t.agencyonemoney,
					agencyOneRate: t.agencyonerate,
					agencyTwoMoney: t.agencytwomoney,
					agencyTwoRate: t.agencytworate,
					agencyThreeMoney: t.agencythreemoney,
					agencyThreeRate: t.agencythreerate,
					dlCommission: t.dlcommission,
					getLower: t.getlower,
					is_repurchase: t.is_repurchase,
					store_money: t.storemoney,
					store_rate: t.storerate,
					is_store_commission: t.storecommission,
					staff_money: t.staffmoney,
					staff_rate: t.staffrate,
					is_staff_commission: t.staffcommission
				};
			}
		});
		var o = _.template($("#tpl_repurchase").html(), {
				defaults: e
			}),
			a = $(o),
			i = a.find("input[name='repurchase_price']"),
			s = a.find("input[name='directly_money']"),
			c = a.find("input[name='directly_rate']"),
			d = a.find("input[name='superior_money']"),
			l = a.find("input[name='superior_rate']"),
			r = a.find("input[name='three_money']"),
			u = a.find("input[name='three_rate']"),
			h = a.find("input[name='dls_directly_money']"),
			f = a.find("input[name='dls_directly_rate']"),
			m = a.find("input[name='dls_superior_money']"),
			p = a.find("input[name='dls_superior_rate']"),
			j = a.find("input[name='dls_three_money']"),
			g = a.find("input[name='dls_three_rate']");
		$.jBox.show({
			title: "添加复购",
			content: a,
			onOpen: function(t) {
				$(".jbox-buttons").prepend("<a href='javascript:;'' class='jbox-buttons-ok btn btn-danger j-del'>清除</a>"), $(".j-del").click(function() {
					$.ajax({
						url: "index.php?con=item&act=repurchase&option=del",
						type: "post",
						dataType: "json",
						beforeSend: function() {
							$.jBox.showloading()
						},
						data: {
							item_id: n
						},
						success: function(t) {
							1 == t.status ? (HYD.hint("success", "恭喜，操作成功" + t.msg), setTimeout(function() {
								a.find("input").val(""), a.find("input:checked").removeAttr("checked"), $("label:contains('关闭')").find("input").attr("checked", "checked")
							}, 1e3)) : HYD.hint("danger", "对不起，操作失败" + t.msg), $.jBox.hideloading()
						}
					})
				})
			},
			btnOK: {
				onBtnClick: function(t) {
					var e = a.find('input[name="is_fx_commission"]:checked'),
						o = a.find("input[name='is_dl_commission']:checked"),
						_ = a.find("input[name='is_get_lower']:checked");
					$.jBox.close(t);
					var x = i.val(),
						b = s.val(),
						v = parseFloat(c.val()),
						w = d.val(),
						B = parseFloat(l.val()),
						y = r.val(),
						k = parseFloat(u.val()),
						D = e.val(),
						H = h.val(),
						Y = parseFloat(f.val()),
						T = m.val(),
						M = parseFloat(p.val()),
						O = j.val(),
						C = parseFloat(g.val()),
						I = o.val(),
						S = a.find("input[name='is_repurchase']:checked").val(),
						K = a.find("input[name='store_money']").val(),
						E = a.find("input[name='store_rate']").val(),
						F = a.find("input[name='is_store_commission']:checked").val(),
						A = a.find("input[name='staff_money']").val(),
						R = a.find("input[name='staff_rate']").val(),
						P = a.find("input[name='is_staff_commission']:checked").val(),
						z = _.val();
					$.ajax({
						url: "index.php?con=item&act=repurchase",
						type: "post",
						dataType: "json",
						beforeSend: function() {
							$.jBox.showloading()
						},
						data: {
							item_id: n,
							repurchase_price: x,
							directly_money: b,
							directly_rate: v,
							superior_money: w,
							superior_rate: B,
							three_money: y,
							three_rate: k,
							is_fx_commission: D,
							dls_directly_money: H,
							dls_directly_rate: Y,
							dls_superior_money: T,
							dls_superior_rate: M,
							dls_three_money: O,
							dls_three_rate: C,
							is_dl_commission: I,
							is_get_lower: z,
							commit: 1,
							is_repurchase: S,
							store_money: K,
							store_rate: E,
							is_store_commission: F,
							staff_money: A,
							staff_rate: R,
							is_staff_commission: P
						},
						success: function(t) {
							1 == t.status ? (HYD.hint("success", "恭喜，操作成功" + t.msg), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", "对不起，操作失败" + t.msg), $.jBox.hideloading()
						}
					})
				}
			}
		})
	}), $(document).on("click", ".img-list-add", function() {
		HYD.popbox.ImgPicker(function(t) {
			for (var n = "", e = $(".j-imglist-dataset").val(), o = 0; o < t.length; o++) n += '<li><img src="' + t[o] + '">​</li>', e += t[o] + ";";
			$(".img-list").prepend(n), $(".j-imglist-dataset").val(e)
		})
	}), $(".intem").click(function() {
		$(this).addClass("cur").siblings().removeClass("cur");
		var t = parseInt($(this).text());
		$.post("/Item/lists", {
			pagelist: t
		}, function(t) {
			window.location.href = ""
		})
	}), $(".j-update").click(function() {
		var t = $(this).data("id");
		$.jBox.show({
			title: "同步淘宝",
			content: "确认同步吗？",
			btnOK: {
				onBtnClick: function(n) {
					$.jBox.close(n), $.ajax({
						url: "/Item/updata_taobao_item?v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						beforeSend: function() {
							$.jBox.showloading()
						},
						data: {
							id: t
						},
						success: function(t) {
							1 == t.status ? (HYD.hint("success", "恭喜，操作成功" + t.msg), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", "对不起，操作失败" + t.msg), $.jBox.hideloading()
						}
					})
				}
			}
		})
	}), $(".j_alibaba").click(function() {
		var t = [],
			n = $(".table-ckbs:checked");
		return n.each(function() {
			t.push($(this).data("id"))
		}), t.length ? ($.jBox.show({
			title: "提示",
			content: _.template($("#tpl_import_item").html()),
			btnOK: {
				onBtnClick: function(e) {
					$.jBox.close(e);
					var o = e.find("select[name='shop_id']").val();
					$.ajax({
						url: "/Item/export_item_alibaba?v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							ids: t,
							shop_id: o
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(t) {
							1 == t.status ? (n.parents("tr").fadeOut(300, function() {
								HYD.hint("success", "恭喜您，导入成功" + t.data.success + "条，导入失败" + t.data.fail + "条")
							}), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", "对不起，操作失败：" + t.msg), $.jBox.hideloading()
						}
					})
				}
			}
		}), !1) : void HYD.hint("warning", "对不起，请选择要导入的商品！")
	}), $(".j_postfee").click(function() {
		var t = [],
			n = $(".table-ckbs:checked");
		if (n.each(function() {
				t.push($(this).data("id"))
			}), !t.length) return void HYD.hint("warning", "对不起，请选择要设置运费的商品！");
		var e = $("#tpl_post_fee").html(),
			o = $(e);
		return o.change(".j-feight", function() {
			var t = $(".j-feight-ipt"),
				n = $("#freight_tpl_id"),
				e = o.find(".j-feight:checked").val();
			switch (e) {
				case "1":
					t.attr("disabled", !0), n.attr("disabled", !0);
					break;
				case "2":
					t.attr("disabled", !1), n.attr("disabled", !0);
					break;
				case "3":
					t.attr("disabled", !0), n.attr("disabled", !1)
			}
		}), $.jBox.show({
			title: "批量设置运费",
			content: o,
			btnOK: {
				onBtnClick: function(e) {
					var a = o.find('input[name="freight_payer"]:checked'),
						i = o.find('input[name="post_fee"]'),
						s = o.find('select[name="freight_tpl_id"]'),
						c = a.val(),
						d = parseFloat(i.val()),
						l = s.val();
					if (2 == c) {
						if (isNaN(d) || 0 == d) return void HYD.FormShowError(i, "请填写正确的邮费")
					} else if (3 == c && 0 == l) return void HYD.FormShowError(s, "请选择运费模版");
					console.log(l), $.jBox.close(e), $.ajax({
						url: "/Item/setPostFee?v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							id: t,
							freight_payer: c,
							post_fee: d,
							freight_tpl_id: l
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
		}), !1
	}), $(".j-copyitem").click(function() {
		var t = $(this).data("id");
		return $.jBox.show({
			title: "提示",
			content: _.template($("#tpl_jbox_simple").html(), {
				content: "复制后,将会发布一款相同的商品,确认复制吗？"
			}),
			btnOK: {
				onBtnClick: function(n) {
					$.jBox.close(n), $.ajax({
						url: "/Item/copyItem?v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							id: t
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(t) {
							1 == t.status ? (HYD.hint("success", "恭喜您，复制成功！"), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", "对不起，复制失败：" + t.msg), $.jBox.hideloading()
						}
					})
				}
			}
		}), !1
	}), $(".batch_update_price").click(function() {
		var t = [],
			n = $(".table-ckbs:checked");
		if (n.each(function() {
				t.push($(this).data("id"))
			}), !t.length) return void HYD.hint("warning", "对不起，请选择要修改价格的商品！");
		var e = $("#tpl_item_price").html(),
			o = $(e);
		return $.jBox.show({
			title: "批量修改价格",
			content: o,
			btnOK: {
				onBtnClick: function(e) {
					var o = e.find('input[name="price"]').val(),
						a = e.find('select[name="type"]').val(),
						i = e.find('input[name="fixedPrice"]').val();
					$.jBox.close(e), $.ajax({
						url: "/Item/batchUpdatePrice?v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							ids: t,
							price: o,
							type: a,
							fixedPrice: i
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(t) {
							1 == t.status ? (n.parents("tr").fadeOut(300, function() {
								HYD.hint("success", "恭喜您，修改成功！")
							}), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", "对不起，修改失败：" + t.msg), $.jBox.hideloading()
						}
					})
				}
			}
		}), !1
	}), $(".batch_update_class").click(function() {
		var t = [],
			n = $(".table-ckbs:checked");
		return n.each(function() {
			t.push($(this).data("id"))
		}), t.length ? void $.post("index.php?con=goods&act=ajax_shopClass", {}, function(e) {
			var o = _.template($("#tpl_item_class").html(), {
					data: e
				}),
				a = $(o);
			return $.jBox.show({
				title: "批量修改分类",
				content: a,
				btnOK: {
					onBtnClick: function(e) {
						var o = [];
						e.find(" .j-chang-firstfloor>label>input").each(function() {
							var t = $(this).attr("checked"),
								n = $(this).val();
							t && o.push(n)
						}), e.find(" .j-change>label>input").each(function() {
							var t = $(this).attr("checked"),
								n = $(this).val();
							t && o.push(n)
						}), e.find(" .j-midchange>label>input").each(function() {
							var t = $(this).attr("checked"),
								n = $(this).val();
							t && o.push(n)
						});
						var a = o.join(",");
						$.jBox.close(e), $.ajax({
							url: "/Item/batchUpdateClass?v=" + Math.round(100 * Math.random()),
							type: "post",
							dataType: "json",
							data: {
								ids: t,
								class_id: a
							},
							beforeSend: function() {
								$.jBox.showloading()
							},
							success: function(t) {
								1 == t.status ? (n.parents("tr").fadeOut(300, function() {
									HYD.hint("success", "恭喜您，修改成功！")
								}), setTimeout(function() {
									window.location.reload()
								}, 1e3)) : HYD.hint("danger", "对不起，修改失败：" + t.msg), $.jBox.hideloading()
							}
						})
					}
				}
			}), !1
		}) : void HYD.hint("warning", "对不起，请选择要修改分类的商品！")
	}), $(".j-offshop").click(function() {
		var t = $(this).data("id");
		return $.jBox.show({
			title: "提示",
			content: _.template($("#tpl_jbox_simple").html(), {
				content: "确认要分销商在店中店手动上架该商品吗？"
			}),
			btnOK: {
				onBtnClick: function(n) {
					$.jBox.close(n), $.ajax({
						url: "/Item/offshelf?v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							id: t,
							type: 2
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
		}), !1
	}), $(".j-recoveryshop").click(function() {
		var t = $(this).data("id");
		return $.jBox.show({
			title: "提示",
			content: _.template($("#tpl_jbox_simple").html(), {
				content: "确认要恢复店中店手动上架的商品吗？"
			}),
			btnOK: {
				onBtnClick: function(n) {
					$.jBox.close(n), $.ajax({
						url: "/Item/offshelf?v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							id: t,
							type: 3
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
		}), !1
	}), $(".j-audit").click(function() {
		var t = $(this).data("id"),
			n = $(this).data("dz");
		if (0 == n) var e = "确定审核通过？";
		else var e = "确定拒绝审核通过？";
		return $.jBox.show({
			title: "提示",
			content: _.template($("#tpl_jbox_simple").html(), {
				content: e
			}),
			btnOK: {
				onBtnClick: function(e) {
					$.jBox.close(e), $.ajax({
						url: "/Item/handle_audit?v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							id: t,
							dz: n
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
		}), !1
	}), $(".btn_table_beOnShelves").click(function() {
		var t = [],
			n = $(".table-ckbs:checked");
		return n.each(function() {
			t.push($(this).data("id"))
		}), t.length ? ($.jBox.show({
			title: "提示",
			content: _.template($("#tpl_jbox_simple").html(), {
				content: "您确认要把商品移动到待上架列表吗？"
			}),
			btnOK: {
				onBtnClick: function(e) {
					$.jBox.close(e), $.ajax({
						url: "/Item/batch_action?v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							id: t,
							action: "be_on_shelves"
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
		}), !1) : void HYD.hint("warning", "对不起，请选择要待上架的数据！")
	})
});