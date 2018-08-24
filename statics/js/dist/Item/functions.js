$(function() {
	$(document).on("click", ".j-getedit", function(t) {
		$(this).siblings(".editinfo").show(), $(this).closest(".goodswrap").addClass("cur")
	}), $(document).on("click", ".Jcancel", function(t) {
		$(this).closest(".editinfo").hide(), $(this).closest(".goodswrap").removeClass("cur")
	}), $(document).on("click", ".j-geteditstock", function(t) {
		var i = $(this);
		$(this).closest(".stockwrap").addClass("cur").closest("tr").siblings("tr").find(".stockwrap").removeClass("cur");
		var e = 0,
			s = i.data("id");
		$.post("index.php?con=goods&act=ajax_itemSku", {
			id: s
		}, function(t) {
			if (1 == t.status) {
				var a = t.data;
				if (a.length > 0) {
					for (var n = 0; n < a.length; n++) {
						var c = a[n];
						e += parseInt(c.num)
					}
					var o = '<div class="skuprice style="left:0;""><i class="Jcancel">&times;</i><div>总库存：' + e + "</div>";
					$.each(a, function(t, i) {
						o += '<div class="sku-item"><label for=""><span>' + i.skuname + '：</span><input type="text" name="sku_num" value="' + i.num + '" /><input type="hidden" value="' + i.sku_id + '"></label></div>'
					})
				} else {
					var l = i.data("num"),
						o = '<div class="skuprice style="left:0;""><i class="Jcancel">&times;</i><div>总库存：' + l + "</div>";
					o += '<div class="sku-item"><label for=""><span>修改库存：</span><input type="text" class="mini" name="num" value="' + l + '" /></label></div>'
				}
				o += '<p><a href="javascript:;" class="j-safestock" title="保存修改库存"  data-id="' + s + '">保存</a></p></div>', i.closest(".stockwrap").append(o)
			} else HYD.hint("danger", t.msg)
		},'json')
	}), $(document).on("click", ".j-safestock", function(t) {
		var i = [],
			e = [],
			s = $(this).data("id"),
			a = $('.skuprice input[name="num"]').val();
		$(".skuprice").children(".sku-item").each(function() {
			var t = $(this).find('input[name="sku_num"]').val(),
				s = $(this).find('input[type="hidden"]').val();
			i.push(t), e.push(s)
		}), $.post("index.php?con=item&act=ajax_item_edit", {
			num: a,
			type: 3,
			item_id: s,
			sku_num: i,
			sku_id: e
		}, function(t) {
			1 == t.status ? (HYD.hint("success", "恭喜您，保存成功!"), setTimeout(function() {
				window.location.reload()
			}, 1e3)) : HYD.hint("danger", "对不起，保存失败：" + t.msg)
		},'json'), $(this).closest(".skuprice").remove()
	}), $(document).on("click", ".j-getprice", function(t) {
		var i = $(this);
		i.closest(".goodswrap").addClass("cur");
		var e = $(this).data("id"),
			s = '<div class="skuprice"><i class="Jcancel">&times;</i>';
		$.post("index.php?con=goods&act=ajax_itemSku", {
			id: e
		}, function(t) {
			if (1 == t.status) {
				var a = t.data,
					n = i.data("price");
				s += '<div class="sku-item"><label for=""><span>修改价格：</span><input type="text" class="mini" name="price" value="' + n + '" /></label></div>', a.length > 0 && $.each(a, function(t, i) {
					s += '<div class="sku-item"><label for=""><span>' + i.skuname + '：</span><input type="text" class="mini" name="sku_price" value="' + i.price + '" /><input type="hidden" value="' + i.sku_id + '"></label></div>'
				}), s += '<p><a href="javascript:;" class="j-safeprice" title="保存修改价格" data-id="' + e + '">保存</a></p></div>', i.closest(".goodswrap").append(s)
			} else HYD.hint("danger", t.msg)
		},'json')
	}), $(document).on("click", ".Jcancel", function(t) {
		$(this).closest(".skuprice").remove(), $(this).closest(".goodswrap,.stockwrap").removeClass("cur")
	}), $(document).on("click", ".j-safetitle", function(t) {
		var i = $(this).prev().html(),
			e = $(this).data("id");
		$.post("index.php?con=item&act=ajax_item_edit", {
			title: i,
			type: 1,
			item_id: e
		}, function(t) {
			1 == t.status ? (HYD.hint("success", "恭喜您，保存成功!"), setTimeout(function() {
				window.location.reload()
			}, 1e3)) : HYD.hint("danger", "对不起，保存失败：" + t.msg)
		},'json'), $(this).closest(".editinfo").hide(), $(this).closest(".goodswrap").removeClass("cur")
	}), $(document).on("click", ".j-safeprice", function(t) {
		var i = [],
			e = [],
			s = $(this).data("id"),
			a = $('.skuprice input[name="price"]').val();
		$(".skuprice").children(".sku-item").each(function() {
			var t = $(this).find('input[name="sku_price"]').val(),
				s = $(this).find('input[type="hidden"]').val();
			i.push(t), e.push(s)
		}), $.post("index.php?con=item&act=ajax_item_edit", {
			price: a,
			type: 2,
			item_id: s,
			sku_price: i,
			sku_id: e
		}, function(t) {
			1 == t.status ? (HYD.hint("success", "恭喜您，保存成功!"), setTimeout(function() {
				window.location.reload()
			}, 1e3)) : HYD.hint("danger", "对不起，保存失败：" + t.msg)
		},'json'), $(this).closest(".skuprice").remove(), $(this).closest(".goodswrap").removeClass("cur")
	}), $(document).on("click", ".j-geteditserial", function(t) {
		$(this).closest(".serialwrap").addClass("cur");
		var i = $(this).data("id"),
			e = $(this).data("serial"),
			s = '<div class="skuprice" style="left:0;"><i class="Jcancel">&times;</i><div>排序号：' + e + "</div>";
		s += '<div class="sku-item"><label for=""><span>修改排序：</span><input type="text" class="mini" name="serial" value="' + e + '" /></label></div>', s += '<p><a href="javascript:;" class="j-safeserial" title="保存修改排序"  data-id="' + i + '">保存</a></p></div>', $(this).closest(".serialwrap").append(s)
	}), $(document).on("click", ".j-safeserial", function(t) {
		var i = $(this).data("id"),
			e = $('.skuprice input[name="serial"]').val();
		$.post("index.php?con=item&act=ajax_item_edit", {
			serial: e,
			type: 4,
			item_id: i
		}, function(t) {
			1 == t.status ? (HYD.hint("success", "恭喜您，保存成功!"), setTimeout(function() {
				window.location.reload()
			}, 1e3)) : HYD.hint("danger", "对不起，保存失败：" + t.msg)
		},'json'), $(this).closest(".skuprice").remove()
	}), $(".j-geteditclassName").click(function() {
		var t = $(this),
			i = t.data("cid"),
			e = t.data("id");
		$.post("index.php?con=goods&act=ajax_shopClass", {}, function(t) {
			var t = "[object array]" == Object.prototype.toString.call(t).toLowerCase() ? t : $.parseJSON(t),
				s = _.template($("#tpl_item_class").html(), {
					data: t
				}),
				a = $(s);
			$.jBox.show({
				title: "请选择分类",
				width: 600,
				height: 600,
				content: a,
				onOpen: function() {
					if (i.length)
						for (var t = 0; t < i.length; t++)
							if (i[t]) {
								var e = i[t];
								a.find(".j-chang-firstfloor>label input").each(function() {
									var t = $(this).val();
									e == t && ($(this).attr("checked", !0), $(this).parents(".first_floor").addClass("on"))
								}), a.find(".j-change>label input").each(function() {
									var t = $(this).val();
									e == t && ($(this).attr("checked", !0), $(this).parents(".first_floor").find(".j-change").addClass("on"))
								}), a.find(".j-midchange>label input").each(function() {
									var t = $(this).val();
									e == t && ($(this).attr("checked", !0), $(this).parents(".mid_floor").find(".last_floor").addClass("on"), $(this).parents(".first_floor").find(".j-change").addClass("on"))
								})
							}
				},
				btnOK: {
					onBtnClick: function(t) {
						$.jBox.close(t);
						var i = [];
						t.find(" .j-chang-firstfloor>label>input").each(function() {
							var t = $(this).attr("checked"),
								e = $(this).val();
							t && i.push(e)
						}), t.find(" .j-change>label>input").each(function() {
							var t = $(this).attr("checked"),
								e = $(this).val();
							t && i.push(e)
						}), t.find(" .j-midchange>label>input").each(function() {
							var t = $(this).attr("checked"),
								e = $(this).val();
							t && i.push(e)
						});
						var s = i.join(",");
						$.ajax({
							url: "/Item/ajax_item_edit?v=" + Math.round(100 * Math.random()),
							type: "post",
							dataType: "json",
							data: {
								class_id: s,
								type: 5,
								item_id: e
							},
							beforeSend: function() {
								$.jBox.showloading()
							},
							success: function(t) {
								1 == t.status ? (HYD.hint("success", "恭喜您，保存成功！"), setTimeout(function() {
									window.location.reload()
								}, 1e3)) : HYD.hint("danger", "对不起，保存失败：" + t.msg), $.jBox.hideloading()
							}
						})
					}
				}
			})
		})
	}), $(document).on("click", ".j-first_floor,.j-mid_floor", function() {
		$(this).parent(".first_floor,.mid_floor").hasClass("on") ? $(this).text("+").parent(".first_floor,.mid_floor").removeClass("on") : $(this).text("-").parent(".first_floor,.mid_floor").addClass("on")
	}), $(document).on("change", ".j-change input", function(t) {
		var i = $(this).attr("checked"),
			e = $(this).parents(".first_floor");
		i && e.children("label").find("input").attr("checked", !0)
	}), $(document).on("change", ".j-midchange input", function(t) {
		var i = $(this).attr("checked"),
			e = $(this).parents(".mid_floor");
		i && e.children("label").find("input").attr("checked", !0)
	})
});