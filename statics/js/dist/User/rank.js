$(function() {
	$(".j-add").click(function() {
		$.jBox.show({
			width: 500,
			title: "添加会员等级",
			content: _.template($("#tpl_user_rank_add").html()),
			btnOK: {
				onBtnClick: function(n) {
					$.jBox.close(n);
					var t = n.find("input[name='alias']"),
						i = n.find("input[name='discount']"),
						a = n.find("input[name='amount']"),
						e = n.find("input[name='count']"),
						d = n.find("input[name='point']"),
						s = n.find("input[name='specified_time']"),
						l = n.find("input[name='specified_money']"),
						o = n.find("input[name='level']"),
						con = n.find("textarea[name='content']"),
						u = t.val(),
						c = i.val(),
						m = a.val(),
						f = e.val(),
						r = d.val();
						p	= o.val();
					$.ajax({
						url: "?con=customer&act=editRank",
						type: "post",
						dataType: "json",
						data: {
							commit: 1,
							alias: u,
							discount: c,
							amount: m,
							count: f,
							point: r,
							level:p,
							content:con.val()
						},
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
			t = n.data("id"),
			i = {
				alias: n.data("alias"),
				discount: n.data("discount"),
				amount: n.data("amount"),
				count: n.data("count"),
				point: n.data("point"),
				level: n.data("level"),
				content:n.data("content")
			},
			a = _.template($("#tpl_user_rank_modify").html(), i),
			e = $(a),
			o = e.find("input[name='alias']"),
			d = e.find("input[name='discount']"),
			s = e.find("input[name='amount']"),
			l = e.find("input[name='count']"),
			con = e.find("textarea[name='content']"),
			c = e.find("input[name='point']");
			level = e.find("input[name='level']");
		return $.jBox.show({
			width: 500,
			title: "编辑等级",
			content: e,
			btnOK: {
				onBtnClick: function(n) {
					$.jBox.close(n);
					var data={
						commit:1,
						rank_id: t,
						alias: o.val(),
						discount: d.val(),
						amount: s.val(),
						count: l.val(),
						point: c.val(),
						level:level.val(),
						content:con.val()
					}
					$.ajax({
						url: "index.php?con=customer&act=editRank",
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
			title: "删除会员等级",
			content: "确认要删除吗？",
			btnOK: {
				onBtnClick: function(n) {
					$.jBox.close(n), $.ajax({
						url: "?con=customer&act=delRank",
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
	})
});
