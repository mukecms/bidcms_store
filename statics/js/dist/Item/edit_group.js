$(function() {
	var Defaults={"page":{"title":"新建商品分组","hasMargin":1,"backgroundColor":"#f8f8f8"},"PModules":[{"id":HYD.DIY.getTimestamp(),"type":"GoodsGroup","draggable":true,"sort":0,"content":{"showtitle":"'.$title.'","firstPriority":1,"secondPriority":1,"fulltext":"","privType":1,"autoDisplay":1,"layout":1,"showPrice":true,"userRank":0,"agentRank":0,"showIco":true,"showName":true,"goodstyle":1,"layoutstyles":1,"goodstxt":"立即购买","titleLine":0,"version":1,"goodslist":[{"item_id":"1","link":"#","pic":"http://shop.bidcms.com/store/statics/images/diy/goodsView1.jpg","price":"100.00","original_price":"200.00","title":"第一个商品","sale_num":"5"},{"item_id":"2","link":"#","pic":"http://shop.bidcms.com/store/statics/images/diy/goodsView2.jpg","price":"200.00","original_price":"300.00","title":"第二个商品","sale_num":"5"},{"item_id":"3","link":"#","pic":"http://shop.bidcms.com/store/statics/images/diy/goodsView3.jpg","price":"300.00","original_price":"400.00","title":"第三个商品","sale_num":"5"},{"item_id":"4","link":"#","pic":"http://shop.bidcms.com/store/statics/images/diy/goodsView4.jpg","price":"400.00","original_price":"500.00","title":"第四个商品","sale_num":"5"}],"modulePadding":5},"dom_conitem":null,"ue":null,"dom_ctrl":null}],"LModules":[]};
	var t = $("#j-initdata").val(),
		e = $("#update_id").val();
	t = t.length ? $.parseJSON(t) : Defaults, $(".j-pagetitle").text(t.page.title), $(".j-pagetitle-ipt").val(t.page.title), _.each(t.PModules, function(t) {
		HYD.DIY.add(t)
	}), _.each(t.LModules, function(t, e) {
		var n = 0 == e;
		t.content.is_only || (t.content.is_only = 1), HYD.DIY.add(t, n)
	}), $("#j-savePage").click(function() {
		var t = HYD.DIY.Unit.getData();
		return $.ajax({
			url: window.location.href,
			type: "post",
			dataType: "json",
			data: {
				id: e,
				title: t.page.title,
				content: JSON.stringify(t),
				is_preview: 0,
        commit:1,
        update_id:e
			},
			beforeSend: function() {
				$.jBox.showloading()
			},
			success: function(t) {
				1 == t.status ? (HYD.hint("success", "恭喜您，保存成功！"), setTimeout(function() {
					window.location.href = "index.php?con=goods&act=group"
				}, 1e3)) : HYD.hint("danger", "对不起，保存失败：" + t.msg), $.jBox.hideloading()
			}
		}), !1
	}), $("#j-saveAndPrvPage").click(function() {
		var t = HYD.DIY.Unit.getData();
		return $.ajax({
			url: window.location.href,
			type: "post",
			dataType: "json",
			data: {
				id: e,
				title: t.page.title,
				content: JSON.stringify(t),
				is_preview: 1,
        commit:1,
        update_id:e
			},
			beforeSend: function() {
				$.jBox.showloading()
			},
			success: function(t) {
				1 == t.status ? (HYD.hint("success", "恭喜您，保存成功！"), setTimeout(function() {
					window.open(t.link)
				}, 1e3)) : HYD.hint("danger", "对不起，保存失败：" + t.msg), $.jBox.hideloading()
			}
		}), !1
	}), _QV_ = "http://www.bidcms.com"
});
