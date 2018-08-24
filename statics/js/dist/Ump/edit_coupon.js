HYD.coupon = {}, HYD.coupon.data = {
	title: $("input[name='title']").val(),
	vaule: $("input[name='amount']").val(),
	timeStart: $("input[name='timeStart']").val(),
	timeEnd: $("input[name='timeEnd']").val()
}, HYD.coupon.reRenderCoupon = function() {
	HYD.coupon.data.timeStart = $("input[name='starttime']").val(), HYD.coupon.data.timeEnd = $("input[name='endtime']").val();
	var t = _.template($("#tpl_edit_coupon").html(), HYD.coupon.data);
	$(".diy-phone-contain").empty().append(t)
},
$(function() {
	function t(t) {
		var n=$(".j-verify").val();
		if(n!=""){
			$.ajax({
				url: "index.php?con=design&act=getItem&v=" + Math.round(100 * Math.random()),
				type: "post",
				dataType: "json",
				data: {
					item_id: n
				},
				success: function(n) {
					e = n.list, o(e), t && t()
				}
			})
		}

	}
	var e = [];
	$(".j-render").change(function() {
		var t = $(this).val(),
			e = $(this).attr("name");
		HYD.coupon.data[e] = t, HYD.coupon.reRenderCoupon()
	});
	var o = function(t) {
		var o = $(".js-goods-lists"),
			i = $("#tpl_goods_lists").html(),
			a = $(_.template(i, {
				data: e
			}));
		o.empty().append(a);
		var l = a.filter('input[name="goods_ids"]').val();
		n = l.split(","), $(".j-verify").val(l)
	};
	$(":radio[name='is_share_coupon']").change(function() {
		$(".J_points").toggle()
	}), HYD.coupon.reRenderCoupon(), t(),
  $(document).on("click", ".j-delgoods", function() {
		var t = $(this).parents("li").index();
		return e.splice(t, 1), o(e), !1
  }),
  $(document).on("click", ".js-goods-lists .j-addgoods", function() {
		$.selectGoods({
			selectMod: 2,
			selectIds: n,
			callback: function(t, n) {
				"[object object]" == Object.prototype.toString.call(t).toLowerCase() ? e.push(t) : "[object array]" == Object.prototype.toString.call(t).toLowerCase() && (e = e.concat(t)), o(e)
			}
		})
  }),
  $(document).on("click", ".img-list>li .img-move-left", function() {
		var t = $(this),
			n = t.closest("li").index(),
			i = t.closest("li");
		if (0 != n) {
			n--, t.closest("ul").find("li").eq(n).before(i);
			var a = e.slice(n + 1, n + 2)[0];
			e.splice(n + 1, 1), e.splice(n, 0, a), o(e)
		}
		return !1
	}),
  $(document).on("click", ".img-list>li .img-move-right", function() {
		var t = $(this),
			n = t.closest("ul").find("li").length - 1,
			i = t.closest("li").index(),
			a = t.closest("li");
		if (i != n - 1) {
			i++, t.closest("ul").find("li").eq(i).after(a);
			var l = e.slice(i, i + 1)[0];
			e.splice(i, 1), e.splice(i - 1, 0, l), o(e)
		}
		return !1
	}), _QV_ = "http://www.bidcms.com", $("#form1").submit(function() {
		var t = $("input[name=title]"),
			e = $("input[name=vaule]"),
			n = $("input[name=isatleast]:checked"),
			o = $("input[name=atleast]"),
			i = $("input[name=total]"),
			a = $("input[name=starttime]"),
			l = $("input[name=endtime]"),
			r = $("input[name=points]"),
			s = t.val(),
			c = e.val(),
			p = n.val(),
			u = o.val(),
			m = i.val(),
			d = a.val(),
			v = l.val(),
			h = (r.val(), !0);
		return "" == s && (HYD.FormShowError(t, "请输入优惠券名称"), h = !1), "" == c && (HYD.FormShowError(e, "请输入面值"), h = !1), "1" == p && "" == u && (HYD.FormShowError(o, "请输入金额"), h = !1), "" == m && (HYD.FormShowError(i, "请输入发放总量"), h = !1), "" == d && (HYD.FormShowError(a, "请选择生效开始时间"), h = !1), "" == v && (HYD.FormShowError(l, "请选择生效结束时间"), h = !1), h
	});
	var i = /(\<script\>).*(\<\/script\>)/gi;
	$("#form1").find("input[type='text']").each(function() {
		$(this).keyup(function(t) {
			i.test($(this).val()) && ($(this).val(""), t.stopPropagation()), t.stopPropagation()
		})
	}), $("input[name='isatleast']").change(function() {
		var t = $("input[name='isatleast']:checked").val();
	})
});
