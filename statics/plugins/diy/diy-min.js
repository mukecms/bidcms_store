$(function() {
    HYD.DIY = HYD.DIY ? HYD.DIY : {}, HYD.DIY.Unit = HYD.DIY.Unit ? HYD.DIY.Unit : {}, HYD.DIY.PModules = HYD.DIY.PModules ? HYD.DIY.PModules : [], HYD.DIY.LModules = HYD.DIY.LModules ? HYD.DIY.LModules : [];
    var t = $("#diy-contain"),
        e = $("#diy-ctrl");
    HYD.DIY.constant = {
        diyoffset: $(".diy").offset()
    }, HYD.DIY.getTimestamp = function() {
        var t = new Date;
        return "" + t.getFullYear() + parseInt(t.getMonth() + 1) + t.getDate() + t.getHours() + t.getMinutes() + t.getSeconds() + t.getMilliseconds()
    }, HYD.DIY.add = function(e, n) {
		e.content || (e.content = {}),"undefined" == typeof e.content.modulePadding && (e.content.modulePadding = 5);
		var i = _.template($("#tpl_diy_con_type" + e.type).html(), e),
            o = _.template($("#tpl_diy_conitem").html(), {
                html: i
            }),
            a = $(o);
        e.dom_conitem = a;
        var l = a.find(".diy-conitem-action"),
            c = (l.find(".j-edit"), l.find(".j-del"));
        l.click(function() {
            $(".diy-conitem-action").removeClass("selected"), $(this).addClass("selected"), HYD.DIY.edit(e)
        });
        var d = "";
        return e.draggable ? (c.click(function() {
            return HYD.DIY.del(e), !1
        }), d = ".drag") : (c.remove(), d = ".nodrag"), t.find(d).append(a), n = !!n && n, n && l.click(), e.draggable ? HYD.DIY.LModules.push(e) : HYD.DIY.PModules.push(e), !1
    }, HYD.DIY.edit = function(t) {
        t.content || (t.content = {}), "undefined" == typeof t.content.modulePadding && (t.content.modulePadding = 5), e.find(".diy-ctrl-item[data-origin='item']").remove();
        var n = $("#tpl_diy_ctrl").html(),
            i = _.template($("#tpl_diy_ctrl_type" + t.type).html(), t),
            o = _.template(n, {
                html: i
            }),
            a = $(o);
        return e.append(a), HYD.DIY.repositionCtrl(t.dom_conitem, a), HYD.DIY.bindEvents(a, t), a.show().siblings(".diy-ctrl-item").hide(), !1
    }, HYD.DIY.repositionCtrl = function(t, e) {
        var n = t.offset().top,
            i = n - HYD.DIY.constant.diyoffset.top;
        e.css("marginTop", i), $("html,body").animate({
            scrollTop: i
        }, 300)
    }, HYD.DIY.del = function(t) {
        if (t) return $.jBox.show({
            title: "提示",
            content: _.template($("#tpl_jbox_simple").html(), {
                content: "删除后将不可恢复，是否继续？"
            }),
            btnOK: {
                onBtnClick: function(n) {
                    $.jBox.close(n);
                    for (var i = HYD.DIY.LModules, o = HYD.DIY.LModules.length, a = 0; a < o; a++)
                        if (i[a].id == t.id) {
                            i.splice(a, 1);
                            break
                        }
                    t.dom_conitem.remove(), e.find(".diy-ctrl-item[data-origin='item']").remove()
                }
            }
        }), !1
    }, HYD.DIY.bindEvents = function(t, e) {
        10 != e.type && HYD.DIY.Unit["event_type" + e.type](t, e)
    }, HYD.DIY.reCalcPModulesSort = function() {
        _.each(HYD.DIY.LModules, function(t, e) {
            t.sort = t.dom_conitem.index()
        })
    }, HYD.DIY.Unit.getData = function() {
        HYD.DIY.reCalcPModulesSort();
        var t = {
            page: {},
            PModules: {},
            LModules: {}
        };
        t.page.title = $(".j-pagetitle-ipt").val(),
        t.page.subtitle = $(".j-pagesubtitle-ipt").val(),
        t.page.view_pic = $(".j-view_pic-ipt").prop("src"),
        t.page.praise_num = $(".j-pagepraisenum").val(),
        t.PModules = HYD.DIY.PModules,
        t.page.goto_time = $(".j-gototime-ipt").val(),
        t.page.hasMargin = $(".j-page-hasMargin:checked").val() || 1,
        t.page.backgroundColor = $("#j-page-backgroundColor").data("color") || "#f8f8f8";
        for (var e = [], n = 0; n < HYD.DIY.LModules.length; n++) {
            var i = HYD.DIY.LModules[n];
            "" != i && (e[i.sort] = i)
        }
        t.LModules = e;
        var i = $.extend(!0, {}, t);
        return _.each(i.LModules, function(t) {
            t.dom_conitem = null, t.dom_ctrl = null, t.ue = null
        }), _.each(i.PModules, function(t) {
            t.dom_conitem = null, t.dom_ctrl = null, t.ue = null
        }), i
    }, HYD.DIY.Unit.html_encode = function(t) {
        var e = "";
        return 0 == t.length ? "" : (e = t.replace(/&/g, "&amp;"), e = e.replace(/</g, "&lt;"), e = e.replace(/>/g, "&gt;"), e = e.replace(/ /g, "&nbsp;"), e = e.replace(/\'/g, "&#39;"), e = e.replace(/\"/g, "&quot;"))
    }, HYD.DIY.Unit.html_decode = function(t) {
        var e = "";
        return 0 == t.length ? "" : (e = t.replace(/&amp;/g, "&"), e = e.replace(/&lt;/g, "<"), e = e.replace(/&gt;/g, ">"), e = e.replace(/&nbsp;/g, " "), e = e.replace(/&#39;/g, "'"), e = e.replace(/&quot;/g, '"'))
    }
}), 
$(function() {
    var t = function(t) {
        var e = t;
        return e = e.replace(/\<script\>/, ""), e = e.replace(/\<\/script\>/, "")
    };
    $(document).on("change", ".input,.diy-videowebsite input", function() {
        var t = $(this).val();
        t = t.replace(/\</, "&lt;").replace(/\</, "&lt;"), t = t.replace(/\>/, "&gt;").replace(/\>/, "&gt;"), t = t.replace(/\//, "/"), $(this).val(t)
    }), 
	HYD.DIY.Unit.event_type1 = function(e, n) {
        var i = n.dom_conitem,
            o = e;
        n.ue && n.ue.destroy(), n.ue = UE.getEditor("editor" + n.id), n.ue.ready(function() {
            n.ue.setContent(HYD.DIY.Unit.html_decode(n.content.fulltext)), n.ue.focus(!0);
            var e = function() {
                var e = n.ue.getContent(),
                    e = t(e);
                i.find(".fulltext").html(e), n.content.fulltext = HYD.DIY.Unit.html_encode(e)
            };
            n.ue.addListener("selectionchange", e), n.ue.addListener("contentChange", e)
        }), o.find(".j-slider").slider({
            min: 0,
            max: 50,
            step: 1,
            animate: "fast",
            value: n.content.modulePadding,
            slide: function(t, e) {
                i.find(".modulePadding").css({
                    "padding-top": e.value,
                    "padding-bottom": e.value
                }), o.find(".j-ctrl-showheight").text(e.value + "px")
            },
            stop: function(t, e) {
                n.content.modulePadding = parseInt(e.value)
            }
        })
    }, HYD.DIY.Unit.event_type2 = function(t, e) {
        var n = e.dom_conitem,
            i = t,
            o = $("#tpl_diy_con_type2").html(),
            a = $("#tpl_diy_ctrl_type2").html();
        e.dom_ctrl = t;
        var l = function() {
            var t = $(_.template(o, e));
            n.find(".members_con").remove().end().append(t);
            var l = $(_.template(a, e));
            i.empty().append(l), HYD.DIY.Unit.event_type2(i, e)
        };
        i.find("input[name='title'],input[name='direction'],input[name='style']").change(function() {
            var t = $(this).val(),
                n = $(this).attr("name");
            e.content[n] = t, l()
        }), i.find(".j-imgNav-cp").each(function(t, n) {
            var i = $(this).data("#FE9303");
            $(this).ColorPicker({
                color: i,
                onShow: function(t) {
                    return $(t).fadeIn(500), !1
                },
                onHide: function(t) {
                    return $(t).fadeOut(500), !1
                },
                onChange: function(t, n, i) {
                    var n = "#" + n;
                    e.content.BackgroundColor = n, l()
                }
            })
        }), i.find(".j-textColor-cp").each(function(t, n) {
            var i = $(this).data("#FFF");
            $(this).ColorPicker({
                color: i,
                onShow: function(t) {
                    return $(t).fadeIn(500), !1
                },
                onHide: function(t) {
                    return $(t).fadeOut(500), !1
                },
                onChange: function(t, n, i) {
                    var n = "#" + n;
                    e.content.titleColor = n, l()
                }
            })
        }), i.find(".j-slider").slider({
            min: 0,
            max: 50,
            step: 1,
            animate: "fast",
            value: e.content.modulePadding,
            slide: function(t, e) {
                n.find(".modulePadding").css({
                    "padding-top": e.value,
                    "padding-bottom": e.value
                }), i.find(".j-ctrl-showheight").text(e.value + "px")
            },
            stop: function(t, n) {
                e.content.modulePadding = parseInt(n.value)
            }
        })
    }, HYD.DIY.Unit.event_type3 = function(i, t) {
		var e = t.dom_conitem,
			n = i,
			l = $("#tpl_diy_con_type3").html(),
			o = $("#tpl_diy_ctrl_type3").html();
		t.dom_ctrl = i;
		var a = function(i) {
			var a = $(_.template(l, t));
			e.find(".members_con").remove().end().append(a);
			var s = $(_.template(o, t));
			n.empty().append(s), HYD.DIY.Unit.event_type3(n, t), i && i()
		};
		n.find("input[name='showName']").change(function() {
			var i = $(this).val();
			t.content.showName = i, a()
		}),n.find("input[name='mainTitleStyle']").change(function() {
			var i = $(this).val();
			t.content.mainTitleStyle = i, a()
		}), n.find("input[name='showPrice']").change(function() {
			t.content.showPrice = $(this).val(), a()
		}), n.find("input[name='priceBold']").change(function() {
			var i = $(this).val();
			t.content.priceBold = i, a()
		}),n.find("input[name='priceTips']").blur(function() {
			var i = $(this).val();
			t.content.priceTips = i, a()
		}),n.find("input[name='title']").blur(function() {
			var i = $(this).val();
			t.content.title = i, a()
		}), n.find(".j-delgoods").click(function() {
			var i = $(this).parents("li").index();
			return t.content.goodslist.splice(i, 1), a(), !1
		}), n.find(".j-addgoods").click(function() {
			var i = n.find("input[name=goods_ids]").val().split(",");
			return $.selectGoods({
				selectMod: 2,
				selectIds: i,
				callback: function(i, e) {
					t.content.goodslist = t.content.goodslist.concat(i), a()
				}
			}), !1
		}), n.find(".img-list>li .img-move-left").on("click", function() {
			var i = $(this),
				e = i.closest("li").index(),
				n = i.closest("li");
			if (0 != e) {
				e--, i.closest("ul").find("li").eq(e).before(n);
				var l = t.content.goodslist.slice(e + 1, e + 2)[0];
				t.content.goodslist.splice(e + 1, 1), t.content.goodslist.splice(e, 0, l), a()
			}
			return !1
		}), n.find(".img-list>li .img-move-right").on("click", function() {
			var i = $(this),
				e = i.closest("ul").find("li").length - 1,
				n = i.closest("li").index(),
				l = i.closest("li");
			if (n != e - 1) {
				n++, i.closest("ul").find("li").eq(n).after(l);
				var o = t.content.goodslist.slice(n, n + 1)[0];
				t.content.goodslist.splice(n, 1), t.content.goodslist.splice(n - 1, 0, o), a()
			}
			return !1
		}), n.find(".j-slider").slider({
			min: 0,
			max: 50,
			step: 1,
			animate: "fast",
			value: t.content.modulePadding,
			slide: function(i, t) {
				e.find(".modulePadding").css({
					"padding-top": t.value,
					"padding-bottom": t.value
				}), n.find(".j-ctrl-showheight").text(t.value + "px")
			},
			stop: function(i, e) {
				t.content.modulePadding = parseInt(e.value)
			}
		})
	},HYD.DIY.Unit.event_type4 = function(t, e) {
        var n = e.dom_conitem,
            i = t,
            o = $("#tpl_diy_con_type4").html(),
            a = $("#tpl_diy_ctrl_type4").html();
        e.dom_ctrl = t;
        var l = function(t) {
                var l = $(_.template(o, e));
                n.find(".members_con").remove().end().append(l);
                var c = $(_.template(a, e));
                i.empty().append(c), HYD.DIY.Unit.event_type4(i, e), t && t()
            },
            c = function() {
                n.find(".mingoods,.biggoods,.b_mingoods").each(function(t, e) {
                    var n = $(this),
                        i = n.find("img").width();
                    n.find("img").closest("a").height(i)
                })
            },
            d = function() {
                n.find(".J_sliderGoods").each(function() {
                    var t = $(this),
                        e = t.find("li").width(),
                        n = t.find("li").height();
                    t.css({
                        height: n
                    }).find("li").css("width", e - 2)
                })
            };
        i.find("input[name='layout']").change(function() {
            var t = $(this).val();
            e.content.layout = t, l(c), d()
        }), i.find("input[name='goodstyle']").change(function() {
            var t = $(this).val();
            e.content.goodstyle = t, l(c)
        }), i.find("input[name='layoutstyles']").change(function() {
            var t = $(this).val();
            e.content.layoutstyles = t, l(c)
        }), i.find("input[name='showName']").change(function() {
            var t = $(this).val();
            e.content.showName = t, l(c), d()
        }), i.find("input[name='showIco']").change(function() {
            var t = $(this).is(":checked");
            e.content.showIco = t, l(c)
        }), i.find("input[name='showPrice']").change(function() {
            var t = $(this).is(":checked");
            e.content.showPrice = t, l(c)
        }), i.find("input[name='priceBold']").change(function() {
            var t = $(this).val();
            e.content.priceBold = t, l(c)
        }), i.find("input[name='goodstxt']").change(function() {
            var t = $(this).val();
            n.find(".goods-btn a").text($(this).val()), e.content.goodstxt = t, l(c)
        }), i.find("input[name='multiLine']").change(function() {
            $(this).attr("checked") ? ($(this).attr("checked", "true"), e.content.titleLine = 1) : ($(this).removeAttr("checked"), e.content.titleLine = 0), l(c)
        }), i.find(".j-delgoods").click(function() {
            var t = $(this).parents("li").index();
            return e.content.goodslist.splice(t, 1), l(c), d(), !1
        }), i.find(".j-addgoods").click(function() {
            var t = i.find("input[name=goods_ids]").val().split(",");
            return 3 == e.content.layout && t.length >= 20 ? HYD.hint("warning", "您最多可以添加20个商品") : ($.selectGoods({
                selectMod: 2,
                selectIds: t,
                callback: function(t, n) {
                    e.content.goodslist = e.content.goodslist.concat(t), 3 == e.content.layout && e.content.goodslist.length > 20 && (e.content.goodslist.length = 20, HYD.hint("warning", "您最多可以添加20个商品")), l(c), d()
                }
            }), !1)
        }), i.find(".img-list>li .img-move-left").on("click", function() {
            var t = $(this),
                n = t.closest("li").index(),
                i = t.closest("li");
            if (0 != n) {
                n--, t.closest("ul").find("li").eq(n).before(i);
                var o = e.content.goodslist.slice(n + 1, n + 2)[0];
                e.content.goodslist.splice(n + 1, 1), e.content.goodslist.splice(n, 0, o), l(c), d()
            }
            return !1
        }), i.find(".img-list>li .img-move-right").on("click", function() {
            var t = $(this),
                n = t.closest("ul").find("li").length - 1,
                i = t.closest("li").index(),
                o = t.closest("li");
            if (i != n - 1) {
                i++, t.closest("ul").find("li").eq(i).after(o);
                var a = e.content.goodslist.slice(i, i + 1)[0];
                e.content.goodslist.splice(i, 1), e.content.goodslist.splice(i - 1, 0, a), l(c), d()
            }
            return !1
        }), i.find(".j-slider").slider({
            min: 0,
            max: 50,
            step: 1,
            animate: "fast",
            value: e.content.modulePadding,
            slide: function(t, e) {
                n.find(".modulePadding").css({
                    "padding-top": e.value,
                    "padding-bottom": e.value
                }), i.find(".j-ctrl-showheight").text(e.value + "px")
            },
            stop: function(t, n) {
                e.content.modulePadding = parseInt(n.value)
            }
        })
    }, HYD.DIY.Unit.event_type6 = function(t, e) {
        var n = e.dom_conitem,
            i = t;
        $("#tpl_diy_con_type6").html(), $("#tpl_diy_ctrl_type6").html();
        e.dom_ctrl = t, i.find(".j-slider").slider({
            min: 0,
            max: 50,
            step: 1,
            animate: "fast",
            value: e.content.modulePadding,
            slide: function(t, e) {
                n.find(".modulePadding").css({
                    "padding-top": e.value,
                    "padding-bottom": e.value
                }), i.find(".j-ctrl-showheight").text(e.value + "px")
            },
            stop: function(t, n) {
                e.content.modulePadding = parseInt(n.value)
            }
        })
    }, HYD.DIY.Unit.event_type7 = function(t, e) {
        var n = e.dom_conitem,
            i = t,
            o = $("#tpl_diy_con_type7").html(),
            a = $("#tpl_diy_ctrl_type7").html();
        e.dom_ctrl = t;
        var l = function() {
            var t = $(_.template(o, e));
            n.find(".members_con").remove().end().append(t);
            var l = $(_.template(a, e));
            i.empty().append(l), HYD.DIY.Unit.event_type7(i, e)
        };
        i.find("input[name='title']").change(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index();
            e.content.dataset[t].showtitle = $(this).val(), l()
        }), i.find(".droplist li").click(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index();
            HYD.popbox.dplPickerColletion({
                linkType: $(this).data("val"),
                callback: function(n, i) {
                    e.content.dataset[t].title = n.title, e.content.dataset[t].showtitle = n.title, e.content.dataset[t].link = n.link, e.content.dataset[t].linkType = i, l()
                }
            })
        }), i.find("input[name='customlink']").change(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index();
            e.content.dataset[t].link = $(this).val()
        }), i.find(".j-moveup").click(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index();
            if (0 != t) {
                var n = e.content.dataset.slice(t, t + 1)[0];
                e.content.dataset.splice(t, 1), e.content.dataset.splice(t - 1, 0, n), l()
            }
        }), i.find(".j-movedown").click(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index(),
                n = e.content.dataset.length;
            if (t != n - 1) {
                var i = e.content.dataset.slice(t, t + 1)[0];
                e.content.dataset.splice(t, 1), e.content.dataset.splice(t + 1, 0, i), l()
            }
        }), i.find(".ctrl-item-list-add").click(function() {
            var t = {
                linkType: 0,
                link: "",
                title: "",
                showtitle: ""
            };
            e.content.dataset.push(t), l()
        }), i.find(".j-del").click(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index();
            e.content.dataset.splice(t, 1), l()
        }), i.find(".j-slider").slider({
            min: 0,
            max: 50,
            step: 1,
            animate: "fast",
            value: e.content.modulePadding,
            slide: function(t, e) {
                n.find(".modulePadding").css({
                    "padding-top": e.value,
                    "padding-bottom": e.value
                }), i.find(".j-ctrl-showheight").text(e.value + "px")
            },
            stop: function(t, n) {
                e.content.modulePadding = parseInt(n.value)
            }
        })
    }, HYD.DIY.Unit.event_type8 = function(t, e) {
        var n = e.dom_conitem,
            i = t,
            o = $("#tpl_diy_con_type8").html(),
            a = $("#tpl_diy_ctrl_type8").html();
        e.dom_ctrl = t;
        var l = function(t) {
            var l = $(_.template(o, e));
            n.find(".members_con").remove().end().append(l);
            var c = $(_.template(a, e));
            i.empty().append(c), HYD.DIY.Unit.event_type8(i, e), t && t()
        };
        i.find("input[name='layout'],input[name='layout1_style']").change(function() {
            var t = $(this).attr("name");
            e.content[t] = $(this).val(), l()
        }), i.find("input[name='title']").change(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index();
            e.content.dataset[t].showtitle = $(this).val(), l()
        }), i.find(".droplist li").click(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index();
            HYD.popbox.dplPickerColletion({
                linkType: $(this).data("val"),
                callback: function(n, i) {
                    e.content.dataset[t].title = n.title, e.content.dataset[t].showtitle = n.title, e.content.dataset[t].link = n.link, e.content.dataset[t].linkType = i, n.pic && "" != n.pic && (n.is_compress ? e.content.dataset[t].pic = n.pic + "480x480" : e.content.dataset[t].pic = n.pic), l()
                }
            })
        }), i.find(".j-selectimg").click(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index();
            HYD.popbox.ImgPicker(function(n) {
                e.content.dataset[t].pic = n[0], l()
            })
        }), i.find("input[name='customlink']").change(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index();
            e.content.dataset[t].link = $(this).val()
        }), i.find(".j-moveup").click(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index();
            if (0 != t) {
                var n = e.content.dataset.slice(t, t + 1)[0];
                e.content.dataset.splice(t, 1), e.content.dataset.splice(t - 1, 0, n), l()
            }
        }), i.find(".j-movedown").click(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index(),
                n = e.content.dataset.length;
            if (t != n - 1) {
                var i = e.content.dataset.slice(t, t + 1)[0];
                e.content.dataset.splice(t, 1), e.content.dataset.splice(t + 1, 0, i), l()
            }
        }), i.find(".ctrl-item-list-add").click(function() {
            var t = {
                linkType: 0,
                link: "#",
                showtitle: "导航名称",
                titleBackgroundColor: "#FE9303",
                pic: "//shop.bidcms.com/store/statics/images/diy/waitupload.png"
            };
            e.content.dataset.push(t), l()
        }), i.find(".j-del").click(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index();
            e.content.dataset.splice(t, 1), l()
        }), i.find(".j-imgNav-cp").each(function(t, n) {
            var i = $(this).data("#FE9303");
            $(this).ColorPicker({
                color: i,
                onShow: function(t) {
                    return $(t).fadeIn(500), !1
                },
                onHide: function(t) {
                    return $(t).fadeOut(500), !1
                },
                onChange: function(n, i, o) {
                    var i = "#" + i;
                    e.content.dataset[t].titleBackgroundColor = i, l()
                }
            })
        }), i.find(".j-textColor-cp").each(function(t, n) {
            var i = $(this).data("#FFF");
            $(this).ColorPicker({
                color: i,
                onShow: function(t) {
                    return $(t).fadeIn(500), !1
                },
                onHide: function(t) {
                    return $(t).fadeOut(500), !1
                },
                onChange: function(n, i, o) {
                    var i = "#" + i;
                    e.content.dataset[t].titleColor = i, l()
                }
            })
        }), i.find(".j-slider").slider({
            min: 0,
            max: 50,
            step: 1,
            animate: "fast",
            value: e.content.modulePadding,
            slide: function(t, e) {
                n.find(".modulePadding").css({
                    "padding-top": e.value,
                    "padding-bottom": e.value
                }), i.find(".j-ctrl-showheight").text(e.value + "px")
            },
            stop: function(t, n) {
                e.content.modulePadding = parseInt(n.value)
            }
        }),i.find(".j-scale").slider({
            min: 0,
            max: 100,
            step: 1,
            animate: "fast",
            value: e.content.imageScale,
            slide: function(t, e) {
                i.find(".j-ctrl-showscale").text(e.value + "%")
            },
            stop: function(t, n) {
                e.content.imageScale = parseInt(n.value);
				l();
            }
        })
    }, HYD.DIY.Unit.event_type9 = function(t, e) {
        var n = e.dom_conitem,
            i = t,
            o = $("#tpl_diy_con_type9").html(),
            a = $("#tpl_diy_ctrl_type9").html();
        e.dom_ctrl = t;
        var l = function() {
            var t = $(_.template(o, e));
            n.find(".members_con").remove().end().append(t);
            var l = $(_.template(a, e));
            i.empty().append(l), HYD.DIY.Unit.event_type9(i, e)
        };
        i.find("input[name='title']").change(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index();
            e.content.dataset[t].showtitle = $(this).val(), l()
        }),  i.find("input[name='showType']").change(function() {
            e.content.showType = $(this).val(), l()
        }), i.find("input[name='space']").change(function() {
            e.content.space = $(this).val(), l()
        }), i.find(".j-slider").slider({
            min: 0,
            max: 20,
            step: 1,
            animate: "fast",
            value: e.content.margin,
            slide: function(t, e) {
                n.find(".members_imgad ul li").css("margin-bottom", e.value), i.find(".j-ctrl-showheight").text(e.value + "px")
            },
            stop: function(t, n) {
                e.content.margin = parseInt(n.value)
            }
        }), i.find(".droplist li").click(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index();
            HYD.popbox.dplPickerColletion({
                linkType: $(this).data("val"),
                callback: function(n, i) {
                    e.content.dataset[t].title = n.title, e.content.dataset[t].showtitle = n.title, e.content.dataset[t].link = n.link, e.content.dataset[t].linkType = i, e.content.dataset[t].is_compress = n.is_compress, n.pic && "" != n.pic && (n.is_compress ? e.content.dataset[t].pic = n.pic + "480x480" : e.content.dataset[t].pic = n.pic), l()
                }
            })
        }), i.find(".j-selectimg").click(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index();
            HYD.popbox.ImgPicker(function(n) {
                e.content.dataset[t].pic = n[0], l()
            })
        }), i.find("input[name='customlink']").change(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index();
            e.content.dataset[t].link = $(this).val();
        }), i.find(".j-moveup").click(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index();
            if (0 != t) {
                var n = e.content.dataset.slice(t, t + 1)[0];
                e.content.dataset.splice(t, 1), e.content.dataset.splice(t - 1, 0, n), l()
            }
        }), i.find(".j-movedown").click(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index(),
                n = e.content.dataset.length;
            if (t != n - 1) {
                var i = e.content.dataset.slice(t, t + 1)[0];
                e.content.dataset.splice(t, 1), e.content.dataset.splice(t + 1, 0, i), l()
            }
        }), i.find(".ctrl-item-list-add").click(function() {
            var t = {
                linkType: 0,
                link: "",
                title: "",
                showtitle: "",
                pic: "",
                duration:0
            };
            e.content.dataset.push(t), l()
        }), i.find(".j-del").click(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index();
            e.content.dataset.splice(t, 1), l()
        }), i.find(".j-slider2").slider({
            min: 0,
            max: 50,
            step: 1,
            animate: "fast",
            value: e.content.modulePadding,
            slide: function(t, e) {
                n.find(".modulePadding").css({
                    "padding-top": e.value,
                    "padding-bottom": e.value
                }), i.find(".j-ctrl-showheight2").text(e.value + "px")
            },
            stop: function(t, n) {
                e.content.modulePadding = parseInt(n.value)
            }
        })
    }, HYD.DIY.Unit.event_type11 = function(t, e) {
        var n = e.dom_conitem,
            i = t;
        $("#tpl_diy_con_type11").html(), $("#tpl_diy_ctrl_type11").html();
        e.dom_ctrl = t;
        i.find("#slider").slider({
            min: 10,
            max: 100,
            step: 1,
            animate: "fast",
            value: e.content.height,
            slide: function(t, e) {
                n.find(".custom-space").css("height", e.value), i.find(".j-ctrl-showheight").text(e.value + "px")
            },
            stop: function(t, n) {
                e.content.height = parseInt(n.value)
            }
        })
    }, HYD.DIY.Unit.event_type12 = function(t, e) {
        var n = e.dom_conitem,
            i = t,
            o = $("#tpl_diy_con_type12").html(),
            a = $("#tpl_diy_ctrl_type12").html();
        e.dom_ctrl = t;
        var l = function() {
            var t = $(_.template(o, e));
            n.find(".members_con").remove().end().append(t);
            var l = $(_.template(a, e));
            i.empty().append(l), HYD.DIY.Unit.event_type12(i, e)
        };
        i.find("input[name='navtitle']").change(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index(),
                n = $(this).val();
            e.content.dataset[t].showtitle = n, l()
        }), i.find(".droplist li").click(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index();
            HYD.popbox.dplPickerColletion({
                linkType: $(this).data("val"),
                callback: function(n, i) {
                    e.content.dataset[t].title = n.title, e.content.dataset[t].showtitle = n.title, e.content.dataset[t].link = n.link, e.content.dataset[t].linkType = i, n.pic && "" != n.pic && (e.content.dataset[t].pic = n.pic), l()
                }
            })
        }), i.find(".j-selectimg").click(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index();
            HYD.popbox.ImgPicker(function(n) {
                e.content.dataset[t].pic = n[0], l()
            })
        }), i.find("input[name='customlink']").change(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index();
            e.content.dataset[t].link = $(this).val()
        }), i.find("select[name='navbgColor']").change(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index(),
                n = $(this).val();
            e.content.dataset[t].bgColor = n, l()
        }), i.find('input[name="showstyle"]').change(function(t) {
            var n = $(this),
                i = n.val();
            e.content.style = i, l()
        }), i.find('input[name="marginstyle"]').change(function(t) {
            var n = $(this),
                i = n.val();
            e.content.marginstyle = i, l()
        }), i.find(".ctrl-item-list-li").each(function(t, n) {
            var i = $(this);
            i.find(".colorPicker").each(function(n, i) {
                var o = $(this);
                if (0 == n) {
                    var a = ($(this).data("name"), $(this).data("color"));
                    o.ColorPicker({
                        color: a,
                        onShow: function(t) {
                            return $(t).fadeIn(100), !1
                        },
                        onHide: function(t) {
                            return $(t).fadeOut(100), l(), !1
                        },
                        onChange: function(n, i, a) {
                            var i = "#" + i;
                            o.css("background-color", i), e.content.dataset[t].bgColor = i
                        }
                    })
                } else {
                    var a = ($(this).data("name"), $(this).data("color"));
                    o.ColorPicker({
                        color: a,
                        onShow: function(t) {
                            return $(t).fadeIn(100), !1
                        },
                        onHide: function(t) {
                            return $(t).fadeOut(100), l(), !1
                        },
                        onChange: function(n, i, a) {
                            var i = "#" + i;
                            o.css("background-color", i), e.content.dataset[t].fotColor = i
                        }
                    })
                }
            })
        }), i.find(".j-uploadIcon").click(function(t) {
            var n = $(this).parents("li.ctrl-item-list-li").index();
            HYD.popbox.ImgPicker(function(t) {
                e.content.dataset[n].pic = t[0], l()
            })
        }), i.find(".j-navModifyIcon").click(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index();
            HYD.popbox.IconPicker(function(n) {
                e.content.dataset[t].pic = n[0], l()
            })
        }), i.find(".j-moveup").click(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index();
            if (0 != t) {
                var n = e.content.dataset.slice(t, t + 1)[0];
                e.content.dataset.splice(t, 1), e.content.dataset.splice(t - 1, 0, n), l()
            }
        }), i.find(".j-movedown").click(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index(),
                n = e.content.dataset.length;
            if (t != n - 1) {
                var i = e.content.dataset.slice(t, t + 1)[0];
                e.content.dataset.splice(t, 1), e.content.dataset.splice(t + 1, 0, i), l()
            }
        }), i.find(".ctrl-item-list-add").click(function() {
            var t = $(this).closest("ul").children("li").length;
            if (t < 11) {
                var n = {
                    linkType: 0,
                    link: "",
                    title: "",
                    showtitle: "内容",
                    pic: "",
                    bgColor: "#07a0e7",
                    fotColor: "#fff"
                };
                e.content.dataset.push(n), l()
            } else HYD.hint("danger", "顶部菜单不可多于10个")
        }), i.find(".j-del").click(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index();
            e.content.dataset.splice(t, 1), l()
        }), i.find(".j-slider").slider({
            min: 0,
            max: 50,
            step: 1,
            animate: "fast",
            value: e.content.modulePadding,
            slide: function(t, e) {
                n.find(".modulePadding").css({
                    "padding-top": e.value,
                    "padding-bottom": e.value
                }), i.find(".j-ctrl-showheight").text(e.value + "px")
            },
            stop: function(t, n) {
                e.content.modulePadding = parseInt(n.value)
            }
        })
    }, HYD.DIY.Unit.event_type13 = function(t, e) {
        var n = e.dom_conitem,
            i = t,
            o = $("#tpl_diy_con_type13").html(),
            a = $("#tpl_diy_ctrl_type13").html();
        e.dom_ctrl = t;
        var l = function(t) {
                var l = $(_.template(o, e));
                n.find(".members_con").remove().end().append(l);
                var c = $(_.template(a, e));
                i.empty().append(c), HYD.DIY.Unit.event_type13(i, e), t && t()
            },
            c = function() {
                var t = $("input[name=layout]:checked").val();
                /*1 == parseInt(t) ? $(".board3").each(function(t, e) {
                    var n = $(this),
                        i = n.width();
                    n.height(i).css("overflow", "hidden")
                }) : $(".board3").each(function(t, e) {
                    var n = $(this),
                        i = n.width();

                    !n.hasClass("small_board") && n.hasClass("big_board") || n.children("span").attr("style", "height:" + i + "px !important;overflow:hidden;"), n.hasClass("big_board") && n.children("span").attr("style", "height:" + (2 * i + 9) + "px !important;overflow:hidden;")
                })*/
            };
        i.find('input[name="layout"]').change(function(t) {
            var n = $(this),
                i = n.val();
            e.content.layout = i, e.content.version && 2 == e.content.version ? l() : l(c)
        }), i.find("input[name='title']").change(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index();
            e.content.dataset[t].title = $(this).val(), l()
        }), i.find(".droplist li").click(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index();
            HYD.popbox.dplPickerColletion({
                linkType: $(this).data("val"),
                callback: function(n, i) {
                    e.content.dataset[t].title = n.title, e.content.dataset[t].link = n.link, e.content.dataset[t].linkType = i, e.content.dataset[t].is_compress = n.is_compress, n.pic && "" != n.pic && (e.content.dataset[t].pic = n.pic), l()
                }
            })
        }), i.find(".j-selectimg").click(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index();
            HYD.popbox.ImgPicker(function(n) {
                n[0].indexOf("@") < 0 ? (e.content.dataset[t].pic = n[0] + "@", e.content.dataset[t].is_compress = 1) : (e.content.dataset[t].pic = n[0], e.content.dataset[t].is_compress = 0), e.content.version && 2 == e.content.version ? l() : l(c)
            })
        }), i.find("input[name='customlink']").change(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index();
            e.content.dataset[t].link = $(this).val()
        }), i.find(".j-showTitle").change(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index();
            e.content.dataset[t].showTitle = $(this).val(), l()
        }), i.find(".j-slider").slider({
            min: 0,
            max: 50,
            step: 1,
            animate: "fast",
            value: e.content.modulePadding,
            slide: function(t, e) {
                n.find(".modulePadding").css({
                    "padding-top": e.value,
                    "padding-bottom": e.value
                }), i.find(".j-ctrl-showheight").text(e.value + "px")
            },
            stop: function(t, n) {
                e.content.modulePadding = parseInt(n.value)
            }
        })
    }, HYD.DIY.Unit.event_type14 = function(t, e) {
        var n = e.dom_conitem,
            i = t,
            o = $("#tpl_diy_con_type14").html(),
            a = $("#tpl_diy_ctrl_type14").html();
        e.dom_ctrl = t;
        var l = function(t) {
                var l = $(_.template(o, e));
                n.find(".members_con").remove().end().append(l);
                var c = $(_.template(a, e));
                i.empty().append(c), 
				HYD.DIY.Unit.event_type14(i, e); 
				if(t.indexOf('mp4')>0){
					l.find("video").find('source').attr("src", t);
				} else if(t.indexOf('jpg')>0 || t.indexOf('gif')>0 || t.indexOf('png')>0){
					l.find("video").attr("poster", t);
				}
            },
            c = function(t) {
                var e, n, i, o = /vid\=([^\&]*)($|\&)+/g,
                    a = /sid\/\w*.*?/g;
                return n = t.match(o), i = t.match(a), n && (n = n.toString(), e = "http://v.qq.com/iframe/player.html?" + n + "&tiny=0&auto=0"), i && (i = i.toString(), i = i.split("/v.swf"), i = i.toString(), i = i.replace("sid/", "").replace(",", ""), e = "http://player.youku.com/embed/" + i), null === n && null === i ? (HYD.hint("danger", "请填写正确的视频网址,支持腾讯和优酷"), !1) : e
            };
        i.find(".j-getvideo").blur(function(t) {
            var n = $(this).val();
            e.content.website = n;
			l(n);
        }), 
		i.find(".j-pic").blur(function(t) {
            var n = $(this).val();
            e.content.pic = n;
			l(n);
        }), 
		i.find(".j-slider").slider({
            min: 0,
            max: 50,
            step: 1,
            animate: "fast",
            value: e.content.modulePadding,
            slide: function(t, e) {
                n.find(".modulePadding").css({
                    "padding-top": e.value,
                    "padding-bottom": e.value
                }), i.find(".j-ctrl-showheight").text(e.value + "px")
            },
            stop: function(t, n) {
                e.content.modulePadding = parseInt(n.value)
            }
        })
    }, HYD.DIY.Unit.event_type15 = function(t, e) {
        var n = e.dom_conitem,
            i = t,
            o = $("#tpl_diy_con_type15").html(),
            a = $("#tpl_diy_ctrl_type15").html();
        e.dom_ctrl = t;
        var l = function(t) {
			var l = $(_.template(o, e));
			n.find(".members_con").remove().end().append(l);
			var c = $(_.template(a, e));
			i.empty().append(c), HYD.DIY.Unit.event_type15(i, e)
		},
		c = function(t) {
			var n, i = $("#tpl_popbox_Audio").html(),
			o = $(i),
			a = function(t, e) {
				var i = function(t) {
					if (n = t.list, n && n.length) {
						var i = _.template($("#tpl_popbox_ImgPicker_audio").html(), {
								dataset: n
							}),
							l = $(i);
						l.filter("li").click(function() {
							$(this).addClass("selected").siblings("li").removeClass("selected")
						}), l.find(".audio-name").click(function(t) {
							return !1
						}), l.find(".j-get-edit-name").click(function(t) {
							return $(this).hide().siblings(".j-edit-name").show(), $(this).siblings(".j-edit-name").find("input").focus(), !1
						}), l.find(".j-getAudioName").click(function(t) {
							var e = $(this),
								n = e.siblings('input[name="audioName"]').val(),
								i = e.data("id");
							$.ajax({
								url: "index.php?con=design&act=renameImg",
								type: "POST",
								dataType: "json",
								data: {
									file_id: i,
									file_name: n
								},
								success: function(t) {
									1 == t.status && (HYD.hint("success", "恭喜您，修改音频名称成功！"), e.closest(".j-edit-name").hide().siblings(".j-curname").html(n))
								}
							})
						}), o.find(".imgpicker-list").empty().append(l);
						var c = t.page,
							d = $(c);
						d.filter("a:not(.disabled,.cur)").click(function() {
							var t = $(this).attr("href"),
								e = t.split("/");
							return e = e[e.length - 1], e = e.replace(/.html/, ""), a(e), !1
						}), o.find(".paginate").empty().append(d)
					} else o.find(".imgpicker-list").append("<p class='txtCenter'>对不起，暂无音频</p>");
					e && e()
				};
				$.ajax({
					url: "index.php?con=design&act=media_list",
					type: "post",
					dataType: "json",
					data: {
						p: parseInt(t),
						type: "voice"
					},
					success: function(t) {
						1 == t.status ? i(t) : HYD.hint("danger", "对不起，获取数据失败：" + t.msg)
					}
				})
			},
			c = function(t) {
				var n = [],
					i = [];
				o.find("#imgpicker_upload_input").uploadify({
					debug: !1,
					auto: !0,
					formData: {
						PHPSESSID: $.cookie("PHPSESSID"),
						type: "voice"
					},
					width: 60,
					height: 60,
					multi: !0,
					swf: "http://store.bidcms.com/statics/plugins/uploadify/uploadify.swf",
					uploader: "index.php?con=design&act=uploadFile",
					buttonText: "+",
					fileSizeLimit: "5MB",
					fileTypeExts: "*.mp3; *.wma; *.wav; *.amr",
					onSelectError: function(t, e, n) {
						switch (e) {
							case -100:
								HYD.hint("danger", "对不起，系统只允许您一次最多上传10个文件");
								break;
							case -110:
								HYD.hint("danger", "对不起，文件 [" + t.name + "] 大小超出5MB！");
								break;
							case -120:
								HYD.hint("danger", "文件 [" + t.name + "] 大小异常！");
								break;
							case -130:
								HYD.hint("danger", "文件 [" + t.name + "] 类型不正确！")
						}
					},
					onFallback: function() {
						HYD.hint("danger", "您未安装FLASH控件，无法上传图片！请安装FLASH控件后再试。")
					},
					onUploadSuccess: function(t, e, a) {
						var e = $.parseJSON(e),
							l = $("#tpl_popbox_ImgPicker_audio2").html(),
							c = o.find(".imgpicker-upload-preview"),
							d = e.file_path,
							s = e.file_id;
						n.push(d), i.push(s);
						var r = _.template(l, {
								url: d,
								id: s
							}),
							p = $(r);
						p.find(".j-imgpicker-upload-btndel").click(function() {
							var t = o.find(".imgpicker-upload-preview li").index($(this).parent("li"));
							p.fadeOut(300, function() {
								n.splice(t, 1), $(this).remove()
							})
						}), c.append(p)
					},
					onUploadError: function(t, e, n, i) {
						HYD.hint("danger", "对不起：" + t.name + "上传失败：" + i)
					}
				}), o.find("#j-btn-uploaduse").click(function() {
					0 == n.length ? HYD.hint("danger", "对不起，您没有选择音频：" + e.msg) : (e.content.audiosrc = n[0], l()), $.jBox.close(t)
				})
			};
			a(1, function() {
				$.jBox.show({
					title: "选择音频",
					content: o,
					btnOK: {
						show: !1
					},
					btnCancel: {
						show: !1
					},
					onOpen: function(i) {
						var a = o.find("#j-btn-listuse"),
							l = o.find("#j-btn-listdel");
						a.click(function() {
							var a = [],
								l = [];
							o.find(".imgpicker-list li.selected").each(function() {
								a.push(n[$(this).index()].file_path), l.push(n[$(this).index()].file_id)
							}), 0 == a.length ? HYD.hint("danger", "对不起，您没有选择音频：" + e.msg) : t && t(a), $.jBox.close(i)
						}), l.click(function() {
							var t = o.find(".imgpicker-list li.selected").children(".audio-flag").data("id");
							$.ajax({
								url: "/Design/delImg",
								type: "POST",
								dataType: "json",
								data: {
									file_id: t
								},
								success: function(t) {
									1 == t.status && (HYD.hint("success", "删除成功"), o.find(".imgpicker-list li.selected").remove())
								}
							})
						}), o.find(".j-initupload").one("click", function() {
							c(i)
						})
					}
				})
			})
		};
        i.find(".j-selectimg").click(function() {
            $(this).parents("li.ctrl-item-list-li").index();
            HYD.popbox.ImgPicker(function(t) {
                e.content.imgsrc = t[0], l()
            })
        }),
		i.find(".j-selectbg").click(function() {
            $(this).parents("li.ctrl-item-list-li").index();
            HYD.popbox.ImgPicker(function(t) {
                e.content.bgsrc = t[0], l()
            })
        }), i.find(".j-audioselect").click(function() {
            c(function(t) {
                e.content.audiosrc = t[0], l()
            })
        }),i.find(".j-title").blur(function() {
            e.content.title = $(this).val(), l()
        }),i.find(".j-author").blur(function() {
            e.content.author = $(this).val(), l()
        }), i.find(".j-slider").slider({
            min: 0,
            max: 50,
            step: 1,
            animate: "fast",
            value: e.content.modulePadding,
            slide: function(t, e) {
                n.find(".modulePadding").css({
                    "padding-top": e.value,
                    "padding-bottom": e.value
                }), i.find(".j-ctrl-showheight").text(e.value + "px")
            },
            stop: function(t, n) {
                e.content.modulePadding = parseInt(n.value)
            }
        })
    }, HYD.DIY.Unit.event_type16 = function(t, e) {
        var n = e.dom_conitem,
            i = t,
            o = $("#tpl_diy_con_type16").html(),
            a = $("#tpl_diy_ctrl_type16").html();
        e.dom_ctrl = t;
        var l = function(t) {
            var l = $(_.template(o, e));
            n.find(".members_con").remove().end().append(l);
            var c = $(_.template(a, e));
            i.empty().append(c), HYD.DIY.Unit.event_type16(i, e), t && t()
        };
        i.find("input[name='notice']").change(function() {
            var t = $(this).val();
            n.find(".j-notice").text("公告：" + $(this).val()), e.content.strLength = t.length, e.content.showtitle = t, l()
        }), i.find("input[name='noticeStyle']").change(function() {
            var t = $(this).val();
            e.content.noticeStyle = t, console.log(e.content), l()
        }), i.find(".colpck-bgColor").ColorPicker({
            color: e.content.bgColor,
            onShow: function(t) {
                return $(t).fadeIn(100), !1
            },
            onHide: function(t) {
                return $(t).fadeOut(100), !1
            },
            onChange: function(t, o, a) {
                var o = "#" + o;
                e.content.bgColor = o, i.find(".colpck-bgColor").css("background-color", o), n.find(".members_notice").css("background-color", o)
            }
        }), i.find(".colpck-fontColor").ColorPicker({
            color: e.content.fontColor,
            onShow: function(t) {
                return $(t).fadeIn(100), !1
            },
            onHide: function(t) {
                return $(t).fadeOut(100), !1
            },
            onChange: function(t, o, a) {
                var o = "#" + o;
                e.content.fontColor = o, i.find(".colpck-fontColor").css("background-color", o), n.find(".j-notice").css("color", o)
            }
        }), i.find("input[name='fontSize']").change(function() {
            var t = $(this).val();
            n.find(".notice-con").removeClass("font12 font14 font16").addClass(t), e.content.fontSize = t
        }), i.find(".j-slider").slider({
            min: 0,
            max: 50,
            step: 1,
            animate: "fast",
            value: e.content.modulePadding,
            slide: function(t, e) {
                n.find(".modulePadding").css({
                    "padding-top": e.value,
                    "padding-bottom": e.value
                }), i.find(".j-ctrl-showheight").text(e.value + "px")
            },
            stop: function(t, n) {
                e.content.modulePadding = parseInt(n.value)
            }
        })
    }, HYD.DIY.Unit.event_type17 = function(t, e) {
        var n = e.dom_conitem,
            i = t,
            o = $("#tpl_diy_con_type17").html(),
            a = $("#tpl_diy_ctrl_type17").html();
        e.dom_ctrl = t;
        var l = function(t) {
            var l = $(_.template(o, e));
            n.find(".members_con").remove().end().append(l);
            var c = $(_.template(a, e));
            i.empty().append(c), HYD.DIY.Unit.event_type17(i, e), t && t()
        };
        i.find(".droplist li").click(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index();
            HYD.popbox.dplPickerColletion({
                linkType: $(this).data("val"),
                callback: function(n, i) {
                    e.content.dataset[t].title = n.title, e.content.dataset[t].showtitle = n.title, e.content.dataset[t].link = n.link, e.content.dataset[t].linkType = i, n.pic && "" != n.pic && (e.content.dataset[t].pic = n.pic), l()
                }
            })
        }), i.find("input[name='customlink']").change(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index();
            e.content.dataset[t].link = $(this).val()
        }), i.find("input[name='classify']").change(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index(),
                n = $(this).val();
            e.content.dataset[t].showtitle = n, l()
        }), i.find("select[name='navbgColor']").change(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index(),
                n = $(this).val();
            e.content.dataset[t].bgColor = n, l()
        }), i.find(".ctrl-item-list-li").each(function(t, n) {
            var i = $(this);
            i.find(".colorPicker1").each(function(n, i) {
                var o = $(this);
                if (0 == n) {
                    var a = ($(this).data("name"), $(this).data("color"));
                    o.ColorPicker({
                        color: a,
                        onShow: function(t) {
                            return $(t).fadeIn(100), !1
                        },
                        onHide: function(t) {
                            return $(t).fadeOut(100), l(), !1
                        },
                        onChange: function(n, i, a) {
                            var i = "#" + i;
                            o.css("background-color", i), e.content.dataset[t].bgColor = i
                        }
                    })
                } else {
                    var a = ($(this).data("name"), $(this).data("color"));
                    o.ColorPicker({
                        color: a,
                        onShow: function(t) {
                            return $(t).fadeIn(100), !1
                        },
                        onHide: function(t) {
                            return $(t).fadeOut(100), l(), !1
                        },
                        onChange: function(n, i, a) {
                            var i = "#" + i;
                            o.css("background-color", i), e.content.dataset[t].fotColor = i
                        }
                    })
                }
            })
        }), i.find("input[name='layout']").change(function() {
            var t = $(this).val();
            n.find(".members_classify").attr("class", "members_classify layoutstyle" + t), e.content.layout = t
        }), i.find(".j-moveup").click(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index();
            if (0 != t) {
                var n = e.content.dataset.slice(t, t + 1)[0];
                e.content.dataset.splice(t, 1), e.content.dataset.splice(t - 1, 0, n), l()
            }
        }), i.find(".j-movedown").click(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index(),
                n = e.content.dataset.length;
            if (t != n - 1) {
                var i = e.content.dataset.slice(t, t + 1)[0];
                e.content.dataset.splice(t, 1), e.content.dataset.splice(t + 1, 0, i), l()
            }
        }), i.find(".ctrl-item-list-add").click(function() {
            var t = {
                link: "#",
                linkType: 0,
                showtitle: "内容",
                bgColor: "#28c192",
                cloPicker: "2",
                fotColor: "#fff"
            };
            e.content.dataset.push(t), l()
        }), i.find(".j-del").click(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index();
            e.content.dataset.splice(t, 1), l()
        }), i.find(".j-slider").slider({
            min: 0,
            max: 50,
            step: 1,
            animate: "fast",
            value: e.content.modulePadding,
            slide: function(t, e) {
                n.find(".modulePadding").css({
                    "padding-top": e.value,
                    "padding-bottom": e.value
                }), i.find(".j-ctrl-showheight").text(e.value + "px")
            },
            stop: function(t, n) {
                e.content.modulePadding = parseInt(n.value)
            }
        })
    }, HYD.DIY.Unit.event_type18 = function(t, e) {
        var n = e.dom_conitem,
            i = t;
        i.find(".J-edit-signtemp").click(function() {
            var t = n.find(".fulltext").html();
            $.composeBox({
                content: t,
                callback: function(t, i) {
                    "" != t && "" != i || (t = "<p>『富文本编辑器』</p>"), n.find(".fulltext").html(t), e.content.fulltext = HYD.DIY.Unit.html_encode(t)
                }
            })
        }), i.find(".j-slider").slider({
            min: 0,
            max: 50,
            step: 1,
            animate: "fast",
            value: e.content.modulePadding,
            slide: function(t, e) {
                n.find(".modulePadding").css({
                    "padding-top": e.value,
                    "padding-bottom": e.value
                }), i.find(".j-ctrl-showheight").text(e.value + "px")
            },
            stop: function(t, n) {
                e.content.modulePadding = parseInt(n.value)
            }
        })
    },HYD.DIY.Unit.event_type19 = function(i, t) {
		var e = t.dom_conitem,
			o = i,
			l = $("#tpl_diy_con_type19").html(),
			n = $("#tpl_diy_ctrl_type19").html();
		t.dom_ctrl = i;
		var s = function() {
			var i = $(_.template(l, t));
			e.find(".members_con").remove().end().append(i);
			var s = $(_.template(n, t));
			o.empty().append(s), HYD.DIY.Unit.event_type19(o, t)
		};
		o.find("input[name='tabtitle']").change(function() {
			var i = $(this).parents("li.ctrl-item-list-li").index();
			t.content.goodslist[i].tabtitle = $(this).val(), s()
		}), o.find(".j-delgoods").click(function() {
			var i = $(this).parent().parent().index(),
				e = $(this).parents(".ctrl-item-list-li").index();
			t.content.goodslist[e].goods.splice(i, 1);
			s();
			return false;
		}), o.find(".j-addgoods").click(function() {
			var i = $(this).parents("li"),
				e = i.index(),
				o = i.find("input[name=goods_ids]").val().split(",");
			return $.selectGoods({
				selectMod: 2,
				selectIds: o,
				callback: function(i, o) {
					t.content.goodslist[e].goods = t.content.goodslist[e].goods.concat(i), s()
				}
			}), !1
		}), o.find(".img-list>li .img-move-left").on("click", function() {
			var i = $(this),
				e = i.closest("li").index(),
				o = $(this).parents("li.ctrl-item-list-li").index(),
				l = i.closest("li");
			if (0 != e) {
				e--, i.closest("ul").find("li").eq(e).before(l);
				var n = t.content.goodslist[o].goods.slice(e + 1, e + 2)[0];
				t.content.goodslist[o].goods.splice(e + 1, 1), t.content.goodslist[o].goods.splice(e, 0, n), s()
			}
			return !1
		}), o.find(".img-list>li .img-move-right").on("click", function() {
			var i = $(this),
				e = i.closest("ul").find("li").length - 1,
				o = i.closest("li").index(),
				l = $(this).parents("li.ctrl-item-list-li").index(),
				n = i.closest("li");
			if (o != e - 1) {
				o++, i.closest("ul").find("li").eq(o).after(n);
				var c = t.content.goodslist[l].goods.slice(o, o + 1)[0];
				t.content.goodslist[l].goods.splice(o, 1), t.content.goodslist[l].goods.splice(o - 1, 0, c), s()
			}
			return !1
		}), o.find(".ctrl-item-list-add").click(function() {
			var i = {
				tabtitle: "自定义",
				goods: []
			};
			t.content.goodslist.push(i), s()
		}), o.find(".j-del").click(function() {
			var i = $(this).parents("li.ctrl-item-list-li").index();
			t.content.goodslist.splice(i, 1), s()
		}), o.find(".j-moveup").click(function() {
			var i = $(this).parents("li.ctrl-item-list-li").index();
			if (0 != i) {
				var e = t.content.goodslist.slice(i, i + 1)[0];
				t.content.goodslist.splice(i, 1), t.content.goodslist.splice(i - 1, 0, e), s()
			}
		}), o.find(".j-movedown").click(function() {
			var i = $(this).parents("li.ctrl-item-list-li").index(),
				e = t.content.goodslist.length;
			if (i != e - 1) {
				var o = t.content.goodslist.slice(i, i + 1)[0];
				t.content.goodslist.splice(i, 1), t.content.goodslist.splice(i + 1, 0, o), s()
			}
		}), o.find(".j-slider").slider({
			min: 0,
			max: 50,
			step: 1,
			animate: "fast",
			value: t.content.modulePadding,
			slide: function(i, t) {
				e.find(".modulePadding").css({
					"padding-top": t.value,
					"padding-bottom": t.value
				}), o.find(".j-ctrl-showheight").text(t.value + "px")
			},
			stop: function(i, e) {
				t.content.modulePadding = parseInt(e.value)
			}
		})
	}, HYD.DIY.Unit.event_type20 = function(t, e) {
        var n = e.dom_conitem,
            i = t,
            o = $("#tpl_diy_con_type20").html(),
            a = $("#tpl_diy_ctrl_type20").html();
        e.dom_ctrl = t;
        var l = function() {
			var l = $(_.template(o, e));
			n.find(".members_con").remove().end().append(l);
			var c = $(_.template(a, e));
			i.empty().append(c), HYD.DIY.Unit.event_type20(i, e)
		};
        i.find("input[name='goods_status']").change(function() {
            var t = $(this).val();
            e.content.act_status = t, l()
        }), i.find("input[name='goods_status_price']").change(function() {
            var t = $(this).val();
            e.content.act_status_price = t, l()
        }),i.find("input[name='goods_start_time']").change(function() {
            var t = $(this).val();
            e.content.act_start_time = t, l()
        }), i.find("input[name='goods_end_time']").change(function() {
            var t = $(this).val();
            e.content.act_end_time = t, l()
        }), i.find(".j-addgoods").click(function() {
            var t = i.find("input[name=goods_id]").val();
            return $.selectGoods({
                selectMod: 1,
                selectIds: t,
                callback: function(t, n) {
                    e.content.goodslist.splice(0, e.content.goodslist.length), e.content.goodslist = e.content.goodslist.concat(t), l()
                }
            }), !1
        }), i.find(".j-delgoods").click(function() {
            var t = $(this).parents("li").index();
            return e.content.goodslist.splice(t, 1), l(), !1
        }), 
		i.find(".j-slider").slider({
            min: 0,
            max: 50,
            step: 1,
            animate: "fast",
            value: e.content.modulePadding,
            slide: function(t, e) {
                n.find(".modulePadding").css({
                    "padding-top": e.value,
                    "padding-bottom": e.value
                }), i.find(".j-ctrl-showheight").text(e.value + "px")
            },
            stop: function(t, n) {
                e.content.modulePadding = parseInt(n.value)
            }
        })
    }, HYD.DIY.Unit.event_type22 = function(t, e) {
		var n = e.dom_conitem,
			i = t,
			o = $("#tpl_diy_con_type22").html(),
			a = $("#tpl_diy_ctrl_type22").html();
		n.parent();
		e.dom_ctrl = t;
		var c = function(t) {
			var l = $(_.template(o, e));
			n.find(".members_con").remove().end().append(l);
			var r = $(_.template(a, e));
			i.empty().append(r), HYD.DIY.Unit.event_type22(i, e), t && t()
		};
		i.find(".j-data").change(function() {
			var id=$(this).data("field");
			e.content[id] = $(this).val(), c()
		}), i.find(".j-selectimg").click(function() {
			HYD.popbox.ImgPicker(function(n) {
				e.content.imgsrc = n[0], c()
			})
		}),i.find(".j-slider").slider({
            min: 0,
            max: 50,
            step: 1,
            animate: "fast",
            value: e.content.modulePadding,
            slide: function(t, e) {
                n.find(".modulePadding").css({
                    "padding-top": e.value,
                    "padding-bottom": e.value
                }), i.find(".j-ctrl-showheight").text(e.value + "px")
            },
            stop: function(t, n) {
                e.content.modulePadding = parseInt(n.value)
            }
        })
	}, HYD.DIY.Unit.event_type23 = function(t, e) {
        var n = e.dom_conitem,
            i = t,
            o = $("#tpl_diy_con_type23").html(),
            a = $("#tpl_diy_ctrl_type23").html();
        e.dom_ctrl = t;
        var l = function(t) {
            var l = $(_.template(o, e));
            n.find(".members_con").remove().end().append(l);
            var c = $(_.template(a, e));
            i.empty().append(c), HYD.DIY.Unit.event_type23(i, e), t && t()
        };
        i.find("input[name='layout'],input[name='layout1_style'],input[name='hasImgMargin']").change(function() {
            var t = $(this).attr("name");
            e.content[t] = $(this).val(), l()
        }), i.find(".j-data").change(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index();
			var id=$(this).data('field');
            e.content.dataset[t][id] = $(this).val(), l()
        }),i.find(".coupon_select").change(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index();
			e.content.dataset[t].pic =$(this).find("option:selected").data('pic');
			e.content.dataset[t].coupon_name =$(this).find("option:selected").data('title');
			e.content.dataset[t].coupon_desc =$(this).find("option:selected").data('desc');
            e.content.dataset[t].couponid = $(this).val(), l()
        }),i.find(".droplist li").click(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index();
            HYD.popbox.dplPickerColletion({
                linkType: $(this).data("val"),
                callback: function(n, i) {
                    e.content.dataset[t].title = n.title, e.content.dataset[t].showtitle = n.title, e.content.dataset[t].link = n.link, e.content.dataset[t].linkType = i, n.pic && "" != n.pic && (n.is_compress ? e.content.dataset[t].pic = n.pic + "480x480" : e.content.dataset[t].pic = n.pic), l()
                }
            })
        }), i.find(".j-selectimg").click(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index();
            HYD.popbox.ImgPicker(function(n) {
                e.content.dataset[t].pic = n[0], l()
            })
        }),i.find(".j-moveup").click(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index();
            if (0 != t) {
                var n = e.content.dataset.slice(t, t + 1)[0];
                e.content.dataset.splice(t, 1), e.content.dataset.splice(t - 1, 0, n), l()
            }
        }), i.find(".j-movedown").click(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index(),
                n = e.content.dataset.length;
            if (t != n - 1) {
                var i = e.content.dataset.slice(t, t + 1)[0];
                e.content.dataset.splice(t, 1), e.content.dataset.splice(t + 1, 0, i), l()
            }
        }), i.find(".ctrl-item-list-add").click(function() {
            var t = {
                couponid: "0",
                coupon_name: "优惠券名称",
                coupon_desc: "优惠券说明",
                pic: "//shop.bidcms.com/store/data/widget/23/icon_try.png"
            };
            e.content.dataset.push(t), l()
        }), i.find(".j-del").click(function() {
            var t = $(this).parents("li.ctrl-item-list-li").index();
            e.content.dataset.splice(t, 1), l()
        }),i.find(".j-slider").slider({
            min: 0,
            max: 50,
            step: 1,
            animate: "fast",
            value: e.content.modulePadding,
            slide: function(t, e) {
                n.find(".modulePadding").css({
                    "padding-top": e.value,
                    "padding-bottom": e.value
                }), i.find(".j-ctrl-showheight").text(e.value + "px")
            },
            stop: function(t, n) {
                e.content.modulePadding = parseInt(n.value)
            }
        })
    }, HYD.DIY.Unit.event_type25 = function(t, e) {
		e.dom_conitem, $("#tpl_diy_con_type25").html(), $("#tpl_diy_ctrl_type25").html();
		e.dom_ctrl = t
	}, HYD.DIY.Unit.event_type26 = function(t, e) {
		e.dom_conitem;
		e.dom_ctrl = t
	}
}), 
$(function() {
    HYD.DIY.Unit.verifyWhiteList = ["1", "6", "10", "11", "12", "13", "14", "15", "16", "17", "Header_style1", "Header_style2", "Header_style3", "Header_style4", "Header_style5", "Header_style6", "Header_style7", "Header_style8", "Header_style9", "Header_style10", "Header_style11", "Header_style12", "Header_style13", "Header_style14", "Header_style15", "Header_style16", "Header_style17", "Header_style18", "Header_style19", "Header_style20", "Header_style21", "Header_style7_news", "Header_style9_news", "Header_style12_ad", "Header_style12_nav", "Header_style15_news", "UserCenter", "Navigation", "MgzCate", "GoodsGroup"], HYD.DIY.Unit.verify_type2 = function(t) {
        var e = !1,
            n = !0,
            i = function() {
                e || (t.dom_conitem.find(".diy-conitem-action").click(), e = !0, n = !1)
            };
        if ("" == t.content.title) {
            i();
            var o = t.dom_ctrl.find("input[name='title']");
            HYD.FormShowError(o, "请填写标题")
        }
        if ("" == t.content.subtitle) {
            i();
            var o = t.dom_ctrl.find("input[name='subtitle']");
            HYD.FormShowError(o, "请填写副标题")
        }
        return n
    }, HYD.DIY.Unit.verify_type3 = function(t) {
        var e = !1,
            n = !0,
            i = function() {
                e || (t.dom_conitem.find(".diy-conitem-action").click(), e = !0, n = !1)
            };
        if (!t.content) {
            i();
            var o = t.dom_ctrl.find(".j-verify");
            HYD.FormShowError(o, "请选择一个自定义模块")
        }
        return n
    }, HYD.DIY.Unit.verify_type4 = function(t) {
        var e = !1,
            n = !0,
            i = function() {
                e || (t.dom_conitem.find(".diy-conitem-action").click(), e = !0, n = !1)
            };
        if (!t.content.goodslist.length) {
            i();
            var o = t.dom_ctrl.find(".j-verify");
            HYD.FormShowError(o, "请至少选择一件商品")
        }
        return n
    }, HYD.DIY.Unit.verify_type5 = function(t) {
        var e = !1,
            n = !0,
            i = function() {
                e || (t.dom_conitem.find(".diy-conitem-action").click(), e = !0, n = !1)
            };
        if (!t.content.group) {
            i();
            var o = t.dom_ctrl.find(".j-verify");
            HYD.FormShowError(o, "请选择商品分组")
        }
        return n
    }, HYD.DIY.Unit.verify_type7 = function(t) {
        var e = !1,
            n = !0,
            i = function() {
                e || (t.dom_conitem.find(".diy-conitem-action").click(), e = !0, n = !1)
            };
        t.content.dataset.length || (i(), t.dom_ctrl.find(".j-verify-least").addClass("error").text("请至少添加一个导航链接"));
        for (var o = 0; o < t.content.dataset.length; o++) {
            var a = t.content.dataset[o];
            if ("" == a.showtitle) {
                i();
                var l = t.dom_ctrl.find(".ctrl-item-list-li:eq(" + o + ") input[name='title']");
                HYD.FormShowError(l, "请输入导航名称")
            }
            0 == a.linkType && (i(), t.dom_ctrl.find(".ctrl-item-list-li:eq(" + o + ") .j-verify-linkType").addClass("error").text("请选择要链接的地址"))
        }
        return n
    }, HYD.DIY.Unit.verify_type8 = function(t) {
        var e = !1,
            n = !0,
            i = function() {
                e || (t.dom_conitem.find(".diy-conitem-action").click(), e = !0, n = !1)
            };
        t.content.dataset.length || (i(), t.dom_ctrl.find(".j-verify-least").addClass("error").text("请至少添加一个图片导航"));
        for (var o = 0; o < t.content.dataset.length; o++) {
            var a = t.content.dataset[o];
            0 == a.linkType && (i(), t.dom_ctrl.find(".ctrl-item-list-li:eq(" + o + ") .j-verify-linkType").addClass("error").text("请选择要链接的地址")), "" == a.pic && (i(), t.dom_ctrl.find(".ctrl-item-list-li:eq(" + o + ") .j-verify-pic").addClass("error").text("请选择一张图片"))
        }
        return n
    }, HYD.DIY.Unit.verify_type9 = function(t) {
        var e = !1,
            n = !0,
            i = function() {
                e || (t.dom_conitem.find(".diy-conitem-action").click(), e = !0, n = !1)
            };
        t.content.dataset.length || (i(), t.dom_ctrl.find(".j-verify-least").addClass("error").text("请至少添加一个图片广告"));
        for (var o = 0; o < t.content.dataset.length; o++) {
            var a = t.content.dataset[o];
            0 == a.linkType && (i(), t.dom_ctrl.find(".ctrl-item-list-li:eq(" + o + ") .j-verify-linkType").addClass("error").text("请选择要链接的地址")), "" == a.pic && (i(), t.dom_ctrl.find(".ctrl-item-list-li:eq(" + o + ") .j-verify-pic").addClass("error").text("请选择一张图片"))
        }
        return n
    }, HYD.DIY.Unit.verify = function() {
        var t = HYD.DIY.Unit.verifyWhiteList,
            e = !0,
            n = HYD.DIY.LModules.length,
            i = HYD.DIY.PModules.length;
        if (n)
            for (var o = 0; o < n; o++) {
                var a = HYD.DIY.LModules[o];
                if (t.indexOf(a.type.toString()) < 0 && !HYD.DIY.Unit["verify_type" + a.type](a)) {
                    e = !1;
                    break
                }
            }
        if (i)
            for (var o = 0; o < i; o++) {
                var a = HYD.DIY.PModules[o];
                if (t.indexOf(a.type.toString()) < 0 && !HYD.DIY.Unit["verify_type" + a.type](a)) {
                    e = !1;
                    break
                }
            }
        return e
    }
}), 
$(function() {
    $(".j-diy-addModule").click(function() {
        var t = $(this).data("type"),
            e = {
                id: HYD.DIY.getTimestamp(),
                type: t,
                draggable: !0,
                sort: 0,
                content: null
            };
        switch (t) {
            case 1:
                e.ue = null, e.content = {
                    fulltext: "&lt;p&gt;『富文本编辑器』&lt;/p&gt;",
                    modulePadding: 5
                };
                break;
            case 2:
                e.content = {
                    title: "标题名称",
                    style: 0,
                    direction: "left",
                    BackgroundColor: "#fd5b6b",
                    titleColor: "#fff",
                    modulePadding: 5
                };
                break;
            case 3:
                e.content ={
					modulePadding: 0,
					layout: 1,
					showPrice: !0,
					showIco: !0,
					showName: 1,
					priceTips:'',
					goodslist: [{
						item_id: "1",
						link: "#",
						pic: "//shop.bidcms.com/store/data/widget/3/01.jpg",
						price: "88.00",
						original_price: "128.00",
						title: "新款春季韩版时尚长袖连衣裙印花两..."
					}, {
						item_id: "2",
						link: "#",
						pic: "//shop.bidcms.com/store/data/widget/3/02.jpg",
						price: "88.00",
						original_price: "300.00",
						title: "新款春季韩版时尚长袖连衣裙印花两..."
					}, {
						item_id: "3",
						link: "#",
						pic: "//shop.bidcms.com/store/data/widget/3/03.jpg",
						price: "88.00",
						original_price: "128.00",
						title: "新款春季韩版时尚长袖连衣裙印花两..."
					}],
					titleLine: 0,
					version: 1,
					modulePadding: 5,
					priceBold: 1
				}
                break;
            case 4:
                e.content = {
                    layout: 1,
                    showPrice: !0,
                    showIco: !0,
                    showName: 1,
                    goodslist: [],
                    sale_num: 5,
                    goodstyle: 1,
                    layoutstyles: 1,
                    goodstxt: "立即购买",
                    titleLine: 0,
                    version: 1,
                    modulePadding: 5,
                    priceBold: 1
                };
                break;
            case 6:
                e.content = {
                    modulePadding: 5
                };
                break;
            case 7:
                e.content = {
                    modulePadding: 5,
                    dataset: [{
                        linkType: 0,
                        link: "",
                        title: "",
                        showtitle: ""
                    }]
                };
                break;
            case 8:
                e.content = {
                    layout: 1,
                    layout1_style: 1,
                    modulePadding: 5,
					imageScale: 100,
                    dataset: [{
                        linkType: 0,
                        link: "#",
                        showtitle: "导航名称",
                        titleBackgroundColor: "#FE9303",
                        titleColor: "#fff",
                        pic: "//shop.bidcms.com/store/statics/images/diy/waitupload.png"
                    }, {
                        linkType: 0,
                        link: "#",
                        showtitle: "导航名称",
                        titleBackgroundColor: "#FE9303",
                        titleColor: "#fff",
                        pic: "//shop.bidcms.com/store/statics/images/diy/waitupload.png"
                    }, {
                        linkType: 0,
                        link: "#",
                        showtitle: "导航名称",
                        titleBackgroundColor: "#FE9303",
                        titleColor: "#fff",
                        pic: "//shop.bidcms.com/store/statics/images/diy/waitupload.png"
                    }, {
                        linkType: 0,
                        link: "#",
                        showtitle: "导航名称",
                        titleBackgroundColor: "#FE9303",
                        titleColor: "#fff",
                        pic: "//shop.bidcms.com/store/statics/images/diy/waitupload.png"
                    }]
                };
                break;
            case 9:
                e.content = {
                    showType: 1,
                    showPos:0,
                    space: 0,
                    margin: 5,
                    modulePadding: 5,
                    dataset: []
                };
                break;
            case 10:
                break;
            case 11:
                e.content = {
                    height: 10
                };
                break;
            case 12:
                e.content = {
                    style: 0,
                    marginstyle: 0,
                    modulePadding: 5,
                    dataset: [{
                        link: "",
                        linkType: 6,
                        showtitle: "首页",
                        title: "店铺主页",
                        pic: "//shop.bidcms.com/store/statics/images/ind3_1.png",
                        bgColor: "#07a0e7",
                        cloPicker: "0",
                        fotColor: "#fff"
                    }, {
                        link: "?act=goods",
                        linkType: 6,
                        showtitle: "新品",
                        title: "",
                        pic: "//shop.bidcms.com/store/statics/images/ind3_2.png",
                        bgColor: "#72c201",
                        cloPicker: "1",
                        fotColor: "#fff"
                    }, {
                        link: "?act=goods",
                        linkType: 6,
                        showtitle: "热卖",
                        title: "店铺主页",
                        pic: "//shop.bidcms.com/store/statics/images/ind3_3.png",
                        bgColor: "#ffa800",
                        cloPicker: "2",
                        fotColor: "#fff"
                    }, {
                        link: "?act=goods",
                        linkType: 6,
                        showtitle: "推荐",
                        title: "",
                        pic: "//shop.bidcms.com/store/statics/images/ind3_4.png",
                        bgColor: "#d50303",
                        cloPicker: "3",
                        fotColor: "#fff"
                    }]
                };
                break;
            case 13:
                e.content = {
                    layout: 0,
                    version: 2,
                    modulePadding: 5,
                    dataset: [{
                        linkType: 0,
                        link: "#",
                        showTitle: 1,
                        title: "橱窗文字",
                        pic: "//shop.bidcms.com/store/statics/images/diy/waitupload2.png"
                    }, {
                        linkType: 0,
                        link: "#",
                        showTitle: 1,
                        title: "橱窗文字",
                        pic: "//shop.bidcms.com/store/statics/images/diy/waitupload2.png"
                    }, {
                        linkType: 0,
                        link: "#",
                        showTitle: 1,
                        title: "橱窗文字",
                        pic: "//shop.bidcms.com/store/statics/images/diy/waitupload2.png"
                    }]
                };
                break;
            case 14:
                e.content = {
                    website: "",
                    modulePadding: 5
                };
                break;
            case 15:
                e.content = {
                    direct: 0,
                    imgsrc: "",
                    audiosrc: "",
                    modulePadding: 5
                };
                break;
            case 16:
                e.content = {
                    linkType: 0,
                    title: "公告",
                    showtitle: "请填写内容，如果过长，将会滚动显示",
                    bgColor: "#ffffcc",
                    noticeStyle: "1",
                    cloPicker: "2",
                    fontSize: "font12",
                    fontColor: "#ffb432",
                    modulePadding: 5
                };
                break;
            case 17:
                e.content = {
                    layout: 0,
                    modulePadding: 5,
                    dataset: [{
                        linkType: 0,
                        link: "#",
                        showtitle: "内容1",
                        bgColor: "#28c192",
                        cloPicker: "2",
                        fotColor: "#fff"
                    }, {
                        linkType: 0,
                        link: "#",
                        showtitle: "内容2",
                        bgColor: "#28c192",
                        cloPicker: "2",
                        fotColor: "#fff"
                    }, {
                        linkType: 0,
                        link: "#",
                        showtitle: "内容3",
                        bgColor: "#28c192",
                        cloPicker: "2",
                        fotColor: "#fff"
                    }, {
                        linkType: 0,
                        link: "#",
                        showtitle: "内容4",
                        bgColor: "#28c192",
                        cloPicker: "2",
                        fotColor: "#fff"
                    }, {
                        linkType: 0,
                        link: "#",
                        showtitle: "内容5",
                        bgColor: "#28c192",
                        cloPicker: "2",
                        fotColor: "#fff"
                    }, {
                        linkType: 0,
                        link: "#",
                        showtitle: "内容6",
                        bgColor: "#28c192",
                        cloPicker: "2",
                        fotColor: "#fff"
                    }]
                };
                break;
            case 18:
                e.content = {
                    fulltext: "&lt;p&gt;『微排版编辑器』&lt;/p&gt;",
                    modulePadding: 5
                };
                break;
            case 19:
                e.content= {
					layout: 1,
					showPrice: !0,
					showIco: !0,
					showName: 1,
					titleLine: 0,
					version: 1,
					modulePadding: 0,
					goodslist: [{
						tabtitle: "剃须刀",
						goods: [{
							item_id: "1",
							link: "#",
							pic: "//shop.bidcms.com/store/data/widget/19/img1.jpg",
							price: "100.00",
							sale_num: "100",
							original_price: "200.00",
							title: "飞利浦（PHILIPS）电动剃须刀S512 男士电动刮胡刀全身水洗AF可"
						}, {
							item_id: "2",
							link: "#",
							pic: "//shop.bidcms.com/store/data/widget/19/img2.jpg",
							price: "100.00",
							sale_num: "100",
							original_price: "200.00",
							title: "飞利浦（PHILIPS）电动剃须刀S512 男士电动刮胡刀全身水洗AF可"
						}, {
							item_id: "3",
							link: "#",
							pic: "//shop.bidcms.com/store/data/widget/19/img3.jpg",
							price: "100.00",
							sale_num: "100",
							original_price: "200.00",
							title: "飞利浦（PHILIPS）电动剃须刀S512 男士电动刮胡刀全身水洗AF可"
						}, {
							item_id: "4",
							link: "#",
							pic: "//shop.bidcms.com/store/data/widget/19/img4.jpg",
							price: "100.00",
							sale_num: "100",
							original_price: "200.00",
							title: "飞利浦（PHILIPS）电动剃须刀S512 男士电动刮胡刀全身水洗AF可"
						}]
					}, {
						tabtitle: "电吹风",
						goods: []
					}, {
						tabtitle: "理发器",
						goods: []
					}, {
						tabtitle: "电动牙刷",
						goods: []
					}]
				};
                break;
            case 20:
                e.content = {
                    goodslist: [{
                        item_id: "4",
                        link: "#",
                        pic: "//shop.bidcms.com/store/statics/images/diy/goodsView4.jpg",
                        price: "400.00",
                        original_price: "500.00",
                        title: "第四个商品"
                    }],
                    act_status: "还有机会",
                    act_status_price: "疯抢价",
                    modulePadding: 5
                }
				break;
			case 22:
				e.content = {
					layout: 1,
					layout1_style: 1,
					modulePadding: 5,
					hasImgMargin: 1,
					imgsrc: 'http://store.bidcms.com/statics/images/mapMark.png',
					storeName: '欢迎光临Bidcms演示店',
					storeInfo: "点击右侧按钮咨询店主，电话：13700000000"};
				break;
			case 23:
				e.content = {
					dataset: [{
						couponid: "0",
						pic: "//shop.bidcms.com/store/data/widget/23/icon_try.png",
						coupon_name: "30元全场通用优惠券",
						coupon_desc: "手快有，手慢无限量100张"
					}],
					modulePadding: 5
				};
				e.coupon_list=[];
				$.ajax({
					url:"http://shop.bidcms.com/plugins/discount/api.php?con=api&act=list",
					data:'{"shopid":13}',
					type:'POST',
					async: false,
					dataType:'json',
					success:function(data){
						if(data.errcode==0){
							e.coupon_list=data.data;
						}
					}
				});
				break;
			case 25:
				e.content = {
					dataset: [{
						link: "/Shop/index",
						pic: "//shop.bidcms.com/store/data/widget/25/51access_store01.png",
						stores_name: "杭州市爱琴海西餐厅",
						goods: "爱琴海炭烧咖啡",
						iphone: "18812345678",
						phone: "0760-88780011",
						adress: "杭州市文三路17号"
					}, {
						link: "/Shop/index",
						pic: "//shop.bidcms.com/store/data/widget/25/51access_store02.png",
						stores_name: "杭州市西窗咖啡馆",
						goods: "色拉套餐",
						iphone: "18812345678",
						phone: "0760-88782102",
						adress: "杭州市文三路与丰潭路交叉口"
					}, {
						link: "/Shop/index",
						pic: "//shop.bidcms.com/store/data/widget/25/51access_store03.png",
						stores_name: "彼岸花开时尚花店",
						goods: "西城广场二楼",
						iphone: "18812345678",
						phone: "0760-88780113",
						adress: "杭州市文三路西城广场二楼"
					}],
					modulePadding: 5
				};
				break;
			case 26:
				e.content = {
					modulePadding: 0
				};
				break;
        }
        HYD.DIY.add(e, !0)
    }), $("#diy-phone .drag").sortable({
        revert: !0,
        placeholder: "drag-highlight",
        stop: function(t, e) {
            HYD.DIY.repositionCtrl(e.item, $(".diy-ctrl-item[data-origin='item']"))
        }
    }).disableSelection(), $(".j-pagetitle").click(function() {
        $(".diy-ctrl-item[data-origin='pagetitle']").show().siblings(".diy-ctrl-item[data-origin='item']").hide()
    }), $(".j-pagetitle-ipt").change(function() {
        $(".j-pagetitle").text($(this).val())
    }), $(".diy-actions").width($(".content-right").width() - 20)
});
