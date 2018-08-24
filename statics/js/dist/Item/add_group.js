$(function() {
	var i = {
		id: HYD.DIY.getTimestamp(),
		type: "GoodsGroup",
		draggable: !0,
		sort: 0,
		content: {
			showtitle: "新建商品分组",
			firstPriority: 1,
			secondPriority: 1,
			fulltext: "",
			privType: 1,
			autoDisplay: 1,
			layout: 1,
			showPrice: !0,
			userRank: 0,
			agentRank: 0,
			showIco: !0,
			showName: !0,
			goodstyle: 1,
			layoutstyles: 1,
			goodstxt: "立即购买",
			titleLine: 0,
			version: 1,
			goodslist: [{
				item_id: "1",
				link: "#",
				pic: "http://shop.bidcms.com/store/statics/images/diy/goodsView1.jpg",
				price: "100.00",
				original_price: "200.00",
				title: "第一个商品",
				sale_num: "5"
			}, {
				item_id: "2",
				link: "#",
				pic: "http://shop.bidcms.com/store/statics/images/diy/goodsView2.jpg",
				price: "200.00",
				original_price: "300.00",
				title: "第二个商品",
				sale_num: "5"
			}, {
				item_id: "3",
				link: "#",
				pic: "http://shop.bidcms.com/store/statics/images/diy/goodsView3.jpg",
				price: "300.00",
				original_price: "400.00",
				title: "第三个商品",
				sale_num: "5"
			}, {
				item_id: "4",
				link: "#",
				pic: "http://shop.bidcms.com/store/statics/images/diy/goodsView4.jpg",
				price: "400.00",
				original_price: "500.00",
				title: "第四个商品",
				sale_num: "5"
			}]
		}
	};
	HYD.DIY.add(i, !0), 
	$("#j-savePage").click(function() {
		if (HYD.DIY.Unit.verify()) {
			var i = HYD.DIY.Unit.getData();
			return $.ajax({
				url: "index.php?con=goods&act=group_edit",
				type: "post",
				dataType: "json",
				data: {
					title: i.page.title,
					content: JSON.stringify(i),
					is_preview: 0,
					commit:1
				},
				beforeSend: function() {
					$.jBox.showloading()
				},
				success: function(i) {
					1 == i.status ? (HYD.hint("success", "恭喜您，保存成功！"), setTimeout(function() {
						window.location.href = "index.php?con=goods&act=group"
					}, 1e3)) : HYD.hint("danger", "对不起，保存失败：" + i.msg), $.jBox.hideloading()
				}
			}), !1
		}
	}), $("#j-saveAndPrvPage").click(function() {
		if (HYD.DIY.Unit.verify()) {
			var i = HYD.DIY.Unit.getData();
			return $.ajax({
				url: "index.php?con=goods&act=group_edit",
				type: "post",
				dataType: "json",
				data: {
					title: i.page.title,
					content: JSON.stringify(i),
					is_preview: 1,
					commit:1
				},
				beforeSend: function() {
					$.jBox.showloading()
				},
				success: function(i) {
					1 == i.status ? (HYD.hint("success", "恭喜您，保存成功！"), setTimeout(function() {
						window.open(i.link)
					}, 1e3)) : HYD.hint("danger", "对不起，保存失败：" + i.msg), $.jBox.hideloading()
				}
			}), !1
		}
	})
});
