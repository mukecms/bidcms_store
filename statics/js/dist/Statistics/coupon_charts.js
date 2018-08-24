$(function(){

    var dataCountObj = $("#tBodyGetCouponCount");
    $.post("index.php?con=statistics&act=coupon_data_count", { }, function(data){
        if(data.status == 1){
            dataCountObj.html(data.content);
        }else{
            dataCountObj.find("td").html(data.msg);
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

    //优惠券
    var getDatas = function(options){
        var opts=$.extend(true,{},defaults,options);//合并参数

        $.ajax({
            url: "index.php?con=statistics&act=coupon_ajax_chart&v="+Math.round(Math.random()*100),
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

                    if(opts.chartIndex == 2){
                        $('#ffyhj_n').text(tmpdata.total_get_coupon);
                        selectTimeType($("#time_text_1"),opts.timeType);

                        $('#chart_ffyhj').text("").highcharts({
                            chart:{
                                backgroundColor:"#eee",
                                events:{
                                    load:function(){
                                        $("#loading_chart_ffyhj").hide();
                                        $("#chart_ffyhj").show();
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
                                    name:"发放的优惠券",
                                    type:"line",
                                    color:"#ff9e00",
                                    data: tmpdata.total_coupon
                                }
                            ]
                        });
                    }

                    else if(opts.chartIndex == 3){
                        $('#syyhj_n').text(tmpdata.total_use_coupon);
                        selectTimeType($("#time_text_2"),opts.timeType);

                        $('#chart_syyhj').text("").highcharts({
                            chart:{
                                backgroundColor:"#eee",
                                events:{
                                    load:function(){
                                        $("#loading_chart_syyhj").hide();
                                        $("#chart_syyhj").show();
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
                                    name:"使用的优惠券",
                                    type:"line",
                                    color:"#3c9dff",
                                    data: tmpdata.use_coupon
                                }
                            ]
                        });

                    }
                    

                }
                else{
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