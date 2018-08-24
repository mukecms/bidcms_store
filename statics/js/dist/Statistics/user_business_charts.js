$(function(){
    var dataCommissionObj = $("#tBodyGetUserCommission");
    $.post("index.php?con=statistics&act=user_data_commission", { }, function(data){
        if(data.status == 1){
            dataCommissionObj.html(data.content);
        }else{
            dataCommissionObj.find("td").html(data.msg);
        }
    }, "json");

    var dataAgentOrderObj = $("#tBodyGetAgentOrder");
    $.post("index.php?con=statistics&act=agent_data_order", { }, function(data){
        if(data.status == 1){
            dataAgentOrderObj.html(data.content);
        }else{
            dataAgentOrderObj.find("td").html(data.msg);
        }
    }, "json");

    var dataLastUserCommissionObj = $("#tBodyGetLastUserCommission");
    $.post("index.php?con=statistics&act=last_user_data_commission", { }, function(data){
        if(data.status == 1){
            dataLastUserCommissionObj.html(data.content);
        }else{
            dataLastUserCommissionObj.find("td").html(data.msg);
        }
    }, "json");

    var dataLastAgentDataOrderObj = $("#tBodyGetLastAgentDataOrder");
    $.post("index.php?con=statistics&act=last_agent_data_order", { }, function(data){
        if(data.status == 1){
            dataLastAgentDataOrderObj.html(data.content);
        }else{
            dataLastAgentDataOrderObj.find("td").html(data.msg);
        }
    }, "json");


    //饼图加载
    $.post("index.php?con=statistics&act=user_pie_data", { }, function(data){
        if(data.status == 1){
            var tmpdata=data.data;

            $('#chart_buynum').text("").highcharts({
                chart: {
                    backgroundColor:"#eee",
                    events:{
                        load:function(){
                            $("#loading_chart_buynum").hide();
                            $("#chart_buynum").show();
                        }
                    }
                },
                title: {
                    text: null
                },
                credits: {
                    enabled: false
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            color: '#000000',
                            connectorColor: '#000000',
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                        }
                    }
                },
                series: [{
                    type: 'pie',
                    name: '比例',
                    data: [
                        {
                            name: '购物会员数量',
                            y: tmpdata.buy_per,
                            sliced: true,
                            selected: true
                        },
                        ['非购物会员数量',    tmpdata.buy_per_other],
                    ]
                }]
            });
            
            $('#chart_cfgw').text("").highcharts({
                chart: {
                    backgroundColor:"#eee",
                    events:{
                        load:function(){
                            $("#loading_chart_cfgw").hide();
                            $("#chart_cfgw").show();
                        }
                    }
                },
                title: {
                    text: null
                },
                credits: {
                    enabled: false
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            color: '#000000',
                            connectorColor: '#000000',
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                        }
                    }
                },
                series: [{
                    type: 'pie',
                    name: '比例',
                    data: [
                        {
                            name: '重复购物会员数量',
                            y: tmpdata.buys_per,
                            sliced: true,
                            selected: true
                        },
                        ['非重复购物会员数量',    tmpdata.buys_per_other],
                    ]
                }]
            });

        }else{
            dataCountObj.find("td").html(data.msg);
            $("#loading_chart_thh").hide();
            $("#chart_thh").css("height","auto").text("暂无数据").show();
        }
    }, "json");


    //加载排行榜
    var user_most_buy_num_top = $("#user_most_buy_num_top");
    $.post("index.php?con=statistics&act=user_most_buy_num_top", { }, function(data){
        if(data.status == 1){
            user_most_buy_num_top.html(data.content);
        }else{
            user_most_buy_num_top.find("td").html(data.msg);
        }
    }, "json");

    var user_most_buy_price_top = $("#user_most_buy_price_top");
    $.post("index.php?con=statistics&act=user_most_buy_price_top", { }, function(data){
        if(data.status == 1){
            user_most_buy_price_top.html(data.content);
        }else{
            user_most_buy_price_top.find("td").html(data.msg);
        }
    }, "json");

    var user_most_point_top = $("#user_most_point_top");
    $.post("index.php?con=statistics&act=user_most_point_top", { }, function(data){
        if(data.status == 1){
            user_most_point_top.html(data.content);
        }else{
            user_most_point_top.find("td").html(data.msg);
        }
    }, "json");

    var user_balance_top = $("#user_balance_top");
    $.post("index.php?con=statistics&act=user_balance_top", { }, function(data){
        if(data.status == 1){
            user_balance_top.html(data.content);
        }else{
            user_balance_top.find("td").html(data.msg);
        }
    }, "json");

    var user_agent_commission_top = $("#user_agent_commission_top");
    $.post("index.php?con=statistics&act=user_agent_commission_top", { }, function(data){
        if(data.status == 1){
            user_agent_commission_top.html(data.content);
        }else{
            user_agent_commission_top.find("td").html(data.msg);
        }
    }, "json");

    var user_left_commission_top = $("#user_left_commission_top");
    $.post("index.php?con=statistics&act=user_left_commission_top", { }, function(data){
        if(data.status == 1){
            user_left_commission_top.html(data.content);
        }else{
            user_left_commission_top.find("td").html(data.msg);
        }
    }, "json");

    var user_tx_price_top = $("#user_tx_price_top");
    $.post("index.php?con=statistics&act=user_tx_price_top", { }, function(data){
        if(data.status == 1){
            user_tx_price_top.html(data.content);
        }else{
            user_tx_price_top.find("td").html(data.msg);
        }
    }, "json");

    var user_consume_top = $("#user_consume_top");
    $.post("index.php?con=statistics&act=user_consume_top", { }, function(data){
        if(data.status == 1){
            user_consume_top.html(data.content);
        }else{
            user_consume_top.find("td").html(data.msg);
        }
    }, "json");

    //默认数据
    var defaults = {
        chartIndex:"",
        timeType:"day",
        start_time:"",
        end_time:""
    }

    //近6个月新增会员数量
    var getDatas = function(options){
        var opts=$.extend(true,{},defaults,options);//合并参数

        $.ajax({
            url: "index.php?con=statistics&act=user_business_ajax_chart&v="+Math.round(Math.random()*100),
            type: 'post',
            dataType: 'json',
            data:{
                timeType:opts.timeType,
                start_time:opts.start_time,
                end_time:opts.end_time
            },
            success:function(data){
                if(data.status==1){
                    var tmpdata=data.orderList;

                    if(opts.chartIndex == 6){
                        $('#hysl_n').text(tmpdata.total_user_num);
                        $('#chart_gwhy').text("").highcharts({
                            chart:{
                                backgroundColor:"#eee",
                                events:{
                                    load:function(){
                                        $("#loading_chart_gwhy").hide();
                                        $("#chart_gwhy").show();
                                    }
                                }
                            },
                            credits: {
                                enabled: false
                            },
                            title: {
                                text: null
                            },
                            subtitle: {
                                text: null
                            },
                            xAxis: {
                                categories:tmpdata.date,
                                labels: {
                                    rotation: -90
                                } 
                            },
                            yAxis: {
                                title: {
                                    text: null
                                }
                            },
                            series: [
                                {
                                    name:"购物会员数量",
                                    type:"line",
                                    color:"#ff9e00",
                                    data: tmpdata.have_order_num
                                }
                            ]
                        });

                    }

                    else if(opts.chartIndex == 7){
                        $('#chart_fxyw').text("").highcharts({
                            chart:{
                                backgroundColor:"#eee",
                                events:{
                                    load:function(){
                                        $("#loading_chart_fxyw").hide();
                                        $("#chart_fxyw").show();
                                    }
                                }
                            },
                            credits: {
                                enabled: false
                            },
                            title: {
                                text: null
                            },
                            subtitle: {
                                text: null
                            },
                            xAxis: {
                                categories:tmpdata.date,
                                labels: {
                                    rotation: -90
                                } 
                            },
                            yAxis: {
                                title: {
                                    text: null
                                }
                            },
                            series: [
                                {
                                    name:"分销商业务数量",
                                    type:"line",
                                    color:"#48D63E",
                                    data: tmpdata.have_order_agent
                                }
                                ,
                                {
                                    name:"分销商提现数量",
                                    type:"line",
                                    color:"#ff9e00",
                                    data: tmpdata.have_tx_agent
                                }
                            ]
                        });

                    }

                    else if(opts.chartIndex == 8){
                        $('#chart_fxtx').text("").highcharts({
                            chart:{
                                backgroundColor:"#eee",
                                events:{
                                    load:function(){
                                        $("#loading_chart_fxtx").hide();
                                        $("#chart_fxtx").show();
                                    }
                                }
                            },
                            credits: {
                                enabled: false
                            },
                            title: {
                                text: null
                            },
                            subtitle: {
                                text: null
                            },
                            xAxis: {
                                categories:tmpdata.date,
                                labels: {
                                    rotation: -90
                                } 
                            },
                            yAxis: {
                                title: {
                                    text: null
                                }
                            },
                            series: [
                                {
                                    name:"分销商业务佣金",
                                    type:"line",
                                    color:"#48D63E",
                                    data: tmpdata.have_commission_agent
                                }
                                ,
                                {
                                    name:"分销商提现佣金",
                                    type:"line",
                                    color:"#ff9e00",
                                    data: tmpdata.have_tx_commission_agent
                                }
                            ]
                        });

                    }

                    else if(opts.chartIndex == 9){
                        $('#chart_dlsyw').text("").highcharts({
                            chart:{
                                backgroundColor:"#eee",
                                events:{
                                    load:function(){
                                        $("#loading_chart_dlsyw").hide();
                                        $("#chart_dlsyw").show();
                                    }
                                }
                            },
                            credits: {
                                enabled: false
                            },
                            title: {
                                text: null
                            },
                            subtitle: {
                                text: null
                            },
                            xAxis: {
                                categories:tmpdata.date,
                                labels: {
                                    rotation: -90
                                } 
                            },
                            yAxis: {
                                title: {
                                    text: null
                                }
                            },
                            series: [
                                {
                                    name:"代理商业务人数",
                                    type:"line",
                                    color:"#48D63E",
                                    data: tmpdata.have_order_dls
                                }
                                ,
                                {
                                    name:"代理商提现人数",
                                    type:"line",
                                    color:"#ff9e00",
                                    data: tmpdata.have_tx_dls
                                }
                            ]
                        });

                    }

                    else if(opts.chartIndex == 10){
                        $('#chart_dlstx').text("").highcharts({
                            chart:{
                                backgroundColor:"#eee",
                                events:{
                                    load:function(){
                                        $("#loading_chart_dlstx").hide();
                                        $("#chart_dlstx").show();
                                    }
                                }
                            },
                            credits: {
                                enabled: false
                            },
                            title: {
                                text: null
                            },
                            subtitle: {
                                text: null
                            },
                            xAxis: {
                                categories:tmpdata.date,
                                labels: {
                                    rotation: -90
                                } 
                            },
                            yAxis: {
                                title: {
                                    text: null
                                }
                            },
                            series: [
                                {
                                    name:"代理商业务佣金",
                                    type:"line",
                                    color:"#48D63E",
                                    data: tmpdata.have_commission_dls
                                }
                                ,
                                {
                                    name:"代理商提现佣金",
                                    type:"line",
                                    color:"#ff9e00",
                                    data: tmpdata.have_tx_commission_dls
                                }
                            ]
                        });

                    }
                               
                }

                
                else{
                    $("#loading_chart_fxtx").hide();
                    $("#chart_fxtx").css("height","auto").text("暂无数据").show();
                }
            }
        });       
    }

    //首次加载
    $(".chartWrap").each(function(){
        var index = $(this).index();
        getDatas({chartIndex:index});
    });

    //选择时间类型
    $('.chartselect li').click(function(){
        var $this= $(this);
        var timeType = $this.data('val'),
            op_index = $this.parents(".chartWrap").index();
        $this.addClass('active').siblings().removeClass("active");       

        getDatas({
            timeType:timeType,
            chartIndex:op_index
        });
    });

    //筛选日期
    $('.j-serch').click(function(){
        var $this= $(this),
            op_index = $this.parents(".chartWrap").index(),
            start_time = $this.parents(".t-list").siblings().find("#start_time").val(),
            end_time = $this.parents(".t-list").siblings().find("#end_time").val();   

        getDatas({
            start_time:start_time,
            end_time:end_time,
            chartIndex:op_index
        });
    })

});