$(function() {
	function t(t) {
		var e = "";
		return 0 == t.length ? "" : (e = t.replace(/&/g, "&amp;"), e = e.replace(/</g, "&lt;"), e = e.replace(/>/g, "&gt;"), e = e.replace(/ /g, "&nbsp;"), e = e.replace(/\'/g, "&#39;"), e = e.replace(/\"/g, "&quot;"))
	}
	HYD.ItemAdd.norms = JSON.parse($("#j-normsVal").val()), 
	HYD.ItemAdd.props = JSON.parse($("#j-propsVal").val()), 
	HYD.ItemAdd.sku = JSON.parse($("#j-skuVal").val()), 
	HYD.ItemAdd.skuCache = JSON.parse($("#j-skuVal").val()), 
	HYD.ItemAdd.skustyle = {skustyle: $(".j-skustyle:checked").val()}, 
	HYD.ItemAdd.skuimg = JSON.parse($("#js-colorImg").val());
	var initNorms = function() {
		var t = $("#tpl_add_step2_normslist").html(),
			e = _.template(t, {
				dataset: HYD.ItemAdd.norms,
				props: HYD.ItemAdd.props
			});
		$(".normsPanel .normslist").remove(), 
		$(e).insertBefore("#j-addNorms"), 
		HYD.ItemAdd.norms.length < 5 ? $("#j-addNorms").show() : $("#j-addNorms").hide()
		$("#j-normsVal").val(JSON.stringify(HYD.ItemAdd.norms));
		$("#j-propsVal").val(JSON.stringify(HYD.ItemAdd.props));
		$("#j-skuVal").val(JSON.stringify(HYD.ItemAdd.sku));
		
	},
	a = function() {
		var t = $("#tpl_add_step2_sku").html(),
			e = _.template(t, {
				sku: HYD.ItemAdd.sku,
				norms: HYD.ItemAdd.norms,
				props: HYD.ItemAdd.props
			});
		$("#j-skuPanel .wxtables").remove(), 
		$("#j-skuPanel").append(e), 
		$(".J-options-slideToggle").on("click", function() {
			$(this).parent().children(".setfxs-box").toggle(), $("#setfxs-box-overlay").toggle()
		}), m()
	};
	var n = function(t, e) {
		if (HYD.ItemAdd.skuCache[t]) HYD.ItemAdd.sku[t] = HYD.ItemAdd.skuCache[t];
		else {
			var a = t.split(";"),
				n = a.join("-"),
				s = $('input[name="original_price"]').val(),
				i = $('input[name="price"]').val();
			HYD.ItemAdd.skuCache[t] = HYD.ItemAdd.sku[t] = {
				o_price: s,
				price: i,
				stock: 0,
				code: "",
				salenum: 0,
				props: a,
				rank_props: n,
				rank_price: []
			}
		}
	},
	s = function(t, e, a, n) {
		var s = !0;
		return a.each(function() {
			var e = $(this),
				a = e.find("span").text();
			a == t && (s = !1)
		}), s ? void $.ajax({
			url: "index.php?con=sku&act=ajax_props&v=" + Math.round(100 * Math.random()),
			type: "post",
			dataType: "json",
			data: {
				id: e,
				text: t
			},
			success: function(t) {
				var e = {
					key: t.key,
					val: t.text
				};
				n && n(e)
			}
		}) : void HYD.hint("danger", "该属性值已存在！")
	},
	i = function() {
		var t = [];
		_.each(HYD.ItemAdd.norms, function(e) {
			e.props.length && t.push(e.props)
		});
		HYD.ItemAdd.sku = {}
		switch (t.length) {
			case 1:
				for (var e = 0; e < t[0].length; e++) {
					var a = [t[0][e]];
					n(a.join(";"))
				}
				break;
			case 2:
				for (var e = 0; e < t[0].length; e++)
					for (var s = 0; s < t[1].length; s++) {
						var a = [t[0][e], t[1][s]];
						n(a.join(";"))
					}
				break;
			case 3:
				for (var e = 0; e < t[0].length; e++)
					for (var s = 0; s < t[1].length; s++)
						for (var i = 0; i < t[2].length; i++) {
							var a = [t[0][e], t[1][s], t[2][i]];
							n(a.join(";"))
						}
				break;
			case 4:
				for (var e = 0; e < t[0].length; e++)
					for (var s = 0; s < t[1].length; s++)
						for (var i = 0; i < t[2].length; i++)
							for (var r = 0; r < t[3].length; r++) {
								var a = [t[0][e], t[1][s], t[2][i], t[3][r]];
								n(a.join(";"))
							}
				break;
			case 5:
				for (var e = 0; e < t[0].length; e++)
					for (var s = 0; s < t[1].length; s++)
						for (var i = 0; i < t[2].length; i++)
							for (var r = 0; r < t[3].length; r++)
								for (var o = 0; o < t[4].length; o++) {
									var a = [t[0][e], t[1][s], t[2][i], t[3][r], t[4][o]];
									n(a.join(";"))
								}
		}
	},
	r = function() { //批量添加库存
		var t = $("#j-totalStock");
		num=parseInt(t.val());
		if (HYD.ItemAdd.norms.length) {
			for (var a in HYD.ItemAdd.sku) num += parseInt(HYD.ItemAdd.sku[a].stock);
			t.val(num)
		}
	};
	$(document).on("click", "#j-addNorms", function() {
		var t = {
			name: "规格名称",
			props: []
		};
		return $.ajax({
			url: "index.php?con=sku&act=ajax_norms&vv=" + Math.round(100 * Math.random()),
			type: "post",
			dataType: "json",
			data: t,
			success: function(n) {
				t.name = n.text, t.id = n.key, HYD.ItemAdd.norms.push(t), i(), initNorms(), a(), r()
			}
		}), !1
	}), 
	$(document).on("click", ".j-delNorms", function() {
		var t = $(this).parents(".normslist").index();
		$(this).parents(".normslist").data("id");
		return HYD.ItemAdd.norms.splice(t, 1), $("#j-skuImg").empty(), i(), initNorms(), a(), r(), !1
	}), 
	$(document).on("change", ".j-normsName", function() {
		var t = $(this).val(),
			n = $(this).parents(".normslist").data("index"),
			s = $(this).data("originalid");
		$.ajax({
			url: "index.php?con=sku&act=ajax_norms&vv=" + Math.round(100 * Math.random()),
			type: "post",
			dataType: "json",
			data: {
				name: t,
				oid: s
			},
			success: function(t) {
				HYD.ItemAdd.norms[n].name = t.text, HYD.ItemAdd.norms[n].id = t.key, i(), initNorms(), a()
			}
		});
		var r = $(".goods_norms").find("dl .j-normsName").val(),
			o = /颜色/g,
			d = o.test(r);
		return d || $("#j-skuImg").empty(), !1
	}), 
	$(document).on("click", ".j-addNormsVal", function() {
		var t = $(this).parents(".normslist").data("index"),
			n = $(this).siblings(".j-addNormsVal-ipt").val(),
			o = $(this).parents(".normslist").data("id"),
			d = $(this).siblings(".labelList-sku").find("li");
		if (n && "" != n) return s(n, o, d, function(n) {
			HYD.ItemAdd.props[n.key] = n.val, 
			HYD.ItemAdd.norms[t].props.push(n.key), 
			i(), initNorms(), a(), r(), m();
		}), !1
	}), 
	$(document).on("click", ".j-delNormsVal", function() {
		var t = parseInt($(this).parents(".normslist").data("index")),
			n = parseInt($(this).data("index")),
			id=$(this).data("vid");
		delete HYD.ItemAdd.props[id];
		HYD.ItemAdd.norms[t].props.splice(n, 1), i(), initNorms(), a(), r(), m();
		return  !1
	}), 
	$(document).on("change", ".j-price-modify", function() {
		var n = $(this).val(),
			s = $(this).data("name"),
			o = $(this).parents("tr").data("key");
		return HYD.ItemAdd.skuCache[o][s] = HYD.ItemAdd.sku[o][s] = t(n), i(), initNorms(), a(), r(), !1
	}), 
	$("#j-lotSetStock").click(function() {
		$.jBox.show({
			title: "批量设置库存",
			content: $("#tpl_add_step2_lotSetStock").html(),
			onOpen: function(t) {
				t.find("input[name=lotSetStock]").focus()
			},
			btnOK: {
				onBtnClick: function(t) {
					var e = t.find("input[name=lotSetStock]").val() || 0;
					$("#j-skuPanel table").find("input[data-name='stock']").each(function() {
						var t = $(this).data("name"),
							a = $(this).parents("tr").data("key");
						HYD.ItemAdd.skuCache[a][t] = HYD.ItemAdd.sku[a][t] = e, 
						$(this).val(e)
					}), r(),initNorms(),$.jBox.close(t)
				}
			}
		})
	}), 
	$("#j-lotSetPrice").click(function() {
		$.jBox.show({
			title: "批量设置价格",
			content: $("#tpl_add_step2_lotSetPrice").html(),
			onOpen: function(t) {
				t.find("input[name=o_price]").focus()
			},
			btnOK: {
				onBtnClick: function(t) {
					var e = {
						o_price: t.find("input[name=o_price]").val(),
						price: t.find("input[name=price]").val(),
						supplier_price: t.find("input[name=supplier_price]").val()
					};
					$("#j-skuPanel table").find("input[data-name='o_price'],input[data-name='price'],input[data-name='supplier_price']").each(function() {
						var t = $(this).data("name"),
							a = $(this).parents("tr").data("key");
						HYD.ItemAdd.skuCache[a][t] = HYD.ItemAdd.sku[a][t] = e[t], $(this).val(e[t])
					}), r(),initNorms(),$.jBox.close(t)
				}
			}
		})
	}), 
	$("#j-lotSetVipPrice").click(function() {
		var t = $("#j-skuPanel>table .setfxs-box").eq(0).html();
		"undefined" == typeof t ? t = "请先添加SKU数据" : t, $.jBox.show({
			title: "批量设置会员价",
			content: t,
			onOpen: function(t) {
				t.find("input").val(0), t.find("input").eq(0).focus()
			},
			btnOK: {
				onBtnClick: function(t) {
					var e = {
						rank_price: {}
					};
					t.find("input").each(function() {
						var t = $(this).data("num"),
							a = $(this).val();
						e.rank_price[t] = a
					}), $("#j-skuPanel>table .setfxs-box").find("input").each(function() {
						var t = $(this),
							a = $(this).data("num");
						t.val(e.rank_price[a])
					}), r(),initNorms(),$.jBox.close(t)
				}
			}
		})
	}), 
	$(document).on("click", ".j-title-selectimg", function(t) {
		var n = $(this);
		n.parents("tr").data("key");
		HYD.popbox.ImgPicker(function(t) {
			n.find("img").attr("src", t[0]), i(), initNorms(), a(), r()
		})
	});
	var m = function(t) {
		var colorImg = [],n = t || $(".goods_norms dl:first");
		n.find(".labelList-sku li").each(function(t, e) {
			var n = $(this).find("span").text(),
				s = $(this).find(".j-delNormsVal").data("vid");
			colorImg.push({}), 
			colorImg[t].sku_id = s, 
			colorImg[t].sku_name = n, 
			colorImg[t].sku_img = HYD.ItemAdd.skuimg[s] ? HYD.ItemAdd.skuimg[s] : "/statics/images/small_pic.png"
		});
		if(colorImg.length>0){
			$("#j-skuImgWrapper").show();
			var o = $("#tpl_imgskulist").html(),
			d = _.template(o, {
				data: colorImg
			});
			$("#j-skuImg").html(d);
			$(document).on("click", ".j-getskuimg", function(t) {
				var e = $(this),a = e.data("skuid");
				HYD.popbox.ImgPicker(function(t) {
					e.closest("td").prev("td").find("img").attr("src", t[0]), HYD.ItemAdd.skuimg[a] = t[0], $('#js-colorImg').val(JSON.stringify(HYD.ItemAdd.skuimg))
				})
			})
		} else {
			$("#j-skuImgWrapper").hide();
		}
	};
	$("#setfxs-box-overlay").click(function() {
		$(".setfxs-box").hide(), $(this).hide()
	});
	m(), initNorms(), a(), r();
});
