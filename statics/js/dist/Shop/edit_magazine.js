$(function() {
	var e = [],
		a = function() {
			var a = _.template($("#tpl_add_edit_mgzCat_item").html(), {
				dataset: e
			});
			$(".j-mgzCateList").remove(), $(a).insertBefore(".j-addMgzCate")
		};
	$(".j-addMgzCate").click(function() {
		$(this);
		HYD.popbox.MgzAndMgzCate("mgzCateMulti", function(t, i) {
			e = e.concat(t), a()
		})
	}), $(document).on("click", ".j-delMgzCate", function() {
		var t = $(this).parent("li").index();
		e.splice(t, 1), a()
	});
	var t = $("#j-initdata").val(),
		i = $("#j-pageID").val();
	t = $.parseJSON(t), t.page.category && t.page.category.length && (e = t.page.category, a()), $(".j-title-selectimg").click(function() {
			HYD.popbox.ImgPicker(function(e) {
				$(".j-view_pic-ipt").attr("src", e[0])
			})
		}), $(".j-pagetitle").text(t.page.title), $(".j-pagetitle-ipt").val(t.page.title), $(".j-pagesubtitle-ipt").val(t.page.subtitle), $(".j-view_pic-ipt").attr("src", t.page.view_pic), $(".j-pagepraisenum").val(t.page.praise_num), $("#j-excerpt").val(t.page.excerpt), 1 == t.page.isShowShareCard && $(".j-page-showShareCard[value=1]").attr("checked", !0), 1 == t.page.isOpenSpread ? ($(".j-spreadTotalPoint").val(t.page.spreadTotalPoint), $(".j-spreadLimitPoint").val(t.page.spreadLimitPoint), $(".j-spreadVisitCount").val(t.page.spreadVisitCount), $(".j-spreadVisitCountPoint").val(t.page.spreadVisitCountPoint), $(".j-isOpenSpread[value=1]").attr("checked", !0), $(".j-show-spread").show()) : ($(".j-isOpenSpread[value=0]").attr("checked", !0), $(".j-show-spread").hide()), _.each(t.PModules, function(e, a) {
			HYD.DIY.add(e)
		}), _.each(t.LModules, function(e) {
			HYD.DIY.add(e)
		}), 
		function() {
			$(".diy-actions").find(".j-page-addModule").click(function() {
				$(".diy-ctrl-item").each(function() {
					var e = $(this),
						a = e.data("origin");
					"pagetitle" == a && ($("html,body").animate({
						scrollTop: "85px"
					}, 300), e.show().siblings().remove())
				})
			});
			var e = $(".j-page-hasMargin"),
				a = $("#diy-phone");
			e.length && (1 == t.page.hasMargin || "undefined" == typeof t.page.hasMargin ? (e.filter("[value=1]").attr("checked", !0), a.removeClass("noMargin")) : (e.filter("[value=0]").attr("checked", !0), a.addClass("noMargin")), e.change(function() {
				var e = $(this).val();
				1 == e ? a.removeClass("noMargin") : a.addClass("noMargin")
			}));
			var i = $("#j-page-backgroundColor");
			if (i.length) {
				var n = "#f8f8f8",
					o = $("#diy-contain");
				t.page.backgroundColor && (n = t.page.backgroundColor), i.css("backgroundColor", n).data("color", n), o.css("backgroundColor", n), i.ColorPicker({
					color: n,
					onShow: function(e) {
						return $(e).fadeIn(500), !1
					},
					onHide: function(e) {
						return $(e).fadeOut(500), !1
					},
					onChange: function(e, a, t) {
						var a = "#" + a;
						i.css("backgroundColor", a).data("color", a), o.css("backgroundColor", a)
					}
				})
			}
		}(),
		function() {
			$(".j-isOpenSpread").change(function() {
				1 == $(this).val() ? $(".j-show-spread").show() : $(".j-show-spread").hide()
			})
		}();
	var n = function() {
		var a = HYD.DIY.Unit.getData(),
			t = $("#j-excerpt").val(),
			n = $(".j-isOpenSpread:checked").val(),
			o = $(".j-page-showShareCard:checked").val(),
			r = null;
		if (a.page.category = e, a.page.excerpt = t, a.page.isOpenSpread = n, a.page.isShowShareCard = o, r = {
				id: i,
				title: a.page.title,
				subtitle: a.page.subtitle,
				view_pic: a.page.view_pic,
				praise_num: a.page.praise_num,
				is_preview: 0,
				category: e,
				excerpt: t,
				isOpenSpread: n,
				isShowShareCard: o,
				commit:1
			}, 1 == n) {
			var s = $(".j-spreadTotalPoint").val(),
				p = $(".j-spreadLimitPoint").val(),
				d = $(".j-spreadVisitCount").val(),
				c = $(".j-spreadVisitCountPoint").val();
			a.page.spreadTotalPoint = r.spreadTotalPoint = s, a.page.spreadLimitPoint = r.spreadLimitPoint = p, a.page.spreadVisitCount = r.spreadVisitCount = d, a.page.spreadVisitCountPoint = r.spreadVisitCountPoint = c
		}
		return r.content = JSON.stringify(a), r
	};
	$("#j-savePage").click(function() {
		var e = n();
		return $.ajax({
			url: window.location.href,
			type: "post",
			dataType: "json",
			data: e,
			beforeSend: function() {
				$.jBox.showloading()
			},
			success: function(e) {
				1 == e.status ? HYD.hint("success", "恭喜您，保存成功！") : HYD.hint("danger", "对不起，保存失败：" + e.msg), $.jBox.hideloading()
			}
		}), !1
	}), $("#j-saveAndPrvPage").click(function() {
		var e = n();
		return e.is_preview = 1, $.ajax({
			url: window.location.href,
			type: "post",
			dataType: "json",
			data: e,
			beforeSend: function() {
				$.jBox.showloading()
			},
			success: function(e) {
				1 == e.status ? (HYD.hint("success", "恭喜您，保存成功！"), setTimeout(function() {
					window.open(e.link)
				}, 1e3)) : HYD.hint("danger", "对不起，保存失败：" + e.msg), $.jBox.hideloading()
			}
		}), !1
	})
});