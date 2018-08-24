$(function() {
	function t() {
		$(".textarea-item>textarea").each(function() {
			var t = $(this).data("item_config");
			"" != t && (t = JSON.parse(decodeURIComponent(t)), $(this).css({
				"font-weight": t.bold,
				"font-style": t.italic,
				"font-size": t.fontSize,
				"letter-spacing": t.letterSpacing
			}).parent().css({
				display: "block",
				left: t.left,
				top: t.top,
				position: "absolute",
				width: t.width,
				height: t.height
			}), "" != t.value && $(this).val(t.value))
		})
	}
	$.browser.msie && parseInt($.browser.version) < 8 && $("#hack_fixie67").show(), $(".textarea-item").each(function() {
		var t = $(this),
			a = t.find("textarea");
		t.resizable({
			start: function() {
				a.focus()
			}
		}), t.draggable({
			handle: ".textarea-item-move",
			drag: function() {
				a.focus()
			}
		}), t.find(".textarea-item-del").click(function() {
			t.hide(), e.slt_opts.val("")
		}), a.focus(function() {
			t.addClass("focus")
		}).blur(function() {
			t.removeClass("focus")
		})
	}), $(".ckb-font").click(function() {
		$(this).toggleClass("checked")
	});
	var e = e ? e : {};
	e.slt_opts = $("#slt_opts"), e.slt_fts = $("#slt_fontsize"), e.slt_lts = $("#slt_letterSpacing"), e.pos_top = $("#ipt_posTop"), e.pos_left = $("#ipt_posLeft"), e.ckb_fontbold = $("#ckb_fontbold"), e.ckb_fontitalic = $("#ckb_fontitalic"), e.slt_opts.change(function() {
		var t = $("#" + $(this).val()),
			e = t.find("textarea");
		t.show(), e.focus()
	}), e.slt_fts.change(function() {
		var t = e.slt_opts.val();
		$(".textarea-item>textarea[name=" + t + "]").css("fontSize", parseInt($(this).val()))
	}), e.slt_lts.change(function() {
		var t = e.slt_opts.val();
		$(".textarea-item>textarea[name=" + t + "]").css("letterSpacing", parseInt($(this).val()))
	}), e.pos_top.keyup(function() {
		var t = e.slt_opts.val();
		$(".textarea-item>textarea[name=" + t + "]").parent(".textarea-item").css("top", parseInt($(this).val()))
	}), e.pos_left.keyup(function() {
		var t = e.slt_opts.val();
		$(".textarea-item>textarea[name=" + t + "]").parent(".textarea-item").css("left", parseInt($(this).val()))
	}), e.ckb_fontbold.click(function() {
		var t = e.slt_opts.val();
		$(this).hasClass("checked") ? $(".textarea-item>textarea[name=" + t + "]").css("fontWeight", "bold") : $(".textarea-item>textarea[name=" + t + "]").css("fontWeight", "normal")
	}), e.ckb_fontitalic.click(function() {
		var t = e.slt_opts.val();
		$(this).hasClass("checked") ? $(".textarea-item>textarea[name=" + t + "]").css("fontStyle", "italic") : $(".textarea-item>textarea[name=" + t + "]").css("fontStyle", "normal")
	}), $(".textarea-item>textarea").focus(function() {
		var t = $(this);
		e.updateSetting({
			name: t.attr("name"),
			fontSize: parseInt(t.css("fontSize")),
			letterSpacing: parseInt(t.css("letterSpacing")),
			left: parseInt(t.parent(".textarea-item").css("left")),
			top: parseInt(t.parent(".textarea-item").css("top")),
			bold: t.css("fontWeight"),
			italic: t.css("fontStyle")
		})
	}), $("#btn_confirm").click(function() {
		return "" == $("#J_ImgUrl").val() ? (HYD.hint("warning", "请先上传快递单底图!"), !1) : $(".textarea-item:visible").length <= 0 ? (HYD.hint("warning", "请添加打印项!"), !1) : ($(".textarea-item").each(function() {
			var t = $(this);
			if (t.is(":visible")) {
				var e = t.attr("id"),
					a = t.find("textarea[name=" + e + "]"),
					i = {
						id: e,
						width: t.css("width"),
						height: t.css("height"),
						top: t.css("top"),
						left: t.css("left"),
						fontSize: a.css("fontSize"),
						letterSpacing: a.css("letterSpacing"),
						bold: a.css("fontWeight"),
						italic: a.css("fontStyle"),
						value: a.val() != a.data("tip_value") ? a.val() : ""
					};
				$("#J_FormExpress").append('<input type="hidden" name="print_items_params['+e+']" value="' + encodeURI(JSON.stringify(i)) + '" />')
			}
		}), $("#J_FormExpress").submit(), !1)
	}), e.updateSetting = function(t) {
		if (t) for (var e in t) {
			var a = t[e];
			switch (e) {
			case "name":
				this.slt_opts.val(a);
				break;
			case "fontSize":
				this.slt_fts.val(a);
				break;
			case "letterSpacing":
				this.slt_lts.val(a);
				break;
			case "left":
				this.pos_left.val(a);
				break;
			case "top":
				this.pos_top.val(a);
				break;
			case "bold":
				400 == parseInt(a) || "normal" == a ? this.ckb_fontbold.removeClass("checked") : this.ckb_fontbold.addClass("checked");
				break;
			case "italic":
				"italic" == a ? this.ckb_fontitalic.addClass("checked") : this.ckb_fontitalic.removeClass("checked")
			}
		}
	};
	var a = $("#J_ExpressBG");
	$(function() {
		var e = $("#J_ImgUrl").val();
		"" != e && (a.attr("src", e), a.prop("complete") ? (a.removeClass("default-height"), t()) : a.on("load", function() {
			$(this).removeClass("default-height"), t()
		}).on("error", function() {})),
		$("#J_ShippingCompanyId").on("change", function() {
			"" == $("#J_PrintTempName").prop("defaultValue") && (0 != $(this).children(":selected").index() ? $("#J_PrintTempName").val($(this).children(":selected").text()) : $("#J_PrintTempName").val(null))
		}), $("#J_FormExpress").submit(function() {
			var t = $("input[name=print_temp_name]").val();
			if (!t) return HYD.hint("danger", "模板名称不能为空！"), $("input[name=print_temp_name]").focus(), !1;
			var e = $("#J_ShippingCompanyId").val();
			if (!e) return HYD.hint("danger", "请选择物流公司！"), $("#J_ShippingCompanyId").focus(), !1;
			var a = $("#printing_paper_width").val();
			if (!a) return HYD.hint("danger", "请输入快递单长度！"), $("#printing_paper_width").focus(), !1;
			var i = $("#printing_paper_height").val();
			return i ? void 0 : (HYD.hint("danger", "请输入快递单宽度！"), $("#printing_paper_height").focus(), !1)
		})
	}), _QV_ = "http://www.bidcms.com";
	var i = function() {
			$.albums({
				test: 1,
				callback: function(t) {
					$("#J_ImgUrl").val(t), a.attr("src", t), a.on("load", function() {
						$(this).fadeIn().parent().removeClass("default-height")
					}).on("error", function() {})
				}
			})
		};
	$("#j-selectImgs").click(i)
});
