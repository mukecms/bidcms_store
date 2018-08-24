function initialize() {
	function e(e) {
		var a;
		AMap.service(["AMap.PlaceSearch"], function() {
			a = new AMap.PlaceSearch({
				pageSize: 10,
				pageIndex: 1
			}), a.search(e, function(e, a) {
				"complete" === e && "OK" === a.info && n(a)
			})
		})
	}
	function a(e, a) {
		var n = a.location.getLng(),
			o = a.location.getLat(),
			p = {
				map: t,
				icon: "http://webapi.amap.com/images/" + (e + 1) + ".png",
				position: new AMap.LngLat(n, o),
				topWhenMouseOver: !0
			},
			r = new AMap.Marker(p);
		l.push(new AMap.LngLat(n, o));
		var c = new AMap.InfoWindow({
			content: '<h3><font color="#00a6ac">  ' + (e + 1) + ". " + a.name + "</font></h3>" + i(a.type, a.address, a.tel),
			size: new AMap.Size(300, 0),
			autoMove: !0,
			offset: new AMap.Pixel(0, (-20))
		});
		d.push(c);
		var s = function(e) {
				c.open(t, r.getPosition())
			};
		AMap.event.addListener(r, "mouseover", s)
	}
	function n(e) {
		for (var n = "", o = e.poiList.pois, p = o.length, r = 0; r < p; r++) n += "<div id='divid" + (r + 1) + "' onmouseover='openMarkerTipById1(" + r + ",this)' onmouseout='onmouseout_MarkerStyle(" + (r + 1) + ',this)\' style="font-size: 12px;cursor:pointer;padding:0px 0 4px 2px; border-bottom:1px solid #C1FFC1;"><table><tr><td><img src="http://webapi.amap.com/images/' + (r + 1) + '.png"></td><td><h3><font color="#00a6ac">名称: ' + o[r].name + "</font></h3>", n += i(o[r].type, o[r].address, o[r].tel) + "</td></tr></table></div>", a(r, o[r]);
		t.setFitView()
	}
	function i(e, a, n) {
		"" != e && "undefined" != e && null != e && " undefined" != e && "undefined" != typeof e || (e = "暂无"), "" != a && "undefined" != a && null != a && " undefined" != a && "undefined" != typeof a || (a = "暂无"), "" != n && "undefined" != n && null != n && " undefined" != n && "tel" != typeof a || (n = "暂无");
		var i = "  地址：" + a + "<br />  电话：" + n + " <br />  类型：" + e;
		return i
	}
	 //逆地理编码
    function regeocoder(lnglat) { 
        var lnglatXY = lnglat;
        var geocoder = new AMap.Geocoder({
            radius: 1000,
            extensions: "all"
        });        
        geocoder.getAddress(lnglatXY, function(status, result) {
            if (status === 'complete' && result.info === 'OK') {
                geocoder_CallBack(result);
            }
        }); 
    }
    //逆地理编码回调方法
    function geocoder_CallBack(data) {
        var address = data.regeocode.formattedAddress; //返回地址描述
        //给父窗口赋值--视情况决定
        $("#address").val(address);
    }
	var t, o = $('input[name="longitude"]').val(),
		p = $('input[name="latitude"]').val(),
		r = $('input[name="shop_name"]').val();
	if ("" == o || "" == p) t = new AMap.Map("MapContainer", {
		view: new AMap.View2D({
			zoom: 14,
			rotation: 0
		}),
		lang: "zh_cn"
	});
	else {
		var c = [parseFloat(o), parseFloat(p)];
		t = new AMap.Map("MapContainer", {
			view: new AMap.View2D({
				zoom: 14,
				center: c,
				rotation: 0
			}),
			lang: "zh_cn"
		})
	}
	var s = new AMap.Marker({
		draggable: !0,
		cursor: "move",
		raiseOnDrag: !0,
		icon: new AMap.Icon({
			size: new AMap.Size(28, 37),
			image: "/statics/images/mapMark.png",
			imageOffset: new AMap.Pixel(0, 0)
		}),
		position: c
	});
	s.setMap(t), s.setTitle("我是地图中心点哦~"), s.on("dragend", function(e) {
		regeocoder(e.lnglat);
		var a = e.lnglat.lat,
			n = e.lnglat.lng;
		$('input[name="longitude"]').val(n), $('input[name="latitude"]').val(a)
	}), t.plugin(["AMap.ToolBar"], function() {
		var e = new AMap.ToolBar;
		t.addControl(e)
	});
	var l = new Array,d = new Array;
	$("#getMapAddress").click(function(a) {
		var n = $('input[name="mapaddress"]').val();
		e(n)
	})
}

$(document).on("click", ".img-list-add", function() {
	HYD.popbox.ImgPicker(function(e) {
		var a = '<li><span class="img-list-btndel j-delimg"><i class="gicon-trash white"></i></span><span class="img-list-overlay"></span><img src="' + e[0] + '"></li>';
		$(".img-list").empty().append(a), $(".j-imglist-dataset").val(e[0])
	})
}), $(document).on("click", ".j-delimg", function() {
	var e = '<li class="img-list-add">+</li>';
	$(".img-list").empty().append(e), $(".j-imglist-dataset").val("")
}), $(function() {
	initialize();
	
});