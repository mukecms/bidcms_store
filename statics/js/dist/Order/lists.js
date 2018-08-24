$(function() {
	$(".j-close").click(function() {
		var e = $(this).data("id");
		return $.jBox.show({
			title: "提示",
			content: _.template($("#tpl_jbox_simple").html(), {
				content: "关闭后将不可恢复，是否继续？"
			}),
			btnOK: {
				onBtnClick: function(n) {
					$.jBox.close(n), $.ajax({
						url: "/Order/cancle_order?v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							id: e,
							action: "cancle"
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(e) {
							1 == e.status ? (HYD.hint("success", "恭喜您，订单已关闭！"), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", "对不起，订单关闭失败：" + e.msg), $.jBox.hideloading()
						}
					})
				}
			}
		}), !1
	}), $(".btn_table_closeAll").click(function() {
		var e = [],
			n = $(".table-ckbs:checked");
		return n.each(function() {
			e.push($(this).data("id"))
		}), e.length ? ($.jBox.show({
			title: "提示",
			content: _.template($("#tpl_jbox_simple").html(), {
				content: "关闭后将不可恢复，是否继续？"
			}),
			btnOK: {
				onBtnClick: function(i) {
					$.jBox.close(i), $.ajax({
						url: "/Order/cancleAll?v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							id: e
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(e) {
							1 == e.status ? n.parents("tr").fadeOut(300, function() {
								HYD.hint("success", "恭喜您，订单已关闭！")
							}) : HYD.hint("danger", "对不起，关闭订单失败：" + e.msg), $.jBox.hideloading()
						}
					})
				}
			}
		}), !1) : void HYD.hint("warning", "对不起，请选择要关闭的订单！")
	}),
	$(".j-modify").click(function() {
		var e = $(this).data("id");
		$.post("?con=orders&act=ajax_order_list", {
			order_id: e
		}, function(n) {
			if(n.status!="1"){
				return false;
			}
			var n = n.data,
				i = _.template($("#tpl_order_lists_modify").html(), n),
				a = $(i),
				t = function() {
					n.riseOrDrop = parseFloat(a.find(".j-modify-riseOrDrop").val());
					var e = a.find(".j-modify-freightipt"),
						i = a.find(".j-modify-ptout-freight");
					0 == a.find(".j-modify-freight:checked").val() ? (n.freight = 0, i.text("包邮"), e.attr("disabled", !0)) : (n.freight = parseFloat(e.val()), i.text("(包含" + n.freight + "元邮费)"), e.attr("disabled", !1));
					n.realPrice = parseFloat(n.orderPrice)+ n.freight + n.riseOrDrop
					a.find(".j-modify-ptout-realPrice").text(n.realPrice.toFixed(2));
				};
			a.find(".j-modify-riseOrDrop,.j-modify-freight,.j-modify-freightipt").change(t), $.jBox.show({
				width: 500,
				title: "修改订单价格",
				content: a,
				btnOK: {
					onBtnClick: function(i) {
						$.jBox.close(i), $.ajax({
							url: "?con=orders&act=edit_order&v=" + Math.round(100 * Math.random()),
							type: "post",
							dataType: "json",
							data: {
								commit:1,
								rise: n.riseOrDrop,
								freight:n.freight,
								id: e
							},
							beforeSend: function() {
								$.jBox.showloading()
							},
							success: function(e) {
								1 == e.status ? (HYD.hint("success", "恭喜您，订单价格修改成功！"), setTimeout(function() {
									window.location.reload()
								}, 1e3)) : HYD.hint("danger", "对不起，订单价格修改失败：" + e.msg), $.jBox.hideloading()
							}
						})
					}
				}
			})
		})
	}),
	$(".j-item-sku").click(function() {
		var e = $(this).data("id");
		$.post("?con=orders&act=get_order_sku", {
			order_id: e
		}, function(n) {
			var i = _.template($("#tpl_order_lists_sku").html(), n),
				a = $(i);
			$.jBox.show({
				width: 600,
				title: "修改规格",
				content: a,
				btnOK: {
					onBtnClick: function(n) {
						$.jBox.close(n);
						var i = [],
							a = [];
						n.find("select[name='sku_id[]']").each(function() {
							i.push($(this).val()), a.push($(this).siblings("input[name='item_id[]']").val())
						}), $.ajax({
							url: "?con=orders&act=update_order_sku&v=" + Math.round(100 * Math.random()),
							type: "post",
							dataType: "json",
							data: {
								id: e,
								sku_ids: i,
								item_ids: a
							},
							beforeSend: function() {
								$.jBox.showloading()
							},
							success: function(e) {
								1 == e.status ? (HYD.hint("success", "恭喜您，修改成功！"), setTimeout(function() {
									window.location.reload()
								}, 1e3)) : HYD.hint("danger", "对不起，修改失败：" + e.msg), $.jBox.hideloading()
							}
						})
					}
				}
			})
		})
	}),
	$(".j-order-deliver").click(function() {
			var e = $(this).data("id"),
				n = $(this).data("selfid"),
				m = $(this).data("express"),
				i = $(this).data("no"),
				a = $(this).data("name");
				data = {
					self_id: n,
					express: m,
					express_no: i,
					express_name: a
				},
				a = _.template($("#tpl_order_lists_deliver").html(), data),
				t = $(a);
				10 == m ? t.find(".express_class").removeClass("hide") : t.find(".express_class").addClass("hide"),
				o = t.find('input[name="is_self_take"]:checked').val();
				change_deliver(t, o),
				t.change(".send_deliver", function() {
					var e = t.find(".send_deliver").val();
					10 == e ? t.find(".express_class").removeClass("hide") : t.find(".express_class").addClass("hide")
				}),
				t.change('input[name="is_self_take"]', function() {
					var e = t.find('input[name="is_self_take"]:checked').val();
					change_deliver(t, e)
				}),
				$.jBox.show({
				width: 600,
				height: 260,
				title: "标记发货",
				content: t,
				btnOK: {
					onBtnClick: function(n) {
						var i = t.find("select[name='deliver_wuliu']"),
							a = t.find("input[name='deliver_number']"),
							o = t.find("input[name='express_name']"),
							d = t.find("input[name='is_self_take']:checked"),
							s = t.find("select[name='self_address_id']"),
							r = i.val(),
							l = o.val(),
							c = a.val(),
							f = d.val(),
							h = s.val();
						if (0 == f) {
							if ("" == r) return void HYD.FormShowError(i, "请选择物流公司");
							if ("" == c) return void HYD.FormShowError(a, "请输入快递单号")
						} else if (1 == f) {
							if (0 > h) return void HYD.FormShowError(s, "请选择自提地址");
						}
						$.jBox.close(n), $.ajax({
							url: "?con=orders&act=send_goods&v=" + Math.round(100 * Math.random()),
							type: "post",
							dataType: "json",
							data: {
								commit:1,
								id: e,
								express: r,
								express_name: l,
								express_no: c,
								is_self_take: f,
								self_address_id: h
							},
							beforeSend: function() {
								$.jBox.showloading()
							},
							success: function(e) {
								1 == e.status ? (HYD.hint("success", "恭喜您，标记发货成功！"), setTimeout(function() {
									window.location.reload()
								}, 1e3)) : HYD.hint("danger", "对不起，标记发货失败：" + e.msg), $.jBox.hideloading()
							}
						})
					}
				}
			})
	}),
	$(".j-no-deliver").click(function() {
		var e = $(this).data("id");

		$.jBox.show({
			width: 500,
			title: "标记发货",
			content: _.template($("#tpl_jbox_simple").html(), {
				content: "确认发货吗？"
			}),
			btnOK: {
				onBtnClick: function(n) {
					$.jBox.close(n), $.ajax({
						url: "?con=orders&act=send_order&v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							commit:1,
							id: e
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(e) {
							1 == e.status ? (HYD.hint("success", "恭喜您，标记发货成功！"), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", "对不起，标记发货失败：" + e.msg), $.jBox.hideloading()
						}
					})
				}
			}
		})
	}),
	//退货审核
	$(".j-refundOk").click(function() {
		var e = $(this).data("id");
		a = _.template($("#tpl_order_refund").html(), {}),
		t = $(a),
		$.jBox.show({
			width: 500,
			title: "确认退货操作",
			content: t,
			btnOK: {
				onBtnClick: function(n) {
					$.jBox.close(n), $.ajax({
						url: "?con=orders&act=refund_order&v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							commit:1,
							id: e,
							status:t.find("input[name='is_ok']").val(),
							remark:t.find("textarea").val()
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(e) {
							1 == e.status ? (HYD.hint("success", "恭喜您，操作成功！"), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", "对不起，操作失败：" + e.msg), $.jBox.hideloading()
						}
					})
				}
			}
		})
	}),
	$(".intem").click(function() {
		$(this).addClass("cur").siblings().removeClass("cur");
		var e = parseInt($(this).text());
		$.post("/Order/lists", {
			pagelist: e
		}, function(e) {
			window.location.href = ""
		})
	}),
	$(".j-order-express").click(function() {
		var e = $(this).data("id"),
			n = $(this).data("express"),
			i = $(this).data("no"),
			a = $(this).data("name"),
			t = {
				express: n,
				express_no: i,
				express_name: a
			},
			o = _.template($("#tpl_order_lists_express").html(), t),
			d = $(o);
		10 == n ? d.find(".express_class").removeClass("hide") : d.find(".express_class").addClass("hide"), d.change(".send_deliver", function() {
			var e = d.find(".send_deliver").val();
			10 == e ? d.find(".express_class").removeClass("hide") : d.find(".express_class").addClass("hide")
		}), $.jBox.show({
			width: 500,
			title: "修改快递信息",
			content: d,
			btnOK: {
				onBtnClick: function(n) {
					var i = d.find("select[name='deliver_wuliu']"),
						a = d.find("input[name='deliver_number']"),
						t = d.find("input[name='express_name']"),
						o = i.val(),
						s = t.val(),
						r = a.val();
					return "" == o ? void HYD.FormShowError(i, "请选择物流公司") : "" == r ? void HYD.FormShowError(a, "请输入快递单号") : ($.jBox.close(n), void $.ajax({
						url: "/Order/ajaxSaveExpressno?v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							id: e,
							express: o,
							express_name: s,
							express_no: r
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(e) {
							1 == e.status ? (HYD.hint("success", "恭喜您，修改成功！"), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", "对不起，修改失败：" + e.msg), $.jBox.hideloading()
						}
					}))
				}
			}
		})
	}),
	$(".j-confirm-order").click(function() {
		var e = $(this).data("id");
		return $.jBox.show({
			title: "提示",
			content: _.template($("#tpl_jbox_simple").html(), {
				content: "确认标记收货吗？"
			}),
			btnOK: {
				onBtnClick: function(n) {
					$.jBox.close(n), $.ajax({
						url: "?con=orders&act=confirm_order&v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							commit:1,
							id: e
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(e) {
							1 == e.status ? (HYD.hint("success", "恭喜您，操作成功！"), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", "对不起，操作失败：" + e.msg), $.jBox.hideloading()
						}
					})
				}
			}
		}), !1
	}),
	$(".j-update-address").click(function() {
		var e = $(this).data("id"),
			n = $(this).data("name"),
			i = $(this).data("mobile"),
			a = $(this).data("address"),
			t = {
				name: n,
				mobile: i,
				address: a
			},
			o = _.template($("#tpl_order_lists_address").html(), t),
			d = $(o);
		$.jBox.show({
			width: 500,
			title: "修改收货地址",
			content: d,
			btnOK: {
				onBtnClick: function(n) {
					var i = d.find("input[name='name']"),
						a = d.find("input[name='mobile']"),
						t = d.find("input[name='address']"),
						o = i.val(),
						s = a.val(),
						r = t.val();
					return "" == o ? void HYD.FormShowError(i, "收货人姓名不能为空") : "" == s ? void HYD.FormShowError(a, "手机号不能为空") : "" == r ? void HYD.FormShowError(t, "收货地址不能为空") : ($.jBox.close(n), void $.ajax({
						url: "?con=orders&act=change_address&v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							commit:1,
							id: e,
							name: o,
							mobile: s,
							address: r
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(e) {
							1 == e.status ? (HYD.hint("success", "恭喜您，修改成功！"), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", "对不起，修改失败：" + e.msg), $.jBox.hideloading()
						}
					}))
				}
			}
		})
	}), $(".J_province").change(function() {
		var e = $(this).val(),
			n = '<option value="0">所有城市</option>';
		pickerCity(e, function(e) {
			$.each(e, function(e, i) {
				n += "<option value='" + i.city_id + "'>" + i.city_name + "</option>"
			}), $(".J_city").empty().append(n), $(".J_area").empty().append('<option value="0">所有区域</option>')
		})
	}), $(".J_city").change(function() {
		var e = $(this).val(),
			n = '<option value="0">所有区域</option>';
		pickerArea(e, function(e) {
			$.each(e, function(e, i) {
				n += "<option value='" + i.area_id + "'>" + i.area_name + "</option>"
			}), $(".J_area").empty().append(n)
		})
	})
});
var pickerCity = function(e, n) {
		$.ajax({
			url: "?con=api&act=getCity&v=" + Math.round(100 * Math.random()),
			type: "post",
			dataType: "json",
			data: {
				province_id: e
			},
			success: function(e) {
				1 == e.status && n && n(e.data)
			}
		})
	},
	pickerArea = function(e, n) {
		$.ajax({
			url: "?con=api&act=getArea&v=" + Math.round(100 * Math.random()),
			type: "post",
			dataType: "json",
			data: {
				city_id: e
			},
			success: function(e) {
				1 == e.status && n && n(e.data)
			}
		})
	},
	change_deliver = function(e, n) {
		if (1 == n) {
			e.find(".J_express_company").addClass("hide"), e.find(".express_class").addClass("hide"), e.find(".J_select_address").removeClass("hide");

		} else {
			e.find(".J_express_company").removeClass("hide"),e.find(".J_select_address").addClass("hide");
			var n = e.find(".send_deliver").val();
			10 == n ? e.find(".express_class").removeClass("hide") : e.find(".express_class").addClass("hide")
		}
	};
