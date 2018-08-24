$(function(){
    //加载数据
    var dataCountObj = $("#tBodyGetTotalCcount");
    $.post("index.php?con=statistics&act=get_order_count", {}, function(data){
        if(data.status == 1){
            dataCountObj.html(data.content);
        }else{
            dataCountObj.find("td").html(data.msg);
        }
    }, "json");

    //往期统计
    var dataLastCountObj = $("#tBodyGetLastCount");
    $.post("index.php?con=statistics&act=get_history_order_count", {}, function(data){
        if(data.status == 1){
            dataLastCountObj.html(data.content);
        }else{
            dataLastCountObj.find("td").html(data.msg);
        }
    }, "json");

    //默认数据
    var defaults = {
        chartIndex:"",
        timeType:"day",
        start_time:"",
        end_time:""
    }

    //判断选择时间的类型
    function selectTimeType(element,timeType){
        if(timeType == "day") element.text("近30天");
        if(timeType == "week") element.text("近15周");
        if(timeType == "month") element.text("近15月");
        if(timeType == "quarter") element.text("近10季");
        if(timeType == "year") element.text("近5年");
    }

    //销售记录
    function getDatas(options){
        var opts=$.extend(true,{},defaults,options);//合并参数
		$.ajax({
            url: "index.php?con=statistics&act=get_order_chart&v="+Math.round(Math.random()*100),
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
                    if(opts.chartIndex == 3){
                        //近6个月订单笔数
                        selectTimeType($(".ddzs_txt"),opts.timeType);
                        $('#ddzs_n').text(tmpdata.total_num);
                        $('#ddpzs_n').text(tmpdata.total_pay_num);
                        $('#chart_ddzs').text("").highcharts({
                            chart:{
                                backgroundColor:"#eee",
                                events:{
                                    load:function(){
                                        $("#loading_chart_ddzs").hide();
                                        $("#chart_ddzs").show();
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
                                },
                                labels : {  
                                    formatter : function() { 
                                        return this.value + '笔';  
                                    }  
                                }
                            },
                            series: [
                                {
                                    name:"订单笔数",
                                    type:"line",
                                    color:"#ff9e00",
                                    data: tmpdata.order_num,
                                },
                                {
                                    name:"付款订单笔数",
                                    type:"line",
                                    color:"#DB1217",
                                    data: tmpdata.pay_order_num,
                                }
                            ]
                        });
                        
                    }

                    if(opts.chartIndex == 4){
                        //近6个月订单金额数
                        selectTimeType($(".ddjr_txt"),opts.timeType);
                        $('#ddjr_n').text(tmpdata.total_money);
                        $('#ddpjr_n').text(tmpdata.total_pay_money);
                        $('#chart_ddjr').text("").highcharts({
                            chart:{
                                backgroundColor:"#eee",
                                events:{
                                    load:function(){
                                        $("#loading_chart_ddjr").hide();
                                        $("#chart_ddjr").show();
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
                                },
                                labels : {  
                                    formatter : function() { 
                                        return this.value + '元';  
                                    }  
                                }
                            },
                            series: [
                                {
                                    name:"订单金额数",
                                    type:"line",
                                    color:"#ff9e00",
                                    data: tmpdata.payment_num,
                                },
                                {
                                    name:"付款订单金额数",
                                    type:"line",
                                    color:"#DB1217",
                                    data: tmpdata.pay_payment_num,
                                }
                            ]
                        });
                    }
                    
                }
                else{
                    // if(opts.chartIndex == 2){
                    //     $("#loading_chart_ddzs").hide();
                    //     $("#chart_ddzs").css("height","auto").text("暂无数据").show();
                    // }
                    // else if(opts.chartIndex == 3){
                    //     $("#loading_chart_ddjr").hide();
                    //     $("#chart_ddjr").css("height","auto").text("暂无数据").show();
                    // }
                    
                    HYD.hint("danger", data.msg);
                }
            }
        });
        
    }

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
            end_time = $this.parents(".t-list").siblings().find("#end_time").val(),
            op_index = $this.parents(".chartWrap").index();    

        getDatas({
            start_time:start_time,
            end_time:end_time,
            chartIndex:op_index
        });
    })
});