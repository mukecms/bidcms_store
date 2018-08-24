$(function() {
	$(".j-pay-record").click(function() {
		var t = $(this),
			n = t.data("id"),
			a = {
				time: t.data("time"),
				money: t.data("money"),
				account: t.data("account"),
				number: t.data("number"),
				name: t.data("name"),
				pay_money: t.data("paymoney"),
				redpack: t.data("redpack")
			},
			e = _.template($("#tpl_apply_list_pay_record").html(), a),
			o = $(e),
			i = o.find("input[name='running_number']"),
			c = o.find("input[name='trade_time']");
		return $.jBox.show({
			width: 500,
			title: "提现发放",
			content: o,
			btnOK: {
				onBtnClick: function(t) {
					var a = o.find("input[name='is_red_pack']:checked"),
						e = o.find("input[name='is_check']:checked").val();
					if(e!=1){
						HYD.hint("danger", "确认对帐无误？请勾选");
						return false;
					}
					if(i.val()==''){
						HYD.hint("danger", "流水号不能为空");
						return false;
					}
					$.jBox.close(t);
					$.ajax({
						url: "index.php?con=property&act=withdraw_record&v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							log_id: n,
							running_number: i.val(),
							trade_time: c.val(),
							is_red_pack: a.val()
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(t) {
							1 == t.status ? t.url ? window.location.href = t.url : (HYD.hint("success", t.msg), setTimeout(function() {
								//window.location.reload()
							}, 1e3)) : HYD.hint("danger", t.msg), $.jBox.hideloading()
						}
					})
				}
			}
		}), !1
	}), 
	$(".j-pay-audit").click(function() {
		var t = $(this),
			n = t.data("id"),
			a = t.data("money"),
			e = t.data("moneytype");
		if (2 == e) var o = $("input[name=withdraw_balance_proportion]").val(),
			i = a - parseFloat(a * (o / 100));
		else var c = $("input[name=withdraw_proportion]").val(),
			i = a - parseFloat(a * (c / 100));
		var d = {
			time: t.data("time"),
			money: t.data("money"),
			act_money: i.toFixed(2),
			account: t.data("account"),
			name: t.data("name")
		},
			s = _.template($("#tpl_apply_list_pay_audit").html(), d),
			l = $(s),
			r = l.find("input[name='pay_money']");
		return $.jBox.show({
			width: 500,
			title: "提现审核",
			content: l,
			btnOK: {
				onBtnClick: function(t) {
					var a = parseFloat(r.val());
					return isNaN(a) || 0 == a ? void HYD.FormShowError(r, "请输入正确金额") : (console.log(213444), $.jBox.close(t), 
					$.ajax({
						url: "index.php?con=property&act=withdraw_audit&v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							log_id: n,
							pay_money: a
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(t) {
							1 == t.status ? t.url ? window.location.href = t.url : (HYD.hint("success", t.msg), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", t.msg), $.jBox.hideloading()
						}
					}))
				}
			}
		}), !1
	}), 
	$(".J_export").click(function() {
		$(":hidden[name='action']").val("export")
	}), 
	$(".J_search").click(function() {
		$(":hidden[name='action']").val("")
	}), 
	$(".j-reject").click(function() {
		var t = $(this).data("id"),
			n = $("#tpl_apply_list_reject").html(),
			a = $(n);
		$.jBox.show({
			width: 500,
			title: "申请驳回",
			content: a,
			btnOK: {
				onBtnClick: function(n) {
					$.jBox.close(n);
					var a = n.find('textarea[name="reason"]').val();
					$.ajax({
						url: "index.php?con=property&act=withdraw_reject&v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							log_id: t,
							reason: a
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(t) {
							1 == t.status ? (HYD.hint("success", t.msg), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", t.msg), $.jBox.hideloading()
						}
					})
				}
			}
		})
	})
});