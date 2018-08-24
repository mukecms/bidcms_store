$(function() {
	function n(n) {
		if (1 == n.is_compress) var t = '<li class="j-addgoods"><span class="img-list-btndel j-delgoods"><i class="gicon-trash white"></i></span></span><img src="' + n.pic + '80x80"/></li>';
		else var t = '<li class="j-addgoods"><span class="img-list-btndel j-delgoods"><i class="gicon-trash white"></i></span></span><img src="' + n.pic + '"/></li>';
		var a = $(".img-list");
		($(".img-list li").leight = 1) && a.empty().append(t), a.siblings("#item_id").val(n.item_id)
	}
	function t(t, a) {
		var e = $(t).find("#item_id").val();
		$.ajax({
			url: "index.php?con=design&act=getItem",
			type: "post",
			dataType: "json",
			data: {
				item_id: e
			},
			success: function(t) {
				Cache = t.list[0], n(Cache), a && a()
			}
		})
	}
	$(".j-add3").click(function() {
		$.jBox.show({
			width: 500,
			title: "添加门店等级",
			content: _.template($("#tpl_agent_rank_add3").html()),
			btnOK: {
				onBtnClick: function(n) {
					var t = n.find("input[name='title']"),
						a = n.find("input[name='superior_ratio']"),
						e = $.trim(t.val()),
						i = parseFloat(a.val());
					return "" == e ? void HYD.FormShowError(t, "请输入等级名称") : ($.jBox.close(n), void $.ajax({
						url: "/User/addAgentRank3?v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							title: e,
							superior_ratio: i
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(n) {
							1 == n.status ? (HYD.hint("success", "恭喜您，添加成功！"), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", "对不起，添加失败：" + n.msg), $.jBox.hideloading()
						}
					}))
				}
			}
		})
	}), $(".j-modify3").click(function() {
		var n = $(this),
			t = n.data("id"),
			a = {
				title: n.data("title"),
				superior: n.data("superior")
			},
			e = _.template($("#tpl_agent_rank_edit3").html(), a),
			i = $(e),
			o = i.find("input[name='title']"),
			d = i.find("input[name='superior_ratio']");
		return $.jBox.show({
			width: 500,
			title: "编辑门店等级",
			content: i,
			btnOK: {
				onBtnClick: function(n) {
					$.jBox.close(n);
					var a = o.val(),
						e = parseFloat(d.val());
					$.ajax({
						url: "/User/editAgentRank3?v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							agent_rank_id: t,
							title: a,
							superior_ratio: e
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(n) {
							1 == n.status ? (HYD.hint("success", "恭喜您，编辑成功！"), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", "对不起，编辑失败：" + n.msg), $.jBox.hideloading()
						}
					})
				}
			}
		}), !1
	}), $(".j-del3").click(function() {
		var n = $(this),
			t = n.data("id");
		return $.jBox.show({
			width: 300,
			title: "删除门店等级",
			content: "确认要删除吗？",
			btnOK: {
				onBtnClick: function(n) {
					$.jBox.close(n), $.ajax({
						url: "/User/delAgentRank3?v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							id: t
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(n) {
							1 == n.status ? (HYD.hint("success", "恭喜您，删除成功！"), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", "对不起，删除失败：" + n.msg), $.jBox.hideloading()
						}
					})
				}
			}
		}), !1
	}), $(".j-add2").click(function() {
		$.jBox.show({
			width: 500,
			title: "添加员工等级",
			content: _.template($("#tpl_agent_rank_add2").html()),
			btnOK: {
				onBtnClick: function(n) {
					var t = n.find("input[name='title']"),
						a = n.find("input[name='superior_ratio']"),
						e = $.trim(t.val()),
						i = parseFloat(a.val());
					return "" == e ? void HYD.FormShowError(t, "请输入等级名称") : ($.jBox.close(n), void $.ajax({
						url: "/User/addAgentRank2?v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							title: e,
							superior_ratio: i
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(n) {
							1 == n.status ? (HYD.hint("success", "恭喜您，添加成功！"), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", "对不起，添加失败：" + n.msg), $.jBox.hideloading()
						}
					}))
				}
			}
		})
	}), $(".j-modify2").click(function() {
		var n = $(this),
			t = n.data("id"),
			a = {
				title: n.data("title"),
				superior: n.data("superior")
			},
			e = _.template($("#tpl_agent_rank_edit2").html(), a),
			i = $(e),
			o = i.find("input[name='title']"),
			d = i.find("input[name='superior_ratio']");
		return $.jBox.show({
			width: 500,
			title: "编辑员工等级",
			content: i,
			btnOK: {
				onBtnClick: function(n) {
					$.jBox.close(n);
					var a = o.val(),
						e = parseFloat(d.val());
					$.ajax({
						url: "/User/editAgentRank2?v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							agent_rank_id: t,
							title: a,
							superior_ratio: e
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(n) {
							1 == n.status ? (HYD.hint("success", "恭喜您，编辑成功！"), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", "对不起，编辑失败：" + n.msg), $.jBox.hideloading()
						}
					})
				}
			}
		}), !1
	}), $(".j-del2").click(function() {
		var n = $(this),
			t = n.data("id");
		return $.jBox.show({
			width: 300,
			title: "删除员工等级",
			content: "确认要删除吗？",
			btnOK: {
				onBtnClick: function(n) {
					$.jBox.close(n), $.ajax({
						url: "/User/delAgentRank2?v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							id: t
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(n) {
							1 == n.status ? (HYD.hint("success", "恭喜您，删除成功！"), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", "对不起，删除失败：" + n.msg), $.jBox.hideloading()
						}
					})
				}
			}
		}), !1
	}), $(".j-add").click(function() {
		$.jBox.show({
			width: 500,
			title: "添加分销商等级",
			content: _.template($("#tpl_agent_rank_add").html()),
			btnOK: {
				onBtnClick: function(n) {
          var data={commit:1};
					data.agent_level = n.find("input[name='agent_level']").val(),
					data.reward_money = n.find("input[name='reward_money']").val(),
					data.reward_point = n.find("input[name='reward_point']").val(),
					data.title = $.trim(n.find("input[name='title']").val()),
					data.draw_num = n.find("input[name='draw_num']").val(),
					data.draw_money= n.find("input[name='draw_money']").val();
					$.jBox.close(n), void $.ajax({
						url: "?con=agent&act=editRank&v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: data,
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(n) {
							1 == n.status ? (HYD.hint("success", "恭喜您，添加成功！"), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", "对不起，添加失败：" + n.msg), $.jBox.hideloading()
						}
					})
				}
			}
		})
	}), $(".j-modify").click(function() {
		var n = $(this),
			a = n.data("id"),
			e = {
				title: n.data("title"),
				superior: n.data("superior"),
				top: n.data("top"),
				three: n.data("three"),
				agent_level: n.data("level"),
				reward_money: n.data("money"),
				draw_num: n.data("drawnum"),
				draw_money: n.data("draw"),
				reward_point: n.data("point")
			},
			i = _.template($("#tpl_agent_rank_edit").html(), e),
			o = $(i);
      var data={commit:1};

		return $.jBox.show({
			width: 500,
			title: "编辑分销商等级",
			content: o,
			onOpen: function(n) {
				"" != e.automaic_item_id && t(n)
			},
			btnOK: {
				onBtnClick: function(n) {
					$.jBox.close(n);
          data.rank_id=a,
    			data.title = o.find("input[name='title']").val(),
    			data.agent_level = o.find("input[name='agent_level']").val(),
    			data.reward_money = o.find("input[name='reward_money']").val(),
    			data.reward_point = o.find("input[name='reward_point']").val(),
          data.draw_num = o.find("input[name='draw_num']").val(),
          data.draw_money = o.find("input[name='draw_money']").val();
					$.ajax({
						url: "?con=agent&act=editRank&v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: data,
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(n) {
							1 == n.status ? (HYD.hint("success", "恭喜您，编辑成功！"), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", "对不起，编辑失败：" + n.msg), $.jBox.hideloading()
						}
					})
				}
			}
		}), !1
	}), $(".j-del").click(function() {
		var n = $(this),
			t = n.data("id");
		return $.jBox.show({
			width: 300,
			title: "删除分销商等级",
			content: "确认要删除吗？",
			btnOK: {
				onBtnClick: function(n) {
					$.jBox.close(n), $.ajax({
						url: "/User/delAgentRank?v=" + Math.round(100 * Math.random()),
						type: "post",
						dataType: "json",
						data: {
							id: t
						},
						beforeSend: function() {
							$.jBox.showloading()
						},
						success: function(n) {
							1 == n.status ? (HYD.hint("success", "恭喜您，删除成功！"), setTimeout(function() {
								window.location.reload()
							}, 1e3)) : HYD.hint("danger", "对不起，删除失败：" + n.msg), $.jBox.hideloading()
						}
					})
				}
			}
		}), !1
	}), $(document).on("click", ".j-addgoods", function() {
		$.selectGoods({
			selectMod: 1,
			selectIds: [$("#item_id").val()],
			callback: n
		})
	}), $(document).on("click", ".j-delgoods", function() {
		var n = '<ul class="img-list clearfix"><li class="img-list-add j-addgoods">+</li></ul>',
			t = $(this).parents(".img-list");
		return t.empty().append(n), t.siblings("#item_id").val("").change(), !1
	})
});
