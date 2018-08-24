$(function() {
	$(".j-qrcode").click(function() {
		var t = $(this).data("link");
		HYD.showQrcode("/Public/qrcode?link=" + t)
	}), $(".j-setLevel").click(function() {
		var t = $(this),
			n = t.data("id"),
			e = {
				rank: t.data("rank"),
				name: t.data("name")
			},
			a = _.template($("#tpl_user_lists_setlevel").html(), e),
			o = $(a),
			i = o.find("select[name='rank']");
		return $.jBox.show({
			width: 500,
			title: "设置会员等级",
			content: o,
			btnOK: {
				onBtnClick: function(t) {
					var e = i.val();
					$.jBox.close(t), $.ajax({
						url: "?con=customer&act=setRank&v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							user_id: n,
							rank_id: e
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(t) {
							1 == t.status ? (HYD.hint("success", "恭喜您，设置成功！"), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", "对不起，设置失败：" + t.msg), $.jBox.hideloading()
						}
					})
				}
			}
		}), !1
	}), $(".j-gavePoint").click(function() {
		var t = $(this),
			n = t.data("id"),
			e = t.data("user_id"),
			a = {
				name: t.data("name"),
				now_point: t.data("point")
			},
			o = _.template($("#tpl_user_lists_gavePoint").html(), a),
			i = $(o),
			s = i.find("input[name='point']"),
			c = i.find("textarea[name='remark']");
		return $.jBox.show({
			title: "调整积分",
			content: i,
			btnOK: {
				onBtnClick: function(t) {
					var a = parseInt(s.val()),
						o = c.val();
					return isNaN(a) || 0 == a ? void HYD.FormShowError(s, "请输入不为0整数") : ($.jBox.close(t), void $.ajax({
						url: "?con=customer&act=setPoint&v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							id: n,
							user_id: e,
							point: a,
							remark: o
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(t) {
							1 == t.status ? (HYD.hint("success", "恭喜您，积分调整成功！"), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", "对不起，积分调整失败：" + t.msg), $.jBox.hideloading()
						}
					}))
				}
			}
		}), !1
	}), $(".j-redPack").click(function() {
		var t = $(this),
			n = t.data("user_id"),
			e = {
				name: t.data("name")
			},
			a = _.template($("#tpl_user_lists_redPack").html(), e),
			o = $(a),
			i = o.find("input[name='total_amount']"),
			s = o.find("input[name='wishing']");
		return $.jBox.show({
			title: "发红包",
			content: o,
			btnOK: {
				onBtnClick: function(t) {
					var e = parseFloat(i.val()),
						a = s.val();
					return isNaN(e) || e < 1 || e > 200 ? void HYD.FormShowError(i, "红包金额介于[1.00元，200.00元]之间") : a ? ($.jBox.close(t), void $.ajax({
						url: "?con=customer&act=setRedPack&v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							user_id: n,
							total_amount: e,
							wishing: a
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(t) {
							1 == t.status ? (HYD.hint("success", "恭喜，红包发放成功！"), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", "抱歉，红包发放失败：" + t.msg, 2e3), $.jBox.hideloading()
						}
					})) : void HYD.FormShowError(s, "祝福语不能为空")
				}
			}
		}), !1
	}), $(".j-edit").click(function() {
		var t = $(this),
			n = t.data("id");
		defaults = {
			mobile: t.data("mobile") || "",
			email: t.data("email"),
			name: t.data("name"),
			user_remark: t.data("remark"),
			start_time:t.data('start_time'),
			end_time:t.data('end_time')
		};
		var e = _.template($("#tpl_user_detail_modify").html(), defaults),
			a = $(e),
			o = a.find("input[name='name']"),
			i = a.find("input[name='email']"),
			s = a.find("input[name='mobile']"),
			c = a.find("input[name='password']"),
			d = a.find("input[name='user_remark']");
		return $.jBox.show({
			width: 500,
			title: "编辑会员",
			content: a,
			btnOK: {
				onBtnClick: function(e) {
					$.jBox.close(e);
					var a = o.val(),
						r = i.val(),
						l = s.val(),
						u = c.val(),
						h = d.val();
					$.ajax({
						url: "?con=customer&act=edit&v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							commit:1,
							user_id: n,
							name: a,
							email: r,
							mobile: l,
							password: u,
							user_remark: h
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(n) {
							1 == n.status ? (HYD.hint("success", "恭喜您，编辑成功！"), t.data("mobile", l), t.data("email", r), t.data("name", a), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", "对不起，编辑失败：" + n.msg), $.jBox.hideloading()
						}
					})
				}
			}
		}), !1
	}),
	$(".j-agentLevel").click(function() {
		var t = $(this),
			n = t.data("id"),
			e = {
				rank: t.data("rank"),
				name: t.data("name")
			},
			a = _.template($("#tpl_agent_lists_setlevel").html(), e),
			o = $(a),
			i = o.find("select[name='agent_rank_id']");
		return $.jBox.show({
			width: 500,
			title: "设置分销商等级",
			content: o,
			btnOK: {
				onBtnClick: function(t) {
					var e = i.val();
					$.jBox.close(t), $.ajax({
						url: "index.php?con=agent&act=setRank&v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							user_id: n,
							agent_rank_id: e
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(t) {
							1 == t.status ? (HYD.hint("success", "恭喜您，设置成功！"), setTimeout(function() {
								$("#rank"+n).text(i.find('option:selected').text());
							}, 1e3)) : HYD.hint("danger", "对不起，设置失败：" + t.msg), $.jBox.hideloading()
						}
					})
				}
			}
		}), !1
	}),
	$(".j-balance").click(function() {
		var t = $(this),
			n = t.data("id"),
			e = t.data("balance");
		defaults = {
			name: t.data("name"),
			balance: e
		};
		var a = _.template($("#tpl_user_lists_balance").html(), defaults),
			o = $(a),
			i = o.find("input[name='payment']"),
			s = o.find("textarea[name='balance_remark']");
		return $.jBox.show({
			width: 500,
			title: "设置余额",
			content: o,
			btnOK: {
				onBtnClick: function(t) {
					return val_rank = parseFloat(i.val()), val_remark = s.val(), isNaN(val_rank) ? void HYD.FormShowError(i, "请输入合法金额") : ($.jBox.close(t), void $.ajax({
						url: "?con=customer&act=setAmount&v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							user_id: n,
							payment: val_rank,
							remark: val_remark
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(t) {
							1 == t.status ? (HYD.hint("success", "恭喜您，设置成功！"), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", "对不起，设置失败：" + t.msg), $.jBox.hideloading()
						}
					}))
				}
			}
		}), !1
	}), $(".j-sendLetter").click(function() {
		var t = $(this),
			n = t.data("id"),
			e = $("#tpl_user_send_letter").html(),
			a = $(e);
		return $.jBox.show({
			width: 500,
			title: "发送站内信",
			content: a,
			btnOK: {
				onBtnClick: function(t) {
					$.jBox.close(t);
					var e = t.find("textarea[name='content']").val();
					$.ajax({
						url: "?con=customer&act=setLetter&v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							user_id: n,
							content: e
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(t) {
							1 == t.status ? (HYD.hint("success", "恭喜您，发送成功！"), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", "对不起，发送失败：" + t.msg), $.jBox.hideloading()
						}
					})
				}
			}
		}), !1
	}), $(".j-del").click(function() {
		var t = $(this),
			n = t.data("id");
		return $.jBox.show({
			title: "删除会员",
			content: "除非必要，请不要随意删除会员，删除了会员后，<br/>此会员将访问不了您的店铺！您确定要删除此会员吗？",
			btnOK: {
				onBtnClick: function(t) {
					$.jBox.close(t), $.ajax({
						url: "?con=customer&act=deluser&v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
              commit:1,
							id: n
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(t) {
							1 == t.status ? (HYD.hint("success", "恭喜您，删除成功！"), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", "对不起，删除失败：" + t.msg), $.jBox.hideloading()
						}
					})
				}
			}
		}), !1
	}),
	$(".j-sendUmp").click(function() {
		var t = $(this),
			n = t.data("id"),
			e = $("#user_list_code").val();
		return $.jBox.show({
			width: 500,
			title: "送优惠券",
			content: $("#tpl_user_lists_ump").html(),
			btnOK: {
				onBtnClick: function(t) {
					$.jBox.close(t);
					var a = t.find('select[name="coupon_id"]').val(),
						o = t.find('input[name="coupon_num"]').val();
					$.ajax({
						url: "/User/sendCoupon?v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							user_id: n,
							coupon_id: a,
							coupon_num: o,
							code: e
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
	}),
	$(".j-agent_time").click(function() {
		var t = $(this),
			n = t.data("id"),
			st = t.data("start_time"),
			et = t.data("end_time");
		defaults = {
			starttime: st,
			endtime:et
		};
		var a = _.template($("#tpl_agent_time").html(), defaults),
			o = $(a),
			i = o.find("input[name='start_time']"),
			e = o.find("input[name='end_time']");
		return $.jBox.show({
			width: 400,
			title: "设置分销商到期时间",
			content: o,
			btnOK: {
				onBtnClick: function(t) {
					$.jBox.close(t), $.ajax({
						url: "index.php?con=agent&act=setTime&v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							commit:1,
							user_id: n,
							start_time: i.val(),
							end_time: e.val()
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(t) {
							1 == t.status ? (HYD.hint("success", "恭喜您，设置成功！"), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", "对不起，设置失败：" + t.msg), $.jBox.hideloading()
						}
					})
				}
			}
		}), !1
	}), $(".j-resetPassword").click(function() {
		var t = $(this).data("id");
		return $.jBox.show({
			title: "重置支付密码",
			content: _.template($("#tpl_user_lists_pwd").html()),
			btnOK: {
				onBtnClick: function(n) {
					var e = n.find('input[name="password"]').val();
					$.jBox.close(n), $.ajax({
						url: "?con=customer&act=resetPayPassword&v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							id: t,
							password: e
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(t) {
							1 == t.status ? HYD.hint("success", "恭喜您，设置成功！") : HYD.hint("danger", "对不起，设置失败：" + t.msg), $.jBox.hideloading()
						}
					})
				}
			}
		}), !1
	}), $(".j-pointAll").click(function() {
		var t = [],
			n = $(".table-ckbs:checked");
		return n.each(function() {
			t.push($(this).data("id"))
		}), t.length ? ($.jBox.show({
			title: "批量调整积分",
			content: _.template($("#tpl_user_lists_Point").html()),
			btnOK: {
				onBtnClick: function(n) {
					var e = parseInt(n.find("input[name='point']").val()),
						a = n.find("textarea[name='remark']").val(),
						o = parseInt(n.find("input[name='fix_point']").val());
					return (isNaN(e) || 0 == e) && isNaN(o) ? void HYD.FormShowError(n.find("input[name='point']"), "请输入不为0整数") : o && o < 0 ? void HYD.FormShowError(n.find("input[name='fix_point']"), "统一调整积分不能小于0") : ($.jBox.close(n), void $.ajax({
						url: "/User/batchSendPoint?v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							ids: t,
							point: e,
							fix_point: o,
							remark: a
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(t) {
							1 == t.status ? (HYD.hint("success", "恭喜您，积分调整成功" + t.data.success + "条,失败" + t.data.fail + "条！"), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", "对不起，积分调整失败：" + t.msg), $.jBox.hideloading()
						}
					}))
				}
			}
		}), !1) : void HYD.hint("warning", "对不起，请选择需要设置的会员！")
	}), $(".J_province").change(function() {
		var n = $(this).val();
		console.log(n);
		var e = '<option value="0">所有城市</option>';
		t(n, function(t) {
			$.each(t, function(t, n) {
				e += "<option value='" + n.city_id + "'>" + n.city_name + "</option>"
			}), $(".s_city").empty().append(e)
		})
	});
	var t = function(t, n) {
			$.ajax({
				url: "/System/getCity?v=" + Math.round(100 * Math.random()),
				type: "post",
				dataType: "json",
				data: {
					province_id: t
				},
				success: function(t) {
					1 == t.status && n && n(t.data)
				}
			})
		}
});
