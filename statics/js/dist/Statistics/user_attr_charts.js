$(function () {
    var tpl_con = $("#tpl_user_table_lists").html(),
        max_num = 1000,
        tpl_city=$("#tpl_user_table_city").html();//基数
	$.get('/statics/plugins/echarts/map/json/china.json', function (chinaJson) {
		echarts.registerMap('china', chinaJson);

		//基于准备好的dom，初始化echarts实例
		var myChart = echarts.init(document.getElementById('userMain'));

        function randomData() {
		    return Math.round(Math.random()*1000);
		}
        $.post("index.php?con=statistics&act=user_attr_ajax_chart",{},function(data){
            if(data.status == 1){
                var region = data.data.region;
                var convertData = function (data) {
                    var res = [];
                    for (var i = 0; i < data.name.length; i++) {
                        res.push({
                            name: data.name[i],
                            value: data.value[i]
                        });
                    }
                    return res;
                };

                option = {
                    title: {
                        text: '流量地域分布',
                        x: 'center',
                        textStyle: {
                            color: '#fff'
                        }
                    },
                    tooltip: {
                        trigger: 'item',
                        formatter: function (params) {
                            return params.name + ' : ' + params.value;
                        }
                    },
                    legend: {
                        orient: 'vertical',
                        y: 'bottom',
                        x: 'right',
                        textStyle: {
                            color: '#fff'
                        }
                    },
                    geo: {
                        map: 'china',
                        label: {
                            emphasis: {
                                show: false
                            }
                        },
                        itemStyle: {
                            normal: {
                                areaColor: '#323c48',
                                borderColor: '#111'
                            },
                            emphasis: {
                                areaColor: '#2a333d'
                            }
                        }
                    },
                    series: [
                        {
                            name: 'iphone3',
                            type: 'map',
                            mapType: 'china',
                            roam: false,
                            label: {
                                normal: {
                                    show: true
                                },
                                emphasis: {
                                    show: true
                                }
                            },
                            data:convertData(region)
                        }
                    ]
                };
                // 使用刚指定的配置项和数据显示图表。
                myChart.setOption(option);

                var data_list = convertData(region);

                $.each(data_list,function(index,val){
                    val.rate = parseFloat((val.value / max_num) *100).toFixed(2);
                })

                var html = _.template(tpl_con, {dataset:data_list}),
                    $render = $(html);

                $(".user_table .tbody ul").empty().append($render);

                

                $(".pro_name").click(function(){
                    var $self=$(this);
                    $(".pro_name_tips").remove();
                    // console.log($self.text());
                    var city=$self.text();
                    $.ajax({
                        url:"index.php?con=statistics&act=province_city_user",
                        type:"post",
                        dataType:"json",
                        data:{
                            "province_name":city
                        },
                        success: function(res) {
                                    if (res.status == 1) {
                                        // /HYD.hint("success", res.msg);
                                        // location.reload();

                                        var data = res.data; 
                                        var html_city=_.template(tpl_city,{dataset:data}),
                                        $render=$(html_city);
                                        // console.log(tpl_city)
                                        console.log($self);
                                        $($self).parent().after($render);
                                        $(".user_table .tbody .pro_name_tips").show();
                                        // HYD.hint("success", "获取成功");
                                    } else {
                                        HYD.hint("danger", "获取失败");
                                    }
                    }
                    });
                });
                // console.log($(".close_list"));
                $(document).on("click",".close_list",function(){
                    // console.log("123123");
                    $(".user_table .tbody .pro_name_tips").hide();
                    data="";
                    $(".pro_name_tips").remove();
                });
            }

        },'json');


	},'json');

	$.post("index.php?con=statistics&act=user_attr_ajax_chart", { }, function(data){
        if(data.status == 1){
            var sex = data.data.sex;

            //男女比例
            $('#chart_xbfb').text("").highcharts({
                chart: {
                    events:{
                        load:function(){
                            $("#loading_chart_xbfb").hide();
                            $("#chart_xbfb").show();
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
                        ['未知',   sex[0]],
                        ['男', sex[1]],
                        {
                            name: '女',
                            y: sex[2],
                            sliced: true,
                            selected: true
                        },
                    ]
                }]
            });
        }
    }, "json");

});