$(function() {
	var e = function(e) {
			1 == e ? ($(".J_m1").show(), $(".J_m2").hide(), $(".J_m3").hide()) : 2 == e ? ($(".J_m1").hide(), $(".J_m2").show(), $(".J_m3").hide()) : 3 == e && ($(".J_m1").hide(), $(".J_m2").hide(), $(".J_m3").show())
		},
		i = $("input[name='type']:checked").val();
	e(i), $("input[name='type']").change(function() {
		var i = $(this).val();
		e(i)
	}), $(".J_shipping_type").change(function() {
		$(".J_express").hide(), $(".J_ems").hide(), $(".J_surface").hide(), $(".J_store").hide(), $(".J_shipping_type:checked").each(function() {
			1 == $(this).val() && $(".J_express").show(), 2 == $(this).val() && $(".J_ems").show(), 3 == $(this).val() && $(".J_surface").show(), 5 == $(this).val() && $(".J_store").show()
		})
	}), $("#form1").submit(function() {
		var e = $("input[name='title']"),
			i = $(".select"),
			p = e.val(),
			m=!0,
			r = $.trim(i.val());
		return "" == p && (HYD.FormShowError(e, "请输入模版标题"), m = !1), 0 == r && (HYD.FormShowError(i, "请选择快递公司"), m = !1), m
	})
});