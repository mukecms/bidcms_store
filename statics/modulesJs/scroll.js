$(function() {
	var e = $(".fixedBar").width();
	$(".fixedBar").height();
	$(".fixedBar").css({
		right: -e
	}), $("#j-fixedBar-btn").click(function() {
		$(".fixedBar").hasClass("show") ? $(".fixedBar").animate({
			right: -e
		}, "fast").removeClass("show") : $(".fixedBar").animate({
			right: 5
		}, "fast").addClass("show")
	}), $(".fixedBar>ul>li").click(function(e) {
		$(this).addClass("cur").siblings("li").removeClass("cur")
	}), $(".fixedBar>ul>li").eq(0).addClass("cur");
	var n = $(".fixedBar>ul").children("li").length;
	if (0 == n) $(".fixedBar").hide();
	else {
		var i = $(".left-menu"),
			o = {};
		o.array_id = [], o.array_height = [], i.each(function(e, n) {
			var i = $(this),
				t = $(this).children("dt").children("span"),
				c = t.data("id"),
				l = i.offset().top,
				s = i.outerHeight(!0),
				a = parseInt(l) + parseInt(s);
			o.array_id.push(c), o.array_height.push(a)
		});
		for (var t = 0; t < o.array_height.length; t++) {
			o.array_height[t];
			$(window).scroll(function() {
				$(window).scrollTop()
			})
		}
		$(window).scroll(function(e) {
			for (var n = $(window).scrollTop(), i = 0; i < o.array_height.length; i++) {
				var t = o.array_height[i];
				if (0 == i) t > n && $(".shopManager" + o.array_id[i]).addClass("cur").siblings("li").removeClass("cur");
				else {
					var c = o.array_height[i - 1];
					n > c && t > n && $(".shopManager" + o.array_id[i]).addClass("cur").siblings("li").removeClass("cur")
				}
			}
		})
	}
	$(".fixedBar>ul>li>a").click(function(e) {
		var n = $(this),
			i = n.data("target"),
			o = $(i).offset().top;
		$.browser.chrome ? elem = "body" : elem = document.documentElement || document.body, $(elem).animate({
			scrollTop: o
		}, 600)
	}), $("#j-showfixedBar").click(function() {
		$(this).fadeOut("fast"), $(".fixedBar").fadeIn("fast")
	})
});