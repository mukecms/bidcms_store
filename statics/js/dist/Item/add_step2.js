$(function() {
	function t() {
		var t = $("input[name=title]").val();
		if ("" == t) return HYD.hint("danger", "对不起，商品标题不能为空！"), $("input[name=title]").focus(), !1;
		var i = $("#supplier").val(),
			e = $("#supplierclass2").val();
		if (i && e <= 0) return HYD.hint("danger", "对不起，供应商分类不能为空！"), $("input[name=title]").focus(), !1;
		var a = $("input[name=item_presale]:checked").val();
		if (1 == a) {
			var n = $("input[name=presale_end_time]").val(),
				s = $("input[name=start_delivery_time]").val(),
				l = $("input[name=end_delivery_time]").val();
			if (!n) return HYD.hint("danger", "对不起，请填写商品预售结束时间！"), $("input[name=item_presale]").focus(), !1;
			if (!s && !l) return HYD.hint("danger", "对不起，请填写预计发货时间！"), $("input[name=start_delivery_time]").focus(), !1;
			if (s && l && s > l) return HYD.hint("danger", "对不起，请填写正确的预计发货时间！"), $("input[name=start_delivery_time]").focus(), !1
		}
		var o = $("input[name=original_price]").val();
		if ("0.00" == o || !o) return HYD.hint("danger", "对不起，请填写商品原价！"), $("input[name=original_price]").focus(), !1;
		var r = $("input[name=price]").val();
		if ("" == r) return HYD.hint("danger", "对不起，请填写商品现价！"), $("input[name=price]").focus(), !1;
		var d = $("input[name=num]").val();
		if (!d) return HYD.hint("danger", "对不起，请填写商品库存！"), $("input[name=num]").focus(), !1;
		var c = $("input[name=buy_url]").val();
		if (0!=$("#buy_method").val()) {
			var f = /^([a-zA-Z]+:\/\/)*(\w+)\.(\w+(\.\w+))*(\/\w+)*(\?\S*)*/;
			if (!c || !f.test(c)) return HYD.hint("danger", "对不起，请填写正确的外部购买地址！"), $("input[name=buy_url]").focus(), !1
		}
		var u = $(":radio[name='freight_payer']:checked").val();
		$("#freight_tpl_id").val();
		return !(3 == u && !$("#freight_tpl_id").val()) || (HYD.hint("danger", "对不起，请选择运费模板！"), $("#freight_tpl_id").focus(), !1)
	}

	function i(t) {
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
		}), $("#class_id").val(JSON.stringify(i));
		for (var e = [], a = "", n = t.find(".first_floor").length, s = 0; s < n; s++) {
			var l = t.find(".first_floor").eq(s).find(".t1:checked").siblings("span").text(),
				o = t.find(".first_floor").eq(s).find(".t1:checked");
			if ("" != l && (a = l), o.parents("label").siblings(".mid_floor").length > 0 && o.parents("label").siblings(".mid_floor").find(".t2:checked").length > 0)
				for (var r = o.parents("label").siblings(".mid_floor").length, d = 0; d < r; d++) {
					var c = o.parents("label").siblings(".mid_floor").eq(d).find(".t2:checked"),
						h = c.siblings("span").text();
					if ("" != h && (a = l + ">" + h), c.parents("label").siblings(".last_floor").length > 0 && c.parents("label").siblings(".last_floor").find(".t3:checked").length > 0)
						for (var f = c.parents("label").siblings(".last_floor").length, u = 0; u < f; u++) {
							var p = c.parents("label").siblings(".last_floor").eq(u).find(".t3:checked"),
								m = p.siblings("span").text();
							"" != m && (a = l + ">" + h + ">" + m, e.push(a))
						} else "" != h && e.push(a)
				} else "" != l && e.push(a)
		}
		var g = e.length,
			_ = "";
		$("#category_select").val(e);
		for (var u = 0; u < g; u++) _ += "<li><span>" + e[u] + "</span></li>";
		$(".j-goodsClassLabelList").html(_), $(".j-goodsClassLabelList").find("li").length > 0 && $(".j-goodsClassLabelList").show()
	}

	function e(t) {
		var i = $("#class_id").val();
		if ("" != i && (i = JSON.parse(i)), t.find(".first_floor").each(function() {
				var t = $(this),
					i = t.find(".mid_floor").length;
				0 == i ? ($(this).find(".j-first_floor").addClass("gicon-minus"), $(this).find(".j-first_floor").removeClass("gicon-plus"), $(this).addClass("no")) : ($(this).find(".j-first_floor").removeClass("gicon-minus"), $(this).find(".j-first_floor").addClass("gicon-plus"), $(this).removeClass("no"))
			}), t.find(".mid_floor").each(function() {
				var t = $(this),
					i = t.find(".last_floor").length;
				0 == i ? ($(this).find(".j-mid_floor").addClass("gicon-minus"), $(this).find(".j-mid_floor").removeClass("gicon-plus"), $(this).addClass("no")) : ($(this).find(".j-mid_floor").removeClass("gicon-minus"), $(this).find(".j-mid_floor").addClass("gicon-plus"), $(this).removeClass("no"))
			}), t.find(".first_floor").hover(function() {
				$(this).addClass("hover")
			}, function() {
				$(this).removeClass("hover")
			}), i.length)
			for (var e = 0; e < i.length; e++)
				if (i[e]) {
					var a = i[e];
					t.find(".j-chang-firstfloor>label input").each(function() {
						var t = $(this).val();
						a == t && ($(this).attr("checked", !0), $(this).parents(".first_floor").addClass("on"))
					}), t.find(".j-change>label input").each(function() {
						var t = $(this).val();
						a == t && ($(this).attr("checked", !0), $(this).parents(".first_floor").find(".j-change").addClass("on"))
					}), t.find(".j-midchange>label input").each(function() {
						var t = $(this).val();
						a == t && ($(this).attr("checked", !0), $(this).parents(".mid_floor").find(".last_floor").addClass("on"), $(this).parents(".first_floor").find(".j-change").addClass("on"))
					})
				}
	}
	HYD.ItemAdd = HYD.ItemAdd ? HYD.ItemAdd : {};
	var n = $("#j-isSid").val(),s = $("#j-hasNorms").val();
		HYD.ItemAdd.imglist = [];
	var d = function() {
			var t = $("#tpl_add_step2_imgList").html(),
				i = _.template(t, {
					dataset: HYD.ItemAdd.imglist,
					str_dataset: HYD.ItemAdd.imglist.join(",")
				});
			$(".j-imglistPanel").empty().append(i)
		},
		c = $(".j-imglist-dataset").val();
	c.length && (HYD.ItemAdd.imglist = c.split(","), d()), $(document).on("click", ".j-addimg", function() {
		HYD.popbox.ImgPicker(function(t) {
			_.each(t, function(t) {
				HYD.ItemAdd.imglist.push(t)
			}), d()
		})
	}), $(document).on("click", ".j-delimg", function() {
		var t = $(this).parent("li").data("index");
		HYD.ItemAdd.imglist.splice(t, 1), d()
	}),
	$(".j-feight").change(function() {
		var t = $(".j-feight-ipt"),i = $("#freight_tpl_id");
		switch($(this).val()){
			case"1":
			case"4":
			t.attr("disabled",!0),i.attr("disabled",!0);
			break;
			case"2":t.attr("disabled",!1),i.attr("disabled",!0);break;
			case"3":t.attr("disabled",!0),i.attr("disabled",!1)
	}

	}),
	$(".j-submit").click(function() {
		$("input[name=next]").val($(this).data('next'));
		var i = $("input[name=title]").val();
		t() && $.post("index.php?con=api&act=limit_word", {
			str: i
		}, function(t) {
			t.status ? (HYD.hint("danger", "对不起，商品标题含有系统屏蔽词：" + t.word), $("input[name=title]").focus()) : $("#add_step2").submit()
		})
	});
	
	$(".is_free_logistics").change(function() {
		f($(this).val())
	}), 
	$(document).on("click", ".j-first_floor,.j-mid_floor", function() {
		return !$(this).parents().hasClass("no") && void($(this).parent(".first_floor,.mid_floor").hasClass("on") ? ($(this).parent(".first_floor,.mid_floor").removeClass("on"), $(this).removeClass("gicon-minus"), $(this).addClass("gicon-plus")) : ($(this).parent(".first_floor,.mid_floor").addClass("on"), $(this).addClass("gicon-minus"), $(this).removeClass("gicon-plus")))
	}), $(document).on("change", ".j-change input", function(t) {
		var i = $(this).attr("checked"),
			e = $(this).parents(".first_floor");
		i && e.children("label").find("input").attr("checked", !0)
	}), $(document).on("change", ".j-midchange input", function(t) {
		var i = $(this).attr("checked"),
			e = $(this).parents(".mid_floor");
		i && e.children("label").find("input").attr("checked", !0)
	}), $(document).on("change", ".first_floor>label>input", function() {
		var t = $(this),
			i = t.attr("checked");
		i ? t.parents(".first_floor").find("input").attr("checked", "true") : t.parents(".first_floor").find("input").removeAttr("checked")
	}), $(document).on("change", ".mid_floor>label>input", function() {
		var t = $(this),
			i = (t.parents(".first_floor"), t.attr("checked"));
		i ? t.parent("label").siblings(".last_floor").find("input").attr("checked", "true") : t.parent("label").siblings(".last_floor").find("input").removeAttr("checked")
	}), $(".j-goodsClassLabelList").find("li").length < 0 && $(".j-goodsClassLabelList").hide(), $("input[name=item_presale]").click(function() {
		var t = $(this).val();
		0 == t ? $(".formitems-panel").addClass("hide") : $(".formitems-panel").removeClass("hide")
	})
});
