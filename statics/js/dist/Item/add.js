var getdata = function(t, a) {
	t.parents("ul").find(".J-catname").removeClass("cc-selected"), t.addClass("cc-selected");
	var e = "",
		c = t,
		l = t.data("cat_id") || 0;
	t.hasClass("cc-hasChild-item") ? $("#J-cat-id").val(0) : $("#J-cat-id").val(l).change(), t.hasClass("cc-hasChild-item") || c.parents("li.cc-list-item").nextAll().remove(), $(".cc-selected").each(function(t) {
		e += 0 == t ? "<li>" + $(this).html() + "</li>" : "<li>&nbsp;&gt;&nbsp;" + $(this).html() + "</li>"
	}), $("#J_OlCatePath").html(e), $.ajax({
		type: "POST",
		url: "index.php?con=goods&act=ajax_cate&v=" + Math.round(100 * Math.random()),
		dataType: "json",
		data: {
			cat_id: l
		},
		success: function(t) {
			if (t.length) {
				var e = "",
					l = "";
				c.parents("li.cc-list-item").nextAll().remove();
				new Array;
				for (i = 0; i < t.length; i++) l += '<li class="cc-cbox-group " role="treeitem"><div class="cc-cbox-gname">' + t[i].py + '</div>  <ul class="cc-cbox-gcont" role="group">       <li data-cat_id="' + t[i].sid + '" data-spell="' + t[i].spell + '"  class="J-catname cc-cbox-item ' + (0 == t[i].leaf ? "cc-hasChild-item" : "") + '">' + t[i].name + "</li>   </ul></li>";
				e += '<li class="cc-list-item J-all-list-item" tabindex="-1">  <div class="cc-cbox-filter">      <input type="text" autocomplete="off" class="J-input-search input-search" placeholder="输入名称/拼音首字母">  </div>  <div role="combobox" class="cc-cbox">      <ul role="listbox" tabindex="-1" hidefocus="-1" unselectable="on" class="cc-cbox-cont">' + l, c.parents("li.cc-list-item").after(e), a && a()
			}
		}
	})
};
$(function() {
	/*$("#category1").change(function() {
		var t = $(this).val();
		$.post("index.php?con=goods&act=ajax_cate", {
			id: t
		}, function(t) {
			if (1 == t.status) {
				var a = $("#category2");
				$("option", a).remove(), $.each(t.data, function(t, e) {
					var c = "<option value='" + e.category_id + "'>" + e.title + "</option>";
					a.append(c)
				})
			}
		},'json')
	});
	*/
	$(".J-first-cat").click(function() {
		"true" == $(this).parent("li").data("expanded") ? ($(this).parent("li").addClass("cc-tree-expanded"), $(this).parent("li").data("expanded", "false")) : ($(this).parent("li").removeClass("cc-tree-expanded"), $(this).parent("li").data("expanded", "true"))
	}), $(".J-catname").live("click", function() {
		getdata($(this))
	}), $(document).on("change keyup", ".J-input-search", function() {
		var t = $(this).val(),
			a = new RegExp(t, "ig");
		$(this).parents("li.J-all-list-item").find(".cc-tree-group,.cc-cbox-group").hide(), $(this).parents("li.J-all-list-item").find(".J-catname").each(function(t) {
			var e = $(this).html(),
				c = $(this).data("spell"),
				i = $(this).parents(".cc-tree-group,.cc-cbox-group");
			$(this).hide(), (c.match(a) || e.match(a)) && ($(this).show(), i.show())
		})
	}), $("#J-cat-id").change(function() {
		$("#j-catID-helper").text("")
	}), $("#formAdd").submit(function() {
		var t = $("input[name='type']:checked").val(),
			a = !0;
		switch (console.log(t), t) {
			case "1":
				var e = $("#category1"),
					c = $("#category2"),
					i = e.val(),
					l = c.val(); - 1 == i && (HYD.FormShowError(e, "请选择一级类目"), a = !1), -1 == l && (HYD.FormShowError(c, "请选择二级类目"), a = !1);
				break;
			case "2":
				var s = $("#J-cat-id").val();
				console.log(s), 0 == s && ($("#j-catID-helper").text("请选择完整的综合类目"), a = !1)
		}
		return a
	})
});