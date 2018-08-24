$(function() {
	function e(e) {
		/*0 == e ? ($("#verify-set-prev").addClass("hide"), $("#verify-set-save").addClass("hide"), $("#verify-set-next").removeClass("hide")) : 2 == e ? ($("#verify-set-next").addClass("hide"), $("#verify-set-save").removeClass("hide")) : ($("#verify-set-prev").removeClass("hide"), $("#verify-set-next").removeClass("hide"), $("#verify-set-save").addClass("hide")), $(".verify-set-div").addClass("hide"), $(".verify-set-div").eq(e).removeClass("hide")*/
		$(".verify-set-div").addClass("hide"), $(".verify-set-div").eq(e).removeClass("hide");
	}
	$(".jbox-buttons").hide(),
	$(document).on("click", "#verify-set-tabs a", function() {
		var t = $(this).index();
		e(t)
	}),
	/*$(document).on("click", "#verify-set-prev", function() {
		var e = parseInt($("#verify-set-tabs a.active").index());
		$("#verify-set-tabs a").eq(e - 1).click()
	}),
	$(document).on("click", "#verify-set-next", function() {
		var e = parseInt($("#verify-set-tabs a.active").index()),
			t = $("#form-set").serialize() + "&i=" + e;
		$("#verify-set-tabs a").eq(e + 1).click()
	}),*/
	$(document).on("click", "#verify-set-save", function() {
		var e = $("#form-set").serialize() + "&commit=1";
		return $.jBox.showloading(), $.post("index.php?con=user&act=shop", e, function(e) {
			$(".jbox-close").click(), 1 == e.status ? (HYD.hint("success", e.msg), setTimeout(function() {
				window.location.reload()
			}, 1e3)) : HYD.hint("danger", e.msg), $.jBox.hideloading()
		}), !1
	})
});
