$(function(){
    var dataCountObj = $("#tBodyGetUserCount");
    $.post("index.php?con=statistics&act=user_data_count", { }, function(data){
        if(data.status == 1){
            dataCountObj.html(data.content);
        }else{
            dataCountObj.find("td").html(data.msg);
        }
    }, "json");

    var dataLastUserCountObj = $("#tBodyGetLastUserCount");
    $.post("index.php?con=statistics&act=last_user_data_count", { }, function(data){
        if(data.status == 1){
            dataLastUserCountObj.html(data.content);
        }else{
            dataLastUserCountObj.find("td").html(data.msg);
        }
    }, "json");

    //饼图加载
    $.post("index.php?con=statistics&act=user_pie_data", { }, function(data){
        if(data.status == 1){
            var tmpdata=data.data;
            //加粉比例饼图
            $('#chart_fshy').text("").highcharts({
                chart: {
                    backgroundColor:"#eee",
                    events:{
                        load:function(){
                            $("#loading_chart_fshy").hide();
                            $("#chart_fshy").show();
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
                            name: '粉丝会员数量',
                            y: tmpdata.fans_per,
                            sliced: true,
                            selected: true
                        },
                        ['非粉丝会员数量',    tmpdata.fans_per_other],
                    ]
                }]
            });

            $('#chart_agentnum').text("").highcharts({
                chart: {
                    backgroundColor:"#eee",
                    events:{
                        load:function(){
                            $("#loading_chart_agentnum").hide();
                            $("#chart_agentnum").show();
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
                            name: '分销商数量',
                            y: tmpdata.agent_per,
                            sliced: true,
                            selected: true
                        },
                        ['非分销商数量',    tmpdata.agent_per_other],
                    ]
                }]
            });
            
            $('#chart_dlsnum').text("").highcharts({
                chart: {
                    backgroundColor:"#eee",
                    events:{
                        load:function(){
                            $("#loading_chart_dlsnum").hide();
                            $("#chart_dlsnum").show();
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
                            name: '代理商数量',
                            y: tmpdata.dls_per,
                            sliced: true,
                            selected: true
                        },
                        ['非代理商数量',    tmpdata.dls_per_other],
                    ]
                }]
            });

            $('#chart_dcgw').text("").highcharts({
                chart: {
                    backgroundColor:"#eee",
                    events:{
                        load:function(){
                            $("#loading_chart_dcgw").hide();
                            $("#chart_dcgw").show();
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
                            name: '多次购物会员数量',
                            y: tmpdata.buyss_per,
                            sliced: true,
                            selected: true
                        },
                        ['非多次购物会员数量',    tmpdata.buyss_per_other],
                    ]
                }]
            });

        }else{
            dataCountObj.find("td").html(data.msg);
            $("#loading_chart_thh").hide();
            $("#chart_thh").css("height","auto").text("暂无数据").show();
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
            url: "index.php?con=statistics&act=user_ajax_chart&v="+Math.round(Math.random()*100),
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

                    $('#hysl_n').text(tmpdata.total_user_num);
                    $('#fxsl_n').text(tmpdata.total_agent_num);
                    $('#chart_xzhy').text("").highcharts({
                        chart:{
                            backgroundColor:"#eee",
                            events:{
                                load:function(){
                                    $("#loading_chart_xzhy").hide();
                                    $("#chart_xzhy").show();
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
                                name:"新增会员数量",
                                type:"line",
                                color:"#ff9e00",
                                data: tmpdata.new_user
                            },
                            {
                                name:"新增粉丝数量",
                                type:"line",
                                color:"#93FA4B",
                                data: tmpdata.new_pub
                            },
                            {
                                name:"新增分销商数量",
                                type:"line",
                                color:"#3c9dff",
                                data: tmpdata.new_agent
                            }
                        ]
                    });
 
                }
                
                else{
                    $("#loading_chart_fxtx").hide();
                    $("#chart_fxtx").css("height","auto").text("暂无数据").show();
                }
            }
        });       
    }

    //首次加载
    //首次加载数据
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
            start_time = $this.parents(".t-list").siblings().find("#start_time").val(),
            end_time = $this.parents(".t-list").siblings().find("#end_time").val();   

        getDatas({
            start_time:start_time,
            end_time:end_time
        });
    })

});