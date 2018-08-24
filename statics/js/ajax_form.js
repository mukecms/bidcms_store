$(function(){
    var id = $('input[name="is_draw_int"]:checked').val();
    if(id == 1){
        $(".draw1").removeClass('hide');
        $(".draw2").addClass('hide');
    }else{
        $(".draw2").removeClass('hide');
        $(".draw1").addClass('hide');
    }
    $('input[name="is_draw_int"]').change(function(){
        var draw = $(this).val();
        if(draw == 1){
            $(".draw1").removeClass('hide');
            $(".draw2").addClass('hide');
        }else{
            $(".draw2").removeClass('hide');
            $(".draw1").addClass('hide');
        }
    });

    var balance_id = $('input[name="is_balance_draw_int"]:checked').val();
    if(balance_id == 1){
        $(".draw_balance1").removeClass('hide');
        $(".draw_balance2").addClass('hide');
    }else{
        $(".draw_balance2").removeClass('hide');
        $(".draw_balance1").addClass('hide');
    }
    $('input[name="is_balance_draw_int"]').change(function(){
        var balance_draw = $(this).val();
        if(balance_draw == 1){
            $(".draw_balance1").removeClass('hide');
            $(".draw_balance2").addClass('hide');
        }else{
            $(".draw_balance2").removeClass('hide');
            $(".draw_balance1").addClass('hide');
        }
    });

    var checkedVal = $('input[name="withdraw_balance_specify_time"]:checked').val();
    if(checkedVal == 1){
        $(".showBalanceTimeChoice").show();
    }else{
        $(".showBalanceTimeChoice").hide();
    }
    $('input[name="withdraw_balance_specify_time"]').change(function(){
        var this_checked = $(this).val();

        if(this_checked == 1){
            $(".showBalanceTimeChoice").show();
        }else{
            $(".showBalanceTimeChoice").hide();
        }
    })

    ;(function(){
        var checkedVal = $('input[name="withdraw_specify_time"]:checked').val();
        if(checkedVal == 1){
            $(".showTimeChoice").show();
        }else{
            $(".showTimeChoice").hide();
        }
        $('input[name="withdraw_specify_time"]').change(function(){
            var this_checked = $(this).val();

            if(this_checked == 1){
                $(".showTimeChoice").show();
            }else{
                $(".showTimeChoice").hide();
            }
        })
    })();
    
});
/*
 * @author wyh
 * 公共ajax异步表单提交
 * */

function ajaxFrom () {
	var params = $("form").serialize();
    var action = $("form").attr("action");
    action = action ? action : window.location.href;

    $.jBox.showloading();
    $.post(action, params, function(data) {
        if (data.status == 1) {

            HYD.hint("success", data.msg);

            if (data.link) {
                setTimeout(function() {
                    window.location.href = data.link;
                }, 1000);
            }
		} else {
            HYD.hint("danger", data.msg);
        }
        $.jBox.hideloading();

    },'json');
    return false;
}

