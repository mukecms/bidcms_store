$(function(){
    !function(){
        $(".cb-contain").each(function(){
            var e=$(this).width();
			$(this).find(".j-chartPanel").width(e)
        });
		var e=$("#tBodyGetTotalCcount");
		$.post("index.php?con=api&act=getDataCount",
        {},function(t){
            1==t.status?e.html(t.content): e.find("td").html(t.msg)
        },"json"),
        $("div.cb-contain,#getTongJi").each(function(){
            var e=$(this),
            t=e.data("type");
			t && $.post(t,{},function(t){
                e.html(t.msg)
            },"json")
        })
    }(),
    $.ajax({
        url: "index.php?con=api&act=mmpv&v="+Math.round(100*Math.random()),
        type: "post",
        dataType: "json",
        success: function(e){
            if(1==e.status){
                var t=e.mmpvList;$("#chart_mmpv").text("").highcharts({
                    chart: {
                        backgroundColor: "#eee",
                        events: {
                            load: function(){
                                $("#loading_chart_mmpv").hide(),
                                $("#chart_mmpv").show()
                            }
                        }
                    },
                    credits: {
                        enabled: !1
                    },
                    title: {
                        text: null
                    },
                    subtitle: {
                        text: null
                    },
                    xAxis: {
                        categories: t.minute
                    },
                    yAxis: {
                        title: {
                            text: null
                        }
                    },
                    series: [
                        {
                            name: "pv数",
                            type: "line",
                            color: "#ff9e00",
                            data: t.series_today
                        }
                    ]
                })
            }else {
				$("#loading_chart_mmpv").hide(),
				$("#chart_mmpv").css("height","auto").text("暂无数据").show()
			}
        }
    }),
    $.ajax({
        url: "index.php?con=api&act=orderTotal&v="+Math.round(100*Math.random()),
        type: "post",
        dataType: "json",
        success: function(e){
            if(1==e.status){
                var t=e.orderList;$("#ddzs_t").text(t.series_today[6]),
                $("#ddzs_y").text(t.series_today[5]),
                $("#chart_ddzs").text("").highcharts({
                    chart: {
                        backgroundColor: "#eee",
                        events: {
                            load: function(){
                                $("#loading_chart_ddzs").hide(),
                                $("#chart_ddzs").show()
                            }
                        }
                    },
                    credits: {
                        enabled: !1
                    },
                    title: {
                        text: null
                    },
                    subtitle: {
                        text: null
                    },
                    xAxis: {
                        categories: t.day
                    },
                    yAxis: {
                        title: {
                            text: null
                        },
                        min: 0
                    },
                    series: [
                        {
                            name: "订单笔数",
                            type: "line",
                            color: "#ff9e00",
                            data: t.series_today
                        }
                    ]
                })
            }else {
				$("#loading_chart_ddzs").hide(),
				$("#chart_ddzs").css("height","auto").text("暂无数据").show()
			}
        }
    }),
    $.ajax({
        url: "index.php?con=api&act=orderFxTotal&v="+Math.round(100*Math.random()),
        type: "post",
        dataType: "json",
        success: function(e){
            if(1==e.status){
                var t=e.orderList;$("#fxddzs_t").text(t.series_today[6]),
                $("#fxddzs_y").text(t.series_today[5]),
                $("#chart_fxddzs").text("").highcharts({
                    chart: {
                        backgroundColor: "#eee",
                        events: {
                            load: function(){
                                $("#loading_chart_fxddzs").hide(),
                                $("#chart_fxddzs").show()
                            }
                        }
                    },
                    credits: {
                        enabled: !1
                    },
                    title: {
                        text: null
                    },
                    subtitle: {
                        text: null
                    },
                    xAxis: {
                        categories: t.day
                    },
                    yAxis: {
                        title: {
                            text: null
                        },
                        min: 0
                    },
                    series: [
                        {
                            name: "分销订单笔数",
                            type: "line",
                            color: "#ff9e00",
                            data: t.series_today
                        }
                    ]
                })
            }else {
				$("#loading_chart_fxddzs").hide(),
				$("#chart_fxddzs").css("height","auto").text("暂无数据").show()
			}
        }
    }),
    $.ajax({
        url: "index.php?con=api&act=orderPriceTotal&v="+Math.round(100*Math.random()),
        type: "post",
        dataType: "json",
        success: function(e){
            if(1==e.status){
                var t=e.orderList;$("#chart_ddje").text("").highcharts({
                    chart: {
                        type: "column",
                        backgroundColor: "#eee",
                        events: {
                            load: function(){
                                $("#loading_chart_ddje").hide(),
                                $("#chart_ddje").show()
                            }
                        }
                    },
                    credits: {
                        enabled: !1
                    },
                    title: {
                        text: null
                    },
                    xAxis: {
                        categories: t.day
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: null
                        },
                        stackLabels: {
                            enabled: !0,
                            style: {
                                fontWeight: "bold",
                                color: Highcharts.theme&&Highcharts.theme.textColor||"gray"
                            }
                        }
                    },
                    tooltip: {
                        formatter: function(){
                            return"<b>"+this.x+"</b><br/>"+this.series.name+": "+this.y+"<br/>"
                        }
                    },
                    plotOptions: {
                        column: {
                            pointPadding: .1,
                            borderWidth: 0
                        }
                    },
                    series: [
                        {
                            name: "当天全部订单金额",
                            data: t.t
                        },
                        {
                            name: "当天分销订单金额",
                            color: "#ff9e00",
                            data: t.f
                        }
                    ]
                })
            }else {
				$("#loading_chart_ddje").hide(),
				$("#chart_ddje").css("height", "auto").text("暂无数据").show()
			}
        }
    }),
    $.ajax({
        url: "index.php?con=api&act=orderPie&v="+Math.round(100*Math.random()),
        type: "post",
        dataType: "json",
        success: function(e){
            if(1==e.status){
                var t=e.orderList;$("#chart_ddtjpei").text("").highcharts({
                    chart: {
                        backgroundColor: "#eee",
                        events: {
                            load: function(){
                                $("#loading_chart_ddtjpei").hide(),
                                $("#chart_ddtjpei").show()
                            }
                        }
                    },
                    colors: [
                        "#7cb5ec",
                        "rgba(255,183,25,1)"
                    ],
                    title: {
                        text: null
                    },
                    credits: {
                        enabled: !1
                    },
                    tooltip: {
                        pointFormat: "{series.name}: <b>{point.percentage:.1f}%</b>"
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: !0,
                            cursor: "pointer",
                            dataLabels: {
                                enabled: !1
                            },
                            showInLegend: !0
                        }
                    },
                    series: [
                        {
                            type: "pie",
                            name: "占",
                            data: [
                                [
                                    "全部订单金额",
                                    t.total_fee
                                ],
                                [
                                    "分销订单金额",
                                    t.Ftotal_fee
                                ]
                            ]
                        }
                    ]
                })
            }else{
				$("#loading_chart_ddtjpei").hide(),
				$("#chart_ddtjpei").css("height","auto").text("暂无数据").show()
			}
        }
    }),
    $(".pay_btn").click(function(){
        var e=parseFloat($('input[name="renew_price"]').val()),
        t=$('input[name="renew_info"]').val();returnconsole.log(e),
        ""==e||isNaN(e)?(HYD.hint("danger",
        "付款金额不能为空"),
        !1): ""==t?(HYD.hint("danger",
        "付款说明不能为空"),
        !1): void$.ajax({
            url: "index.php?con=api&act=PayRenew&v="+Math.round(100*Math.random()),
            type: "post",
            dataType: "json",
            beforeSend: function(){
                $.jBox.showloading()
            },
            data: {
                renew_price: e,
                renew_info: t
            },
            success: function(e){
                1==e.status?window.location.href=e.url: HYD.hint("danger",
                e.msg),
                $.jBox.hideloading()
            }
        })
    }),
    function(){
        var e=$(".fxsitem").find(".fxsinfo").slice(0,
        16),
        t=$(".fxsitem").find(".fxsinfo").slice(16,
        32),
        a=$(".fxsitem").find(".fxsinfo").slice(32,
        48),
        s=$(".fxsitem").find(".fxsinfo").slice(48,
        64),
        i='<divclass="allWrapper"><divclass="fxswrapper exta-wraper0 clearfix"></div><divclass="fxswrapper exta-wraper1 clearfix"></div><divclass="fxswrapper exta-wraper2 clearfix"></div><divclass="fxswrapper exta-wraper3 clearfix"></div></div>';$(".fxsmain").children(".fxsitem").append(i),
        $(".exta-wraper0").append(e),
        $(".exta-wraper1").append(t),
        $(".exta-wraper2").append(a),
        $(".exta-wraper3").append(s);
		var n=function(e){
            var t=$(".fxspageicon").children("span.cur").index(),
            a=500,
            e=e;e=3!=t?e?e: t+1: 0,
            $(".allWrapper").animate({
                top: "-260px"
            },
            a,
            function(){
                var t=$(this).children(".fxswrapper").eq(0);$(".allWrapper").css("top",
                "0").append(t),
                $(".fxspageicon").children("span").eq(e).addClass("cur").siblings("span").removeClass("cur")
            })
        },
        o=setInterval(function(){
            n()
        },
        3e3);$(".fxsitem").hover(function(){
            clearInterval(o),
            o=null
        },
        function(){
            o=setInterval(function(){
                n()
            },
            3e3)
        }),
        $(".fxsinfo").live({
            mouseover: function(){
                $(this).children(".fxscode,.fxscode2").show()
            },
            mouseleave: function(){
                $(this).children(".fxscode,.fxscode2").hide()
            }
        })
    }(),
    function(){
        $(".J_renew_btn").click(function(){
            $("#renew_box").show(),
            $(".renew_overlay").show()
        }),
        $(".J_close_box").click(function(){
            $("#renew_box").hide(),
            $(".renew_overlay").hide()
        });var e=$(".time_tip b").text(),
        t=(30-e)/30*100+"%";$(".J_scroll_bar b").css({
            width: t
        });var a=$(".J_scroll_bar b").width(),
        s=$(".J_scroll_bar").width();t<="62%"?$(".time_step2").css({
            marginLeft: a
        }): $(".time_step2").css({
            marginLeft: .62*s
        })
    }()
});