$(function() {
	var n = {
			page: {
				title: "店铺导航"
			},
			PModules: [{
				id: 1,
				type: "Navigation",
				draggable: !1,
				sort: 0,
				content: {
					showInhome: !0,
					showInuser: !0,
					showIncustom: !0,
					showIngoodslist: !0,
					curMainindex: -1,
					curSubindex: -1,
					style: 0,
					dataset: [{
						linkType: 6,
						link: "#",
						title: "店铺主页",
						showtitle: "店铺主页",
						icon: "http://store.bidcms.com/statics/images/icon/style1/color0/icon_home.png",
						bgColor: "#fff",
						fotColor: "#333",
						subNav: []
					}, {
						linkType: 7,
						link: "#",
						title: "会员主页",
						showtitle: "会员主页",
						icon: "http://store.bidcms.com/statics/images/icon/style1/color0/icon_user.png",
						bgColor: "#fff",
						fotColor: "#333",
						subNav: []
					}, {
						linkType: 8,
						link: "?act=goods",
						title: "",
						showtitle: "所有商品",
						icon: "http://store.bidcms.com/statics/images/icon/style1/color0/icon_allgoods.png",
						bgColor: "#fff",
						fotColor: "#333",
						subNav: []
					}, {
						linkType: 9,
						link: "#",
						title: "",
						showtitle: "申请分销",
						icon: "http://store.bidcms.com/statics/images/icon/style1/color0/icon_fx.png",
						bgColor: "#fff",
						fotColor: "#333",
						subNav: []
					}]
				},
				dom_conitem: null,
				ue: null
			}],
			LModules: []
	};
	HYD.DIY.Unit.event_typeNavigation = function(n, t) {
		var i = t.dom_conitem,
			e = n,
			o = $("#tpl_diy_con_typeNavigation").html(),
			a = $("#tpl_diy_ctrl_typeNavigation").html(),
			c = ($("#tpl_diy_ctrl_typeNavigation_detail").html(), function() {
				var n = $(_.template(o, t));
				i.find(".navPanel").remove().end().append(n);
				var c = $(_.template(a, t));
				e.empty().append(c), HYD.DIY.Unit.event_typeNavigation(e, t)
			});
		e.find("input[name='showtitle']").focus(), e.find("input[name='showInhome'],input[name='showInuser'],input[name='showIncustom'],input[name='showIngoodslist']").change(function() {
			var n = $(this).attr("name"),
				i = $(this).is(":checked");
			t.content[n] = i
		}), e.find(".np-left-navlist dt").click(function() {
			var n = $(this).parents("li").index() - 1;
			return t.content.curMainindex = n, t.content.curSubindex = -1, c(), !1
		}), e.find(".np-left-navlist dd").click(function() {
			var n = $(this).siblings("dt").parents("li").index() - 1;
			return index2 = $(this).index() - 1, t.content.curMainindex = n, t.content.curSubindex = index2, c(), !1
		}), e.find(".droplist li").click(function() {
			var n = t.content.curMainindex,
				i = t.content.curSubindex,
				e = null;
			t.content.curMainindex >= 0 && t.content.curSubindex < 0 ? e = t.content.dataset[n] : t.content.curMainindex >= 0 && t.content.curSubindex >= 0 && (e = t.content.dataset[n].subNav[i]), HYD.popbox.dplPickerColletion({
				linkType: $(this).data("val"),
				callback: function(n, t) {
					e.title = n.title, e.showtitle = n.title, e.link = n.link, e.linkType = t, c()
				}
			})
		}), e.find("input[name='showtitle']").change(function() {
			var n = t.content.curMainindex,
				i = t.content.curSubindex,
				e = null,
				o = t.content.curMainindex >= 0 && t.content.curSubindex < 0,
				a = t.content.curMainindex >= 0 && t.content.curSubindex >= 0,
				s = $(this).val();
			o ? e = t.content.dataset[n] : a && (e = t.content.dataset[n].subNav[i]);
			var l = o ? 4 : 6,
				d = /\W/g;
			d.test(s) ? s.length > l && (s = s.substring(0, l), $(this).val(s)) : s.length > l && (s = s.substring(0, 2 * l), $(this).val(s)), e.showtitle = s, c()
		}), e.find(".j-uploadIcon").click(function(n) {
			var i = $(this).closest(".navCtrlPanel-right").siblings("ul").find("li").find("dt.selected").closest("li").index() - 1;
			HYD.popbox.ImgPicker(function(n) {
				t.content.dataset[i].icon = n[0], c()
			})
		}), e.find(".j-navModifyIcon").click(function() {
			var n = $(this).closest(".navCtrlPanel-right").siblings("ul").find("li").find("dt.selected").closest("li").index() - 1;
			HYD.popbox.IconPicker(function(i) {
				t.content.dataset[n].icon = i[0], c()
			})
		}), e.find(".colorPicker").each(function(n) {
			var i = ($(this).data("name"), $(this).data("color")),
				e = $(this);
			0 == n ? e.ColorPicker({
				color: i,
				onShow: function(n) {
					return $(n).fadeIn(500), !1
				},
				onHide: function(n) {
					return $(n).fadeOut(500), c(), !1
				},
				onChange: function(n, i, o) {
					var i = "#" + i,
						a = e.closest(".navCtrlPanel-right").siblings("ul").find("li").find("dt.selected").closest("li").index() - 1;
					t.content.dataset[a].bgColor = i, console.log(a), e.css("background-color", i)
				}
			}) : e.ColorPicker({
				color: i,
				onShow: function(n) {
					return $(n).fadeIn(500), !1
				},
				onHide: function(n) {
					return $(n).fadeOut(500), c(), !1
				},
				onChange: function(n, i, o) {
					var i = "#" + i,
						a = e.closest(".navCtrlPanel-right").siblings("ul").find("li").find("dt.selected").closest("li").index() - 1;
					t.content.dataset[a].fotColor = i, console.log(a), e.css("background-color", i)
				}
			})
		}), e.find('input[name="showstyle"]').change(function(n) {
			var i = $(this).val();
			t.content.style = i, c()
		}), e.find("input[name='customlink']").change(function() {
			var n = t.content.curMainindex,
				i = t.content.curSubindex,
				e = null;
			t.content.curMainindex >= 0 && t.content.curSubindex < 0 ? e = t.content.dataset[n] : t.content.curMainindex >= 0 && t.content.curSubindex >= 0 && (e = t.content.dataset[n].subNav[i]), e.link = $(this).val(), c()
		}), e.find(".j-addNav").click(function() {
			var n = {
				linkType: 0,
				link: "",
				title: "导航名称",
				showtitle: "导航名称",
				subNav: []
			};
			return t.content.dataset.length >= 4 ? void HYD.hint("warning", "最多可以添加4个一级导航菜单") : (t.content.dataset.push(n), t.content.curMainindex = t.content.dataset.length - 1, t.content.curSubindex = -1, c(), !1)
		}), e.find(".j-addSubNav").click(function() {
			var n = {
					linkType: 0,
					link: "",
					title: "导航名称",
					showtitle: "导航名称"
				},
				i = $(this).parents("li").index() - 1;
			return t.content.dataset[i].subNav.length >= 10 ? void HYD.hint("warning", "最多可以添加10个二级导航菜单") : (t.content.dataset[i].subNav.push(n), t.content.curMainindex = i, t.content.curSubindex = t.content.dataset[i].subNav.length - 1, c(), !1)
		}), e.find(".j-dd-moveup").click(function() {
			var n = $(this).parents("li").index() - 1,
				i = $(this).parents("dd").index();
			if (1 != i) {
				var e = t.content.dataset[n].subNav.slice(i - 1, i)[0];
				return t.content.dataset[n].subNav.splice(i - 1, 1), t.content.dataset[n].subNav.splice(i - 2, 0, e), c(), !1
			}
		}), e.find(".j-dd-movedown").click(function() {
			var n = $(this).parents("li").index() - 1;
			if (dindex = $(this).parents("dd").index(), len = t.content.dataset[n].subNav.length, dindex != len) {
				var i = t.content.dataset[n].subNav.slice(dindex, dindex + 1)[0];
				return t.content.dataset[n].subNav.splice(dindex, 1), t.content.dataset[n].subNav.splice(dindex - 1, 0, i), c(), !1
			}
		}), e.find(".j-delNav").click(function() {
			var n = $(this).parents("li").index() - 1;
			return t.content.dataset.splice(n, 1), t.content.curMainindex = -1, t.content.curSubindex = -1, c(), !1
		}), e.find(".j-delSubNav").click(function() {
			var n = $(this).parents("li").index() - 1,
				i = $(this).parents("dd").index() - 1;
			return t.content.dataset[n].subNav.splice(i, 1), t.content.curMainindex = -1, t.content.curSubindex = -1, c(), !1
		}), e.find(".j-moveup").click(function() {
			var n = $(this).parents("li").index();
			if (1 != n) {
				var i = t.content.dataset.slice(n - 1, n)[0];
				return t.content.dataset.splice(n - 1, 1), t.content.dataset.splice(n - 2, 0, i), c(), !1
			}
		}), e.find(".j-movedown").click(function() {
			var n = $(this).parents("li").index(),
				i = t.content.dataset.length;
			if (n != i) {
				var e = t.content.dataset.slice(n, n + 1)[0];
				return t.content.dataset.splice(n, 1), t.content.dataset.splice(n - 1, 0, e), c(), !1
			}
		}), e.find(".np-left-navlist li").hover(function() {
			$(this).find("dt .li-position").show()
		}, function() {
			$(this).find("dt .li-position").hide()
		}), e.find(".np-left-navlist li dd").hover(function() {
			$(this).find(".dd-position").show()
		}, function() {
			$(this).find(".dd-position").hide()
		})
	};
	var t = $("#j-initdata").val();
	t = t.length ? $.parseJSON(t) : n, $(".j-pagetitle").text(t.page.title), $(".j-pagetitle-ipt").val(t.page.title), _.each(t.PModules, function(n, t) {
		var i = 0 == t ? !0 : !1;
		HYD.DIY.add(n, i)
	}), _.each(t.LModules, function(n) {
		HYD.DIY.add(n)
	}), $(document).on("click", ".j-showNavSub dt", function() {
		return $(".nav-item-sub").hide(), $(this).siblings(".nav-item-sub").show(), !1
	}), $("#j-savePage").click(function() {
		if (HYD.DIY.Unit.verify()) {
			var n = HYD.DIY.Unit.getData();
			return n.PModules[0].content.curMainindex = -1, n.PModules[0].content.curMainindex = -1, $.ajax({
				url: 'index.php?con=shop&act=setting&type=navigation',
				type: "post",
				dataType: "json",
				data: {
					commit: 1,
					content: JSON.stringify(n),
					is_preview: 0
				},
				beforeSend: function() {
					$.jBox.showloading()
				},
				success: function(n) {
					1 == n.status ? HYD.hint("success", "恭喜您，保存成功！") : HYD.hint("danger", "对不起，保存失败：" + n.msg), $.jBox.hideloading()
				}
			}), !1
		}
	})
});
