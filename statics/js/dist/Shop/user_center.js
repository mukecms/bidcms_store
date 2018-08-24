$(function() {
    var e = {
            page: {
                title: "会员主页"
            },
            PModules: [{
                id: 1,
                type: "UserCenter_style2",
                draggable: !1,
                sort: 0,
				content: {
					showLevel: !0,
					showID: !0,
					showPoint: !0,
					showCoupon: !0,
					showRecharge: !0,
					showWithdraw: !0,
					showMyOrder: !0,
					showBeEvaluated: !0,
					showCollection: !0,
					showModify: !0,
					showAddress: !0,
					showPrivilege: !0,
					showInteraction: !0,
					showMyFriend: !0,
					show_fxSubject: !0,
					show_fxProduct: !0,
					show_myAgent: !0,
					show_myUser: !0,
					show_fxOrder: !0,
					show_myCommission: !0,
					show_monthRank: !0,
					show_myStore: !0,
					show_qrcode: !0,
					show_highLevel: !0,
					show_dl_agencies: !0,
					show_dl_agency_user: !0,
					show_dl_agency_order: !0,
					show_dl_commission: !0,
				}

            }],
            LModules: []
    };
    var t = $("#j-initdata").val();
    t = t.length ? $.parseJSON(t) : e,t.bidcmsData=bidcmsData, $(".j-pagetitle").text(t.page.title), $(".j-pagetitle-ipt").val(t.page.title);
    var o = t.PModules[0].type,
    i = $("#tpl_diy_con_type" + o).html(),
    s = $("#tpl_diy_ctrl_type" + o).html(),
    a = $("#tpl_popup_user_center_chagneTpl").html(),
    r = function(e, t) {
        var n = t.dom_conitem,
            o = e,
            a = function() {
                var e = $(_.template(i, t));
                n.find(".membersbox").remove().end().append(e);
                var a = $(_.template(s, t));
                o.empty().append(a), HYD.DIY.Unit.event_typeUserCenter_style1(o, t)
            };
        o.find("input[type=checkbox]").change(function() {
            var e = $(this).attr("name"),
                n = $(this).is(":checked");
            t.content[e] = n, a()
        }), o.find(".j-title-selectimg").click(function() {
            HYD.popbox.ImgPicker(function(e) {
                t.content.pic = e[0], a()
            })
        }), window.event_typeUserCenter_reRender = a
    };
    HYD.DIY.Unit.event_typeUserCenter_style1 = r,
    HYD.DIY.Unit.event_typeUserCenter_style2 = r,
    $("#j-changeTpl").click(function() {
        $.jBox.show({
            title: "更换模板",
            content: _.template(a, {
                tplName: o
            }),
            width: 650,
            height: 430,
            onOpen: function(e) {
                e.find("a").click(function() {
                    $(this).addClass("cur").siblings("a").removeClass("cur")
                })
            },
            btnOK: {
                onBtnClick: function(e) {
                    o = e.find("a.cur").data("tplname"), i = $("#tpl_diy_con_type" + o).html(), s = $("#tpl_diy_ctrl_type" + o).html(), t.PModules[0].type = o, event_typeUserCenter_reRender && event_typeUserCenter_reRender(), $.jBox.close(e)
                }
            }
        })
    }), _.each(t.PModules, function(e, t) {
        var n = 0 == t;
        HYD.DIY.add(e, n)
    }), _.each(t.LModules, function(e) {
        HYD.DIY.add(e, !0)
    }), $("#j-savePage").click(function() {
        return $.ajax({
            url: '?con=shop&act=setting&type=userpage',
            type: "post",
            dataType: "json",
            data: {
                content: JSON.stringify(HYD.DIY.Unit.getData()),
                is_preview: 0,
                commit:1
            },
            beforeSend: function() {
                $.jBox.showloading()
            },
            success: function(e) {
                1 == e.status ? HYD.hint("success", "恭喜您，保存成功！") : HYD.hint("danger", "对不起，保存失败：" + e.msg), $.jBox.hideloading()
            }
        }), !1
    })
});
