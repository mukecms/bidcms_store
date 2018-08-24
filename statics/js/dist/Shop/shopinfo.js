$(function() {
	$(document).on("click", ".j-addgoods-user", function() {
		var e = $(this);
		HYD.popbox.ImgPicker(function(i) {
			var a = i[0];
			$(".j-imglist-userset").val(a).change(), e.html('<img src="'+a+'" style="width:100%;"/>')
		})
	}), $(document).on("click", ".j-commission-agent", function() {
		var e = $(this);
		HYD.popbox.ImgPicker(function(i) {
			var a = i[0];
			$(".j-imglist-agentset").val(a).change(), e.html('<img src="'+a+'" style="width:100%;"/>')
		})
	}), $(".j-tab>a").click(function(e) {
		$(this).addClass("active").siblings("a").removeClass("active");
		var i = $(this).index();
		$(".tabcontent").find(".tabitem").eq(i).removeClass("hide").siblings(".tabitem").addClass("hide")
	}), $("input[name=is_store_card_pay]").is(":checked") ? $(".j-mdsmzfjg").show() : $(".j-mdsmzfjg").hide(), $("input[name=is_store_card_pay]").change(function() {
		$(this).is(":checked") ? $(".j-mdsmzfjg").fadeIn("fast") : $(".j-mdsmzfjg").fadeOut("fast")
	});
	var e = $('input[name="is_buy_repurchase"]:checked').val();
	0 == e || 1 == e ? $(".repurchase_money").hide() : $(".repurchase_money").show(), $('input[name="is_buy_repurchase"]').change(function() {
		var e = $(this),
			i = e.val();
		0 == i || 1 == i ? $(".repurchase_money").hide() : 2 == i && $(".repurchase_money").show()
	}), 
	/*function() {
		var e = $("#j-widgetColorPicker"),
			i = $("#j-widgetColorPicker-ip"),
			a = i.val();
		a = a.replace(/rgba\(/, "").replace(/\)/, "").split(",");
		var n = {
			r: a[0],
			g: a[1],
			b: a[2]
		};
		e.ColorPicker({
			color: n,
			onShow: function(e) {
				return $(e).fadeIn(500), !1
			},
			onHide: function(e) {
				return $(e).fadeOut(500), i.change(), !1
			},
			onChange: function(a, n, t) {
				var c = "rgba(" + t.r + "," + t.g + "," + t.b + ",0.6)";
				e.css("background-color", c), i.val(c)
			}
		})
	}(), */
	$("input[name=is_compatible_mode]").is(":checked") ? $(".j-mustCompatible").show() : $(".j-mustCompatible").hide(), $("input[name=is_compatible_mode]").change(function() {
		$(this).is(":checked") ? $(".j-mustCompatible").fadeIn("fast") : $(".j-mustCompatible").fadeOut("fast")
	})
});